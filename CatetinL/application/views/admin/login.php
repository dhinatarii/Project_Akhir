<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style type="text/css">
        body {
            background-image: url('<?php echo base_url("assets/img/login.png"); ?>');
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            margin: 0;
        }
        .login-page {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            background: #FAFAFA;
            max-width: 360px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
            border-radius: 15px;
        }
        .btn_custom {
            width: 100%;
            background: #445D48;
            border-radius: 40px;
            color: #FAFAFA;
        }
        .form-floating label {
            padding-left: 20px;
        }
        .form-floating input {
            border-radius: 15px;
            padding-left: 20px;
        }
        .login-page a {
            text-decoration: none;
            color: #595A59;
        }
        .password-icon {
            position: absolute;
            right: 15px;
            top: 15px;
            cursor: pointer;
        }
        .form-floating {
            position: relative;
        }
    </style>
</head>
<body>
    <div class="login-page">
        <div class="container">
            <form action="<?php echo site_url('adminpanel/login');?>" method="POST" autocomplete="off">
                <h5 class="text-start" style="text-align: left; margin-bottom:30px">Login Admin</h5>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="Username" name="username" placeholder="Username" autofocus required>
                    <label for="Username">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="Password" name="password" placeholder="Password" required>
                    <label for="Password">Password</label>
                    <span class="password-icon" onclick="togglePassword()">👁️</span>
                </div>
                <br>
                <button type="submit" class="btn btn_custom">Masuk</button><br><br>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('Password');
            const passwordIcon = document.querySelector('.password-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                passwordIcon.textContent = '👁️';
            }
        }
    </script>
</body>
</html>
