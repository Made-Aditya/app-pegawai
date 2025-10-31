@extends('master')
@section('title', 'Edit Jabatan')
@section('content')

<div class="container mt-10 centered mx-auto px-4">
    <p class="text-center text-4xl font-bold text-gray-900 dark:text-white my-10">Form Edit Jabatan</p>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        {{-- Action diarahkan ke update route dengan method PUT --}}
        <form action="{{ route('position.update', $position->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800">
                <tbody>
                    
                    {{-- Input Nama Jabatan --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">
                            <label for="nama_jabatan">Nama Jabatan</label>
                        </th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <input 
                                type="text" 
                                id="nama_jabatan"
                                name="nama_jabatan" 
                                {{-- Memuat data lama atau data dari $position --}}
                                value="{{ old('nama_jabatan', $position->nama_jabatan) }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('nama_jabatan') border-red-500 @enderror" 
                                required 
                            >
                            @error('nama_jabatan')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    
                    {{-- Input Gaji Pokok --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">
                            <label for="gaji_pokok">Gaji Pokok (Rp)</label>
                        </th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <input 
                                type="number" 
                                id="gaji_pokok"
                                name="gaji_pokok" 
                                value="{{ old('gaji_pokok', $position->gaji_pokok) }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('gaji_pokok') border-red-500 @enderror" 
                                required 
                                min="0"
                            >
                            @error('gaji_pokok')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    
                    {{-- Baris Tombol Update --}}
                    <tr>
                        <td colspan="2" class="px-6 py-4 text-center"> 
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update Jabatan</button>
                            <a href="{{ route('position.index') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Batal</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>

@endsection
