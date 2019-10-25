<?php

namespace Robust\Landmarks\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\LandMarks\Repositories\Admin\ZipRepository;
use Robust\Landmarks\Resources\Zip as ZipResource;


/**
 * Class SettingsApiController
 * @package Robust\Settings\Controllers\Admin
 */
class ZipController extends Controller
{
    protected $model ;

    public function __construct(ZipRepository $model)
    {
        $this->model = $model;
    }

    /**
     * @param \Robust\Landmarks\Model\Zip $zip
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ZipResource::collection($this->model->paginate(10));
    }

    public function show($id)
    {
        return new ZipResource($this->model->where('id',$id)->with('city')->with('county')->first());
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $this->model->store($data);
        return response()->json(['message'=>'success']);
    }
    public function update($id,Request $request)
    {
        $data = $request->all();
        $this->model->update($id,$data);
        return response()->json(['message'=>'success']);
    }
}


