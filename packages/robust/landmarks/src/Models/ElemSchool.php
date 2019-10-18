<?php

namespace Robust\Landmarks\Models;

use Robust\Core\Models\BaseModel;

/**
 * Class CoreSetting
 * @package App
 */
class ElemSchool extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'elem_schools';

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
