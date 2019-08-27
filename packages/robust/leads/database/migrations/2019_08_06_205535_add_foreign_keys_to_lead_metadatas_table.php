<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLeadMetadatasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lead_metadatas', function(Blueprint $table)
        {
            $table->foreign('lead_id', 'lead_metadatas_lead_id_foreign_1')->references('id')->on('leads')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lead_metadatas', function(Blueprint $table)
        {
            $table->dropForeign('lead_metadatas_lead_id_foreign_1');
        });
    }

}
