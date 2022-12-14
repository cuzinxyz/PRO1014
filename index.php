<?php

$action = isset($_GET['action']) ? $_GET['action'] : null;

if (isset($action)) :
    switch ($action) {
        case 'index':
            require "controllers/front/index.php";
            break;
        case 'login':
            require "login.php";
            break;
        case 'book':
            require "controllers/front/booking.php";
            break;
        case 'receipt':
            require "controllers/admin/index.php";
            break;
        case 'feedback':
            require "controllers/admin/feedback.php";
            break;
        case 'dashboard':
            require "controllers/admin/dashboard.php";
            break;
        case 'addservice':
            require "controllers/admin/add-service.php";
            break;
        case 'services':
            require "controllers/admin/services.php";
            break;
        case 'edit_service':
            require "controllers/admin/edit_service.php";
            break;
        case 'addemployee':
            require "controllers/admin/add-employee.php";
            break;
        case 'employees':
            require "controllers/admin/employee.php";
            break;
        case 'edit_employee':
            require "controllers/admin/edit_employee.php";
            break;
        case 'addblog':
            require "controllers/admin/add-blog.php";
            break;
        case 'blogs':
            require "controllers/admin/blogs.php";
            break;
        case 'edit_blog':
            require "controllers/admin/edit_blog.php";
            break;
        case 'delete_blog':
            require "controllers/admin/delete_blog.php";
            break;
        case 'addcombo':
            require "controllers/admin/add-combo.php";
            break;
        case 'edit_combo':
            require "controllers/admin/edit_combo.php";
            break;
        case 'booking_offline':
            require "controllers/admin/booking_offline.php";
            break;
        case 'blog_detail':
            require "controllers/front/blog__detail.php";
            break;
        case 'history':
            require "controllers/front/listOrder.php";
            break;
        case 'settings':
            require "controllers/front/settings.php";
            break;
        case 'booking_history':
            require "controllers/front/booking_history.php";
            break;
        case 'update_receipt':
            require "controllers/admin/update__order.php";
            break;
        default:
            require "views/front/404.php";
            break;
    }
else :
    require "controllers/front/index.php";
endif;
