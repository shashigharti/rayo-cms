<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class BookMark
 * @package Robust\RealEstate\Models
 */
class LeadBookMark extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'real_estate_lead_bookmarks';


    /**
     * @var array
     */
    protected $fillable = [
        'lead_id', 'title', 'url',
    ];
}
