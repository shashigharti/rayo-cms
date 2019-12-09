<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;



class Guest extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_grids';

    /**
     * @var array
     */
    protected $fillable = [
       'ip_addr','lead_type'
    ];

}
