<?php

namespace Robust\Groups\Model;

use Robust\Core\Models\BaseModel;

/**
 * Class CoreGroup
 * @package App
 */
class CoreGroup extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'core_groups';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'color',
        'status',
        'created_at',
        'updated_at'
    ];
}
