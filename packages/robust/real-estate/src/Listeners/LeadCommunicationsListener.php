<?php

namespace Robust\RealEstate\Listeners;


use Robust\RealEstate\Events\LeadCommunicationsEvent as Event;
use Robust\RealEstate\Models\SentEmails;


/**
 * Class LeadCommunicationsListener
 * @package Robust\RealEstate\Listeners
 */
class LeadCommunicationsListener
{
    /**
     * @var SentEmails
     */
    protected $model;

    /**
     * LeadCommunicationsListener constructor.
     * @param SentEmails $model
     */
    public function __construct(SentEmails $model)
    {
        $this->model = $model;
    }

    /**
     * @param Event $event
     */
    public function handle(Event $event)
    {
        $data = [
            'agent_id' => $event->agent,
            'lead_id' => $event->lead->id,
            'subject' => $event->subject,
            'email' => $event->email
        ];
        $this->model->create($data);
    }
}
