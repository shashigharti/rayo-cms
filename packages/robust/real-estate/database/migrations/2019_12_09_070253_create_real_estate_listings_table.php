<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_listings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
//            $table->string('listing_id')->nullable(); //we dont need this anymore
            $table->string('uid',50)->nullable();
            $table->string('mls_number')->nullable();
            $table->string('class',100)->nullable(); // class table ? and class_id
            $table->integer('area_id')->nullable();
            $table->integer('sub_area_id')->nullable();
            $table->integer('borough_id')->nullable();
            $table->integer('system_price')->nullable();
            $table->integer('asking_price')->nullable();
            $table->string('address_number', 15)->nullable();
            $table->string('address_street', 50)->nullable();
            $table->integer('city_id')->nullable();
            $table->string('state',20)->nullable();
            $table->integer('subdivision_id')->nullable();
            $table->integer('county_id')->nullable();
            $table->integer('elementary_school_id')->nullable();
            $table->integer('high_school_id')->nullable();
            $table->integer('middle_school_id')->nullable();
            $table->integer('picture_count')->nullable();
            $table->integer('picture_status')->default(0);
            $table->dateTime('input_date')->nullable();
            $table->decimal('baths_full', 10, 0)->nullable();
            $table->integer('bedrooms')->nullable();
            $table->string('status', 100)->nullable();
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
        Schema::dropIfExists('real_estate_listings');
    }
}
