<?php

namespace Robust\Leads\Models;


use Robust\Core\Models\BaseModel;
use Robust\Groups\Model\CoreGroup;

/**
 * Class Page
 * @package Robust\Pages\Models
 */
class LeadCategory extends BaseModel
{
    /**
     * @var bool
     */
    public $timestamps = true;
    /**
     * @var string
     */
    protected $table = 'lead_categories';
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'lead_id',
        'category_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne(CoreGroup::class ,'category_id', 'id');
    }

}
