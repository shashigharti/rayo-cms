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

    public $searchable = ['name'];
    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'subject',
        'body',
        'editable',
        'removable'
    ];
}
