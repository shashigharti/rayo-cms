<?php


namespace Robust\RealEstate\Controllers\Website;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Website\CountyRepository;

/**
 * Class CountyController
 * @package Robust\RealEstate\Controllers\Website
 */
class CountyController extends Controller
{
    /**
     * @var CountyRepository
     */
    protected $model;

    /**
     * CountyController constructor.
     * @param CountyRepository $model
     */
    public function __construct(CountyRepository $model)
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
