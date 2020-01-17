<?php
namespace Robust\RealEstate\Helpers;
use Robust\RealEstate\Repositories\Admin\AgentRepository;

/**
 * Class AgentHelper
 * @package Robust\RealEstate\Helpers
 */
class AgentHelper
{

    /**
     * @var AgentRepository
     */
    private $agent;

    /**
     * AgentHelper constructor.
     * @param AgentRepository $agent
     */
    public function __construct(AgentRepository $agent)
    {
        $this->agent = $agent;
    }

    /**
     * @return mixed
     */
    public function getAgentList()
    {
        $agents = $this->agent->all();
        return $agents->pluck('first_name','id');
    }

}
