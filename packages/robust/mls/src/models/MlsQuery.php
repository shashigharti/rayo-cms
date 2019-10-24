<?php

namespace Robust\Mls\Models;

use Robust\Core\Models\BaseModel;

/**
 * Class MlsUser
 * @package Robust\Mls\Models
 */
class MlsQuery extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'mls_query';
    /**
     * @var string
     */
    protected $namespace = 'Robust\Mls\Models\MlsQuery';
    /**
     * @var array
     */
    protected $fillable = ['mls_user_id','query_filter','query_limit','number_of_days','picture'];
    /**
     * @var array
     */
}