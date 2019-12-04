<?php
namespace Robust\Core\Controllers\Admin\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


/**
 * Trait UserTrait
 * @package Robust\Core\Controllers\Admin\Traits
 */
trait UserTrait
{
    /**
     * @return mixed
     */
    public function index()
    {
        return $this->resource::collection($this->model->with('member')->get());
    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $model = $this->model->find($id);
        if($model){
            return new $this->resource($this->model->find($id)->with('member')->first());
        }
        return response()->json(['message'=>'Data not found']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if(isset($this->storeRequest)){
            $validator = Validator::make($data,$this->storeRequest);
            if($validator->fails()){
                return response()->json(['errors' => $validator->errors()],422);
            }
        }
        $member = $this->model->store($data);
        $data['member_id'] = $member->id;
        $data['member_type'] = $this->namespace;
        $this->user->store($data);
        return response()->json(['message' => 'Success']);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request)
    {
        $data = $request->all();
        if(isset($this->updateRequest)){
            $validator = Validator::make($data,$this->updateRequest);
            if($validator->fails()){
                return response()->json(['errors' => $validator->errors()],422);
            }
        }
        $this->model->update($id,$data);
        $admin = $this->model->find($id)->with('member')->first();
        $this->user->update($admin->member->id,$data);
        return response()->json(['message' => 'Success']);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json(['message' => 'success']);
    }
}