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
$connect->query($sql);
?>