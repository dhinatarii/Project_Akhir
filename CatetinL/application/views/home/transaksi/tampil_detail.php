<div class="content-wrapper" style="background: linear-gradient(280deg, rgba(181, 203, 153, 0.50) 0%, rgba(223.94, 240.79, 202.48, 0.50) 100%); padding: 20px;">
<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Data Detail Transaksi</h5>
                    </div>
                    <div class="card-body">
                <a href="<?php echo site_url('detailtransaksi/add/' . $ID_TRANSAKSI); ?>" class="btn btn-primary btn-sm float-right mb-3" style="width: 200px; background-color: #445D48;border-radius: 20px;">Tambah Detail Transaksi</a>
                <table class="table table-striped table-bordered table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID Transaksi</th>
                            <th scope="col">ID</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($datajoin as $val) { ?>
                            <tr style="background-color: #FAFAFA;">
                                <td><?php echo $no; ?></td>
                                <td><?php echo $val->ID_TRANSAKSI; ?></td>
                                <td><?php echo $val->ID_PRODUK; ?></td>
                                <td><?php echo $val->NAMA_PRODUK; ?></td>
                                <td><?php echo $val->HARGA_PRODUK; ?></td>
                                <td>
                                    <div class="btn-group">
                                            <a href="<?php echo site_url('produk/delete/' . $val->ID_PRODUK); ?>" onclick="return confirm('Yakin akan hapus data ini?')" class="btn btn-sm" style="background-color: #C23B22; color: white; border-radius: 20px;">
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
