<?php

namespace Robust\Leads\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class CoreEmailTemplate
 * @package Robust\Groups\Resources
 */
class Status extends JsonResource
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
            'status' => $this->status
        ];
    }
}
