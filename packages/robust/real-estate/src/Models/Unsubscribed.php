<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Unsubscribed
 * @package Robust\Leads\Models
 */
class Unsubscribed extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'unsubscribe_leads';

    /**
     * @var array
     */
    protected $fillable = ['lead_id'];

    /**
     *
     */
    public function lead()
    {
        $this->belongsTo(Lead::class);
    }
}
