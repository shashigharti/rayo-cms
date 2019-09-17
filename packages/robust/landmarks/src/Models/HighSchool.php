<?php

namespace Robust\Landmarks\Model;

use Robust\Core\Models\BaseModel;

/**
 * Class CoreSetting
 * @package App
 */
class HighSchool extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'high-schools';

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
