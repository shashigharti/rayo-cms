<?php
namespace Robust\RealEstate\Controllers\Website;


use App\Http\Controllers\Controller;


/**
 * Class MarketSurveyController
 * @package Robust\RealEstate\Controllers\Website
 */
class MarketSurveyController extends Controller
{

    /**
     * @var
     */
    protected $model;


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('real-estate::website.market-survey.index');
    }
}
