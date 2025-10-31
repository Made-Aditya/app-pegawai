@extends('master')
@section('title', 'Detail Pegawai')
@section('content')
<div class="container mt-10 centered mx-auto px-4">
    
    <p class="text-center text-4xl font-bold text-gray-900 dark:text-white my-10">Detail Pegawai</p>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        {{-- Kita gunakan struktur sederhana untuk tampilan detail --}}
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800">
            <tbody>
                
                {{-- Nama Lengkap --}}
                <tr class="border-b dark:border-gray-700">
                    <th class="px-6 py-3 font-medium text-gray-900 dark:text-white w-1/3">Nama Lengkap</th>
                    <td class="px-6 py-3 w-2/3">{{ $employee->nama_lengkap }}</td>
                </tr>
                
                {{-- Email --}}
                <tr class="border-b dark:border-gray-700">
                    <th class="px-6 py-3 font-medium text-gray-900 dark:text-white">Email</th>
                    <td class="px-6 py-3">{{ $employee->email }}</td>
                </tr>
                
                {{-- Nomor Telepon --}}
                <tr class="border-b dark:border-gray-700">
                    <th class="px-6 py-3 font-medium text-gray-900 dark:text-white">Nomor Telepon</th>
                    <td class="px-6 py-3">{{ $employee->nomor_telepon }}</td>
                </tr>
                
                {{-- Tanggal Lahir --}}
                <tr class="border-b dark:border-gray-700">
                    <th class="px-6 py-3 font-medium text-gray-900 dark:text-white">Tanggal Lahir</th>
                    <td class="px-6 py-3">{{ $employee->tanggal_lahir }}</td>
                </tr>
                
                {{-- Alamat --}}
                <tr class="border-b dark:border-gray-700">
                    <th class="px-6 py-3 font-medium text-gray-900 dark:text-white">Alamat</th>
                    <td class="px-6 py-3">{{ $employee->alamat }}</td>
                </tr>
                
                {{-- Tanggal Masuk --}}
                <tr class="border-b dark:border-gray-700">
                    <th class="px-6 py-3 font-medium text-gray-900 dark:text-white">Tanggal Masuk</th>
                    <td class="px-6 py-3">{{ $employee->tanggal_masuk }}</td>
                </tr>

                {{-- DATA RELASI: Departemen --}}
                <tr class="border-b dark:border-gray-700 bg-gray-50 dark:bg-gray-700">
                    <th class="px-6 py-3 font-medium text-gray-900 dark:text-white">Departemen</th>
                    <td class="px-6 py-3 font-semibold text-blue-600 dark:text-blue-400">
                        {{ $employee->department->nama_department ?? 'N/A' }}
                    </td>
                </tr>
                
                {{-- DATA RELASI: Jabatan dan Gaji Pokok --}}
                <tr class="border-b dark:border-gray-700 bg-gray-50 dark:bg-gray-700">
                    <th class="px-6 py-3 font-medium text-gray-900 dark:text-white">Jabatan & Gaji Pokok</th>
                    <td class="px-6 py-3 font-semibold text-green-600 dark:text-green-400">
                        {{ $employee->position->nama_jabatan ?? 'N/A' }} 
                        (Rp {{ number_format($employee->position->gaji_pokok ?? 0, 0, ',', '.') }})
                    </td>
                </tr>
                
                {{-- Status --}}
                <tr class="border-b dark:border-gray-700">
                    <th class="px-6 py-3 font-medium text-gray-900 dark:text-white">Status</th>
                    <td class="px-6 py-3">
                        <span class="font-semibold {{ $employee->status == 'aktif' ? 'text-green-600' : 'text-red-600' }}">
                            {{ ucfirst($employee->status) }}
                        </span>
                    </td>
                </tr>
                
            </tbody>
        </table>
        
        <div class="mt-6 p-4 text-center bg-white dark:bg-gray-800 rounded-b-lg">
            <a href="{{ route('employees.edit', $employee->id) }}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Edit Pegawai
            </a>
            <a href="{{ route('employees.index') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                Kembali ke Daftar
            </a>
        </div>
    </div>
</div>
@endsection
