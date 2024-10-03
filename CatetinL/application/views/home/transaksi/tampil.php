<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .toggle-btn {
            transition: background-color 0.3s, color 0.3s;
        }

        .toggle-btn .toggle-icon {
            transition: color 0.3s;
        }

        .content-wrapper {
            background: linear-gradient(280deg, rgba(181, 203, 153, 0.50) 0%, rgba(223.94, 240.79, 202.48, 0.50) 100%);
            padding: 10px;
        }

        .btn-group .btn {
            border-radius: 20px;
            margin-right: 5px;
        }

        /* .btn-primary {
            background-color: #445D48;
        } */
    </style>
</head>
<body>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Data Transaksi</h5>
                        </div>
                        <div class="card-body">
                            <a href="<?php echo site_url('transaksi/add/'.$ID_PENYEWA); ?>" class="btn btn-primary btn-sm float-right mb-3" style="width: 200px; background-color: #445D48;border-radius: 20px;">Tambah Transaksi</a>
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Customer</th>
                                        <th scope="col">ID Transaksi</th>
                                        <th scope="col">Tanggal Pinjam</th>
                                        <th scope="col">Tanggal Kembali</th>
                                        <th scope="col">Tanggal Mengembalikan</th>
                                        <th scope="col">Jaminan</th>
                                        <th scope="col">Denda</th>
                                        <th scope="col">Status Sewa</th>
                                        <th scope="col" style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($transaksi as $val) { ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $val->ID_PENYEWA; ?></td>
                                            <td><?php echo $val->ID_TRANSAKSI; ?></td>
                                            <td><?php echo $val->TANGGAL_PEMINJAMAN; ?></td>
                                            <td><?php echo $val->TANGGAL_HARUS_KEMBALI; ?></td>
                                            <td><?php echo $val->TANGGAL_PENGEMBALIAN; ?></td>
                                            <td><?php echo $val->JAMINAN; ?></td>
                                            <td><?php echo $val->DENDA; ?></td>
                                            <td><?php echo $val->STATUS_SEWA; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-sm toggle-btn" style="background-color: #ccc; color: #666;  border-radius: 20px;">
                                                        <a href="<?php echo site_url('transaksi/ubah_status/'. $val->ID_TRANSAKSI. '/' . $val->ID_PENYEWA); ?>">
                                                        <i class="fas fa-toggle-on toggle-icon"></i>
                                                    </button>
                                                    <a href="<?php echo site_url('detailtransaksi/index/'. $val->ID_TRANSAKSI); ?>" class="btn btn-sm" style="background-color: #2F88DA;  border-radius: 20px; color: white;">
                                                        <i class="fas fa-bars"></i>
                                                    </a>
                                                    <a href="<?php echo site_url('transaksi/edit/'. $val->ID_TRANSAKSI); ?>" class="btn btn-sm" style="background-color: #50A06D;  border-radius: 20px; color: white;">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo site_url('transaksi/delete/'. $val->ID_TRANSAKSI. '/' . $val->ID_PENYEWA); ?>" onclick="return confirm('Yakin akan hapus data ini?')" class="btn btn-sm" style="background-color: #C23B22;  border-radius: 20px; color: white;">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.toggle-btn').click(function() {
                $(this).toggleClass('active');
                if ($(this).hasClass('active')) {
                    $(this).css('background-color', '#EFB300');
                    $(this).find('.toggle-icon').css('color', 'white');
                } else {
                    $(this).css('background-color', '#ccc');
                    $(this).find('.toggle-icon').css('color', '#666');
                }
            });
        });
    </script>
</body>
</html>
