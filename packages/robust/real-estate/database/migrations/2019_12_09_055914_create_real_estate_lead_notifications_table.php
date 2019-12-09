<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateLeadNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_lead_notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lead_id')->unsigned();
            $table->enum('frequency', array('Daily','Weekly','Monthly'));
            $table->enum('type', array('sold_properties','new_properties'));
            $table->string('zip', 191);
            $table->dateTime('notified_at')->useCurrent();
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
        Schema::dropIfExists('real_estate_lead_notifications');
    }
}
