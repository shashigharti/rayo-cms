<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMlsFieldDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mls_field_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mls_user_id');
            $table->string('resource',150);
            $table->string('class',150);
            $table->string('system_name',150)->nullable();
            $table->string('standard_name',150)->nullable();
            $table->string('long_name',150)->nullable();
            $table->string('db_name',150)->nullable();
            $table->string('short_name',150)->nullable();
            $table->string('max_length',150)->nullable();
            $table->string('mapped_key',150)->nullable();
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
        Schema::drop('mls_users');
    }
}
