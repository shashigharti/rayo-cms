<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateLeadsFollowups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_leads_followups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lead_id');
            $table->tinyInteger('type');
            $table->date('date');
            $table->integer('agent_id');
            $table->integer('assigned_by')->nullable();
            $table->text('note');
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
        Schema::dropIfExists('real_estate_leads_followups');
    }
}
