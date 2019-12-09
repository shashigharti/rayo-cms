<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealEstateLeadsImportCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //import_count Cant be sure what it is used for
        Schema::create('real_estate_leads_import_counts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lead_id')->unsigned()->nullable()->index('lead_user_lead_id_foreign');
            $table->integer('login_count')->nullable();
            $table->integer('search_count')->nullable();
            $table->integer('listings_viewed')->nullable();
            $table->string('favorites', 191)->nullable();
            $table->string('search_engine_query', 191)->nullable();
            $table->integer('realtor_email_sent_count')->nullable();
            $table->integer('realtor_phone_calls_count')->nullable();
            $table->integer('realtor_comment_count')->nullable();
            $table->integer('realtor_face_to_face')->nullable();
            $table->integer('realtor_offers')->nullable();
            $table->integer('realtor_closing')->nullable();
            $table->integer('new_listing_email_sent_count')->nullable();
            $table->integer('email_responses_count')->nullable();
            $table->integer('showing_request_count')->nullable();
            $table->integer('info_request_count')->nullable();
            $table->integer('CMA_requests_count')->nullable();
            $table->integer('realtor_follow_up_date')->nullable();
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
        Schema::dropIfExists('real_estate_leads_import_counts');
    }
}
