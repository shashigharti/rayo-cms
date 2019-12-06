<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableListingsIdForLocations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('real_estate_listings', function(Blueprint $table) {
            $table->renameColumn('area', 'area_id');
            $table->renameColumn('city', 'city_id');
            $table->renameColumn('zip', 'zip_id');
            $table->renameColumn('subdivision', 'subdivision_id');
            $table->renameColumn('county', 'county_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stnk', function(Blueprint $table) {
            $table->renameColumn('area_id', 'area');
            $table->renameColumn('city_id', 'city');
            $table->renameColumn('zip_id', 'zip');
            $table->renameColumn('subdivision_id', 'subdivision');
            $table->renameColumn('county_id', 'county');
        });
    }
}
