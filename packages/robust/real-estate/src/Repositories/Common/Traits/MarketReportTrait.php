<?php

namespace Robust\RealEstate\Repositories\Common\Traits;

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
    public function getReports($location_type){
        $qBuilder = $this->model
            ->where('reportable_type', IMarketReport::REPORTABLE_MAP[$location_type]);

        if(isset($data['type'])){
            $sub_location_type = $data['type'];
            $reportable_type = MarketReportRepository::LOCATION_TYPES_WITH_SUBLOCATIONS[$sub_location_type]['reportable_type'];            
            $qBuilder = $qBuilder->whereHasMorph(
                'reportable',
                [$reportable_type],
                function (Builder $query) use($data) {
                    $query->whereIn(MarketReportRepository::PARAM_MAP[$data['type']], explode(',', $data['ids']));
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
    public function getInsight($location_type, $slug){
        $response = [];
        $reportable_type = MarketReportRepository::REPORTABLE_MAP[$location_type];

        $report = $this->model
            ->where('reportable_type', MarketReportRepository::REPORTABLE_MAP[$location_type])
            ->whereHasMorph(
                'reportable',
                [MarketReportRepository::REPORTABLE_MAP[$location_type]],
                function (Builder $query) use($slug) {
                    $query->where('slug', $slug);
                })->first();

        // Get insights of listing for this domain
        $response['insights'] = $report->reportable->listings()
            ->select(\DB::raw(implode(',', MarketReportRepository::INSIGHTS)))
            ->groupBy('year')
            ->groupBy('month')
            ->groupBy('year')
            ->get();

        // Get sub locations within this domain if any : example subdivisions for cities
        if(array_key_exists($location_type, MarketReportRepository::LOCATION_TYPES_WITH_SUBLOCATIONS)){
            $field = MarketReportRepository::LOCATION_TYPES_WITH_SUBLOCATIONS[$location_type]['field'];
            $reportable_type = MarketReportRepository::LOCATION_TYPES_WITH_SUBLOCATIONS[$location_type]['reportable_type'];

            $sub_location_reports = $this->model
                ->where('reportable_type', $reportable_type)
                ->whereHasMorph(
                    'reportable',
                    [$reportable_type],
                    function (Builder $query) use($field, $report) {
                        $query->where($field, $report->reportable->id);
                    })->get();
            $response['records'] = $sub_location_reports;
            $response['sub_location_type'] = MarketReportRepository::LOCATION_TYPES_WITH_SUBLOCATIONS[$location_type]['sub_location_type'];
        }

        return $response;
    }
  
}
