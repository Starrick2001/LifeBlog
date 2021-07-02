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
} else {
    $sql_get_data = "SELECT author, post_id FROM comments WHERE cmt_id = '" . $cmt_id . "'";
    $result_get_data = $connect->query($sql_get_data);
    $data = $result_get_data->fetch_assoc();
    if ($email != $data["author"]) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y-m-d G:i:s");
        $noti_content = "<strong>" . $email . "</strong> đã thích bình luận của bạn";
        $sql_add_noti = "INSERT INTO notification (noti_content, TIME, email, seen, post_id) VALUES ('{$noti_content}', '{$date}', '{$data["author"]}', 0, '{$data["post_id"]}')";
        $connect->query($sql_add_noti);
    }
    $sql_add_like = "INSERT INTO cmt_like (cmt_id, email) VALUES ('{$cmt_id}', '{$email}')";
    if ($connect->query($sql_add_like) === TRUE)
    echo "Add";
}
