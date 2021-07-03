<?php
session_start();
require_once "connect.php";
$url = "../";
$post_id = $_GET["post_id"];
$cmt_parent = $_GET["cmt_parent"];
?>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php
    $sql_get_data_cmt = "SELECT * FROM comments, member WHERE comments.author = member.email AND post_id = {$post_id} AND cmt_parent = {$cmt_parent} ORDER BY date_time ASC";
    $result = $connect->query($sql_get_data_cmt);
    while ($comment = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    ?>
        <div class="row pb-2 m-2">
            <div class="col-1 p-0">
                <a href="<?php echo $url . "function/profile.php?profile_email=" . $comment["author"] ?>"><img src="<?php echo "https://lifeblog.s3.ap-southeast-1.amazonaws.com/" . $comment["avatarUrl"] ?>" class="w-100"></a>
            </div>
            <div class="col-11">
                <div class="row">
                    <a class="col" href="<?php echo $url . "function/profile.php?profile_email=" . $comment["author"] ?>"><?php echo $comment["name"] . " - " . $comment["author"] ?></a>
                    <span class="text-end col"><?php echo $comment["date_time"]; ?></span>
                </div>
                <p><?php echo $comment["cmt_content"] ?></p>
                <?php
                // like
                // Kiếm tra đã đăng nhập chưa
                if (isset($_SESSION["email"])) {
                    $sql_check_user_like = "SELECT email FROM cmt_like WHERE cmt_id='" . $comment["cmt_id"] . "' AND email='" . $_SESSION["email"] . "'";
                    $result_check_user_like = $connect->query($sql_check_user_like);
                    // Kiểm tra user đã like chưa
                    if ($result_check_user_like->num_rows > 0) {
                ?>
                        <button type="button" class="btn btn-primary cmt-like-btn m-1" cmt_id=<?php echo $comment["cmt_id"]; ?>>
                        <?php
                    } else {
                        ?>
                            <button type="button" class="btn btn-secondary cmt-like-btn m-1" cmt_id=<?php echo $comment["cmt_id"]; ?>>
                            <?php
                        }
                            ?>

                        <?php
                    } else {
                        ?>
                            <button type="button" class="btn btn-secondary m-1" data-bs-toggle="modal" data-bs-target="#signin-notification">
                            <?php
                        }
                        $sql_get_cmt_data_like = "SELECT COUNT(email) FROM cmt_like WHERE cmt_id='" . $comment["cmt_id"] . "'";
                        $result_cmt_like = $connect->query($sql_get_cmt_data_like);
                        if ($result_cmt_like->num_rows > 0) {
                            $data_cmt_like = $result_cmt_like->fetch_assoc();
                        }
                            ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"></path>
                            </svg>
                            <span class="cmt-like-count" cmt_id=<?php echo $comment["cmt_id"]; ?>>Thích <?php echo $data_cmt_like["COUNT(email)"]; ?></span>
                            </button>
                            <!-- Trả lời -->
                            <?php
                            if (isset($_SESSION["email"])) {
                            ?>
                                <button type="button" class="btn btn-secondary cmt-btn-show m-1" cmt_id=<?php echo $comment["cmt_id"]; ?> status="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right-text" viewBox="0 0 16 16">
                                        <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"></path>
                                        <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"></path>
                                    </svg>
                                    Trả lời
                                </button>
                                <div class="type-cmt" cmt_id=<?php echo $comment["cmt_id"]; ?>></div>
                            <?php
                            }
                            ?>
                            <?php
                            $sql_get_cmt_child = "SELECT * FROM comments, member WHERE comments.author = member.email AND post_id = {$post_id} AND cmt_parent = '" . $comment["cmt_id"] . "'";
                            $result_get_cmt_child = $connect->query($sql_get_cmt_child);
                            if ($result_get_cmt_child->num_rows > 0) {
                            ?>
                                <div class="cmt_child" cmt_parent="<?php echo $comment["cmt_id"]; ?>"></div>
                                <script>
                                    $(".cmt_child[cmt_parent=" + <?php echo $comment["cmt_id"]; ?> + "]").load("show-cmt.php?post_id=<?php echo $post_id; ?>&cmt_parent=<?php echo $comment["cmt_id"]; ?>");
                                </script>
                            <?php
                            }
                            ?>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $(".cmt-like-btn").unbind().click(function() {
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
                            }
                            if (data == "Delete") {
                                $(".cmt-like-btn[cmt_id=" + cmt_id + "]").removeClass("btn-primary");
                                $(".cmt-like-btn[cmt_id=" + cmt_id + "]").addClass("btn-secondary");
                            }
                            $(".cmt-like-count[cmt_id=" + cmt_id + "]").load("count-cmt-like.php?cmt_id=" + cmt_id);
                        }
                    });
                });


                $(".cmt-btn-show[status=false]").unbind().click(function() {
                    var cmt_id = $(this).attr("cmt_id");
                    $(".cmt-btn-show[cmt_id=" + cmt_id + "]").removeClass("btn-secondary");
                    $(".cmt-btn-show[cmt_id=" + cmt_id + "]").addClass("btn-primary");
                    $(".type-cmt[cmt_id=" + cmt_id + "]").load("../themes/comment.php?post_id=<?php echo $post_id ?>&cmt_parent=" + cmt_id);
                    $(this).attr("status", "true");
                });
            })
        </script>
</body>
<?php
    }
?>