<?php

namespace Robust\RealEstate\Models;


use Robust\Core\Models\BaseModel;


/**
 * Class LeadFavourites
 * @package Robust\RealEstate\Models
 */
class LeadInquiry extends BaseModel
{

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var string
     */
    protected $table = 'real_estate_lead_inqueries';

    /**
     * @var array
     */
    protected $fillable = [
        'lead_id',
        'type_of_inquiry',
        'content'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}
