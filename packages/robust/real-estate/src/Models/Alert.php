<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;



class Alert extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'real_estate_alerts';


    /**
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'model', 'frequency', 'reference_time', 'user_id', 'location', 'sold', 'active',
    ];

}
