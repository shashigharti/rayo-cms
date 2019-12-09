<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class LeadComment
 * @package Robust\RealEstate\Models
 */
class LeadComment extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'real_estate_lead_comments';


    /**
     * @var array
     */
    protected $fillable = [
       'lead_id',
       'listing_id',
       'rating',
       'comment',
    ];
}
