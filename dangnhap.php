<?php
session_start();
include "connect.php";
if (isset($_POST["email"])) {

    $search = "
        SELECT * FROM member
        WHERE email = '" . $_POST["email"] . "'
        AND password = '" . md5($_POST["password"]) . "'
        ";
    $result = $connect->query($search);
    if ($result->num_rows > 0) {
        $_SESSION["email"] = $_POST["email"];
        $sql = $result->fetch_assoc();
        $_SESSION["name"] = $sql["name"];
        echo "Yes";
    } else {
        echo "No";
    }
}
