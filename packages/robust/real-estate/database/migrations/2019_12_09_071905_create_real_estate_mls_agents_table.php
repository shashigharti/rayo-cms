<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateMlsAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //mls_agents
        Schema::create('real_estate_mls_agents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 191)->nullable();
            $table->string('board', 191)->nullable();
            $table->string('cell_phone', 191)->nullable();
            $table->string('work_phone', 191)->nullable();
            $table->string('email', 191)->nullable();
            $table->string('uid', 191)->nullable();
            $table->string('mls', 191)->nullable();
            $table->string('mlsid', 191)->nullable();
            $table->string('office_mui', 191)->nullable();
            $table->string('office_mlsid', 191)->nullable();
            $table->string('photos', 191)->nullable();
            $table->string('street', 191)->nullable();
            $table->string('city', 191)->nullable();
            $table->string('website', 191)->nullable();
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
        Schema::dropIfExists('real_estate_mls_agents');
    }
}
