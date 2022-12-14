<?php require_once 'views/admin/partials/header.php' ?>

<head>
  <link rel="stylesheet" href="./public/css/booking__offline.css">
</head>
<div class="content-wrapper" style="min-height: 686px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thêm dịch vụ cho đơn hàng: 0987654321</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Booking</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Booking</h3>
            </div>
            <!-- /.card-header -->
            <form method="POST" action="" class="card-body" style="background-color: #fff;">
              <h3 class="service__off mt-4">Service</h3>
              <div class="row">
                <?php foreach ($services as $service) : ?>
                  <label class="col-sm-3 service__item">
                    <input type="checkbox" name="choose_service[]" value="<?= $service['id'] ?>" class="checkbox__input-checkbox input__book--off">
                    <div class="position-relative p-2 label--off service_bg" style="height: 60px">
                      <h5 class="name__service--off"><?= $service['name'] ?></h5>
                      <p class="price__service--off">
                        <?= number_format($service['price'], 0, '', '.'); ?>
                        &#8363;</p>
                    </div>
                  </label>
                  <!-- end item service -->
                <?php endforeach; ?>
              </div>
              <button name="book" class="btn btn-primary">Book</button>
              <!-- /.card -->
            </form>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?php
$script = '
<script src="public/js/booking-off.js"></script>
';
?>
<script>
  const randomColor = "#" + ((1 << 24) * Math.random() | 0).toString(16);
  document.documentElement.style.setProperty('--main-bg-color', randomColor);
</script>
<?php require_once 'views/admin/partials/footer.php' ?>