<?php

namespace Robust\Banners\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Banner extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     * @param \Illuminate\Http\Request $request
     * @return array
     */

    protected $templates = [
        'TwoColumnAd' => 'two-col-ad',
        'Slider' => 'slider',
        'FullScreenAd' => 'full-screen-ad',
        'SingleColumnBlock' => 'single-col-block',
        'BannerSlider' => 'banner-slider'
    ];
    public function toArray($request)
    {
        $blocks = json_decode($this->properties,true);
        return [
           'id' => $this->id,
           'name' => $this->name,
           'slug' => $this->slug,
            'header' => isset($blocks['header']) ?  $blocks['header'] : '',
            'area_types' =>isset($blocks['area_types']) ? $blocks['area_types'] : [],
            'sub_areas' =>isset($blocks['sub_areas']) ? $blocks['sub_areas'] : [],
            'property_ids' =>isset($blocks['property_ids']) ? $blocks['property_ids'] : [],
            'button_text' => isset($blocks['button_text']) ? $blocks['button_text'] : '',
            'button_url' =>isset($blocks['button_url']) ? $blocks['button_url'] : '',
            'banner_template' => array_search($this->template,$this->templates),
            'status' => $this->status,
            'order' => $this->order,
            'prices' => isset($blocks['prices']) ? $blocks['prices'] : [],
            'locations' => isset($blocks['locations']) ? $blocks['locations'] : [],
            'content' => isset($blocks['content']) ? $blocks['content'] : '',
            'image' => isset($blocks['image'])  ? $blocks['image'] : ''
        ];
    }
}
