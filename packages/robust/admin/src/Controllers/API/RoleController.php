<?php

namespace Robust\Admin\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\Admin\Models\Role;
use Robust\Admin\Repositories\Admin\RoleRepository;
use Robust\Admin\Resources\RoleResource;

/**
 * Class RoleController
 * @package Robust\Admin\Controllers\API
 */
class RoleController extends Controller
{
    /**
     * @var RoleRepository
     */
    protected $model;

    /**
     * RoleController constructor.
     * @param RoleRepository $model
     */
    public function __construct(RoleRepository $model)
    {
        $this->model = $model;
    }


    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return RoleResource::collection($this->model->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $permissions = $data['permission'];
        $data['permission'] = [];
        foreach ($permissions as $permission)
        {
            array_push($data['permission'],$permission['name']);
        }
        $this->model->create($data);
        return response()->json('Success');
    }


    /**
     * @param $id
     * @return RoleResource
     */
    public function show($id)
    {
        return new  RoleResource(Role::where('id',$id)->with('permissions')->first());
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $permissions = $data['permission'];
        $data['permission'] = [];
        foreach ($permissions as $permission)
        {
            array_push($data['permission'],$permission['name']);
        }
        $this->model->update($id,$data);
        return response()->json('Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json('Success');
    }
}
