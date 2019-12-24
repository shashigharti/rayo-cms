<?php
namespace Robust\RealEstate\Repositories\API;

use Illuminate\Database\Eloquent\Builder;
use Robust\RealEstate\Models\MarketReport;
use Robust\Core\Repositories\API\Traits\CommonRepositoryTrait;

/**
 * Class MarketReportRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class MarketReportRepository
{
    use CommonRepositoryTrait;

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
        'zips' => 'Robust\RealEstate\Models\Zip',
        'school_districts' => 'Robust\RealEstate\Models\SchoolDistrict',
        'counties' => 'Robust\RealEstate\Models\County',
        'areas' => 'Robust\RealEstate\Models\Area',
        'high_schools' => 'Robust\RealEstate\Models\HighSchool'
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
        'cities' => [
            'sub_location_type'=>'subdivisions',
            'field' => 'city_id',
            'reportable_type' => 'Robust\RealEstate\Models\Subdivision'
        ]
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
    public function getReports($location_type){
        $qBuilder = $this->model
            ->where('reportable_type', MarketReportRepository::REPORTABLE_MAP[$location_type]);

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
}
