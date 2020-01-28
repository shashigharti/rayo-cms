<?php

namespace Robust\RealEstate\Controllers\Website;


use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Website\ListingRepository;

/**
 * Class MarketSurveyController
 * @package Robust\RealEstate\Controllers\Website
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
     * @param $location_type
     * @param $location
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index($location_type, $location)
    {
        $geolocation = geocode(ucwords(str_replace('-', ' ', $location)));
        $data = [
            'type' => $location_type,
            'slug' => $location,
            'geocode' => $geolocation['geometry']['location']
        ];

        return view('core::website.market-survey.index', [
                'location' => $data
            ]
        );
    }
}
