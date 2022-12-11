<?php require_once 'views/admin/partials/header.php' ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employees</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <a href="/?action=addemployee">
                        <button type="button" class="btn btn-block btn-primary btn-sm">Thêm nhân viên</button>
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách nhân viên</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
        <?php if(isset($_GET['success'])) : ?>
                            <div class="alert alert-info alert-dismissible">
                                <h5><i class="icon fas fa-info"></i> Tạo tài khoản thành công!</h5>
                                Mật khẩu mặc định là: <h3 style="display: inline;color: #000">123456</h3>
                            </div>
        <?php endif; ?>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên nhân viên</th>
                                        <th>Ảnh nhân viên</th>
                                        <th>Lương</th>
                                        <th>Trạng thái</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($values as $key => $value) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value['name'] ?></td>
                                        <td>
                                            <img src="./public/images/employee/<?= $value['image'] ?>" alt=""
                                                style="max-width: 200px;object-fit:cover;">
                                        </td>
                                        <td><?= number_format($value['salary'], 0, '', ',') ?></td>
                                        <td><?= $value['status'] == 1 ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-danger'>Inactive</span>" ?>
                                        </td>
                                        <td>
                                            <a href="?action=edit_employee&id=<?= $value['id'] ?>"
                                                style="margin: 0 20px 0 0; color: green;"><i
                                                    class="fas fa-edit"></i></a>
                                            <!-- <a href="?action=edit_employee&id=<?= $value['id'] ?>"><i class="fas fa-trash" style="color: red;"></i></a> -->
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php require_once 'views/admin/partials/footer.php' ?>