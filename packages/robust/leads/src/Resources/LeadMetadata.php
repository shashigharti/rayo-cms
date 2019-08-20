<?php

namespace Robust\Leads\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class CoreEmailTemplate
 * @package Robust\Groups\Resources
 */
class LeadMetadata extends JsonResource
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
            'lead_id' => $this->lead_id,
            'min_price' => $this->min_price,
            'max_price' => $this->max_price,
            'median_price' => $this->median_price,
            'average_price' => $this->average_price,
            'price_note' => $this->price_note,
            'timeframe' => $this->timeframe,
            'source' => $this->source,
            'followup' => $this->followup,
            'lead_quality_score' => $this->lead_quality_score,
            'city_id' => $this->city_id,
            'last_touch' => $this->last_touch,
            'last_touch_type' => $this->last_touch_type,
            'favourite_city' => $this->favourite_city,
            'opted_in_email' => $this->opted_in_email,
            'opted_in_text' => $this->opted_in_text,
            'source_keyword' => $this->source_keyword,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'followup_assigned_to' => $this->followup_assigned_to,
            'followup_notes' => $this->followup_notes,
            'search_count' => $this->search_count,
            'favourites_count' => $this->favourites_count,
            'views_count' => $this->views_count,
            'emails_count' => $this->emails_count,
            'replies_count' => $this->replies_count,
            'calls_count' => $this->calls_count,
            'comments_count' => $this->comments_count,
            'notes_count' => $this->notes_count,
            'lead_type' => $this->lead_type
        ];
    }
}
