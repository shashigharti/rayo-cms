<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class CreateLocations
 * @package App\Console\Commands
 */
class CreateLocations extends Command
{
    /**
     * Create locations
     * Example: rws:create-locations
     * @var string
     */
    protected $signature = 'rws:create-locations';

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
        $this->info('Fixing Subdivisions');  
        $listings = \DB::table('real_estate_listings')->get(); 
        foreach($listings as $listing){
            $subdivision = \DB::table('real_estate_subdivisions')
            ->where('id', $listing->subdivision_id)
            ->update([
                'city_id' => $listing->city_id,
                'zip_id' => $listing->zip_id,
                'county_id' => $listing->county_id,
                'area_id' => $listing->area_id
            ]);
        }

        // $this->info('Adding Cities');  
        // $cities = \DB::table('real_estate_cities')->get(); 
        // foreach($cities as $city){
        //     $active_count = \DB::table('real_estate_listings')->where('status', 'Active')->where('city_id', $city->id)->count();
        //     $sold_count = \DB::table('real_estate_listings')->where('status', 'Closed')->where('city_id', $city->id)->count();
            
        //     $id = \DB::table('real_estate_locations')->insertGetId([
        //         'name' => $city->name,
        //         'slug' => $city->slug,
        //         'active_count' => $active_count,
        //         'sold_count' => $sold_count,
        //         'location_id' => $city->id,
        //         'locationable_type' => '\Robust\RealEstate\Models\City'
        //     ]);
        //     \DB::table('real_estate_listings')
        //         ->where('city_id', $city->id)
        //         ->update(['city_id' => $id]);
        // }

        // $this->info('Adding Counties');
        // $counties = \DB::table('real_estate_counties')->get();
        // foreach($counties as $county){
        //     $active_count = \DB::table('real_estate_listings')->where('status', 'Active')->where('county_id', $county->id)->count();
        //     $sold_count = \DB::table('real_estate_listings')->where('status', 'Closed')->where('county_id', $county->id)->count();
          
          
        //     $id = \DB::table('real_estate_locations')->insertGetId([
        //         'name' => $county->name,
        //         'slug' => $county->slug,
        //         'active_count' => $active_count,
        //         'sold_count' => $sold_count,
        //         'location_id' => $county->id,
        //         'locationable_type' => '\Robust\RealEstate\Models\County'
        //     ]);

        //     \DB::table('real_estate_listings')
        //         ->where('county_id', $county->id)
        //         ->update(['county_id' => $id]);
        // }

        // $this->info('Adding Areas');
        // $areas = \DB::table('real_estate_areas')->get();
        // foreach($areas as $area){
        //     $active_count = \DB::table('real_estate_listings')->where('status', 'Active')->where('area_id', $area->id)->count();
        //     $sold_count = \DB::table('real_estate_listings')->where('status', 'Closed')->where('area_id', $area->id)->count();
          
        //     $id = \DB::table('real_estate_locations')->insertGetId([
        //         'name' => $area->name,
        //         'slug' => $area->slug,
        //         'active_count' => $active_count,
        //         'sold_count' => $sold_count,
        //         'location_id' => $area->id,
        //         'locationable_type' => '\Robust\RealEstate\Models\Area'
        //     ]);

        //     \DB::table('real_estate_listings')
        //         ->where('area_id', $area->id)
        //         ->update(['area_id' => $id]);
        // }


        // $this->info('Adding Zip');
        // $zips = \DB::table('real_estate_zips')->get();
        // foreach($zips as $zip){
        //     $active_count = \DB::table('real_estate_listings')->where('status', 'Active')->where('zip_id', $zip->id)->count();
        //     $sold_count = \DB::table('real_estate_listings')->where('status', 'Closed')->where('zip_id', $zip->id)->count();
          
        //     $id = \DB::table('real_estate_locations')->insertGetId([
        //         'name' => $zip->name,
        //         'slug' => $zip->slug,
        //         'active_count' => $active_count,
        //         'sold_count' => $sold_count,
        //         'location_id' => $zip->id,
        //         'locationable_type' => '\Robust\RealEstate\Models\Zip'
        //     ]);

        //     \DB::table('real_estate_listings')
        //         ->where('zip_id', $zip->id)
        //         ->update(['zip_id' => $id]);
        // }

        // $this->info('Adding Elementary School');
        // $real_estate_elementary_schools = \DB::table('real_estate_elementary_schools')->get();
        // foreach($real_estate_elementary_schools as $element_school){
        //     $active_count = \DB::table('real_estate_listings')->where('status', 'Active')->where('elementary_school_id', $element_school->id)->count();
        //     $sold_count = \DB::table('real_estate_listings')->where('status', 'Closed')->where('elementary_school_id', $element_school->id)->count();
          
        //     $id = \DB::table('real_estate_locations')->insertGetId([
        //         'name' => $element_school->name,
        //         'slug' => $element_school->slug,
        //         'active_count' => $active_count,
        //         'sold_count' => $sold_count,
        //         'location_id' => $element_school->id,
        //         'locationable_type' => '\Robust\RealEstate\Models\ElementarySchool'
        //     ]);

        //     \DB::table('real_estate_listings')
        //         ->where('elementary_school_id', $element_school->id)
        //         ->update(['elementary_school_id' => $id]);
        // }


        // $this->info('Adding High School');
        // $real_estate_high_schools = \DB::table('real_estate_high_schools')->get();
        // foreach($real_estate_high_schools as $high_school){
        //     $active_count = \DB::table('real_estate_listings')->where('status', 'Active')->where('high_school_id', $high_school->id)->count();
        //     $sold_count = \DB::table('real_estate_listings')->where('status', 'Closed')->where('high_school_id', $high_school->id)->count();
          
        //     $id = \DB::table('real_estate_locations')->insertGetId([
        //         'name' => $high_school->name,
        //         'slug' => $high_school->slug,
        //         'location_id' => $high_school->id,
        //         'active_count' => $active_count,
        //         'sold_count' => $sold_count,
        //         'locationable_type' => '\Robust\RealEstate\Models\HighSchool'
        //     ]);
        //     \DB::table('real_estate_listings')
        //         ->where('high_school_id', $high_school->id)
        //         ->update(['high_school_id' => $id]);
        // }

        // $this->info('Adding Middle School');
        // $real_estate_middle_schools = \DB::table('real_estate_middle_schools')->get();
        // foreach($real_estate_middle_schools as $middle_school){
        //     $active_count = \DB::table('real_estate_listings')->where('status', 'Active')->where('middle_school_id', $middle_school->id)->count();
        //     $sold_count = \DB::table('real_estate_listings')->where('status', 'Closed')->where('middle_school_id', $middle_school->id)->count();
          
        //     $id = \DB::table('real_estate_locations')->insertGetId([
        //         'name' => $middle_school->name,
        //         'slug' => $middle_school->slug,
        //         'location_id' => $middle_school->id,
        //         'active_count' => $active_count,
        //         'sold_count' => $sold_count,
        //         'locationable_type' => '\Robust\RealEstate\Models\MiddleSchool'
        //     ]);
        //     \DB::table('real_estate_listings')
        //         ->where('middle_school_id', $middle_school->id)
        //         ->update(['middle_school_id' => $id]);
        // }
       
    }
}
