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
        \Robust\RealEstate\Events\AgentCreatingEvent::class => [
            \Robust\RealEstate\Listeners\AgentCreatingListener::class
        ],
        \Robust\RealEstate\Events\LeadSearchEvent::class => [
            \Robust\RealEstate\Listeners\LeadSearchListener::class
        ],
        \Robust\RealEstate\Events\ListingAlertEvent::class => [
            \Robust\RealEstate\Listeners\ListingAlertEventListener::class
        ],
        \Robust\RealEstate\Events\MultiplePropertyViewEvent::class => [
            \Robust\RealEstate\Listeners\MultiplePropertyEventListener::class
        ],
        \Robust\RealEstate\Events\LeadDistanceEvent::class => [
            \Robust\RealEstate\Listeners\LeadDistanceEventListener::class
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

