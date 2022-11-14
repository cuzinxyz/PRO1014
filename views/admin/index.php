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
                    <?php if (isset($_GET['detail'])) : ?>
                    <!-- Detail Page Begin -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Chi tiết hóa đơn khách hàng: <i class="nav-icon fas fa-user"></i>
                                <strong><em><?= $detail_receipt[0]['NguoiDat'] ?></em></strong>
                            </h3>
                            <div class="card-tools">
                                <a href="/?action=receipt">
                                    <button type="button" class="btn btn-block btn-primary btn-xs">Back</button>
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Service</th>
                                        <th>Employee</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($detail_receipt as $detail) : ?>
                                    <tr>
                                        <td><?= $detail['id'] ?></td>
                                        <td><?= $detail['DichVu'] ?></td>
                                        <td><?= $detail['NguoiLam'] ?></td>
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
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- Detail Page End -->
                    <?php else : ?>
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
                                        <th></th>
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
                                        <td>
                                            <a href="/?action=receipt&detail=<?= $receipt['MaHoaDon'] ?>">
                                                <button type="button"
                                                    class="btn btn-block btn-primary btn-xs">View</button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <?php endif; ?>
                </div>
            </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    
<?php
  $script = "
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
  ";
?>
    
<?php  require_once 'views/admin/partials/footer.php' ?>