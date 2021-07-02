<?php
require_once "connect.php";
$post_id = $_GET["post_id"];
$email = $_GET["email"];
$sql_check_user_like = "SELECT email, author_email FROM post_like, posts WHERE post_like.post_id = posts.post_id AND post_like.post_id = '" . $post_id . "' AND email = '" . $email . "'";
$result = $connect->query($sql_check_user_like);
if ($result && $result->num_rows > 0) {
    $author = $result->fetch_assoc();
    $sql_delete_like = "DELETE FROM post_like WHERE email='" . $email . "' AND post_id='" . $post_id . "'";
    $connect->query($sql_delete_like);
    if ($email != $author["author_email"]) {
        $sql_delete_noti = "DELETE FROM notification WHERE email = '" . $author["author_email"] . "' AND post_id = '" . $post_id . "'";
        $connect->query($sql_delete_noti);
    }
    echo "Delete";
} else {
    $sql_add_like = "INSERT INTO post_like (post_id, email) VALUES ('{$post_id}', '{$email}')";
    $connect->query($sql_add_like);
    $sql_get_author = "SELECT author_email FROM posts WHERE post_id = '" . $post_id . "'";
    $author = $connect->query($sql_get_author)->fetch_assoc();
    if ($email != $author["author_email"]) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y-m-d G:i:s");
        $noti_content = "<strong>" . $email . "</strong> đã thích bài viết của bạn";
        $sql_add_noti = "INSERT INTO notification (noti_content, TIME, email, seen, post_id) VALUES ('{$noti_content}', '{$date}', '{$author["author_email"]}', 0, '{$post_id}')";
        $connect->query($sql_add_noti);
    }
    echo "Add";
}
