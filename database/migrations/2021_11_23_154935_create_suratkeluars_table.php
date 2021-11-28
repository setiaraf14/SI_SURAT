<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratkeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratkeluars', function (Blueprint $table) {
            $table->id();
            $table->string('tujuan_surat')->nullable();
            $table->string('nomor_surat')->nullable();
            $table->date('tanggal_surat')->nullable();
            $table->string('prihal')->nullable()->default('-');
            $table->bigInteger('index_surat_id');
            $table->text('softcopy_surat')->nullable();
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
        Schema::dropIfExists('suratkeluars');
    }
}
