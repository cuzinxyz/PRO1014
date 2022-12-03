<header>
    <nav class="container">
        <img onclick="window.location.href='/'" class="nav_logo" src="public/images/logo.png" alt="">
        <div class="menu">
            <a href="#" class="active">home</a>
            <a href="#">contact us</a>
            <a href="#">book now</a>
            <?php if (isset($_SESSION['phone_number'])) {  ?>
                <div href="#" class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">
                        <?= $_SESSION['phone_number'] ?>
                    </a>
                    <div class="dropdown-content">
                        <a href="/?action=history">lịch sử cắt</a>
                        <a href="/?action=settings">Thông tin</a>
                        <a href="/?action=login">đăng xuất</a>
                    </div>
                </div>
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