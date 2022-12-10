<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bruno Barber | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="public/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="public/admin/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/admin/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="public/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="public/admin/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="public/admin/plugins/summernote/summernote-bs4.min.css">
    <!--    custom css-->
    <link rel="stylesheet" href="public/css/custom.css">

    <link rel="stylesheet" href="public/css/booking.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="public/css/flatpickr.min.css">
    <link rel="stylesheet" href="public/css/toastify.min.css">
    <style>
        .logo_bg {
            background: #000;
            padding: 10px 30px;
            border-radius: 60px;
            margin: 30px 0;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <a href="/"><img src="public/images/logo.png" class="logo_bg" alt=""></a>
        </div>
        
        <div class="container">
        <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa thông tin</h1>
                </div>
            </div>
            <div class="row">
                <!-- left column -->
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="" method="POST" enctype="multipart/form-data">
        <?php 
        if(isset($_SESSION['role'])) :
        ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" disabled class="form-control form-control-border" id="exampleInputEmail1" value="<?= isset($employee[0]['email']) ? $employee[0]['email'] : "" ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="new_password" placeholder="Nhập mật khẩu mới">
                                </div>
                                <a href="/employee.php">
                                    <button type="button" class="btn btn-warning float-right" name="edit_employee">Quay lại</button>
                                </a>
                            </div>
        <?php else: ?>
                            <div class="card-body">
                                <div class="tt">
                                    <input type="hidden" name="id" value=<?php if (isset($_SESSION['id']) && ($_SESSION['id']  > 0)) echo $_SESSION['id'] ; ?>>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập số điện thoại mới" name="phone_number" value="<?= isset($user['phone_number']) ? $user['phone_number'] : "" ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="password" placeholder="Nhập mật khẩu mới">
                                </div>
                            </div>
        <?php endif; ?>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="edit_employee">Thay đổi</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>