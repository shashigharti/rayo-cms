<?php
namespace App\Console\Commands;

use Robust\RealEstate\Models\City;
use Robust\RealEstate\Models\Listing;
use Illuminate\Console\Command;

/**
 * Class CreateLocations
 * @package App\Console\Commands
 */
class CreateLocations extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'migrate:create-locations';
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
        // Read this data from config
        $locations = [
            'city' => ['table_name'=>'real_estate_cities', 'field_to_join' => 'name'],
            'district' => ['table_name'=>'real_estate_cities', 'field_to_join' => 'name'],
            'county' => ['table_name'=>'real_estate_cities', 'field_to_join' => 'name'],
            'zip' => ['table_name'=>'real_estate_cities', 'field_to_join' => 'name'],
            'area' => ['table_name'=>'real_estate_cities', 'field_to_join' => 'name'],
            'high_school' => ['table_name'=>'real_estate_cities', 'field_to_join' => 'name'],
            'elem_school' => ['table_name'=>'real_estate_cities', 'field_to_join' => 'name'],
            'middle_school' => ['table_name'=>'real_estate_cities', 'field_to_join' => 'name'],
            'grid' => ['table_name'=>'real_estate_cities', 'field_to_join' => 'name'] ,
            'subdivision' => ['table_name'=>'real_estate_cities', 'field_to_join' => 'name']
        ];


        // For each location add/remove location
        foreach ($locations as $location_type_field => $attr) {
            $this->AddRemoveLocations($location_type_field, $attr);
        }
    }

    private function AddRemoveLocations($location_type_field, $attr)
    {       
        // Read from config
        $excludedCounties = [];
        $excludedCities = [];

        // Locations
        $locations = Listing::select($location_type_field)
        ->distinct()
        ->pluck($location_type_field)->toArray();

        // Existing Locations
        $existing_locations = Listing::select($location_type_field)
        ->leftJoin($attr['table_name'], $attr['table_name'].".".$attr['field_to_join'], '=', "real_estate_listings.{$location_type_field}")
        ->whereNotIn("real_estate_listings.{$location_type_field}", $locations)
        ->distinct()
        ->pluck($location_type_field)->toArray();

        // New Locations to Add
        $new_locations = collect(array_udiff($locations, $existing_locations, 'strcasecmp'));

        
        // foreach($new_locations as $location){
        //     $location = Listing::where($attr, $location)->first();
        //     $location->$attr()->save([
        //         'name' =>  $location,
        //         'slug' => str_slug($add_name, '-')
        //         ]);          
        // }
    }
}
