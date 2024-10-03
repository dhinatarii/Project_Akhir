<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Informasi Pembayaran</title>
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

    .subscription-title {
      text-align: left;
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
      border-bottom: 1px solid #000; /* Tambahkan garis batasan */
      padding-bottom: 20px; /* Tambahkan padding bawah untuk memberikan jarak */
    }

    .price {
      margin-top: 40px;
      text-align: left;
      font-size: 16px;
      margin-bottom: 10px;
    }

    .price2 {
      display: flex;
      justify-content: space-between;
      font-size: 16px;
      margin-bottom: 10px;
      border-bottom: 1px solid #000; /* Tambahkan garis batasan */
      padding-bottom: 20px; /* Tambahkan padding bawah untuk memberikan jarak */
    }

    .due-date {
      display: flex;
      justify-content: space-between;
      margin-top: 30px;
      font-size: 16px;
      margin-bottom: 10px;
    }

    .bill-amount {
      font-size: 16px;
      color: #000;
      font-weight: bold;
      display: flex;
      justify-content: space-between;
      margin-bottom: 16px;
    }

    .button-container{
      padding: 0;
      display: flex;
      float: right;

    }

    .subscribe-button {
      background-color: #595A59;
      color: #fff;
      margin-top: 30px;
      padding: 10px 20px; /* Adjust padding to fit the text */
      border: none;
      border-radius: 4px;
      text-align: center;
      float: right;
      cursor: pointer;
      font-size: 16px;
      text-decoration: none; /* Remove underlining from the link */
    }


  </style>
</head>
<body>
<div class="content-wrapper" style="background-color: #FFF2D8;  padding: 0; margin-left: 100; padding-left: 15px; padding-right: 15px;">

<div class="pagetitle">
    <nav>
        <ol class="breadcrumb" style="background-color: #FFF2D8;">
            <li class="breadcrumb-item" style="font-size : 26px; font-weight: bold; text-align: center;">Info Tagihan</li>
        </ol>
    </nav>
</div>

    <div class="payment-box">
    <h2 class="subscription-title">Pembayaran Paket Berlangganan</h2>
    <p class="price">Harga Langganan</p>
    <p class="price2">
        <span>6 Bulan (180 Hari)</span>
        <span>Rp. 500.000</span>
    </p>
    <p class="due-date">
        <span>Bayar Sebelum </span>
        <span>xxxx</span>
    </p>
    <p class="bill-amount">
        <span>Jumlah Tagihan</span>
        <span>Rp. 500.000</span>
    </p>
      <div class="button-container">
        <a href="<?php echo site_url('main/order/'); ?>" class="subscribe-button">Bayar Tagihan</a>
      </div>
    </div>
</div>
</body>
</html>
