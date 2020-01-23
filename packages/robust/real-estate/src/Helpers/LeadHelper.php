<?php
namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Repositories\Admin\AgentRepository;
use Robust\RealEstate\Repositories\Admin\LeadRepository;

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
     * LeadHelper constructor.
     * @param LeadRepository $lead
     * @param AgentRepository $agent
     */
    public function __construct(LeadRepository $lead, AgentRepository $agent)
    {
        $this->leads = $lead->get();
        $this->agents = $agent->get();
    }

    /**
     * @return mixed
     */
    public function getAgents()
    {
        return $this->agents;
    }
}
