<?php


namespace Robust\RealEstate\Console\Commands\DataPull;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Models\ListingImages;
use Robust\RealEstate\Models\ListingLocation;
use Robust\RealEstate\Models\ListingProperty;
use Robust\RealEstate\Models\Location;
use Robust\RealEstate\Models\Subdivision;

/**
 * Class DataPull
 * @package Robust\RealEstate\Console\Commands
 */
class DataPull extends RetsCommands
{
    /**
     * @var string
     */
    protected $signature = 'rws:data-pull {days}';

    /**
     * @var string
     */
    protected $description = 'Pull Data from server';

    /**
     * DataPull constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected $property_class;
    protected $integer_fields;
    protected $listing_fillable;
    protected $maps;
    protected $mapping;
    protected $conditions;
    protected $conditions_map;
    protected $min_price;
    protected $limit; //how much data we get in single call
    protected $input;
    /**
     * @throws \PHRETS\Exceptions\CapabilityUnavailable
     * @throws \PHRETS\Exceptions\MissingConfiguration
     */
    public function handle()
    {
        if(Schema::hasTable('settings')) {
            $days = $this->argument('days');
            $settings = settings('real-estate', 'client');
            $slug = $settings['slug'] ?? null;
            if ($slug) {
                $config = config('real-estate.' . $slug . '.data-pull');
                //moved to configs so we can change the config according to client without changing the code
                $this->property_class = $config['property_class'];
                $this->integer_fields = $config['integer_fields'];
                $this->listing_fillable = $config['listing_fillable'];
                $this->maps = $config['maps'];
                $this->mapping = $config['mapping'];
                $this->conditions = $config['conditions'];
                $this->conditions_map = $config['conditions_map'];
                $this->min_price = $config['min_price'];
                $this->limit = $config['limit'];
                $this->input = $config['input'];
                $resources = config('real-estate.' . $slug . '.data-map.property.listing');
                //we have to make it configurable dynamically
                foreach ($resources as $class => $resource) {
                    $processed = 0;
                    $created = 0;
                    $updated = 0;
                    $total = 0;
                    $offset = 0;
                    $fields = implode(',', array_values($resource));
                    $date = Carbon::now()->subDay($days)->toAtomString(); //only accepts atom format
                    dump($date);
                    //            $query = '*'; //this is for accepting all data with out any condition

                    $query = '(' . $this->input . '=' . $date . '+)'; // this is according to input date
                    //             zero property count for B (mutilfamily) on below condition
                    foreach ($this->conditions as $key => $condition) {
                        if (is_array($condition)) {
                            $query .= ',(' . $this->conditions_map[$key] . '=';
                        }
                        $query .= implode(',', $condition[$class]);
                        $query .= ')';
                    }
                    //query for system price above 10000
                    $query .= ',(' . $this->conditions_map['system_price'] . '=' . $this->min_price . '+)';
                    $results = $this->rets->Search('Property', $class, $query, ['Select' => ['LIST_1'], 'Limit' => 1]);
                    $total = $results->getTotalResultsCount();
                    $this->info($total);
                    do {
                        $results = $this->rets->Search('Property', $class, $query, ['Limit' => $this->limit, 'Select' => $fields, 'Offset' => $offset * $this->limit]);
                        $offset += 1;
                        foreach ($results as $result) {
                            $result = $result->toArray();
                            $data = [];
                            $listing_data = [];

                            //result to data with keys
                            foreach ($resource as $key => $field) {
                                if (isset($result[$field])) {
                                    $data[$key] = $result[$field];
                                }
                            }
                            //listing data
                            foreach ($this->listing_fillable as $field) {
                                if (isset($data[$field])) {
                                    $listing_data[$field] = $data[$field];
                                }
                            }
                            $listing_data['school_district'] = 'Test';
                            // add id
                            $subdivision = null;
                            $locations = [];
                            foreach ($listing_data as $key => $data) {
                                if (isset($this->mapping[$key])) {
                                    if (!in_array($data, ['', 'none', 'None', 'Undefined'])) {
                                        $map = $this->mapping[$key]::where('slug', Str::slug($data))->first();
                                        $map_id = $map ? $map->id : $this->mapping[$key]::create([
                                            'name' => $data,
                                            'slug' => Str::slug($data)
                                        ])->id;
                                        $location = Location::where(['locationable_id' => $map_id, 'locationable_type' => $this->mapping[$key]])->first();
                                        $listing_data[$this->maps[$key]] = $location ? $location->id : Location::create([
                                            'name' => $data,
                                            'slug' => Str::slug($data),
                                            'locationable_id' => $map_id,
                                            'locationable_type' => $this->mapping[$key]
                                        ])->id;
                                        array_push($locations,$listing_data[$this->maps[$key]]);
                                        if ($key === 'subdivision') {
                                            $subdivision = $map_id;
                                        }
                                    }
                                }
                            }
                            //generate name
                            $name = ucfirst($listing_data['address_number']);
                            $name .= ', ' . $listing_data['city'];
                            $name .= ', ' . $listing_data['zip'];
                            $listing_data['name'] = $name;
                            $listing_data['slug'] = Str::slug($name);

                            //update subdivision with ids

                            if ($subdivision) {
                                Subdivision::where('id', $subdivision)->update([
                                    'city_id' => $listing_data['city_id'] ?? null,
                                    'county_id' => $listing_data['county_id'] ?? null,
                                    'zip_id' => $listing_data['zip_id'] ?? null,
                                    'area_id' => $listing_data['area_id'] ?? null,
                                    'school_district_id' => $listing_data['school_district_id'] ?? null,
                                    'status' => 1
                                ]);
                            }
                            //check for integer fields and convert
                            foreach ($this->integer_fields as $field) {
                                if (isset($listing_data[$field])) {
                                    $listing_data[$field] = (int)$listing_data[$field];
                                }
                            }
                            //convert values like class A
                            $listing_data['class'] = $this->property_class[$listing_data['class']];
                            $listing = Listing::updateOrCreate(['uid' => $listing_data['uid']], $listing_data);

                            if ($listing->wasChanged()) {
                                $updated += 1;
                            }
                            if ($listing->wasRecentlyCreated) {
                                $created += 1;
                                foreach ($locations as $location){
                                    ListingLocation::create([
                                        'listing_id' => $listing->id,
                                        'location_id' => $location
                                    ]);
                                }
                            }
                            $processed += 1;
                            $info = 'Processed : ' . $processed . ' || Total count : ' . $total . ' || ' .
                                'Updated Count : ' . $updated . ' || ' .
                                'Created Count : ' . $created . '||
                         Resource : Property || Class : ' . $class . ' || Total Images : ' . $listing->picture_count . ' || Offset : ' . $offset * $this->limit
                                . ' || System Price : ' . $listing->system_price . ' || City : ' . $listing_data['city'] . ' || County : ' . $listing_data['county'];;
                            $this->info($info);
                        }
                    } while ($processed < $total);
                }
            }
        }
    }
}
