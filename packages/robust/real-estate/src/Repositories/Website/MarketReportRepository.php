<?php
namespace Robust\RealEstate\Repositories\Website;

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
        'cities' => 'Robust\RealEstate\Models\City'
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
     * @param $type
     * @return mixed
     */
    public function getLocations($type){
        $reports = $this->model
        ->where('reportable_type', MarketReportRepository::REPORTABLE_MAP['cities'])->get();
        return $reports;
    }
}
