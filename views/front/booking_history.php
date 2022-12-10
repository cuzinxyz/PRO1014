<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử cắt tóc của bạn | BrunoBarber</title>
    <link rel="icon" type="image/x-icon" href="public/images/favicon.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
    <style>
        .logo_bg {
        background: #000;
        padding: 10px 30px;
        border-radius: 60px;
        margin: 30px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="/"><img src="public/images/logo.png" class="logo_bg" alt=""></a>
    </div>
    <div class="container">
        <form action="/?action=booking_history" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nhập số điện thoại của bạn để xem lịch sử</label>
                    <input type="text" autofocus class="form-control" id="exampleInputEmail1" placeholder="Enter phone number" name="phone_number" required>
                </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="btn">Xem</button>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="row">
        <div class="col-12">

            <!-- Main content -->
            <div class="invoice p-3 mb-3" style="margin-top:32px">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                <h4>
                    <i class="fas fa-globe"></i> Lịch sử cắt
                    <small class="float-right">User: <b><?= isset($phone) ? $phone : '' ?></b></small>
                </h4>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($listOrder)) : ?>
                        <?php foreach ($listOrder as $key => $order) : ?>
                            <tr>
                            <td>1</td>
                            <td><?= $order['time'] ?></td>
                            <td>
        <?php
            if ($order['status'] == 0) {
            // tính thời gian quá 1h sẽ Cancel hóa đơn.
            $CalcTimeDeadline = strtotime($order['time']) + 3600;
            $deadline = date("Y-m-d H:i:s", $CalcTimeDeadline);
            $today = date("Y-m-d H:i:s");
            if ($deadline < $today) {
                echo '<span class="badge bg-danger">Đã Hủy</span>';
            } else {
                echo '<span class="badge bg-warning">Chờ xác nhận</span>';
            }
            } else if ($order['status'] == 1) {
            echo '<span class="badge bg-primary">Đang cắt</span>';
            } else if ($order['status'] == 2) {
            echo '<span class="badge bg-success">Hoàn thành</span>';
            } else if ($order['status'] == 3) {
                echo '<span class="badge bg-danger">Đơn bị hủy</span>';
            } else if ($order['status'] == 4) {
                echo '<span class="badge bg-dark">Đã Xác Nhận</span>';
            } else {
                // tính thời gian quá 1h sẽ Cancel hóa đơn.
                $CalcTimeDeadline = strtotime($order['time']) + 3600;
                $deadline = date("Y-m-d H:i:s", $CalcTimeDeadline);
                $today = date("Y-m-d H:i:s");
                if ($deadline < $today) {
                    echo '<span class="badge bg-danger">Đã Hủy</span>';
                }
            }
        ?>
                            </td>
                            <td> 
                                <a href="/?action=booking_history&detail=<?= $order['id'] ?>"><button class="badge bg-success" style="border: none;">Xem Chi Tiết</button></a>
        <?php if($order['status'] == 0) : ?>
                                <a href="/?action=booking_history&delete=<?= $order['id'] ?>" onclick="return confirm('Bạn có chắc muốn hủy?')">
                                    <button class="badge bg-primary" style="border: none;">Hủy lịch</button>
                                </a>
        <?php endif; ?>
                            </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            </div>
            <!-- /.invoice -->
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <?php
    if (isset($_GET['detail'])) :
    ?>
        <div class="card container">
        <div class="card-header">
            <h3 class="card-title">Chi tiết hóa đơn khách hàng ngày:
            <strong><em><?= $detail_receipt[0]['time'] ?></em></strong>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                <th>Service</th>
                <th>Price</th>
                <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detail_receipt as $detail) : ?>
                <tr>
                    <td><?= $detail['DichVu'] ?></td>
                    <td><?= number_format($detail['price'], 0, '', ',') ?></td>
                    <td>
    <?php
    if ($detail['TrangThai'] == 0) {
        // tính thời gian quá 1h sẽ Cancel hóa đơn.
        $CalcTimeDeadline = strtotime($detail['time']) + 3600;
        $deadline = date("Y-m-d H:i:s", $CalcTimeDeadline);
        $today = date("Y-m-d H:i:s");
        if ($deadline < $today) {
            echo '<span class="badge bg-danger">Đã Hủy</span>';
        } else {
            echo '<span class="badge bg-warning">Chờ Xác Nhận</span>';
        }
    } else if ($detail['TrangThai'] == 1) {
        echo '<span class="badge bg-primary">Đang cắt</span>';
    } else if ($detail['TrangThai'] == 2) {
        echo '<span class="badge bg-success">Hoàn Thành</span>';
    } else if ($detail['TrangThai'] == 3) {
        echo '<span class="badge bg-danger">Đơn bị hủy</span>';
    } else if ($detail['TrangThai'] == 4) {
        echo '<span class="badge bg-dark">Đã Xác Nhận</span>';
    } else {
        // tính thời gian quá 1h sẽ Cancel hóa đơn.
        $CalcTimeDeadline = strtotime($detail['time']) + 3600;
        $deadline = date("Y-m-d H:i:s", $CalcTimeDeadline);
        $today = date("Y-m-d H:i:s");
        if ($deadline < $today) {
            echo '<span class="badge bg-danger">Đã Hủy</span>';
        }
    }
    ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        </div>
    <?php endif; ?>

</body>

</html>