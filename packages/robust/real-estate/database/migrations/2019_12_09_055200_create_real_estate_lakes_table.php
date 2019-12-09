<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateLakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //lakes
        Schema::create('real_estate_lakes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
//            $table->integer('frontpage')->nullable(); handle it by banner
            $table->string('slug')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('county_id')->nullable();
            $table->integer('zip_id')->nullable();
            $table->integer('school_district_id')->nullable(); //schooldistrict_id
            $table->integer('active')->nullable();
            $table->integer('sold')->nullable();
//            $table->integer('frontpage_order')->nullable();
            $table->integer('menu_order')->nullable();
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
        Schema::dropIfExists('real_estate_lakes');
    }
}
