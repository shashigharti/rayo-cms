<?php

namespace Robust\Landmarks\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\LandMarks\Repositories\Admin\CityRepository;
use Robust\Landmarks\Resources\City as CityResource;


/**
 * Class SettingsApiController
 * @package Robust\Settings\Controllers\Admin
 */
class CityApiController extends Controller
{
    protected $model;

    public function __construct(CityRepository $model)
    {
        $this->model = $model;
    }

    /**
     * @param \Robust\Landmarks\Model\City $city
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return CityResource::collection($this->model->paginate(10));
    }

    public function show($id)
    {
        return new CityResource($this->model->find($id));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $this->model->store($data);
        return response()->json(['message' => 'success']);
    }

    public function update($id,Request $request)
    {
        $data = $request->all();
        $this->model->update($id,$data);
        return response()->json(['message' => 'success']);
    }
}


