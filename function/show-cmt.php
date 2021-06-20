<?php
include_once "connect.php";
global $url;
global $post_id;
$sql_get_data_cmt = "SELECT * FROM comments, member WHERE comments.author = member.email AND post_id = {$post_id}";
$result = $connect->query($sql_get_data_cmt);
while ($comment = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
?>
    <div class="row pb-2">
        <div class="col-1 p-0">
            <img src="<?php echo $url . $comment["avatarUrl"] ?>" class="w-100">
        </div>
        <div class="col-11">
            <a href="<?php echo $url . "function/profile.php?profile_email=" . $comment["author"] ?>"><?php echo $comment["name"] . " - " . $comment["author"] ?></a>
            <p><?php echo $comment["cmt_content"] ?></p>
        </div>
    </div>
    <br>
<?php
}
?>