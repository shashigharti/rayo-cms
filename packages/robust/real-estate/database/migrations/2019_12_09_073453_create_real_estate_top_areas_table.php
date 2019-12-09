<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateTopAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_top_areas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('area_id');
            $table->string('type');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->integer('median')->nullable();
            $table->integer('average')->nullable();
            $table->integer('sold')->nullable();
            $table->integer('active')->nullable();
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
        Schema::dropIfExists('real_estate_top_areas');
    }
}
