<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;
use Robust\RealEstate\Events\ListingAlertEvent;
use Robust\RealEstate\Models\Lead;
use Robust\RealEstate\Models\Listing;

class ListingsAlertToLead extends Command
{
    /**
     * @var string
     */
    protected $signature = 'rws:listings-alerts-to-lead';

    /**
     * @var string
     */
    protected $description = 'Send listings alerts to lead';


    public function handle()
    {
        Lead::chunk(5,function ($leads){
            foreach ($leads as $lead){
                $searches = $lead->searches;
                $views = $lead->views;
                if($searches->count() == 0 && $views->count() > 0){
                    $prices = [];
                    $cities = [];
                    $zips = [];
                    foreach ($views as $view){
                        $listing = $view->listing;
                        $cities[] = $listing->city_id;
                        $zips[] = $listing->zip_id;
                        $prices[] = $listing->system_price;
                    }
                    $priceRange = [min($prices),max($prices)];
                    $listings = $this->getListings($priceRange,$cities,$zips);
                    if($listings->count() > 0){
                        event(new ListingAlertEvent($lead,$listings));
                    }
                }
            }
        });
    }

    public function getListings($priceRange,$cities,$zips)
    {
        return Listing::whereBetween('system_price',$priceRange)
                ->whereIn('city_id',$cities)
                ->whereIn('zip_id',$zips)
                ->limit(6)
                ->get();
    }

}
