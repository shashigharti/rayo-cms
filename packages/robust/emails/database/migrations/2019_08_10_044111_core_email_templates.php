<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CoreEmailTemplates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_email_templates', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->integer('group');
            $table->integer('template');
            $table->integer('status')->default(0);
            $table->string('subject', 200);
            $table->integer('frequency');
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
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
        Schema::drop('core_email_templates');
    }
}
