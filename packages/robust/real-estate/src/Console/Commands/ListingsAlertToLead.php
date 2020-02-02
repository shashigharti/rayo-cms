<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;
use Robust\RealEstate\Events\ListingAlertEvent;
use Robust\RealEstate\Models\Lead;
use Robust\RealEstate\Models\Listing;

/**
 * Class ListingsAlertToLead
 * @package Robust\RealEstate\Console\Commands
 */
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


    /**
     *
     */
    public function handle()
    {
        Lead::chunk(100,function ($leads){
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
                    $listings = $this->getListings($priceRange,array_unique($cities),array_unique($zips));
                    if($listings->count() > 0){
                        event(new ListingAlertEvent($lead,$listings));
                    }
                }
            }
        });
    }

    /**
     * @param $priceRange
     * @param $cities
     * @param $zips
     * @return mixed
     */
    public function getListings($priceRange, $cities, $zips)
    {
        $query = Listing::whereIn('city_id',$cities)
            ->whereIn('zip_id',$zips);

        $total = $query->count();
        $limit = 5;
        if($total < 5){
            $limit = $total;
        }
        do{
            $count = $query->whereBetween('system_price',$priceRange)->limit($limit)->count();
            $priceRange[0] = $priceRange[0] - 10000;
            $priceRange[1] = $priceRange[1] + 10000;
            $this->info($count);
            $this->info($priceRange[0] . ' || ' . $priceRange[1]);
        }while($count != $limit);
        return $query->get();
    }

}
