<?php 
require_once "models/front.php";

$id = (int) $_SESSION['id'];
$user = getUser($id);
$employee = query("SELECT email, password FROM employee WHERE id=$id");
// print_r($employee);

if(empty($id)) header("location: /?action=login");

if(isset($_SESSION['role'])) {
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $password = $_POST['new_password'];

        if(empty($password)) {
            $password = $employee[0]['password'];
        } else {
            $password = md5($_POST['new_password']);
        }

        $updatePassword = query("
            UPDATE `employee` SET `password`='$password' WHERE id=$id
        ");
        header("location: /employee.php");
    }
}

if(isset($_POST['edit_employee'])) {
    $phone_number = $_POST['phone_number'];
    $_SESSION['phone_number'] = $phone_number;
    $password = ($_POST['password']);

    if(empty($password)) {
        $password = $user['password'];
    } else {
        $password = md5($_POST['password']);
    }
    updateUser($phone_number, $password, $id);
    
    if(!isset($_SESSION['role'])) header("Location:/");
}else {}

require 'views/front/settings.php';