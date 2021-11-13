<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIndexSuratOnSuratmasuks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suratmasuks', function (Blueprint $table) {
            $table->bigInteger('index_surat_id')->after('prihal')->default(0);
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
            $table->dropColumn('index_surat_id');
        });
    }
}
