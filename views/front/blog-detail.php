<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bruno's Baber</title>
    <link rel="icon" type="image/x-icon" href="public/images/favicon.png">
    <!-- CSS CUSTOM -->
    <link rel="stylesheet" href="public/css/main.css">
    <!-- CSS FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <nav class="container">
            <img onclick="window.location.href='/'" class="nav_logo" src="public/images/logo.png" alt="">
            <div class="menu">
                <a href="#" class="active">home</a>
                <a href="#">who we are</a>
                <a href="#">contact us</a>
                <a href="#">book now</a>
            </div>
            <div class="nav_socials">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </nav>
    </header>
    <main>
        <div class="blog_detail">
            <div class="blog_container container">
                <div style="text-align:center;margin-bottom:50px;">
                    <p class="blog_date">
                        <?= date("F jS Y", strtotime($blog['0']['createdAt'])) ?>
                    </p>
                    <h1 class="blog_title">
                        <?= $blog['0']['title']; ?>
                    </h1>
                </div>
                <img class="blog_thumbnail" src="public/images/image__blog/<?= $blog['0']['image'] ?>" alt="">
                <div class="blog_content">
                    <div style="font-family: roboto;"><?= $blog['0']['content'] ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <img src="public/images/logo.png" alt="" class="footer_logo">
            <p class="footer_address">1501 West Tower, Philippine Stock Exchange Centre, Exchange Road, Ortigas Center,
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
</body>

</html>