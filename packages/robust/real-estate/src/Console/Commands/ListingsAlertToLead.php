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
                    $priceRange = $this->generatePrice($prices);
                    $listings = $this->getListings($priceRange,array_unique($cities),array_unique($zips));
                    if($listings->count() > 0){
                        event(new ListingAlertEvent($lead,$listings));
                    }
                }
            }
        });
    }

    /**
     * @param $prices
     * @return array
     */
    public function generatePrice($prices)
    {
        $listing_prices = $prices;

        $count = count($prices);
        sort($prices);

        $mid = floor($count-1)/2;

        $avg = ($prices) ? array_sum($prices)/$count : 0;

        $median = ($prices) ? ($prices[$mid] + $prices[$mid + 1 -$count%2])/2: 0;
        $normal = ($avg + $median) /2;
        $listing_prices = array_filter($listing_prices,function($item) use ($normal){
           return $item <= 2 * $normal;
        });
        $newNormal =($avg + $median)/ 2;

        return [
            'min' => $newNormal +  min($listing_prices) / 2,
            'max' => $newNormal +  max($listing_prices) /2
        ];

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
            $query = Listing::whereIn('city_id',$cities)
                ->whereIn('zip_id',$zips);
            $count = $query->whereBetween('system_price',[$priceRange['min'], $priceRange['max'] ])->limit($limit)->count();
            $this->info('-------------------');
            $priceRange['min'] = $priceRange['min'] - 10000;
            $priceRange['max'] = $priceRange['max'] + 10000;
            $this->info($count);
            $this->info($priceRange['min'] . ' || ' . $priceRange['max']);
        }while($count != $limit);
        return $query->get();
    }

}
