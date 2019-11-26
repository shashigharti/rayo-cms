<?php


namespace Robust\RealEstate\Helpers;


use Robust\RealEstate\Repositories\Website\ListingRepository;

/**
 * Class FrontPageHelper
 * @package Robust\RealEstate\Helpers
 */
class FrontPageHelper
{
    protected $listings;

    public function __construct(ListingRepository $listings)
    {
        $this->listings = $listings;
    }

    public function getCountByCity($city,$price)
    {
        $prices = explode('-',$price);
        return $this->listings->where('city',$city)
            ->whereBetween('system_price',$prices)
            ->where('status','Active')
            ->where('picture_count','>',0)
            ->count();

    }
}
