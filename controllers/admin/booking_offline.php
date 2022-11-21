<?php
require_once "models/admin.php";
// require_once "models/front.php"; 

$services = query("SELECT * FROM services");
$combos = query("SELECT * FROM services");

require "views/admin/booking_offline.php";
