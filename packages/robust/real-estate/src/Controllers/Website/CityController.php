<?php


namespace Robust\RealEstate\Controllers\Website;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Website\CityRepository;

/**
 * Class CityController
 * @package Robust\RealEstate\Controllers\Website
 */
class CityController extends Controller
{
    /**
     * @var CityRepository
     */
    protected $model;

    /**
     * CityController constructor.
     * @param CityRepository $model
     */
    public function __construct(CityRepository $model)
    {
        $this->model = $model;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = $this->model->select(['id','name'])->get();
        return response()->json(['data' => $data]);
    }
}
