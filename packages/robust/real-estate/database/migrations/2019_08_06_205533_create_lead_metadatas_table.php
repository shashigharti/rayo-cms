<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeadMetadatasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_lead_metadatas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('lead_id')->unsigned()->index('lead_metadatas_lead_id_foreign_1');
            $table->integer('min_price')->nullable();
            $table->integer('max_price')->nullable();
            $table->integer('median_price')->nullable();
            $table->integer('average_price')->nullable();
            $table->string('price_note', 1024)->nullable();
            $table->string('timeframe', 191)->nullable();
            $table->string('source', 191)->nullable();
            $table->dateTime('followup')->nullable();
            $table->integer('lead_quality_score')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('last_touch', 191)->nullable();
            $table->string('last_touch_type', 191)->nullable();
            $table->string('favourite_city', 191)->nullable();
            $table->string('opted_in_email', 191)->nullable();
            $table->string('opted_in_text', 191)->nullable();
            $table->string('source_keyword', 191)->nullable();
            $table->integer('followup_assigned_to')->nullable()->comment('The agent that followup is assigned to.');
            $table->string('followup_notes', 1024)->nullable();
            $table->integer('search_count')->default(0);
            $table->integer('login_count')->default(0);
            $table->integer('favourites_count')->default(0);
            $table->integer('views_count')->default(0);
            $table->integer('emails_count')->default(0);
            $table->integer('calls_count')->default(0);
            $table->integer('comments_count')->default(0);
            $table->integer('notes_count')->default(0);
            $table->integer('email_replies_count')->default(0);
            $table->text('market_stats');
            $table->string('lead_type', 191)->default('N/A');
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
        Schema::drop('real_estate_lead_metadatas');
    }

}
