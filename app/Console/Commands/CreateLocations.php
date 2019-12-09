<?php
namespace App\Console\Commands;

use Robust\RealEstate\Models\City;
use Robust\RealEstate\Models\SchoolDistrict;
use Robust\RealEstate\Models\County;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Models\Zip;
use Robust\RealEstate\Models\Area;
use Robust\RealEstate\Models\HighSchool;
use Robust\RealEstate\Models\ElementarySchool;
use Robust\RealEstate\Models\MiddleSchool;
use Robust\RealEstate\Models\Grid;
use Robust\RealEstate\Models\Subdivision;

use Illuminate\Console\Command;

/**
 * Class CreateLocations
 * @package App\Console\Commands
 */
class CreateLocations extends Command
{
    /**
     * Create locations
     * Example: rws:create-locations --type=city --type=high_school
     * @var string
     */
    protected $signature = 'rws:create-locations {--type=*}';
    /**
     * The console command description.
     * @var string
     */
    protected $description = "Create Locations";


    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
       // Read params
        $location_types = $this->option('type', []);

        // Read from config : settings
        $all_locations = [
            'city' => ['table_name'=>'real_estate_cities'],
            'district' => ['table_name'=>'real_estate_school_districts'],
            'county' => ['table_name'=>'real_estate_counties'],
            'zip' => ['table_name'=>'real_estate_zips'],
            'area' => ['table_name'=>'real_estate_areas'],
            'high_school' => ['table_name'=>'real_estate_high_schools'],
            'elem_school' => ['table_name'=>'real_estate_elem_schools'],
            'middle_school' => ['table_name'=>'real_estate_middle_schools'],
            'grid' => ['table_name'=>'real_estate_grids'] ,
            'subdivision' => ['table_name'=>'real_estate_subdivisions']
        ];

        $locations = [];
        foreach ($all_locations as $type => $location) {
            if (in_array($type, $location_types)) {
                $locations[$type] = $location;
            }
        }


        // For each location add/remove location
        foreach ($locations as $location_type_field => $attr) {
            $this->AddRemoveLocations($location_type_field, $attr);
        }
    }

    /**
     * Create new locations
     *
     * @param String $location_type_field
     * @param String $attr
     */
    private function AddRemoveLocations($location_type_field, $attr)
    {
        // Read from config : settings
        $excluded_locations = collect([
            'counties' => [],
            'cities' => []
        ]);

        // Locations
        $locations = Listing::select($location_type_field)
        ->distinct()
        ->pluck($location_type_field)->toArray();

        // Existing Locations
        $existing_locations = Listing::select($location_type_field)
        ->leftJoin($attr['table_name'], $attr['table_name'].".name", '=', "real_estate_listings.{$location_type_field}")
        ->whereNotIn("real_estate_listings.{$location_type_field}", $locations)
        ->distinct()
        ->pluck($location_type_field)->toArray();


        $new_locations = collect(array_udiff($locations, $existing_locations, 'strcasecmp'));

        // Filter excluded locations and get new array of locations
        $new_locations_arr = $new_locations->map(function ($location) use ($excluded_locations){
            $isExcluded = false;
            foreach($excluded_locations as $ex_locations){
                $isExcluded = \Arr::has( $ex_locations, $location);
            }
            return !$isExcluded? [
                    'name' =>  $location,
                    'slug' => str_slug($location, '-')
                ]:false;
        })->reject(function ($value) {
            return $value === false;
        });

        // Create New Locations
        if($new_locations_arr->count() > 0){
            $locations_added = \DB::table($attr['table_name'])->insert($new_locations_arr->toArray());
            $this->info('Created Locations:' . ((bool) $locations_added));
        }
    }
}
