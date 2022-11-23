<?php
require_once "models/admin.php";
if (isset($_POST['add'])) {
  $folder = "./public/images/image__blog/";
  $fileName = $folder . basename($_FILES['image']['name']);
  move_uploaded_file($_FILES['image']['tmp_name'], $fileName);
  $title = $_POST['title'];
  $content = $_POST['content'];
  $image = $_FILES['image']['name'];
  addBlog($title, $image, $content);
  header("location: /?action=blogs");
}
require "views/admin/add-blog.php";