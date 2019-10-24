<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMlsLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mls_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mls_user_id');
            $table->string('resource',150);
            $table->string('class',150);
            $table->string('query_limit',20);
            $table->string('data_count',50)->nullable();
            $table->string('status',20)->default('processing');
            $table->longText('exception_error')->nullable();
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
        Schema::drop('mls_logs');
    }
}
