<?php
session_start();
ob_start();

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

function add_phone($phone_number)
{
    $conn = connect();
    $stmt = $conn->prepare("INSERT INTO users(phone_number, status) VALUES('$phone_number', 1)");
    $stmt->execute();
    return $id = $conn->lastInsertId();
}

function book($user_id, $time, $services, $combo, $employee)
{
    $conn = connect();
    $sql1 = "INSERT INTO `orders`(`user_id`, `time`, `status`) VALUES ($user_id, '$time', 0)";
    $sql1 = $conn->prepare($sql1);
    $sql1->execute();
    # sau khi insert hóa đơn vào sẽ lấy mã hóa đơn để add các dịch vụ của hóa đơn đó.
    $order_id = $conn->lastInsertId();
    if (!empty($services)) {
        foreach ($services as $service) {
            $sql2 = "INSERT INTO `orders_detail`(`order_id`, `service_id`, `employee_id`) VALUES($order_id, $service, $employee)";
            $sql2 = $conn->prepare($sql2);
            $sql2->execute();
        }
    } else {
        $sql3 = "INSERT INTO `orders_detail`(`order_id`, `combo_id`, `employee_id`) VALUES($order_id, $combo, $employee)";
        $sql3 = $conn->prepare($sql3);
        $sql3->execute();
    }
}