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
    /**
     * @var BannerRepository
     */
    /**
     * @var BannerRepository|string
     */
    /**
     * @var array|BannerRepository|string
     */
    /**
     * @var array|BannerRepository|string
     */
    /**
     * @var array|BannerRepository|string
     */
    protected $model,$resource,$storeRequest,$updateRequest,$templates;

    /**
     * BannerController constructor.
     * @param BannerRepository $model
     */
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
            'banner_template' => 'required'
        ];
        $this->templates = [
            'TwoColumnAd' => 'two-col-ad',
            'Slider' => 'slider',
            'FullScreenAd' => 'full-screen-ad',
            'SingleColumnBlock' => 'single-col-block',
            'BannerSlider' => 'banner-slider',
            'MainBanner' => 'main-banner'
        ];
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
        $properties = $this->properties($data);
        $data['template'] = $this->templates[$data['banner_template']];
        $data['properties'] = json_encode($properties);
        $this->model->store($data);
        return response()->json(['message' => 'success']);

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
        $properties = $this->properties($data);
        $data['template'] = $this->templates[$data['banner_template']];
        $data['properties'] = json_encode($properties);
        $this->model->update($id,$data);
        return response()->json(['message' => 'success']);

    }

    /**
     * @param $data
     * @return array
     */
    public function properties($data)
    {
        return [
            'header' => $data['header'] != null ? $data['header'] : '',
            'area_types' => $data['area_types'] != null ? $data['area_types'] : [],
            'sub_areas' => $data['sub_areas'] != null ? $data['sub_areas'] : '',
            'property_count' => $data['property_count'] != null ? $data['property_count'] : '',
            'button_text' => $data['button_text'] != null ? $data['button_text'] : '',
            'button_url' => $data['button_url'] != null ? $data['button_url'] : '',
            'prices' => $data['prices'] != null ? $data['prices'] : [],
            'location' => $data['location'] != null ? $data['location'] : '',
            'content' => $data['content'] != null ? $data['content'] : '',
            'image' => $data['image'] != null ? $data['image'] : '',
            'property_counts' => $data['property_counts'] != null ? $data['property_counts'] : [],
            'location_type' => $data['location_type'] ?? ''
        ];
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
