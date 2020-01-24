<?php
namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Repositories\Admin\AgentRepository;
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
     * LeadHelper constructor.
     * @param LeadRepository $lead
     * @param AgentRepository $agent
     * @param LeadStatusRepository $status
     */
    public function __construct(LeadRepository $lead, AgentRepository $agent, LeadStatusRepository $status)
    {
        $this->leads = $lead->get();
        $this->agents = $agent->get();
        $this->status = $status->get();
    }

    /**
     * @return mixed
     */
    public function getAgents()
    {
        return $this->agents;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
