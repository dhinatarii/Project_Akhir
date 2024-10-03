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
        background-image: url('<?php echo base_url("/assets/images/admin/menu_icon/dash.png") ?>');
        background-size: contain;
        background-repeat: no-repeat;
        width: 18px;
        height: 18px;
      }

      .nav-link .cus-icon {
        background-image: url('<?php echo base_url("/assets/images/admin/menu_icon/cus.png") ?>');
        background-size: contain;
        background-repeat: no-repeat;
        width: 18px;
        height: 18px;
      }

      .nav-link .detail_cus-icon {
        background-image: url('<?php echo base_url("/assets/images/admin/menu_icon/detail_cus.png") ?>');
        background-size: contain;
        background-repeat: no-repeat;
        width: 18px;
        height: 18px;
      }

      .nav-link .income-icon {
        background-image: url('<?php echo base_url("/assets/images/admin/menu_icon/income.png") ?>');
        background-size: contain;
        background-repeat: no-repeat;
        width: 18px;
        height: 18px;
      }

      .nav-link .logout-icon {
        background-image: url('<?php echo base_url("/assets/images/admin/menu_icon/logout.png") ?>');
        background-size: contain;
        background-repeat: no-repeat;
        width: 18px;
        height: 18px;
      }

      .nav-link:hover .dashboard-icon {
        background-image: url('<?php echo base_url("/assets/images/admin/menu_icon/dash_hover.png") ?>');
      }
      .nav-link:hover .cus-icon {
        background-image: url('<?php echo base_url("/assets/images/admin/menu_icon/cus_hover.png") ?>');
      }
      .nav-link:hover .detail_cus-icon {
        background-image: url('<?php echo base_url("/assets/images/admin/menu_icon/detail_cus_hover.png") ?>');
      }
      .nav-link:hover .income-icon {
        background-image: url('<?php echo base_url("/assets/images/admin/menu_icon/income_hover.png") ?>');
      }
      .nav-link:hover .logout-icon {
        background-image: url('<?php echo base_url("/assets/images/admin/menu_icon/logout_hover.png") ?>');
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
            <a href="<?php echo site_url('adminpanel/dashboard');?>" class="nav-link" style="display: flex; align-items: center; color: #a3a3a3;">
              <div class="dashboard-icon" style="margin-right: 10px; width: 18px; height: 18px;">
              </div>
              <p style="font-family: Helvetica; font-size: 17px; font-weight: bold; color: #92959C;">
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item" style="margin-top: 20px;">
            <a href="<?php echo site_url('adminpanel/customer');?>" class="nav-link" style="display: flex; align-items: center; color: #a3a3a3;">
              <div class="cus-icon" style="margin-right: 10px; width: 18px; height: 18px;">
              </div>
              <p style="font-family: Helvetica; font-size: 17px; font-weight: bold; color: #92959C;">
                Customer
              </p>
            </a>
          </li>
          <li class="nav-item" style="margin-top: 20px;">
            <a href="<?php echo site_url('adminpanel/detail_customer');?>" class="nav-link" style="display: flex; align-items: center; color: #a3a3a3;">
              <div class="detail_cus-icon" style="margin-right: 10px; width: 18px; height: 18px;">
              </div>
              <p style="font-family: Helvetica; font-size: 17px; font-weight: bold; color: #92959C;">
                Detail Customer
              </p>
            </a>
          </li>
          <li class="nav-item" style="margin-top: 20px;">
            <a href="<?php echo site_url('adminpanel/pendapatan');?>" class="nav-link" style="display: flex; align-items: center; color: #a3a3a3;">
              <div class="income-icon" style="margin-right: 10px; width: 18px; height: 18px;">
              </div>
              <p style="font-family: Helvetica; font-size: 17px; font-weight: bold; color: #92959C;">
                Pendapatan
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