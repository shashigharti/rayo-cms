<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;
use Robust\RealEstate\Models\Scopes\QueryScope;

/**
 * Class Listing
 * @package Robust\RealEstate\Models
 */
class Listing extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_listings';
    /**
     * @var string
     */
    protected $namespace = 'Robust\RealEstate\Models\Listing';
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'slug',
        'uid',
        'mls_number',
        'class',
        'area_id',
        'sub_area_id',
        'borough_id',
        'system_price',
        'asking_price',
        'address_number',
        'address_street',
        'city_id',
        'zip_id',
        'state',
        'subdivision_id',
        'county_id',
        'elementary_school_id',
        'high_school_id',
        'middle_school_id',
        'picture_count',
        'picture_status',
        'input_date',
        'baths_full',
        'bedrooms',
        'status',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new QueryScope);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ListingImages::class);
    }

    /**
     * City associated with this listing
     */
    public function city()
    {
        return $this->belongsTo('Robust\RealEstate\Models\City');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function property()
    {
        return $this->hasMany('Robust\RealEstate\Models\ListingProperty');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function elementary()
    {
        return $this->hasOne(ElementarySchool::class,'id','elementary_school_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function middle()
    {
        return $this->hasOne(MiddleSchool::class,'id','middle_school_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function high()
    {
        return $this->hasOne(HighSchool::class,'id','high_school_id');
    }

}
