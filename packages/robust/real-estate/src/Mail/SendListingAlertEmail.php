<?php

namespace Robust\RealEstate\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\HtmlString;
use Robust\RealEstate\Events\LeadCommunicationsEvent;


/**
 * Class SendListingAlertEmail
 * @package Robust\RealEstate\Mail
 */
class SendListingAlertEmail extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * @var
     */
    public $message;

    /**
     * @var
     */
    public $from;

    /**
     * @var
     */
    public $subject;

    /**
     * SendListingAlertEmail constructor.
     * @param $subject
     * @param $from
     * @param $message
     */
    public function __construct($subject, $message)
    {
        $this->message = $message;
        $this->subject = $subject;
    }


    /**
     * @return SendListingAlertEmail
     */
    public function build()
    {
        $from = settings('email-setting','email') ?? config('client.email.support');
        return $this->subject($this->subject)
            ->from($from)
            ->html($this->message);
    }
}
