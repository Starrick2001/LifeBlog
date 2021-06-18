<?php
session_start();
?>
<html>

<head>
    <title>Thêm bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../function/signin-signout.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo/Logo1.png" sizes="16x16" type="image/png">
    <link rel="stylesheet" href="../style.css">

</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg bg-light">
        <a class="navbar-brand px-2" href="../">
            <img src="../img/logo/Logo2.png" width="68px" height="68px">
        </a>
        <div class="collapse navbar-collapse">
            <!-- <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" data-bs-toggle="modal" data-bs-target="#login">Đăng nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" data-bs-toggle="modal" data-bs-target="#signup">Đăng ký</a>
                    </li>
                </ul> -->

        </div>
        <form class="">
            <input class="form-control" type="text" label="Tìm kiếm" placeholder="Tìm kiếm">
        </form>
        <?php
        if (isset($_SESSION["email"])) {
        ?>
            <div class="m-auto p-2">
                <h5><?php echo "Xin chào " . $_SESSION["name"]; ?></h5>
                <a class="btn m-auto" id="logout-btn">Đăng xuất</a>
            </div>
        <?php
        } else {
        ?>
            <div>
                <a class="btn" data-bs-toggle="modal" data-bs-target="#signin">Đăng nhập</a>
                <a class="btn" data-bs-toggle="modal" data-bs-target="#signup">Đăng ký</a>
            </div>
        <?php
        }
        ?>
    </nav>
    <main class="form-create-post container py-3">
        <form method="POST" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Tiêu đề" name="title" required>
            </div>
            <div class="input-group mb-3">
                <textarea type="text" class="form-control" rows="5" placeholder="Nội dung bài viết" name="content" required></textarea>
            </div>
            <div class="mb-3">
                <input class="form-control" type="file" name="thumbnail">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Tạo</button>
            </div>
        </form>
    </main>
    <div id="back-to-top" class="position-fixed bottom-0 end-0 p-2">
        <a type="button" class="btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z">
                </path>
            </svg>
        </a>
    </div>
    <div id="modal">
        <div class="modal" id="notification" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p class="text-secondary">Tính năng này hiện đang trong giai đoạn phát triển</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="signin" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Đăng nhập</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingInputSignin" placeholder="name@example.com">
                            <label for="floatingInputSignin">Địa chỉ email</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPasswordSignin" placeholder="Password">
                            <label for="floatingPasswordSignin">Mật khẩu</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" data-bs-toggle="modal" id="signin-btn">Đăng nhập</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#notification">Quên mật khẩu</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="signup" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Đăng ký</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingInputSignup" placeholder="name@example.com">
                            <label for="floatingInputSignup">Địa chỉ email</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingNameSignup" placeholder="name">
                            <label for="floatingNameSignup">Tên</label>
                        </div>
                        <div class="form-floating">
                            <input type="date" class="form-control" id="floatingBirthSignup">
                            <label for="floatingBirthSignup">Ngày sinh</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPasswordSignup" placeholder="Password">
                            <label for="floatingPasswordSignup">Mật khẩu</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingReEnterPasswordSignup" placeholder="Password">
                            <label for="floatingReEnterPasswordSignup">Nhập lại mật khẩu</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" data-bs-toggle="modal" id="signup-btn">Đăng ký</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
    include "connect.php";
    if (isset($_POST["title"]) && isset($_POST["content"])) {
        $title = $_POST["title"];
        $content = $_POST["content"];
        $author = $_SESSION["name"]." - ".$_SESSION["email"];
        if (isset($_FILES["thumbnail"]["tmp_name"])) {
            $target_dir = "../img/";
            $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
            $imgFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $flag = false;
            if ($imgFileType == "jpg" || $imgFileType == "png" || $imgFileType == "jpeg") {
                if ($_FILES["thumbnail"]["size"] < 500000) {
                    $imgUrl = "img/".basename($_FILES["thumbnail"]["name"]);
                    $sql = "INSERT INTO posts (title, imgUrl,content, author) VALUES ('{$title}', '{$imgUrl}', '{$content}', '{$author}')";
                    mysqli_query($connect, $sql);
                    move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);
                    $flag = true;
                } else echo "<script> alert('Kích thước ảnh quá lớn');</script>";
            } else
                echo "<script> alert('Chỉ hỗ trợ định dạng JPEG, PNG, JPG.');</script>";
            if (!$flag) {
                $sql = "INSERT INTO posts (title, content, author) VALUES ('{$title}', '{$content}', '{$author}')";
                mysqli_query($connect, $sql);
            }
        }
    }
    ?>
</body>

</html>