<?php

namespace Robust\RealEstate\Repositories\Common\Traits;

use Illuminate\Database\Eloquent\Builder;
use Robust\RealEstate\Repositories\Interfaces\IListings;
use Illuminate\Support\Arr;

/**
 * Class ListingTrait
 * @package Robust\RealEstate\Repositories\Common\Traits
 */
trait ListingTrait
{
    
   /**
     * @param $id
     * @return mixed
     */
    public function getSingle($slug)
    {
        return $this->model->where('slug', $slug)
        ->with('property')
        ->with('images')->first();
    }

    /**
     * @param $params
     * @return  QueryBuilder this
     */
    public function getListings($params = [])
    {

        $qBuilder = $this->model->select(IListings::LISTING_FIELDS['index']);

        // Remove all params that are null
        foreach($params as $key => $param){
            if($params == null){
                Arr::forget($params, $key);
            }
        }

        // Add dynamic where conditions using passed params
        foreach($params as $key => $param){
            $qBuilder = $qBuilder->where(IListings::FIELDS_QUERY_MAP[$key]['name'],
                IListings::FIELDS_QUERY_MAP[$key]['condition'],
                "$param");
        }

        $this->model = $qBuilder;
        return $this;
    }

    /**
     * @return QueryBuilder this
     */
    public function wherePriceBetween($params){
       $this->model = $this->model->whereBetween('system_price', $params);
       return $this;
    }

    /**
     * @return QueryBuilder this
     */
    public function whereDateBetween($params){
        $this->model = $this->model->whereBetween('input_date', $params);
        return $this;
    }


    /**
     * @return QueryBuilder this
     */
    public function whereLocation($params){
        $key = key($params);
        if($params[$key] != null){
            $value = $params[$key];
            // This is a temporary fix; we will use locationable_id / polymorphic relation later
            $location = $this->location->where('slug', '=', $value)->first();
            $this->model = $this->model->where(IListings::LOCATION_TYPE_MAP[$key], '=', $location->id);
        }
        return $this;
    }
  
}
