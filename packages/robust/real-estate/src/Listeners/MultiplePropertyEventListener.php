<?php

namespace Robust\RealEstate\Listeners;


use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Robust\RealEstate\Events\LeadCommunicationsEvent;
use Robust\RealEstate\Events\MultiplePropertyViewEvent;
use Robust\RealEstate\Mail\SendMultiplePropertyViewMail;


/**
 * Class MultiplePropertyEventListener
 * @package Robust\RealEstate\Listeners
 */
class MultiplePropertyEventListener
{

    /**
     * ListingAlertEventListener constructor.
     */
    public function __construct()
    {
    }


    /**
     * @param MultiplePropertyViewEvent $event
     * @throws \Throwable
     */
    public function handle(MultiplePropertyViewEvent $event)
    {
        $template = email_template('Multiple Property Views');
        $data = [
            'subject' =>$template ? $template->subject : 'Multiple property Views Notification',
            'logo' => '',
            'listing' => $event->listing,
            'view' => $event->view
        ];
        $body = $template ? $template->body : view('real-estate::admin.email-templates.partials.index',['template'=>'multiple-property-views'])->render();
        $body = replace_variables($body, $event->lead, $data);
        $body = replace_variables($body, $event->agent->memberable, $data);
        event(new LeadCommunicationsEvent($event->agent->memberable->id,$event->lead->id,$data['subject'],$body));
        try {
            Mail::to($event->agent->email)->send(new SendMultiplePropertyViewMail($data['subject'],$body));
            $event->view->update(['agent_notified'=>1]);
        }catch (\Exception $e)
        {
            \Log::info('Multiple property views notification error' . ' || ' . $e);
        }
    }
}
