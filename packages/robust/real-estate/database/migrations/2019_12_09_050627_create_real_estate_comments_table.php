<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //comments
        Schema::create('real_estate_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('commentable_id');
            $table->integer('commentator_id');
            $table->string('commentable_type', 191);
            $table->text('comment');
            $table->string('contacted', 191)->nullable();
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
        Schema::dropIfExists('real_estate_comments');
    }
}
