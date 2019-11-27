<?php
namespace Robust\RealEstate\Controllers\Website;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
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
    public function index(Request $request, $location_type){
        $data = $request->all();
        $records = $this->model->getLocations($location_type, $data);
        return view('real-estate::website.market-report.index', ['records' => $records, 'page_type' => $location_type]);
    }


    /**
     * @param Request $request
     * @param $location_type
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getInsight(Request $request, $location_type, $slug){
        $response = $this->model->getInsight($location_type, $slug);
        return view('real-estate::website.market-report.insight', [
            'data' => $response,
            'page_type' => $location_type
        ]);
    }
}
