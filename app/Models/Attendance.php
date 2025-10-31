<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use HasFactory;

    // --- PERBAIKAN KRITIS DI SINI ---
    // Memberi tahu Laravel bahwa nama tabelnya adalah 'attendance' (singular),
    // bukan 'attendances' (plural default Laravel).
    protected $table = 'attendance';
    // ---------------------------------

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'karyawan_id', // Nama field yang benar (sesuai migrasi Anda)
        'tanggal',
        'waktu_masuk',
        'waktu_keluar',
        'status_absensi',
    ];

    /**
     * Get the employee that owns the attendance.
     */
    public function employee(): BelongsTo
    {
        // Pastikan foreign key di sini juga konsisten
        return $this->belongsTo(Employee::class, 'karyawan_id');
    }
}