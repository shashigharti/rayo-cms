<?php

namespace Robust\RealEstate\Models;


use Robust\Admin\UI\User;
use Robust\Core\Models\BaseModel;


/**
 * Class SentEmails
 * @package Robust\RealEstate\Models
 */
class SentEmails extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_sent_emails';

    /**
     * @var array
     */
    protected $fillable = [
        'agent_id',
        'lead_id',
        'email',
        'click',
        'open',
        'unsubscribe',
        'reply_to_id',
        'message_id',
        'subject',
        'delivered',
        'dropped',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id', 'id');
    }
}
