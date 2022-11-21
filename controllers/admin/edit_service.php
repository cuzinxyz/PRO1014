<?php
require "models/admin.php";

$id = $_GET['id'];
// $values = categories();

$service = one_service($id);

if (isset($_POST['add'])) {
  $name_service = $_POST['nameService'];
  $price_service = $_POST['priceService'];
  // $cate_service = $_POST['cateService'];
  $status = $_POST['status'];
  update_service($name_service, $price_service, $status, $id);
  echo ("<script>location.href = '?action=services';</script>");
}

require "views/admin/edit_service.php";
