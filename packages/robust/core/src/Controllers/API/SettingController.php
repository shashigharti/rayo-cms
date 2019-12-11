<?php


namespace Robust\Core\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Robust\Core\Repositories\Api\SettingRepository;
use Robust\Core\Resources\Setting as CoreSettingResource;


class SettingController extends Controller
{

    protected $model;


    public function __construct(SettingRepository $model)
    {
        $this->model = $model;
    }

    public function getByType($slug)
    {
        if($this->model->where('slug',$slug)->first()){
            return new CoreSettingResource($this->model->where('slug', $slug)->first());
        }
        return  response()->json(['data' => []]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $data['values'] = json_encode($data['values']);
        $this->model->updateOrCreate(['slug' => $data['slug']],$data);
    }
}
