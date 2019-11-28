<?php

namespace Robust\RealEstate\Models;

use Robust\Core\Models\BaseModel;

/**
 * Class MlsUser
 * @package Robust\Mls\Models
 */
class ListingDetail extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'real_estate_listing_details';
    /**
     * @var string
     */
    protected $namespace = 'Robust\Mls\Models\ListingDetail';

    /**
     * @var array
     */
    protected $fillable = ['id','listing_id','lakewaterfront', 'off_market_date',
        'external_amenities', 'amenities', 'basement', 'property_condition', 'property_frontpage', 'topography',
        'construction', 'cooling_type', 'equipment', 'exterior', 'owner_occupancy', 'maintenance', 'interior', 'kitchen_equipment', 'lot_description',
        'parking', 'rooms', 'stories', 'public_remarks', 'age_desc', 'tax_year', 'room_dr',
        'room_kt', 'room_mbr', 'room_br', 'sewer_type', 'foundation_type', 'basement_desc', 'garage_desc', 'heating_type',
        'cooling_source', 'water_description', 'roof_type', 'virtual_tour', 'list_agent', 'land_lot', 'fireplace_location',
        'fireplace_type', 'total_tax', 'hoa_amt', 'hoa_dues_include', 'mls_area', 'total_floor', 'floor_sqft', 'bath_desc', 'beach_type',
        'pool', 'utility_room', 'dining_area_desc', 'virtual_tour_2', 'energy_related', 'heating_source', 'kitchen_breakfast', 'laundry_type',
        'laundry_location', 'tax_database_id', 'tax_property_id', 'lot', 'boathouse_dock', 'office_remarks', 'directions', 'furnished',
        'exclusions', 'lakechainname', 'waterfront_footage', 'waterfrontview', 'waterfront_road', 'waterfront_present', 'waterfront_num',
        'waterfront_elevation', 'waterfront_name', 'how_sold', 'selling_agent', 'status_date', 'display_id', 'price_per_sqft',
        'lot_dimensions', 'owner_phone', 'fireplaces', 'return_to_market_date', 'location', 'garage_sqft', 'total_heat_sqft', 'showing_instructions', 'special_conditions',
        'idx_include', 'easements', 'block', 'landscaping', 'private_remarks', 'bath_type', 'main_bedrooms', 'oven_source', 'oven_type', 'patio_deck', 'basement_sqft',
        'well', 'window', 'other_buildings', 'zoning', 'community_features', 'parking_features', 'property_description', 'architecture', 'seperate_den_office', 'other_rooms','additional_fields'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function listing()
    {
        return $this->belongsTo(Listing::class, 'id', 'listing_id');
    }
}
