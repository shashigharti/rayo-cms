<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class LeadText
 * @package Robust\RealEstate\Models
 */
class LeadText extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_text_leads';

    /**
     * @var array
     */
    protected $fillable = [
        'lead_id',
        'text_id',
        'user_type',
    ];
}
