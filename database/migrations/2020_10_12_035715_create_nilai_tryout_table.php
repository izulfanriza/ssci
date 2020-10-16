<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTryoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_tryouts', function (Blueprint $table) {
            $table->id();
            $table->string('benar')->nullable();
            $table->string('salah')->nullable();
            $table->string('kosong')->nullable();
            $table->string('skor')->nullable();
            $table->string('mapel_kode');
            $table->string('peserta_id');
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
        Schema::dropIfExists('nilai_tryouts');
    }
}
