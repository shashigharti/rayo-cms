<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealEstateSentEmailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('real_estate_sent_emails', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('agent_id');
			$table->string('lead_id', 191)->nullable();
			$table->string('subject')->nullable();
			$table->text('email', 65535);
			$table->integer('click')->nullable();
			$table->integer('open')->nullable();
			$table->integer('unsubscribe')->nullable();
			$table->string('reply_to_id', 150)->nullable();
			$table->string('message_id', 150)->nullable();
			$table->integer('outgoing')->nullable();
			$table->integer('incoming')->nullable();
			$table->integer('delivered')->nullable();
			$table->integer('dropped')->nullable();
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
		Schema::drop('real_estate_sent_emails');
	}

}
