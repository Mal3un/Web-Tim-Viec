<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnTypeInObjectLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('object_language', 'type')) {
            Schema::table('object_language', function (Blueprint $table) {
                $table->string('type')->change();
            });
            Schema::table('object_language', function (Blueprint $table) {
                $table->renameColumn('type','object_type')->change();
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
