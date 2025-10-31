<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee; // Diperlukan untuk dropdown Karyawan
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data gaji dengan eager load relasi employee
        $salaries = Salary::with('employee')->latest()->paginate(10);
        return view('salaries.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil semua karyawan untuk dropdown
        $employees = Employee::all();
        return view('salaries.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan'       => 'required|string|max:10', // Contoh: '2025-10'
            'gaji_pokok'  => 'required|numeric|min:0',
            'tunjangan'   => 'required|numeric|min:0',
            'potongan'    => 'required|numeric|min:0',
        ]);

        // Model::saving() hook di Salary.php akan menghitung total_gaji secara otomatis
        Salary::create($request->all());

        return redirect()->route('salaries.index')->with('success', 'Data Gaji berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $salary = Salary::with('employee')->findOrFail($id);
        return view('salaries.show', compact('salary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $salary = Salary::findOrFail($id);
        $employees = Employee::all();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan'       => 'required|string|max:10', 
            'gaji_pokok'  => 'required|numeric|min:0',
            'tunjangan'   => 'required|numeric|min:0',
            'potongan'    => 'required|numeric|min:0',
        ]);

        $salary = Salary::findOrFail($id);
        // Model::saving() hook akan menghitung ulang total_gaji
        $salary->update($request->all());

        return redirect()->route('salaries.index')->with('success', 'Data Gaji berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $salary = Salary::findOrFail($id);
        $salary->delete();

        return redirect()->route('salaries.index')->with('success', 'Data Gaji berhasil dihapus.');
    }
}