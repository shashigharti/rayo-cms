<?php

namespace Robust\RealEstate\Models;

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
    protected $table = 'real_estate_sample_data';
    /**
     * @var string
     */
    protected $namespace = 'Robust\Mls\Models\MlsSampleData';
    /**
     * @var array
     */
    protected $fillable = ['mls_user_id','resource','class','data'];

}
