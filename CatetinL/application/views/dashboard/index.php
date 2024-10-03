<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Tabel</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .card-row {
            display: flex;
            margin-bottom: 20px;
            gap: 26px;
        }

        .table-container {
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
<div class="content-wrapper" style="background: linear-gradient(280deg, rgba(181, 203, 153, 0.50) 0%, rgba(223.94, 240.79, 202.48, 0.50) 100%); padding: 0;">
    <div class="card-row" style="padding-top: 70px; padding-left: 20px; padding-right: 20px;">
        <!-- Total customer -->
        <div style="width: 190px; padding: 20px; background: #FAFAFA; box-shadow: 0px 15px 40px rgba(68, 93, 72, 0.10); border-radius: 10px;">
            <div style="flex-direction: column; justify-content: flex-start; align-items: center; gap: 6px; display: flex">
                <div style="justify-content: flex-start; align-items: center; gap: 7.59px; display: inline-flex">
                    <img src="<?php echo base_url('/assets/img/cus_hover.png') ?>" style="margin-right: 10px; height: 20px;">
                    <div style="color: #445D48; font-size: 18px;">Total Customer</div>
                </div>
                <div style="color: #445D48; font-size: 14px;"><?php echo $total_customers; ?> customer</div>
            </div>
        </div>
        <!-- Total kategori -->
        <div style="width: 190px; padding: 20px; background: #FAFAFA; box-shadow: 0px 15px 40px rgba(68, 93, 72, 0.10); border-radius: 10px;">
            <div style="flex-direction: column; justify-content: flex-start; align-items: center; gap: 6px; display: flex">
                <div style="justify-content: flex-start; align-items: center; gap: 7.59px; display: inline-flex">
                    <img src="<?php echo base_url('/assets/img/kategori_hover.png') ?>" style="margin-right: 10px; height: 20px;">
                    <div style="color: #445D48; font-size: 18px;">Total Kategori</div>
                </div>
                <div style="color: #445D48; font-size: 14px;"><?php echo $total_kategori; ?> kategori</div>
            </div>
        </div>
        <!-- Total Produk -->
        <div style="width: 190px; padding: 20px; background: #FAFAFA; box-shadow: 0px 15px 40px rgba(68, 93, 72, 0.10); border-radius: 10px;">
            <div style="flex-direction: column; justify-content: flex-start; align-items: center; gap: 6px; display: flex">
                <div style="justify-content: flex-start; align-items: center; gap: 7.59px; display: inline-flex">
                    <img src="<?php echo base_url('/assets/img/produk_hover.png') ?>" style="margin-right: 10px; height: 20px;">
                    <div style="color: #445D48; font-size: 18px;">Total Produk</div>
                </div>
                <div style="color: #445D48; font-size: 14px;"><?php echo $total_produk; ?> produk</div>
            </div>
        </div>
        <!-- Total Transaksi -->
        <div style="width: 190px; padding: 20px; background: #FAFAFA; box-shadow: 0px 15px 40px rgba(68, 93, 72, 0.10); border-radius: 10px;">
            <div style="flex-direction: column; justify-content: flex-start; align-items: center; gap: 6px; display: flex">
                <div style="justify-content: flex-start; align-items: center; gap: 7.59px; display: inline-flex">
                    <img src="<?php echo base_url('/assets/img/transaksi_hover.png') ?>" style="margin-right: 10px; height: 20px;">
                    <div style="color: #445D48; font-size: 18px;">Total Transaksi</div>
                </div>
                <div style="color: #445D48; font-size: 14px;"><?php echo $total_transaksi; ?> transaksi</div>
            </div>
        </div>
        <!-- Total Pendapatan -->
        <div style="width: 190px; padding: 20px; background: #FAFAFA; box-shadow: 0px 15px 40px rgba(68, 93, 72, 0.10); border-radius: 10px;">
            <div style="flex-direction: column; justify-content: flex-start; align-items: center; gap: 6px; display: flex">
                <div style="justify-content: flex-start; align-items: center; gap: 7.59px; display: inline-flex">
                    <img src="<?php echo base_url('/assets/img/income_hover.png') ?>" style="margin-right: 10px; height: 20px;">
                    <div style="color: #445D48; font-size: 18px;">Total Pendapatan</div>
                </div>
                <div style="color: #445D48; font-size: 14px;">Rp. <?php echo $totalSemuaPendapatan; ?></div>
            </div>
        </div>
    </div>

    <!-- Filtering -->
    <label for="filterCustomer">Filter Berdasarkan Nama Customer:</label>
    <select id="filterCustomer" onchange="filterTable()">
        <option value="">-- Pilih Nama Customer --</option>
        <?php foreach ($penyewa as $val) { ?>
            <option value="<?php echo $val->NAMA_PENYEWA; ?>"><?php echo $val->NAMA_PENYEWA; ?></option>
        <?php } ?>
    </select>

    <!-- Table -->
    <div style="padding: 12px 33px;">
        <table id="dataTable" style="width: 100%; background:rgba(249.67, 249.67, 249.67, 0.65); box-shadow: 0px 15px 40px rgba(68, 93, 72, 0.10); border-radius: 20px;">
            <thead>
                <tr>
                    <th style="text-align: center;">#</th>
                    <th scope="col">ID Customer</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">No Hp</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Denda</th>
                    <th scope="col">Status Sewa</th>
                    <th scope="col">Total Produk</th>
                    <th scope="col">Total Aktivitas Transaksi</th>
                </tr>
            </thead>
            <tbody style="background: #FAFAFA;">
                <?php $no = 1; foreach ($penyewa as $val) { ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $val->ID_PENYEWA; ?></td>
                        <td><?php echo $val->NAMA_PENYEWA; ?></td>
                        <td><?php echo $val->NO_TELP_PENYEWA; ?></td>
                        <td><?php echo $val->ALAMAT_PENYEWA; ?></td>
                        <td><?php echo isset($denda[$val->ID_PENYEWA]) ? 'Rp. ' . $denda[$val->ID_PENYEWA] : 'Rp. 0'; ?></td>
                        <td><?php echo isset($status_sewa[$val->ID_PENYEWA]) ? $status_sewa[$val->ID_PENYEWA] : '-'; ?></td>
                        <td style="text-align: center;"><?php echo isset($total_produk_customer[$val->ID_PENYEWA]) ? $total_produk_customer[$val->ID_PENYEWA] : 0; ?></td>
                        <td style="text-align: center;"><?php echo $total_aktivitas_transaksi[$val->ID_PENYEWA]; ?></td>
                    </tr>
                <?php $no++; } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function filterTable() {
    const filterValue = document.getElementById('filterCustomer').value;
    const table = document.getElementById('dataTable');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

    for (let i = 0; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName('td');
        const customerName = cells[2].textContent || cells[2].innerText; // Nama Customer

        // Tampilkan atau sembunyikan baris berdasarkan filter
        if (filterValue === "" || customerName === filterValue) {
            rows[i].style.display = ""; // Tampilkan baris
        } else {
            rows[i].style.display = "none"; // Sembunyikan baris
        }
    }
}
</script>

</body>
</html>