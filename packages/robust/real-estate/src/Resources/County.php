<?php

namespace Robust\RealEstate\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class City
 * @package Robust\Landmarks\Resources
 */
class County extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'frontpage' => $this->frontpage,
            'active' => $this->active,
            'sold' => $this->sold,
            'frontpage_order' => $this->frontpage_order,
            'menu_order' => $this->menu_order,
            'dropdown' => $this->dropdown,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude
        ];
    }
}
