<?php
namespace Robust\RealEstate\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\RealEstate\Repositories\API\MarketReportRepository;

/**
 * Class MarketReportController
 * @package Robust\RealEstate\Controllers\API
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
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSubdivisions(Request $request, $location_type, $slug){
        $data = $request->all();
        $records = $this->model->getSubdivisions($location_type, $slug)
            ->wherePriceBetween(explode('-', $data['price']))
            ->get();
        return response()->json($records);
    }
}
