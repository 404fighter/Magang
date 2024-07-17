<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penempatan Karyawan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Laporan Penempatan Karyawan</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Lokasi</th>
            <th>Nama Karyawan</th>
            <th>Jabatan</th>
            <th>NIK</th>
            <th>TMT</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Gada</th>
            <th>TTL</th>
            <th>No Telepon</th>
            <th>Alamat</th>
            <th>No KK</th>
            <th>No KTP</th>
            <th>Status Kawin</th>
            <th>Nama Ibu</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($data_penempatan as $penempatan): ?>
            <tr>
                <td><?= $penempatan->id ?></td>
                <td><?= $penempatan->nama_lokasi ?></td>
                <td><?= $penempatan->nama_karyawan ?></td>
                <td><?= $penempatan->jabatan ?></td>
                <td><?= $penempatan->nik ?></td>
                <td><?= $penempatan->tmt ?></td>
                <td><?= $penempatan->tgl_mulai ?></td>
                <td><?= $penempatan->tgl_selesai ?></td>
                <td><?= $penempatan->gada ?></td>
                <td><?= $penempatan->ttl ?></td>
                <td><?= $penempatan->no_telp ?></td>
                <td><?= $penempatan->alamat ?></td>
                <td><?= $penempatan->no_kk ?></td>
                <td><?= $penempatan->no_ktp ?></td>
                <td><?= $penempatan->status_kawin ?></td>
                <td><?= $penempatan->nama_ibu ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html> -->
