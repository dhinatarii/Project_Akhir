<div class="content-wrapper" style="background: linear-gradient(280deg, rgba(181, 203, 153, 0.50) 0%, rgba(223, 240, 202, 0.50) 100%); padding: 20px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Data Produk</h5>
                    </div>
                    <div class="card-body">
                        <a href="<?php echo site_url('produk/add'); ?>" class="btn btn-primary btn-sm float-right mb-3" style="width: 200px; background-color: #445D48; border-radius: 20px;">Tambah Produk</a>
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">
                                        <a href="?sort_column=ID_PRODUK&sort_order=<?php echo ($sort_column == 'ID_PRODUK' && $sort_order == 'ASC') ? 'DESC' : 'ASC'; ?>">
                                            ID Produk 
                                            <?php if ($sort_column == 'ID_PRODUK'): ?>
                                                <i class="fas <?php echo $sort_order == 'ASC' ? 'fa-sort-up' : 'fa-sort-down'; ?>"></i>
                                            <?php endif; ?>
                                        </a>
                                    </th>
                                    <th scope="col">
                                        <a href="?sort_column=NAMA_PRODUK&sort_order=<?php echo ($sort_column == 'NAMA_PRODUK' && $sort_order == 'ASC') ? 'DESC' : 'ASC'; ?>">
                                            Nama Produk 
                                            <?php if ($sort_column == 'NAMA_PRODUK'): ?>
                                                <i class="fas <?php echo $sort_order == 'ASC' ? 'fa-sort-up' : 'fa-sort-down'; ?>"></i>
                                            <?php endif; ?>
                                        </a>
                                    </th>
                                    <th scope="col">ID Kategori</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">
                                        <a href="?sort_column=HARGA_PRODUK&sort_order=<?php echo ($sort_column == 'HARGA_PRODUK' && $sort_order == 'ASC') ? 'DESC' : 'ASC'; ?>">
                                            Harga 
                                            <?php if ($sort_column == 'HARGA_PRODUK'): ?>
                                                <i class="fas <?php echo $sort_order == 'ASC' ? 'fa-sort-up' : 'fa-sort-down'; ?>"></i>
                                            <?php endif; ?>
                                        </a>
                                    </th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($produk as $val): ?>
                                    <tr style="background-color: #FAFAFA;">
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $val->ID_PRODUK; ?></td>
                                        <td><?php echo $val->NAMA_PRODUK; ?></td>
                                        <td><?php echo $val->ID_KATEGORI; ?></td>
                                        <td><img src="<?php echo base_url('assets/foto_produk/' . $val->GAMBAR); ?>" width="150" height="110"></td>
                                        <td><?php echo number_format($val->HARGA_PRODUK, 2, ',', '.'); ?></td>
                                        <td><?php echo $val->DESKRIPSI; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo site_url('produk/edit/' . $val->ID_PRODUK); ?>" class="btn btn-sm" style="background-color: #50A06D; color: white; border-radius: 20px; margin-right: 5px;">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="<?php echo site_url('produk/delete/' . $val->ID_PRODUK); ?>" onclick="return confirm('Yakin akan hapus data ini?')" class="btn btn-sm" style="background-color: #C23B22; color: white; border-radius: 20px;">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php $no++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pastikan untuk menambahkan Font Awesome di bagian <head> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">