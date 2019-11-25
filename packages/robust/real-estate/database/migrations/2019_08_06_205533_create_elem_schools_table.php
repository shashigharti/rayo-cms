<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateElemSchoolsTable
 */
class CreateElemSchoolsTable extends Migration
{

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_elem_schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191);
            $table->string('slug', 191);
            $table->integer('active')->unsigned()->nullable();
            $table->integer('sold')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::drop('real_estate_elem_schools');
    }

}
