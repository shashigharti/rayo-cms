<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealEstateLeadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('real_estate_leads', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('first_name');
			$table->string('last_name');
			$table->string('phone_number')->nullable();
			$table->string('open_password', 191)->nullable();
			$table->integer('agent_id')->nullable();
			$table->string('deal_type', 50)->nullable();
			$table->dateTime('last_active')->nullable();
			$table->integer('activation_status')->default(0);
			$table->integer('status_id')->nullable();
			$table->string('ip')->nullable();
			$table->string('agent_partner_assigned', 191)->nullable();
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
		Schema::drop('real_estate_leads');
	}

}
