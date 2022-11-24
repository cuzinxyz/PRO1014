<?php
function connect()
{
    $dbhost  = 'sql.freedb.tech';
    $dbname  = 'freedb_pro1014';
    $dbuser  = 'freedb_pro1014';
    $dbpass  = 'SCaUbQ9Y%m@cP#r';

    try {
        $dbConn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    return $dbConn;
}
