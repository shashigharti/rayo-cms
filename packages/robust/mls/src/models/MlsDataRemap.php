<?php

namespace Robust\Mls\Models;

use Robust\Core\Models\BaseModel;

/**
 * Class MlsUser
 * @package Robust\Mls\Models
 */
class MlsDataRemap extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'mls_data_remap';
    /**
     * @var string
     */
    protected $namespace = 'Robust\Mls\Models\MLsDataRemap';
    /**
     * @var array
     */
    protected $fillable = ['mls_user_id','resource','class','remaps','remap_key'];

}