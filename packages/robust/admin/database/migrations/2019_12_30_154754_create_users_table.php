<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('member_id');
			$table->string('member_type');
			$table->string('email');
			$table->string('user_name')->nullable();
			$table->string('password');
			$table->string('open_password')->nullable();
			$table->string('remember_token')->nullable();
			$table->dateTime('last_active_at')->nullable();
			$table->dateTime('email_verified_at')->nullable();
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
		Schema::drop('users');
	}

}
