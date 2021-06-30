<?php
include_once "connect.php";
$cmt_id = $_GET["cmt_id"];
$sql_get_data_like = "SELECT COUNT(email) FROM cmt_like WHERE cmt_id='" . $cmt_id . "'";
$result = $connect->query($sql_get_data_like);
if ($result->num_rows > 0) {
    $data_like = $result->fetch_assoc();
}
echo "Thích " . $data_like["COUNT(email)"];
