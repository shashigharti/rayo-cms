<?php

namespace Robust\RealEstate\Listeners;

use App\Events\PodcastWasPurchased;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Robust\RealEstate\Repositories\Website\LeadRepository;
use Robust\RealEstate\Events\LeadCreatingEvent;
use Robust\Admin\Repositories\Website\UserRepository;
use Robust\Admin\Repositories\Website\RoleRepository;
use Robust\RealEstate\Notifications\LeadRegistrationNotification;



class LeadCreatingListener
{
    /**
     * Create the event listener.
     * @param UserRepository $userModel
     * @param LeadRepository $leadModel
     * @param RoleRepository $roleRepository
     *
     * @return void
     */
    public function __construct(UserRepository $userModel, LeadRepository $leadModel, RoleRepository $roleRepository)
    {
        $this->userModel = $userModel;
        $this->leadModel = $leadModel;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Handle the event.
     *
     * @param  LeadCreatingEvent  $event
     * @return void
     */
    public function handle(LeadCreatingEvent $event)
    {
        $lead_details = [
            'first_name' => $event->data['first_name'],
            'last_name' => $event->data['last_name']
        ];

        // create new lead
        $new_lead = $this->leadModel->store($lead_details);
        $roles = $this->roleRepository->where('name', 'User')->get()->pluck('id');

        // update users table
        $this->userModel->update($event->user->id, [
            'memberable_id' => $new_lead->id,
            'memberable_type' => 'Robust\RealEstate\Models\Lead',
            'roles' => $roles
        ]);


        // notify lead
        try {
            $event->user->notify(new LeadRegistrationNotification($new_lead));
        }catch (\Exception $e){
            \Log::info($e->getMessage());
        }
    }
}
