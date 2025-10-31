@extends('master')
@section('title', 'Form Input Pegawai')
@section('content')
<div class="container mt-10 centered mx-auto px-4">
    
    <p class="text-center text-4xl font-bold text-gray-900 dark:text-white my-10">Form Input Pegawai</p>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            
            {{-- Tampilkan Pesan Error Validasi (jika ada) --}}
            @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                    <span class="font-medium">Validasi Gagal!</span> Silakan periksa kembali input Anda.
                </div>
            @endif

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800">
                <tbody>
                    
                    {{-- Baris Nama Lengkap --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">
                            <label for="nama_lengkap">Nama Lengkap</label>
                        </th>
                        <td class="px-6 py-2 pb-4 w-2/3"> 
                            <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('nama_lengkap') border-red-500 @enderror" 
                                required 
                            >
                            @error('nama_lengkap') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                        </td>
                    </tr>
                    
                    {{-- Baris Email --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">
                            <label for="email">Email</label>
                        </th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <input type="email" id="email" name="email" value="{{ old('email') }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') border-red-500 @enderror" 
                                required 
                            >
                            @error('email') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                        </td>
                    </tr>
                    
                    {{-- Baris Nomor Telepon --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">
                            <label for="nomor_telepon">Nomor Telepon</label>
                        </th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <input type="text" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('nomor_telepon') border-red-500 @enderror" 
                                required 
                            >
                            @error('nomor_telepon') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                        </td>
                    </tr>
                    
                    {{-- Baris Tanggal Lahir --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                        </th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('tanggal_lahir') border-red-500 @enderror" 
                                required 
                            >
                            @error('tanggal_lahir') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                        </td>
                    </tr>
                    
                    {{-- Baris Alamat (Textarea) --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">
                            <label for="alamat">Alamat</label>
                        </th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <textarea id="alamat" name="alamat" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('alamat') border-red-500 @enderror" 
                                required 
                            >{{ old('alamat') }}</textarea>
                            @error('alamat') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                        </td>
                    </tr>
                    
                    {{-- Baris Tanggal Masuk --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">
                            <label for="tanggal_masuk">Tanggal Masuk</label>
                        </th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <input type="date" id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('tanggal_masuk') border-red-500 @enderror" 
                                required 
                            >
                            @error('tanggal_masuk') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                        </td>
                    </tr>
                    
                    {{-- BARU: Baris Departemen (Foreign Key) --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">
                            <label for="department_id">Departemen</label>
                        </th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <select id="department_id" name="department_id" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('department_id') border-red-500 @enderror" 
                                required>
                                <option value="">-- Pilih Departemen --</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                        {{ $department->nama_department }}
                                    </option>
                                @endforeach
                            </select>
                            @error('department_id') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                        </td>
                    </tr>

                    {{-- BARU: Baris Jabatan (Foreign Key) --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">
                            <label for="jabatan_id">Jabatan</label>
                        </th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <select id="jabatan_id" name="jabatan_id" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('jabatan_id') border-red-500 @enderror" 
                                required>
                                <option value="">-- Pilih Jabatan --</option>
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}" {{ old('jabatan_id') == $position->id ? 'selected' : '' }}>
                                        {{ $position->nama_jabatan }} (Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }})
                                    </option>
                                @endforeach
                            </select>
                            @error('jabatan_id') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                        </td>
                    </tr>
                    
                    {{-- Baris Status --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">
                            <label for="status">Status</label>
                        </th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <select id="status" name="status" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('status') border-red-500 @enderror" 
                                required>
                                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Non-Aktif</option>
                            </select>
                            @error('status') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                        </td>
                    </tr>
                    
                    {{-- Baris Tombol Simpan --}}
                    <tr>
                        <td colspan="2" class="px-6 py-4 text-center"> 
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan Pegawai</button>
                            <a href="{{ route('employees.index') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Batal</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
@endsection
