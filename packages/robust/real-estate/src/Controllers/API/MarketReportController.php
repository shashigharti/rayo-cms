<?php
namespace Robust\RealEstate\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\Core\Repositories\API\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\API\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\API\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Repositories\API\MarketReportRepository;

/**
 * Class MarketReportController
 * @package Robust\RealEstate\Controllers\API
 */
class MarketReportController extends Controller
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * @var MarketReportRepository
     */
    protected $model;


    /**
     * MarketReportController constructor.
     * @param MarketReportRepository $model
     */
    public function __construct(MarketReportRepository $model)
    {
        $this->model = $model;
    }


    /**
     * @param Request $request
     * @param $location_type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getReports(Request $request, $location_type){
        $data = $request->all();
        $records = $this->model->getReports($location_type, $data);
        return response()->json($records);
    }
}
