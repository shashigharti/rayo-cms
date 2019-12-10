<?php

namespace Robust\RealEstate\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class SendEmailToFriend
 * @package Robust\RealEstate\Mail
 */
class SendEmailToFriend extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var
     */
    public $listing;
    /**
     * @var
     */
    public $lead;


    /**
     * SendEmailToFriend constructor
     * @param $listing
     * @param $lead
     */
    public function __construct($listing, $lead)
    {
        $this->listing = $listing;
        $this->lead = $lead;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('real-estate::website.email.lead.sendEmailToFriend');
    }
}