<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateSentEmailsTable
 */
class CreateSentEmailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sent_emails', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('agent_id');
			$table->string('lead_id', 191)->nullable();
			$table->string('subject')->nullable();
			$table->text('email', 65535);
			$table->integer('click')->nullable();
			$table->integer('open')->nullable();
			$table->integer('unsubscribe')->nullable();
			$table->string('reply_to_id', 150)->nullable();
			$table->string('message_id', 150)->nullable();
			$table->timestamps();
			$table->integer('outgoing')->nullable();
			$table->integer('incoming')->nullable();
			$table->integer('delivered')->nullable();
			$table->integer('dropped')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sent_emails');
	}

}
