<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('username', 191)->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('level')->nullable();
            $table->string('agent_status', 191)->nullable();
            $table->boolean('last_assigned_agent')->default(0);
            $table->string('status', 191)->nullable()->default('active');
            $table->string('phone_number')->nullable();
            $table->string('email')->unique();
            $table->string('verified_email')->nullable();
            $table->string('secondary_email', 191)->nullable();
            $table->text('signature')->nullable();
            $table->string('password');
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }

}
