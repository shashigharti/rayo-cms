<?php

namespace Robust\RealEstate\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class City
 * @package Robust\Landmarks\Resources
 */
class Grid extends JsonResource
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
            'slug' => $this->slug,
            'active' => $this->active,
            'sold' => $this->sold,
        ];
    }
}
