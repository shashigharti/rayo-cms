<?php

namespace Robust\Landmarks\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


/**
 * Class MiddleSchool
 * @package Robust\Landmarks\Resources
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
