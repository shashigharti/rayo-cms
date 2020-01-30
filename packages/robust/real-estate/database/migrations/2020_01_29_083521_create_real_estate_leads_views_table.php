<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealEstateLeadsViewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('real_estate_leads_views', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('lead_id')->unsigned()->index('user_listing_views_lead_id_foreign');
			$table->integer('listing_id')->unsigned()->index('user_listing_views_listing_id_foreign');
			$table->boolean('agent_notified');
			$table->integer('count');
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
		Schema::drop('real_estate_leads_views');
	}

}
