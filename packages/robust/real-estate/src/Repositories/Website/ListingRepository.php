<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\Listing;
use Illuminate\Support\Arr;


/**
 * Class ListingRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class ListingRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    protected const LISTING_FIELDS = [
        'index' => [
            'real_estate_listings.id','real_estate_listings.name',
            'real_estate_listings.uid','real_estate_listings.slug',
            'real_estate_listings.system_price','real_estate_listings.picture_count',
            'real_estate_listings.status','real_estate_listings.address_street','state',
            'real_estate_listings.baths_full','real_estate_listings.bedrooms',
            'real_estate_listings.city_id','real_estate_listings.county_id',
            'real_estate_listings.zip_id'
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

    protected const LOCATION_TYPE_MAP = [
        'location_type' => [
            'cities' => 'city_id',
            'zips' => 'zip_id',
            'counties' => 'county_id',
            'high_schools' => 'high_school_id',
            'elementary_schools' => 'elementary_school_id',
            'middle_schools' => 'middle_school_id'
        ]
    ];

    /**
     * @var Listing
     */
    protected $model;

     /**
     * @var array params
     */
    protected $params;

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
     * @return  QueryBuilder this
     */
    public function getListings($params = [], $limit = null)
    {
        $this->params = $params;
        $qBuilder = $this->model->select(ListingRepository::LISTING_FIELDS['index']);

        // Remove all params that are null
        foreach($this->params as $key => $param){
            if($this->params == null){
                Arr::forget($this->params, $key);
            }
        }

        foreach($this->params as $key => $param){
            $qBuilder = $qBuilder->where(ListingRepository::FIELDS_QUERY_MAP[$key]['name'],
            ListingRepository::FIELDS_QUERY_MAP[$key]['condition'],
            $param);
        }

        $this->model = $qBuilder;
        return $this;
    }

    /**
     * @return QueryBuilder this
     */
    public function wherePriceBetween(){
        if((Arr::has($this->params, 'location_type')) && ($this->params['system_price'] != null)){
            $this->model = $this->model->whereBetween('system_price', $this->params['system_price']);
            Arr::forget($this->params, 'system_price');
        }
        return $this;
    }


    /**
     * @return QueryBuilder this
     */
    public function whereLocation(){
        if(Arr::has($this->params, 'location_type') && ($this->params['system_price'] != null)){
            $this->model = $this->model->where(ListingRepository::LOCATION_TYPE_MAP['location_type'][$this->params['location_type']], '=', $this->params['location']);
            Arr::forget($this->params, 'location_type');
            Arr::forget($this->params, 'location');
        }
        return $this;
    }

    /**
     * @return QueryBuilder this
     */
    public function limit($limit){
        $this->model = $this->model->limit($limit);
        return $this;
    }



    /**
     * @param $type
     * @param $location
     * @return mixed
     */
    public function getCommunities($type, $location)
    {
        return $this->model->where($type,$location)
                       ->select('subdivision_id')
                       ->groupBy('subdivision_id')
                       ->get()
                       ->pluck('subdivision_id');
    }

    /**
     * @param $community
     * @return mixed
     */
    public function getCommunityPrice($community)
    {
        return $this->model->where('subdivision_id',$community)
                    ->where('status','Active')
                    ->where('picture_status',1)
                    ->orderBy('input_date','desc');
    }

}
