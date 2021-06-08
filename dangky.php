<?php
if (isset($_POST["email"])) {
    include "connect.php";
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $addmemeber = "INSERT INTO member (email, password)
            VALUES ('{$email}', '{$password}')";
    if ($connect->query($addmemeber) === TRUE) {
        echo "Yes";
    } else echo "No";
}
