<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePagesTableAddNepaliFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->string('name_ne')->after('name')->nullable();
            $table->string('excerpt_ne')->after('excerpt')->nullable();
            $table->longText('content_ne')->after('content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('name_ne');
            $table->dropColumn('excerpt_ne');
            $table->dropColumn('content_ne');
        });
    }
}
