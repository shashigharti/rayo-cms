<?php

namespace Robust\RealEstate\Resources;
use Illuminate\Http\Resources\Json\JsonResource;


class LeadNote extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'lead_id' => $this->lead_id,
            'agent_id' => $this->lead_id,
            'title' => $this->title,
            'note' => $this->note,
        ];
    }
}
