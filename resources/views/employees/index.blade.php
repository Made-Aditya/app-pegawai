@extends('master')
@section('title', 'Daftar Pegawai')
@section('content')
    <div class="container mt-10 centered mx-auto px-4">
        <p class="text-center text-4xl font-bold text-gray-900 dark:text-white my-10">Daftar Karyawan</p>
        {{-- Pesan Sukses (Jika ada redirect dari create/update/destroy) --}}
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">Sukses!</span> {{ session('success') }}
            </div>
        @endif

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <caption class="p-5 text-lg font-semibold text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <div class="flex items-center justify-between">
                        <div class="text-left pe-2">
                            <span class="text-lg font-semibold text-gray-900 dark:text-white">Daftar Pegawai</span>
                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Berikut adalah list pegawai perusahaan dengan beberapa detail di dalamnya. Gunakan "Detail" untuk melihat detail pegawai lebih lanjut. Gunakan Edit untuk merubah data pegawai.</p>
                        </div>
                        <a href="{{ route('employees.create') }}" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800 whitespace-nowrap">
                            Tambah
                        </a>
                    </div>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-1/12">No</th>
                        <th scope="col" class="px-6 py-3">Nama Lengkap</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Nomor Telepon</th>
                        
                        {{-- KOLOM BARU: Departemen --}}
                        <th scope="col" class="px-6 py-3">Departemen</th>
                        
                        {{-- KOLOM BARU: Jabatan --}}
                        <th scope="col" class="px-6 py-3">Jabatan</th>
                        
                        <th scope="col" class="px-6 py-3">Tanggal Masuk</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3 text-center w-1/6">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $employee->nama_lengkap }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $employee->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $employee->nomor_telepon }}
                        </td>
                        
                        {{-- DATA BARU: Departemen --}}
                        <td class="px-6 py-4">
                            {{ $employee->department->nama_department ?? 'N/A' }}
                        </td>
                        
                        {{-- DATA BARU: Jabatan --}}
                        <td class="px-6 py-4">
                            {{ $employee->position->nama_jabatan ?? 'N/A' }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $employee->tanggal_masuk }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-semibold {{ $employee->status == 'aktif' ? 'text-green-600' : 'text-red-600' }}">
                                {{ ucfirst($employee->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('employees.show', $employee->id) }}" class="font-medium text-green-600 dark:text-green-500 hover:underline mr-2">Detail</a>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                >
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr class="bg-white dark:bg-gray-800">
                        <td colspan="9" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                            Belum ada data Pegawai. Silakan tambahkan data baru.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            
            {{-- Paginasi --}}
            @if ($employees->count() > 0)
                <div class="p-4 bg-white dark:bg-gray-800 rounded-b-lg">
                    {{ $employees->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
