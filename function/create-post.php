<?php
session_start();
?>
<html>

<head>
    <title>Thêm bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var url = "../";
    </script>
    <script src="../function/signin-signout.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo/Logo1.png" sizes="16x16" type="image/png">
    <link rel="stylesheet" href="../style.css">
    <style>
        .ck-editor {
            min-width: 100%;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <?php
    $url = "../";
    $setVisibleCreatePostBtn = false;
    include $url . "themes/navbar.php";
    ?>
    <!-- navbar -->
    <main class="form-create-post container py-3">
        <form method="POST" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Tiêu đề" name="title" required>
            </div>
            <div class="input-group mb-3">
                <textarea type="text" class="form-control" id="editor" rows="5" placeholder="Nội dung bài viết" name="content" required> </textarea>
            </div>
            <div class="mb-3">
                <input class="form-control" type="file" name="thumbnail">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Tạo</button>
            </div>
        </form>
    </main>
    <?php
    include $url . "themes/backtotopbtn.php";
    include $url . "themes/modal.php";
    ?>
    <?php
    include "connect.php";
    if (isset($_POST["title"]) && isset($_POST["content"])) {
        $title = $_POST["title"];
        $content = $_POST["content"];
        $author = $_SESSION["name"] . " - " . $_SESSION["email"];
        $target_dir = "../img/";
        $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
        $imgFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        if ($imgFileType == "jpg" || $imgFileType == "png" || $imgFileType == "jpeg") {
            if ($_FILES["thumbnail"]["size"] < 500000) {
                $imgUrl = "img/" . basename($_FILES["thumbnail"]["name"]);
                $sql = "INSERT INTO posts (title, imgUrl,content, author) VALUES ('{$title}', '{$imgUrl}', '{$content}', '{$author}')";
                mysqli_query($connect, $sql);
                move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);
                
            } else echo "<script> alert('Kích thước ảnh quá lớn');</script>";
        } else {
            $imgUrl = "img/logo/Logo2.png";
            $sql = "INSERT INTO posts (title, imgUrl,content, author) VALUES ('{$title}', '{$imgUrl}', '{$content}', '{$author}')";
                mysqli_query($connect, $sql);
            if ($imgFileType != "")
                echo "<script> alert('Chỉ hỗ trợ định dạng JPEG, PNG, JPG.');</script>";
        }
    }
    ?>
    <script>
        ClassicEditor.create(document.querySelector("#editor"), {
                toolbar: {
                    shouldNotGroupWhenFull: true
                }
            })

            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>