<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateSentEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_sent_emails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('agent_id');
            $table->string('lead_id', 191)->nullable();
            $table->string('subject')->nullable();
            $table->text('email');
            $table->integer('click')->nullable();
            $table->integer('open')->nullable();
            $table->integer('unsubscribe')->nullable();
            $table->string('reply_to_id', 150)->nullable();
            $table->string('message_id', 150)->nullable();
            $table->integer('outgoing')->nullable();
            $table->integer('incoming')->nullable();
            $table->integer('delivered')->nullable();
            $table->integer('dropped')->nullable();
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
        Schema::dropIfExists('real_estate_sent_emails');
    }
}
