<div id="cmt p-2">
    <h3>Bình luận</h3>
    <form method="POST">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="cmt_content" placeholder="Nhập bình luận" required>
            <button type="submit" class="btn btn-primary" name="submit" id="cmt-btn">Bình luận</button>
        </div>
    </form>
</div>
<?php
global $post_id;
global $url;
include_once $url . "function/show-cmt.php";
if (isset($_POST["submit"])) {
    if (isset($_SESSION["email"])) {
        include $url . "function/add-comment.php";
    } else echo "<script>alert('Bạn chưa đăng nhập tài khoản.');</script>";
}
?>