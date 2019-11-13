<?php
namespace Robust\Core\Controllers\Admin\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


trait ApiTrait
{
    public function index()
    {
        return $this->resource::collection($this->model->paginate(10));
    }

    public function edit($id)
    {
        $model = $this->model->find($id);
        if($model){
            return new $this->resource($this->model->find($id));
        }
        return response()->json(['message'=>'Data not found']);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if(isset($this->storeRequest)){
            $validator = Validator::make($data,$this->storeRequest);
            if($validator->fails()){
                return response()->json(['errors' => $validator->errors()],422);
            }
        }
        $this->model->store($data);
        return response()->json(['message' => 'success']);
    }

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
        return response()->json(['message' => 'success']);
    }

    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json(['message' => 'success']);
    }
}
