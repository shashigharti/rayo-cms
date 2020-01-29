<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealEstateSubdivisionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('real_estate_subdivisions', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('name');
			$table->string('slug');
			$table->text('alternate_name', 65535)->nullable();
			$table->text('alternate_slug', 65535)->nullable();
			$table->text('group_name', 65535)->nullable();
			$table->text('group_slug', 65535)->nullable();
			$table->integer('city_id')->nullable();
			$table->integer('area_id')->nullable();
			$table->integer('county_id')->nullable();
			$table->integer('zip_id')->nullable();
			$table->integer('school_district_id')->nullable();
			$table->boolean('status')->default(0);
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
		Schema::drop('real_estate_subdivisions');
	}

}
