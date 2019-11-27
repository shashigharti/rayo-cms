<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateUserFavouritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_user_favourites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lead_id')->unsigned()->index('lead_id');
            $table->integer('listings_id')->unsigned()->index('listing_id');
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
        Schema::dropIfExists('real_estate_user_favourites');
    }
}
