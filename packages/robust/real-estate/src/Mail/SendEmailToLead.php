<?php

namespace Robust\RealEstate\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Robust\RealEstate\Events\LeadCommunicationsEvent;


/**
 * Class SendEmailToLead
 * @package Robust\RealEstate\Mail
 */
class SendEmailToLead extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * @var
     */
    public $body;

    /**
     * @var
     */
    public $subject;

    /**
     * @var
     */
    public $lead;
    /**
     * SendEmailToLead constructor.
     * @param $subject
     * @param $message
     * @param $lead
     */
    public function __construct($subject, $message,$lead)
    {
        $this->body = $message;
        $this->subject = $subject;
        $this->lead = $lead;
    }


    /**
     * @return SendEmailToLead
     * @throws \Throwable
     */
    public function build()
    {
        $data = [
            'subject' => $this->subject,
            'logo' => '',
        ];
        $subject = replace_variables($this->subject, $this->lead, $data);
        $from = settings('email-setting','email') ?? config('rws.client.email.support');
        $view = view('real-estate::admin.email-templates.partials.index',
                ['template'=>'send-email-to-lead','body'=>$this->body])
                ->render();
        $message = replace_variables($view,$this->lead,$data);
        $agent =  $this->lead->agent_id ?? \Auth::user()->memberable()->first()->id;
        event(new LeadCommunicationsEvent($agent,$this->lead->id,$subject,$message));
        return $this->subject($subject)
            ->from($from)
            ->html($message);
    }
}
