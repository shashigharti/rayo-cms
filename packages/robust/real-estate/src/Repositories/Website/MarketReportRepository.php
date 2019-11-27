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
    public function getLocations($location_type, $data){
        $query = $this->model
        ->where('reportable_type', MarketReportRepository::REPORTABLE_MAP[$location_type]);

        if(isset($data['type'])){
            $query = $query->whereHasMorph(
            'reportable',
            [MarketReportRepository::REPORTABLE_MAP[$location_type]],
            function (Builder $query) use($data) {
                $query->whereIn(MarketReportRepository::PARAM_MAP[$data['type']], explode(',', $data['ids']));
            });
        }
        $reports = $query->get();
        return ($reports)?$reports:[];
    }

    public function getComparedData($location_type,$data)
    {
        $listings  = 'listings';
        $name = 'real_estate_'.$location_type;
        $ClosedStatus = 'Sold';
        $ActiveStatus = 'Active';
        $columnName = 'input_date';
        $type =  MarketReportRepository::REPORTABLE_MAP[$location_type];
        $locations = $type::leftJoin($listings,$listings.'.city','=',$name.'.name')
            ->groupBy($name.'.id')
            ->whereIn($name.'.id',explode(',',$data))
            ->select($name.'.*');
        $collections = $locations->groupBy(\DB::raw('YEAR(listings.'.$columnName.')'))
            ->groupBy(\DB::raw('MONTH(listings.'.$columnName.')'))
            ->addSelect([

                \DB::raw("SUM( IF(status='Active', 1, 0) ) as count_active"),
                \DB::raw("SUM( IF(status='" . $ClosedStatus . "', 1, 0) ) as count_sold"),
                \DB::raw("AVG( IF(status='" . $ClosedStatus . "', system_price, NULL) ) as avg_system_price"),
                \DB::raw("ROUND(AVG( IF(status='" . $ClosedStatus . "', IF(days_on_mls IS NULL OR days_on_mls = 0,DATEDIFF('".date('Y-m-d')."',IF(input_date = '0000-00-00 00:00:00', update_date,input_date)),days_on_mls), NULL) )) as avg_days_on_mls"),
                \DB::raw("ROUND((SUM( IF(status='" . $ClosedStatus . "', sold_price, 0) )/SUM( IF(status='" . $ClosedStatus . "', system_price, 0) ))*100, 2) as percent"),
                \DB::raw('YEAR(listings.'.$columnName.') as year'),
                \DB::raw('MONTHNAME(listings.'.$columnName.') as month'),
            ])
            ->orderBy(\DB::raw('MONTH(listings.'.$columnName.')'), 'ASC')
            ->whereYear('listings.'.$columnName, '>=', 2016)
            ->get()
            ->groupBy('name');
        return $collections;
    }
}
