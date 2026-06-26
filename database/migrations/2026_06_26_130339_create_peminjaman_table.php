<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('user')->onDelete('cascade');
        $table->foreignId('ruangan_id')->constrained('ruangan')->onDelete('cascade');
        $table->date('tanggal_pinjam');
        $table->time('jam_mulai');
        $table->time('jam_selesai');
        $table->string('status')->default('PENDING');
        $table->string('dokumen_surat');
        $table->timestamps();
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};