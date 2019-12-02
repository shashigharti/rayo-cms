<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateAlerts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_alerts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lead_id');
            $table->string('name', 191);
            $table->string('type', 191);
            $table->string('model', 191);
            $table->string('frequency', 191);
            $table->string('location', 191)->nullable();
            $table->string('sold', 191)->nullable();
            $table->string('active', 191)->nullable();
            $table->dateTime('reference_time')->nullable();
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
        Schema::dropIfExists('real_estate_alerts');
    }
}
