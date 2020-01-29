<?php

namespace Robust\RealEstate\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;


/**
 * Class LeadCommunicationsEvent
 * @package Robust\RealEstate\Events
 */
class LeadCommunicationsEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var
     */
    public $agent;

    /**
     * @var
     */
    public $lead;

    /**
     * @var
     */
    public $subject;

    /**
     * @var
     */
    public $email;


    /**
     * LeadCommunicationsEvent constructor.
     * @param $agent
     * @param $lead
     * @param $subject
     * @param $email
     */
    public function __construct($agent, $lead, $subject, $email)
    {
        $this->agent = $agent;
        $this->lead = $lead;
        $this->subject = $subject;
        $this->email = $email;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
