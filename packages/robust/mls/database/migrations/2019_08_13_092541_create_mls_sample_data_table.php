<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMlsSampleDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mls_sample_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mls_user_id');
            $table->string('resource',150);
            $table->string('class',150);
            $table->longText('data')->nullable();
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
        Schema::drop('mls_sample_data');
    }
}
