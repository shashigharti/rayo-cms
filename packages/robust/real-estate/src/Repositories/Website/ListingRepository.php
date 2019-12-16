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
    protected const FIELDS_QUERY_MAP = [
        'id' => ['name' => 'real_estate_listings.id', 'condition' => '='],
        'name' => ['name' => 'real_estate_listings.id', 'condition' => 'LIKE'],
        'uid' => ['name' => 'real_estate_listings.uid', 'condition' => 'LIKE'],
        'slug' => ['name' => 'real_estate_listings.slug', 'condition' => 'LIKE'],
        'status' => ['name' => 'real_estate_listings.status', 'condition' => '='],
        'baths_full' => ['name' => 'real_estate_listings.baths_full', 'condition' => '='],
        'bedrooms' => ['name' => 'real_estate_listings.bedrooms', 'condition' => '='],
        'city_id' => ['name' => 'real_estate_listings.city_id', 'condition' => '='],
        'zip_id' => ['name' => 'real_estate_listings.zip_id', 'condition' => '='],
        'county_id' => ['name' => 'real_estate_listings.county_id', 'condition' => '=']
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
     * @param $params
     * @return Eloquent Collection
     */
    public function getListings($params = [], $limit = null)
    {
        $qBuilder = $this->model;

        $qBuilder = $qBuilder->select(ListingRepository::LISTING_FIELDS['index']);
        
        foreach($params as $key => $param){
            $qBuilder = $qBuilder->where(ListingRepository::FIELDS_QUERY_MAP[$key]['name'], 
            ListingRepository::FIELDS_QUERY_MAP[$key]['condition'],
            $param);
        }

        if($limit > 0){
            $qBuilder = $qBuilder->limit($limit);
        }

        return $qBuilder;
    }
}
