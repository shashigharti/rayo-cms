<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\Listing;


/**
 * Class ListingRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class ListingRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;
    /**
     *
     */
    protected const LISTING_FIELDS = [
        'index' => [
            'real_estate_listings.id','real_estate_listings.uid','real_estate_listings.slug',
            'real_estate_listings.system_price','real_estate_listings.picture_count',
            'real_estate_listings.status','real_estate_listings.address_street','state',
            'real_estate_listings.baths_full','real_estate_listings.bedrooms'
        ]
    ];

    /**
     * @var Listing
     */
    protected $model;

    /**
     * ListingRepository constructor.
     * @param Listing $model
     */
    public function __construct(Listing $model)
    {
        $this->model = $model;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getSingle($id)
    {
        return $this->model->where('id',$id)->with('property')->with('images')->first();
    }

    /**
     * @param $type
     * @param $name
     * @param $count
     * @return mixed
     */
    public function getListingByType($type, $name, $count)
    {
       return  $this->model->where($type,$name)
                ->select('id','name','system_price','slug')
                ->where('status','Active')
                ->where('picture_status',1)
                ->orderBy('input_date','asc')
                ->limit($count);
    }

    /**
     * @param $type
     * @param $location
     * @param $price
     * @return mixed
     */
    public function getListingByPrice($type, $location, $price)
    {
        $prices = $prices = explode('-',$price);
        return $this->model
            ->where($type,$location)
            ->where('status','Active')
            ->whereBetween('system_price',$prices)
            ->where('picture_status',1)
            ->orderBy('input_date','desc');
    }


    /**
     * @param $type
     * @param $value
     * @return mixed
     */
    public function getCountByType($type, $value)
    {
        return $this->model->where($type,$value)
            ->where('status','Active')
            ->where('picture_status',1);
    }


    /**
     * @return mixed
     */
    public function getListings(){
        return $this->model->search()
            ->select(ListingRepository::LISTING_FIELDS['index'])
            ->leftJoin('real_estate_listing_properties', 'real_estate_listings.id', '=', 'real_estate_listing_properties.listing_id')
            ->paginate(40);
    }
}
