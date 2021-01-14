<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimulasiManualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulasi_manuals', function (Blueprint $table) {
            $table->id();
            $table->enum('pilihan', ['1', '2']);
            $table->enum('program_studi', ['saintek', 'soshum']);
            $table->integer('matematika')->nullable();
            $table->integer('fisika')->nullable();
            $table->integer('kimia')->nullable();
            $table->integer('biologi')->nullable();
            $table->integer('geografi')->nullable();
            $table->integer('ekonomi')->nullable();
            $table->integer('sosiologi')->nullable();
            $table->integer('sejarah')->nullable();
            $table->integer('k_penalaran_umum')->nullable();
            $table->integer('m_bacaan_menulis')->nullable();
            $table->integer('peng_pengetahuan_umum')->nullable();
            $table->integer('k_kuantitatif')->nullable();
            $table->enum('hasil', ['lolos', 'tidaklolos', 'tidaklolos_terekomendasi']);
            $table->string('user_id');
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
        Schema::dropIfExists('simulasi_manuals');
    }
}
