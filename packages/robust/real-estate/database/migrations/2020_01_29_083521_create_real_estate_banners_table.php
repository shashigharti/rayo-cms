<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealEstateBannersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('real_estate_banners', function(Blueprint $table)
		{
            $table->increments('id');
			$table->string('title');
			$table->string('slug');
			$table->string('template', 20)->nullable();
			$table->text('properties', 65535)->nullable();
			$table->integer('order')->nullable();
			$table->boolean('status')->nullable();
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
		Schema::drop('real_estate_banners');
	}

}
