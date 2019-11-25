<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMlsDataMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_data_maps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mls_user_id');
            $table->string('resource',150);
            $table->string('class',150);
            $table->longText('mls_keys');
            $table->longtext('maps');
            $table->longtext('mls_data_sample')->nullable();
            $table->boolean('status')->default(0);
            $table->longText('others')->nullable();
            $table->longText('additional')->nullable();
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
        Schema::drop('real_estate_data_maps');
    }
}
