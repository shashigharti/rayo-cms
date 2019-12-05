<?php


namespace Robust\RealEstate\Controllers\Website;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Website\SubdivisionRepository;

/**
 * Class SubdivisionController
 * @package Robust\RealEstate\Controllers\Website
 */
class SubdivisionController extends Controller
{
    /**
     * @var SubdivisionRepository
     */
    protected $model;

    /**
     * SubdivisionController constructor.
     * @param SubdivisionRepository $model
     */
    public function __construct(SubdivisionRepository $model)
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
