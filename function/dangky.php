<?php
if (isset($_POST["email"]) && isset($_POST['name']) && isset($_POST['birth']) && isset($_POST['birth']) && isset($_POST['password'])) {
    include "connect.php";
    $email = $_POST['email'];
    $name = $_POST['name'];
    $birth = $_POST['birth'];
    $password = md5($_POST['password']);
    $reEnterPassword = md5($_POST["reEnterPassword"]);
    $avatarUrl = "img/Logo/Logo1.png";
    $addmemeber = "INSERT INTO member (email, name, birth, password, avatarUrl)
            VALUES ('{$email}', '{$name}', '{$birth}', '{$password}', '{$avatarUrl}')";
    if ($connect->query($addmemeber) === TRUE) {
        echo "Success";
    } else echo "Email error";
}
