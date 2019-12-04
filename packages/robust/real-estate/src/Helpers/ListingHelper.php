<?php
namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Repositories\Website\ListingRepository;

/**
 * Class ListingHelper
 * @package Robust\RealEstate\Helpers
 */
class ListingHelper
{
    /**
     * @var ListingRepository
     */
    private $model;


    /**
     * ListingHelper constructor.
     * @param ListingRepository $listing
     */
    public function __construct(ListingRepository $listing)
    {
        $this->model = $listing;
    }

    /**
     * @param $type
     * @param $name
     * @param $count
     * @return mixed
     */
    public function getListingsByType($type, $name, $count)
    {
        return $this->model->getListingByType($type,$name,$count)->get();
    }

    /**
     * @param $city
     * @param $price
     * @return mixed
     */
    public function getCountByCity($city, $price)
    {
        //we will make it in cron job
        $prices = explode('-',$price);
        return $this->model->getCountByType('city',$city)
            ->whereBetween('system_price',$prices)
            ->count();
    }


    /**
     * @param $city
     * @param $image
     * @return mixed
     */
    public function getImageByCity($city, $image)
    {
        $image = '';
        if($image){
            $image =  getMedia($image);
        }
        $listing = $this->model->getImageByType('city',$city)->first();
        if($listing && $listing->images() && $listing->images()->first()){
            $image = $listing->images()->first()->listing_url;
        }
        return $image;
    }
}
