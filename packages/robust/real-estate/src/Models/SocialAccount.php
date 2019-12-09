<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class SocialAccount
 * @package Robust\RealEstate\Models
 */
class SocialAccount extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_social_accounts';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'provider_name',
        'provider_id',
    ];

}
