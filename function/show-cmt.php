<?php
session_start();
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(".cmt-like-btn").click(function() {
        var cmt_id = $(this).attr("cmt_id");
        $.ajax({
            method: "GET",
            url: url + "function/modify-cmt-like.php",
            data: {
                cmt_id: cmt_id,
                email: "<?php if (isset($_SESSION["email"])) echo $_SESSION["email"]; ?>"
            },
            success: function(data) {
                if (data == "Add") {
                    $(".cmt-like-btn[cmt_id=" + cmt_id + "]").removeClass("btn-secondary");
                    $(".cmt-like-btn[cmt_id=" + cmt_id + "]").addClass("btn-primary");
                } else {
                    $(".cmt-like-btn[cmt_id=" + cmt_id + "]").removeClass("btn-primary");
                    $(".cmt-like-btn[cmt_id=" + cmt_id + "]").addClass("btn-secondary");
                }
                $(".cmt-like-count[cmt_id=" + cmt_id + "]").load("count-cmt-like.php?cmt_id=" + cmt_id);
            }
        });
    });
</script>
<?php
require_once "connect.php";
$url = "../";
$post_id = $_GET["post_id"];
$sql_get_data_cmt = "SELECT * FROM comments, member WHERE comments.author = member.email AND post_id = {$post_id}";
$result = $connect->query($sql_get_data_cmt);
while ($comment = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
?>
    <div class="row pb-2">
        <div class="col-1 p-0">
            <a href="<?php echo $url . "function/profile.php?profile_email=" . $comment["author"] ?>"><img src="<?php echo $url . $comment["avatarUrl"] ?>" class="w-100"></a>
        </div>
        <div class="col-11">
            <a href="<?php echo $url . "function/profile.php?profile_email=" . $comment["author"] ?>"><?php echo $comment["name"] . " - " . $comment["author"] ?></a>
            <p><?php echo $comment["cmt_content"] ?></p>
            <?php
            // like
            $cmt_id = $comment["cmt_id"];
            include "cmt-like.php";
            ?>
        </div>
    </div>
    <br>
<?php
}
?>