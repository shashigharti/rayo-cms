<?php

namespace Robust\RealEstate\Models;


use Robust\Core\Models\BaseModel;


/**
 * Class LeadSpecialListing
 * @package Robust\RealEstate\Models
 */
class LeadSpecialListing extends BaseModel
{

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var string
     */
    protected $table = 'real_estate_lead_listing_specials';

    /**
     * @var array
     */
    protected $fillable = [
        'lead_id',
        'listing_id',
        'type'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}
