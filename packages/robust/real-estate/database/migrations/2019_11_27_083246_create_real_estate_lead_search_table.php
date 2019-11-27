<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateLeadSearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_lead_search', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lead_id');
            $table->string('name')->nullable();
            $table->string('frequency')->nullable();
            $table->text('content', 65535);
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
        Schema::dropIfExists('real_estate_lead_search');
    }
}
