<?php

<<<<<<< Updated upstream
switch ($variable) {
    case 'value':
        # code...
        break;

    default:
        # code...
        break;
}
=======
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
            require "controllers/admin/receipt.php";
            break;
        case 'addemployee':
            require "controllers/admin/add-employee.php";
            break;
        default:
            require "views/front/404.php";
            break;
    }
else :
    require "controllers/front/index.php";
endif;
>>>>>>> Stashed changes
