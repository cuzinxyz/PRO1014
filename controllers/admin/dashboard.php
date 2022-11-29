<?php
require_once "models/admin.php";


$users = query("SELECT COUNT(phone_number) as amount FROM `users`");
$employee = query("SELECT COUNT(*) as amount FROM `employee`");
$services = query("SELECT COUNT(*) as amount FROM `services`");
$totalOrder = query("SELECT COUNT(*) as amount FROM `orders` ");
$totalTurnover = query("SELECT SUM(services.price) as total FROM `orders`
JOIN orders_detail ON orders.id=orders_detail.order_id
JOIN services ON orders_detail.service_id=services.id
JOIN users ON orders.user_id=users.id
JOIN employee ON orders_detail.employee_id=employee.id
");



require "views/admin/dashboard.php";

