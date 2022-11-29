<?php
require "models/front.php";
$blogs = query("SELECT * FROM `posts` ORDER BY RAND() LIMIT 3");

require "views/front/index.php";