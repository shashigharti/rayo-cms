<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Feedback
 * @package Robust\RealEstate\Models
 */
class Feedback extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_feedbacks';


    /**
     * @var array
     */
    protected $fillable = [
       'feedback_type'
    ];
}
