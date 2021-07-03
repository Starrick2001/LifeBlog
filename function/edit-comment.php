<?php
require_once "connect.php";
$sql_update_cmt = "UPDATE comments SET cmt_content = '" . $_POST["cmt_content"] . "' WHERE cmt_id = '" . $_POST["cmt_id"] . "'";
$connect->query($sql_update_cmt);