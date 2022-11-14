<?php

$action = isset($_GET['action']) ? $_GET['action'] : null;

if (isset($action)) :
    switch ($action) {
        case 'index':
            require "controllers/front/index.php";
            break;
        case 'dashboard':
            require "controllers/admin/index.php";
            break;
        case 'receipt':
            require "controllers/admin/index.php";
            break;
        case 'employee':
            require "controllers/admin/employee.php";
            break;
        case 'add-service':
            require "controllers/admin/add-service.php";
            break;
        default:
            require "views/front/404.php";
            break;
    }
else :
    require "controllers/admin/index.php";
endif;

