<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-0 px-0">
  <div style="background-color: #FAFAFA; height: 100%; padding: 0; margin: 0; display: flex; flex-direction: column; align-items: center; justify-content: center;">
    <!-- Brand Logo -->
    <style type="text/css">
      .nav-link {
        color: #333;
        text-decoration: none;
        border-radius: 4px;
        padding: 10px 20px;
        transition: background-color 0.3s ease;
      }

      .nav-link:hover {
        background-color: #B5CB99; /* Warna hijau muda */
        color: #333; /* Warna teks tetap gelap */
        border-radius: 20px 10px 20px 10px; /* Mengatur radius tiap sudut secara berbeda */
      }
    </style>
    <a href=<?php echo site_url('main/logout');?> class="mt-3 pt-3 pb-3 mb-3 d-flex">
      <img src="<?php echo base_url ('assets/images/dashboard/img_logo.png')?> " style="width: 60%; margin:auto;">
    </a>
    <style>
      .nav-link:hover {
        color: #445D48 !important;
      }
      .nav-link .dashboard-icon {
        background-image: url('<?php echo base_url("/assets/img/dash.png") ?>');
        background-size: contain;
        background-repeat: no-repeat;
        width: 18px;
        height: 18px;
      }

      .nav-link .kategori-icon {
        background-image: url('<?php echo base_url("/assets/img/kategori.png") ?>');
        background-size: contain;
        background-repeat: no-repeat;
        width: 18px;
        height: 18px;
      }

      .nav-link .produk-icon {
        background-image: url('<?php echo base_url("/assets/img/produk.png") ?>');
        background-size: contain;
        background-repeat: no-repeat;
        width: 18px;
        height: 18px;
      }

      .nav-link .transaksi-icon {
        background-image: url('<?php echo base_url("/assets/img/transaksi.png") ?>');
        background-size: contain;
        background-repeat: no-repeat;
        width: 18px;
        height: 18px;
      }

      .nav-link .laporan-icon {
        background-image: url('<?php echo base_url("/assets/img/laporan.png") ?>');
        background-size: contain;
        background-repeat: no-repeat;
        width: 18px;
        height: 18px;
      }

      .nav-link:hover .dashboard-icon {
        background-image: url('<?php echo base_url("/assets/img/dash_hover.png") ?>');
      }
      .nav-link:hover .kategori-icon {
        background-image: url('<?php echo base_url("/assets/img/kategori_hover.png") ?>');
      }
      .nav-link:hover .produk-icon {
        background-image: url('<?php echo base_url("/assets/img/produk_hover.png") ?>');
      }
      .nav-link:hover .transaksi-icon {
        background-image: url('<?php echo base_url("/assets/img/transaksi_hover.png") ?>');
      }
      .nav-link:hover .laporan-icon {
        background-image: url('<?php echo base_url("/assets/img/laporan_hover.png") ?>');
      }

      .nav-link:hover p {
        color: #445D48 !important;
      }
      .nav-link {
        transition: background-color 0.3s ease;
      }

      .nav-link:hover {
        background-color: #E0F1CA;
        background: linear-gradient(280deg, rgba(181, 203, 153, 0.50) 0%, rgba(223.94, 240.79, 202.48, 0.50) 100%);
      }

      .nav-link.active {
        background-color: #E0F1CA;
        background: linear-gradient(280deg, rgba(181, 203, 153, 0.50) 0%, rgba(223.94, 240.79, 202.48, 0.50) 100%);
      }
    </style>
    <!-- Sidebar -->
    <div class="sidebar mt-2 pr-12 pl-6">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo site_url('main/dashboard');?>" class="nav-link" style="display: flex; align-items: center; color: #a3a3a3;">
              <div class="dashboard-icon" style="margin-right: 10px; width: 18px; height: 18px;">
              </div>
              <p style="font-family: Helvetica; font-size: 17px; font-weight: bold; color: #92959C;">
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item" style="margin-top: 20px;">
            <a href="<?php echo site_url('kategori');?>" class="nav-link" style="display: flex; align-items: center; color: #a3a3a3;">
              <div class="kategori-icon" style="margin-right: 10px; width: 18px; height: 18px;">
              </div>
              <p style="font-family: Helvetica; font-size: 17px; font-weight: bold; color: #92959C;">
                Data Siswa
              </p>
            </a>
          </li>
          <li class="nav-item" style="margin-top: 20px;">
            <a href="<?php echo site_url('produk');?>" class="nav-link" style="display: flex; align-items: center; color: #a3a3a3;">
              <div class="produk-icon" style="margin-right: 10px; width: 18px; height: 18px;">
              </div>
              <p style="font-family: Helvetica; font-size: 17px; font-weight: bold; color: #92959C;">
                Data Guru
              </p>
            </a>
          </li>
          <li class="nav-item" style="margin-top: 20px;">
            <a href="<?php echo site_url('customer');?>" class="nav-link" style="display: flex; align-items: center; color: #a3a3a3;">
              <div class="transaksi-icon" style="margin-right: 10px; width: 18px; height: 18px;">
              </div>
              <p style="font-family: Helvetica; font-size: 17px; font-weight: bold; color: #92959C;">
                Data Alumni
              </p>
            </a>
          </li>
          <li class="nav-item" style="margin-top: 20px;">
            <a href="<?php echo site_url('laporan');?>" class="nav-link" style="display: flex; align-items: center; color: #a3a3a3;">
              <div class="laporan-icon" style="margin-right: 10px; width: 18px; height: 18px;">
              </div>
              <p style="font-family: Helvetica; font-size: 17px; font-weight: bold; color: #92959C;">
                Data Keuangan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
  </div>
  <!-- /.sidebar -->
</aside>