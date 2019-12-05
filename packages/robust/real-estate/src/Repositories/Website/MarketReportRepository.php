<?php
namespace Robust\RealEstate\Repositories\Website;

use Illuminate\Database\Eloquent\Builder;
use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\MarketReport;

/**
 * Class MarketReportRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class MarketReportRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * @var MarketReport model
     */
    protected $model;

    /**
     * @var const REPORTABLE_MAP
     */
    protected const REPORTABLE_MAP = [
        'cities' => 'Robust\RealEstate\Models\City',
        'subdivisions' => 'Robust\RealEstate\Models\Subdivision',
    ];

    /**
     * @var const PARAM_MAP
     */
    protected const PARAM_MAP = [
        'cities' => 'city_id'
    ];

    /**
     * @var const LOCATION_TYPES_WITH_SUBLOCATIONS
     */
    protected const LOCATION_TYPES_WITH_SUBLOCATIONS = [
        'cities' => ['sub_location_type'=>'subdivisions','field' => 'city_id','reportable_type' => 'Robust\RealEstate\Models\Subdivision']
    ];

    /**
     * @var const INSIGHTS
     */
    protected const INSIGHTS = [
        "SUM( IF(status = 'Active', 1, 0)) AS active_count",
        "AVG(system_price) system_price_avg",
        "AVG(days_on_mls) days_on_mls_avg",
        "AVG(sold_price) sold_price_avg",
        "YEAR(input_date) year",
        "MONTH(input_date) month"
    ];

    /**
     * MarketReportRepository constructor.
     * @param MarketReport $model
     */
    public function __construct(MarketReport $model)
    {
        $this->model = $model;
    }


    /**
     * Queries report table and return locations
     *
     * @param string $location_type
     * @param string|array $data
     * @return mixed
     */
    public function getLocations($location_type, $data = []){
        $query = $this->model
            ->where('reportable_type', MarketReportRepository::REPORTABLE_MAP[$location_type]);

        if(isset($data['type'])){
            $sub_location_type = $data['type'];
            $reportable_type = MarketReportRepository::LOCATION_TYPES_WITH_SUBLOCATIONS[$sub_location_type]['reportable_type'];            
            $query = $query->whereHasMorph(
                'reportable',
                [$reportable_type],
                function (Builder $query) use($data) {
                    $query->whereIn(MarketReportRepository::PARAM_MAP[$data['type']], explode(',', $data['ids']));
                });
        }
        $reports = $query->get();
        return ($reports)?$reports:[];
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
