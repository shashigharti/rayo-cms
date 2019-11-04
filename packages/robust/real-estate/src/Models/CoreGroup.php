<?php

namespace Robust\RealEstate\Model;

use Robust\Core\Models\BaseModel;


/**
 * Class CoreGroup
 * @package Robust\RealEstate\Model
 */
class CoreGroup extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'core_groups';

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'color',
        'status',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function leads()
    {
        return $this->belongsToMany('Robust\Leads\Models\Lead', 'lead_categories');
    }
}
