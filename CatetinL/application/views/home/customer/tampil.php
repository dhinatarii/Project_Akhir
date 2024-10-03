<div class="content-wrapper" style="background: linear-gradient(280deg, rgba(181, 203, 153, 0.50) 0%, rgba(223.94, 240.79, 202.48, 0.50) 100%); padding: 20px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Data Customer</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <a href="<?php echo site_url('customer/add'); ?>" class="btn btn-primary btn-sm" style="width: 200px; background-color: #445D48;border-radius: 20px;">Tambah Customer</a>
                            </div>
                            <div class="col-md-4">
                                <!-- Tombol export dengan dropdown -->
                                <div class="btn-group" style="margin-left: 210px">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" style="width: 150px; border-radius: 20px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Export Data
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo site_url('customer/to_pdf'); ?>">Export PDF</a>
                                        <a class="dropdown-item" href="<?php echo site_url('customer/to_excel'); ?>">Export Excel</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <form action="<?php echo site_url('customer/search');?>" method="get" class="form-inline justify-content-end">
                                    <input type="text" name="keyword" class="form-control form-control-sm mr-2" placeholder="Cari customer..." value="<?php echo $this->input->get('keyword'); ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-secondary">Cari</button>
                                </form>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="bg-light">
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
                                <?php $no = 1;
                                foreach ($penyewa as $val) { ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $val->ID_PENYEWA; ?></td>
                                        <td><?php echo $val->NAMA_PENYEWA; ?></td>
                                        <td><?php echo $val->ALAMAT_PENYEWA; ?></td>
                                        <td><?php echo $val->NO_TELP_PENYEWA; ?></td>
                                        <td><?php echo $val->JENIS_KELAMIN; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo site_url('customer/edit/'.$val->ID_PENYEWA); ?>" class="btn btn-sm" style="background-color: #50A06D; color: white; border-radius: 20px; margin-right: 5px;">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="<?php echo site_url('transaksi/index/'.$val->ID_PENYEWA); ?>" class="btn btn-sm" style="background-color: #2F88DA; color: white; border-radius: 20px; margin-right: 5px;">
                                                    <i class="fas fa-user"></i>
                                                </a>
                                                <a href="<?php echo site_url('customer/delete/'.$val->ID_PENYEWA); ?>" onclick="return confirm('Yakin akan hapus data ini?')" class="btn btn-sm" style="background-color: #C23B22; color: white; border-radius: 20px;">
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
