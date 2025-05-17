<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('majelis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->enum('lingkungan', ['1', '2', '3', '4']);
            $table->string('jabatan');
            $table->string('periode_jabatan');
            $table->enum('pekerjaan', [
                'Pelajar', 
                'Mahasiswa', 
                'PNS', 
                'TNI', 
                'POLRI', 
                'Guru', 
                'Petani', 
                'Wiraswasta', 
                'Lainnya'
            ]);
            $table->enum('pendidikan_terakhir', [
                'SD', 
                'SMP', 
                'SMA/SMK', 
                'S1', 
                'S2', 
                'S3', 
                'Lainnya'
            ]);
            $table->string('foto_profil')->nullable(); // bisa nullable kalau belum upload
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('majelis');
    }
};
