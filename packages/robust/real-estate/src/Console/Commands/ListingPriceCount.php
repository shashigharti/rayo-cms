<?php

namespace Robust\RealEstate\Console\Commands;

use Illuminate\Console\Command;
use Robust\Banners\Repositories\BannerRepository;
use Robust\RealEstate\Repositories\Website\ListingRepository;


/**
 * Class ListingPriceCount
 * @package Robust\RealEstate\Console\Commands
 */
class ListingPriceCount extends Command
{
    /**
     * @var BannerRepository
     */
    protected $model;
    /**
     * @var ListingRepository
     */
    protected $listing;
    /**
     * @var string
     */
    protected $signature = 'rws:banner-property-count';

    /**
     * @var string
     */
    protected $description = 'Generates counts of listings according to price count & city';

    /**
     * ListingPriceCount constructor.
     * @param BannerRepository $model
     * @param ListingRepository $listing
     */
    public function __construct(BannerRepository $model, ListingRepository $listing)
    {
        parent::__construct();
        $this->model = $model;
        $this->listing = $listing;
    }

    /**
     *
     */
    public function handle()
    {
        $blocks = $this->model->where('template','single-col-block')->get();
        foreach ($blocks as $block){
            $properties = json_decode($block->properties,true);
            $location = $properties['location'];
            $prices = $properties['prices'];
            if($location != '' && $prices != '')
            {
                foreach ($prices as $key =>  $price)
                {
                    $properties['property_counts'][$key]  = $this->listing->getListingByPrice('city',$location,$price)->count();
                    $block->update(['properties' => json_encode($properties)]);
                }
            }
        }
    }

}
