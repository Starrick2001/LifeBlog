<head>
    <title>Life Blog</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" href="<?php echo $link; ?>img/logo/Logo1.png" sizes="32x32" type="image/png">
    <link rel="icon" href="<?php echo $link; ?>img/logo/Logo1.png" sizes="16x16" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var url = "../";
    </script>
    <script src="../function/signin-signout.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    if (isset($_GET["content"])) {
        $url = "../";
        session_start();
        include_once "../themes/navbar.php";
        require_once "connect.php";
        $limit = 10;  //giới hạn 10 post
        if (isset($_GET["page"])) {
            $page  = $_GET["page"];
        } else {
            $page = 1;
        }
        $start = ($page - 1) * $limit;
        $search =  $_GET["content"];
        $query = "  SELECT posts.post_id, content, imgUrl, author_name, author_email, title, date_time, COUNT(email) as 'Like'
                        FROM posts 
                        LEFT JOIN post_like ON post_like.post_id = posts.post_id
                        WHERE title LIKE '%$search%'
                        GROUP BY posts.post_id
                        ORDER BY COUNT(email)
                        DESC
                            , date_time
                        DESC
                        LIMIT $start, $limit
                        
            ";
        $result = $connect->query($query);
    ?>
        <main class="container">
            <!-- Khởi tạo row -->
            <div class="row mb-2">
                <?php
                $tmp = 1;
                while ($data_post = $result->fetch_assoc()) {
                ?>
                    <div class="col-lg">
                        <div class="row shadow rounded m-3 p-2">
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
                <a class="page-link" href="search.php?page=<?php echo ($page - 1) . "&content=" . $search; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php
            $result_db = mysqli_query($connect, "SELECT COUNT(post_id) FROM posts WHERE title LIKE '%$search%'");
            $row_db = mysqli_fetch_row($result_db);
            $total_records = $row_db[0];
            $total_pages = ceil($total_records / $limit);
            for ($i = 1; $i <= $total_pages; $i++) {
            ?>
                <li class='page-item <?php if ($page == $i) echo "active" ?>'><a class='page-link' href="search.php?page=<?php echo $i . "&content=" . $search; ?>"><?php echo $i; ?></a></li>
            <?php
            }
            ?>
            <li class="page-item <?php if ($page == $total_pages) echo "disabled"; ?>">
                <a class="page-link" href="search.php?page=<?php echo ($page + 1) . "&content=" . $search; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
        </main>
</body>
<?php
    }
