<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('real_estate_attributes', function (Blueprint $table) {
//            $table->bigIncrements('id');
//            $table->string('name', 30);
//            $table->string('display_name', 100);
//            $table->longText('values');
//            $table->boolean('status'); //1 - Enabled, 0 - Disabled
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('real_estate_attributes');
    }
}
