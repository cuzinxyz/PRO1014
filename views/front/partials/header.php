<header>
    <nav class="container">
        <img onclick="window.location.href='/'" class="nav_logo" src="public/images/logo.png" alt="">
        <div class="menu">
            <a href="/" class="active">home</a>
            <a href="/#booknow">book now</a>
            <a href="/?action=register">đăng ký</a>
            <?php if (isset($_SESSION['phone_number'])) {  ?>
            <a href="/logout.php">đăng xuất</a>
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