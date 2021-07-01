<?php
include_once "connect.php";
$post_id = $_GET["post_id"];
$sql_delete_post = "DELETE FROM posts WHERE post_id = '" . $post_id . "'";
$connect->query($sql_delete_post);
echo "<script>window.location.href = 'javascript:history.go(-1)';</script>";
