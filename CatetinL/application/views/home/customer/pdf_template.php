<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Data</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid black; padding: 5px; }
    </style>
</head>
<body>
    <h1>User Data</h1>
    <table>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID Customer</th>
                <th scope="col">Nama Customer</th>
                <th scope="col">Alamat</th>
                <th scope="col">No HP</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($penyewa as $val) { ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $val->ID_PENYEWA; ?></td>
                    <td><?php echo $val->NAMA_PENYEWA; ?></td>
                    <td><?php echo $val->ALAMAT_PENYEWA; ?></td>
                    <td><?php echo $val->NO_TELP_PENYEWA; ?></td>
                    <td><?php echo $val->JENIS_KELAMIN; ?></td>
                    <td><!-- Tambahkan aksi di sini, misalnya tombol edit atau hapus --></td>
                </tr>
            <?php $no++; } ?>
        </tbody>
    </table>
</body>
</html>