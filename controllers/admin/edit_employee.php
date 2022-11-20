<?php
require_once "models/admin.php";

$id = $_GET['id'];
$value = show_one_employee($id);
// $jobs = jobs();


if (isset($_POST['edit_employee'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $job = $_POST['job'];
    $salary = $_POST['salary'];
    $status = $_POST['status'];

    $folder = "./public/images/employee/";
    $fileName = $folder . basename($_FILES['image']['name']);

    $typeImg = ['jpg', 'jpeg', 'png', 'gif'];
    $imgFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    $check = in_array($imgFileType, $typeImg);

    $sizeImg = $_FILES['image']['size'];
    if ($sizeImg > 0 && $check) {
        $image = $_FILES['image']['name'];
    } else {
        $image = $value['image'];
    }

    move_uploaded_file($_FILES['image']['tmp_name'], $fileName);
    update_employee($id, $email, $password, $image, $job, $salary, $status);
    header('location: /?action=employees');
}

require "views/admin/edit_employee.php";