<?php


namespace Robust\RealEstate\Controllers\Website;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Website\ConstructionRepository;

/**
 * Class ConstructionController
 * @package Robust\RealEstate\Controllers\Website
 */
class ConstructionController extends Controller
{
    /**
     * @var ConstructionRepository
     */
    protected $model;

    /**
     * ConstructionController constructor.
     * @param ConstructionRepository $model
     */
    public function __construct(ConstructionRepository $model)
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
