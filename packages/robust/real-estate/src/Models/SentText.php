<?php

namespace Robust\RealEstate\Models;


use Robust\Admin\UI\User;
use Robust\Core\Models\BaseModel;


/**
 * Class SentText
 * @package Robust\RealEstate\Models
 */
class SentText extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_sent_texts';

    /**
     * @var array
     */
    protected $fillable = [
        'agent_id',
        'text',
    ];
}
