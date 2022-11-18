<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once "models/front.php";

$services = query("SELECT * FROM services WHERE category_id=2");
$combos = query("SELECT * FROM services WHERE category_id=1");
$work_time = query("SELECT * FROM work_time");

// print_r($services);
// print_r($combos);
var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $_SESSION['phone'] = $_POST['phone'];
    if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];
        # lấy id khách vừa add vào database
        $user_id = add_phone($phone);
        $_SESSION['user_id'] = $user_id;
    }
}

# GET LIST TIME AVAILABLE WITH AJAX
if (isset($_GET['gettime'])) {
    $result = query("SELECT * FROM work_time");
    foreach ($result as $time) {
        echo '
            <label class="time__item">
                <input class="time__input" type="radio" value="' . $time['time'] . '" name="choose_time">
                <span class="time__checked ">
                ' . date("H:i", strtotime($time['time'])) . '
                </span>
            </label>
        ';
    }
}
require_once "views/front/booking.php";