<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages_categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('name_ne')->nullable();
			$table->string('slug');
			$table->text('description');
			$table->text('description_ne')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pages_categories');
	}

}
