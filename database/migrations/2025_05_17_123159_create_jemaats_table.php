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
        Schema::create('jemaats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->enum('pendidikan_terakhir', [
                'SD', 'SMP', 'SMA/SMK', 'S1', 'S2', 'S3', 'Lainnya'
            ]);
            $table->enum('pekerjaan', [
                'Pelajar', 'Mahasiswa', 'PNS', 'TNI', 'POLRI', 
                'Guru', 'Petani', 'Wiraswasta', 'Lainnya'
            ]);
            $table->enum('lingkungan', ['1', '2', '3', '4']);
            $table->timestamps();

            // Jika ingin hubungan dengan tabel users
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jemaats');
    }
};
