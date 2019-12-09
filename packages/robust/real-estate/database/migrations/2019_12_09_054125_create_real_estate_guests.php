<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateGuests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //guest_users we can add it to users table as morph
        Schema::create('real_estate_guests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip_addr', 191)->unique();
            $table->string('lead_type', 191);
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
        Schema::dropIfExists('real_estate_guests');
    }
}
