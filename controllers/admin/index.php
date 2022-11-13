<?php
require "models/admin.php";

$all_receipts = get_receipt();
// print_r($all_receipts);

require "views/admin/index.php";