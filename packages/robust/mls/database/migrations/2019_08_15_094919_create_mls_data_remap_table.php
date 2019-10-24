<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMlsDataRemapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mls_data_remap', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mls_user_id');
            $table->string('resource',150);
            $table->string('class',150);
            $table->string('remap_key',150);
            $table->longText('remaps')->nullable();
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
        Schema::drop('mls_data_remap');
    }
}
