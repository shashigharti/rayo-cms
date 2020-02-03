<?php
namespace Robust\RealEstate\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Robust\Admin\Models\User;


/**
 * Class MultiplePropertyViewEvent
 * @package Robust\RealEstate\Events
 */
class MultiplePropertyViewEvent
{
    use InteractsWithSockets, SerializesModels;

    public $view;
    /**
     * @var
     */
    public $agent;
    /**
     * @var
     */
    public $lead;
    /**
     * @var
     */
    public $listing;


    /**
     * MultiplePropertyViewEvent constructor.
     * @param $agent
     * @param $view
     * @param $lead
     * @param $listing
     */
    public function __construct($view,$agent, $lead, $listing)
    {
        $this->view = $view;
        $this->agent = $agent;
        $this->lead = $lead;
        $this->listing = $listing;
    }
}
