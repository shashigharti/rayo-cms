<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('avatar')->nullable();
            $table->integer('agent_id')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('phone_number_2')->nullable();
            $table->string('phone_number_3')->nullable();
            $table->string('verified_phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('ip')->nullable();
            $table->string('user_type')->nullable();
            $table->string('contact_status')->nullable();
            $table->string('email')->unique();
            $table->string('deal_type')->unique();
            $table->string('verified_email')->nullable();
            $table->string('additional_email')->nullable();
            $table->string('password');
            $table->string('open_password')->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->string('iso_code', 191)->nullable();
            $table->string('country', 191)->nullable();
            $table->string('city', 191)->nullable();
            $table->string('state', 191)->nullable();
            $table->string('state_name', 191)->nullable();
            $table->string('postal_code', 191)->nullable();
            $table->integer('lat')->nullable();
            $table->integer('lon')->nullable();
            $table->string('zip',50)->nullable();
            $table->string('timezone', 191)->nullable();
            $table->string('continent', 191)->nullable();
            $table->boolean('default')->nullable();
            $table->string('currency', 191)->nullable();
            $table->string('agent_partner_assigned', 191)->nullable();
            $table->timestamp('last_active')->nullable();
            $table->integer('activation_status')->default(0);
            $table->integer('status_id')->nullable();
            $table->string('default_alert_frequency',191)->nullable();
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
        Schema::drop('leads');
    }
}
