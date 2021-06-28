<?php
include_once "connect.php";
session_start();
$post_id = $_POST["post_id"];
$cmt_parent = 0;
$cmt_like = 0;
$cmt_content = $_POST["cmt_content"];
$author = $_SESSION["email"];
$sql = "INSERT INTO comments (post_id, cmt_parent, cmt_like, cmt_content, author) VALUES ('{$post_id}', '{$cmt_parent}', '{$cmt_like}', '{$cmt_content}', '{$author}')";
$connect->query($sql);
?>