<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateLeadsMapSearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_leads_map_searches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lead_id')->unsigned();
            $table->string('page_session', 191);
            $table->string('url', 191);
            $table->text('filter');
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
        Schema::dropIfExists('real_estate_leads_map_searches');
    }
}
