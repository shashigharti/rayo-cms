<?php
namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Repositories\Admin\AgentRepository;
use Robust\RealEstate\Repositories\Admin\GroupRepository;
use Robust\RealEstate\Repositories\Admin\LeadRepository;
use Robust\RealEstate\Repositories\Admin\LeadStatusRepository;


/**
 * Class LeadHelper
 * @package Robust\RealEstate\Helpers
 */
class LeadHelper
{

    /**
     * @var mixed
     */
    private $leads;

    /**
     * @var mixed
     */
    private $agents;

    /**
     * @var mixed
     */
    private $status;

    /**
     * @var mixed
     */
    private $groups;

    /**
     * LeadHelper constructor.
     * @param LeadRepository $lead
     * @param AgentRepository $agent
     * @param LeadStatusRepository $status
     * @param GroupRepository $groups
     */
    public function __construct(LeadRepository $lead, AgentRepository $agent, LeadStatusRepository $status, GroupRepository $groups)
    {
        $this->leads = $lead->get();
        $this->agents = $agent->get();
        $this->status = $status->get();
        $this->groups = $groups->get();
    }

    /**
     * @return mixed
     */
    public function getAgents()
    {
        return $this->agents;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     *
     */
    public function getActiveGroups()
    {
        return $this->groups->where('status','1')->all();
    }
}
