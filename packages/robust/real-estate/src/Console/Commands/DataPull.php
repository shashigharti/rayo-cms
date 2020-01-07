<?php


namespace Robust\RealEstate\Console\Commands;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Models\ListingImages;
use Robust\RealEstate\Models\ListingProperty;
use Robust\RealEstate\Models\Location;

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

    protected $properties = [

    ];
    /**
     * @var array
     */
    protected $property_class = [
        'A' => 'Residential Property',
        'B' => 'MultiFamily',
        'C' => 'LotsAndLand',
        'D' => 'CommonInterest',
        'E' => 'Industry',
        'F' => 'Rental',
    ];
    /**
     * @var array
     */
    protected $integer_fields = [
        'total_finished_area',
        'system_price',
        'picture_count',
        'year_built',
        'bedrooms',
        'baths_full',
        'days_on_mls',
        'asking_price'
    ];
    protected $listing_fillable = [
        'name',
        'slug',
        'uid',
        'mls_number',
        'class',
        'area',
        'sub_area',
        'borough_id',
        'system_price',
        'asking_price',
        'address_number',
        'address_street',
        'days_on_mls',
        'city',
        'zip',
        'state',
        'subdivision',
        'county',
        'elementary_school',
        'high_school',
        'middle_school',
        'picture_count',
        'picture_status',
        'input_date',
        'baths_full',
        'bedrooms',
        'status',
    ];
    protected $maps = [
        'area' => 'area_id',
        'city' => 'city_id',
        'county' => 'county_id',
        'zip' => 'zip_id',
        'elementary_school' =>'elementary_school_id',
        'high_school' => 'high_school_id',
        'middle_school' => 'middle_school_id',
        'subdivision' => 'subdivision_id',
        'school_district' => 'school_district-id'
    ];
    protected $mapping = [
        'city' => 'Robust\RealEstate\Models\City',
        'county' => 'Robust\RealEstate\Models\County',
        'area' => 'Robust\RealEstate\Models\Area',
        'elementary_school' => 'Robust\RealEstate\Models\ElementarySchool',
        'middle_school' => 'Robust\RealEstate\Models\MiddleSchool',
        'high_school' => 'Robust\RealEstate\Models\HighSchool',
        'zip' =>  'Robust\RealEstate\Models\Zip',
        'subdivision' =>  'Robust\RealEstate\Models\Subdivision',
        'school_district' =>  'Robust\RealEstate\Models\SchoolDistrict',
    ];

    //Palm Beach, Broward, Martin, St Lucie
    protected $conditions = [
//        'counties' => [
//           'A' => [
//               'Palm Beach' => '1552FDYRQZIB',
//               'Broward' => '1552FDYRIW50',
//               'Martin' => '1552FDYRQ3SA',
//               'St. Lucie' => '1552FDYRSN94',
//           ],
//           'B' => [
//               'Palm Beach' => '1DEK1CX064G6',
//               'Broward' => '1DEK1CWY7BTK',
//               'Martin' => '1DEK1CWYTDDA',
//               'St. Lucie' => '1DEK1CX0K245',
//           ],
//           'C' => [
//               'Palm Beach' => '1DEK1CX2AY64',
//               'Broward' => '1DEK1CX0RH3V',
//               'Martin' => '1DEK1CX1AVA8',
//               'St. Lucie' => '1DEK1CX2NZPU',
//           ],
//           'D' => [
//               'Palm Beach' => '1DEK1CX4HV0L',
//               'Broward' => '1DEK1CX2UPG8',
//               'Martin' => '1DEK1CX3G2FL',
//               'St. Lucie' => '1DEK1CX4ZQ77',
//           ],
//            'E' => [
//                'Palm Beach' => '1DEK1CX6QUKN',
//                'Broward' => '1DEK1CX56FW5',
//                'Martin' => '1DEK1CX5PTSV',
//                'St. Lucie' => '1DEK1CX74D13',
//            ],
//            'F' => [
//                'Palm Beach' => '1DEK1CX6QUKN',
//                'Broward' => '1DEK1CX56FW5',
//                'Martin' => '1DEK1CX5PTSV',
//                'St. Lucie' => '1DEK1CX74D13',
//            ]
//        ],
        'cities' => [
            'A' => [
                'Boca Raton' => '12LM4LA7AGIT',
                'Delray Beach' => '12LM4LFDRK7J',
                'Boynton Beach' => '12LM4LAAAHAJ',
                'Deerfield Beach' => '12LM4LDYXFCY',
                'West Palm Beach' => '12LM4O5ENL56',
                'Palm Beach Gardens' => '12LM4LXYRE6N',
                'Wellington' => '12LM4O5947SQ',
                'Parkland' => '12LM4LZFOYMT',
                'Highland Beach' => '12LM4LJ2YFPK'
            ],
            'B' => [
                'Boca Raton' => '12MKUJQFXPDX',
                'Delray Beach' => '12MKUJQFZ60O',
                'Boynton Beach' => '12MKUJQFXSJY',
                'Deerfield Beach' => '12MKUJQFZ36Z',
                'West Palm Beach' => '12MKUJQG9O1Z',
                'Palm Beach Gardens' => '12MKUJQG5OML',
                'Wellington' => '12MKUJQG9I62',
                'Parkland' => '12MKUJQG62XV',
                'Highland Beach' => '12MKUJQG0PPA'
            ],
            'C' => [
                'Boca Raton' => '12MKULNRNKCO',
                'Delray Beach' => '12MKULNROXCD',
                'Boynton Beach' => '12MKULNRNNQZ',
                'Deerfield Beach' => '12MKULNROURY',
                'West Palm Beach' => '12MKULNRZG1R',
                'Palm Beach Gardens' => '12MKULNRVAO0',
                'Wellington' => '12MKULNRZAFL',
                'Parkland' => '12MKULNRVP1T',
                'Highland Beach' => '12MKULNRQJPU'
            ],
            'D' => [
                'Boca Raton' => '12MKV68SFIA8',
                'Delray Beach' => '12MKV68SGVI5',
                'Boynton Beach' => '12MKV68SFLN7',
                'Deerfield Beach' => '12MKV68SGSYQ',
                'West Palm Beach' => '12MKV68SQV4T',
                'Palm Beach Gardens' => '12MKV68SMV1D',
                'Wellington' => '12MKV68SQQ3H',
                'Parkland' => '12MKV68SN8LA',
                'Highland Beach' => '12MKV68SIHSQ'
            ],
            'E' => [
                'Boca Raton' => '12ML73ZYI3MK',
                'Delray Beach' => '12ML73ZYJA99',
                'Boynton Beach' => '12ML73ZYI5UB',
                'Deerfield Beach' => '12ML73ZYJ7ZI',
                'West Palm Beach' => '12ML73ZYRZFM',
                'Palm Beach Gardens' => '12ML73ZYOSWB',
                'Wellington' => '12ML73ZYRUKU',
                'Parkland' => '12ML73ZYP4J0',
                'Highland Beach' => '12ML73ZYKP3T'
            ],
            'F' => [
                'Boca Raton' => '12MKV6FG7USK',
                'Delray Beach' => '12MKV6FG98OD',
                'Boynton Beach' => '12MKV6FG7XNQ',
                'Deerfield Beach' => '12MKV6FG95TK',
                'West Palm Beach' => '12MKV6FGJE87',
                'Palm Beach Gardens' => '12MKV6FGF93M',
                'Wellington' => '12MKV6FGJ8XZ',
                'Parkland' => '12MKV6FGFOAU',
                'Highland Beach' => '12MKV6FGASYE'
            ]
        ]
    ];
    //we cannot send the default names while querying in the server. Above are lookup values

    //just to be fast for now
    protected $conditions_map = [
        'counties' => 'LIST_41', 'system_price' =>'LIST_22','cities' => 'LIST_39'
    ];
    protected $min_price = 10000;
    /**
     * @var int
     */
    protected $limit = 2000; //how much data we get in single call

    /**
     * @throws \PHRETS\Exceptions\CapabilityUnavailable
     * @throws \PHRETS\Exceptions\MissingConfiguration
     */
    public function handle()
    {
        $days = $this->argument('days');
        $resources = config('real-estate.data-map.property.listing');
        foreach ($resources as $class => $resource)
        {
            $processed = 0;
            $created = 0;
            $updated = 0;
            $total = 0;
            $offset = 0;
            $fields = implode(',',array_values($resource));
            $date = Carbon::now()->subDay($days)->toAtomString(); //only accepts atom format
            dump($date);
//            $query = '*'; //this is for accepting all data with out any condition

            $query = '(LIST_132='.$date .'+)'; // this is according to input date
//             zero property count for B (mutilfamily) on below condition
            foreach ($this->conditions as $key => $condition)
            {
                if(is_array($condition)){
                    $query .= ',(' . $this->conditions_map[$key] . '=';
                }
                $query .= implode(',',$condition[$class]);
                $query .= ')' ;
            }
            //query for system price above 10000
            $query .= ',('. $this->conditions_map['system_price'] .'='. $this->min_price .'+)';

            $results = $this->rets->Search('Property',$class,$query,['Select'=>['LIST_1'],'Limit' =>1]);
            $total = $results->getTotalResultsCount();
            $this->info($total);
            do {
                $results = $this->rets->Search('Property',$class,$query,['Limit' =>$this->limit,'Select' => $fields,'Offset' => $offset * $this->limit]);
                $offset+=1;
                foreach ($results as $result){
                    $result = $result->toArray();
                    $data = [];
                    $listing_data = [];

                    //result to data with keys
                    foreach ($resource as $key => $field)
                    {
                        if(isset($result[$field])){
                            $data[$key] = $result[$field];
                        }
                    }
                    //listing data
                    foreach ($this->listing_fillable as $field){
                        if(isset($data[$field])){
                            $listing_data[$field] = $data[$field];
                        }
                    }
                    $listing_data['school_district'] = 'Test';
                    // add id
                    foreach ($listing_data as $key => $data)
                    {
                        if(isset($this->mapping[$key])){
                            if(!in_array($data,['','none','None','Undefined'])){
                                $map =  $this->mapping[$key]::where('slug',Str::slug($data))->first();
                                $map_id = $map ? $map->id : $this->mapping[$key]::create([
                                    'name' => $data,
                                    'slug' => Str::slug($data)
                                ])->id;
                                $location = Location::where(['locationable_id' => $map_id,'locationable_type' => $this->mapping[$key]])->first();
                                $listing_data[$this->maps[$key]] = $location ? $location->id : Location::create([
                                    'name' => $data,
                                    'slug' => Str::slug($data),
                                    'locationable_id' => $map_id,
                                    'locationable_type' => $this->mapping[$key]
                                ])->id;
                            }
                        }
                    }
                    //check for integer fields and convert
                    foreach ($this->integer_fields as $field){
                        if(isset($listing_data[$field])){
                            $listing_data[$field] = (int) $listing_data[$field];
                        }
                    }
                    //convert values like class A
                    $listing_data['class'] = $this->property_class[$listing_data['class']];
                    $listing = Listing::updateOrCreate(['uid' => $listing_data['uid']],$listing_data);

                    if($listing->wasChanged()){
                        $updated+=1;
                    }
                    if($listing->wasRecentlyCreated){
                        $created+=1;
                    }
                    $processed+=1;
                    $info ='Processed : ' . $processed . ' || Total count : ' .$total .' || ' .
                        'Updated Count : ' .$updated .' || ' .
                        'Created Count : ' .$created . '||
                     Resource : Property || Class : '.$class . ' || Total Images : ' . $listing->picture_count . ' || Offset : ' .$offset * $this->limit
                    .' || System Price : ' .$listing->system_price . ' || City : ' .$listing_data['city'] . ' || County : '.$listing_data['county'];

                    ;
                    $this->info($info);
                }
            } while($processed < $total);
        }
    }
}
