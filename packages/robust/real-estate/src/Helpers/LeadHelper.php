<?php
namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Repositories\Admin\AgentRepository;
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
    private $followup;

    /**
     * @var mixed
     */
    private $notes;

    /**
     * LeadHelper constructor.
     * @param LeadRepository $lead
     * @param AgentRepository $agent
     * @param LeadStatusRepository $status
     * @param LeadFollowUpRepository $followup
     */
    public function __construct(LeadRepository $lead, AgentRepository $agent, LeadStatusRepository $status, LeadFollowUpRepository $followup, LeadNoteRepository $notes)
    {
        $this->leads = $lead->get();
        $this->agents = $agent->get();
        $this->status = $status->get();
        $this->followup = $followup->get();
        $this->notes =  $notes->get();
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
     * @param $value
     * @return mixed
     */
    public function getFollowup($value)
    {
        return $this->followup->where('id',$value)->first();
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getNotes($value)
    {
        return $this->notes->where('id',$value)->first();
    }

}
