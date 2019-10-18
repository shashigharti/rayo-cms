<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMlsQueryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mls_query', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mls_user_id');
            $table->longText('query_filter')->nullable();
            $table->string('query_limit',150)->nullable();
            $table->integer('number_of_days')->nullable();
            $table->boolean('picture')->default('1');
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
        Schema::drop('mls_query');
    }
}
