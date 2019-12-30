<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannersImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banners_images', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('banner_id');
			$table->integer('media_id');
			$table->string('link')->nullable();
			$table->string('target')->nullable();
			$table->text('description')->nullable();
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
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
		Schema::drop('banners_images');
	}

}
