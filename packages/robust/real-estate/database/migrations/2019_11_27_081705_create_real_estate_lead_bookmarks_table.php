<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateLeadBookmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_lead_bookmarks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lead_id');
            $table->string('title');
            $table->string('active_count')->nullable();
            $table->string('sold_count')->nullable();
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
        Schema::dropIfExists('real_estate_lead_bookmarks');
    }
}
