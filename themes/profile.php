<?php
session_start();
require_once "../function/connect.php";
$url = "../";
$email = $_GET["profile_email"];
$sql_get_profile_data = "SELECT email, name, avatarUrl, birth FROM member WHERE email = '$email'";
$result = $connect->query($sql_get_profile_data);
if ($result->num_rows > 0)
    $profile_data = $result->fetch_assoc();
else {
    echo "Không tìm thấy hồ sơ.";
    exit;
}
?>

<head>
    <title>Trang cá nhân</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var url = "../";
    </script>
    <script src="../function/signin-signout.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo $link; ?>img/logo/Logo1.png" sizes="16x16" type="image/png">
    <link rel="stylesheet" href="../style.css">
    <style>
        #editInformation .form-floating:focus-within {
            z-index: 2;
        }

        #editInformation input#floatingname {
            margin-bottom: -1px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        #editInformation input#floatingBirth {
            margin-bottom: -1px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        #editInformation input#floatingPassword {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        #changePassword .form-floating:focus-within {
            z-index: 2;
        }

        #changePassword input#floatingOldPassword {
            margin-bottom: -1px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        #changePassword input#floatingNewPassword {
            margin-bottom: -1px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        #changePassword input#floatingReEnterNewPassword {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
    <script>
        $(document).ready(function() {
            $("#save-btn").click(function() {
                var password = $('#floatingPassword').val();
                var name = $("#floatingName").val();
                if (name == "")
                    alert("Tên không được bỏ trống.");
                else {
                    var birth = $("#floatingBirth").val();
                    if (birth == "")
                        alert("Ngày sinh không được bỏ trống.");
                    else {
                        $.ajax({
                            method: "POST",
                            url: url + "function/edit-information.php",
                            data: {
                                name: name,
                                birth: birth,
                                password: password
                            },
                            success: function(data) {
                                if (data == "Yes") {
                                    $("#editInformation").hide();
                                    location.reload();
                                }
                                if (data == "No") {
                                    alert("Sai mật khẩu.");
                                }
                            }
                        })
                    }
                }
            });

            $("#change-password-btn").click(function() {
                var oldPassword = $('#floatingOldPassword').val();
                var password = $("#floatingNewPassword").val();
                var reenterPassword = $('#floatingReEnterNewPassword').val();
                if (password == "" || reenterPassword == "")
                    alert("Mật khẩu không được bỏ trống");
                else
                if (password != reenterPassword)
                    alert("Mật khẩu không khớp");
                else {
                    $.ajax({
                        method: "POST",
                        url: url + "function/change-password.php",
                        data: {
                            oldPassword: oldPassword,
                            password: password
                        },
                        success: function(data) {
                            if (data == "Yes") {
                                $("#change-password-btn").hide();
                                location.reload();
                            }
                            if (data == "No") {
                                alert("Sai mật khẩu.");
                            }
                        }
                    });
                }
            });
        });
    </script>
</head>

