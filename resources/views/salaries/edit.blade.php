@extends('master')
@section('title', 'Edit Data Gaji')
@section('content')

<div class="container mt-10 centered mx-auto px-4">
    <p class="text-center text-4xl font-bold text-gray-900 dark:text-white my-10">Form Edit Data Gaji</p>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                    <span class="font-medium">Validasi Gagal!</span> Silakan periksa kembali input Anda.
                </div>
            @endif

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800">
                <tbody>
                    
                    {{-- Input Karyawan (karyawan_id) --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">
                            <label for="karyawan_id">Nama Pegawai</label>
                        </th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <select id="karyawan_id" name="karyawan_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('karyawan_id') border-red-500 @enderror" required>
                                <option value="">-- Pilih Karyawan --</option>
                                @foreach ($employees as $employee)
                                    {{-- Memuat data karyawan yang dipilih --}}
                                    <option value="{{ $employee->id }}" {{ old('karyawan_id', $salary->karyawan_id) == $employee->id ? 'selected' : '' }}>
                                        {{ $employee->nama_lengkap }}
                                    </option>
                                @endforeach
                            </select>
                            @error('karyawan_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    
                    {{-- Input Periode Bulan --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">
                            <label for="bulan">Periode Bulan</label>
                        </th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <input 
                                type="month" 
                                id="bulan"
                                name="bulan" 
                                value="{{ old('bulan', $salary->bulan) }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('bulan') border-red-500 @enderror" 
                                required 
                            >
                            @error('bulan')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>

                    {{-- Input Gaji Pokok --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">
                            <label for="gaji_pokok">Gaji Pokok</label>
                        </th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <input 
                                type="number" 
                                id="gaji_pokok"
                                name="gaji_pokok" 
                                value="{{ old('gaji_pokok', $salary->gaji_pokok) }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('gaji_pokok') border-red-500 @enderror" 
                                required 
                                min="0"
                            >
                            @error('gaji_pokok')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    
                    {{-- Input Tunjangan --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">
                            <label for="tunjangan">Tunjangan</label>
                        </th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <input 
                                type="number" 
                                id="tunjangan"
                                name="tunjangan" 
                                value="{{ old('tunjangan', $salary->tunjangan) }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('tunjangan') border-red-500 @enderror" 
                                required 
                                min="0"
                            >
                            @error('tunjangan')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>

                    {{-- Input Potongan --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">
                            <label for="potongan">Potongan</label>
                        </th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <input 
                                type="number" 
                                id="potongan"
                                name="potongan" 
                                value="{{ old('potongan', $salary->potongan) }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('potongan') border-red-500 @enderror" 
                                required 
                                min="0"
                            >
                            @error('potongan')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    
                    {{-- Baris Tombol Update --}}
                    <tr>
                        <td colspan="2" class="px-6 py-4 text-center"> 
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update Gaji</button>
                            <a href="{{ route('salaries.index') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Batal</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>

@endsection
