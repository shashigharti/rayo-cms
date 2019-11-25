<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateHighSchoolsTable
 */
class CreateHighSchoolsTable extends Migration
{

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_high_schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191);
            $table->string('slug', 191);
            $table->integer('dropdown')->nullable()->default(1);
            $table->timestamps();
            $table->integer('active')->nullable();
            $table->integer('sold')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::drop('real_estate_high_schools');
    }

}
