<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealEstateListingImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('real_estate_listing_images', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('listing_id');
			$table->string('image_id', 50)->nullable();
			$table->text('url', 65535);
			$table->string('type');
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
		Schema::drop('real_estate_listing_images');
	}

}
