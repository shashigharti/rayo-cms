<?php
namespace Robust\RealEstate\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;


/**
 * Class LeadSearchEvent
 * @package Robust\RealEstate\Events
 */
class LeadSearchEvent
{
    use InteractsWithSockets, SerializesModels;

    /**
     * @var
     */
    public $lead;

    /**
     * @var
     */
    public $content;

    /**
     * @var null
     */
    public $name;

    /**
     * @var null
     */
    public $frequency;

    /**
     * LeadSearchEvent constructor.
     * @param $lead
     * @param $content
     * @param null $name
     * @param null $frequency
     */
    public function __construct($lead, $content, $name=null, $frequency=null)
    {
        $this->lead = $lead;
        $this->content = $content;
        $this->name = $name;
        $this->frequency = $frequency;
    }
}
