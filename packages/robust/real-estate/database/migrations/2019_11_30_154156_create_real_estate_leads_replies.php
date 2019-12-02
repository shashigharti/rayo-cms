<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateLeadsReplies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_leads_replies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lead_id');
            $table->string('from');
            $table->string('message_id');
            $table->dateTime('date');
            $table->string('body_html');
            $table->string('subject');
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
        Schema::dropIfExists('real_estate_leads_replies');
    }
}
