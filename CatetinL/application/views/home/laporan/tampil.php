<div class="content-wrapper" style="background: linear-gradient(280deg, rgba(181, 203, 153, 0.50) 0%, rgba(223.94, 240.79, 202.48, 0.50) 100%); padding: 20px;">
<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Laporan</h5>
                    </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Bulan</th>
                            <th scope="col">Aksi</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($laporan_bulanan as $val) { ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $val->month; ?></td>
                                <td>
                                    <div class="btn-group" style="width: 100px;">
                                            <a href="<?php echo site_url('laporan/detail_transaksi/' .$val->month. '/' . $ID_PEBISNIS);?>" class="btn btn-sm" style=" background-color: #50A06D; color: white; border-radius: 20px; margin-right: 5px;">Detail</a>
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