<?php require_once "views/admin/partials/header.php" ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm dịch vụ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add service</li>
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
                        <form action="" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nameService">Tên dịch vụ</label>
                                    <input type="text" class="form-control" id="nameService" placeholder="Tên dịch vụ" name="nameService" required>
                                </div>
                                <div class="form-group">
                                    <label for="priceService">Giá dịch vụ</label>
                                    <input type="number" class="form-control" id="priceService" min="0" placeholder="Giá dịch vụ" name="priceService" required>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" id="submit" class="btn btn-primary" name="add">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<?php
$script = '
<script>
$(function() {
    bsCustomFileInput.init();
});

$("#submit").on("click",function(){
  if (($("input[name=nameService]").val()) == "" || ($("input[name=priceService]").val()) == "") {
      alert("Bạn cần điền đủ thông tin.");
      return false;
  }
  return true;
})

</script>
';
?>

<?php require_once "views/admin/partials/footer.php" ?>