<?php
include_once "connect.php";
session_start();
$post_id = $_POST["post_id"];
$cmt_content = $_POST["cmt_content"];
$cmt_parent = $_POST["cmt_parent"];
$author = $_SESSION["email"];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date("Y-m-d G:i:s");
$sql = "INSERT INTO comments (post_id,  cmt_content, cmt_parent, author, date_time) VALUES ('{$post_id}', '{$cmt_content}','{$cmt_parent}' , '{$author}', '{$date}')";
if ($connect->query($sql) == TRUE) {
    if ($cmt_parent != 0) {
        $sql_get_data_for_noti = "SELECT author, post_id FROM comments WHERE cmt_id = '" . $cmt_parent . "'";
        $result = $connect->query($sql_get_data_for_noti)->fetch_assoc();
        if ($result["author"] != $author) {
            $noti_content = "<strong>" . $author . "</strong> đã trả lời về bình luận của bạn";
            $sql_noti_content = "INSERT INTO notification (noti_content, TIME, email, seen, post_id) VALUES ('{$noti_content}', '{$date}', '{$result["author"]}', 0, '{$result["post_id"]}')";
            $connect->query($sql_noti_content);
        }
    } else {
        $sql_get_data_for_noti = "SELECT author_email FROM posts WHERE post_id = '" . $post_id . "'";
        $result_post = $connect->query($sql_get_data_for_noti)->fetch_assoc();
        if ($result_post["author_email"] != $author) {
            $noti_content = "<strong>" . $author . "</strong> đã bình luận về bài viết của bạn";
            $sql_noti_content = "INSERT INTO notification (noti_content, TIME, email, seen, post_id) VALUES ('{$noti_content}', '{$date}', '{$result_post["author_email"]}', 0, '{$post_id}')";
            $connect->query($sql_noti_content);
        }
    }
}
