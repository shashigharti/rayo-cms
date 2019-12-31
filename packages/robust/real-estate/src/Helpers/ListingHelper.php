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
     *
     */
    protected const FIELDS_MAPPING = [
        'cities' => 'city_id',
        'zips' => 'zip_id',
        'counties' => 'county_id',
        'subdivisions' => 'subdivision_id'
    ];
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
    public function getListingsByType($type, $id, $limit)
    {
        $column = ListingHelper::FIELDS_MAPPING[$type];
        return $this->model->getListings([$column => $id])->limit($limit)->get();
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
        return $this->model->getCountByType('city_id',$city)
            ->whereBetween('system_price',$prices)
            ->count();
    }


    /**
     * @param $location
     * @param $image
     * @return mixed
     */
    public function getImageByCity($location, $image)
    {
        $src = '';
        if($image){
            $src =  getMedia($image);
        }else{
            $listing = $this->model->whereType('city_id',$location)
                    ->where('picture_status',1)->first();
            if($listing && $listing->images() && $listing->images()->first()){
                $src = $listing->images()->first()->url;
            }
        }
        return $src;
    }
}
