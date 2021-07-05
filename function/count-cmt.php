<?php
$post_id = $_GET["post_id"];
require_once "connect.php";
$sql_get_num_cmt = "SELECT COUNT(author) FROM comments WHERE post_id='" . $post_id . "'";
$result_num_cmt = $connect->query($sql_get_num_cmt);
if ($result_num_cmt->num_rows > 0) {
    $num_cmt = $result_num_cmt->fetch_assoc();
}
echo "Bình luận " . $num_cmt['COUNT(author)'];