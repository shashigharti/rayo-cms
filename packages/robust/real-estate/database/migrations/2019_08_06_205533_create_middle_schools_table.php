<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateMiddleSchoolsTable
 */
class CreateMiddleSchoolsTable extends Migration
{

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('middle_schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191);
            $table->string('slug', 191);
            $table->integer('active')->unsigned()->nullable();
            $table->integer('sold')->nullable();
            $table->timestamps();
            $table->boolean('visible')->default(1);
        });
    }


    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::drop('middle_schools');
    }

}
