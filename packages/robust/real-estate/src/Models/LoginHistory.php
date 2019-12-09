<?php
namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class LoginHistory
 * @package Robust\RealEstate\Models
 */
class LoginHistory extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_user_login_history';

    /**
     * @var boolean
     */
    public $timestamps = true;

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'type_of_event',
        'time_of_login',
    ];

}
