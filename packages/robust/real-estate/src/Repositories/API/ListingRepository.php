<?php
namespace Robust\RealEstate\Repositories\API;

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
     * ListingRepository constructor.
     * @param Listing $model
     */
    public function __construct(Listing $model)
    {
        $this->model = $model;
    }
}
