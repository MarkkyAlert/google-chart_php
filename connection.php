<?php

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "tour_db";
date_default_timezone_set('Asia/Bangkok');

try {
    $db = new PDO("mysql:host={$db_host}; dbname={$db_name}", $db_user, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    $e->getMessage();
}