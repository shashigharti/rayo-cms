<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateUnsubscribeLeadsTable
 */
class CreateUnsubscribeLeadsTable extends Migration
{

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_unsubscribe_leads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lead_id');
            $table->boolean('is_unsubscribe')->default(1);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::drop('real_estate_unsubscribe_leads');
    }

}
