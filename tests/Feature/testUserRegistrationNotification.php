<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Notifications\OrderShipped;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class testLeadNotification extends TestCase
{
    /**
     * Test Lead Registration Notification
     *
     * @return void
     */
    public function testUserRegistrationNotification()
    {
        Notification::fake();

        // Notification::assertSentTo(
        //     [\Robust\Admin\Models\User::find(1)],
        //     Robust\RealEstate\Notifications\LeadRegistrationNotification::class
        // );
    }
}
