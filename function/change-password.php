<?php
session_start();
include_once "connect.php";
$oldPassword = md5($_POST["oldPassword"]);
$newPassword = md5($_POST["password"]);
$search = "
            SELECT email, password FROM member
            WHERE email = '" . $_SESSION["email"] . "'
            AND password = '" . $oldPassword . "'
            ";
$result_search = $connect->query($search);
if ($result_search->num_rows > 0) {
    $sql_change_password = "
                            UPDATE member 
                            SET password = '" . $newPassword . "' 
                            WHERE email = '" . $_SESSION["email"] . "'";
    if ($connect->query($sql_change_password) === TRUE)
        echo "Yes";
} else echo "No";
