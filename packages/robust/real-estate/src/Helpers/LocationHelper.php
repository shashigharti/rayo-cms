<?php


namespace Robust\RealEstate\Helpers;

use Illuminate\Support\Facades\DB;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Models\Location;
use Robust\RealEstate\Repositories\Website\LocationRepository;

/**
 * Class LocationHelper
 * @package Robust\RealEstate\Helpers
 */
class LocationHelper
{
    /**
     * @var LocationRepository
     */
    protected $location;

    /**
     * LocationHelper constructor.
     * @param LocationRepository $location
     */
    public function __construct(LocationRepository $location)
    {
        $this->location = $location;
    }

    /**
     * @param String $types
     * @return array
     */
    public function getLocations($types)
    {
        $locations = [];
        foreach ($types as $type) {
            $locations[$type] = $this->location->getLocations(['type' => $type]);
            $locations[$type] = $this->hide($locations[$type], $type);
        }

        return $locations;
    }


    /**
     * @param $locations
     * @param $type
     * @return mixed
     */
    public function hide($locations, $type)
    {
        // This code will be changed later

        $settings = settings('front-page', 'zips_hide');
        if ($type == 'zips') {
            if (is_array($settings) && (key($settings) == 'counties')) {
                $counties_slugs = collect($settings['counties'])->pluck('slug');
                $counties_ids = Location::select('real_estate_locations.id')
                    ->whereNotIn('slug', $counties_slugs)
                    ->pluck('id');
                $zip_ids = Listing::select('real_estate_listings.zip_id')
                    ->whereIn('county_id', $counties_ids)
                    ->pluck('zip_id');
                return Location::whereIn('id', $zip_ids)->get();
            }

        }

        return $locations;
    }

    /**
     * @param $location
     * @return mixed
     */
    public function getLocation($location)
    {
        return $this->location->getLocation($location);
    }
}
