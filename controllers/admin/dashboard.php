<?php
require_once "models/admin.php";

# số lượng user
$users = query("SELECT COUNT(phone_number) as amount FROM `users`");
# số lượng nhân viên
$employee = query("SELECT COUNT(*) as amount FROM `employee` WHERE role IS NULL");
# số lượng dịch vụ
$services = query("SELECT COUNT(*) as amount FROM `services` WHERE status=1");
# số lượng đơn hàng
$totalOrder = query("SELECT COUNT(*) as amount FROM `orders`");

# doanh thu chưa có combo :D

$listOrderOfOneDay = query("SELECT o1.user_id, time, o1.status, s1.name as servicesName, s1.price, 
(
SELECT DISTINCT GROUP_CONCAT(services.name SEPARATOR ' & ') FROM combo
JOIN list_combo ON combo.id=list_combo.combo_id
JOIN services ON list_combo.service_id=services.id
WHERE od1.combo_id=combo.id
GROUP BY combo.id
) AS comboName,
(
SELECT DISTINCT SUM(services.price) FROM combo
JOIN list_combo ON combo.id=list_combo.combo_id
JOIN services ON list_combo.service_id=services.id
WHERE od1.combo_id=combo.id
GROUP BY combo.id
) AS comboPrice
FROM orders o1
LEFT JOIN orders_detail od1 ON o1.id=od1.order_id
LEFT JOIN services s1 ON od1.service_id=s1.id
LEFT JOIN combo c1 ON od1.combo_id=c1.id
LEFT JOIN list_combo lc1 ON c1.id=lc1.combo_id
WHERE date(time) = current_date()");
$totalOfOneDay = 0;
foreach ($listOrderOfOneDay as $key => $total) {
  $totalOfOneDay = $totalOfOneDay + $total['price'] + $total['comboPrice'];
}


# tổng doanh thu 1 tháng
$orderListOfMonth = query("SELECT o1.user_id, time, o1.status, s1.name as servicesName, s1.price, 
(
SELECT DISTINCT GROUP_CONCAT(services.name SEPARATOR ' & ') FROM combo
JOIN list_combo ON combo.id=list_combo.combo_id
JOIN services ON list_combo.service_id=services.id
WHERE od1.combo_id=combo.id
GROUP BY combo.id
) AS comboName,
(
SELECT DISTINCT SUM(services.price) FROM combo
JOIN list_combo ON combo.id=list_combo.combo_id
JOIN services ON list_combo.service_id=services.id
WHERE od1.combo_id=combo.id
GROUP BY combo.id
) AS comboPrice
FROM orders o1
LEFT JOIN orders_detail od1 ON o1.id=od1.order_id
LEFT JOIN services s1 ON od1.service_id=s1.id
LEFT JOIN combo c1 ON od1.combo_id=c1.id
LEFT JOIN list_combo lc1 ON c1.id=lc1.combo_id
WHERE MONTH(time) = MONTH(current_date())");

$totalOfMonth = 0;
foreach ($orderListOfMonth as $key => $total) {
  $totalOfMonth = $totalOfMonth + $total['price'] + $total['comboPrice'];
}

# tổng toàn bộ doanh thu
$orderList = query("SELECT o1.user_id, time, o1.status, s1.name as servicesName, s1.price, 
(
SELECT DISTINCT GROUP_CONCAT(services.name SEPARATOR ' & ') FROM combo
JOIN list_combo ON combo.id=list_combo.combo_id
JOIN services ON list_combo.service_id=services.id
WHERE od1.combo_id=combo.id
GROUP BY combo.id
) AS comboName,
(
SELECT DISTINCT SUM(services.price) FROM combo
JOIN list_combo ON combo.id=list_combo.combo_id
JOIN services ON list_combo.service_id=services.id
WHERE od1.combo_id=combo.id
GROUP BY combo.id
) AS comboPrice
FROM orders o1
LEFT JOIN orders_detail od1 ON o1.id=od1.order_id
LEFT JOIN services s1 ON od1.service_id=s1.id
LEFT JOIN combo c1 ON od1.combo_id=c1.id
LEFT JOIN list_combo lc1 ON c1.id=lc1.combo_id
");
$totalSales = 0;
foreach ($orderList as $key => $total) {
  $totalSales = $totalSales + $total['price'] + $total['comboPrice'];
}
# lượt khách trong ngày
$orderOfOneDay = query("SELECT COUNT(*) as amount FROM orders 
WHERE date(time) = current_date()");

$top5Employee = query("
SELECT AVG(star) AS Star, employee.name, employee.image FROM feedback
LEFT JOIN orders ON feedback.order_id=orders.id
LEFT JOIN orders_detail ON orders.id=orders_detail.order_id
LEFT JOIN employee ON orders_detail.employee_id=employee.id
GROUP BY employee.id
ORDER BY star DESC
LIMIT 5
");
// print_r($top5Employee);

require "views/admin/dashboard.php";
