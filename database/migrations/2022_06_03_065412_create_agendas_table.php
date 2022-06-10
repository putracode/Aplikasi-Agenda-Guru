<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('agendas', function (Blueprint $table) {
        //     $table->id('id');
        //     $table->string('nama_guru');
        //     $table->string('mata_pelajaran');
        //     $table->string('materi');
        //     $table->string('jam_pelajaran');
        //     $table->string('absen');
        //     $table->string('kelas');
        //     $table->enum('pembelajaran',['online','offline']);
        //     $table->string('link');
        //     $table->string('image');    //dokumentasi
        //     $table->string('keterangan');
        //     $table->timestamps();
        // });

        Schema::create('agendas', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('guru_id');
            $table->foreignId('mapel_id');
            $table->string('materi');
            $table->string('jam_pelajaran');
            $table->string('absen');
            $table->foreignId('kelas_id');
            $table->enum('pembelajaran',['online','offline']);
            $table->string('link');
            $table->string('image');    //dokumentasi
            $table->string('keterangan');
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
        Schema::dropIfExists('agendas');
    }
};
