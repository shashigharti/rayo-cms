<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class EmailTemplate
 * @package Robust\RealEstate\Models
 */
class EmailTemplate extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_email_templates';
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'group',
        'template',
        'status',
        'subject',
        'frequency',
        'starts_at',
        'ends_at',
        'created_at',
        'updated_at'
    ];
}
