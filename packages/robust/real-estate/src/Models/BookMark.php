<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class BookMark
 * @package Robust\RealEstate\Models
 */
class BookMark extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'real_estate_lead_bookmarks';


    /**
     * @var array
     */
    protected $fillable = [
        'lead_id', 'title', 'active_count', 'sold_count', 'url',
    ];
}
