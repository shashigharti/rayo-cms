<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;

/**
 * Class MlsUser
 * @package Robust\Mls\Models
 */
class MlsUser extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_users';
    /**
     * @var string
     */
    protected $namespace = 'Robust\Mls\Models\MlsUser';
    /**
     * @var array
     */
    protected $fillable = ['name','slug','state_short','email','contact','website','logo','description','login_url','username','password'];
    /**
     * @var array
     */
    public $searchable = ['name', 'slug', 'email', 'contact', 'website'];

    public function mlsdatamap()
    {
        return $this->hasMany('Robust\Mls\Models\MlsDataMap','id','mls_user_id');
    }
}
