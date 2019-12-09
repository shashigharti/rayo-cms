<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //emails
        Schema::create('real_estate_emails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('campaign_id');
            $table->integer('template_id');
            $table->string('schedule');
            $table->boolean('schedule_type')->default(0);
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
        Schema::dropIfExists('real_estate_emails');
    }
}
