<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


class LeadDistanceDrive extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_lead_drive_distances';

    /**
     * @var array
     */
    protected $fillable = [
        'lead_id',
        'data',
    ];

}
