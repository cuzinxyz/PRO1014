<?php
require_once "models/front.php";

$services = query("SELECT * FROM services WHERE category_id=2");
$combos = query("SELECT * FROM services WHERE category_id=1");
// print_r($services);
// print_r($combos);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['phone'] = $_POST['phone'];
}

require_once "views/front/booking.php";