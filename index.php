<?php
session_start();
include_once "function/connect.php";
$query = "  SELECT posts.post_id, content, imgUrl, author, title, date_time, COUNT(email) as 'Like'
                    FROM posts 
                    LEFT JOIN post_like ON post_like.post_id = posts.post_id
                    GROUP BY posts.post_id
                    ORDER BY COUNT(email)
                    DESC
                            , date_time
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
    <link rel="icon" href="https://lifeblog.s3.ap-southeast-1.amazonaws.com/img/logo/Logo1.png" sizes="32x32" type="image/png">
    <link rel="icon" href="https://lifeblog.s3.ap-southeast-1.amazonaws.com/img/logo/Logo1.png" sizes="16x16" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var url = "";
    </script>
    <script src="function/signin-signout.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 3s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>
</head>
<body>
<?php
    $url = "";
    $setVisibleCreatePostBtn = true;
    include $url . "themes/navbar.php";
    ?>
    <?php $data_post = $result->fetch_assoc(); ?>
<div class="slideshow-container">
<div class="mySlides fade">
  <div class="numbertext">1 / 4</div>
  <img src="Picture/pic1.jpg"style="width:960px; height: 490px;">
  <div class="text">
  
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
<?php $data_post = $result->fetch_assoc(); ?>
<div class="mySlides fade">
  <div class="numbertext">2 / 4</div>
  <img src="Picture/pic2.jpg" style="width:960px; height: 490px;">
  <div class="text">
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

<?php $data_post = $result->fetch_assoc(); ?>
<div class="mySlides fade">
  <div class="numbertext">3 / 4</div>
  <img src="Picture/pic3.jpg" style="width:960px; height: 490px;">
  <div class="text">
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
<?php $data_post = $result->fetch_assoc(); ?>
<div class="mySlides fade">
  <div class="numbertext">4 / 4</div>
  <img src="Picture/pic4.jpg" style="width:960px; height: 490px;">
  <div class="text">
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

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
</div>

<script>

var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2200); // chuyển sau 3s
}
 </script> 
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
                                if (isset($_SESSION["email"]) && $data_post["author"] == $_SESSION["name"] . " - " . $_SESSION["email"]) {
                                    include $url . "themes/edit-delete.php";
                                }
                                ?>
                                <a class="btn btn-primary m-1" href=<?php echo $url . "function/post.php?post_id=" . $data_post["post_id"]; ?>>Xem thêm</a>
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