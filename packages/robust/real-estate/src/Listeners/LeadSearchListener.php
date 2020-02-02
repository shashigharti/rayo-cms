<?php

namespace Robust\RealEstate\Listeners;


use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Robust\RealEstate\Events\LeadSearchEvent;
use Robust\RealEstate\Repositories\Website\LeadSearchRepositories;


/**
 * Class LeadSearchListener
 * @package Robust\RealEstate\Listeners
 */
class LeadSearchListener
{
    /**
     * @var LeadSearchRepositories
     */
    protected $model;

    /**
     * LeadSearchListener constructor.
     * @param LeadSearchRepositories $model
     */
    public function __construct(LeadSearchRepositories $model)
    {
        $this->model = $model;
    }


    /**
     * @param LeadSearchEvent $event
     */
    public function handle(LeadSearchEvent $event)
    {
        $lead = $event->lead;
        $name = $event->name ?? $lead->first_name . '-' . date('Y-m-d-h:m:s');
        $frequency = $event->frequency ?? '1';
        $this->model->store([
            'name' => $name,
            'lead_id' => $lead->id,
            'content' => $event->content,
            'frequency' => $frequency,
            'reference_time' => date('Y-m-d-h:m:s')
        ]);
    }
}
