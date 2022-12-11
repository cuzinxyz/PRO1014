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
function query($sql)
{
    $conn = connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
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

if (isset($_GET['getstylist'])) {
    $choose_date = date("Y-m-d H:i:s", strtotime($_POST['datetime']));
    $list = query("
    SELECT DISTINCT employee.id as idnhanvien, employee.name, employee.image, AVG(feedback.star) as vote FROM employee
    LEFT JOIN orders_detail ON employee.id=orders_detail.employee_id
    LEFT JOIN orders ON orders_detail.order_id=orders.id
    LEFT JOIN feedback ON orders_detail.order_id=feedback.order_id
    WHERE employee.id NOT IN (
        SELECT orders_detail.employee_id FROM orders
        JOIN orders_detail ON orders.id=orders_detail.order_id
        WHERE orders.time = '" . $choose_date . "'
    ) AND employee.status=1
    GROUP BY employee.id
    ");
    
    if (empty($list)) {
        echo "Thời gian bạn chọn đã được đặt hết, vui lòng chọn ca khác. Chúng tôi vô cùng tiếc vì điều này!";
    } else {
        foreach ($list as $item) {
            $vote = ($item['vote'] == 0) ? "Chưa có đánh giá" : $item['vote'];
            echo '
                <div class="stylist__item">
                    <label class="checkbox__label">
                    <div class="checkbox__custom">
                        <input class="checkbox__input" name="choose_employee" value="' . $item['idnhanvien'] . '" type="radio" required>
                        <span class="checkmark"><i class="fa-solid fa-check"></i></span>
                    </div>
                    <div class="service__content">
                        <div class="infor__stylist">
                            <img src="public/images/employee/' . $item['image'] . '" alt="" class="avatar__stylist">
                            <p class="name__stylist">' . $item['name'] . '</p>
                            <span href="" class="detail__stylist">
                                '.$vote.'/5 <i class="fa-regular fa-star"></i>
                            </span>
                        </div>
                    </div>
                    </label>
                </div>
            ';
        }
    }
}

if (isset($_POST['search'])) 
{
    $searchValue = $_POST['search'];
    //Search query & Query execution.
    $searchResult = query("
    SELECT orders.id as MaHoaDon, orders.user_id as MaKhachHang, time, orders.status as TrangThai, users.phone_number FROM `orders`
    JOIN users ON orders.user_id=users.id 
    WHERE users.phone_number LIKE '%$searchValue%' 
    ORDER BY time DESC
    ");
    foreach ($searchResult as $key => $receipt) : ?>
        <tr>
            <td><?= $receipt['MaHoaDon'] ?></td>
            <td><?= $receipt['phone_number'] ?></td>
            <td><?= $receipt['time'] ?></td>
            <td>
            <?php
            if ($receipt['TrangThai'] == 0) {
                // tính thời gian quá 1h sẽ Cancel hóa đơn.
                $CalcTimeDeadline = strtotime($receipt['time']) + 3600;
                $deadline = date("Y-m-d H:i:s", $CalcTimeDeadline);
                $today = date("Y-m-d H:i:s");
                if ($deadline < $today) {
                    echo '<span class="badge bg-danger">Đã Hủy</span>';
                } else {
                    echo '<span class="badge bg-warning">Chờ xác nhận</span>';
                }
            } else if ($receipt['TrangThai'] == 1) {
                echo '<span class="badge bg-primary">Đang cắt</span>';
            } else if ($receipt['TrangThai'] == 2) {
                echo '<span class="badge bg-success">Hoàn thành</span>';
            } else if ($receipt['TrangThai'] == 3) {
                echo '<span class="badge bg-danger">Đơn bị hủy</span>';
            } else if ($receipt['TrangThai'] == 4) {
                echo '<span class="badge bg-dark">Đã Xác Nhận</span>';
            } else {
                // tính thời gian quá 1h sẽ Cancel hóa đơn.
                $CalcTimeDeadline = strtotime($receipt['time']) + 3600;
                $deadline = date("Y-m-d H:i:s", $CalcTimeDeadline);
                $today = date("Y-m-d H:i:s");
                if ($deadline < $today) {
                    echo '<span class="badge bg-danger">Đã Hủy</span>';
                }
            }
            ?>
            </td>
            <td>
                <a href="/?action=receipt&detail=<?= $receipt['MaHoaDon'] ?>">
                    <button type="button"
                        class="btn btn-block btn-primary btn-xs">Xem Chi Tiết</button>
                </a>
            </td>
        </tr>
        <?php endforeach;

}