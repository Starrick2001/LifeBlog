<?php
$servername = "";
$username = "";
$password = "";
$database = "";
$connect = new mysqli($servername, $username, $password, $database);

if ($connect->connect_error) {
    die("Failed");
}
$connect->set_charset('utf8');

// Dùng AWS S3 để lưu trữ ảnh
/** AWS S3 Bucket Name */
$bucket_name = '';


/** AWS S3 Bucket Access Key ID */
$access_key_id = '';


/** AWS S3 Bucket Secret Access Key */
$secret = '';

/** AWS S3 URL */
$link = "";