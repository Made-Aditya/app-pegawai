@extends('master')
@section('title', 'Daftar Absensi')
@section('content')
    <div class="container mt-10 centered mx-auto px-4">
        
        <p class="text-center text-4xl font-bold text-gray-900 dark:text-white my-10">Daftar Absensi</p>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            {{-- Caption dan Tombol Tambah
            <caption class="p-5 text-lg font-semibold text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div class="text-left pe-2">
                        <span class="text-lg font-semibold text-gray-900 dark:text-white">Daftar Absensi</span>
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Berikut adalah riwayat absensi harian karyawan. Gunakan "Edit" untuk merubah data absensi.</p>
                    </div>
                    <a href="{{ route('attendances.create') }}" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800 whitespace-nowrap">
                        Tambah
                    </a>
                </div>
            </caption> --}}
            

        <div class="p-5 bg-white dark:bg-gray-800 flex items-center justify-between">
            <div class="text-left pe-2">
                <span class="text-lg font-semibold text-gray-900 dark:text-white">Daftar Absensi</span>
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Berikut adalah riwayat absensi harian karyawan. Gunakan "Edit" untuk merubah data absensi. "Tambah" untuk menambahkan data absensi baru.</p>
            </div>
            <a href="{{ route('attendances.create') }}" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800 whitespace-nowrap">
                Tambah
            </a>
        </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-1/12">No</th>
                        <th scope="col" class="px-6 py-3">Nama Pegawai</th>
                        <th scope="col" class="px-6 py-3">Tanggal</th>
                        <th scope="col" class="px-6 py-3">Waktu Masuk</th>
                        <th scope="col" class="px-6 py-3">Waktu Keluar</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3 text-center w-1/6">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                        $start = ($attendances->currentPage() - 1) * $attendances->perPage(); 
                    @endphp
                    @foreach ($attendances as $attendance)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $start + $loop->iteration }}</td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{-- Mengakses relasi 'employee' untuk mendapatkan nama lengkap --}}
                            {{ $attendance->employee->nama_lengkap }}
                        </th>
                        {{-- PERHATIKAN: Nama kolom harus sesuai dengan database --}}
                        <td class="px-6 py-4">{{ $attendance->tanggal }}</td>
                        <td class="px-6 py-4">{{ $attendance->waktu_masuk }}</td>
                        <td class="px-6 py-4">{{ $attendance->waktu_keluar ?? '-' }}</td>
                        <td class="px-6 py-4">
                            {{-- Ubah format status menjadi lebih rapi --}}
                            <span class="font-semibold {{ 
                                $attendance->status_absensi == 'hadir' ? 'text-green-600' : 
                                ($attendance->status_absensi == 'izin' ? 'text-blue-600' : 
                                ($attendance->status_absensi == 'sakit' ? 'text-yellow-600' : 'text-red-600')) 
                            }}">
                                {{ ucfirst($attendance->status_absensi) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{-- Edit Button --}}
                            <a href="{{ route('attendances.edit', $attendance->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-4">Edit</a>
                            
                            {{-- Delete Form --}}
                            <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data absensi ini?')"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                >
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            {{-- Paginasi dan Pesan Kosong --}}
            @if ($attendances->isEmpty())
                <p class="p-4 text-center text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 rounded-b-lg">Belum ada data Absensi yang tercatat.</p>
            @else
                <div class="p-4 bg-white dark:bg-gray-800 rounded-b-lg">
                    {{ $attendances->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
