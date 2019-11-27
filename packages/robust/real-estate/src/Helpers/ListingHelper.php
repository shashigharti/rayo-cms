<?php
namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Repositories\ListingRepository;

/**
 * Class ListingHelper
 * @package Robust\RealEstate\Helpers
 */
class ListingHelper
{
    private $model;

    /**
     * ListingHelper constructor.
     * @param Listing $model
     */
    public function __construct(ListingRepository $listing)
    {
        $this->model = $listing;
    }
}