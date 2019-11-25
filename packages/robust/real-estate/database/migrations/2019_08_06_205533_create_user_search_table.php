<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateUserSearchTable
 */
class CreateUserSearchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('real_estate_user_search', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('name', 50)->nullable();
			$table->string('frequency', 50)->nullable();
			$table->text('content', 65535)->nullable();
			$table->timestamps();
			$table->dateTime('reference_time');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('real_estate_user_search');
	}

}
