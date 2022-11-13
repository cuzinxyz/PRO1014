<?php
require "models/admin.php";

# Tất cả hóa đơn.
$all_receipts = get_receipt();

if (isset($_GET['detail'])) {
    # $_GET detail url
    $id_receipt = $_GET['detail'];
    # Lấy 1 hóa đơn dựa vào detail url.
    $detail_receipt = one_receipt($id_receipt);
}

require "views/admin/index.php";