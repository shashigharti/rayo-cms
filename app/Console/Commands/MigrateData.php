<?php
namespace App\Console\Commands;

use Robust\RealEstate\Models\Listing;
use Illuminate\Console\Command;
use Robust\RealEstate\Models\ListingProperty;
use Robust\RealEstate\Models\ListingDetail;

/**
 * Class UserAlert
 * @package App\Console\Commands
 */
class MigrateData extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'migrate:listing-details';
    /**
     * The console command description.
     * @var string
     */
    protected $description = "Migrate Old Tables to New Structure; This command will be removed";


    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        $listing_fields = ['listing_id', 'uid', 'mls_number', 'class', 'sub_class','subclass', 'sub_property', 'grid',
        'update_date', 'property_setting', 'latitude', 'longitude',
        'total_finished_area', 'acres','closing_date',
        'system_price', 'sold_price', 'days_on_market', 'construction_status', 'baths_full', 'baths_half', 'bedrooms', 'lot_size', 'style', 'picture_count', 'area', 'address_number',
        'list_office', 'selling_office', 'elem_school', 'middle_school', 'high_school','modified', 'price_date', 'tmk_division','unit_number','flood_zone','street_suffix',
        'association_fee','association_fee_2','association_fee_2_includes','association_fee_includes','association_total', 'days_on_mls',
        'attached', 'original_price', 'address', 'created_at', 'updated_at', 'off_market', 'building_name', 'listings_office_name'];
        
        $listing_details_fields = [
        'lakewaterfront', 'off_market_date',
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
        'well', 'window', 'other_buildings', 'zoning', 'community_features', 'parking_features', 'property_description', 'architecture', 'seperate_den_office', 'other_rooms','additional_fields'
    
    ];

        $listings = \DB::table('listings')
        ->where('id','<', 7280)
        ->get()->toArray();

        foreach($listings as $key => $listing){            
            $listing = json_decode(json_encode($listing), true);
            Listing::create($listing);
            foreach ($listing_fields as $field){
                ListingProperty::create([
                    'listing_id' => $listing['id'],
                     'type' => $field, 
                     'value' => $listing[$field],
                     'status' => 1  //1 enabled, 0 disabled
                     ]);           
            }
        }       
        $listing_details = \DB::table('listing_details')
        ->where('listing_id','<', 7277)
        ->get()->toArray();

        foreach($listing_details as $key => $listing_detail){
            $listing_detail = json_decode(json_encode($listing_detail), true);
            ListingDetail::create($listing);
            foreach ($listing_details_fields as $field){
                ListingProperty::updateOrCreate([
                    'listing_id' => $listing_detail['listing_id'],
                     'type' => $field, 
                     'value' => $listing_detail[$field],
                     'status' => 1  //1 enabled, 0 disabled
                     ]);           
            }
        }       
    }
}
