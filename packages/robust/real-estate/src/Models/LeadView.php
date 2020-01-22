<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class LeadView
 * @package Robust\RealEstate\Models
 */
class LeadView extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'real_estate_leads_views';

    /**
     * @var array
     */
    protected $fillable = [
        'lead_id', 'listing_id','count','agent_notified'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function listing()
    {
        return $this->belongsTo(Listing::class,'id');
    }
}
