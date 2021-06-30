<?php
session_start();
// require("vendor/autoload.php");
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

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/159414778_505907824146012_4802705699852904088_n.png" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block bg-text">
                        <h5>CHĂM SÓC BẢN THÂN (SELF-CARE) HAY LÀ ÍCH KỶ (SELFISH)? </h5>
                        <p>Ai trong chúng ta cũng có những nhu cầu riêng cho bản thân dù trong bất kỳ khía cạnh nào
                            trong cuộc sống: công việc, gia đình, mối quan hệ, hay chỉ đơn giản là nhu cầu ăn uống, vui
                            chơi, nghỉ ngơi.</p>
                        <a class="btn btn-light" href="posts/Chamsoc.php">Xem thêm</a>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img src="img/161172302_506101420793319_50094516776462664_n.png" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block bg-text">
                        <h5>XỬ LÝ CÁC CẢM XÚC TIÊU CỰC
                        </h5>
                        <p>Mình nghĩ là nhiều người trong chúng ta hơi kém trong việc đối mặt và xử lý các cảm xúc tiêu
                            cực. Mỗi khi chúng ta rơi vào trạng thái đau khổ, buồn bã hoặc cảm thấy khổ sở, ta thường cố
                            gắng vật vã tìm cách nào nhanh nhất có thể để ngắt mình khỏi cảm xúc ấy.</p>
                        <a class="btn btn-light" href="posts/Xuly.php">Xem thêm</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/162535409_509034327166695_2726708296117186477_n.jpg" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block bg-text">
                        <h5>ĐỪNG BỎ QUA NHỮNG NỖI ĐAU NHỎ </h5>
                        <p>Đã bao giờ bạn tự nhiên cảm thấy rất đau, sợ hãi, lo lắng, buồn, khổ sở mà không hề có lý do
                            cụ thể không?</p>
                        <a class="btn btn-light" href="posts/Dungboqua.php">Xem thêm</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/162809020_511778586892269_3687806669231235166_n.png" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block bg-text">
                        <h5>ĐI NGƯỢC LẠI VỚI ĐỊNH NGHĨA "THÀNH CÔNG"?</h5>
                        <p>Tôi ngày càng trở nên dễ tâm giao với các bạn trẻ gần tới 30, liệu chăng là luật hấp dẫn, hay
                            vì 1 lí do gì khác, tôi cũng không biết nữa. Tôi vẫn nhớ hoài năm tôi 29 tuổi, chính thức
                            chia tay mối tình bình yên một cách văn minh. Rồi 30 tuổi, tôi bắt đầu hành trình đi sâu vào
                            trong mình qua những khóa học phát triển bản thân.
                            Năm 30 tuổi ấy, tôi đổi nghề.</p>
                        <a class="btn btn-light" href="posts/Dinguoc.php">Xem thêm</a>
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


        <?php
        include_once "function/connect.php";
        $query = "  SELECT posts.post_id, content, imgUrl, author, title, COUNT(email) as 'Like'
                    FROM posts 
                    LEFT JOIN post_like ON post_like.post_id = posts.post_id
                    GROUP BY posts.post_id
                    ORDER BY COUNT(email)
                    DESC
        ";
        $result = mysqli_query($connect, $query);
        ?>

        <!-- Khởi tạo row -->
        <div class="row mb-2">
            <?php
            $tmp = 1;
            while ($data_post = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
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