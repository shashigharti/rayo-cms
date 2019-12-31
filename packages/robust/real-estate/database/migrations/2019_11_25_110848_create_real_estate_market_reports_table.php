<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateMarketReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_market_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('location_id');
            $table->string('slug');
            $table->string('name');
            $table->integer('total_listings')->nullable();
            $table->integer('total_listings_active')->nullable();
            $table->integer('total_listings_sold')->nullable();
            $table->integer('total_listings_sold_past_year')->nullable();
            $table->integer('total_listings_sold_this_year')->nullable();
            $table->integer('median_price_active')->nullable();
            $table->integer('median_price_sold')->nullable();
            $table->integer('median_price_sold_past_year')->nullable();
            $table->integer('median_price_sold_this_year')->nullable();
            $table->integer('average_price_active')->nullable();
            $table->integer('average_price_sold')->nullable();
            $table->integer('average_price_sold_past_year')->nullable();
            $table->integer('average_price_sold_this_year')->nullable();
            $table->integer('average_dos')->nullable();
            $table->integer('average_dos_past_year')->nullable();
            $table->integer('average_dos_this_year')->nullable();
            $table->integer('median_dos')->nullable();
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
        Schema::dropIfExists('real_estate_market_reports');
    }
}
