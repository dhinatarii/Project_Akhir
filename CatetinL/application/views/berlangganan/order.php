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

    .payment-box {
      background-color: #B5CB99;
      text-align: center;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 8px;
      width: 900px;
      height: 400px;
      margin: 20px auto;
    }

    .due-date {
      font-weight: bold;
      display: flex;
      justify-content: space-between;
      margin-top: 10px;
      margin-right: 290px;
      margin-left: 290px;
      font-size: 16px;
      margin-bottom: 20px;
    }

    .price {
      font-weight: bold;
      text-align: center;
      margin-top: 40px;
      font-size: 16px;
      margin-bottom: 10px;
    }

    .text {
      text-align: left;
      margin-top: 10px;
      font-size: 16px;
      margin-bottom: 20px;
    }

    .metode {
      margin-right: 70px;
      margin-left: 70px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
    }

    .metode img {
      height: auto;
      margin-bottom: 10px;
      cursor: pointer;
      max-width: 120px;
      margin-right: 10px;
    }
  </style>
</head>
<body>
<div class="content-wrapper" style="background-color: #FFF2D8;  padding: 0; margin-left: 100; padding-left: 15px; padding-right: 15px;">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb" style="background-color: #FFF2D8;">
                <li class="breadcrumb-item" style="font-size : 26px; font-weight: bold; text-align: center;">Metode Pembayaran</li>
            </ol>
        </nav>
    </div>

    <div class="payment-box">
        <p class="due-date">
            <span>Bayar Sebelum </span>
            <span>xxxx (tanggal)</span>
            <span>Pukul </span>
        </p>
        <p class="price">Rp. xxxx</p>
        <p class="text">Metode Pembayaran</p>
        <p class="metode">
            <a href="<?php echo base_url('main/mandiri/'); ?>">
                <img src="<?php echo base_url('assets/berlangganan/img/mandiri.png') ?>" alt="Mandiri">
            </a>
            <a href="<?php echo base_url('main/bri/'); ?>">
                <img src="<?php echo base_url('assets/berlangganan/img/bri.png') ?>" alt="BRI">
            </a>
            <a href="<?php echo base_url('main/bni/'); ?>">
                <img src="<?php echo base_url('assets/berlangganan/img/bni.png') ?>" alt="BNI">
            </a>
        </p>
        <p class="metode">
            <a href="<?php echo base_url('main/bca/'); ?>">
                <img src="<?php echo base_url('assets/berlangganan/img/bca.png') ?>" alt="BCA">
            </a>
            <a href="<?php echo base_url('main/digibank/'); ?>">
                <img src="<?php echo base_url('assets/berlangganan/img/digibank.png') ?>" alt="Digibank">
            </a>
            <a href="<?php echo base_url('main/cimb/'); ?>">
                <img src="<?php echo base_url('assets/berlangganan/img/cimb.png') ?>" alt="CIMB">
            </a>
        </p>
    </div>
</div>
</body>
</html>
