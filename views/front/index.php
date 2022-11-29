<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Bruno's Baber</title>
    <link rel="icon" type="image/x-icon" href="public/images/favicon.png">
    <!-- CSS CUSTOM -->
    <link rel="stylesheet" href="public/css/main.css">
    <!-- CSS FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <<<<<<< Updated upstream=======<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    >>>>>>> Stashed changes

</head>

<body>
    <!-- Popup nofication success  -->
    <div id="popup1" class="popup-container">
        <div class="popup-content">
            <a href="#" class="close">&times;</a>
            <h3>ĐẶT LỊCH THÀNH CÔNG! <span style="color: green;"><i style="font-size:50px;" class="fa-solid fa-check"></i></span>
            </h3>
            <p>Chúc bạn một ngày mới vui vẻ, hẹn gặp lại bạn. </p>
        </div>
    </div>

    <div class="container-fluid">
        <header>
            <nav class="container">
                <img onclick="window.location.href='/'" class="nav_logo" src="public/images/logo.png" alt="">
                <div class="menu">
                    <a href="#" class="active">home</a>
                    <a href="#">contact us</a>
                    <a href="#">book now</a>
                    <a href="/?action=register">đăng ký</a>
                    <?php if (isset($_SESSION['phone_number'])) {  ?>
                        <a href="/?action=login">đăng xuất</a>
                    <?php } else {  ?>
                        <a href="/?action=login">đăng nhập</a>
                    <?php } ?>
                </div>
                <div class="nav_socials">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </nav>
        </header>
        <main>
            <div class="banner">
                <div class="overlay_background"></div>
                <!-- <div class="container">
                    <h2 class="banner_title">More than just a haircut.</h2>
                    <span class="banner_desc">Come in, relax and walk out feeling like a new man.</span>
                    <div class="banner_buttons">
                        <a href="#" class="button">know more</a>
                        <a href="#" class="button">book now</a>
                    </div>
                </div> -->
                <div class="home__form-input">
                    <div class="form-input__slogan">
                        <div class="slogan__title">Đặt lịch giữ chỗ chỉ 30 giây</div>
                        <div class="slogan__text">Cắt xong trả tiền, hủy lịch không sao</div>
                    </div>
                    <div class="form-input__form flex">
                        <form action="/book" method="POST" style="width: 100%;">
                            <div class="form__input flex">
                                <input placeholder="Nhập SDT để đặt lịch" type="tel" class="my-input" value="" autofocus name="phone" maxlength="10">
                                <button type="submit" class="btn__action">ĐẶT LỊCH NGAY</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="list-services">
                <div class="service container">
                    <div class="service_detail">
                        <p class="service_detail-title">SERVICES</p>
                        <p class="service_detail-name">Upgrade your style.</p>
                        <p class="service_detail-desc">
                            Look and feel better from head to toe with our range of services. From haircuts to massages
                            and
                            overall grooming, treat yourself to a day at Bruno’s Barbers.
                        </p>
                        <a href="#" class="service_detail-btn">Book Now</a>
                    </div>
                    <img src="public/images/bruno-service-1.jpg" class="service_image" alt="">
                </div>
            </div>
            <div class="blog container">
                <p class="blog-title">Lastest News</p>
                <div class="list-posts">
                    <?php foreach ($blogs as $key => $blog) : ?>
                        <div class="post">
                            <img src="public/images/image__blog/<?= $blog['image'] ?>" alt="">
                            <p class="post_title"><?= $blog['title'] ?></p>
                            <p class="post_date"><?= date("F jS Y", strtotime($blog['createdAt'])) ?></p>
                            <<<<<<< Updated upstream <div class="post_desc"><?= $blog['content'] ?>
                        </div>
                        =======
                        >>>>>>> Stashed changes
                        <a href="/?action=blog_detail&id=<?= $blog['id'] ?>" class="post_readmore">Read more <i class="fa-solid fa-chevron-right"></i></a>
                </div>
            <?php endforeach; ?>
            </div>
    </div>
    <div class="instagram">
        <p class="instagram-title container">INSTAGRAM</p>
        <div class="instagram-list">
            <img src="public/images/insta-1.jpg" alt="">
            <img src="public/images/insta-2.jpg" alt="">
            <img src="public/images/insta-3.jpg" alt="">
            <img src="public/images/insta-4.jpg" alt="">
            <img src="public/images/insta-5.jpg" alt="">
            <img src="public/images/man-large.jpg" alt="">
            <img src="public/images/insta-1.jpg" alt="">
            <img src="public/images/insta-2.jpg" alt="">
            <img src="public/images/insta-3.jpg" alt="">
            <img src="public/images/insta-4.jpg" alt="">
            <img src="public/images/insta-5.jpg" alt="">
            <img src="public/images/man-large.jpg" alt="">
        </div>
    </div>
    </main>
    <footer>
        <div class="container">
            <img src="public/images/logo.png" alt="" class="footer_logo">
            <p class="footer_address">1501 West Tower, Philippine Stock Exchange Centre, Exchange Road, Ortigas
                Center,
                Pasig City, Philippines 1605.</p>
            <p class="footer_copyright">
                Copyright 2022 Bruno's Barbers | <a href="#">Terms & Conditions</a> | <a href="#">Privacy Policy</a>
            </p>
            <p class="footer_socials">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </p>
        </div>
    </footer>
    </div>

</body>

</html>