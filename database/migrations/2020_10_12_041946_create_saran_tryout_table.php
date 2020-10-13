<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaranTryoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saran_tryouts', function (Blueprint $table) {
            $table->id();
            $table->enum('prioritas', ['1', '2', '3']);
            $table->string('deskripsi')->nullable();
            $table->string('simulasi_tryout_id');
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
        Schema::dropIfExists('saran_tryouts');
    }
}
