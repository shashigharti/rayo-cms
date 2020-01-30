<?php

namespace Robust\RealEstate\Repositories\Common\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Robust\RealEstate\Repositories\Interfaces\IMarketReport;

/**
 * Class MarketReportTrait
 * @package Robust\RealEstate\Repositories\Common\Traits
 */
trait MarketReportTrait
{

    /**
     * @param $location_type
     * @param array $data
     * @return $this
     */
    public function getReports($location_type, $data = [])
    {
        $qBuilder = $this->model
            ->where('location_type', IMarketReport::LOCATION_TYPE_MAP[$location_type]);

        $this->model = $qBuilder;
        return $this;
    }

    /**
     * @param $params
     * @return $this
     */
    public function wherePriceBetween($params)
    {
        $settings = settings('real-estate', 'market_report');
        if (count($params) > 0) {
            $this->model = $this->model->whereBetween($settings['price_range_comparision_field'] ?? 'median_price_active', $params);
        }
        return $this;
    }

    /**
     * @param $location_type
     * @param $slug
     * @return array
     */
    public function getInsights($location_type, $slug)
    {
        $response = [];
        $report = $this->model
            ->where('location_type', IMarketReport::LOCATION_TYPE_MAP[$location_type])
            ->leftJoin('real_estate_locations', 'real_estate_locations.id', 'real_estate_market_reports.location_id')
            ->where('real_estate_locations.slug', $slug)
            ->first();

        // Get sub locations within this domain if any : example subdivisions for cities
        if (array_key_exists($location_type, IMarketReport::LOCATION_TYPES_WITH_SUBLOCATIONS)) {
            $response['sub_location_type'] = IMarketReport::LOCATION_TYPES_WITH_SUBLOCATIONS[$location_type]['sub_location_type'];
        }

        // Get insights of listing for this domain;
        $sql = $report->location
            ->listings()
            ->select(\DB::raw(implode(',', IMarketReport::INSIGHTS)))
            ->groupBy('year')
            ->groupBy('month')
            ->toSql();

        // DO NOT USE DB::select any where,
        // there is a issue of pivot table fields being appended in the query while using get() function by laravel framework,
        // so DB::select is being used here as an alternative solution
        $response['insights'] = DB::select($sql, [$report->location->id]);

        return $response;
    }


    /**
     * @param $location_type
     * @param $slug
     * @return $this
     */
    public function getSubdivisions($location_type, $slug)
    {
        $location = $this->model
            ->where('location_type', IMarketReport::LOCATION_TYPE_MAP[$location_type])
            ->leftJoin('real_estate_locations', 'real_estate_locations.id', 'real_estate_market_reports.location_id')
            ->where('real_estate_locations.slug', $slug)
            ->first();

        $field = IMarketReport::LOCATION_TYPES_WITH_SUBLOCATIONS[$location_type]['field'];
        $sub_location_type = IMarketReport::LOCATION_TYPES_WITH_SUBLOCATIONS[$location_type]['location_type'];
        $location_ids = $this->location->where('locationable_type', $sub_location_type)
            ->whereHasMorph(
                'locationable',
                [$sub_location_type],
                function (Builder $query) use ($field, $location) {
                    $query->where($field, $location->id);
                })
            ->pluck('real_estate_locations.id');

        $qBuilder = $this->model->whereIn('location_id', $location_ids);
        $this->model = $qBuilder;
        return $this;
    }


    /**
     * @param $data
     * @return mixed
     */
    public function compareLocations($data)
    {
        $location_type = $data['by'];
        $response = $this->listing
            ->select(\DB::raw(implode(',', IMarketReport::INSIGHTS_COMPARE)))
            ->whereHas('locations', function ($query) use ($location_type, $data) {
                $query->where('locationable_type', IMarketReport::LOCATION_TYPE_MAP[$location_type])
                    ->whereIn('slug', explode(",", $data['ids']));
            })
            ->groupBy('name')
            ->get();

        return $response;
    }

}
