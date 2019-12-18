<?php
namespace App\Console\Commands;

use Robust\RealEstate\Models\Listing;
use Illuminate\Console\Command;
use Robust\RealEstate\Models\ListingProperty;
use Robust\RealEstate\Models\ListingDetail;
use Robust\RealEstate\Models\Location;


/**
 * Class UpdateLocations
 * @package App\Console\Commands
 */
class UpdateLocations extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'rws:update-locations';
    /**
     * The console command description.
     * @var string
     */
    protected $description = "Update location table data";

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
}
