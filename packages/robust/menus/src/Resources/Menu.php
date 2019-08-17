<?php

namespace Robust\Menus\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Menu extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'items' => json_decode($this->items, true),
            'menu_limit' => $this->menu_limit,
            'type' => $this->type
        ];
    }
}
