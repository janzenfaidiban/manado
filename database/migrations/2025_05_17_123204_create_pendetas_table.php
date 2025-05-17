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
        Schema::create('pendetas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->enum('pendidikan_terakhir', [
                'SD', 
                'SMP', 
                'SMA/SMK', 
                'S1', 
                'S2', 
                'S3', 
                'Lainnya'
            ]);
            $table->string('foto_profil')->nullable(); // bisa nullable jika belum upload
            $table->text('keterangan')->nullable();   // opsional
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendetas');
    }
};
