<?php
session_start();
include "connect.php";
$post_id = $_GET["post_id"];
$sql_get_data_post = "SELECT * FROM posts WHERE post_id = $post_id";
$result = $connect->query($sql_get_data_post);
if ($result->num_rows > 0) 
    $data_post = $result->fetch_assoc();
else {
    echo "404 Không tồn tại";
    exit;
}
?>

<head>
    <title><?php $data_post["title"] ?></title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var url = "../";
    </script>
    <script src="signin-signout.js"></script>
    <script src="comment.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo/Logo1.png" sizes="16x16" type="image/png">
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <!-- navbar -->
    <?php
    $url = "../";
    $setVisibleCreatePostBtn = true;
    include $url . "themes/navbar.php";
    ?>
    <!-- navbar -->


    <!-- sử dụng main bao hết nội dung web lại -->
    <main class="container">

        <!-- bao phần nội dung chính -->
        <div class="row py-3">
            <div class="col-4">
                <img src=<?php echo $url . $data_post["imgUrl"]; ?> class="w-100">
            </div>
            <div class="col-8">
                <div class="shadow rounded p-3">
                    <h2 class="text-center"><?php echo $data_post["title"]; ?></h2>
                    </br>
                    <p class="content"><?php echo $data_post["content"]; ?></p>
                </div>
            </div>
        </div>
        <!-- Bình luận -->
        <div id="cmt p-2">
            <h3>Bình luận</h3>
            <form method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="cmt-content" placeholder="Nhập bình luận" required>
                    <button type="submit" class="btn btn-primary" id="cmt-btn">Bình luận</button>
                </div>
            </form>
        </div>
        <!-- kết thúc nội dung chính -->
    </main>
    <!-- sử dụng main bao hết nội dung web lại -->
    <?php
    include $url . "themes/backtotopbtn.php";
    include $url . "themes/modal.php";
    ?>
</body>