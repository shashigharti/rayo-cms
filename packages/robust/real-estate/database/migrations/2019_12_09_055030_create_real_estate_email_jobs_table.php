<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateEmailJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_email_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('type');
            $table->integer('total_count')->default(0);
            $table->integer('status')->default(0);
            $table->integer('total_sent')->default(0);
            $table->text('error')->nullable();
            $table->text('success')->nullable();
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
        Schema::dropIfExists('real_estate_email_jobs');
    }
}
