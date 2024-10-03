<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Payment Method</title>
  <style>
    body {
      background-color: #FFF2D8;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .content-wrapper {
      margin-top: 50px;
      padding: 0;
      padding-right: 15px;
    }

    .pagetitle {
      text-align: center;
    }

    .breadcrumb-item {
      font-size: 26px;
      font-weight: bold;
      text-align: center;
    }
    .gambar {
        text-align: center;
    }

    .gambar img {
      height: auto;
      margin-bottom: 10px;
      cursor: pointer;
      max-width: 300px;
      display: inline-block;
    }

    .akses {
      font-weight: bold;
      font-size: 24px;
      margin-bottom: 10px;
      text-align: center;
    }

    .button-container {
        margin-top: 50px;
        text-align: center;
    }

    .berlangganan {
      background-color: #595A59;
      color: white;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
    }
  </style>
</head>
<body>
  <div class="content-wrapper">
    <div class="pagetitle">
      <!-- <nav>
        <ol class="breadcrumb" style="background-color: #FFF2D8;">
          <li class="breadcrumb-item">Payment Method</li>
        </ol>
      </nav> -->
    </div>
    <div class="gambar">
        <img src="<?php echo base_url('assets/berlangganan/img/sukses.png') ?>" alt="...">
    </div>
    <h3 class="akses">Anda Sudah Berlangganan</h3>
    <h3 class="akses">Selamat Menikmati Layanan ini</h3>
    <div class="button-container">
        <a href="<?php echo site_url('main/dashboard/'); ?>" class="berlangganan">Kembali Ke Dashboard</a>
    </div>
  </div>
</body>
</html>
