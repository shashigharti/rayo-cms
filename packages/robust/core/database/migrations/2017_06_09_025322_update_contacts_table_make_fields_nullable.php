<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateContactsTableMakeFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('email')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->string('subject')->nullable()->change();
            $table->longText('message')->nullable()->change();
            $table->string('type')->after('message');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('email')->change();
            $table->string('phone')->change();
            $table->string('subject')->change();
            $table->string('message')->change();
            $table->dropColumn('type');
        });
    }
}
