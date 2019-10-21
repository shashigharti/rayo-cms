<?php
namespace Robust\Leads\Models;

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
    protected $table = 'activity_log';

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
