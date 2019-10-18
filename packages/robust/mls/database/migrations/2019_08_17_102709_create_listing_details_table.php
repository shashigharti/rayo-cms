<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_details', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('listing_id')->unsigned()->index('listing_details_listing_id_foreign');
            $table->string('lakewaterfront', 255)->nullable();
            $table->string('off_market_date', 50)->nullable();
            $table->string('external_amenities', 255)->nullable();
            $table->string('amenities', 255)->nullable();
            $table->string('basement', 191)->nullable();
            $table->string('basement_sqft', 25)->nullable();
            $table->string('property_condition', 50)->nullable();
            $table->string('property_frontpage', 50)->nullable();
            $table->string('topography', 50)->nullable();
            $table->string('construction', 50)->nullable();
            $table->string('cooling_type', 255)->nullable();
            $table->string('equipment', 255)->nullable();
            $table->string('exterior', 255)->nullable();
            $table->string('owner_occupancy', 50)->nullable();
            $table->string('maintenance', 255)->nullable();
            $table->string('interior', 255)->nullable();
            $table->string('fireplace', 255)->nullable();
            $table->string('kitchen_equipment', 255)->nullable();
            $table->text('lot_description', 65535)->nullable();
            $table->string('parking', 150)->nullable();
            $table->string('rooms', 50)->nullable();
            $table->string('stories', 50)->nullable();
            $table->text('public_remarks', 65535)->nullable();
            $table->string('waterfront_name', 100)->nullable();
            $table->string('age_desc', 20)->nullable();
            $table->string('tax_year', 20)->nullable();
            $table->string('room_dr', 10)->nullable();
            $table->string('room_kt', 10)->nullable();
            $table->string('room_mbr', 10)->nullable();
            $table->string('room_br', 10)->nullable();
            $table->string('sewer_type', 100)->nullable();
            $table->string('foundation_type', 100)->nullable();
            $table->string('basement_desc', 100)->nullable();
            $table->string('garage_desc', 100)->nullable();
            $table->string('heating_type', 255)->nullable();
            $table->string('cooling_source', 255)->nullable();
            $table->string('water_description', 255)->nullable();
            $table->string('roof_type', 100)->nullable();
            $table->mediumText('virtual_tour', 255)->nullable();
            $table->string('list_agent', 199)->nullable();
            $table->string('list_office', 199)->nullable();
            $table->string('land_lot', 50)->nullable();
            $table->string('fireplaces', 255)->nullable();
            $table->string('fireplace_location', 255)->nullable();
            $table->string('fireplace_type', 50)->nullable();
            $table->string('total_tax', 100)->nullable();
            $table->string('hoa_amt', 100)->nullable();
            $table->string('hoa_dues_include', 255)->nullable();
            $table->string('mls_area', 255)->nullable();
            $table->string('total_floor', 50)->nullable();
            $table->string('floor_sqft', 50)->nullable();
            $table->string('bath_desc', 50)->nullable();
            $table->string('bath_type', 100)->nullable();
            $table->string('main_bedrooms', 50)->nullable();
            $table->string('beach_type', 50)->nullable();
            $table->string('pool', 100)->nullable();
            $table->string('utility_room', 50)->nullable();
            $table->string('dining_area_desc', 50)->nullable();
            $table->string('virtual_tour_2', 255)->nullable();
            $table->string('energy_related', 255)->nullable();
            $table->string('heating_source', 255)->nullable();
            $table->string('oven_source', 255)->nullable();
            $table->string('oven_type', 100)->nullable();
            $table->string('kitchen_breakfast', 50)->nullable();
            $table->string('laundry_type', 50)->nullable();
            $table->string('laundry_location', 255)->nullable();
            $table->string('zoning', 255)->nullable();
            $table->string('tax_database_id', 100)->nullable();
            $table->string('tax_property_id', 100)->nullable();
            $table->string('lot', 50)->nullable();
            $table->string('boathouse_dock', 20)->nullable();
            $table->string('office_remarks', 255)->nullable();
            $table->string('furnished', 50)->nullable();
            $table->string('exclusions', 255)->nullable();
            $table->string('lakechainname', 50)->nullable();
            $table->string('waterfront_footage', 255)->nullable();
            $table->string('waterfront_num', 20)->nullable();
            $table->string('waterfront_present', 20)->nullable();
            $table->string('waterfrontview', 255)->nullable();
            $table->string('waterfront_road', 100)->nullable();
            $table->string('waterfront_elevation', 150)->nullable();
            $table->string('borough', 255)->nullable();
            $table->string('directions', 255)->nullable();
            $table->string('how_sold', 50)->nullable();
            $table->string('selling_agent', 255)->nullable();
            $table->string('status_date', 20)->nullable();
            $table->string('display_id', 50)->nullable();
            $table->string('price_per_sqft', 20)->nullable();
            $table->string('lot_dimensions', 20)->nullable();
            $table->string('owner_phone', 50)->nullable();
            $table->string('return_to_market_date', 20)->nullable();
            $table->string('location', 255)->nullable();
            $table->string('garage_sqft', 20)->nullable();
            $table->string('total_heat_sqft', 20)->nullable();
            $table->string('showing_instructions', 255)->nullable();
            $table->string('special_conditions', 255)->nullable();
            $table->string('idx_include', 255)->nullable();
            $table->string('easements', 255)->nullable();
            $table->string('block', 50)->nullable();
            $table->string('landscaping', 255)->nullable();
            $table->string('patio_deck', 50)->nullable();
            $table->string('well', 50)->nullable();
            $table->string('window', 50)->nullable();
            $table->string('other_buildings', 50)->nullable();
            $table->text('private_remarks', 65535)->nullable();
            $table->timestamps();
            $table->integer('living_area')->nullable();
            $table->string('lease_expiration_date', 191)->nullable();
            $table->string('lease_expiration_year', 191)->nullable();
            $table->string('lease_month', 191)->nullable();
            $table->string('lease_price', 191)->nullable();
            $table->string('lease_renegotiation_date', 191)->nullable();
            $table->string('lease_terms', 191)->nullable();
            $table->longText('additional_fields')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('listing_details');
    }
}
