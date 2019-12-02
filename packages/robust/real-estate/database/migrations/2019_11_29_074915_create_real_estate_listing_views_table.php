<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateListingViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_listing_views', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lead_id')->unsigned()->index('user_listing_views_lead_id_foreign');
            $table->integer('listing_id')->unsigned()->index('user_listing_views_listing_id_foreign');
            $table->boolean('agent_notified');
            $table->integer('count');
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
        Schema::dropIfExists('real_estate_listing_views');
    }
}
