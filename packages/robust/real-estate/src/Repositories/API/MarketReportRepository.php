<?php
namespace Robust\RealEstate\Repositories\API;

use Illuminate\Database\Eloquent\Builder;
use Robust\RealEstate\Models\MarketReport;
use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\RealEstate\Repositories\Interfaces\IMarketReport;
use Robust\RealEstate\Repositories\Common\Traits\MarketReportTrait;
use Robust\RealEstate\Repositories\API\MarketReportRepository;

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
