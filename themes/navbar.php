<?php
    global $url;
    global $setVisibleCreatePostBtn;
?>
<html>
<nav class="navbar navbar-light navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand px-2 py-0" href="<?php echo $url;?>">
            <img src="<?php echo $url . 'img/logo/Logo2.png'?>" width="56px" height="56px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav">
                <?php
                if (isset($_SESSION["email"])) {
                ?>
                    <li class="nav-item m-auto">
                        <a class="btn" href="<?php echo $url . "function/profile.php?profile_email=" . $_SESSION["email"]; ?>"><?php echo "Xin chào " . $_SESSION["name"]; ?></a>
                    </li>
                    <?php
                    if ($setVisibleCreatePostBtn) {?>
                    <li class="nav-item m-auto">
                            <a class="btn" href="<?php echo $url . 'function/create-post.php'?>">Thêm bài viết</a>
                        </li>
                    <?php
                    } ?>
                    <li class="nav-item m-auto">
                        <a class="btn" id="logout-btn">Đăng xuất</a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item m-auto">
                        <a class="btn" data-bs-toggle="modal" data-bs-target="#signin">Đăng nhập</a>
                    </li>
                    <li class="nav-item m-auto">
                        <a class="btn" data-bs-toggle="modal" data-bs-target="#signup">Đăng ký</a>
                    </li>
                <?php
                }
                ?>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2 w-50" type="text" placeholder="Tìm kiếm">
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </form>
        </div>
    </div>
</nav>
</html>