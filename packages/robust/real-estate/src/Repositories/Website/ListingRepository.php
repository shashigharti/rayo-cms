<?php
namespace Robust\RealEstate\Repositories\Website;

use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Repositories\Common\Traits\ListingTrait;
use Robust\RealEstate\Repositories\Interfaces\IListings;
use Robust\RealEstate\Models\Listing;
use Robust\RealEstate\Models\Location;



/**
 * Class ListingRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class ListingRepository implements IListings
{
    use CommonRepositoryTrait, ListingTrait, SearchRepositoryTrait;  

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
    public function __construct(Listing $model, Location $location)
    {
        $this->model = $model;
        // This is a temporary fix; we will use locationable_id / polymorphic relation later
        $this->location = $location;
    }

    

    public function whereSubArea($type)
    {
        $tabs_map = [
            'waterfront' => [
                'type' => 'waterfront',
                'value' => 'Yes'
            ],
            'condos' => [
                'type' => 'property_type',
                'value' => 'Condo/Coop'
            ],
            'hopa' => [
                'type' => 'hopa',
                'value' => 'Yes-Verified'
            ]
        ];
        $tab = $tabs_map[$type];
        $this->model = $this->model->whereHas('property', function ($query) use ($tab){
            $query->where('type', $tab['type'])
                ->where('value', $tab['value']);
        });
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


    /**
     * @return QueryBuilder this
     */
    public function limit($limit){
        $this->model = $this->model->limit($limit);
        return $this->model;
    }

    public function whereType($type,$value)
    {
        return $this->model->where($type,$value);
    }

}
