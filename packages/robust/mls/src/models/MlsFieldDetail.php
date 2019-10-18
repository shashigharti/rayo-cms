<?php

namespace Robust\Mls\Models;

use Robust\Core\Models\BaseModel;

/**
 * Class MlsUser
 * @package Robust\Mls\Models
 */
class MlsFieldDetail extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'mls_field_details';
    /**
     * @var string
     */
    protected $namespace = 'Robust\Mls\Models\MlsFieldDetail';
    /**
     * @var array
     */
    protected $fillable = ['mls_user_id','resource','class','system_name','standard_name',
        'long_name','db_name','short_name','max_length','mapped_key'];

}