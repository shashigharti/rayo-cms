<?php

namespace Robust\Mls\Models;

use Robust\Core\Models\BaseModel;

/**
 * Class MlsUser
 * @package Robust\Mls\Models
 */
class MlsSampleData extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'mls_sample_data';
    /**
     * @var string
     */
    protected $namespace = 'Robust\Mls\Models\MlsSampleData';
    /**
     * @var array
     */
    protected $fillable = ['mls_user_id','resource','class','data'];

}