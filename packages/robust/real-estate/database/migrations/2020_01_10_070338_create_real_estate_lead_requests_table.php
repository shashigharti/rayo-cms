<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealEstateLeadRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('real_estate_lead_requests', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('lead_id')->unsigned()->nullable()->index('lead_requests_lead_id_foreign');
			$table->integer('agent_id')->unsigned()->nullable()->index('lead_requests_agent_id_foreign');
			$table->integer('listing_id')->unsigned()->nullable()->index('lead_requests_listing_id_foreign');
			$table->string('type', 50);
			$table->string('status', 50);
			$table->string('subject')->nullable();
			$table->text('body', 65535)->nullable();
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
		Schema::drop('real_estate_lead_requests');
	}

}
