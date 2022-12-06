<?php
require "models/admin.php";

$feedback = query("
SELECT star, note, order_id, phone_number, order_id, time FROM feedback
LEFT JOIN users ON feedback.user_id=users.id
LEFT JOIN orders ON feedback.order_id=orders.id
");

require "views/admin/feedback.php";
