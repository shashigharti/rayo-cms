<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBannersImagesTableAddStartEndDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banners_images', function (Blueprint $table) {
            $table->date('start_date')->nullable()->after('description');
            $table->date('end_date')->nullable()->after('start_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banners_images', function (Blueprint $table) {
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
        });
    }
}
