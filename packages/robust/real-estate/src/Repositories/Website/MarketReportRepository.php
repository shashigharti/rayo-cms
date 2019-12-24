<?php
namespace Robust\RealEstate\Repositories\Website;

use Illuminate\Database\Eloquent\Builder;
use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\RealEstate\Models\MarketReport;
use Robust\RealEstate\Repositories\Interfaces\IMarketReport;
use Robust\RealEstate\Repositories\Common\Traits\MarketReportTrait;

/**
 * Class MarketReportRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class MarketReportRepository implements IMarketReport 
{
     use CommonRepositoryTrait, MarketReportTrait;

    /**
     * @var MarketReport model
     */
    protected $model;

    // /**
    //  * @var const REPORTABLE_MAP
    //  */
    // protected const REPORTABLE_MAP = [
    //     'cities' => 'Robust\RealEstate\Models\City',
    //     'subdivisions' => 'Robust\RealEstate\Models\Subdivision',
    //     'zips' => 'Robust\RealEstate\Models\Zip',
    //     'school_districts' => 'Robust\RealEstate\Models\SchoolDistrict',
    //     'counties' => 'Robust\RealEstate\Models\County',
    //     'areas' => 'Robust\RealEstate\Models\Area',
    //     'high_schools' => 'Robust\RealEstate\Models\HighSchool'
    // ];

    // /**
    //  * @var const LOCATION_TYPES_WITH_SUBLOCATIONS
    //  */
    // protected const LOCATION_TYPES_WITH_SUBLOCATIONS = [
    //     'cities' => [
    //         'sub_location_type'=>'subdivisions',
    //         'field' => 'city_id',
    //         'reportable_type' => 'Robust\RealEstate\Models\Subdivision'
    //     ]
    // ];

    // /**
    //  * @var const INSIGHTS
    //  */
    // protected const INSIGHTS = [
    //     "SUM( IF(status = 'Closed', 1, 0)) AS sold_count",
    //     "SUM( IF(status = 'Active', 1, 0)) AS active_count",
    //     "AVG(system_price) system_price_avg",
    //     "ROUND(AVG(days_on_mls), 0) as days_on_mls_avg",
    //     'ROUND(AVG(sold_price) / AVG(system_price) * 100, 2) as percent',
    //     "AVG(sold_price) sold_price_avg",
    //     "AVG(system_price) system_price_avg",
    //     "YEAR(input_date) year",
    //     "MONTH(input_date) month"
    // ];

    /**
     * MarketReportRepository constructor.
     * @param MarketReport $model
     */
    public function __construct(MarketReport $model)
    {
        $this->model = $model;
    }   
    
   
}
