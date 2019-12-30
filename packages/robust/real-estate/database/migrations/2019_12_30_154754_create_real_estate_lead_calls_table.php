<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealEstateLeadCallsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('real_estate_lead_calls', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('lead_id');
			$table->dateTime('call_datetime')->nullable();
			$table->string('time_frame', 191);
			$table->char('lead_type', 50);
			$table->integer('agent_id');
			$table->dateTime('from')->nullable();
			$table->dateTime('to')->nullable();
			$table->text('observations', 65535);
			$table->dateTime('duration');
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
		Schema::drop('real_estate_lead_calls');
	}

}
