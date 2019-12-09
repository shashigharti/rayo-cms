<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Robust\RealEstate\Events\SendEmailToAgent;
use Robust\RealEstate\Events\SendEmailToFriend;
use Robust\RealEstate\Listeners\SendEmailToAgentListener;
use Robust\RealEstate\Listeners\SendEmailToFriendListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SendEmailToFriend::class => [
            SendEmailToFriendListener::class
        ],
        SendEmailToAgent::class => [
            SendEmailToAgentListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
