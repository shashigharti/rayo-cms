<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealEstateMarketReportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('real_estate_market_reports', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('location_id');
			$table->string('locationable_type');
			$table->string('slug');
			$table->string('name');
			$table->text('total_listings', 65535)->nullable();
			$table->text('total_listings_active', 65535)->nullable();
			$table->text('total_listings_sold', 65535)->nullable();
			$table->text('total_listings_sold_past_year', 65535)->nullable();
			$table->text('total_listings_sold_this_year', 65535)->nullable();
			$table->text('median_price_active', 65535)->nullable();
			$table->text('median_price_sold', 65535)->nullable();
			$table->text('median_price_sold_past_year', 65535)->nullable();
			$table->text('median_price_sold_this_year', 65535)->nullable();
			$table->text('average_price_active', 65535)->nullable();
			$table->text('average_price_sold', 65535)->nullable();
			$table->text('average_price_sold_past_year', 65535)->nullable();
			$table->text('average_price_sold_this_year', 65535)->nullable();
			$table->text('average_dos', 65535)->nullable();
			$table->text('average_dos_past_year', 65535)->nullable();
			$table->text('average_dos_this_year', 65535)->nullable();
			$table->text('median_dos', 65535)->nullable();
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
		Schema::drop('real_estate_market_reports');
	}

}
