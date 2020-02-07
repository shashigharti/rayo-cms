<?php
namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class LeadDistance
 * @package Robust\RealEstate\Models
 */
class LeadDistance extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_lead_distance_drive';


    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'lead_id',
        'listing_id',
        'from'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function leads()
    {
        return $this->belongsTo(Lead::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

}
