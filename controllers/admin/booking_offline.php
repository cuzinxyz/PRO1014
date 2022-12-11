<?php
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

if (isset($_POST['book'])) {
    $time_choose = $_POST['choose_date'];
// var_dump($_POST);
    $phone_number = $_POST['phone_number'];
    if (isset($_POST['choose_service'])) {
        $service_choose = $_POST['choose_service'];
        $combo_choose = null;
    } else {
        $service_choose = null;
        $combo_choose = (int) $_POST['choose_combo'];
    }
    $employee_id = (int) $randEmployee[0]['idnhanvien'];
    book($phone_number, $service_choose, $combo_choose, $employee_id, $time_choose);
}

require "views/admin/booking_offline.php";