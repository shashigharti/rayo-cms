<?php


namespace Robust\Mls\Helpers;


use Robust\Mls\Models\Listing;

/**
 * Class MlsNameHelper
 * @package Robust\Mls\Helpers
 */
class MlsNameHelper
{
    /**
     * @var Listing
     */
    protected $listing;

    /**
     * MlsNameHelper constructor.
     * @param Listing $listing
     */
    public function __construct(Listing $listing)
    {
        $this->listing = $listing;
    }

    /**
     * @return mixed
     */
    public function getListings()
    {
        return $this->listing
                    ->select('id', 'listing_name', 'city', 'county', 'status', 'zip', 'area', 'subdivision', 'high_school', 'district')
                    ->get();
    }
}