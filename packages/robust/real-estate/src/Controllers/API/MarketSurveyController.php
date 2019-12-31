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
        $price_range = $request->has('price')? explode('-', $request->get('price')) : [];
        $data = $request->except('price');
        $additional_fields = ["real_estate_listings.latitude", "real_estate_listings.longitude"];
        $records = $this->model->getListings($data, $additional_fields)
        ->wherePriceBetween($price_range)
        ->limit(6)
        ->get(); 
        return response()->json($records);
    }
}
