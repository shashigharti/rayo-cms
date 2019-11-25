<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMlsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',150);
            $table->string('slug',150);
            $table->string('state_short',50);
            $table->string('email',150);
            $table->string('contact',150)->nullable();
            $table->string('website',150)->nullable();
            $table->string('logo')->nullable();
            $table->longText('description')->nullable();
            $table->string('login_url');
            $table->string('username');
            $table->string('password');
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
        Schema::drop('real_estate_clients');
    }
}
