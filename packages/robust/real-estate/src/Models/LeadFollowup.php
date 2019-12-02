<?php
namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


class LeadFollowup extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_leads_followups';


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
        'date',
        'type',
        'agent_id',
        'assigned_by',
        'note'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function leads()
    {
        return $this->belongsTo(Lead::class);
    }

}
