<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateLeadDataImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_lead_data_imports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lead_id')->unsigned()->nullable()->index('lead_user_lead_id_foreign');
            $table->string('property_inquiries', 191)->nullable();
            $table->string('favorite_properties', 191)->nullable();
            $table->string('property_views', 191)->nullable();
            $table->string('level', 191)->nullable();
            $table->string('saved_searches', 191)->nullable();
            $table->string('pre_qualified_for_mortgage', 191)->nullable();
            $table->string('house_to_sell', 191)->nullable();
            $table->string('first_time_buyer', 191)->nullable();
            $table->string('infusionSoft_id', 191)->nullable();
            $table->string('overdue_reminder_date', 191)->nullable();
            $table->string('info_dump', 191)->nullable();
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
        Schema::dropIfExists('real_estate_lead_data_imports');
    }
}
