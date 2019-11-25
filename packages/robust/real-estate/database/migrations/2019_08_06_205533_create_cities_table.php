<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateCitiesTable
 */
class CreateCitiesTable extends Migration
{

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('state_short', 191)->nullable();
            $table->integer('frontpage')->nullable()->default(1);
            $table->integer('dropdown')->nullable()->default(1);
            $table->string('footer', 191)->default('0');
            $table->integer('navigation')->nullable()->default(0);
            $table->integer('marketreport')->nullable()->default(0);
            $table->integer('delete')->nullable()->default(0);
            $table->integer('active')->nullable();
            $table->integer('sold')->nullable();
            $table->integer('frontpage_order')->nullable();
            $table->integer('menu_order')->nullable();
            $table->integer('footer_order')->default(999);
            $table->string('order_footer', 191)->default('999');
            $table->integer('hide_subdivs')->nullable();
            $table->string('latitude', 25)->nullable();
            $table->string('longitude', 25)->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::drop('real_estate_cities');
    }

}
