<?php require_once 'views/admin/partials/header.php' ?>

<head>
  <link rel="stylesheet" href="./public/css/booking__offline.css">
</head>
<div class="content-wrapper" style="min-height: 1518.4px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Đặt lịch</h1>
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
            <form method="POST" enctype="multipart/form-data" class="card-body" style="background-color: #ccc;">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <button name="book" class="btn btn-danger">Book</button>
                </div>
                <!-- /btn-group -->
                <input type="text" class="form-control phone__off" placeholder="Enter phone number ...">
              </div>
              <h3 class="service__off">Service</h3>
              <div class="row">
                <?php foreach ($services as $service) : ?>
                  <label class="col-sm-3 service__item">
                    <input type="checkbox" name="" class="checkbox__input-checkbox input__book--off">
                    <div class="position-relative p-3 label--off" style="height: 150px">
                      <h5 class="name__service--off col-10"><?= $service['name'] ?></h5>
                      <p class="price__service--off"><?= number_format($service['price'], 0, '', '.'); ?>
                        &#8363;</p>
                    </div>
                  </label>
                  <!-- end item service -->
                <?php endforeach; ?>
              </div>
              <h3 class="service__off">Combo</h3>
              <div class="row">
                <?php foreach ($combos as $combo) : ?>
                  <label class="col-sm-3 service__item">
                    <input type="checkbox" name="" class="checkbox__input-radio input__book--off">
                    <div class="position-relative p-3 label--off" style="height: 150px">
                      <h5 class="name__service--off col-10"><?= $combo['name'] ?></h5>
                      <p class="price__service--off"><?= number_format($combo['price'], 0, '', '.'); ?>
                        &#8363;</p>
                    </div>
                  </label>
                  <!-- end item combo -->
                <?php endforeach; ?>
              </div>
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
<?php $script = '<script src="public/js/booking-off.js"></script>'; ?>
<?php require_once 'views/admin/partials/footer.php' ?>