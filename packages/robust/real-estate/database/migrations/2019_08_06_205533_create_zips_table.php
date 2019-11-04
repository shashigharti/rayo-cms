<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateZipsTable
 */
class CreateZipsTable extends Migration
{

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('zips', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->integer('dropdown')->nullable()->default(1);
            $table->integer('city_id')->nullable();
            $table->integer('county_id')->nullable();
            $table->timestamps();
            $table->integer('active')->nullable();
            $table->integer('sold')->nullable();
            $table->integer('frontpage_order')->nullable();
            $table->integer('menu_order')->nullable();
            $table->string('latitude', 25)->nullable();
            $table->string('longitude', 25)->nullable();
        });
    }


    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::drop('zips');
    }

}
