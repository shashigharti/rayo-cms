<?php

namespace Robust\RealEstate\Listeners;


use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Robust\RealEstate\Events\LeadCommunicationsEvent;
use Robust\RealEstate\Events\ListingAlertEvent;
use Robust\RealEstate\Mail\SendListingAlertEmail;


/**
 * Class ListingAlertEventListener
 * @package Robust\RealEstate\Listeners
 */
class ListingAlertEventListener
{

    /**
     * ListingAlertEventListener constructor.
     */
    public function __construct()
    {
    }


    /**
     * @param ListingAlertEvent $event
     * @throws \Throwable
     */
    public function handle(ListingAlertEvent $event)
    {
        $template = email_template('Lead Emails Listing Template');
        $data = [
            'subject' =>$template ? $template->subject : 'Your Property Updates',
            'logo' => '',
        ];
        $body = $template ? $template->body : view('real-estate::admin.email-templates.partials.index',['template'=>'lead-emails-listing'])->render();
        $body = replace_variables($body, $event->lead, $data);
        $body = replace_listings($body,$event->listings);
        $email = $event->lead->user->email;
        $user = \Auth::user() ? \Auth::user()->memberable()->first()->id : '1';
        $agent =  $event->lead->agent_id ?? $user;
        event(new LeadCommunicationsEvent($agent,$event->lead->id,$data['subject'],$body));
        try {
            Mail::to($email)->send(new SendListingAlertEmail($data['subject'],$body));
        }catch (\Exception $e)
        {
            \Log::info('Listing Alert Error' . ' || ' . $e);
        }
    }
}
