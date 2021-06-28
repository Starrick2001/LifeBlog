<?php
include_once "connect.php";
$post_id = $_GET["post_id"];
$sql_get_data_like = "SELECT COUNT(email) FROM post_like WHERE post_id='" . $post_id . "'";
$result = $connect->query($sql_get_data_like);
if ($result->num_rows > 0) {
    $data_like = $result->fetch_assoc();
}
echo "Thích " . $data_like["COUNT(email)"];
