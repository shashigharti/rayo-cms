<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateLeadReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_lead_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lead_id');
            $table->string('name', 191)->nullable();
            $table->string('type', 191)->nullable();
            $table->string('url', 191)->nullable();
            $table->string('frequency', 191)->nullable();
            $table->string('content', 191)->nullable();
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
        Schema::dropIfExists('real_estate_lead_reports');
    }
}
