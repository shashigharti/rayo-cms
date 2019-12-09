<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


class EmailJob extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'real_estate_email_jobs';


    /**
     * @var array
     */
    protected $fillable = [
        'type', 'campaign_id', 'total_count', 'status', 'total_sent','error','success'
    ];
}
