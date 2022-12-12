<?php require_once "views/admin/partials/header.php" ?>

<div class="content-wrapper" style="min-height: 351.036px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Danh sách phản hồi.</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Receipt</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Detail Page Begin -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách phản hồi.</h3>
                            <a onclick="window.location.reload()" class="btn_refresh">Refresh</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Khách Hàng</th>
                                    <th>Mã Hóa Đơn</th>
                                    <th>Nội dung</th>
                                    <th>Đánh giá</th>
                                </tr>
                                </thead>
                                <tbody>
<?php foreach($feedback as $key=>$feedbackItem) : ?>
                                    <tr>
                                        <td><?= $key++ ?></td>
                                        <td><?= $feedbackItem['phone_number'] ?></td>
                                        <td><?= $feedbackItem['order_id'] ?></td>
                                        <td><?= $feedbackItem['note'] ?></td>
                                        <td><?= $feedbackItem['star'] ?><i class="fa-solid fa-star"></i></td>
                                    </tr>
<?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                                    </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php require_once "views/admin/partials/footer.php" ?>
