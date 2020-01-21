<?php
namespace Robust\RealEstate\Controllers\API;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\API\LocationRepository;

/**
 * Class LocationController
 * @package Robust\RealEstate\Controllers\API
 */
class LocationController extends Controller
{
    /**
     * @var LocationRepository
     */
    protected $model;


    /**
     * LocationController constructor.
     * @param LocationRepository $model
     */
    public function __construct(LocationRepository $model)
    {
        $this->model = $model;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $records = $this->model->getLocations([], ['id','name','slug', 'status', 'active_count', 'sold_count']);
        return response()->json(['data' => $records]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getLocationByType($type)
    {
        $records = $this->model->getLocations(['type' => $type], ['id','name','slug', 'status', 'active_count', 'sold_count']);
        return response()->json(['data' => $records]);
    }

}
