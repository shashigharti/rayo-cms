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
}
