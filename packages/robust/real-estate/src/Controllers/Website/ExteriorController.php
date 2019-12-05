<?php


namespace Robust\RealEstate\Controllers\Website;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Website\ExteriorRepository;


/**
 * Class ExteriorController
 * @package Robust\RealEstate\Controllers\Website
 */
class ExteriorController extends Controller
{

    /**
     * @var ExteriorRepository
     */
    protected $model;


    /**
     * ExteriorController constructor.
     * @param ExteriorRepository $model
     */
    public function __construct(ExteriorRepository $model)
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
