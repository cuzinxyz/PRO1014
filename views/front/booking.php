<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="public/css/booking.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>
    <div class="container">
        <div class="booking--wrap">
            <h2 class="request">Đặt lịch giữ chỗ</h2>
            <div class="grid display-block">
                <div class="selection">
                    <div class="select--wrap">
                        <a href="#list__service"><button class="menu_active">Services</button></a>
                        <a href="#list__combo"><button class="button__select">Combo</button></a>
                        <a href="#list__stylist"><button class="button__select">Stylists</button></a>
                        <a href="#select__time"><button class="button__select">Time</button></a>
                    </div>
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
                                    <input class="checkbox__input checkbox__input-checkbox" name="check__input"
                                        type="checkbox">
                                    <span class="checkmark"><i class="fa-solid fa-check"></i></span>
                                </div>
                                <div class="service__content">
                                    <div class="name-price">
                                        <p class="name__service"><?= $service['name'] ?></p>
                                        <p class="price__service"><?= number_format($service['price'], 0, '', ','); ?>
                                            &#8363;</p>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <!-- end service item -->
                        <?php endforeach; ?>
                    </div>
                    <!-- end list service -->
                    <h2 class="name__option" id="list__combo">
                        Combo
                    </h2>
                    <!-- start combo -->
                    <div class="list__services">
                        <?php foreach ($combos as $combo) : ?>
                        <div class="service__item">
                            <label class="checkbox__label checkbox__label-combo">
                                <div class="checkbox__custom">
                                    <input class="checkbox__input checkbox__input-radio" name="check__input"
                                        type="checkbox">
                                    <span class="checkmark"><i class="fa-solid fa-check"></i></span>
                                </div>
                                <div class="service__content">
                                    <div class="name-price">
                                        <p class="name__service"><?= $combo['name'] ?></p>
                                        <p class="price__service"><?= number_format($combo['price'], 0, '', ','); ?>
                                            &#8363;</p>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- end combo -->
                    <h2 class="name__option" id="list__stylist">
                        Stylists
                    </h2>
                    <div class="list__stylists">
                        <div class="stylist__item">
                            <label class="checkbox__label">
                                <div class="checkbox__custom">
                                    <input class="checkbox__input" name="check__input" type="checkbox">
                                    <span class="checkmark"><i class="fa-solid fa-check"></i></span>
                                </div>
                                <div class="service__content">
                                    <div class="infor__stylist">
                                        <img src="https://xsgames.co/randomusers/avatar.php?g=male" alt=""
                                            class="avatar__stylist">
                                        <p class="name__stylist">Stylist 1</p>
                                        <a href="" class="detail__stylist">
                                            Review: 4.5/5 <i class="fa-regular fa-star"></i>
                                        </a>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <!-- end stylist item -->
                    </div>
                    <!-- end list styelist -->

                    <h2 class="name__option">
                        Choose day
                    </h2>
                    <!-- start list date -->
                    <div class="date--wrap">
                        <input class="flatpickr flatpickr-input" type="text" placeholder="Select Date.."
                            data-id="minDateToday" readonly="readonly" id="date">
                    </div>
                    <!-- end list date -->

                    <h2 class="name__option" id="time">
                        Time
                    </h2>
                    <!-- start select time -->
                    <div class="time--wrap">
                        <label class="time__item">
                            <input class="time__input" type="radio" name="time" id="">
                            <span class="time__checked">7:00</span>
                        </label>
                        <!-- end time item -->
                        <label class="time__item">
                            <input class="time__input" type="radio" name="time" id="">
                            <span class="time__checked">7:00</span>
                        </label>
                        <!-- end time item -->
                        <label class="time__item">
                            <input class="time__input" type="radio" name="time" id="">
                            <span class="time__checked">7:00</span>
                        </label>
                        <!-- end time item -->
                        <label class="time__item">
                            <input class="time__input" type="radio" name="time" id="">
                            <span class="time__checked">7:00</span>
                        </label>
                        <!-- end time item -->
                        <label class="time__item">
                            <input class="time__input" type="radio" name="time" id="">
                            <span class="time__checked">7:00</span>
                        </label>
                        <!-- end time item -->
                        <label class="time__item">
                            <input class="time__input" type="radio" name="time" id="">
                            <span class="time__checked">7:00</span>
                        </label>
                        <!-- end time item -->
                        <label class="time__item">
                            <input class="time__input" type="radio" name="time" id="">
                            <span class="time__checked">7:00</span>
                        </label>
                        <!-- end time item -->
                        <label class="time__item">
                            <input class="time__input" type="radio" name="time" id="">
                            <span class="time__checked">7:00</span>
                        </label>
                        <!-- end time item -->
                        <label class="time__item">
                            <input class="time__input" type="radio" name="time" id="">
                            <span class="time__checked">7:00</span>
                        </label>
                        <!-- end time item -->
                        <label class="time__item">
                            <input class="time__input" type="radio" name="time" id="">
                            <span class="time__checked">7:00</span>
                        </label>
                        <!-- end time item -->
                        <label class="time__item">
                            <input class="time__input" type="radio" name="time" id="">
                            <span class="time__checked">7:00</span>
                        </label>
                        <!-- end time item -->
                        <label class="time__item">
                            <input class="time__input" type="radio" name="time" id="">
                            <span class="time__checked">7:00</span>
                        </label>
                        <!-- end time item -->
                        <label class="time__item">
                            <input class="time__input" type="radio" name="time" id="">
                            <span class="time__checked">7:00</span>
                        </label>
                        <!-- end time item -->
                        <label class="time__item">
                            <input class="time__input" type="radio" name="time" id="">
                            <span class="time__checked">7:00</span>
                        </label>
                        <!-- end time item -->
                        <label class="time__item">
                            <input class="time__input" type="radio" name="time" id="">
                            <span class="time__checked">7:00</span>
                        </label>
                        <!-- end time item -->
                    </div>
                </div>
                <!-- end selection -->
                <div class="receipt">
                    <div class="avatar__store display-none">
                        <img src="https://i.pravatar.cc/300" alt="">
                    </div>
                    <div class="detail__store display-none">
                        <div class="name__store">
                            <?= isset($_SESSION['phone']) ? $_SESSION['phone'] : 'Guest' ?>
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
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="public/js/book.js"></script>
    <script src="public/js/date.js"></script>

</body>

</html>