<?php

namespace Robust\RealEstate\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Robust\RealEstate\Resources\UserSearch as UserSearchResource;


/**
 * Class Lead
 * @package Robust\Leads\Resources
 */
class Lead extends JsonResource
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
            'username' => $this->username,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'timezone' => $this->timezone,
            'email' => $this->email,
            'agent_id' => $this->agent_id,
            'phone_number' => $this->phone_number != null ? $this->phone_number : '',
            'phone_number_2' => $this->phone_number_2,
            'phone_number_3' => $this->phone_number_3,
            'verified_phone_number' => $this->verified_phone_number,
            'address' => $this->address,
            'ip' => $this->ip,
            'verified_email' => $this->verified_email,
            'avatar' => $this->avatar,
            'user_type' => $this->user_type,
            'city' => $this->city,
            'state' => $this->state,
            'additional_email' => $this->additional_email,
            'contact_status' => $this->contact_status,
            'zip' => $this->zip,
            'deal_type' => $this->deal_type,
            'activation_status' => $this->activation_status,
            'default_alert_frequency' => $this->default_alert_frequency,
            'status' => $this->find($this->id)->status,
            'categories' => $this->whenLoaded('categories'),
            'loginHistory' => $this->whenLoaded('loginHistory'),
            'agent' => $this->whenLoaded('agent'),
            'searches' => UserSearchResource::collection($this->whenLoaded('searches')),
            'reports' => $this->whenLoaded('reports'),
            'emails' => $this->whenLoaded('emails'),
            'metadata' => $this->whenLoaded('metadata'),
            'activityLog' => $this->whenLoaded('activityLog'),
            'views' => $this->whenLoaded('views'),
            'notes' => $this->whenLoaded('notes'),
            'favourites' => $this->whenLoaded('favourites'),
            'distances' => $this->whenLoaded('distances'),
            'calls' => $this->whenLoaded('calls'),
            'rating' => $this->whenLoaded('rating'),
            'replies' => $this->whenLoaded('replies'),
            'alerts' => $this->whenLoaded('alerts'),
            'logins' => $this->logins,
            'last_active' => $this->last_active ? Carbon::parse($this->last_active)->diffForHumans() : 'N/A',
            'age' => $this->created_at ? Carbon::parse($this->created_at)->diffForHumans() : 'N/A',
            'latest_followup_dates' => $this->latest_followup_dates,
            'created_at' => $this->created_at,
            'online' => $this->last_active && Carbon::parse($this->last_active)->diffInMinutes(Carbon::now()) < 5 ?  'Online'  : 'Offline'
        ];
    }
}
