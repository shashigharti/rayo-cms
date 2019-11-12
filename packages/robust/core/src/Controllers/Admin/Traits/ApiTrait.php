<?php
namespace Robust\Core\Controllers\Admin\Traits;

use Illuminate\Http\Request;


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
        $this->model->store($data);
        return response()->json(['message' => 'success']);
    }

    public function update($id, Request $request)
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
