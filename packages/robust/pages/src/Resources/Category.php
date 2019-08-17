<?php

namespace Robust\Pages\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Category
 * @package Robust\Pages\Resources
 */
class Category extends JsonResource
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
            'description' => $this->description,
            'slug' => $this->slug,
            'description_ne' => $this->description_ne,
            'name_ne' => $this->name_ne
        ];
    }
}
