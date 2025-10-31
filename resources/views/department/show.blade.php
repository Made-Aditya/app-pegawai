@extends('master')
@section('title', 'Detail Departemen')
@section('content')

<div class="container mt-10 centered mx-auto px-4">
    <p class="text-center text-4xl font-bold text-gray-900 dark:text-white my-10">Detail Departemen</p>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800">
            <tbody>
                
                {{-- Nama Departemen --}}
                <tr class="border-b dark:border-gray-700">
                    <th class="px-6 py-3 font-medium text-gray-900 dark:text-white w-1/3">Nama Departemen</th>
                    <td class="px-6 py-3 w-2/3 font-semibold">{{ $departmen->nama_departmen }}</td>
                </tr>
                
                {{-- Jumlah Karyawan (Relasi HasMany) --}}
                <tr class="border-b dark:border-gray-700 bg-gray-50 dark:bg-gray-700">
                    <th class="px-6 py-3 font-medium text-gray-900 dark:text-white">Jumlah Karyawan Terkait</th>
                    <td class="px-6 py-3 font-bold">
                        {{ $departmen->employees->count() }} Orang
                    </td>
                </tr>
                
            </tbody>
        </table>

        <div class="mt-6 p-4 text-center bg-white dark:bg-gray-800 rounded-b-lg">
            <a href="{{ route('department.edit', $departmen->id) }}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Edit Departemen
            </a>
            <a href="{{ route('department.index') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                Kembali ke Daftar
            </a>
        </div>
    </div>
</div>

@endsection