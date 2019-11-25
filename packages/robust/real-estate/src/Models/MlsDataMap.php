<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;

/**
 * Class MlsUser
 * @package Robust\Mls\Models
 */
class MlsDataMap extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_data_maps';
    /**
     * @var string
     */
    protected $namespace = 'Robust\Mls\Models\MlsDataMap';
    /**
     * @var array
     */
    protected $fillable = ['mls_user_id','resource','class','mls_keys','maps','status','others','additional','mls_data_sample','mls_details'];

}
