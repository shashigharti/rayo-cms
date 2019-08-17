<?php

namespace Robust\Emails\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CoreEmailTemplate extends JsonResource
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
            'title' => $this->title,
            'group' => $this->group,
            'template' => $this->template,
            'status' => $this->status,
            'subject' => $this->subject,
            'frequency' => $this->frequency,
            'starts_at' => $this->starts_at,
            'ends_at' => $this->ends_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
