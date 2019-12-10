<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class ListingView
 * @package Robust\RealEstate\Models
 */
class ListingView extends BaseModel
{


    /**
     * @var string
     */
    protected $table = 'real_estate_listing_views';


    /**
     * @var array
     */
    protected $fillable = [
        'lead_id', 'listing_id','count','agent_notified'
    ];
}
