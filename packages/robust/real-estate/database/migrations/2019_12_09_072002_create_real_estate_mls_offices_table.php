<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateMlsOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_mls_offices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('designated_realtor_id', 191)->nullable();
            $table->string('designated_realtor_mlsid', 191)->nullable();
            $table->string('email', 191)->nullable();
            $table->string('head_office_id', 191)->nullable();
            $table->string('head_office_mlsid', 191)->nullable();
            $table->string('mls', 191)->nullable();
            $table->string('mlsid', 191)->nullable();
            $table->string('matrix_unique_id', 191)->nullable();
            $table->string('office_contact_mlsid', 191)->nullable();
            $table->string('office_name', 191)->nullable();
            $table->string('office_status', 191)->nullable();
            $table->string('phone', 191)->nullable();
            $table->string('photos', 191)->nullable();
            $table->string('primary_board', 191)->nullable();
            $table->string('website', 191)->nullable();
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
        Schema::dropIfExists('real_estate_mls_offices');
    }
}
