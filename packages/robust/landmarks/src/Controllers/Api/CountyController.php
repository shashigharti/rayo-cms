<?php

namespace Robust\Landmarks\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\LandMarks\Repositories\Admin\CountyRepository;
use Robust\Landmarks\Resources\County as CountyResource;



class CountyController extends Controller
{
    /**
     * @var CountyRepository
     */
    protected $model ;

    /**
     * CountyController constructor.
     * @param CountyRepository $model
     */
    public function __construct(CountyRepository $model)
    {
        $this->model = $model;
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return CountyResource::collection($this->model->paginate(10));
    }

    public function show($id)
    {
        return new CountyResource($this->model->find($id));
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

    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json(['message' => 'success']);
    }
}


