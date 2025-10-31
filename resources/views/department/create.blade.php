@extends('master')
@section('title', 'Tambah Departemen')
@section('content')

<div class="container mt-10 centered mx-auto px-4">
    <p class="text-center text-4xl font-bold text-gray-900 dark:text-white my-10">Tambah Departemen</p>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5 bg-white dark:bg-gray-800">
        <form action="{{ route('department.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="nama_department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Departemen</label>
                <input type="text" id="nama_department" name="nama_department" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nama Departemen" required>
                @error('nama_department')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
            <a href="{{ route('department.index') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Batal</a>
        </form>
    </div>
</div>

@endsection