<?php
require_once "connect.php";
$sql_delete_cmt = "DELETE FROM comments WHERE cmt_id = '" . $_GET["cmt_id"] . "'";
$sql_delete_child_cmt = "DELETE FROM comments WHERE cmt_parent = '" . $_GET["cmt_id"] . "'";
$connect->query($sql_delete_cmt);
$connect->query($sql_delete_child_cmt);