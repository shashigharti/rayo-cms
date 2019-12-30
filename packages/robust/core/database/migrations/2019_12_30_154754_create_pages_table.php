<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('name_ne')->nullable();
			$table->string('slug');
			$table->string('excerpt')->nullable();
			$table->string('excerpt_ne')->nullable();
			$table->text('content')->nullable();
			$table->text('content_ne')->nullable();
			$table->integer('thumbnail')->nullable();
			$table->integer('category_id');
			$table->boolean('status')->default(1);
			$table->timestamps();
			$table->softDeletes();
			$table->string('meta_title')->nullable();
			$table->string('meta_description')->nullable();
			$table->string('meta_keywords')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pages');
	}

}
