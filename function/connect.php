<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "lifeblog";
// $servername = "remotemysql.com";
// $username = "dwNSRsKHFD";
// $password = "9j86ae7qYs";
// $database = "dwNSRsKHFD";
$connect = new mysqli($servername, $username, $password, $database);

if ($connect->connect_error) {
    die("Failed");
}
$connect->set_charset('utf8');
