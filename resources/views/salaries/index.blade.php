@extends('master')
@section('title', 'Daftar Gaji Karyawan')
@section('content')

<div class="container mt-10 centered mx-auto px-4">
    <p class="text-center text-4xl font-bold text-gray-900 dark:text-white my-10">Daftar Gaji Karyawan</p>
    
    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Sukses!</span> {{ session('success') }}
        </div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">  
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            {{-- Caption dan Tombol Tambah --}}
            <caption class="p-5 text-lg font-semibold text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div class="text-left pe-2">
                        <span class="text-lg font-semibold text-gray-900 dark:text-white">Data Pembayaran Gaji</span>
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Menampilkan riwayat pembayaran gaji karyawan per bulan.</p>
                    </div>
                    <a href="{{ route('salaries.create') }}" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800 whitespace-nowrap">
                        Tambah Gaji
                    </a>
                </div>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 w-1/12">No</th>
                    <th scope="col" class="px-6 py-3">Pegawai</th>
                    <th scope="col" class="px-6 py-3">Periode Bulan</th>
                    <th scope="col" class="px-6 py-3 text-right">Gaji Pokok</th>
                    <th scope="col" class="px-6 py-3 text-right">Tunjangan</th>
                    <th scope="col" class="px-6 py-3 text-right">Potongan</th>
                    <th scope="col" class="px-6 py-3 text-right">Total Gaji</th>
                    <th scope="col" class="px-6 py-3 text-center w-1/6">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($salaries as $salary)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $salary->employee->nama_lengkap }}</td>
                    <td class="px-6 py-4">{{ $salary->bulan }}</td>
                    <td class="px-6 py-4 text-right">Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-right">Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-right">Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-right font-bold text-green-600 dark:text-green-400">
                        Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{-- Edit Button --}}
                        <a href="{{ route('salaries.edit', $salary->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-4">Edit</a>
                        
                        {{-- Delete Form --}}
                        <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button 
                                type="submit" 
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data gaji ini?')"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline"
                            >
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr class="bg-white dark:bg-gray-800">
                    <td colspan="8" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                        Belum ada data Gaji yang tercatat.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{-- Paginasi --}}
        @if ($salaries->count() > 0)
            <div class="p-4 bg-white dark:bg-gray-800 rounded-b-lg">
                {{ $salaries->links() }}
            </div>
        @endif
    </div>
</div>

@endsection
