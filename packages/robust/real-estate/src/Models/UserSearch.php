<?php

namespace Robust\RealEstate\Models;


use Robust\Core\Models\BaseModel;


/**
 * Class UserSearch
 * @package Robust\Leads\Models
 */
class UserSearch extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_user_search';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'content',
        'name',
        'frequency',
        'reference_time',
    ];

    /**
     * @var
     */
    protected $builder;

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Lead::class, 'user_id', 'id');
    }
}
