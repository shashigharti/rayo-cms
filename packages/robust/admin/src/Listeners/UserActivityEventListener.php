<?php

namespace Robust\Admin\Listeners;

use Illuminate\Mail\Mailer;
use Robust\Admin\Events\UserCreatedEvent;

/**
 * Class UserActivityEventListener
 * @package Robust\Admin\Listeners
 */
class UserActivityEventListener
{
    /**
     * UserActivityEventListener constructor.
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param UserCreatedEvent $event
     */
    public function handle(UserCreatedEvent $event)
    {

    }
}
