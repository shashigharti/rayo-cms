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

    /**
     * @param $type
     * @param $name
     * @param $count
     * @return mixed
     */
    public function getListingsByType($type, $name, $count)
    {
        return $this->model->getListingByType($type,$name,$count)->get();
    }
}
