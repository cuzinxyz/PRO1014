<?php require_once 'views/admin/partials/header.php' ?>

<head>
    <link rel="stylesheet" href="./public/css/booking__offline.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
<div class="content-wrapper" style="min-height: 686px;">
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
                        <form method="POST" action="" class="card-body" style="background-color: #fff;">
                            <h3 class="service__off mt-3">Số điện thoại</h3>
                            <div class="input-group mb-4">
                                <input type="tel" maxlength="10" minlength="10" name="phone_number"
                                    class="form-control phone__off" placeholder="Enter phone number ...">
                                <div class="input-group-prepend">
                                    <button name="book" class="btn btn-danger">Book</button>
                                </div>
                                <!-- /btn-group -->
                            </div>
                            <h3 class="service__off mt-4">Service</h3>
                            <div class="row">
                                <?php foreach ($services as $service) : ?>
                                <label class="col-sm-3 service__item">
                                    <input type="checkbox" name="choose_service[]" value="<?= $service['id'] ?>"
                                        class="checkbox__input-checkbox input__book--off">
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
                            <h3 class="service__off mt-4">Combo</h3>
                            <div class="row">
                                <?php foreach ($combos as $combo) : ?>
                                <label class="col-sm-3 service__item">
                                    <input type="checkbox" name="choose_combo" value="<?= $combo['id'] ?>"
                                        class="checkbox__input-radio input__book--off">
                                    <div class="position-relative p-2 label--off combo_bg" style="height: 60px">
                                        <h5 class="name__service--off col-10"><?= $combo['comboname'] ?></h5>
                                        <p class="price__service--off">
                                            <?= number_format($combo['tongtien'], 0, '', '.'); ?>
                                            &#8363;</p>
                                    </div>
                                </label>
                                <!-- end item combo -->
                                <?php endforeach; ?>
                            </div>
                            <!-- /.card -->
                            <h3 class="service__off mt-4">Time</h3>
                            <div class="row p-3">
                                <input class="flatpickr flatpickr-input" type="text" placeholder="Select Date.." name="choose_date" data-id="minDateToday" readonly="readonly" id="date">
                            </div>
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
<script src="public/js/date-bookoff.js"></script>
'; 
?>

<?php require_once 'views/admin/partials/footer.php' ?>