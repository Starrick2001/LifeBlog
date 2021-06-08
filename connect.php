<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "member";
$connect = new mysqli($servername, $username, $password, $database);

if ($connect->connect_error) {
    die("Failed");
}
header('Content-Type: text/html; charset=UTF-8');
