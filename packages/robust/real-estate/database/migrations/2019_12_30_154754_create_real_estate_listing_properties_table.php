<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealEstateListingPropertiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('real_estate_listing_properties', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('listing_id');
			$table->text('type', 65535);
			$table->text('value', 65535);
			$table->boolean('status')->default(1);
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
		Schema::drop('real_estate_listing_properties');
	}

}
