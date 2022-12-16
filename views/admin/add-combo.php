<?php require_once 'views/admin/partials/header.php'; ?>
<div class="content-wrapper" style="min-height: 1345.6px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thêm combo</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Thêm combo</li>
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
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="list__services">
                        <?php foreach ($values as $value) : ?>
                        <div class="service__item">
                            <label class="checkbox__label checkbox__label-combo">
                                <div class="checkbox__custom">
                                    <input class="checkbox__input" name="id_combo[]"
                                        value="<?= $value['id'] ?>" type="checkbox">
                                    <span class="checkmark"><i class="fa-solid fa-check"></i></span>
                                </div>
                                <div class="service__content">
                                    <div class="name-price">
                                        <p class="name__service"><?= $value['name'] ?></p>
                                        <p class="price__service"><?= number_format($value['price'], 0, '', ','); ?>
                                            &#8363;
                                        </p>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <?php endforeach; ?>
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
  if (($(".checkbox__input:checked").length)<=1) {
      alert("Bạn cần chọn dịch vụ để tạo combo");
      return false;
  }
  return true;
})
</script>
';
?>
<?php require_once 'views/admin/partials/footer.php'; ?>