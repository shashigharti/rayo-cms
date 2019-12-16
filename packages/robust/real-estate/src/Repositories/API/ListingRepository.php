<?php
namespace Robust\RealEstate\Repositories\API;

use Robust\RealEstate\Models\Listing;

/**
 * Class ListingRepository
 * @package Robust\RealEstate\Repositories\Website
 */
class ListingRepository
{
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
