<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealEstateEmailTemplatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('real_estate_email_templates', function(Blueprint $table)
		{
			$table->integer('id')->unsigned()->primary();
			$table->integer('user_id')->nullable();
			$table->string('name', 64);
			$table->string('type', 64);
			$table->string('subject', 128)->nullable();
			$table->text('body', 65535)->nullable();
			$table->boolean('editable')->default(1);
			$table->boolean('removable')->default(1);
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
		Schema::drop('real_estate_email_templates');
	}

}
