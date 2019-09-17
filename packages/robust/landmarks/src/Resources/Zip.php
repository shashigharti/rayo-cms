<?php

namespace Robust\Landmarks\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class City
 * @package Robust\Landmarks\Resources
 */
class Zip extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'city_id' => $this->city_id,
            'county_id' => $this->county_id,
            'slug' => $this->slug,
            'frontpage' => $this->frontpage,
            'active' => $this->active,
            'sold' => $this->sold,
            'frontpage_order' => $this->frontpage_order,
            'menu_order' => $this->menu_order,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude
        ];
    }
}
