<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealEstateLeadNotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('real_estate_lead_notes', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('agent_id');
			$table->integer('lead_id');
			$table->string('title', 191);
			$table->text('note', 65535);
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
		Schema::drop('real_estate_lead_notes');
	}

}
