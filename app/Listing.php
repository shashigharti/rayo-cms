<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Listing
 * @package App
 */
class Listing extends Model
{
    protected $default= 'https://icdn5.digitaltrends.com/image/northern-irelands-first-shipping-container-home-1-416x416.jpg';
    /**
     * @var string
     */
    protected $table = 'listings';
    /**
     * @var array
     */
    protected $fillable = [
        'listing_id', 'uid', 'mls_number', 'class', 'sub_class','subclass', 'sub_property', 'listing_name', 'listing_slug', 'address_street','grid',
        'zip', 'county', 'city', 'input_date', 'update_date', 'property_setting', 'latitude', 'longitude',
        'total_finished_area', 'acres', 'status', 'year_built', 'county', 'subdivision', 'contract_date', 'closing_date',
        'system_price', 'sold_price', 'days_on_market', 'construction_status', 'school_district',
        'baths_full', 'baths_half', 'bedrooms', 'lot_size', 'style', 'district', 'picture_count', 'area', 'address_number', 'state',
        'list_office', 'selling_office', 'elem_school', 'middle_school', 'high_school','modified', 'price_date', 'tmk_division','unit_number','flood_zone','street_suffix','association_fee','association_fee_2','association_fee_2_includes','association_fee_includes','association_total', 'days_on_mls', 'attached', 'original_price', 'address', 'created_at', 'updated_at', 'off_market', 'building_name', 'listings_office_name'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function details()
    {
        return $this->hasOne(ListingDetail::class,'listing_id','id');
    }

    public function images()
    {
        return $this->hasMany(ListingImage::class,'listing_id','uid');
    }

    public function image()
    {
        return $this->hasOne(ListingImage::class,'listing_id','uid')
                ->withDefault(function($image){  $image->listing_url = $this->default; });
    }
}
