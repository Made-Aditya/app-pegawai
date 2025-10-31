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
        // PERBAIKAN: Gunakan nama tabel singular 'attendance'
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            // PERBAIKAN: Gunakan karyawan_id sesuai skema database modul
            $table->foreignId('karyawan_id')->constrained('employees')->onDelete('cascade'); 
            $table->date('tanggal'); // Gunakan 'tanggal' (sesuai Controller)
            $table->time('waktu_masuk')->nullable(); // Gunakan 'waktu_masuk' (sesuai Controller)
            $table->time('waktu_keluar')->nullable(); // Gunakan 'waktu_keluar' (sesuai Controller)
            
            // Kolom Status (Asumsi ENUM di database adalah: hadir, izin, sakit, alpha)
            $table->enum('status_absensi', ['hadir', 'izin', 'sakit', 'alpha'])->default('hadir');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // PERBAIKAN: Drop tabel singular 'attendance'
        Schema::dropIfExists('attendance');
    }
};