<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTryoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tryouts', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tanggal_tka');
            $table->string('tanggal_indo_tka');
            $table->time('pukul_tka');
            $table->date('tanggal_tps');
            $table->string('tanggal_indo_tps');
            $table->time('pukul_tps');
            $table->enum('jenis', ['saintek', 'soshum']);
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
        Schema::dropIfExists('tryouts');
    }
}
