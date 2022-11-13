<?php
# require model
require_once "models/admin.php";

$receipts = get_receipt();
$one_receipt = one_receipt($_GET['detail']);
print_r($one_receipt);

require "views/admin/receipt.php";