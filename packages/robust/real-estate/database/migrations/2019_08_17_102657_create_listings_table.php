<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_listings', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('listing_name')->nullable();
            $table->string('listing_slug')->nullable();
            $table->string('listing_id', 100)->nullable();
            $table->string('uid', 100)->nullable();
            $table->string('mls_number', 100)->nullable();
            $table->string('class', 50)->nullable();
            $table->string('sub_property', 191)->nullable();
            $table->integer('sub_class')->nullable()->default(0);
            $table->string('subclass', 100)->nullable();
            $table->string('area', 255)->nullable();
            $table->string('borough', 255)->nullable();
            $table->integer('system_price')->nullable();
            $table->integer('asking_price')->nullable();
            $table->string('address_number', 255)->nullable();
            $table->string('address_street', 255)->nullable();
            $table->string('zoning', 200)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('state', 20)->nullable();
            $table->string('zip', 20)->nullable();
            $table->string('status', 100)->nullable();
            $table->string('sale_rent', 100)->nullable();
            $table->string('acres', 19)->nullable();
            $table->string('grid', 19)->nullable();
            $table->integer('year_built')->nullable();
            $table->string('subdivision', 255)->nullable();
            $table->string('county', 100)->nullable();
            $table->string('list_office', 255)->nullable();
            $table->integer('original_price')->nullable();
            $table->string('contract_date', 100)->nullable();
            $table->string('closing_date', 100)->nullable();
            $table->integer('sold_price')->nullable();
            $table->string('selling_office', 100)->nullable();
            $table->string('price_date', 100)->nullable();
            $table->dateTime('input_date')->nullable();
            $table->dateTime('update_date')->nullable();
            $table->dateTime('modified')->nullable();
            $table->integer('picture_count')->nullable();
            $table->integer('no_pictures_found')->default(0);
            $table->string('address_full', 255)->nullable();
            $table->integer('days_on_market')->nullable();
            $table->integer('days_on_mls')->nullable();
            $table->string('construction_status', 100)->nullable();
            $table->string('elem_school', 255)->nullable();
            $table->string('high_school', 255)->nullable();
            $table->string('middle_school', 255)->nullable();
            $table->string('latitude', 25)->nullable();
            $table->string('longitude', 25)->nullable();
            $table->decimal('baths_full', 10, 0)->nullable();
            $table->integer('baths_half')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->decimal('total_finished_area', 10, 0)->nullable();
            $table->string('district', 255)->nullable();
            $table->string('lot_size', 100)->nullable();
            $table->text('property_setting', 65535)->nullable();
            $table->string('style')->nullable();
            $table->integer('tmk_division')->nullable();
            $table->string('listings_office_name', 191)->nullable();
            $table->string('selling_office_name', 191)->nullable();
            $table->string('unit_number', 191)->nullable();
            $table->string('flood_zone', 191)->nullable();
            $table->string('street_suffix', 191)->nullable();
            $table->string('association_fee', 191)->nullable();
            $table->string('association_fee_2', 191)->nullable();
            $table->string('association_fee_2_includes', 191)->nullable();
            $table->string('association_fee_includes', 191)->nullable();
            $table->string('association_total', 191)->nullable();
            $table->string('pets', 191)->nullable();
            $table->string('architectural_style', 191)->nullable();
            $table->string('elderly', 191)->nullable();
            $table->string('building_name', 191)->nullable();
            $table->index(['status','class'], 'index_status_class');
            $table->index(['status','bedrooms'], 'index_status_bedrooms');
            $table->index(['status','baths_full'], 'index_status_baths_full');
            $table->index(['status','input_date'], 'index_status_input_date');
            $table->index(['status','system_price'], 'index_status_system_price');
            $table->index(['status','picture_count'], 'index_status_picture_count');
            $table->index(['listing_id','zip'], 'index_listing_id_zip');
            $table->index(['listing_id','city'], 'index_listing_id_city');
            $table->index(['listing_id','status'], 'index_listing_id_status');
            $table->index(['listing_id','county'], 'index_listing_id_county');
            $table->index(['listing_id','subdivision'], 'index_listing_id_subdivision');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('real_estate_listings');
    }
}
