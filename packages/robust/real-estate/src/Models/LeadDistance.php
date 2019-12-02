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
    protected $table = 'real_estate_lead_distances';


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
        'data'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function leads()
    {
        return $this->belongsTo(Lead::class);
    }

}
