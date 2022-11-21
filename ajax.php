<?php
session_start();
ob_start();

date_default_timezone_set('Asia/Ho_Chi_Minh');

function connect()
{
    $dbhost  = 'localhost';
    $dbname  = 'pro1014';
    $dbuser  = 'root';
    $dbpass  = '';
    try {
        $dbConn = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8mb4", $dbuser, $dbpass);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $dbConn;
}
function query($sql)
{
    $conn = connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

if (isset($_GET['gettime'])) {
    $conn = connect();
    $sql = "SELECT * FROM work_time";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $time) {
        $datetime = $_POST['date'] . " " . $time['time'];
        $currentTime = ((new DateTime())->format("Y-m-d H:i:s"));
        $checkTime = (date("Y-m-d H:i:s", strtotime($datetime)));
        echo '
        <label class="time__item">
            <input class="time__input" type="radio" value="' . $time['time'] . '" name="choose_time"
                ' . (($currentTime > $checkTime) ? " disabled" : "") . '>
            <span
                class="time__checked ' . (($currentTime > $checkTime) ? " unavailable" : "") . '">' . date("H:i", strtotime($time['time'])) . '</span>
        </label>
        ';
    }
}

if (isset($_GET['getstylist'])) {
    $choose_date = date("Y-m-d H:i:s", strtotime($_POST['datetime']));
    $list = query("SELECT * FROM employee");

    // print_r($list);
    foreach ($list as $item) {
        echo '
            <div class="stylist__item">
                <label class="checkbox__label">
                <div class="checkbox__custom">
                    <input class="checkbox__input" name="choose_employee" value="' . $item['id'] . '" type="checkbox">
                    <span class="checkmark"><i class="fa-solid fa-check"></i></span>
                </div>
                <div class="service__content">
                    <div class="infor__stylist">
                    <img src="public/images/employee/' . $item['image'] . '" alt="" class="avatar__stylist">
                    <p class="name__stylist">' . $item['name'] . '</p>
                    <a href="" class="detail__stylist">
                        Review: 4.5/5 <i class="fa-regular fa-star"></i>
                    </a>
                    </div>
                </div>
                </label>
            </div>
        ';
    }
}