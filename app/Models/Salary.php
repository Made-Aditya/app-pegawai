<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Salary extends Model
{
    use HasFactory;

    // Laravel secara default mencari tabel 'salaries' (plural), 
    // jadi tidak perlu mendefinisikan $table secara eksplisit.
    
    protected $fillable = [
        'karyawan_id', // Foreign Key ke tabel employees
        'bulan',
        'gaji_pokok',
        'tunjangan',
        'potongan',
        'total_gaji', // Akan dihitung sebelum disimpan
    ];

    /**
     * Relasi: Satu Data Gaji dimiliki oleh SATU Karyawan (Employee).
     */
    public function employee(): BelongsTo
    {
        // Foreign key di tabel salaries adalah 'karyawan_id'
        return $this->belongsTo(Employee::class, 'karyawan_id');
    }

    /**
     * Hitung total gaji (Gaji Pokok + Tunjangan - Potongan) sebelum data disimpan atau diperbarui.
     * Ini memastikan total_gaji selalu akurat di database.
     */
    protected static function booted()
    {
        static::saving(function ($salary) {
            $salary->total_gaji = ($salary->gaji_pokok + $salary->tunjangan) - $salary->potongan;
        });
    }
}   