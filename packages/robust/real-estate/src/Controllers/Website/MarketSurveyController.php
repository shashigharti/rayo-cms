<?php
namespace Robust\RealEstate\Controllers\Website;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


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
