<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateAutomatedEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //automated_emails
        Schema::create('real_estate_automated_emails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('setting_name', 191);
            $table->integer('frequency');
            $table->string('email_subject', 191);
            $table->text('email_body');
            $table->boolean('default')->default(0);
            $table->text('search_filters');
            $table->string('type', 191)->default('Regular');
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
        Schema::dropIfExists('real_estate_automated_emails');
    }
}
