<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('state_short', 191)->nullable();
//            $table->boolean('front_page')->nullable()->default(1); frontpage handle by banners
            $table->boolean('dropdown')->default(1); //integer
            $table->boolean('footer', 191)->default('0');
            $table->boolean('navigation')->default(0);
            $table->boolean('market_report')->default(0);
            $table->integer('delete')->default(0);
            $table->integer('active')->nullable();
            $table->integer('sold')->nullable();
//            $table->integer('frontpage_order')->nullable(); handled by banner
            $table->integer('menu_order')->nullable();
            $table->integer('footer_order')->default(999);
//            $table->string('order_footer', 191)->default('999'); repeated above
            $table->boolean('sub_divs')->default(0);
            $table->string('latitude', 25)->nullable();
            $table->string('longitude', 25)->nullable();
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
        Schema::dropIfExists('real_estate_cities');
    }
}
