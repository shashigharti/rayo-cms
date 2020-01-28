<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRealEstateEmailTemplatesAddTemplateField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('real_estate_email_templates', function (Blueprint $table) {
            $table->increments('id')->change();
            $table->string('template')->nullable()->after('body');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('real_estate_email_templates', function (Blueprint $table) {
            $table->integer('id')->unsigned()->primary()->change();
            $table->dropColumn('template');
        });
    }
}
