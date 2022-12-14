<?php
require "models/admin.php";
require_once "models/admin.php";

$services = query("SELECT * FROM services WHERE status=1");
$combos = query("
SELECT combo.id, combo.status as trangthaicombo, GROUP_CONCAT(services.name SEPARATOR ' & ') as comboname, SUM(services.price) as tongtien FROM combo JOIN list_combo ON combo.id=list_combo.combo_id JOIN services ON list_combo.service_id=services.id
WHERE services.status <> 0
GROUP BY combo.id
");

$randEmployee = query("
SELECT DISTINCT employee.id as idnhanvien, employee.name, employee.image FROM employee
    LEFT JOIN orders_detail ON employee.id=orders_detail.employee_id
    LEFT JOIN orders ON orders_detail.order_id=orders.id
    WHERE employee.id NOT IN (
        SELECT orders_detail.employee_id FROM orders
        JOIN orders_detail ON orders.id=orders_detail.order_id
        WHERE orders.time=NOW()
    )
    ORDER BY RAND()
    LIMIT 1
");
// id order update
$order_id = $_GET['receipt'];
// id employee
// $employee = query("SELECT employee_id FROM `orders_detail` WHERE order_id = $order_id");
$employee_id = (int) $randEmployee[0]['idnhanvien'];

if (isset($_POST['book'])) {
  if (isset($_POST['choose_service'])) {
    $service_choose = $_POST['choose_service'];
  }
  if (empty($_POST['choose_service'])) {
    $error['service'] = '';
    echo "<script>alert('Chưa chọn dịch vụ')</script>";
  }
  if (empty($error)) {
    $service_choose = $_POST['choose_service'];
    book_update($order_id, $service_choose, $employee_id);
    header("location: /?action=receipt&detail=$order_id");
  }
}

require "views/admin/update__order.php";
