<?php
session_start();
require_once "function/connect.php";
$limit = 10;  //giới hạn 10 post
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
} else {
    $page = 1;
};
if ($page == 1) {
    $start = 5;
} else
    $start = ($page - 1) * $limit;
// $result = mysqli_query($connect, "SELECT post_id FROM posts LIMIT $start, $limit");
$query = "  SELECT posts.post_id, content, imgUrl, author_name, author_email, title, date_time, COUNT(email) as 'Like'
                    FROM posts 
                    LEFT JOIN post_like ON post_like.post_id = posts.post_id
                    GROUP BY posts.post_id
                    ORDER BY COUNT(email)
                    DESC
                            , date_time
                    DESC
                    LIMIT $start, $limit
        ";
$result = $connect->query($query);
$query_data_carousel = "    SELECT posts.post_id, content, imgUrl, author_name, author_email, title, date_time, COUNT(email) as 'Like'
                            FROM posts 
                            LEFT JOIN post_like ON post_like.post_id = posts.post_id
                            GROUP BY posts.post_id
                            ORDER BY COUNT(email)
                            DESC
                                , date_time
                            DESC
                            LIMIT 0, 4
                        ";
$result_carousel = $connect->query($query_data_carousel);
?>
<!DOCTYPE html>

<html>

<head>
    <title>Life Blog</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="https://lifeblog.s3.ap-southeast-1.amazonaws.com/img/logo/Logo1.png" sizes="32x32" type="image/png">
    <link rel="icon" href="https://lifeblog.s3.ap-southeast-1.amazonaws.com/img/logo/Logo1.png" sizes="16x16" type="image/png">
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
        <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">


            <!-- Indicator -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="3"></button>
            </div>

            <!-- main carousel -->
            <?php $data_post = $result_carousel->fetch_assoc(); ?>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href=<?php echo $url . "function/post.php?post_id=" . $data_post["post_id"]; ?>><img src="<?php echo "https://lifeblog.s3.ap-southeast-1.amazonaws.com/" . $data_post["imgUrl"]; ?>" class="d-block w-100" style="object-fit:cover" width="960px" height="540px"></a>
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
                <?php $data_post = $result_carousel->fetch_assoc(); ?>
                <div class="carousel-item ">
                    <a href=<?php echo $url . "function/post.php?post_id=" . $data_post["post_id"]; ?>><img src="<?php echo "https://lifeblog.s3.ap-southeast-1.amazonaws.com/" . $data_post["imgUrl"]; ?>" class="d-block w-100" style="object-fit:cover" width="960px" height="540px"></a>
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
                <?php $data_post = $result_carousel->fetch_assoc(); ?>
                <div class="carousel-item">
                    <a href=<?php echo $url . "function/post.php?post_id=" . $data_post["post_id"]; ?>><img src="<?php echo "https://lifeblog.s3.ap-southeast-1.amazonaws.com/" . $data_post["imgUrl"]; ?>" class="d-block w-100" style="object-fit:cover" width="960px" height="540px"></a>
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
                <?php $data_post = $result_carousel->fetch_assoc(); ?>
                <div class="carousel-item">
                    <a href=<?php echo $url . "function/post.php?post_id=" . $data_post["post_id"]; ?>><img src="<?php echo "https://lifeblog.s3.ap-southeast-1.amazonaws.com/" . $data_post["imgUrl"]; ?>" class="d-block w-100" style="object-fit:cover" width="960px" height="540px"></a>
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
                            <img src="<?php echo "https://lifeblog.s3.ap-southeast-1.amazonaws.com/" . $data_post["imgUrl"]; ?>" class="w-100" />
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
                                <a class="btn btn-primary m-1" href=<?php echo $url . "function/post.php?post_id=" . $data_post["post_id"]; ?>>Xem thêm</a>
                            </p>
                        </div>
                        <p class="author text-end mt-2">
                            Người viết:
                            <a href=<?php echo "function/profile.php?profile_email=" . $data_post["author_email"]; ?>><?php echo $data_post["author_name"] . " - " . $data_post["author_email"]; ?></a>
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
    <ul class="pagination justify-content-center">
        <li class="page-item <?php if ($page == 1) echo "disabled"; ?>">
            <a class="page-link" href="index.php?page=<?php echo ($page - 1); ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php
        $result_db = mysqli_query($connect, "SELECT COUNT(post_id) FROM posts");
        $row_db = mysqli_fetch_row($result_db);
        $total_records = $row_db[0];
        $total_pages = ceil($total_records / $limit);
        for ($i = 1; $i <= $total_pages; $i++) {
        ?>
            <li class='page-item'><a class='page-link' href='index.php?page=<?php echo $i; ?>'><?php echo $i; ?></a></li>
        <?php
        }
        ?>
        <li class="page-item <?php if ($page == $total_pages) echo "disabled"; ?>">
            <a class="page-link" href="index.php?page=<?php echo ($page + 1); ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
    </main>
    <?php
    include_once $url . "themes/backtotopbtn.php";
    include_once $url . "themes/modal.php";
    ?>
</body>

</html>