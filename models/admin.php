<?php
function connect()
{
    $dbhost  = 'localhost';
    $dbname  = 'pro1014';
    $dbuser  = 'root';
    $dbpass  = '';
    try {
        $dbConn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $dbConn;
}
function get_receipt()
{
    $conn = connect();
    $sql = "SELECT users.id, phone_number FROM users
    JOIN orders ON users.id=orders.user_id
    WHERE users.id=orders.user_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}
function one_receipt($id)
{
    $conn = connect();

    $sql = "SELECT users.phone_number, time, orders.id as idhoadon, orders_detail.service_id as iddichvu, orders_detail.user_id as nguoilam FROM orders 
    JOIN orders_detail ON orders.id=orders_detail.order_id
    JOIN users ON orders.user_id=users.id
    WHERE orders.id=$id";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}