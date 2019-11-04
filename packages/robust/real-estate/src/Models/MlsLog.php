<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;

/**
 * Class MlsUser
 * @package Robust\Mls\Models
 */
class MlsLog extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'mls_logs';
    /**
     * @var string
     */
    protected $namespace = 'Robust\Mls\Models\MlsLog';
    /**
     * @var array
     */
    protected $fillable = ['mls_user_id','resource','class','query_limit','data_count','status','exception_error'];
    /**
     * @var array
     */
}
