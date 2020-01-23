<?php

namespace Robust\RealEstate\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Robust\RealEstate\Events\SendEmailToLead as Event;
use Robust\RealEstate\Mail\SendEmailToLead;


/**
 * Class SendEmailToLeadListener
 * @package Robust\RealEstate\Listeners
 */
class SendEmailToLeadListener
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
            new SendEmailToLead($event->subject,$event->message)
        );
    }
}
