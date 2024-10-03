<div class="content-wrapper" style="background: linear-gradient(280deg, rgba(181, 203, 153, 0.50) 0%, rgba(223.94, 240.79, 202.48, 0.50) 100%); padding: 20px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Data Kategori</h5>
                    </div>
                    <div class="card-body">
                    <a href="<?php echo site_url('kategori/add'); ?>" class="btn btn-primary btn-sm float-right mb-3" style="width: 200px; background-color: #445D48;border-radius: 20px;">Tambah Kategori</a>
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ID Kategori</th>
                                    <th scope="col">Nama Kategori</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php $no = 1; foreach ($kategori as $val) { ?>
                                <tr style="background-color: #FAFAFA;">
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $val->ID_KATEGORI; ?></td>
                                    <td><?php echo $val->NAMA_KATEGORI; ?></td>
                                    <!-- <td>
                                        <div class="btn-group">
                                            <a href="<?php echo site_url('kategori/edit/' . $val->ID_KATEGORI); ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="<?php echo site_url('kategori/delete/' . $val->ID_KATEGORI); ?>" onclick="return confirm('Yakin akan hapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
                                        </div>
                                    </td> -->

                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo site_url('kategori/edit/' . $val->ID_KATEGORI); ?>" class="btn btn-sm" style="background-color: #50A06D; color: white; border-radius: 20px; margin-right: 5px;">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?php echo site_url('kategori/delete/' . $val->ID_KATEGORI); ?>" onclick="return confirm('Yakin akan hapus data ini?')" class="btn btn-sm" style="background-color: #C23B22; color: white; border-radius: 20px;">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>