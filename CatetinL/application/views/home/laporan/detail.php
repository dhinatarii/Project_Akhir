<div class="content-wrapper" style="background: linear-gradient(280deg, rgba(181, 203, 153, 0.50) 0%, rgba(223.94, 240.79, 202.48, 0.50) 100%); padding: 20px;">
<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                    <h2 class="section-title">
                        <span class="px-2">Detail Laporan Bulan <?= date('F', strtotime($selected_month));; ?></span>
                    </h2>
                    </div>
                    <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID Transaksi</th>
                            <th scope="col">Tanggal Peminjaman</th>
                            <th scope="col">Tanggal Harus Kembali</th>
                            <th scope="col">Tanggal Mengembalikan</th>
                            <th scope="col">ID Penyewa</th>
                            <th scope="col">Denda</th>
                            <th scope="col">Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($transactions as $val) { ?>
                            <tr style="background-color: #FAFAFA;">
                                <td><?php echo $no; ?></td>
                                <td><?php echo $val->ID_TRANSAKSI; ?></td>
                                <td><?php echo $val->TANGGAL_PEMINJAMAN; ?></td>
                                <td><?php echo $val->TANGGAL_HARUS_KEMBALI; ?></td>
                                <td><?php echo $val->TANGGAL_PENGEMBALIAN; ?></td>
                                <td><?php echo $val->ID_PENYEWA; ?></td>
                                <td><?php echo $val->DENDA; ?></td>
                                <td><?php echo $val->total_bayar; ?></td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
                <br><br>
                <table class="table table-striped table-bordered table-hover" style="margin-top: 50px;">
                <tr>
                        <th scope="col" style="width: 80%;">Total Denda</th>
                        <th scope="col" style="width: 20%;">Rp. <?php echo $totalDenda;?></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 80%;">Total Pendapatan</th>
                        <th scope="col" style="width: 20%;">Rp. <?php echo $totalPendapatan;?></th>
                    </tr>
                    <tr>
                        <th scope="col" style="width: 80%;">Jumlah Pendapatan Bulan <?= $selected_month;?> </th>
                        <th scope="col" style="width: 20%;">Rp. <?php echo $totalSemuaPendapatan;?></th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
