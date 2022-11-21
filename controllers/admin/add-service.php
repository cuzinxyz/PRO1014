<?php
require "models/admin.php";


if (isset($_POST['add'])) {
    $name_service = $_POST['nameService'];
    $price_service = $_POST['priceService'];
    add_service($name_service, $price_service);
    echo("<script>location.href = '?action=services';</script>");
}

require "views/admin/add-service.php";