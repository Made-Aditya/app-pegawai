@extends('master')
@section('title', 'Edit Data Pegawai')
@section('content')
<div class="container mt-10 centered mx-auto px-4">
    <p class="text-center text-4xl font-bold text-gray-900 dark:text-white my-10">Form Edit Pegawai</p>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                    <span class="font-medium">Validasi Gagal!</span> Silakan periksa kembali input Anda.
                </div>
            @endif

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800">
                <tbody>
                    
                    {{-- Baris Nama Lengkap --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">Nama Lengkap</th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $employee->nama_lengkap) }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('nama_lengkap') border-red-500 @enderror" required >
                            @error('nama_lengkap') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                        </td>
                    </tr>
                    
                    {{-- Baris Email --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">Email</th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <input type="email" name="email" value="{{ old('email', $employee->email) }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') border-red-500 @enderror" required >
                            @error('email') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                        </td>
                    </tr>
                    
                    {{-- Baris Nomor Telepon --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">Nomor Telepon</th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon', $employee->nomor_telepon) }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('nomor_telepon') border-red-500 @enderror" required >
                            @error('nomor_telepon') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                        </td>
                    </tr>
                    
                    {{-- Baris Tanggal Lahir --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">Tanggal Lahir</th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('tanggal_lahir') border-red-500 @enderror" required >
                            @error('tanggal_lahir') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                        </td>
                    </tr>
                    
                    {{-- Baris Alamat --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">Alamat</th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <textarea name="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('alamat') border-red-500 @enderror" required >{{ old('alamat', $employee->alamat) }}</textarea>
                            @error('alamat') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                        </td>
                    </tr>
                    
                    {{-- Baris Tanggal Masuk --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">Tanggal Masuk</th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('tanggal_masuk') border-red-500 @enderror" required >
                            @error('tanggal_masuk') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                        </td>
                    </tr>
                    
                    {{-- Baris Departemen (Foreign Key) --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">Departemen</th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <select name="department_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('department_id') border-red-500 @enderror" required>
                                <option value="">-- Pilih Departemen --</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}>
                                        {{ $department->nama_department }}
                                    </option>
                                @endforeach
                            </select>
                            @error('department_id') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                        </td>
                    </tr>

                    {{-- Baris Jabatan (Foreign Key) --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">Jabatan</th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <select name="jabatan_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('jabatan_id') border-red-500 @enderror" required>
                                <option value="">-- Pilih Jabatan --</option>
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}" {{ old('jabatan_id', $employee->jabatan_id) == $position->id ? 'selected' : '' }}>
                                        {{ $position->nama_jabatan }} (Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }})
                                    </option>
                                @endforeach
                            </select>
                            @error('jabatan_id') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                        </td>
                    </tr>
                    
                    {{-- Baris Status --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">Status</th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            <select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('status') border-red-500 @enderror" required>
                                <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ old('status', $employee->status) == 'nonaktif' ? 'selected' : '' }}>Non-Aktif</option>
                            </select>
                            @error('status') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                        </td>
                    </tr>
                    
                    {{-- Baris Tombol Update --}}
                    <tr>
                        <td colspan="2" class="px-6 py-4 text-center"> 
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update</button>
                            <a href="{{ route('employees.index') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Batal</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
@endsection
