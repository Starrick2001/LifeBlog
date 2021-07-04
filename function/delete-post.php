<?php
include_once "connect.php";
$post_id = $_GET["post_id"];
$sql_get_imgUrl = "SELECT imgUrl FROM posts WHERE post_id = '" . $post_id . "'";
$result = $connect->query($sql_get_imgUrl);
if ($imgUrl = $result->fetch_assoc()) {
    if ($imgUrl["imgUrl"] != NULL) {
        require '../vendor/autoload.php';

        $s3 = new Aws\S3\S3Client([
            'region'  => 'ap-southeast-1',
            'version' => 'latest',
            'credentials' => [
                'key'    => $access_key_id,
                'secret' => $secret
            ]
        ]);

        $result = $s3->deleteObject([
            'Bucket' => $bucket_name,
            'Key'    => $imgUrl["imgUrl"]
        ]);
    }
}
$sql_delete_post = "DELETE FROM posts WHERE post_id = '" . $post_id . "'";
$connect->query($sql_delete_post);



echo "<script>window.location.href = 'javascript:history.go(-1)';</script>";
