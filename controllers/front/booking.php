<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once "models/front.php";

$services = query("SELECT * FROM services WHERE status=1");
$combos = query("
SELECT combo.id, combo.status as trangthaicombo, GROUP_CONCAT(services.name SEPARATOR ' & ') as comboname, SUM(services.price) as tongtien FROM combo JOIN list_combo ON combo.id=list_combo.combo_id JOIN services ON list_combo.service_id=services.id
WHERE services.status <> 0
GROUP BY combo.id
");
$work_time = query("SELECT * FROM work_time");
$stylists = query("SELECT * FROM employee");


// print_r($combos);
// var_dump($_POST);

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
        $combo_choose = null;
    } else {
        $service_choose = null;
        $combo_choose = (int) $_POST['choose_combo'];
    }
    book($user_id, $time, $service_choose, $combo_choose, $employee);
    header("location: /#popup1");
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