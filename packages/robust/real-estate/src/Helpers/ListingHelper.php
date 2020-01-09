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
     *
     */
    protected const Class_Mapping = [
        'Robust\RealEstate\Models\City' => 'city_id',
        'Robust\RealEstate\Models\County' => 'county_id',
        'Robust\RealEstate\Models\Area' => 'area_id' ,
        'Robust\RealEstate\Models\ElementarySchool' => 'elementary_school_id',
        'Robust\RealEstate\Models\MiddleSchool' => 'middle_school_id' ,
        'Robust\RealEstate\Models\HighSchool' => 'high_school_id',
        'Robust\RealEstate\Models\Zip' => 'zip_id' ,
        'Robust\RealEstate\Models\Subdivision' => 'subdivision_id',
        'Robust\RealEstate\Models\SchoolDistrict' => 'school_district_id',
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
     * @param $id
     * @param $limit
     * @return mixed
     */
    public function getListingsByType($type, $id, $limit)
    {
        $column = ListingHelper::Class_Mapping[$type];
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
    public function getImageByLocation($location, $image)
    {
        $src = '';
        if($image){
            $src =  getMedia($image);
        }else{
            $listing = $this->model
                    ->whereType(self::Class_Mapping[$location->locationable_type],$location->id)
                    ->where('picture_status',1)->first();
            if($listing && $listing->images() && $listing->images()->first()){
                $src = $listing->images()->first()->url;
            }
        }
        return $src;
    }
}
