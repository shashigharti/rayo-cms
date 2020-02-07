<?php
namespace Robust\RealEstate\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;


/**
 * Class LeadDistanceEvent
 * @package Robust\RealEstate\Events
 */
class LeadDistanceEvent
{
    use InteractsWithSockets, SerializesModels;


    /**
     * @var
     */
    public $lead;
    /**
     * @var
     */
    public $listing;
    /**
     * @var
     */
    public $from;
    /**
     * LeadDistanceEvent constructor.
     * @param $lead
     * @param $listing
     * @param $from
     */
    public function __construct($lead, $listing, $from)
    {
        $this->lead = $lead;
        $this->listing = $listing;
        $this->from = $from;
    }
}
