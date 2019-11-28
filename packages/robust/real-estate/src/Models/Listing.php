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
     * @var string
     */
    protected $namespace = 'Robust\RealEstate\Models\Listing';
    /**
     * @var array
     */
    protected $fillable = [  'city_id', 'listing_id', 'uid', 'mls_number', 'class', 'sub_class','subclass', 'sub_property', 'listing_name', 'listing_slug', 'address_street','grid',
        'zip', 'county', 'city', 'input_date', 'update_date', 'property_setting', 'latitude', 'longitude',
        'total_finished_area', 'acres', 'status', 'year_built', 'county', 'subdivision', 'contract_date', 'closing_date',
        'system_price', 'sold_price', 'days_on_market', 'construction_status', 'school_district',
        'baths_full', 'baths_half', 'bedrooms', 'lot_size', 'style', 'district', 'picture_count', 'area', 'address_number', 'state',
        'list_office', 'selling_office', 'elem_school', 'middle_school', 'high_school','modified', 'price_date', 'tmk_division','unit_number','flood_zone','street_suffix',
        'association_fee','association_fee_2','association_fee_2_includes','association_fee_includes','association_total', 'days_on_mls',
        'attached', 'original_price', 'address', 'created_at', 'updated_at', 'off_market', 'building_name', 'listings_office_name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function details()
    {
        return $this->hasOne(ListingDetail::class,'listing_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ListingImages::class,'listing_id','uid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function image()
    {
        return $this->hasOne(ListingImages::class,'listing_id','uid')
            ->withDefault(function($image){  $image->listing_url = 'default/image/link'; });
    }

    /**
     * City  associated with this listing
     */
    public function city()
    {
        return $this->hasOne('Robust\RealEstate\Models\City');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function property()
    {
        return $this->hasOne('Robust\RealEstate\Models\ListingProperty');
    }

}
