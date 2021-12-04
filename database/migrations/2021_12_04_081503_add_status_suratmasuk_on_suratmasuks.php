<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusSuratmasukOnSuratmasuks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suratmasuks', function (Blueprint $table) {
            $table->string('status')->default('incoming')->after('prihal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suratmasuks', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
