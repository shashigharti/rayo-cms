<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateUserLoginHistoryTable
 */
class CreateUserLoginHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('real_estate_user_login_history', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('type_of_event');
			$table->dateTime('time_of_login');
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
		Schema::drop('real_estate_user_login_history');
	}

}
