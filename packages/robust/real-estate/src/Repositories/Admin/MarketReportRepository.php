<?php
namespace Robust\RealEstate\Repositories\Admin;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\MarketReport;


class MarketReportRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * @var MarketReport
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
