<?php
    $connect = new mysqli("localhost", "root", "", "member");

    if ($connect->connect_error) {
        die("Failed");
    }
    header('Content-Type: text/html; charset=UTF-8');
?>
