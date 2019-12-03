<?php

namespace Robust\RealEstate\Resources;
use Illuminate\Http\Resources\Json\JsonResource;


/**
 * Class LeadNote
 * @package Robust\RealEstate\Resources
 */
class LeadNote extends JsonResource
{

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
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
