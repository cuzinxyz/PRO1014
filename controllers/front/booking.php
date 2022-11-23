<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once "models/front.php";

$services = query("SELECT * FROM services WHERE status=1");
$combos = query("SELECT * FROM services");
$work_time = query("SELECT * FROM work_time");
$stylists = query("SELECT * FROM employee");

var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lay so dienn thoai tu form index
    if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];
        # lấy id khách vừa add vào database
        $user_id = add_phone($phone);
        $_SESSION['user_id'] = $user_id;
    }
}
// Xu li du lieu sau khi nguoi dung dat lich
if (isset($_POST['book_now'])) {
    $user_id = (int) $_POST['user_id'];
    $time = $_POST['choose_date'] . " " . $_POST['choose_time'];
    $formatTime = date('Y-m-d H:i:s', strtotime($time));
    $employee = (int) $_POST['choose_employee'];
    if (isset($_POST['choose_service'])) {
        $service_choose = $_POST['choose_service'];
    } else {
        $service_choose = $_POST['choose_combo'];
    }
    // book($user_id, $time, $service_choose, $employee);
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