<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimulasiTryoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulasi_tryouts', function (Blueprint $table) {
            $table->id();
            $table->enum('pilihan', ['1', '2']);
            $table->enum('hasil', ['lolos', 'tidaklolos']);
            $table->string('peserta_id');
            $table->string('jurusan_kode');
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
        Schema::dropIfExists('simulasi_tryouts');
    }
}
