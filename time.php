<?php
$avaTime = strtotime("2022-11-18 07:50:59");
$currentTime = strtotime((new DateTime())->format("H:i:s"));

if ($avaTime > $currentTime) {
    echo "Yes.";
} else {
    echo "No.";
}