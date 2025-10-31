@extends('master')
@section('title', 'Detail Pembayaran Gaji')
@section('content')

<div class="container mt-10 centered mx-auto px-4">
    <p class="text-center text-4xl font-bold text-gray-900 dark:text-white my-10">Detail Pembayaran Gaji</p>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800">
            <tbody>
                <tr class="border-b dark:border-gray-700">
                    <th class="px-6 py-3 font-medium text-gray-900 dark:text-white w-1/3">Pegawai</th>
                    <td class="px-6 py-3 w-2/3 font-semibold">{{ $salary->employee->nama_lengkap }}</td>
                </tr>
                <tr class="border-b dark:border-gray-700">
                    <th class="px-6 py-3 font-medium text-gray-900 dark:text-white">Periode Bulan</th>
                    <td class="px-6 py-3">{{ $salary->bulan }}</td>
                </tr>
                <tr class="border-b dark:border-gray-700">
                    <th class="px-6 py-3 font-medium text-gray-900 dark:text-white">Gaji Pokok</th>
                    <td class="px-6 py-3">Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                </tr>
                <tr class="border-b dark:border-gray-700">
                    <th class="px-6 py-3 font-medium text-gray-900 dark:text-white">Tunjangan</th>
                    <td class="px-6 py-3">Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                </tr>
                <tr class="border-b dark:border-gray-700">
                    <th class="px-6 py-3 font-medium text-gray-900 dark:text-white">Potongan</th>
                    <td class="px-6 py-3">Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                </tr>
                <tr class="border-b dark:border-gray-700 bg-gray-50 dark:bg-gray-700">
                    <th class="px-6 py-3 font-medium text-gray-900 dark:text-white">Total Gaji Diterima</th>
                    <td class="px-6 py-3 font-bold text-green-600 dark:text-green-400">
                        Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="mt-6 p-4 text-center bg-white dark:bg-gray-800 rounded-b-lg">
            <a href="{{ route('salaries.edit', $salary->id) }}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Edit Data
            </a>
            <a href="{{ route('salaries.index') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                Kembali ke Daftar
            </a>
        </div>
    </div>
</div>

@endsection