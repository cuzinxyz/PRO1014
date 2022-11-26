<?php
require "models/admin.php";

# Kiểm tra xem có phải là admin hay không?
if (isEmployee()) {
    # Nếu job khác admin thì chuyển hướng.
    if ($_SESSION['role'] != 'admin') {
        # Nhân viên sẽ chuyển hướng sang các đơn của mình.
        header("location: /nhanvien");
    }
} else {
    header("location: /");
}
# Tất cả hóa đơn.
$all_receipts = get_receipt();
# Xem chi tiết 1 hóa đơn.
if (isset($_GET['detail'])) {
    # $_GET detail url
    $id_receipt = $_GET['detail'];
    # Lấy 1 hóa đơn dựa vào detail url.
    $detail_receipt = one_receipt($id_receipt);

    // print_r($detail_receipt);
}

# FEEDBACK
if (isset($_GET['done'])) {
    $id_receipt = (int) $_GET['detail'];
    $id_user = (int) $detail_receipt[0]['idKhach'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $star = $_POST['rating'];
        $feedback_content = $_POST['feedback_content'];
        $result = feedback($id_receipt, $id_user, $star, $feedback_content);
        header("location: /?action=receipt");
    }
}

require "views/admin/index.php";