<?php

namespace Robust\RealEstate\Listeners;

use App\Events\PodcastWasPurchased;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Robust\RealEstate\Repositories\Website\LeadRepository;
use Robust\Admin\Repositories\Website\UserRepository;


class LeadCreatingListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(UserRepository $userModel)
    {
        $this->userModel = $userModel;
    }

    /**
     * Handle the event.
     *
     * @param  UserCreatedEvent  $event
     * @return void
     */
    public function handle(LeadRepository $leadModel, UserCreatedEvent $event)
    {
        $lead_details = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name']
        ];

        // create new lead
        $new_lead = $leadModel->create($lead_details);

        // update users table
        $this->userModel->find($event->user->id)->update([
            'memberable_id' => $new_lead->id,
            'memberable_type' => 'Robust\RealEstate\Models\Lead'
        ]);

        // notify lead
        $user->notify(new LeadRegistrationNotification($lead));
    }
}