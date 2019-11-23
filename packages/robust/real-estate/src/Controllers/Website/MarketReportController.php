<?php
namespace Robust\RealEstate\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\Core\Controllers\Admin\Traits\ViewTrait;
use Robust\Core\Controllers\Admin\Traits\CrudTrait;
use Robust\RealEstate\Repositories\Admin\MarketReportRepository;

/**
 * Class MarketReportController
 * @package Robust\Mls\Controllers\Admin
 */
class MarketReportController extends Controller
{
    /**
     * @var MarketReport
     */
    protected $model;

    /**
     * MarketReportController constructor.
     * @param Request $request
     * @param MarketReport $model
     */
    public function __construct(MarketReport $model)
    {
        $this->model = $model;
    }

    public function index($type){

    }
}
