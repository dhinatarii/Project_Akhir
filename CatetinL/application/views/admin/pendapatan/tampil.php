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

<div class="content-wrapper" style="background-color: #FAFAFA; padding: 0; margin-left: 100;">
    <!-- card container -->
    <div style="padding-bottom: 60px; background: linear-gradient(280deg, rgba(181, 203, 153, 0.50) 0%, rgba(223.94, 240.79, 202.48, 0.50) 100%);">
        <!-- table -->
        <div style="padding-top: 70px; padding-left: 33px; padding-right: 33px;">
            <table style="width: 100%; height: 100%; background:rgba(249.67, 249.67, 249.67, 0.65); box-shadow: 0px 15px 40px rgba(68, 93, 72, 0.10); border-top-left-radius: 20px; border-top-right-radius: 20px">
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th>ID Customer</th>
                        <th>Username</th>
                        <th>Nama Toko</th>
                        <th>Pendapatan</th>
                    </tr>
                </thead>
                <tbody style="background: #FAFAFA;">
                    <?php $no = 1; foreach ($pendapatan as $val) { ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $no; ?></td>
                        <td><?php echo $val->ID_PEBISNIS; ?></td>
                        <td><?php echo $val->USERNAME; ?></td>
                        <td><?php echo $val->NAMA_TOKO; ?></td>
                        <td>Rp. <?php echo $val->gross_amount; ?></td>
                    </tr>
                    <?php $no++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>