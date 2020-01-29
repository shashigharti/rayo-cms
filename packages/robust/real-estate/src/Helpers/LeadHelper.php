<?php
namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Repositories\Admin\AgentRepository;
use Robust\RealEstate\Repositories\Admin\GroupLeadRepository;
use Robust\RealEstate\Repositories\Admin\LeadRepository;
use Robust\RealEstate\Repositories\Admin\LeadStatusRepository;
use Robust\RealEstate\Repositories\API\LeadFollowUpRepository;
use Robust\RealEstate\Repositories\API\LeadNoteRepository;

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
     * @param GroupLeadRepository $groups
     */
    public function __construct(LeadRepository $lead, AgentRepository $agent, LeadStatusRepository $status, GroupLeadRepository $groups)
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
        return $this->groups->where('status',1)->all();
    }
}
