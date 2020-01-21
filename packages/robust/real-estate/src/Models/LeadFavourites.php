<?php

namespace Robust\RealEstate\Models;


use Robust\Core\Models\BaseModel;


/**
 * Class LeadFavourites
 * @package Robust\RealEstate\Models
 */
class LeadFavourites extends BaseModel
{

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var string
     */
    protected $table = 'real_estate_lead_favourites';

    /**
     * @var array
     */
    protected $fillable = [
        'lead_id',
        'listings_id'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function listings()
    {
        return $this->belongsTo(Listing::class);
    }
}
