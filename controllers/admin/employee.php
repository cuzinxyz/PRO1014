<?php
require_once "models/admin.php";

$values = employees();

require "views/admin/employee.php";
