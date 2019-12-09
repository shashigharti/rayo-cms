<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateSchoolDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_school_districts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->integer('dropdown')->nullable()->default(0); //1
            $table->integer('active')->nullable();
            $table->integer('sold')->nullable();
            $table->integer('front_page_order')->nullable(); //frontpage_order
            $table->integer('menu_order')->nullable();
            $table->string('latitude', 25)->nullable();
            $table->string('longitude', 25)->nullable();
            $table->index(['slug','sold'], 'index_slug_sold');
            $table->index(['slug','active'], 'index_slug_active');
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
        Schema::dropIfExists('real_estate_school_districts');
    }
}
