<?php


namespace Robust\RealEstate\Controllers\Website;

use App\Http\Controllers\Controller;
use Robust\RealEstate\Repositories\Website\ZipRepository;

/**
 * Class ZipController
 * @package Robust\RealEstate\Controllers\Website
 */
class ZipController extends Controller
{
    /**
     * @var ZipRepository
     */
    protected $model;

    /**
     * ZipController constructor.
     * @param ZipRepository $model
     */
    public function __construct(ZipRepository $model)
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
