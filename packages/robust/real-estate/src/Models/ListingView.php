<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


class ListingView extends BaseModel
{


    protected $table = 'real_estate_listing_views';



    protected $fillable = [
        'lead_id', 'listing_id','count',
    ];
}
