<?php


namespace Robust\RealEstate\Controllers\Website;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Website\StyleRepository;


/**
 * Class StyleController
 * @package Robust\RealEstate\Controllers\Website
 */
class StyleController extends Controller
{

    /**
     * @var StyleRepository
     */
    protected $model;


    /**
     * StyleController constructor.
     * @param StyleRepository $model
     */
    public function __construct(StyleRepository $model)
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
