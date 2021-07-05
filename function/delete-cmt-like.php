<?php
require_once "connect.php";
$cmt_id = $_GET["cmt_id"];
$email = $_GET["email"];
$sql_check_user_like = "SELECT email, author, post_id FROM cmt_like, comments WHERE cmt_like.cmt_id = comments.cmt_id AND cmt_like.cmt_id = '" . $cmt_id . "' AND email = '" . $email . "'";
$result = $connect->query($sql_check_user_like);
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    if ($email != $data["author"]) {
        $sql_delete_noti = "DELETE FROM notification WHERE email = '" . $data["author"] . "' AND post_id = '" . $data["post_id"] . "'";
        $connect->query($sql_delete_noti);
    }
    $sql_delete_like = "DELETE FROM cmt_like WHERE email='" . $email . "' AND cmt_id='" . $cmt_id . "'";
    if ($connect->query($sql_delete_like) === TRUE)
        echo "Delete";
}
