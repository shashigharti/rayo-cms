<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;

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
     * @var array
     */
    protected $hidden = array('pivot');

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
        'days_on_mls',
        'school_district_id',
        'latitude',
        'longitude'
    ];

    /**
     * Add search filters
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
//    public function scopeSearch($builder)
//    {
//        $query_params = request()->all();
//
//        if(count($query_params) <= 0){
//            return $builder;
//        }
//
//        $new_properties = [];
//        $empty_values = ['', null];
//
//        // Remove empty and null values
//        foreach($query_params as $property => $values){
//            if(is_array($values) && count($values) >= 0 ){
//                $new_properties[$property] = $values;
//            }
//            elseif(!in_array($values, $empty_values)){
//                $new_properties[$property] = $values;
//            }
//        }
//
//        // Build where condition
//        foreach($new_properties as $property => $values){
//            if(is_array($values)){
//                foreach($values as $value){
//                    $builder = $builder->orWhere(function ($query) use ($property, $value){
//                        $query->where('type', 'LIKE', $property)
//                        ->where('value','LIKE',"%$value%");
//                    });
//                }
//            }else{
//                $builder = $builder->where('type', 'LIKE', $property);
//            }
//        }
//
//        return $builder;
//    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ListingImages::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function property()
    {
        return $this->hasMany('Robust\RealEstate\Models\ListingProperty');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function locations()
    {
        return $this->belongsToMany('Robust\RealEstate\Models\Location', 'real_estate_listing_location');
    }
}
