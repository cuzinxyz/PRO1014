<?php
require_once "models/admin.php";
if (isset($_POST['add'])) {
  $folder = "./public/images/employee/";
  $fileName = $folder . basename($_FILES['avatar']['name']);
  move_uploaded_file($_FILES['avatar']['tmp_name'], $fileName);
  $name = $_POST['name'];
  $avatar = $_FILES['avatar']['name'];
  $job = $_POST['job'];
  $salary = $_POST['salary'];
  var_dump($_POST);
  var_dump($_FILES);
  echo $avatar;
  addEmployee($name, $avatar, $job, $salary);
}
require "views/admin/add-employee.php";
