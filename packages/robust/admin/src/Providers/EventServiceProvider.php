<?php
namespace Robust\Admin\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class EventServiceProvider
 * @package Robust\Core\Providers
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \Robust\Core\Events\UserCreatedEvent::class => [
            \Robust\Core\Listeners\UserCreatedEventListener::class,
        ],
        \Robust\Core\Events\UserUpdatedEvent::class => [
            \Robust\Core\Listeners\UserUpdatedEventListener::class,
        ],
        \Robust\Core\Events\PasswordResetEvent::class => [
            \Robust\Core\Listeners\PasswordResetEventListener::class
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

