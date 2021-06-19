<?php
session_start();
if (isset($_SESSION["email"])) {
    include_once "connect.php";
    $content = $_POST["content"];
    $author = $_SESSION["email"];
    // $sql = "INSERT INTO comments (post_id, content, author) VALUES"
} else {
    echo "No";
}
?>