<?php

namespace Robust\RealEstate\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\RealEstate\Models\Location;
use Robust\RealEstate\Repositories\API\ListingRepository;
use Robust\RealEstate\Models\Listing;

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
     * MarketSurveyController constructor.
     * @param ListingRepository $model
     */
    public function __construct(ListingRepository $model)
    {
        $this->model = $model;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getListings(Request $request)
    {
        $price_range = $request->has('price') ? explode('-', $request->get('price')) : [];
        $data = $request->except('price');
        $date_string = get_date_string($data['sold_status']);
        $prev_date = date('Y-m-d', strtotime("- $date_string"));

        $location = Location::where('slug', $data['location'])
            ->where('locationable_type', get_class_by_location_type($data['location_type']))->first();
        $data = [
            get_ids_by_location_type($data['location_type']) => $location->id
        ];
        $additional_fields = [
            'real_estate_listings.latitude',
            'real_estate_listings.longitude',
            'real_estate_listings.sold_price',
            'real_estate_listings.days_on_mls',
            'real_estate_listings.bedrooms',
            'real_estate_listings.baths_full',
            'real_estate_listings.address_number',
            'real_estate_listings.address_street'

        ];
        $records = $this->model->getListings($data, $additional_fields)
            ->with('images')
            ->with('property')
            ->wherePriceBetween($price_range)
            ->whereDateBetween([$prev_date, date("Y-m-d H:i:s")])
            ->get();

        return response()->json([
            'records' => $records,
            'fields' => settings('front-page', 'market_report_fields_mapping')
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getListingsByDistance(Request $request)
    {
        $params = $request->all();
        $records = $this->model->getListingsByDistance($params);
        return response()->json($records);
    }
}
