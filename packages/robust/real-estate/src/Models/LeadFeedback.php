<?php

namespace Robust\RealEstate\Models;


use Robust\Core\Models\BaseModel;


/**
 * Class LeadFavourites
 * @package Robust\RealEstate\Models
 */
class LeadFeedback extends BaseModel
{

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var string
     */
    protected $table = 'real_estate_lead_feedbacks';

    /**
     * @var array
     */
    protected $fillable = [
        'lead_id',
        'agent_id',
        'type_of_feedback',
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
