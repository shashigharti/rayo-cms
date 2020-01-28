<?php

namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Models\CoreSetting;
use Robust\RealEstate\Models\Location;
use Robust\RealEstate\Models\MarketReport;

/**
 * Class MarketReportHelper
 * @package Robust\RealEstate\Helpers
 */
class MarketReportHelper
{

    /**
     * @param $location_type
     * @param $location_slug
     * @return int
     */
    public function getSubdivisionsMinPrice($location_type, $location_slug)
    {
        $settings = settings('real-estate', 'market_report');
        $location = Location::where('locationable_type', get_class_by_location_type($location_type))
            ->where('slug', $location_slug)->first();

        $min = MarketReport::whereIn('location_id', function ($query) use ($location) {
            $query->select('real_estate_locations.id')
                ->from('real_estate_locations')
                ->where('real_estate_subdivisions.city_id', $location->id)
                ->where('real_estate_locations.locationable_type', 'Robust\\RealEstate\\Models\\Subdivision')
                ->join('real_estate_subdivisions', 'real_estate_subdivisions.id', 'real_estate_locations.locationable_id')
                ->get();
        })->where('location_type', 'Robust\\RealEstate\\Models\\Subdivision')->min($settings['price_range_comparision_field'] ?? 'median_price_active');
        return $min ?? 0;
    }
}
