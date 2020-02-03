<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;
use Robust\Admin\Models\User;
use Robust\RealEstate\Events\MultiplePropertyViewEvent;
use Robust\RealEstate\Models\LeadView;


/**
 * Class MultiplePropertyViewAlert
 * @package Robust\RealEstate\Console\Commands
 */
class MultiplePropertyViewAlert extends Command
{
    /**
     * @var string
     */
    protected $signature = 'rws:multiple-property-views-notification';

    /**
     * @var string
     */
    protected $description = 'Sends notification to agents for the leads who have viewed a particular property more than 5 times.';


    /**
     *
     */
    public function handle()
    {
       LeadView::where('count','>=',5)->where('agent_notified',0)
           ->chunk('100',function ($views){
              foreach ($views as $view){
                  if($view->lead && $view->listing){
                       //add default agent
                        $agent = $view->lead->agent ? $view->lead->agent->user : User::where('id',1)->first();
                        event(new MultiplePropertyViewEvent($view,$agent,$view->lead,$view->listing));
                  }
              }
           });
    }
}
