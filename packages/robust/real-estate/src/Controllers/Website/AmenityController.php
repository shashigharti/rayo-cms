<?php
namespace Robust\RealEstate\Controllers\Website;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Website\AmenityRepository;

/**
 * Class AmenityController
 * @package Robust\RealEstate\Controllers\Website
 */
class AmenityController extends Controller
{
    /**
     * @var AmenityRepository
     */
    protected $model;

    /**
     * AmenityController constructor.
     * @param AmenityRepository $model
     */
    public function __construct(AmenityRepository $model)
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
