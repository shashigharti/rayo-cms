<?php

namespace Robust\RealEstate\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class EventServiceProvider
 * @package Robust\RealEstate\Providers
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \Robust\RealEstate\Events\LeadCreatingEvent::class => [
            \Robust\RealEstate\Listeners\LeadCreatingListener::class
        ],
        \Robust\RealEstate\Events\SendEmailToLead::class => [
            \Robust\RealEstate\Listeners\SendEmailToLeadListener::class
        ],
        \Robust\RealEstate\Events\SingleListingPageEvent::class => [
            \Robust\RealEstate\Listeners\SingleListingPageEventListener::class
        ],
        \Robust\RealEstate\Events\LeadCommunicationsEvent::class => [
            \Robust\RealEstate\Listeners\LeadCommunicationsListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}

