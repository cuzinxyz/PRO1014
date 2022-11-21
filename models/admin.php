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

    $sql = "SELECT orders.id, users.id as idKhach, users.phone_number as NguoiDat, time, orders.status as TrangThai, services.name as DichVu, employee.name as NguoiLam, services.price FROM `orders`
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
    $sql = "INSERT INTO employee(email, password, name, image, salary, hire_date, status) VALUES (?, '123456', ?, ?, ?, NOW(), 1)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($email, $name, $avatar, $salary));
}

function employee()
{
    $conn = connect();
    $sql = "SELECT * FROM employee";
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

function update_employee($id, $email, $password, $name, $image, $salary, $status)
{
    $conn = connect();
    $sql = "UPDATE employee SET email= ?, password= ?, name = ?, image= ?, salary= ?, status= ? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($email, $password, $name, $image, $salary, $status, $id));
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
