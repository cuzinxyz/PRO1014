<?php 
require_once "models/front.php";

$id = $_SESSION['id'];

$user = getUser($id);
if(isset($_POST['edit_employee'])) {
    $phone_number = $_POST['phone_number'];
    $_SESSION['phone_number'] = $phone_number;
    $password = $_POST['password'];
    updateUser($phone_number, $password, $id);
    header("Location:/");
}else {}

require 'views/front/settings.php';