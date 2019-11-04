<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_images', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('listing_id')->index('index_listing_id');
            $table->string('image_id', 50)->nullable();
            $table->text('listing_url', 65535);
            $table->string('type', 191);
            $table->string('modified', 150)->nullable();
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
        Schema::drop('listing_images');
    }
}
