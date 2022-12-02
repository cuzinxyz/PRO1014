<?php
require_once "models/admin.php";

$phone_number = $_SESSION['phone_number'];
$id = $_SESSION['id'];

$listOrder = query("SELECT DISTINCT users.phone_number, orders.time, orders.status, orders.id  FROM `orders` 
JOIN `orders_detail` ON orders.id = orders_detail.order_id 
JOIN `users` ON orders.user_id = users.id
WHERE users.phone_number = $phone_number
ORDER BY orders.time DESC");

// print_r($listOrder);
// print_r($_SESSION);

if (isset($_GET['detail'])) {
  # $_GET detail url
  $id_receipt = $_GET['detail'];
  # Lấy 1 hóa đơn dựa vào detail url.
  $detail_receipt = one_receipt($id_receipt);
  // print_r($detail_receipt);
  if($detail_receipt[0]['idKhach'] != $_SESSION['id']) {
    header("location: /?action=history");
  }
}

require "views/front/listOrder.php";
