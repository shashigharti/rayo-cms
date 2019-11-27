<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateSubdivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_subdivisions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->integer('city_id')->nullable();
            $table->integer('county_id')->nullable();
            $table->integer('zip_id')->nullable();
            $table->integer('schooldistrict_id')->nullable();
            $table->integer('frontpage')->nullable();
            $table->integer('active')->nullable();
            $table->integer('sold')->nullable();
            $table->integer('frontpage_order')->nullable();
            $table->integer('menu_order')->nullable();
            $table->integer('latitude')->nullable();
            $table->integer('longitude')->nullable();
            $table->integer('area_id')->nullable();
            $table->string('group_name')->nullable();
            $table->string('group_slug')->nullable();
            $table->boolean('visible')->default(1);
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
        Schema::dropIfExists('real_estate_subdivisions');
    }
}
