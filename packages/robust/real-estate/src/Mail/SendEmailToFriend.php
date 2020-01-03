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
    public $member;


    /**
     * SendEmailToFriend constructor
     * @param $listing
     * @param $member
     */
    public function __construct($listing, $member)
    {
        $this->listing = $listing;
        $this->member = $member;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('core::website.email.lead.sendEmailToFriend');
    }
}
