<?php
include_once "connect.php";
$post_id = $_GET["post_id"];
$email = $_GET["email"];
$sql_check_user_like = "SELECT email FROM post_like WHERE post_id = '" . $post_id . "' AND email = '" . $email . "'";
$result = $connect->query($sql_check_user_like);
if ($result->num_rows > 0) {
    $sql_delete_like = "DELETE FROM post_like WHERE email='" . $email . "' AND post_id='" . $post_id . "'";
    $connect->query($sql_delete_like);
    echo "Delete";
} else {
    $sql_add_like = "INSERT INTO post_like (post_id, email) VALUES ('{$post_id}', '{$email}')";
    $connect->query($sql_add_like);
    echo "Add";
}
