<?php
require "models/admin.php";

    $values = categories();

if (isset($_POST['add'])) {
    $name_service = $_POST['nameService'];
    $price_service = $_POST['priceService'];
    $cate_service = $_POST['cateService'];
    add_service($name_service, $price_service, $cate_service);
    echo("<script>location.href = '?action=services';</script>");
}

require "views/admin/add-service.php";