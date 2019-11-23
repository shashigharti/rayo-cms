<?php
namespace Robust\RealEstate\Controllers\Website;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\RealEstate\Repositories\Website\MarketReportRepository;

/**
 * Class MarketReportController
 * @package Robust\RealEstate\Controllers\Website
 */
class MarketReportController extends Controller
{
    /**
     * @var MarketReport
     */
    protected $model;

    /**
     * MarketReportController constructor.
     * @param MarketReport $model
     */
    public function __construct(MarketReportRepository $model)
    {
        $this->model = $model;
    }

    /**
     * MarketReportController constructor.
     * @param String $type
     */
    public function index($type){

    }
}
