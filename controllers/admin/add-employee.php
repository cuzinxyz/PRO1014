<?php
require_once "models/admin.php";
if (isset($_POST['add'])) {
  $folder = "./public/images/employee/";
  $fileName = $folder . basename($_FILES['avatar']['name']);
  move_uploaded_file($_FILES['avatar']['tmp_name'], $fileName);
  $name = $_POST['name'];
  $email = $_POST['email'];
  $avatar = $_FILES['avatar']['name'];
  // $job = $_POST['job'];
  $salary = $_POST['salary'];
  addEmployee($email, $name, $avatar, $salary);
  header("location: /?action=employees&success");
}
require "views/admin/add-employee.php";
