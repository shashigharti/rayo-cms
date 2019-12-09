<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class TaskLog
 * @package Robust\RealEstate\Models
 */
class TaskLog extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_task_logs';

    /**
     * @var array
     */
    protected $fillable = [
        'task',
        'status',
        'event_log',
    ];
}
