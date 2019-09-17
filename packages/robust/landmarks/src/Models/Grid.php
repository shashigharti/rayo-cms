<?php

namespace Robust\Landmarks\Model;

use Robust\Core\Models\BaseModel;

/**
 * Class CoreSetting
 * @package App
 */
class Grid extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'grids';

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
