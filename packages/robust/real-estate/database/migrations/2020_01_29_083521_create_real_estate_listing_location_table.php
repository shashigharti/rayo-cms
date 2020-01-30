<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealEstateListingLocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('real_estate_listing_location', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('listing_id');
			$table->integer('location_id');
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
		Schema::drop('real_estate_listing_location');
	}

}
