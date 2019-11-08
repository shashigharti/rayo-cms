<?php

namespace Robust\RealEstate\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class City
 * @package Robust\Landmarks\Resources
 */
class Agent extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
        ];
    }
}
