<?php
    require "models/admin.php";
    if(isset($_POST['add'])) {
        $name_service = $_POST['nameService'];
        $type_service = $_POST['typeService'];
        $price_service = $_POST['priceService'];

        add_service($name_service, $type_service, $price_service);

    }

    require "views/admin/add-service.php";
?>