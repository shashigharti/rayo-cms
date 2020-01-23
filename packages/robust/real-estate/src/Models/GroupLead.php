<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class GroupLead
 * @package Robust\RealEstate\Models
 */
class GroupLead extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_group_leads';

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var array
     */
    protected $fillable = [
        'lead_id',
        'group_id'
    ];
}
