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
    public function toArray($request)
    {
        $blocks = json_decode($this->block,true);
        return [
           'id' => $this->id,
           'name' => $this->name,
           'slug' => $this->slug,
            'header' => $blocks['header'],
            'area_types' => $blocks['area_types'],
            'sub_areas' => $blocks['sub_areas'],
            'property_ids' => $blocks['property_ids'],
            'button_text' => $blocks['button_text'],
            'button_url' => $blocks['button_url'],
            'banner_template' => $this->type,
            'status' => $this->status,
            'order' => $this->order,
            'prices' => $blocks['prices'],
            'locations' => $blocks['locations']
        ];
    }
}
