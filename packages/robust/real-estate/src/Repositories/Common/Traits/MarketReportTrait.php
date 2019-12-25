<?php

namespace Robust\RealEstate\Repositories\Common\Traits;

use Illuminate\Database\Eloquent\Builder;
use Robust\RealEstate\Repositories\Interfaces\IMarketReport;

/**
 * Class MarketReportTrait
 * @package Robust\RealEstate\Repositories\Common\Traits
 */
trait MarketReportTrait
{
    
    /**
     * Queries report table and return locations
     *
     * @param string $location_type
     * @param string|array $data
     * @return mixed
     */
    public function getReports($location_type, $data = []){
        $qBuilder = $this->model
            ->where('reportable_type', IMarketReport::REPORTABLE_MAP[$location_type]);

        if(isset($data['by'])){ 
            
            $ids = $this->location
            ->select('locationable_id')
            ->where('locationable_type', IMarketReport::REPORTABLE_MAP[$data['by']])
            ->whereIn('slug', explode(",", $data['ids']))
            ->pluck('locationable_id')
            ->toArray();
            
            $sub_location_type = $data['by'];
            $reportable_type = IMarketReport::LOCATION_TYPES_WITH_SUBLOCATIONS[$sub_location_type]['reportable_type'];            
            $qBuilder = $qBuilder->whereHasMorph(
                'reportable',
                [$reportable_type],
                function (Builder $query) use($data) {
                    $query->whereIn(IMarketReport::PARAM_MAP[$data['by']], explode(',', $data['ids']));
                });
        }  
        $this->model = $qBuilder;
        return $this;
    }    

     /**
     * @return QueryBuilder this
     */
    public function wherePriceBetween($params){
        $settings = config("rws.market-report.price-range");
        if(count($params) > 0){
            $this->model = $this->model->whereBetween($settings["field-to-compare"], $params);
        }
        return $this;
    }

     /**
     * Queries report table and listings
     *
     * @param string $location_type
     * @param string $slug
     * @return mixed
     */
    public function getInsights($location_type, $slug){
        $response = [];
        $reportable_type = IMarketReport::REPORTABLE_MAP[$location_type];

        $report = $this->model
            ->where('reportable_type', IMarketReport::REPORTABLE_MAP[$location_type])
            ->whereHasMorph(
                'reportable',
                [IMarketReport::REPORTABLE_MAP[$location_type]],
                function (Builder $query) use($slug) {
                    $query->where('slug', $slug);
                })->first();

        // Get sub locations within this domain if any : example subdivisions for cities
        if(array_key_exists($location_type, IMarketReport::LOCATION_TYPES_WITH_SUBLOCATIONS)){           
            $response['sub_location_type'] = IMarketReport::LOCATION_TYPES_WITH_SUBLOCATIONS[$location_type]['sub_location_type'];
        }

        // Get insights of listing for this domain
        $response['insights'] = $report->reportable->listings()
            ->select(\DB::raw(implode(',', IMarketReport::INSIGHTS)))
            ->groupBy('year')
            ->groupBy('month')
            ->get();

        return $response;
    }

    /**
     * Queries report table and listings
     *
     * @param string $location_type
     * @param string $slug
     * @return mixed
     */
    public function getSubdivisions($location_type, $slug){

        $response = [];
        $reportable_type = IMarketReport::REPORTABLE_MAP[$location_type];

        $report = $this->model
            ->where('reportable_type', IMarketReport::REPORTABLE_MAP[$location_type])
            ->whereHasMorph(
                'reportable',
                [IMarketReport::REPORTABLE_MAP[$location_type]],
                function (Builder $query) use($slug) {
                    $query->where('slug', $slug);
                })->first();

        // Get sub locations within this domain if any : example subdivisions for cities
        if(array_key_exists($location_type, IMarketReport::LOCATION_TYPES_WITH_SUBLOCATIONS)){
            $field = IMarketReport::LOCATION_TYPES_WITH_SUBLOCATIONS[$location_type]['field'];
            $reportable_type = IMarketReport::LOCATION_TYPES_WITH_SUBLOCATIONS[$location_type]['reportable_type'];

            $qBuilder = $this->model
                ->where('reportable_type', $reportable_type)
                ->whereHasMorph(
                    'reportable',
                    [$reportable_type],
                    function (Builder $query) use($field, $report) {
                        $query->where($field, $report->reportable->id);
                    });         
        }

        $this->model = $qBuilder;
        return $this;
    }
  
}
