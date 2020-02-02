<?php
namespace Robust\RealEstate\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Robust\Admin\Models\User;


/**
 * Class ListingAlertEvent
 * @package Robust\RealEstate\Events
 */
class ListingAlertEvent
{
    use InteractsWithSockets, SerializesModels;


    /**
     * @var
     */
    public $lead;
    /**
     * @var
     */
    public $listings;

    /**
     * ListingAlertEvent constructor.
     * @param $lead
     * @param $listings
     */
    public function __construct($lead, $listings)
    {
        $this->lead = $lead;
        $this->listings = $listings;
    }
}
