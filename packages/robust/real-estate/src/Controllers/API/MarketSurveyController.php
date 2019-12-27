<?php
namespace Robust\RealEstate\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\RealEstate\Repositories\API\ListingRepository;

/**
 * Class MarketSurveyController
 * @package Robust\RealEstate\Controllers\API
 */
class MarketSurveyController extends Controller
{

    /**
     * @var ListingRepository
     */
    protected $model;


    /**
     * MarketReportController constructor.
     * @param ListingRepository $model
     */
    public function __construct(ListingRepository $model)
    {
        $this->model = $model;
    }

    /**
     * @param Request $request
     * @return Illuminate\Http\JsonResponse
     */
    public function getListings(Request $request){
        $price_range = $request->has('price')? explode('-', $request->get('price')) : null;
        $data = $request->except('price');
        $qBuilder = $this->model->getListings($data);
        if(is_array($price_range)){
            $qBuilder = $qBuilder->wherePriceBetween($price_range);
        }
        $records = $qBuilder->get(); 
        return response()->json($records);
    }
}
