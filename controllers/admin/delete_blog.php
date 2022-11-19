<?php
require_once "models/admin.php";

$id = $_GET['id'];
delete_blog($id);


echo '<script>alert("Xóa thành công");window.location.href="/?action=blogs";</script>';



