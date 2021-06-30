<?php
include_once "connect.php";
$cmt_id = $_GET["cmt_id"];
$email = $_GET["email"];
$sql_check_user_like = "SELECT email FROM cmt_like WHERE cmt_id = '" . $cmt_id . "' AND email = '" . $email . "'";
$result = $connect->query($sql_check_user_like);
if ($result->num_rows > 0) {
    $sql_delete_like = "DELETE FROM cmt_like WHERE email='" . $email . "' AND cmt_id='" . $cmt_id . "'";
    $connect->query($sql_delete_like);
    echo "Delete";
} else {
    $sql_add_like = "INSERT INTO cmt_like (cmt_id, email) VALUES ('{$cmt_id}', '{$email}')";
    $connect->query($sql_add_like);
    echo "Add";
}
?>