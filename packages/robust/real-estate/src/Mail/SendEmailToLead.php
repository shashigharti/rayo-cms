<?php

namespace Robust\RealEstate\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


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
     * SendEmailToLead constructor.
     * @param $subject
     * @param $message
     */
    public function __construct($subject, $message)
    {
        $this->body = $message;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->view('core::website.email.lead.sendEmailToLead');
    }
}
