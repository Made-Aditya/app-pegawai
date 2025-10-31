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
        Schema::table('employees', function (Blueprint $table) {
            // 1. TAMBAHKAN KOLOM SAJA DULU.
            // Gunakan 'department_id' sesuai Model Anda.
            $table->unsignedBigInteger('department_id')->after('tanggal_masuk')->nullable();
            $table->unsignedBigInteger('jabatan_id')->after('department_id')->nullable(); 
        });

        // 2. TAMBAHKAN FOREIGN KEY DI CLOSURE TERPISAH
        // Ini memastikan kolom 'department_id' dan 'jabatan_id' telah berhasil dibuat sebelum
        // mencoba membuat relasi foreign key, yang mana adalah penyebab error utama di MySQL.
        Schema::table('employees', function (Blueprint $table) {
            
            // Definisikan Constraint Foreign Key untuk departments
            $table->foreign('department_id')
                  ->references('id')
                  ->on('departments') // Target tabel Anda
                  ->onDelete('set null');

            // Definisikan Constraint Foreign Key untuk positions
            $table->foreign('jabatan_id')
                  ->references('id')
                  ->on('positions') 
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            // Hapus foreign key constraint
            $table->dropForeign(['employees_department_id_foreign']); // Gunakan nama convention Laravel
            $table->dropForeign(['employees_jabatan_id_foreign']);
            
            // Hapus kolom
            $table->dropColumn(['department_id', 'jabatan_id']);
        });
    }
};