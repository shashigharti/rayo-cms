<?php

namespace Robust\RealEstate\Listeners;


use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Robust\RealEstate\Events\LeadCommunicationsEvent;
use Robust\RealEstate\Events\ListingAlertEvent;
use Robust\RealEstate\Mail\SendListingAlertEmail;


class ListingAlertEventListener
{

    public function __construct()
    {
    }


    /**
     * @param LeadSearchEvent $event
     */
    public function handle(ListingAlertEvent $event)
    {
        $template = email_template('Lead Emails Listing Template');
        $data = [
            'subject' => $template->subject,
            'logo' => '',
        ];

        $body = replace_variables($template->body, $event->lead, $data);
        $body = replace_listings($body,$event->listings);
        $email = $event->lead->user->email;
        $agent =  $event->lead->agent_id ?? \Auth::user()->memberable()->first()->id;
        event(new LeadCommunicationsEvent($agent,$event->lead->id,$data['subject'],$body));
        try {
            Mail::to($email)->send(new SendListingAlertEmail($data['subject'],$body));
        }catch (\Exception $e)
        {
            \Log::info('Listing Alert Error' . ' || ' . $e);
        }
    }
}
