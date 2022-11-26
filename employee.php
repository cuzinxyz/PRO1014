<?php
require "models/admin.php";
if (!isset($_SESSION['role'])) {
    header("location: /");
}
$employeeID = (int)$_SESSION['id'];
$employee = query("SELECT * FROM `employee` WHERE `id` = $employeeID");

$receipts = query("SELECT DISTINCT users.phone_number, orders.time, orders.id  FROM `orders` 
JOIN `orders_detail` ON orders.id = orders_detail.order_id 
JOIN `users` ON orders.user_id = users.id
WHERE orders_detail.employee_id = $employeeID
ORDER BY orders.time DESC");

if (isset($_GET['detail'])) {
    # $_GET detail url
    $id_receipt = $_GET['detail'];
    # Lấy 1 hóa đơn dựa vào detail url.
    $detail_receipt = one_receipt($id_receipt);
}
# số lượng đơn hàng của user
$quantity = count($receipts);
# trung bình cộng vote
$vote = query("SELECT AVG(star) as vote FROM `feedback` JOIN `orders_detail` ON feedback.order_id = orders_detail.order_id WHERE employee_id = $employeeID");

if (isset($_POST['startCut'])) {
    $id_receipt = (int) $_GET['detail'];
    startCut($id_receipt);
    header("location: /employee.php?detail=$id_receipt");
} elseif (isset($_POST['finished'])) {
    $id_receipt = (int) $_GET['detail'];
    finished($id_receipt);
    header("location: /employee.php?detail=$id_receipt");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</head>

<body>
    <section class="content container my-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    style="object-fit: cover; width: 100px; height: 120px;"
                                    src="public/images/employee/<?= $employee[0]['image'] ?>"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= $employee[0]['name'] ?></h3>

                            <p class="text-muted text-center">Employee</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">

                                    <b>Đánh giá</b> <a class="float-right"><?= $vote[0]["vote"] ?><i
                                            class="fas fa-star"></i></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Tổng lượt đặt</b> <a class="float-right"><?= $quantity ?></a>

                                </li>
                                <!-- <li class="list-group-item">
                  <b>Friends</b> <a class="float-right">13,287</a>
                </li> -->
                            </ul>

                            <a href="/logout.php" class="btn btn-primary btn-block"><b>Đăng Xuất</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Hóa đơn của bạn.</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Phone number</th>
                                        <!-- <th>Task</th> -->
                                        <th>Time</th>
                                        <th style="width: 40px">Label</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($receipts as $key => $receipt) : ?>
                                    <tr>
                                        <td><?= ++$key ?></td>
                                        <td><?= $receipt['phone_number'] ?></td>
                                        <!-- <td>Update software</td> -->
                                        <td>
                                            <?= $receipt['time'] ?>
                                        </td>
                                        <td>
                                            <a href="/employee.php?detail=<?= $receipt['id'] ?>"><button
                                                    class="badge bg-success" style="border: none;">Detail</button></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->
                    <?php
                    if (isset($_GET['detail'])) :
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Chi tiết hóa đơn khách hàng: <i class="nav-icon fas fa-user"></i>
                                <strong><em><?= $detail_receipt[0]['NguoiDat'] ?></em></strong>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Service</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($detail_receipt as $detail) : ?>
                                    <tr>
                                        <td><?= $detail['id'] ?></td>
                                        <td><?= $detail['DichVu'] ?></td>
                                        <td><?= number_format($detail['price'], 0, '', ',') ?></td>
                                        <td>
                                            <?php
                                                    if ($detail['TrangThai'] == 0) {
                                                        $today = date("Y-m-d H:i:s");
                                                        if ($detail['time'] < $today) {
                                                            echo '<span class="badge bg-danger">Cancel</span>';
                                                        } else {
                                                            echo '<span class="badge bg-warning">Waiting</span>';
                                                        }
                                                    } else if ($detail['TrangThai'] == 1) {
                                                        echo '<span class="badge bg-primary">In process</span>';
                                                    } else if ($detail['TrangThai'] == 2) {
                                                        echo '<span class="badge bg-success">Done</span>';
                                                    } else {
                                                        $today = date("Y-m-d H:i:s");
                                                        if ($detail['time'] < $today) {
                                                            echo '<span class="badge bg-danger">Cancel</span>';
                                                        }
                                                    }
                                                    ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <form action="" method="POST">
                                <?php
                                    if ($detail['TrangThai'] == 0) {
                                    ?>
                                <button type="submit" name="startCut" class="btn btn-block btn-success btn-sm">Bắt đầu
                                    cắt</button>
                                <?php } elseif ($detail['TrangThai'] == 1) { ?>
                                <button type="submit" name="finished" class="btn btn-block btn-success btn-sm">Hoàn
                                    thành</button>
                                <?php } else {
                                        echo '<div class="direct-chat-text">
                      Hóa đơn này của bạn đã xong!
                    </div>';
                                    }
                                    ?>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
</body>

</html>