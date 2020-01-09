<?php
namespace Robust\RealEstate\Console\Commands;

use Robust\RealEstate\Models\Listing;
use Illuminate\Console\Command;
use Robust\RealEstate\Models\ListingProperty;
use Robust\RealEstate\Models\Location;


/**
 * Class UpdateLocationsCount
 * @package App\Console\Commands
 */
class UpdateLocationsCount extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'rws:update-locations-count';
    /**
     * The console command description.
     * @var string
     */
    protected $description = "Update locations count";

    /**
     * @var array
     */
    protected $mapping = [
        'Robust\RealEstate\Models\City' => 'city_id',
        'Robust\RealEstate\Models\County' => 'county_id',
        'Robust\RealEstate\Models\Area' =>'area_id',
        'Robust\RealEstate\Models\ElementarySchool' => 'elementary_school_id',
        'Robust\RealEstate\Models\MiddleSchool' => 'middle_school_id',
        'Robust\RealEstate\Models\HighSchool' => 'high_school_id',
        'Robust\RealEstate\Models\Zip' => 'zip_id',
        'Robust\RealEstate\Models\Subdivision' => 'subdivision_id',
    ];
    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        $locations = Location::get();
        foreach ($locations as $location)
        {
            if(isset($this->mapping[$location->locationable_type])){
                $active_count = \DB::table('real_estate_listings')->where('status', 'Active')
                ->where($this->mapping[$location->locationable_type], $location->id)->count();
                $sold_count = \DB::table('real_estate_listings')->where('status', 'Closed')
                    ->where($this->mapping[$location->locationable_type], $location->id)->count();

                $location->update([
                    'active_count' => $active_count,
                    'sold_count' => $sold_count,
                ]);

                $this->info('Name : '.  $location->name . ' || Active : ' .$active_count. ' || Sold : ' . $sold_count);
            }
        }

        ///to be moved from here
        $locations = Location::where('locationable_type','Robust\RealEstate\Models\Subdivision')->get();
        foreach ($locations as $location){
            $listing = Listing::where('subdivision_id',$location->id)->first();
            if($listing){
                $subdivision = \DB::table('real_estate_subdivisions')
                    ->where('id', $location->locationable_id)
                    ->update([
                        'city_id' => $listing->city_id,
                        'zip_id' => $listing->zip_id,
                        'county_id' => $listing->county_id,
                        'area_id' => $listing->area_id
                    ]);
            }
        }
    }
}
