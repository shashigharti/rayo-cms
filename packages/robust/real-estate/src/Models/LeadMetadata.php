<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class LeadMetadata
 * @package Robust\Leads\Models
 */
class LeadMetadata extends BaseModel
{
    /**
     * @var array
     */
    protected $hidden = ['city'];

    /**
     * @var string
     */
    protected $table = 'real_estate_lead_metadatas';

    /**
     * @var string
     */
    protected $primaryKey = 'lead_id';
    /**
     * @var array
     */
    protected $fillable = [
        'lead_id',
        'min_price',
        'max_price',
        'median_price',
        'average_price',
        'price_note',
        'timeframe',
        'source',
        'followup',
        'lead_quality_score',
        'city_id',
        'last_touch',
        'last_touch_type',
        'favourite_city',
        'opted_in_email',
        'opted_in_text',
        'source_keyword',
        'created_at',
        'updated_at',
        'followup_assigned_to',
        'followup_notes',
        'search_count',
        'favourites_count',
        'views_count',
        'emails_count',
        'replies_count',
        'calls_count',
        'comments_count',
        'notes_count',
        'lead_type'
    ];
}
