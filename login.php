<?php

require "models/admin.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    # validate
    if(empty($_POST['login_email']) || empty($_POST['login_password'])) {
        echo '<script>alert("Vui lòng nhập đủ.");window.location.href="/?action=login"</script>';
    }

    if (filter_var($_POST['login_email'], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['login_email'];
        $password = md5($_POST['login_password']);

        $result = login($email, $password);
        if ($result) {
            $_SESSION['name'] = $result['name'];
            $_SESSION['id'] = $result['id'];
            $_SESSION['role'] = $result['role'];
            if ($result['role'] == 'admin') {
                header("location: /?action=receipt");
            } else {
                $_SESSION['role'] = 'employee';
                header("location: /employee.php");
            }
        } else {
            $wrongPassword = "Sai tài khoản hoặc mật khẩu!";
        }
    } else {
        $phone_number = $_POST['login_email'];
        $password = md5($_POST['login_password']);

        $result = login_user($phone_number, $password);
        if (empty($result)) {
            $wrongPassword = "Sai tài khoản hoặc mật khẩu!";
        } else {
            $_SESSION['id'] = $result['id'];
            $_SESSION['phone_number'] = $result['phone_number'];
            header("location: /?action=index");
        }
    }
}

# CHECK AVAILABLE LOGIN
if (isEmployee()) {
    if ($_SESSION['role'] == 'admin') header("location: /?action=receipt");
    if ($_SESSION['role'] == NULL) header("location: /employee.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/admin/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>Bruno</b>BARBER</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" name="login_email" placeholder="Email or Phone number" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <p class="text-danger" id="username_error"></p>
                    <div class="input-group">
                        <input type="password" class="form-control" name="login_password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <p class="text-danger" id="password_error"></p>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" id="btnLogin" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <div style="color: red;">
                    <?= isset($wrongPassword) ? $wrongPassword : '' ?>
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="public/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="public/admin/dist/js/adminlte.min.js"></script>

    <script>
    $(document).ready(function()
    {
        $('#btnLogin').click(function(){
            // BƯỚC 1: Lấy dữ liệu từ form
            var username    = $.trim($('input[name=login_email').val());
            var password    = $.trim($('input[name=login_password').val());
            // BƯỚC 2: Validate dữ liệu
            // Biến cờ hiệu
            var flag = true;
            // Password
            if (password.length <= 0){
                $('#password_error').text('Bạn phải nhập mật khẩu');
                flag = false;
            }
            else{
                $('#password_error').text('');
            }
            // Username
            if (username.length <= 0){
                $('#username_error').text('Bạn phải nhập tài khoản');
                flag = false;
            }
            else{
                $('#username_error').text('');
            }
            return flag;
        });
    });
    </script>
</body>

</html>