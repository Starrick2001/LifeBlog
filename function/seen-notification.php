<?php
require_once "connect.php";
$sql_set_seen_noti = "UPDATE notification SET seen = 1 WHERE noti_id = '" . $_GET["noti_id"] . "'";
$connect->query($sql_set_seen_noti);