<?php

namespace Robust\RealEstate\Listeners;


use Robust\RealEstate\Events\LeadCommunicationsEvent as Event;
use Robust\RealEstate\Repositories\Admin\SentEmailRepository;


/**
 * Class LeadCommunicationsListener
 * @package Robust\RealEstate\Listeners
 */
class LeadCommunicationsListener
{

    /**
     * @var SentEmailRepository
     */
    protected $model;


    /**
     * LeadCommunicationsListener constructor.
     * @param SentEmailRepository $model
     */
    public function __construct(SentEmailRepository $model)
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
        $this->model->store($data);
    }
}
