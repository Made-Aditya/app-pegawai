<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi (Mass Assignment).
     * Telah ditambahkan foreign key departemen_id dan jabatan_id.
     */
    protected $fillable = [
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'tanggal_masuk',
        'status',
        'department_id', // Aktifkan Foreign Key Departemen
        'jabatan_id',    // Aktifkan Foreign Key Jabatan
    ];

    // --- Relasi Satu-ke-Banyak (HasMany) ---

    /**
     * Relasi: Satu Karyawan memiliki BANYAK data Absensi (Attendance).
     */
    public function attendances(): HasMany
    {
        // 'karyawan_id' adalah foreign key di tabel 'attendance'
        return $this->hasMany(Attendance::class, 'karyawan_id');
    }

    /**
     * Relasi: Satu Karyawan memiliki BANYAK data Gaji (Salary).
     */
    public function salaries(): HasMany
    {
        // 'karyawan_id' adalah foreign key di tabel 'salaries'
        return $this->hasMany(Salary::class, 'karyawan_id');
    }

    // --- Relasi Satu-ke-Satu (BelongsTo) ---

    /**
     * Relasi: Satu Karyawan HANYA memiliki SATU Departemen (Departmen).
     * NOTE: Menggunakan nama fungsi departmen() agar sesuai dengan Model Departmen Anda.
     */
    public function department(): BelongsTo
    {
        // 'department_id' adalah foreign key di tabel 'employees'
        return $this->belongsTo(Department::class, 'department_id');
    }

    /**
     * Relasi: Satu Karyawan HANYA memiliki SATU Jabatan (Position).
     */
    public function position(): BelongsTo
    {
        // 'jabatan_id' adalah foreign key di tabel 'employees'
        return $this->belongsTo(Position::class, 'jabatan_id');
    }
}
