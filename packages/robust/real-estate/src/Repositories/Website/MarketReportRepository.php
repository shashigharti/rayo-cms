<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Models\MarketReport;
use Robust\RealEstate\Repositories\Interfaces\IMarketReport;
use Robust\RealEstate\Repositories\Common\Traits\MarketReportTrait;
use Robust\RealEstate\Models\Location;

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
     * @param Location $location
     */
    public function __construct(MarketReport $model, Location $location, Listing $listing)
    {
        $this->model = $model;
        $this->location = $location;
        $this->listing = $listing;
    }


}
