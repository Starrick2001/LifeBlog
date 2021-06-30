<?php
session_start();
include_once "function/connect.php";
$query = "  SELECT posts.post_id, content, imgUrl, author, title, COUNT(email) as 'Like'
                    FROM posts 
                    LEFT JOIN post_like ON post_like.post_id = posts.post_id
                    GROUP BY posts.post_id
                    ORDER BY COUNT(email)
                    DESC
        ";
$result = $connect->query($query);
?>
<!DOCTYPE html>

<html>

<head>
    <title>Life Blog</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/logo/Logo1.png" sizes="32x32" type="image/png">
    <link rel="icon" href="img/logo/Logo1.png" sizes="16x16" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var url = "";
    </script>
    <script src="function/signin-signout.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <!-- Navbar -->
    <?php
    $url = "";
    $setVisibleCreatePostBtn = true;
    include $url . "themes/navbar.php";
    ?>
    <!-- Navbar -->
    <main class="container">
        <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel" data-touch="true">


            <!-- Indicator -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="3"></button>
            </div>

            <!-- main carousel -->
            <?php $data_post = $result->fetch_assoc(); ?>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo $data_post["imgUrl"]; ?>" class="d-block w-100" style="object-fit:cover" width="960px" height="540px">
                    <div class="carousel-caption d-none d-md-block bg-text">
                        <h5><?php echo $data_post["title"]; ?></h5>
                        <p>
                            <?php
                            if (strlen($data_post["content"]) > 300)
                                $content =  mb_substr($data_post["content"], 0, 300, "utf-8") . "...";
                            else $content = $data_post["content"];
                            echo $content;
                            ?>
                        </p>
                        <a class="btn btn-light" href=<?php echo $url . "function/post.php?post_id=" . $data_post["post_id"]; ?>>Xem thêm</a>
                    </div>
                </div>
                <?php $data_post = $result->fetch_assoc(); ?>
                <div class="carousel-item ">
                    <img src="<?php echo $data_post["imgUrl"]; ?>" class="d-block w-100" style="object-fit:cover" width="960px" height="540px">
                    <div class="carousel-caption d-none d-md-block bg-text">
                        <h5><?php echo $data_post["title"]; ?></h5>
                        <p>
                            <?php
                            if (strlen($data_post["content"]) > 300)
                                $content =  mb_substr($data_post["content"], 0, 300, "utf-8") . "...";
                            else $content = $data_post["content"];
                            echo $content;
                            ?>
                        </p>
                        <a class="btn btn-light" href=<?php echo $url . "function/post.php?post_id=" . $data_post["post_id"]; ?>>Xem thêm</a>
                    </div>
                </div>
                <?php $data_post = $result->fetch_assoc(); ?>
                <div class="carousel-item">
                    <img src="<?php echo $data_post["imgUrl"]; ?>" class="d-block w-100" style="object-fit:cover" width="960px" height="540px">
                    <div class="carousel-caption d-none d-md-block bg-text">
                        <h5><?php echo $data_post["title"]; ?></h5>
                        <p>
                            <?php
                            if (strlen($data_post["content"]) > 300)
                                $content =  mb_substr($data_post["content"], 0, 300, "utf-8") . "...";
                            else $content = $data_post["content"];
                            echo $content;
                            ?>
                        </p>
                        <a class="btn btn-light" href=<?php echo $url . "function/post.php?post_id=" . $data_post["post_id"]; ?>>Xem thêm</a>
                    </div>
                </div>
                <?php $data_post = $result->fetch_assoc(); ?>
                <div class="carousel-item">
                    <img src="<?php echo $data_post["imgUrl"]; ?>" class="d-block w-100" style="object-fit:cover" width="960px" height="540px">
                    <div class="carousel-caption d-none d-md-block bg-text">
                        <h5><?php echo $data_post["title"]; ?></h5>
                        <p>
                            <?php
                            if (strlen($data_post["content"]) > 300)
                                $content =  mb_substr($data_post["content"], 0, 300, "utf-8") . "...";
                            else $content = $data_post["content"];
                            echo $content;
                            ?>
                        </p>
                        <a class="btn btn-light" href=<?php echo $url . "function/post.php?post_id=" . $data_post["post_id"]; ?>>Xem thêm</a>
                    </div>
                </div>
            </div>



            <!-- Control buttons -->

            <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>




        <!-- Khởi tạo row -->
        <div class="row mb-2">
            <?php
            $tmp = 1;
            while ($data_post = $result->fetch_assoc()) {
            ?>
                <div class="col-lg">
                    <div class="row shadow rounded m-3 p-2">
                        <div class="col-md-4">
                            <img src="<?php echo $data_post["imgUrl"]; ?>" class="w-100" alt="" />
                        </div>
                        <div class="col-md-8">
                            <!--                            Content-->
                            <h6 class="pt-2"><?php echo $data_post["title"]; ?></h6>
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
                                if (isset($_SESSION["email"]) && $data_post["author"] == $_SESSION["name"] . " - " . $_SESSION["email"]) {
                                    include $url . "themes/edit-delete.php";
                                }
                                ?>
                                <a class="btn btn-primary" href=<?php echo $url . "function/post.php?post_id=" . $data_post["post_id"]; ?>>Xem thêm</a>
                            </p>
                        </div>
                        <p class="author text-end mt-2">
                            <?php echo "Người viết: " . $data_post["author"]; ?>
                        </p>
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
    ?>
    </main>
    <?php
    include $url . "themes/backtotopbtn.php";
    include $url . "themes/modal.php";
    ?>
</body>

</html>