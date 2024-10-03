<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style type="text/css">
        body {
            background-image: url('<?php echo base_url("assets/img/register.png"); ?>');
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            margin: 0;
        }

        .login-page {
            width: 100%;
            margin: auto;
        }

        .container {
            background: #FAFAFA;
            max-width: 900px;
            margin: 0 auto;
            padding: 45px;
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
    <div class="login-page">
        <div class="container">
            <form action="<?php echo site_url('main/save_register'); ?>" method="POST" autocomplete="off">
                <h4>Daftar Akun</h4>
                <p>Silakan isi form berikut untuk akses ke akun anda</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3" >
                            <input type="text" class="form-control" id="name" name="nama" placeholder="Nama" required>
                            <label for="name">Nama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="confirm_password" name="konfirmasi_password" placeholder="Konfirmasi Password" required>
                            <label for="confirm_password">Konfirmasi Password</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="phone" name="nohp" placeholder="No Telp" required>
                            <label for="phone">No Telp</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="address" name="alamat" placeholder="Alamat" style="height: 100px;" required></textarea>
                            <label for="address">Alamat</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn_custom">Daftarkan Akun</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
