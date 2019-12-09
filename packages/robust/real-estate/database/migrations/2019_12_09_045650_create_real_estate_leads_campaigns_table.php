<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateLeadsCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //campaign_lead
        Schema::create('real_estate_leads_campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('campaign_id')->unique();
            $table->string('lead_id')->unique();
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
        Schema::dropIfExists('real_estate_leads_campaigns');
    }
}
