<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Pegawai</title>
</head>
<body>
    <h1 class="mb-4">Form Pegawai</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="nama_lengkap">Nama Lengkap:</label></td>
                <td><input type="text" id="nama_lengkap" name="nama_lengkap"></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <td><label for="nomor_telepon">Nomor Telepon:</label></td>
                <td><input type="text" name="nomor_telepon" id="nomor_telepon"></td>
            </tr>
            <tr>
                <td><label for="tanggal_lahir">Tanggal Lahir:</label></td>
                <td><input type="date" name="tanggal_lahir" id="tanggal_lahir"></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat:</label></td>
                <td><textarea name="alamat" id="alamat"></textarea></td>
            </tr>
            <tr>
                <td><label for="tangga_masuk">Tanggal masuk:</label></td>
                <td><input type="date" name="tanggal_masuk" id="tanggal_masuk"></td>
            </tr>
            <tr>
                <td><label for="status">Status:</label></td>
                <td>
                    <select name="status" id="status">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Non-Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>