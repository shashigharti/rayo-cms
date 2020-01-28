<?php

namespace Robust\RealEstate\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Robust\RealEstate\Events\SingleListingPageEvent;
use Robust\RealEstate\Models\LeadView;


/**
 * Class SingleListingPageEventListener
 * @package Robust\RealEstate\Listeners
 */
class SingleListingPageEventListener
{

    /**
     * @var LeadView
     */
    protected $model;
    /**
     *
     */
    const LEAD_CLASS = 'Robust\RealEstate\Models\Lead';

    /**
     * SingleListingPageEventListener constructor.
     * @param LeadView $model
     */
    public function __construct(LeadView $model)
    {
        $this->model = $model;
    }


    /**
     * @param SingleListingPageEvent $event
     */
    public function handle(SingleListingPageEvent $event)
    {
          //check if lead
          $member = $event->user->memberable()->first();
          if(get_class($member) === self::LEAD_CLASS){
              $viewed = $this->model
                        ->where('lead_id',$member->id)
                        ->where('listing_id',$event->listing->id)
                        ->first();
              if($viewed){
                  $viewed->increment('count',1);
              }else{
                  $data = [
                      'lead_id' => $member->id,
                      'listing_id'=>$event->listing->id,
                      'count'=>1,
                      'agent_notified'=>0
                  ];
                  $this->model->create($data);
              }
          }
    }
}
