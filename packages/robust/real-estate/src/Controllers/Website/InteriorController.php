<?php


namespace Robust\RealEstate\Controllers\Website;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Website\InteriorRepository;


/**
 * Class InteriorController
 * @package Robust\RealEstate\Controllers\Website
 */
class InteriorController extends Controller
{

    /**
     * @var InteriorRepository
     */
    protected $model;


    /**
     * InteriorController constructor.
     * @param InteriorRepository $model
     */
    public function __construct(InteriorRepository $model)
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
