<?php require_once 'views/admin/partials/header.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách hóa đơn.</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tel</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($all_receipts as $key => $receipt) : ?>
                                    <tr>
                                        <td><?= $receipt['MaHoaDon'] ?></td>
                                        <td><?= $receipt['phone_number'] ?></td>
                                        <td><?= $receipt['time'] ?></td>
                                        <td>
                                            <?php
                                                if ($receipt['TrangThai'] == 0) {
                                                    // echo '<span class="badge bg-warning">Waiting</span>';
                                                    $today = date("Y-m-d H:i:s");
                                                    if ($receipt['time'] < $today) {
                                                        echo '<span class="badge bg-danger">Cancel</span>';
                                                    } else {
                                                        echo '<span class="badge bg-warning">Waiting</span>';
                                                    }
                                                } else if ($receipt['TrangThai'] == 1) {
                                                    echo '<span class="badge bg-primary">In process</span>';
                                                } else if ($receipt['TrangThai'] == 2) {
                                                    echo '<span class="badge bg-success">Done</span>';
                                                } else {
                                                    $today = date("Y-m-d H:i:s");
                                                    if ($receipt['time'] < $today) {
                                                        echo '<span class="badge bg-danger">Cancel</span>';
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
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php require_once 'views/admin/partials/footer.php' ?>