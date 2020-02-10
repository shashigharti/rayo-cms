<?php

namespace Robust\RealEstate\Listeners;


use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Robust\RealEstate\Events\LeadDistanceEvent;
use Robust\RealEstate\Repositories\Website\LeadDistanceRepository;


/**
 * Class LeadDistanceEventListener
 * @package Robust\RealEstate\Listeners
 */
class LeadDistanceEventListener
{

    /**
     * @var LeadDistanceRepository
     */
    protected $model;


    /**
     * LeadDistanceEventListener constructor.
     * @param LeadDistanceRepository $model
     */
    public function __construct(LeadDistanceRepository $model)
    {
        $this->model = $model;
    }

    /**
     * @param LeadDistanceEvent $event
     */
    public function handle(LeadDistanceEvent $event)
    {

        $this->model->store([
            'lead_id' => $event->lead,
            'listing_id' => $event->listing,
            'from' => $event->from,
        ]);
    }
}
