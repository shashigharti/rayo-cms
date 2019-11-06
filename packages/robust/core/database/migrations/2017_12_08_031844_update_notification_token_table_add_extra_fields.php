<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateNotificationTokenTableAddExtraFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notification_tokens', function (Blueprint $table) {
            $table->string('app');
            $table->integer('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notification_tokens', function (Blueprint $table) {
            $table->dropColumn(['app', 'active']);
        });
    }
}
