<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateAgentPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_agent_properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('agent_id');
            $table->text('type');
            $table->text('value');
            $table->timestamps();
            //agent details table in old rws.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('real_estate_agent_properties');
    }
}
