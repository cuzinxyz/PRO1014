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