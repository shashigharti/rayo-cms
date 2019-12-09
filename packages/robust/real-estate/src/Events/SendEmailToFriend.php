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
 * Class SendEmailToFriend
 * @package Robust\RealEstate\Events
 */
class SendEmailToFriend
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var
     */
    public $listing;
    /**
     * @var
     */
    public $lead;

    /**
     * @var
     */
    public $to;

    public $message;

    public function __construct($to, $listing, $lead,$message)
    {
        $this->to = $to;
        $this->listing = $listing;
        $this->lead = $lead;
        $this->message = $message;
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
