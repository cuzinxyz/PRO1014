<?php
require_once "models/admin.php";

$id=$_GET['id'];

$blogEdit = hienthi($id);

if (isset($_POST['edit_blog'])) {
    $folder = "./public/images/image__blog/";
    $fileName = $folder . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $fileName);
    $title = $_POST['title'];
    $content = $_POST['content'];
    if($_FILES['image']['size'] == 0){
        $image = $blogEdit['image'];
    } else{
        $image = $_FILES['image']['name'];
    }
    // addBlog($title, $image, $content);
    edit_blog($id, $title, $image, $content);
    header('location: /?action=blogs');
  }

require "views/admin/edit_blog.php";
