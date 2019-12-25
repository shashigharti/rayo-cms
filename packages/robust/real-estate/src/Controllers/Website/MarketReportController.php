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
    public function index(Request $request, $location_type){
        $data = $request->all();
        $records = $this->model->getReports($location_type, $data)
        ->get();

        $response_data = [
            'records' => $records,
            'page_content' => 'market-report',
            'sub_location_type' => count($data) > 0 ? $location_type: '',
            'title' => '',
            'page_type' => $location_type
        ];

        if(isset($data['ids'])){
            $response_data['title'] = ucwords(str_replace('-', ' ', $data['ids']));
        }

        return view('real-estate::website.market-report.index', $response_data);
    }


    /**
     * @param Request $request
     * @param $location_type
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getInsights(Request $request, $location_type, $slug){        
        $response = $this->model->getInsights($location_type, $slug);
        return view('real-estate::website.market-report.insight', [
            'data' => $response,
            'isInsight' => true,
            'page_type' => $location_type,
            'page_content' => 'insight',
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'location_name_slug' => $slug,
            'sub_location_type' => $response['sub_location_type'] ?? null
        ]);
    }
}
