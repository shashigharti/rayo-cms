<?php
namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;


/**
 * Class County
 * @package Robust\RealEstate\Models
 */
class County extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_counties';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'active',
        'sold',
        'menu_order',
        'latitude',
        'longitude'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function location()
    {
        return $this->morphOne('Robust\RealEstate\Models\Location','location','locationable_type','location_id');
    }
}
