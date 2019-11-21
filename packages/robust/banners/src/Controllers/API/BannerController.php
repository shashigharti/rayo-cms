<?php

namespace Robust\Banners\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Robust\Banners\Helpers\BannerHelper;
use Robust\Banners\Repositories\BannerRepository;
use Robust\Core\Controllers\Admin\Controller;
use Robust\Core\Controllers\Admin\Traits\ApiTrait;

/**
 * Class BannerController
 * @package Robust\Banners\Controllers\API
 */
class BannerController extends Controller
{
    use ApiTrait;
    protected $model,$resource,$storeRequest,$updateRequest;

    public function __construct(BannerRepository $model)
    {
        $this->model = $model;
        $this->resource = 'Robust\Banners\Resources\Banner';
        $this->storeRequest = [
          'name' => 'required|max:255',
           'slug' => 'required|max:255',
            'banner_template' => 'required'
        ];
        $this->updateRequest = [
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
            'type' => 'required'
        ];
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
        $properties = [
            'header' => $data['header'] != null ? $data['header'] : '',
            'area_types' => $data['area_types'] != null ? $data['area_types'] : '',
            'sub_areas' => $data['sub_areas'] != null ? $data['sub_areas'] : '',
            'property_ids' => $data['property_ids'] != null ? $data['property_ids'] : '',
            'button_text' => $data['button_text'] != null ? $data['button_text'] : '',
            'button_url' => $data['button_url'] != null ? $data['button_url'] : '',
            'prices' => $data['prices'] != null ? $data['prices'] : '',
            'locations' => $data['locations'] != null ? $data['locations'] : '',
        ];
        $data['type'] = $data['banner_template'];
        $data['slider'] = $data['type'] == 'Slider' ? 1 : 0;
        $data['properties'] = json_encode($properties);
        $this->model->store($data);
        return response()->json(['message' => 'success']);

    }
    /**
     * @param $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll($slug)
    {
        $banner = with(new BannerHelper())->getBanners($slug);
        return response()->json($banner->sortByDesc('created_at')->values());
    }
}
