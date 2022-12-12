<?php require_once 'views/admin/partials/header.php' ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách bài viết</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <a href="/?action=addblog">
                        <button type="button" class="btn btn-block btn-primary btn-sm">Thêm bài viết</button>
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
                            <h3 class="card-title">Danh sách bài viết</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên bài viết</th>
                                        <th>Hình ảnh</th>
                                        <th>Ngày tạo</th>
                                        <!-- <th>Conten</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($values as $key => $value) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value['title'] ?></td>
                                        <td>
                                            <img src="./public/images/image__blog/<?= $value['image'] ?>" alt=""
                                                style="max-width: 200px">
                                        </td>
                                        <td><?= $value['createdAt'] ?></td>
                                        <!--  -->
                                        <td>
                                            <a href="?action=edit_blog&id=<?= $value['id'] ?>"
                                                style="margin: 0 20px 0 0; color: green;"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="?action=delete_blog&id=<?= $value['id'] ?>"><i class="fas fa-trash"
                                                    style="color: red;"></i></a>
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