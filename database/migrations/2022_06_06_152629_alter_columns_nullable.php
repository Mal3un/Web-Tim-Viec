<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', static function (Blueprint $table) {
            if (!Schema::hasColumn('posts', 'remotable')) {
                $table->string('remotable')->nullable()->after('is_partime');
            }
            if (Schema::hasColumn('posts', 'company_id')) {
                $table->unsignedBigInteger('company_id')->nullable()->change();
            }
        });

    }

    public function down()
    {
        //
    }
}
