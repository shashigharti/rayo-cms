<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class LeadsAutomatedEmail
 * @package Robust\RealEstate\Models
 */
class LeadsAutomatedEmail extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'real_estate_automated_emails';


    /**
     * @var array
     */
    protected $fillable = [
       'id','setting_name','frequency',
       'email_subject','email_body','default',
       'search_filters','type'
    ];

}
