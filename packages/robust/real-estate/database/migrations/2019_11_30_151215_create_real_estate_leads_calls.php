<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateLeadsCalls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_leads_calls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lead_id');
            $table->dateTime('call_datetime')->nullable();
            $table->string('time_frame');
            $table->string('lead_type',50);
            $table->integer('agent_id');
            $table->dateTime('from')->nullable();
            $table->dateTime('to')->nullable();
            $table->text('observations');
            $table->dateTime('duration');
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
        Schema::dropIfExists('real_estate_leads_calls');
    }
}
