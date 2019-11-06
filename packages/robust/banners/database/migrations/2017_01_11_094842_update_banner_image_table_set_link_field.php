<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBannerImageTableSetLinkField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banners_images', function (Blueprint $table) {
            $table->string('link')->nullable()->after('media_id');
            $table->string('target')->nullable()->after('link');

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
            $table->dropColumn('link');
            $table->dropColumn('target');
        });
    }
}
