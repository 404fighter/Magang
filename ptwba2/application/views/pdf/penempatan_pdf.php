<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Penempatan</title>
    <style>
        /* Styling untuk PDF */
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Data Penempatan</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Lokasi</th>
            <th>Nama Karyawan</th>
            <th>Jabatan</th>
            <th>NIK</th>
            <th>TMT</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Status Penempatan</th>
        </tr>
        <tr>
            <td><?= $penempatan->id ?></td>
            <td><?= $penempatan->nama_lokasi ?></td>
            <td><?= $penempatan->nama_karyawan ?></td>
            <td><?= $penempatan->jabatan ?></td>
            <td><?= $penempatan->nik ?></td>
            <td><?= $penempatan->tmt ?></td>
            <td><?= $penempatan->tgl_mulai ?></td>
            <td><?= $penempatan->tgl_selesai ?></td>
            <td><?= $penempatan->status_penempatan == 1 ? 'Aktif' : 'Nonaktif' ?></td>
        </tr>
    </table>
</body>

</html>