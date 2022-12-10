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
    $stmt0 = $conn->prepare("SELECT * FROM users WHERE phone_number='$phone_number'");
    $stmt0->execute();
    $availablePhone = $stmt0->fetch(PDO::FETCH_ASSOC);

    if(empty($availablePhone)) {
        $stmt = $conn->prepare("INSERT INTO users(phone_number, status) VALUES('$phone_number', 1)");
        $stmt->execute();
        $id = $conn->lastInsertId();
    } else {
        $id = $availablePhone['id'];
    }
    
    return $id;
}

function book($user_id, $password, $time, $services, $combo, $employee)
{
    $conn = connect();
    # nếu khách nhập mật khẩu sẽ update mật khẩu vào database.
    $sql0 = "UPDATE `users` SET `password`='$password' WHERE id=$user_id";
    $stmt0 = $conn->prepare($sql0);
    $stmt0->execute();

    $sql1 = "INSERT INTO `orders`(`user_id`, `time`, `status`) VALUES ($user_id, '$time', 0)";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute();
    # sau khi insert hóa đơn vào sẽ lấy mã hóa đơn để add các dịch vụ của hóa đơn đó.
    $order_id = $conn->lastInsertId();
    if (!empty($services)) {
        foreach ($services as $service) {
            $sql2 = "INSERT INTO `orders_detail`(`order_id`, `service_id`, `employee_id`) VALUES($order_id, $service, $employee)";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute();
        }
    } else {
        $sql3 = "INSERT INTO `orders_detail`(`order_id`, `combo_id`, `employee_id`) VALUES($order_id, $combo, $employee)";
        $stmt3 = $conn->prepare($sql3);
        $stmt3->execute();
    }
}

function shorter($text, $chars_limit)
{
    // Check if length is larger than the character limit
    if (strlen($text) > $chars_limit) {
        // If so, cut the string at the character limit
        $new_text = substr($text, 0, $chars_limit);
        // Trim off white space
        $new_text = trim($new_text);
        // Add at end of text ...
        return $new_text . "...";
    }
    // If not just return the text as is
    else {
        return $text;
    }
}



function getUser($id) {
    $conn = connect();
    $sql = "SELECT * FROM users WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}


function updateUser($phone_number, $password, $id) {
    $conn = connect();
    $sql = "UPDATE users SET phone_number='$phone_number', password='$password' WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}


function getHistoryBookingUser($phone_number) {
    $conn = connect();
    $sql = "SELECT services.name as ten_dich_vu, employee.name as ten_nhan_vien, orders.time FROM users 
        LEFT JOIN orders ON users.id = orders.user_id
        LEFT JOIN orders_detail ON orders.id = orders_detail.order_id
        LEFT JOIN services ON services.id = orders_detail.service_id
        LEFT JOIN employee ON employee.id = orders_detail.employee_id
        WHERE users.phone_number=$phone_number
        ";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute();
    $data = $stmt -> fetchAll();
    return $data;

    // $sql2 = "SELECT combo.id, combo.status as trangthaicombo, 
    // GROUP_CONCAT(services.name SEPARATOR ' & ') as comboname, 
    // SUM(services.price) as tongtien 
    // FROM combo JOIN list_combo ON combo.id=list_combo.combo_id 
    // JOIN services ON list_combo.service_id=services.id 
    // GROUP BY combo.id;"
}
