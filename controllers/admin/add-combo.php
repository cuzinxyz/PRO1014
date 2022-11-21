<?php
require_once "models/admin.php";

$values = services();

if(isset($_POST['add'])) {
    $ids = $_POST['id_combo'];
    addCombo($ids);

}

require "views/admin/add-combo.php";