<?php

namespace App\Http\Controllers;

use App\Models\Position; // Import Model Position
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Menampilkan daftar semua jabatan.
     */
    public function index()
    {
        $positions = Position::latest()->paginate(10); 
        return view('position.index', compact('positions'));
    }

    /**
     * Menampilkan formulir untuk membuat jabatan baru.
     */
    public function create()
    {
        return view('position.create');
    }

    /**
     * Menyimpan jabatan baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data (nama_jabatan dan gaji_pokok)
        $request->validate([
            'nama_jabatan' => 'required|string|max:100|unique:positions,nama_jabatan',
            'gaji_pokok'   => 'required|numeric|min:0', // Harus berupa angka dan tidak negatif
        ]);

        Position::create($request->all());

        return redirect()->route('position.index')->with('success', 'Jabatan berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail jabatan tertentu.
     */
    public function show(string $id)
    {
        $position = Position::findOrFail($id);
        return view('position.show', compact('position'));
    }

    /**
     * Menampilkan formulir untuk mengedit jabatan tertentu.
     */
    public function edit(string $id)
    {
        $position = Position::findOrFail($id);
        return view('position.edit', compact('position'));
    }

    /**
     * Memperbarui jabatan tertentu di database.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data (nama_jabatan dan gaji_pokok)
        $request->validate([
            // unique:table,column,except_id,id_column
            'nama_jabatan' => 'required|string|max:100|unique:positions,nama_jabatan,' . $id . ',id', 
            'gaji_pokok'   => 'required|numeric|min:0',
        ]);

        $position = Position::findOrFail($id);
        $position->update($request->all());

        return redirect()->route('position.index')->with('success', 'Jabatan berhasil diperbarui.');
    }

    /**
     * Menghapus jabatan tertentu dari database.
     */
    public function destroy(string $id)
    {
        $position = Position::findOrFail($id);
        $position->delete();

        return redirect()->route('position.index')->with('success', 'Jabatan berhasil dihapus.');
    }
}