<?php
require_once "models/admin.php";

if(isset($_POST['btn'])) {
    $_SESSION['phone'] = $_POST['phone_number'];
}else {
}

if(isset($_SESSION['phone'])) {
    $phone = $_SESSION['phone'];
    $listOrder = query("
    SELECT DISTINCT users.phone_number, orders.time, orders.status, orders.id  FROM `orders` 
    LEFT JOIN `orders_detail` ON orders.id = orders_detail.order_id 
    LEFT JOIN `users` ON orders.user_id = users.id
    WHERE users.phone_number = $phone
    ORDER BY orders.time DESC
    ");
}else {
    $phone = "";
    unset($phone);
}


if (isset($_GET['detail'])) {
    $id_receipt = $_GET['detail'];
    # Lấy 1 hóa đơn dựa vào detail url.
    $detail_receipt = one_receipt($id_receipt);
    // print_r($detail_receipt);
    // if($detail_receipt[0]['idKhach'] != $_SESSION['id']) {
    //     header("location: /?action=booking_history");
    // }
}

if(isset($_GET['delete'])) {
    $id_delete = $_GET['delete'];
    delete_history($id_delete);
    header("location: /?action=booking_history");
}


require_once "views/front/booking_history.php";