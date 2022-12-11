<?php require_once 'views/admin/partials/header.php'; ?>

<div class="content-wrapper" style="min-height: 1345.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa nhân viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Update Employee</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">

                                <div class="tt">
                                    <input type="hidden" name="id" value=<?php if (isset($id) && ($id > 0)) echo $id; ?>>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên nhân viên</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title blog" name="name" value="<?= isset($_GET['id']) ? $value['name'] : "" ?>" required>
                                </div>
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?= isset($_GET['id']) ? $value['email'] : "" ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="password" placeholder="Nhập mật khẩu mới">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hình ảnh</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    <img src="./public/images/employee/<?= isset($value['image']) ? $value['image'] : "" ?>" alt="" width="200" height="200" style="object-fit: cover">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lương</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" value="<?= isset($_GET['id']) ? $value['salary'] : "" ?>" placeholder="Enter salary" name="salary" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trạng thái</label>
                                    <select name="status" id="exampleInputEmail1" class="form-control">
                                        <option value="1" <?php if ($value['status'] == 1) {
                                                                echo ' selected';
                                                            } ?>>Đang làm việc</option>
                                        <option value="0" <?php if ($value['status'] == 0) {
                                                                echo ' selected';
                                                            } ?>>Đã nghỉ việc</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Công việc</label>
                                    <select multiple="" name="role" class="form-control">
                                        <option value="" <?= ($value['role'] == NULL) ? ' selected' : '' ?>>Nhân Viên</option>
                                        <option value="admin" <?= ($value['role'] == 'admin') ? ' selected' : '' ?>>Admin</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
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
<?php require_once 'views/admin/partials/footer.php'; ?>