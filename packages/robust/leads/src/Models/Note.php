<?php

namespace Robust\Leads\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Note
 * @package Robust\Leads\Models
 */
class Note extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'notes';

    /**
     * @var array
     */
    protected $fillable = [
        'agent_id',
        'lead_id',
        'title',
        'note',
    ];
}
