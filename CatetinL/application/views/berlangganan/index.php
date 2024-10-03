<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Berlangganan</title>
    <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-PThCikGgiBISCv3l"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: linear-gradient(280deg, rgba(181, 203, 153, 0.50) 0%, rgba(223.94, 240.79, 202.48, 0.50) 100%);
        }

        .content-wrapper {
            padding: 20px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .pagetitle {
            margin-bottom: 40px;
        }

        .pagetitle p {
            margin: 0;
        }

        .subscription-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 100%;
            max-width: 1200px;
        }

        .subscription-box {
            text-align: center;
            padding: 20px;
            border: 1px solid #445D48;
            border-radius: 20px;
            width: 280px;
            background-color: #FAFAFA;
            transition: transform 0.3s ease, background-color 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .subscription-box:hover {
            transform: translateY(-10px);
            background-color: rgba(181, 203, 153, 0.50);
        }

        .subscription-title {
            text-align: left;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #333333;
        }

        .subscription-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .subscription-harga {
          margin-bottom: 25px;
            font-size: 32px;
            font-weight: bold;
            color: #333333;
        }

        .subscription-duration {
            /* margin-right: 10px; */
            font-size: 16px;
            color: #777777;
        }

        .button-container {
            padding: 0;
        }

        .subscribe-button {
            width: 100%;
            background-color: #445D48;
            color: #FAFAFA;
            padding: 7px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            display: block;
        }

        .subscribe-button:hover {
            background-color: #374c3b;
        }
    </style>
</head>

<body >

    <div class="content-wrapper">
        <div class="pagetitle" style="margin-left: -400px;">
            <p style="font-size: 26px; font-weight: bold; text-align:left; color:#333333; margin-bottom:20px">Mulai Berlangganan, Nikmati Kemudahan</p>
            <p style="font-size: 16px; text-align:left; color:#333333;">Mudahkan Perhitungan dengan Bergabung Bersama Catetin</p>
            <p style="font-size: 16px; font-weight: bold; text-align:left; color:#333333;">#MudahBerkepanjangan</p>
        </div>

        <div class="subscription-container">
            <div class="subscription-box">
                <h3 class="subscription-title">Paket 1</h3>
                <div class="subscription-details">
                    <p class="subscription-harga">Rp30.000</p>
                    <p class="subscription-duration" style="margin-right: 40px;">/90 Hari</p>
                </div>
                <div class="button-container">
                    <a id="pay-button" class="subscribe-button">Pilih Paket</a>
                </div>
            </div>

            <div class="subscription-box best-value">
                <h3 class="subscription-title">Paket 2</h3>
                <div class="subscription-details">
                    <p class="subscription-harga">Rp75.000</p>
                    <p class="subscription-duration" style="margin-right: 30px;">/180 Hari</p>
                </div>
                <div class="button-container">
                    <a id="pay-button1" class="subscribe-button">Pilih Paket</a>
                </div>
            </div>

            <div class="subscription-box">
                <h3 class="subscription-title">Paket 3</h3>
                <div class="subscription-details">
                    <p class="subscription-harga">Rp100.000</p>
                    <p class="subscription-duration" style="margin-right: 10px;">/365 Hari</p>
                </div>
                <div class="button-container">
                    <a id="pay-button2" class="subscribe-button">Pilih Paket</a>
                </div>
            </div>
        </div>

        <form id="payment-form" method="post" action="<?= site_url() ?>/main/finish">
            <input type="hidden" name="result_type" id="result-type" value="">
            <input type="hidden" name="result_data" id="result-data" value="">
        </form>

        <script type="text/javascript">
            $('#pay-button').click(function (event) {
                event.preventDefault();
                $(this).attr("disabled", "disabled");

                $.ajax({
                    url: '<?= site_url() ?>/main/token',
                    cache: false,

                    success: function (data) {
                        console.log('token = ' + data);

                        var resultType = document.getElementById('result-type');
                        var resultData = document.getElementById('result-data');

                        function changeResult(type, data) {
                            $("#result-type").val(type);
                            $("#result-data").val(JSON.stringify(data));
                        }

                        snap.pay(data, {

                            onSuccess: function (result) {
                                changeResult('success', result);
                                console.log(result.status_message);
                                console.log(result);
                                $("#payment-form").submit();
                            },
                            onPending: function (result) {
                                changeResult('pending', result);
                                console.log(result.status_message);
                                $("#payment-form").submit();
                            },
                            onError: function (result) {
                                changeResult('error', result);
                                console.log(result.status_message);
                                $("#payment-form").submit();
                            }
                        });
                    }
                });
            });

            $('#pay-button1').click(function (event) {
                event.preventDefault();
                $(this).attr("disabled", "disabled");

                $.ajax({
                    url: '<?= site_url() ?>/main/token1',
                    cache: false,

                    success: function (data) {
                        console.log('token = ' + data);

                        var resultType = document.getElementById('result-type');
                        var resultData = document.getElementById('result-data');

                        function changeResult(type, data) {
                            $("#result-type").val(type);
                            $("#result-data").val(JSON.stringify(data));
                        }

                        snap.pay(data, {

                            onSuccess: function (result) {
                                changeResult('success', result);
                                console.log(result.status_message);
                                console.log(result);
                                $("#payment-form").submit();
                            },
                            onPending: function (result) {
                                changeResult('pending', result);
                                console.log(result.status_message);
                                $("#payment-form").submit();
                            },
                            onError: function (result) {
                                changeResult('error', result);
                                console.log(result.status_message);
                                $("#payment-form").submit();
                            }
                        });
                    }
                });
            });

            $('#pay-button2').click(function (event) {
                event.preventDefault();
                $(this).attr("disabled", "disabled");

                $.ajax({
                    url: '<?= site_url() ?>/main/token2',
                    cache: false,

                    success: function (data) {
                        console.log('token = ' + data);

                        var resultType = document.getElementById('result-type');
                        var resultData = document.getElementById('result-data');

                        function changeResult(type, data) {
                            $("#result-type").val(type);
                            $("#result-data").val(JSON.stringify(data));
                        }

                        snap.pay(data, {

                            onSuccess: function (result) {
                                changeResult('success', result);
                                console.log(result.status_message);
                                console.log(result);
                                $("#payment-form").submit();
                            },
                            onPending: function (result) {
                                changeResult('pending', result);
                                console.log(result.status_message);
                                $("#payment-form").submit();
                            },
                            onError: function (result) {
                                changeResult('error', result);
                                console.log(result.status_message);
                                $("#payment-form").submit();
                            }
                        });
                    }
                });
            });
        </script>
    </div>
</body>

</html>
