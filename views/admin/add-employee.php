<?php require_once 'views/admin/partials/header.php'; ?>

<div class="content-wrapper" style="min-height: 1345.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm nhân viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Employee</li>
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
                        <div class="card-header">
                            <h3 class="card-title">Quick Add Employee</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" required placeholder="Enter name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" required placeholder="Enter email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lương</label>
                                    <input type="number" required class="form-control" id="exampleInputEmail1" placeholder="Enter salary" name="salary">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Image upload</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" required class="custom-file-input" id="exampleInputFile" name="avatar">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" id="submit" class="btn btn-primary" name="add">Add</button>
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
<?php  
$script = '
<script>
    $("#submit").on("click",function(){
        if (($("input[name=name]").val()) == "" || ($("input[name=email]").val()) == "" || ($("input[name=salary]").val()) == "") {
            alert("Bạn cần điền đủ thông tin.");
            return false;
        }
        return true;
      })
</script>
';
?>

<?php require_once 'views/admin/partials/footer.php' ?>