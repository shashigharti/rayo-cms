<?php

namespace Robust\Landmarks\Models;

use Robust\Core\Models\BaseModel;

/**
 * Class CoreSetting
 * @package App
 */
class MiddleSchool extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'middle_schools';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'active',
        'sold',
    ];

}
