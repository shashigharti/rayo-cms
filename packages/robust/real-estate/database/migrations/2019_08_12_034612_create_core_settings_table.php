<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCoreSettingsTable
 */
class CreateCoreSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_core_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('package_name', 255)->nullable();
            $table->string('type', 50);
            $table->text('values');
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
        Schema::dropIfExists('real_estate_core_settings');
    }
}
