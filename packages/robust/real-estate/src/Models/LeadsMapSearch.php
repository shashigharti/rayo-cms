<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class LeadsMapSearch
 * @package Robust\RealEstate\Models
 */
class LeadsMapSearch extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_leads_map_searches';


    /**
     * @var array
     */
    protected $fillable = [
       'id','lead_id','page_session',
       'url','filter'
    ];

}
