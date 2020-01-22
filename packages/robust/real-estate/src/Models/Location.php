<?php
namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class Location
 * @package Robust\RealEstate\Models
 */
class Location extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_locations';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'status',
        'active_count',
        'sold_count',
        'locationable_id',
        'locationable_type'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function locationable()
    {
        return $this->morphTo();
    }

}
