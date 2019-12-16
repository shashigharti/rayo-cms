<?php

namespace Robust\RealEstate\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


/**
 * Class MiddleSchool
 * @package Robust\RealEstate\Resources
 */
class MiddleSchool extends JsonResource
{

    /**
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
