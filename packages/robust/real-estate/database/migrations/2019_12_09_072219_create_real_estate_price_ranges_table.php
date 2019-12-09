<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstatePriceRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_price_ranges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('priceRangeable_id');
            $table->string('priceRangeable_type', 50);
            $table->string('price_range_name', 50);
            $table->string('price_range', 30);
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
        Schema::dropIfExists('real_estate_price_ranges');
    }
}
