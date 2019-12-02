<?php

namespace Robust\RealEstate\Resources;
use Illuminate\Http\Resources\Json\JsonResource;


class LeadFollowup extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'lead_id' => $this->lead_id,
            'date' => $this->date,
            'type' => $this->type,
            'agent_id' => $this->agent_id,
            'assigned_by' => $this->assigned_by,
            'note' => $this->note,
        ];
    }
}
