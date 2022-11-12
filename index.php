<?php

$action = isset($_GET['action']) ? $_GET['action'] : '';

if (isset($action)) :
    switch ($action) {
        case 'index':
            require "controllers/front/index.php";
            break;

        default:
            require "views/front/404.php";
            break;
    }
else :
<<<<<<< Updated upstream
    require 'views/front/index.html';
endif;
=======
    require "controllers/front/index.php";
endif;
>>>>>>> Stashed changes
