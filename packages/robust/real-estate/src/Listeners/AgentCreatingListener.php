<?php

namespace Robust\RealEstate\Listeners;


use Robust\RealEstate\Events\AgentCreatingEvent;
use Robust\RealEstate\Repositories\Admin\AgentRepository;
use Robust\Admin\Repositories\Website\UserRepository;
use Robust\Admin\Repositories\Website\RoleRepository;


/**
 * Class AgentCreatingListener
 * @package Robust\RealEstate\Listeners
 */
class AgentCreatingListener
{

    /**
     * AgentCreatingListener constructor.
     * @param UserRepository $userModel
     * @param AgentRepository $agentModel
     * @param RoleRepository $roleRepository
     */
    public function __construct(UserRepository $userModel, AgentRepository $agentModel, RoleRepository $roleRepository)
    {
        $this->userModel = $userModel;
        $this->agentModel = $agentModel;
        $this->roleRepository = $roleRepository;
    }


    /**
     * @param AgentCreatingEvent $event
     */
    public function handle(AgentCreatingEvent $event)
    {
        $agent_details = [
            'first_name' => $event->data['first_name'],
            'last_name' => $event->data['last_name'],
            'contact' => $event->data['contact'],
            'address' => $event->data['address'],
        ];

        // create new lead
        $new_agent = $this->agentModel->store($agent_details);
        //remove this line after adding it to seeder
        $this->roleRepository->updateOrCreate(['name'=>'Agent'],[
            'name' => 'Agent'
        ]);
        $roles = $this->roleRepository->where('name', 'Agent')->get()->pluck('id');
        // update users table
        $this->userModel->update($event->user->id, [
            'memberable_id' => $new_agent->id,
            'memberable_type' => 'Robust\RealEstate\Models\Agent',
            'roles' => $roles
        ]);
    }
}
