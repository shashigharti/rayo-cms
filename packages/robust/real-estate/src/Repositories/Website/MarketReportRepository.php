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

    /**
     * MarketReportRepository constructor.
     * @param MarketReport $model
     */
    public function __construct(MarketReport $model)
    {
        $this->model = $model;
    }   
    
   
}
