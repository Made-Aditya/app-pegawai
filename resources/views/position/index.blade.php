@extends('master')
@section('title', 'Daftar Jabatan')
@section('content')

<div class="container mt-10 centered mx-auto px-4">
    
    <p class="text-center text-4xl font-bold text-gray-900 dark:text-white my-10">Daftar Jabatan</p>
    
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
                        <span class="text-lg font-semibold text-gray-900 dark:text-white">Daftar Jabatan Perusahaan</span>
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Berikut adalah list jabatan dalam perusahaan dengan beberapa detail di dalamnya. Gunakan Edit untuk merubah data pegawai dan hapus untuk menghapus data pegawai.</p>
                    </div>
                    <a href="{{ route('position.create') }}" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800 whitespace-nowrap">
                        Tambah
                    </a>
                </div>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 w-1/12">No</th>
                    <th scope="col" class="px-6 py-3">Nama Jabatan</th>
                    <th scope="col" class="px-6 py-3">Gaji Pokok</th>
                    <th scope="col" class="px-6 py-3 text-center w-1/6">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($positions as $position)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 text-gray-900 dark:text-white">{{ $position->nama_jabatan }}</td>
                    <td class="px-6 py-4 text-gray-900 dark:text-white">
                        {{-- Format mata uang Indonesia --}}
                        Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{-- Detail Button --}}
                        <a href="{{ route('position.show', $position->id) }}" class="font-medium text-green-600 dark:text-green-500 hover:underline mr-2">Detail</a>
                        
                        {{-- Edit Button --}}
                        <a href="{{ route('position.edit', $position->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-4">Edit</a>
                        
                        {{-- Delete Form --}}
                        <form action="{{ route('position.destroy', $position->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button 
                                type="submit" 
                                onclick="return confirm('Apakah Anda yakin ingin menghapus jabatan {{ $position->nama_jabatan }}?')"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline"
                            >
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                {{-- Jika data kosong --}}
                <tr class="bg-white dark:bg-gray-800">
                    <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                        Belum ada data Jabatan. Silakan tambahkan data baru.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Paginasi --}}
        @if ($positions->count() > 0)
            <div class="p-4 bg-white dark:bg-gray-800 rounded-b-lg">
                {{ $positions->links() }}
            </div>
        @endif
    </div>
</div>

@endsection