<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCategoriesTableAddNepaliFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages_categories', function (Blueprint $table) {
            $table->string('name_ne')->after('name')->nullable();
            $table->longText('description_ne')->after('description')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages_categories', function (Blueprint $table) {
            $table->dropColumn('name_ne');
            $table->dropColumn('description_ne');

        });
    }
}
