<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateActivityLogTable
 */
class CreateActivityLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('real_estate_activity_log', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('log_name')->nullable();
			$table->string('description');
			$table->integer('causer_id')->nullable();
			$table->string('causer_type')->nullable();
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
		Schema::drop('real_estate_activity_log');
	}

}
