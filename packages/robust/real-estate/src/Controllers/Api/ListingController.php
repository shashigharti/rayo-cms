<?php

namespace Robust\RealEstate\Controllers\Api;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Api\ListingRepository;

/**
 * Class ListingController
 * @package Robust\RealEstate\Controllers\Api
 */
class ListingController extends Controller
{
    /**
     * @var ListingRepository
     */
    protected $model;

    /**
     * ListingRepository constructor.
     */
    public function __construct(ListingRepository $model)
    {
        $this->model = $model;
    }


    /**
     * @param Request $request
     * @param $type
     * @param $slug
     * @return JSON
     */
    public function getListings(Request $request, $type, $slug){
       
    }
}
