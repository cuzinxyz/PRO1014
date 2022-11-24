<?php
require_once "models/admin.php";

$values_service = services();
$values_comboes = comboes();

$count = 0;
// $values = [...$values_service, ...$values_comboes];


require "views/admin/services.php";

