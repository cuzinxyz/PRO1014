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
# Login Model
function login($email, $password)
{
    $conn = connect();
    $sql = "SELECT * FROM employee WHERE email='$email' AND password='$password'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}
function isEmployee()
{
    return (isset($_SESSION['role'])) ? $_SESSION['role'] : false;
}

# Receipt Model
function get_receipt()
{
    $conn = connect();
    $sql = "
    SELECT orders.id as MaHoaDon, orders.user_id as MaKhachHang, time, orders.status as TrangThai, users.phone_number FROM `orders`
    JOIN users ON orders.user_id=users.id
    WHERE DATE(time) >= CURRENT_DATE() AND orders.status NOT IN(2,3)
    ORDER BY time ASC
    ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}
function one_receipt($id)
{
    $conn = connect();
    $sql = "
    SELECT orders.id, users.id as idKhach, users.phone_number as NguoiDat, time, orders.status as TrangThai, services.name as DichVu, employee.name as NguoiLam, services.price FROM `orders`
    JOIN orders_detail ON orders.id=orders_detail.order_id
    JOIN services ON orders_detail.service_id=services.id
    JOIN users ON orders.user_id=users.id
    JOIN employee ON orders_detail.employee_id=employee.id
    WHERE orders.id=$id
    ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (empty($data)) {
        $sql = "
        SELECT orders.id, users.id as idKhach, users.phone_number as NguoiDat, time, orders.status as TrangThai, 
        (
        SELECT DISTINCT GROUP_CONCAT(services.name SEPARATOR ' & ') AS Combo FROM combo
        JOIN list_combo ON combo.id=list_combo.combo_id
        JOIN services ON list_combo.service_id=services.id
        WHERE o1.combo_id=combo.id
        GROUP BY combo.id
        ) AS DichVu
        , employee.name as NguoiLam, 
        (
        SELECT DISTINCT SUM(services.price) as tongtien FROM combo
        JOIN list_combo ON combo.id=list_combo.combo_id
        JOIN services ON list_combo.service_id=services.id
        WHERE o1.combo_id=combo.id
        GROUP BY combo.id
        ) AS price
        FROM `orders`
        LEFT JOIN orders_detail o1 ON orders.id=o1.order_id
        LEFT JOIN services ON o1.service_id=services.id
        LEFT JOIN users ON orders.user_id=users.id
        LEFT JOIN employee ON o1.employee_id=employee.id
        WHERE orders.id=$id
        ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $data;
}

function cancel($id_receipt)
{
    $conn = connect();
    $sql = "
    UPDATE orders
    SET status=3
    WHERE id=$id_receipt
    ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function confirm($id_receipt)
{
    $conn = connect();
    $sql = "
    UPDATE orders
    SET status=4
    WHERE id=$id_receipt
    ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

# Model Service
function add_service($name_service, $price_service)
{
    $conn = connect();
    $sql = "INSERT INTO services(name, price, status) VALUES (?, ?, 1)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($name_service, $price_service));
}

function services()
{
    $conn = connect();
    $sql = "SELECT * FROM services";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}

function blogs()
{
    $conn = connect();
    $sql = "SELECT * FROM posts";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}



# Employee Model
function addEmployee($email, $name, $avatar, $salary)
{
    $conn = connect();
    $password = md5('123456');
    $sql = "INSERT INTO employee(email, password, name, image, salary, hire_date, status) VALUES (?, ?, ?, ?, ?, NOW(), 1)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($email, $password, $name, $avatar, $salary));
}

function employee()
{
    $conn = connect();
    $sql = "SELECT * FROM employee ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}

function show_one_employee($id)
{
    $conn = connect();
    $sql = "SELECT * FROM employee WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($id));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function update_employee($id, $email, $password, $name, $image, $salary, $status, $role = null)
{
    $conn = connect();
    $sql = "UPDATE employee SET email= ?, password= ?, name = ?, image= ?, role= ?, salary= ?, status= ? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($email, $password, $name, $image, $role, $salary, $status, $id));
}

# Blog Model
function addBlog($title, $image, $content)
{
    $conn = connect();
    $sql = "INSERT INTO `posts` (`title`, `image`, `createdAt`, `updateAt`, `content`) VALUES (?,?,NOW(),NOW(),?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($title, $image, $content));
}


// Updete Blog
function edit_blog($id, $title, $image, $content)
{
    $conn = connect();
    $sql = "UPDATE `posts` SET `title`='$title',`image`='$image',`updateAt`=NOW(),`content`='$content' WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function hienthi($id)
{
    $conn = connect();
    $sql = "select * from posts where id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $value = $stmt->fetch(PDO::FETCH_ASSOC);
    return $value;
}

// Delete Blog
function delete_blog($id)
{
    $conn = connect();
    $sql = "delete from posts where id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}


# Feedback

function feedback($orderid, $customer, $star, $feedback)
{
    $conn = connect();
    $sql = "INSERT INTO `feedback`(`star`, `note`, `order_id`, `user_id`) VALUES('$star', '$feedback', $orderid, $customer)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}



# Category Model
// function categories()
// {
//     $conn = connect();
//     $sql = "SELECT id as cate_id, category_name as cate_name FROM categories";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
//     $data = $stmt->fetchAll();
//     return $data;
// }


function one_service($id)
{
    $conn = connect();
    $sql = "SELECT * FROM `services` WHERE `id` = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $value = $stmt->fetch(PDO::FETCH_ASSOC);
    return $value;
}

# Job Model
function jobs()
{
    $conn = connect();
    $sql = "SELECT * FROM jobs";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}


function update_service($name, $price, $status, $id)
{
    $conn = connect();
    $sql = "UPDATE `services` SET `name`='$name',`price`='$price',`status`='$status' WHERE `id` = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}



#Model combo 
function addCombo($ids)
{
    $conn = connect();
    $sql1 = "INSERT INTO `combo`(`status`) VALUES(1)";
    $stmt = $conn->prepare($sql1);
    $stmt->execute();

    $combo_id = $conn->lastInsertId();
    foreach ($ids as $id) {
        $sql2 = "INSERT INTO `list_combo`(`combo_id`, `service_id`) VALUES ($combo_id, $id)";
        $stmt = $conn->prepare($sql2);
        $stmt->execute();
    }
}

function comboes()
{
    $conn = connect();
    $sql = "SELECT combo.id, combo.status as trangthaicombo, 
        GROUP_CONCAT(services.name SEPARATOR ' & ') as comboname, 
        SUM(services.price) as tongtien 
        FROM combo JOIN list_combo ON combo.id=list_combo.combo_id 
        JOIN services ON list_combo.service_id=services.id 
        GROUP BY combo.id;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}

function get_one_combo($id)
{
    $conn = connect();
    $sql = "
    SELECT list_combo.service_id, combo.status FROM list_combo 
    JOIN services ON list_combo.service_id = services.id 
    LEFT JOIN combo ON list_combo.combo_id=combo.id
    WHERE combo_id =$id
    ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function update_comboes($ids, $id_combo, $status)
{
    $conn = connect();
    $sql1 = "DELETE FROM list_combo
            WHERE list_combo.combo_id = $id_combo";
    $stmt = $conn->prepare($sql1);
    $stmt->execute();

    foreach ($ids as $id) {
        $sql2 = "INSERT INTO `list_combo`(`combo_id`, `service_id`) VALUES ($id_combo, $id)";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->execute();
    }

    $sql3 = "
    UPDATE `combo` SET `status`=$status WHERE id=$id_combo
    ";
    $stmt3 = $conn->prepare($sql3);
    $stmt3->execute();
}

# Query
function query($sql)
{
    $conn = connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function book($phone_number, $services, $combo, $employee, $time)
{
    $conn = connect();
    # insert user
    $sql0 = "INSERT INTO `users`(`phone_number`, `status`) VALUES ('$phone_number', 1)";
    $stmt0 = $conn->prepare($sql0);
    $stmt0->execute();
    $user_id = (int) $conn->lastInsertId();
    # insert hoa don
    $sql1 = "INSERT INTO `orders`(`user_id`, `time`, `status`) VALUES ($user_id, '$time', 0)";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute();
    $order_id = $conn->lastInsertId();
    if (!empty($services)) {
        # insert chi tiet hoa don
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


// login user
function login_user($phone_number, $password)
{
    $conn = connect();
    $sql = "SELECT * FROM users WHERE phone_number='$phone_number' AND password='$password'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function startCut($id_receipt)
{
    $conn = connect();
    $sql = "
    UPDATE `orders` SET `status`=1 WHERE id=$id_receipt
    ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function finished($id_receipt)
{
    $conn = connect();
    $sql = "
    UPDATE `orders` SET `status`=2 WHERE id=$id_receipt
    ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}


function delete_history($id)
{
    $conn = connect();
    $sql = "UPDATE orders SET status=3 WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function book_update($order_id, $service_choose, $employee)
{
    $conn = connect();
    foreach ($service_choose as $service) {
        $sql = "INSERT INTO `orders_detail`(`order_id`, `service_id`, `employee_id`) VALUES($order_id, $service, $employee)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
}
