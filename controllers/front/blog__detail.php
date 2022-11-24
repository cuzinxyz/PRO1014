<?php
require_once "models/admin.php";

$id = $_GET['id'];
$blog = query("SELECT * FROM `posts` WHERE id = $id");

print_r($blog);

require_once "views/front/blog-detail.php";
