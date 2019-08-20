<?php

namespace Robust\Leads\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class CoreEmailTemplate
 * @package Robust\Groups\Resources
 */
class Lead extends JsonResource
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
            'username' => $this->username,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
//            'password' => $this->password,
//            'open_password' => $this->open_password,
            'agent_id' => $this->agent_id,
            'phone_number' => $this->phone_number,
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
            'default_alert_frequency' => $this->default_alert_frequency
        ];
    }
}
