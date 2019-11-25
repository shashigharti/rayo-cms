<?php
namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Activity
 * @package Robust\Leads\Models
 */
class Activity extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_activity_log';

    /**
     * @var boolean
     */
    public $timestamps = true;

    /**
     * @var array
     */
    protected $fillable = [
        'log_name',
        'description',
        'causer_id',
        'causer_type'
    ];

}
