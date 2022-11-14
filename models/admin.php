<?php
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
function get_receipt()
{
    $conn = connect();
    $sql = "SELECT orders.id as MaHoaDon, orders.user_id as MaKhachHang, time, orders.status as TrangThai, users.phone_number FROM `orders`
    JOIN users ON orders.user_id=users.id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}
function one_receipt($id)
{
    $conn = connect();

    $sql = "SELECT orders.id, users.phone_number as NguoiDat, time, orders.status as TrangThai, services.name as DichVu, employee.name as NguoiLam, services.price FROM `orders`
    JOIN orders_detail ON orders.id=orders_detail.order_id
    JOIN services ON orders_detail.service_id=services.id
    JOIN users ON orders.user_id=users.id
    JOIN employee ON orders_detail.employee_id=employee.id
    WHERE orders.id=$id";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}

function add_service($name_service, $type_service, $price_service, $status_service) {
    $conn = connect();
    $sql = "INSERT INTO services(name, type_service, price, status) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt ->execute(array($name_service, $type_service, $price_service, $status_service));
}