@extends('master')
@section('title', 'Form Edit Absensi')
@section('content')
<div class="container mt-10 centered mx-auto px-4">
    
    <p class="text-center text-4xl font-bold text-gray-900 dark:text-white my-10">Form Edit Absensi</p>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            {{-- Tampilkan Error Validasi --}}
            @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                    <span class="font-medium">Validasi Gagal!</span> Silakan periksa kembali input Anda.
                </div>
            @endif

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <tbody>
                    
                    {{-- Baris Pegawai (Foreign Key) --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">
                            <label for="karyawan_id">Nama Pegawai</label>
                        </th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            {{-- PERBAIKAN: name="karyawan_id". Nilai default diambil dari $attendance->karyawan_id --}}
                            <select id="karyawan_id" name="karyawan_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('karyawan_id') border-red-500 @enderror" required>
                                <option value="">-- Pilih Karyawan --</option>
                                @foreach ($employees as $employee)
                                    {{-- Menggunakan $attendance->karyawan_id untuk seleksi, fallback ke old() --}}
                                    <option 
                                        value="{{ $employee->id }}" 
                                        {{ old('karyawan_id', $attendance->karyawan_id) == $employee->id ? 'selected' : '' }}>
                                        {{ $employee->nama_lengkap }}
                                    </option>
                                @endforeach
                            </select>
                            @error('karyawan_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    
                    {{-- Baris Tanggal --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">
                            <label for="tanggal">Tanggal</label>
                        </th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            {{-- PERBAIKAN: name="tanggal". Mengambil nilai dari $attendance->tanggal --}}
                            <input 
                                type="date" 
                                id="tanggal"
                                name="tanggal" 
                                value="{{ old('tanggal', $attendance->tanggal) }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('tanggal') border-red-500 @enderror" 
                                required 
                            >
                            @error('tanggal')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    
                    {{-- Baris Waktu Masuk --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">
                            <label for="waktu_masuk">Waktu Masuk</label>
                        </th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            {{-- PERBAIKAN: name="waktu_masuk". Mengambil nilai dari $attendance->waktu_masuk --}}
                            <input 
                                type="time" 
                                id="waktu_masuk"
                                name="waktu_masuk" 
                                value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('waktu_masuk') border-red-500 @enderror" 
                                step="1" 
                                required 
                            >
                            @error('waktu_masuk')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>

                    {{-- Baris Waktu Keluar --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">
                            <label for="waktu_keluar">Waktu Keluar (Opsional)</label>
                        </th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            {{-- PERBAIKAN: name="waktu_keluar". Mengambil nilai dari $attendance->waktu_keluar --}}
                            <input 
                                type="time" 
                                id="waktu_keluar"
                                name="waktu_keluar" 
                                value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('waktu_keluar') border-red-500 @enderror" 
                                step="1"
                            >
                            @error('waktu_keluar')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    
                    {{-- Baris Status (Select) --}}
                    <tr>
                        <th class="px-6 py-2 text-gray-900 dark:text-white align-top w-1/3">
                            <label for="status_absensi">Status</label>
                        </th>
                        <td class="px-6 py-2 pb-4 w-2/3">
                            {{-- PERBAIKAN: name="status_absensi". Mengambil nilai dari $attendance->status_absensi --}}
                            <select id="status_absensi" name="status_absensi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('status_absensi') border-red-500 @enderror">
                                {{-- Kita asumsikan ENUM di database adalah: hadir, izin, sakit, alpha --}}
                                @foreach (['hadir', 'izin', 'sakit', 'alpha'] as $status)
                                    <option value="{{ $status }}" {{ old('status_absensi', $attendance->status_absensi) == $status ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status_absensi')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                    
                    {{-- Baris Tombol Update --}}
                    <tr>
                        <td colspan="2" class="px-6 py-4 text-center"> 
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update Absensi</button>
                            <a href="{{ route('attendances.index') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Batal</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
@endsection
