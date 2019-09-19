<?php

namespace Robust\Leads\Models;


use Robust\Core\Models\BaseModel;

/**
 * Class Page
 * @package Robust\Pages\Models
 */
class UserSearch extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'user_search';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'content', 'name', 'frequency', 'reference_time',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'content' => 'json'
    ];

    /**
     * @var
     */
    protected $builder;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Lead::class, 'user_id', 'id');
    }

    /**
     * @return array
     */
    public static function getAlertFrequencyList()
    {
        return [
            'Daily' => 'Daily',
            'Monday' => 'On Monday',
            'Tuesday' => 'On Tuesday',
            'Wednesday' => 'On Wednesday',
            'Thursday' => 'On Thursday',
            'Friday' => 'On Friday',
            'Saturday' => 'On Saturday',
            'Sunday' => 'On Sunday',
            'Biweekly' => 'Twice Monthly',
            'Monthly' => 'Every Month',
        ];
    }
}
