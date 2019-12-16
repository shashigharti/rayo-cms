<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnOfRealEstateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('real_estate_attributes', function (Blueprint $table) {
            $table->renameColumn('name', 'property_name');
            $table->renameColumn('display_name', 'name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('real_estate_attributes', function (Blueprint $table) {
            $table->renameColumn('property_name', 'name');
            $table->renameColumn('name', 'display_name');
        });
    }
}
