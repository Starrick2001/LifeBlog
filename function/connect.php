<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "member";
$servername = "remotemysql.com";
$username = "dwNSRsKHFD";
$password = "9j86ae7qYs";
$database = "dwNSRsKHFD";
$connect = new mysqli($servername, $username, $password, $database);

if ($connect->connect_error) {
    die("Failed");
}
header('Content-Type: text/html; charset=UTF-8');
