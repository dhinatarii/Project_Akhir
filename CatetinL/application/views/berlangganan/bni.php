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
      width: 700px;
      height: 1000px;
      margin: 20px auto;
    }

    .name, .no {
        margin-top: 20px;
      text-align: left;
      font-size: 16px;
      margin-bottom: 10px;
    }

    .name2, .no2 {
      text-align: left;
      font-size: 16px;
      margin-bottom: 10px;
    }

    .no2 {
      font-weight: bold;
      margin-bottom: -15px;
    }

    .no {
      font-weight: bold;
      margin-bottom: 20px;
    }

    .metode {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
    }

    .metode img {
      height: auto;
      margin: 10px;
      max-width: 200px;
      margin-left: 300px;
    }
    
    .namee, .noo {
      text-align: left;
      font-size: 16px;
      margin-bottom: 10px;
    }

    .noo {
      font-weight: bold;
      margin-bottom: 20px;
    }


    .login-info {
        text-align: left;
        margin-top: 30px;
        display: none;
    }

    .login-info h3 {
        font-weight: bold;
        font-size: 18px;
        margin-bottom: 10px;
    }

    .login-info ul {
        list-style-type: decimal;
        padding: 0;
        padding-left: 10px;
    }

    .login-info ul li {
        margin-left: 30px;
        margin-bottom: 8px;
    }

    .tipe{
        justify-content: space-around;
        text-align: left;
        color: #000;
        font-weight: bold;
    }

    .instructions {
      text-align: left;
      display: none;
      background-color: #B5CB99;
      padding: 18px;
      width: 600px;
      margin: 20px auto;
    }

    h2 {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    ol {
      list-style-type: decimal;
      padding-left: 10px;
    }

    li {
      font-size: 16px;
      margin-bottom: 10px;
    }

    .pay-button {
      background-color: #735F32;
      color: #fff;
      margin-top: 30px;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      float: left;
      cursor: pointer;
      font-size: 16px;
    }

  </style>
</head>
<body>
<div class="content-wrapper" style="background-color: #FFF2D8;  padding: 0; margin-left: 100; padding-left: 15px; padding-right: 15px;">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb" style="background-color: #FFF2D8;">
                <li class="breadcrumb-item" style="font-size : 26px; font-weight: bold; text-align: center;">Rincian Pembayaran</li>
            </ol>
        </nav>
    </div>

    <div class="payment-box">
        <p class="name">Virtual Account Number</p>
        <p class="no">xxxxxx</p>
        <p class="name2">Virtual Account Name</p>
        <p class="no2">xxxxxx</p>
        <div class="metode">
            <div>
                <p class="namee">Jumlah Pembayaran</p>
                <p class="noo">xxxxxx</p>
            </div>
            <img src="<?php echo base_url('assets/berlangganan/img/bni.png') ?>" alt="...">
        </div>

        <div class="tipe">
            <a href="#" onclick="toggleInfo('livinInfo')">Mobile Banking</a>
            <a href="#" onclick="toggleInfo('atmInfo')" style="margin-left: 70px;">ATM</a>
        </div>


            <!-- Added Text -->
            <div class="login-info" id="livinInfo">
                <h3>Log In To Your Account</h3>
                <ul>
                    <li>Open Livin by Mandiri, then enter your PASSWORD or do face verification</li>
                    <li>Select "IDR Transfer"</li>
                    <li>Select "Transfer to new recipient"</li>
                </ul>

                <h3>Payment Details</h3>
                <ul>
                    <li>Enter your Virtual Account Number 889082211149800</li>
                    <li>Confirm the VA detail and click "Continue"</li>
                    <li>Input the amount to transfer (if not filled automatically)</li>
                    <li>Review and confirm the transaction details and click "Continue"</li>
                    <li>Complete the transaction by entering your MPIN</li>
                </ul>

                <h3>Transaction Completed</h3>
                <ul>
                    <li>Upon successful payment, save the transaction receipt or screenshot the screen as proof of payment</li>
                    <li>Once the payment transaction is completed, this invoice will be updated automatically. This may take up to 5 minutes</li>
                </ul>
                <button class="pay-button">Sudah Bayar</button>
            </div>

            <div class="instructions" id="atmInfo">
                <h2>How to Pay Mandiri Virtual Account via ATM</h2>
                    <ol>
                        <li>Insert your ATM card and PIN.</li>
                        <li>Choose Pay/Buy menu.</li>
                        <li>Choose Other option > Multipayment.</li>
                        <li>Enter the company biller code (usually already listed on the payment instruction).</li>
                        <li>Enter Virtual account number > Correct.</li>
                        <li>Enter the number requested to select the bill > Yes.</li>
                        <li>The screen will display a confirmation. If appropriate, select Yes.</li>
                        <li>Done</li>
                    </ol>
                    <button class="pay-button">Sudah Bayar</button>
            </div>
    </div>
</div>

<script>
    function toggleInfo(infoId) {
        // Semua elemen dengan kelas 'login-info' disembunyikan
        var loginInfos = document.querySelectorAll('.login-info');
        loginInfos.forEach(function (info) {
            info.style.display = 'none';
        });

        // Semua elemen dengan kelas 'instructions' disembunyikan
        var instructionInfos = document.querySelectorAll('.instructions');
        instructionInfos.forEach(function (info) {
            info.style.display = 'none';
        });

        // Elemen dengan ID tertentu ditampilkan
        var info = document.getElementById(infoId);
        info.style.display = 'block';
    }
</script>

</body>
</html>
