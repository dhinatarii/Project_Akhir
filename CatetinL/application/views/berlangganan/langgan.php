<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Payment Method</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .content-wrapper {
      background-color: #FFF2D8;
      padding: 0;
      margin-left: 100px;
      padding-left: 15px;
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

    .penjelasan {
      text-align: center;
      margin-top: 40px;
      font-size: 16px;
      margin-bottom: 10px;
    }

    .button-container {
        text-align: center;
    }

    .berlangganan {
      background-color: #595A59;
      color: white;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 4px;
      display: inline-block;
      text-decoration: none;
    }

    .berlangganan:active {
        color: white;
        background-color: white;/* Warna yang diinginkan saat diklik */;
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
        <img src="<?php echo base_url('assets/berlangganan/img/berlangganan.png') ?>" alt="...">
    </div>
    <h3 class="akses">Kamu Belum Memiliki Laporan Bisnismu</h3>
    <p class="penjelasan">Semua laporan harian, mingguan, tahunanmu akan ditampilkan disini</p>
    <p class="penjelasan" style="margin-top: -10px;">Mulai berlangganan untuk mencatat laporan mu</p>
    <div class="button-container">
        <a href="<?php echo site_url('main/berlangganan/index/'); ?>" class="berlangganan">Mulai Berlangganan</a>
    </div>
  </div>
</body>
</html>
