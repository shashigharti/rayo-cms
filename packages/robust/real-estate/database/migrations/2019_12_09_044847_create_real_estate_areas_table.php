<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_areas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 191);
            $table->string('slug', 191)->nullable();
//            $table->boolean('front_page')->default(0); //integer frontpage nullable (handled by banners
            $table->boolean('dropdown')->nullable()->default(0); //integer nullable
            $table->integer('menu_order')->nullable();
            $table->integer('front_page_order')->nullable(); //frontpage_order
            $table->integer('active')->nullable();
            $table->integer('sold')->nullable();
            $table->boolean('sub_divs')->default(1); //hide_subdivs
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
        Schema::dropIfExists('real_estate_areas');
    }
}
