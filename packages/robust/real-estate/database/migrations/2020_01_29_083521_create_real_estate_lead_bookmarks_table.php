<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealEstateLeadBookmarksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('real_estate_lead_bookmarks', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('lead_id');
			$table->string('title');
			$table->text('url');
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
		Schema::drop('real_estate_lead_bookmarks');
	}

}
