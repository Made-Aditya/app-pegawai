@extends('master')
@section('title', 'Daftar Departemen')
@section('content')

<div class="container mt-10 centered mx-auto px-4">
    <p class="text-center text-4xl font-bold text-gray-900 dark:text-white my-10">Daftar Departemen</p>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        {{-- Tombol Tambah Departemen --}}
        <div class="p-5 bg-white dark:bg-gray-800 flex items-center justify-between">
            <div class="text-left pe-2">
                <span class="text-lg font-semibold text-gray-900 dark:text-white">Daftar Departemen</span>
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Terima kasih telah datang</p>
            </div>
            <a href="{{ route('department.create') }}" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800 whitespace-nowrap">
                Tambah
            </a>
        </div>
        
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 w-1/12">No</th>
                    <th scope="col" class="px-6 py-3">Nama Departemen</th>
                    <th scope="col" class="px-6 py-3 text-center w-1/6">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- PERBAIKAN: Looping menggunakan $item agar sesuai dengan $department --}}
                @foreach ($department as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    {{-- PERBAIKAN: Akses properti menggunakan $item --}}
                    <td class="px-6 py-4 text-gray-900 dark:text-white">{{ $item->nama_department }}</td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('department.edit', $item->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-4">Edit</a>
                        
                        <form action="{{ route('department.destroy', $item->id) }}" method="POST" class="inline-block">
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
                @endforeach
            </tbody>
        </table>
        
        @if ($department->isEmpty())
        <p class="p-4 text-center text-gray-500 dark:text-gray-400">Belum ada data Departemen.</p>
        @endif
        
    </div>
</div>
@endsection