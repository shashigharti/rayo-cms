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
        $this->info('Adding Cities');
        $cities = \DB::table('real_estate_cities')->get(); 
        foreach($cities as $city){
            \DB::table('real_estate_locations')->insert([
                'name' => $city->name,
                'slug' => $city->slug,
                'location_id' => $city->id,
                'locationable_type' => '\Robust\RealEstate\Models\City'
            ]);
        }

        $this->info('Adding Counties');
        $counties = \DB::table('real_estate_counties')->get();
        foreach($counties as $county){
            \DB::table('real_estate_locations')->insert([
                'name' => $county->name,
                'slug' => $county->slug,
                'location_id' => $county->id,
                'locationable_type' => '\Robust\RealEstate\Models\County'
            ]);
        }

        $this->info('Adding Areas');
        $areas = \DB::table('real_estate_areas')->get();
        foreach($areas as $area){
            \DB::table('real_estate_locations')->insert([
                'name' => $area->name,
                'slug' => $area->slug,
                'location_id' => $area->id,
                'locationable_type' => '\Robust\RealEstate\Models\Area'
            ]);
        }


        $this->info('Adding Zip');
        $zips = \DB::table('real_estate_zips')->get();
        foreach($zips as $zip){
            \DB::table('real_estate_locations')->insert([
                'name' => $zip->name,
                'slug' => $zip->slug,
                'location_id' => $zip->id,
                'locationable_type' => '\Robust\RealEstate\Models\Zip'
            ]);
        }

        $this->info('Adding Elementary School');
        $real_estate_elementary_schools = \DB::table('real_estate_elementary_schools')->get();
        foreach($real_estate_elementary_schools as $element_school){
            \DB::table('real_estate_locations')->insert([
                'name' => $element_school->name,
                'slug' => $element_school->slug,
                'location_id' => $element_school->id,
                'locationable_type' => '\Robust\RealEstate\Models\ElementarySchool'
            ]);
        }


        $this->info('Adding High School');
        $real_estate_high_schools = \DB::table('real_estate_high_schools')->get();
        foreach($real_estate_high_schools as $high_school){
            \DB::table('real_estate_locations')->insert([
                'name' => $high_school->name,
                'slug' => $high_school->slug,
                'location_id' => $high_school->id,
                'locationable_type' => '\Robust\RealEstate\Models\HighSchool'
            ]);
        }

        $this->info('Adding Middle School');
        $real_estate_middle_schools = \DB::table('real_estate_middle_schools')->get();
        foreach($real_estate_middle_schools as $middle_school){
            \DB::table('real_estate_locations')->insert([
                'name' => $middle_school->name,
                'slug' => $middle_school->slug,
                'location_id' => $middle_school->id,
                'locationable_type' => '\Robust\RealEstate\Models\MiddleSchool'
            ]);
        }

        // $this->info('Adding School District');
        // $real_estate_school_districts = \DB::table('real_estate_school_districts')->get();
        // foreach($real_estate_school_districts as $school_district){
        //     \DB::table('real_estate_locations')->insert([
        //         'name' => $school_district->name,
        //         'slug' => $school_district->slug,
        //         'location_id' => $middschool_districtle_school->id,
        //         'locationable_type' => '\Robust\RealEstate\Models\SchoolDistrict'
        //     ]);
        // }
       
    }
}
