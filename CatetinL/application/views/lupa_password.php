<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style type="text/css">
        body {
            background-image: url('<?php echo base_url("assets/img/gantipass.png"); ?>');
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            margin: 0;
        }

        .container {
            position: relative;
            z-index: 1;
            background: #FAFAFA;
            max-width: 360px;
            margin: 0 auto 10px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
            border-radius: 15px;
        }

        .form-floating input {
            border-radius: 15px;
            padding-left: 20px;
        }

        .btn_custom {
            width: 100%;
            background: #445D48;
            border-radius: 40px;
            color: #FAFAFA;
        }
    </style>
</head>

<body>
    <div class="container">
        <h5 style="text-align: left; margin-bottom:30px">Ganti Password</h5>
        <form action="<?php echo site_url('main/save_lupa_pass'); ?>" method="POST" autocomplete="off">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                <label for="floatingInput">Password Lama</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password_new" name="password_new" placeholder="Password" required>
                <label for="floatingInput">Password Baru</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password_new_konfirmasi" name="password_new_konfirmasi" placeholder="Password" required>
                <label for="floatingInput">Konfirmasi Password</label>
            </div>
            <button class="btn btn_custom">Ganti Password</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>