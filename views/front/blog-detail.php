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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <?php require "views/front/partials/header.php" ?>

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

    <?php require "views/front/partials/footer.php" ?>

</body>

</html>