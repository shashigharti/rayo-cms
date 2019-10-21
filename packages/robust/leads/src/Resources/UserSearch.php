<?php

namespace Robust\Leads\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


/**
 * Class UserSearch
 * @package Robust\Leads\Resources
 */
class UserSearch extends JsonResource
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
            'user_id' => $this->user_id,
            'content' => json_decode($this->content),
            'name' => $this->name,
            'frequency' => $this->frequency,
            'reference_time' => $this->reference_time,
            'created_at' => $this->created_at,
        ];
    }
}
