<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class ListingLocation
 * @package Robust\RealEstate\Models
 */
class ListingLocation extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_listing_location';
    /**
     * @var string
     */
    protected $namespace = 'Robust\RealEstate\Models\ListingLocation';

    /**
     * @var array
     */
    protected $fillable = ['listing_id','location_id'];


}
