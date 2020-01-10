<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealEstateLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('real_estate_locations', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('name', 200);
			$table->string('slug', 200);
			$table->boolean('status')->default(1);
			$table->integer('active_count')->default(0);
			$table->integer('sold_count')->default(0);
			$table->integer('locationable_id')->unsigned();
			$table->string('locationable_type');
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
		Schema::drop('real_estate_locations');
	}

}
