<?php 
require_once "models/admin.php";
$values = services();

$id = $_GET['id'];
$detail_combo = get_one_combo($id);

if (isset($_POST['add'])) {
  $ids = $_POST['id_combo'];
  update_comboes($ids, $id);
  echo ("<script>location.href = '?action=services';</script>");
}

require "views/admin/edit_combo.php";