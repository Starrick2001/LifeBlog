<?php
global $url;
global $setVisibleCreatePostBtn;
require_once $url . "function/connect.php";
?>
<html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".notification-unread").click(function() {
            var noti_id = $(this).attr("noti_id");
            var desination = $(this).attr("href");
            $.ajax({
                method: "GET",
                url: url + "function/seen-notification.php",
                data: {
                    noti_id: noti_id
                },
                success: function(data) {
                    window.location.href = desination;
                }
            })
        })
    })
</script>
<nav class="navbar navbar-light navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand px-2 py-0" href="<?php echo $url; ?>">
            <img src="<?php echo $link . 'img/logo/Logo2.png' ?>" width="56px" height="56px">
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
                        <a class="btn" href="<?php echo $url . "themes/profile.php?profile_email=" . $_SESSION["email"]; ?>"><?php echo "Xin chào " . $_SESSION["name"]; ?></a>
                    </li>
                    <li class="nav-item m-auto">
                        <div>

                            <a class="position-relative btn me-3" role="button" id="dropdownNotification" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                                </svg>
                                <?php
                                require_once $url . "function/connect.php";
                                $sql_count_unread_noti = "SELECT COUNT(noti_id) FROM notification WHERE email = '" . $_SESSION["email"] . "' AND seen = 0";
                                $result_unread = $connect->query($sql_count_unread_noti);
                                $unread = $result_unread->fetch_assoc();
                                if ($unread["COUNT(noti_id)"] > 0) {
                                ?>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary"><?php echo $unread["COUNT(noti_id)"]; ?><span class="visually-hidden">unread messages</span></span>
                                <?php
                                }
                                ?>

                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownNotification">
                                <?php
                                $sql_get_data_noti = "SELECT * FROM notification WHERE email = '" . $_SESSION["email"] . "' ORDER BY seen ASC, TIME DESC";
                                $result_data_noti = $connect->query($sql_get_data_noti);
                                if ($result_data_noti->num_rows > 0) {
                                    while ($data_noti = $result_data_noti->fetch_assoc()) {
                                        if ($data_noti["seen"] == 0) {
                                ?>
                                            <li class="p-2">
                                                <a class="alert alert-primary dropdown-item notification-unread position-relative mb-1" noti_id=<?php echo $data_noti["noti_id"]; ?> href=<?php echo $url . "themes/post.php?post_id=" . $data_noti["post_id"]; ?>><?php echo $data_noti["noti_content"]; ?>
                                                    <span class="position-absolute top-0 start-0 translate-middle p-2 bg-primary border border-light rounded-circle">
                                                        <span class="visually-hidden">New</span>
                                                    </span><br>
                                                    <p class="text-muted text-end"><?php echo $data_noti["TIME"]; ?></p>
                                                </a>
                                            </li>
                                        <?php
                                        } else {
                                        ?>
                                            <li class="p-2">
                                                <a class="alert alert-dark dropdown-item position-relative mb-1" noti_id=<?php echo $data_noti["noti_id"]; ?> href=<?php echo $url . "themes/post.php?post_id=" . $data_noti["post_id"]; ?>><?php echo $data_noti["noti_content"]; ?>
                                                    <p class="text-muted text-end"><?php echo $data_noti["TIME"]; ?></p>
                                                </a>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <li class="p-2">
                                        <p class="text-muted text-end alert alert-dark dropdown-item position-relative mb-1">Không có thông báo</p>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </li>
                    <?php
                    if ($setVisibleCreatePostBtn) { ?>
                        <li class="nav-item m-auto">
                            <a class="btn" href="<?php echo $url . 'function/create-post.php' ?>">Thêm bài viết</a>
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
            <form class="d-flex" action="<?php echo $url . "function/search.php";?>" method="GET">
                <input class="form-control me-2 w-50" type="text" name="content" placeholder="Tìm kiếm">
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </form>
        </div>
    </div>
</nav>

</html>