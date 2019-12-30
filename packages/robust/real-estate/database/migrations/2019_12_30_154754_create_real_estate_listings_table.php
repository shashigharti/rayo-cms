<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealEstateListingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('real_estate_listings', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('name')->nullable();
			$table->string('slug')->nullable();
			$table->string('uid', 50)->nullable();
			$table->string('mls_number')->nullable();
			$table->string('class', 100)->nullable();
			$table->integer('area_id')->nullable();
			$table->integer('sub_area_id')->nullable();
			$table->integer('borough_id')->nullable();
			$table->float('system_price', 10, 0)->default(0);
			$table->float('sold_price', 10, 0)->default(0);
			$table->integer('days_on_mls')->nullable();
			$table->integer('asking_price')->nullable();
			$table->string('address_number', 15)->nullable();
			$table->string('address_street', 50)->nullable();
			$table->integer('city_id')->nullable();
			$table->integer('zip_id')->nullable();
			$table->string('state', 20)->nullable();
			$table->integer('subdivision_id')->nullable();
			$table->integer('county_id')->nullable();
			$table->integer('elementary_school_id')->nullable();
			$table->integer('high_school_id')->nullable();
			$table->integer('middle_school_id')->nullable();
			$table->integer('school_district_id')->nullable();
			$table->integer('picture_count')->nullable();
			$table->integer('picture_status')->default(0);
			$table->dateTime('properties_status')->nullable();
			$table->dateTime('input_date')->nullable();
			$table->decimal('baths_full', 10, 0)->nullable();
			$table->integer('bedrooms')->nullable();
			$table->string('status', 100)->nullable();
			$table->string('latitude', 25)->nullable();
			$table->string('longitude', 25)->nullable();
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
		Schema::drop('real_estate_listings');
	}

}
