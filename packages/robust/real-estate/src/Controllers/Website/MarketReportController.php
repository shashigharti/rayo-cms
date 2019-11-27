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
     */
    public function __construct(MarketReportRepository $model)
    {
        $this->model = $model;
    }


    public function index(Request $request, $location_type){
        $data = $request->all();
        $records = $this->model->getLocations($location_type, $data);
        return view('real-estate::website.market-report.index', ['records' => $records, 'page_type' => $location_type]);
    }

    public function getInsight(Request $request, $location_type, $slug){
        $data = $request->all();
        $records = $this->model->getLocations($location_type, $data);
        return view('real-estate::website.market-report.insight', ['records' => $records, 'page_type' => $location_type]);
    }

    public function compare(Request $request)
    {
        $data = $request->all();
        $records = $this->model->getLocations($data['type'],$data['ids']);
        $results = $this->model->getComparedData($data['type'],$data['ids']);
        return view('real-estate::website.market-report.compare', ['records' => $records, 'page_type' => $data['type']]);
    }
}
