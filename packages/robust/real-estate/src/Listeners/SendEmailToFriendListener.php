<?php

namespace Robust\RealEstate\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Robust\RealEstate\Mail\SendEmailToFriend;
use Robust\RealEstate\Events\SendEmailToFriend as Event;

/**
 * Class SendEmailToFriendListener
 * @package Robust\RealEstate\Listeners
 */
class SendEmailToFriendListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    /**
     * @param Event $event
     */
    public function handle(Event $event)
    {
        Mail::to($event->to)->send(
            new SendEmailToFriend($event->listing,$event->lead)
        );
    }
}
