<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="public/css/booking.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="public/css/flatpickr.min.css">
    <link rel="stylesheet" href="public/css/toastify.min.css">
</head>

<body>
    <div class="container">
        <div class="booking--wrap">
            <h2 class="request">Đặt lịch giữ chỗ</h2>
            <form action="" method="post" id="bookapp">

                <?php  
                if(empty($userDetail[0]['password'])) :
                ?>
                <!-- Form nhap mat khau  -->
                <div id="myModal" class="modal">
                <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <p>Tạo tài khoản để sử dụng thêm các tính năng khác.</p>
                            <span class="close">&times;</span>
                        </div>
                        <div class="modal-body container">
                            <input type="password" autofocus id="password" placeholder="Nhập mật khẩu" class="input_password" name="password_register">
                            <input type="password" id="confirm_password" placeholder="Nhập lại mật khẩu" class="input_password" name="password_confirm" style="margin-top: 10px;">
                            <span id='message'></span>
                            <br>
                            <input class="button_register" type="button" id="done" value="Hoàn thành" />
                        </div>
                    </div>
                </div>
                <!-- End form nhap mat khau  -->
                <?php
                endif;
                ?>

                <div class="grid display-block">
                    <div class="selection">
                        <div class="select--wrap">
                            <a href="#list__service"><button class="menu_active">Services</button></a>
                            <a href="#list__combo"><button class="button__select">Combo</button></a>
                            <a href="#list__stylist"><button class="button__select">Stylists</button></a>
                            <a href="#select__time"><button class="button__select">Time</button></a>
                        </div>
                        <!-- phone number -->

                        <!-- lay user id do vao input, neu khong co thi chuyen huong sang index -->
                        <input type="text" name="user_id"
                            value="<?= isset($_SESSION['user_id']) ? $_SESSION['user_id'] : (isset($_SESSION['id']) ? $_SESSION['id'] : header("location: /")) ?>"
                            id="" hidden>
                        <h2 class="name__option" id="list__service">
                            Services
                        </h2>
                        <!-- start list service -->
                        <div class="list__services">
                            <?php foreach ($services as $service) : ?>
                            <!-- start service item -->
                            <div class="service__item">
                                <label class="checkbox__label">
                                    <div class="checkbox__custom">
                                        <input class="checkbox__input checkbox__input-checkbox" name="choose_service[]"
                                            value="<?= $service['id'] ?>" type="checkbox">
                                        <span class="checkmark"><i class="fa-solid fa-check"></i></span>
                                    </div>
                                    <div class="service__content">
                                        <div class="name-price">
                                            <p class="name__service"><?= $service['name'] ?></p>
                                            <p class="price__service">
                                                <?= number_format($service['price'], 0, '', ','); ?>
                                                &#8363;</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <!-- end service item -->
                            <?php endforeach; ?>
                        </div>
                        <div class="nofication">
                            <label for="services" class="error"></label>
                        </div>
                        <!-- end list service -->
                        <h2 class="name__option" id="list__combo">
                            Combo
                        </h2>
                        <!-- start combo -->
                        <div class="list__services">
                            <?php
                            foreach ($combos as $key => $combo) :
                            ?>
                            <div class="service__item">
                                <label class="checkbox__label checkbox__label-combo">
                                    <div class="checkbox__custom">
                                        <input class="checkbox__input checkbox__input-radio" name="choose_combo"
                                            value="<?= $combo['id'] ?>" type="checkbox">
                                        <span class="checkmark"><i class="fa-solid fa-check"></i></span>
                                    </div>
                                    <div class="service__content">
                                        <div class="name-price">
                                            <p class="name__service"><?= $combo['comboname'] ?></p>
                                            <p class="price__service">
                                                <?= number_format($combo['tongtien'], 0, '', ','); ?>
                                                &#8363;
                                            </p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <?php endforeach;
                            ?>
                        </div>
                        <div class="nofication">
                            <label for="combo" class="error"></label>
                        </div>
                        <!-- end combo -->

                        <h2 class="name__option">
                            Choose day
                        </h2>
                        <!-- start list date -->
                        <div class="date--wrap">
                            <input class="flatpickr flatpickr-input" type="text" placeholder="Select Date.." 
                                name="choose_date" data-id="minDateToday" readonly="readonly" id="date">
                        </div>
                        <!-- end list date -->

                        <h2 class="name__option" id="time">
                            Time
                        </h2>
                        <!-- start select time -->
                        <div class="time--wrap" id="list_time">
                            <?php foreach ($work_time as $time) : ?>
                            <?php
                                $currentTime = strtotime((new DateTime())->format("Y-m-d H:i:s"));
                                $checkTime = strtotime($time['time']);
                                ?>
                            <label class="time__item">
                                <input class="time__input" type="radio" value="<?= $time['time'] ?>" name="choose_time"
                                     <?= ($currentTime > $checkTime) ? " disabled" : "" ?>>
                                <span
                                    class="time__checked <?= ($currentTime > $checkTime) ? " unavailable" : "" ?>"><?= date("H:i", strtotime($time['time'])) ?></span>
                            </label>
                            <?php endforeach; ?>
                            <!-- end time item -->
                        </div>

                        <h2 class="name__option" id="list__stylist">
                            Stylists
                        </h2>
                        <div class="list__stylists" id="list_stylist">
                            <p>Vui lòng chọn ngày giờ!</p>
                        </div>
                        <!-- end list styelist -->

                        <div class="btn-order">
                            <input type="submit" name="book_now" id="book" value="ĐẶT LỊCH NGAY">
                        </div>
                    </div>

                    <!-- end selection -->
                    <div class="receipt">
                        <div class="avatar__store display-none">
                            <img src="https://i.pravatar.cc/300" alt="">
                        </div>
                        <div class="detail__store display-none">
                            <div class="name__store">
                                <?= isset($_SESSION['phone_number']) ? $_SESSION['phone_number'] : 'Guest' ?>
                            </div>
                            <div class="address__store">
                                <p class="logo-text">BrunoBarber</p> Xin kính chào quý khách.
                            </div>
                        </div>
                        <div class="main__receipt--wrap display-none">
                        </div>
                        <div class="total">
                        </div>
                        <div class="rim--wrap">
                            <div class="rim"></div>
                        </div>
                        <div class="rim__end"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="public/js/jquery-3.6.1.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> -->
    <script src="public/js/flatpickr.js"></script>
    <script src="public/js/toastify-js.js"></script>
    <script src="public/js/book.js"></script>
    <script src="public/js/date.js"></script>
    <script src="public/js/ajax.js"></script>
    <script src="public/js/validate.js"></script>

    <script>
        var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];
        var btnDone = document.getElementById("done");
        function openPopup() {
        modal.style.display = "block";
        }
        openPopup();
        span.onclick = function() {
            modal.style.display = "none";
        }
        btnDone.onclick = function() {
            modal.style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        $('#password, #confirm_password').on('keyup', function () {
            if($('#password').val() != '' || $('#confirm_password').val()) {
                if ($('#password').val() == $('#confirm_password').val()) {
                    $('#message').html('Mật khẩu trùng nhau &#9989;').css('color', 'green');
                    $("#done").prop( "disabled", false );
                    $("#done").removeClass("disabled");
                } else {
                    $("#done").addClass("disabled");
                    $("#done").prop( "disabled", true );
                    $('#message').html('Mật khẩu phải trùng nhau &#10060;').css('color', 'red');
                }
            }
        });
    </script>
</body>

</html>