<body>

    <!-- navbar -->
    <?php
    $setVisibleCreatePostBtn = true;
    include $url . "themes/navbar.php";
    ?>
    <!-- navbar -->


    <!-- sử dụng main bao hết nội dung web lại -->
    <main class="container pt-2">
        <!-- bao phần nội dung chính -->
        <div class="row shadow m-3 p-2">
            <div class="col-md-2 position-relative my-3">
                <img src="<?php echo $link . $profile_data["avatarUrl"] ?>" class="w-100">
            </div>
            <div class="col-md-10 my-3">
                <h2 class="mt-3"><?php echo $profile_data["name"]; ?></h2>
                <h5>Địa chỉ email: <?php echo $profile_data["email"]; ?> </h5>
                <?php
                if (isset($_SESSION["email"]) && $email == $_SESSION["email"]) {
                ?>
                    <a class="btn btn-outline-primary m-1" data-bs-toggle="modal" data-bs-target="#editInformation">Sửa thông tin</a>
                    <a class="btn btn-outline-primary m-1" data-bs-toggle="modal" data-bs-target="#changePassword">Đổi mật khẩu</a>
                    <label for="avatar" class="btn-outline-primary btn m-1"> Sửa ảnh đại diện</label>
                    <form method="POST" enctype="multipart/form-data" class="">
                        <input type="file" name="avatar" onchange="form.submit()" id="avatar" class="d-none" accept="image/*">
                    </form>
                <?php
                }
                ?>
                <?php
                if (isset($_FILES["avatar"]["name"])) {
                    require_once "../function/connect.php";
                    $target_dir = "../img/avatar/";
                    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
                    $imgFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    if ($imgFileType == "jpg" || $imgFileType == "png" || $imgFileType == "jpeg") {
                        if ($_FILES["avatar"]["size"] < 500000) {
                            $imgUrl = "img/avatar/" . $_SESSION["email"] . "." . $imgFileType;
                            $sql = "UPDATE member SET avatarUrl = '" . $imgUrl . "' WHERE email = '" . $_SESSION["email"] . "'";
                            mysqli_query($connect, $sql);
                            // move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
                            require '../vendor/autoload.php';


                            $file_name = $_SESSION["email"] . "." . $imgFileType;
                            $temp_file_location = $_FILES['avatar']['tmp_name'];
                            $s3 = new Aws\S3\S3Client([
                                'region'  => 'ap-southeast-1',
                                'version' => 'latest',
                                'credentials' => [
                                    'key'    => $access_key_id,
                                    'secret' => $secret
                                ]
                            ]);

                            $result = $s3->putObject([
                                'Bucket' => $bucket_name,
                                'Key'    => 'img/avatar/' . $file_name,
                                'SourceFile' => $temp_file_location,
                                'ACL' => 'public-read'
                            ]);
                        } else echo "<script> alert('Kích thước ảnh quá lớn');</script>";
                    } else
                        echo "<script> alert('Chỉ hỗ trợ định dạng JPEG, PNG, JPG.');</script>";
                    echo "<script>window.location.href = '';</script>";
                } ?>

            </div>
        </div>
        <!-- Bài viết -->
        <h1 class="text-center">Danh sách các bài viết</h1>
        <?php
        require_once $url . "function/connect.php";
        $name = $profile_data["name"];
        // $query = "SELECT * FROM posts WHERE author_email = '" . $email . "' ORDER BY date_time DESC";
        // $result = mysqli_query($connect, $query);
        $limit = 10;  //giới hạn 10 post
        if (isset($_GET["page"])) {
            $page  = $_GET["page"];
        } else {
            $page = 1;
        }
        $start = ($page - 1) * $limit;
        $query = "  SELECT * FROM posts WHERE author_email = '" . $email . "' ORDER BY date_time DESC
                    LIMIT $start, $limit
                        
            ";
        $result = $connect->query($query);
        ?>

        <!-- Khởi tạo row -->
        <div class="row mb-2">
            <?php
            $tmp = 1;
            while ($data_post = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>
                <div class="col-lg">
                    <div class="row shadow rounded m-3 p-2">
                        <?php
                        if ($data_post["imgUrl"] != NULL) {
                        ?>
                            <div class="col-md-4">
                                <img src="<?php echo $link . $data_post["imgUrl"]; ?>" class="w-100" />
                            </div>
                            <div class="col-md-8">
                                <!--                            Content-->
                                <h6 class="pt-2"><?php echo $data_post["title"]; ?></h6>
                                <div class="text-muted"><?php echo $data_post["date_time"] ?></div>
                                <p class="content">
                                    <?php
                                    if (strlen($data_post["content"]) > 300)
                                        $content =  mb_substr($data_post["content"], 0, 300, "utf-8") . "...";
                                    else $content = $data_post["content"];
                                    echo $content;
                                    ?>
                                </p>
                                <p class="text-end">
                                    <?php
                                    if (isset($_SESSION["email"]) && $data_post["author_email"] == $_SESSION["email"]) {
                                        include $url . "themes/edit-delete.php";
                                    }
                                    ?>
                                    <a class="btn btn-primary m-1" href=<?php echo $url . "themes/post.php?post_id=" . $data_post["post_id"]; ?>>Xem thêm</a>
                                </p>
                            </div>
                            <p class="author text-end mt-2">
                                Người viết:
                                <a href=<?php echo $url . "themes/profile.php?profile_email=" . $data_post["author_email"]; ?>><?php echo $data_post["author_name"] . " - " . $data_post["author_email"]; ?></a>
                            </p>
                        <?php
                        } else {
                        ?>
                            <div class="col-md">
                                <!--                            Content-->
                                <h6 class="pt-2"><?php echo $data_post["title"]; ?></h6>
                                <div class="text-muted"><?php echo $data_post["date_time"] ?></div>
                                <p class="content">
                                    <?php
                                    if (strlen($data_post["content"]) > 300)
                                        $content =  mb_substr($data_post["content"], 0, 300, "utf-8") . "...";
                                    else $content = $data_post["content"];
                                    echo $content;
                                    ?>
                                </p>
                                <p class="text-end">
                                    <?php
                                    if (isset($_SESSION["email"]) && $data_post["author_email"] == $_SESSION["email"]) {
                                        include $url . "themes/edit-delete.php";
                                    }
                                    ?>
                                    <a class="btn btn-primary m-1" href=<?php echo $url . "themes/post.php?post_id=" . $data_post["post_id"]; ?>>Xem thêm</a>
                                </p>
                            </div>
                            <p class="author text-end mt-2">
                                Người viết:
                                <a href=<?php echo $url . "themes/profile.php?profile_email=" . $data_post["author_email"]; ?>><?php echo $data_post["author_name"] . " - " . $data_post["author_email"]; ?></a>
                            </p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
                // Cứ 2 bài post sẽ kết thúc row và tạo row mới
                if ($tmp == 2) {
                    $tmp = 1;
                ?>
        </div>
        <div class="row mb-2">
        <?php
                } else {
                    $tmp += 1;
                }
            }
            if ($tmp == 1) {
        ?>
        </div>
    <?php

            }
    ?>
    <ul class="pagination justify-content-center">
        <li class="page-item <?php if ($page == 1) echo "disabled"; ?>">
            <a class="page-link" href="profile.php?profile_email=<?php echo $email ?>&page=<?php echo $i; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php
        $result_db = mysqli_query($connect, "SELECT COUNT(post_id) FROM posts WHERE author_email = '" . $email . "'");
        $row_db = mysqli_fetch_row($result_db);
        $total_records = $row_db[0];
        $total_pages = ceil($total_records / $limit);
        for ($i = 1; $i <= $total_pages; $i++) {
        ?>
            <li class='page-item <?php if ($page == $i) echo "active" ?>'><a class='page-link' href="profile.php?profile_email=<?php echo $email ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
        }
        ?>
        <li class="page-item <?php if ($page == $total_pages) echo "disabled"; ?>">
            <a class="page-link" href="profile.php?profile_email=<?php echo $email ?>&page=<?php echo $i; ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
    <!-- Bài viết -->
    <!-- kết thúc nội dung chính -->
    <div class="modal fade" id="editInformation">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa thông tin</h5>
                </div>
                <div class="modal-body">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" value="<?php echo $profile_data["name"]; ?>" name="name">
                        <label for="floatingName">Tên</label>
                    </div>
                    <div class="form-floating">
                        <input type="date" class="form-control" id="floatingBirth" value="<?php echo $profile_data["birth"]; ?>">
                        <label for="floatingBirth">Ngày sinh</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Nhập mật khẩu</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" data-bs-toggle="modal" id="save-btn">Lưu</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="changePassword">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Đổi mật khẩu</h5>
                </div>
                <div class="modal-body">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingOldPassword" placeholder="Password">
                        <label for="floatingPassword">Nhập mật khẩu cũ</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingNewPassword" placeholder="Password">
                        <label for="floatingPassword">Nhập mật khẩu mới</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingReEnterNewPassword" placeholder="Password">
                        <label for="floatingPassword">Nhập lại mật khẩu mớI</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" data-bs-toggle="modal" id="change-password-btn">Lưu</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>

            </div>
        </div>
    </div>
    </main>
    <!-- sử dụng main bao hết nội dung web lại -->
    <?php
    include_once $url . "themes/backtotopbtn.php";
    include_once $url . "themes/modal.php";
    ?>
</body>