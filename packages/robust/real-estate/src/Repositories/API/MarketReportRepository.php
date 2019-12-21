<?php
namespace Robust\RealEstate\Repositories\API;

use Illuminate\Database\Eloquent\Builder;
use Robust\Core\Repositories\API\Traits\CommonRepositoryTrait;
use Robust\RealEstate\Models\MarketReport;

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
     * MarketReportRepository constructor.
     * @param MarketReport $model
     */
    public function __construct(MarketReport $model)
    {
        $this->model = $model;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getReports(){
        return $this->model->get();
    }
}
