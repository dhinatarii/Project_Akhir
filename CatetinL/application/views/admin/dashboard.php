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
    <div class="card-row" style="padding-top: 70px; padding-left: 33px; padding-right: 646px; align-self: stretch; justify-content: flex-start; align-items: flex-start; gap: 26px; ">
      <!-- Total customer -->
      <div style="width: 192px; padding: 20px; background: #FAFAFA; box-shadow: 0px 15px 40px rgba(68, 93, 72, 0.10); border-radius: 7.59px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 10px; display: inline-flex">
        <div style="flex-direction: column; justify-content: flex-start; align-items: center; gap: 6px; display: flex">
          <div style="flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 7.59px; display: flex">
            <div style="justify-content: flex-start; align-items: center; gap: 7.59px; display: inline-flex">
              <div style="width: 24px; height: 24px; position: relative">
                <img src="<?php echo base_url("/assets/images/admin/menu_icon/cus_hover.png") ?>" style="margin-right: 10px; height: 20px;">
              </div>
              <div style="width: 120px; color: #445D48; font-size: 18px; font-family: Helvetica Now Display; font-weight: 400; word-wrap: break-word">Total Customer</div>
            </div>
          </div>
          <div style="height: 21px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 7.59px; display: flex">
            <div style="justify-content: flex-start; align-items: center; gap: 7.59px; display: inline-flex">
              <div style="color: #445D48; font-size: 14px; font-family: Helvetica Now Display; font-weight: 500; word-wrap: break-word"><?php echo $jumlah_customer; ?> customer</div>
            </div>
          </div>
        </div>
      </div>
      <!-- Total Pendapatan -->
      <div style="width: 192px; padding: 20px; background: #FAFAFA; box-shadow: 0px 15px 40px rgba(68, 93, 72, 0.10); border-radius: 7.59px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 10px; display: inline-flex">
        <div style="flex-direction: column; justify-content: flex-start; align-items: center; gap: 6px; display: flex">
          <div style="flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 7.59px; display: flex">
            <div style="justify-content: flex-start; align-items: center; gap: 7.59px; display: inline-flex">
              <div style="width: 24px; height: 24px; position: relative">
                <img src="<?php echo base_url("/assets/images/admin/menu_icon/income_hover.png") ?>" style="margin-right: 10px; height: 20px;">
              </div>
              <div style="width: 136px; color: #445D48; font-size: 18px; font-family: Helvetica Now Display; font-weight: 400; word-wrap: break-word">Total Pendapatan</div>
            </div>
          </div>
          <div style="height: 21px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 7.59px; display: flex">
            <div style="justify-content: flex-start; align-items: center; gap: 7.59px; display: inline-flex">
              <div style="color: #445D48; font-size: 14px; font-family: Helvetica Now Display; font-weight: 500; word-wrap: break-word">Rp. <?php echo $total_pendapatan; ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- table -->
    <div style="padding-left: 33px; padding-right: 33px; padding-top: 12px;">
      <table style="width: 100%; height: 100%; background:rgba(249.67, 249.67, 249.67, 0.65); box-shadow: 0px 15px 40px rgba(68, 93, 72, 0.10); border-top-left-radius: 20px; border-top-right-radius: 20px">
        <thead>
          <tr>
            <th style="text-align: center;">#</th>
            <th>Customer ID</th>
            <th>Nama Customer</th>
            <th>No Hp</th>
            <th>Email</th>
            <th>Batas Berlangganan</th>
            <th>Status</th>
            <th>Total Berlangganan</th>
          </tr>
        </thead>
        <tbody style="background: #FAFAFA;">
          <?php $no = 1; foreach ($customer as $val) { ?> 
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $val->ID_PEBISNIS; ?></td>
            <td><?php echo $val->USERNAME; ?></td>
            <td><?php echo $val->NO_TELP_TOKO; ?></td>
            <td><?php echo $val->EMAIL; ?></td>
            <td><?php echo $val->BATAS_BERLANGGANAN; ?></td>
            <td><?php echo $val->STATUS_PEBISNIS; ?></td>
            <td><?php echo $total_berlangganan[$val->ID_PEBISNIS]; ?></td>
          </tr>
            <?php $no++; } ?> 
        </tbody>
      </table>
    </div>
  </div>
</div>
