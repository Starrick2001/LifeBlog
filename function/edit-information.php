<?php
session_start();
include_once "connect.php";
$name = $_POST["name"];
$birth = $_POST["birth"];
$password = md5($_POST["password"]);
$search = "
        SELECT email, password FROM member
        WHERE email = '" . $_SESSION["email"] . "'
        AND password = '" . $password . "'
        ";
$result_search = $connect->query($search);
if ($result_search->num_rows > 0) {
    $sql_edit_information = "
                            UPDATE member 
                            SET name = '" . $name . "', birth = '" . $birth . "'
                            WHERE email = '" . $_SESSION["email"] . "'";
    $sql_edit_author_posts = "
                            UPDATE posts
                            SET author = '" . $name . " - " . $_SESSION["email"] . "'
                            WHERE author = '" . $_SESSION["name"] . " - " . $_SESSION["email"] . "'
    ";
    $connect->query($sql_edit_information);
    $connect->query($sql_edit_author_posts);
    $_SESSION["name"] = $name;    
    echo "Yes";
}
else {
    echo "No";
}
