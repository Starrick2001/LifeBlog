<?php
session_start();
if (!isset($_SESSION["email"])) {
    echo "Bạn chưa đăng nhập tài khoản.";
    exit;
}
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
                <input type="text" class="form-control" placeholder="Tiêu đề" name="title" required autocomplete="off">
            </div>
            <div class="input-group mb-3">
                <textarea type="text" class="form-control" id="editor" rows="5" placeholder="Nội dung bài viết" name="content" required> </textarea>
            </div>
            <div class="input-group mb-3">
                <input class="form-control" type="file" name="thumbnail" accept="image/*">
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
    include_once "connect.php";
    if (isset($_POST["title"]) && isset($_POST["content"])) {
        $title = $_POST["title"];
        $content = $_POST["content"];
        $author_name = $_SESSION["name"];
        $author_email = $_SESSION["email"];
        $target_dir = "../img/";
        $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
        $imgFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y-m-d G:i:s");
        if ($imgFileType == "jpg" || $imgFileType == "png" || $imgFileType == "jpeg") {
            if ($_FILES["thumbnail"]["size"] < 600000) {
                $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $file_name = 'img-' . substr(str_shuffle($permitted_chars), 0, 16) . "." . $imgFileType;
                $imgUrl = "img/" . $file_name;
                $sql = "INSERT INTO posts (title, imgUrl,content, author_name, author_email, date_time) VALUES ('{$title}', '{$imgUrl}', '{$content}', '{$author_name}', '{$author_email}', '{$date}')";
                mysqli_query($connect, $sql);
                // move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);
                require '../vendor/autoload.php';

                /** AWS S3 Bucket Name */
                $bucket_name = 'lifeblog';


                /** AWS S3 Bucket Access Key ID */
                $access_key_id = 'AKIAWCMJXPOBLPCSUZVF';


                /** AWS S3 Bucket Secret Access Key */
                $secret = 'J6PScH/RMWYHIJIMgDKXqfJDazTMa40w1bTZESdt';


                $temp_file_location = $_FILES['thumbnail']['tmp_name'];
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
                    'Key'    => 'img/' . $file_name,
                    'SourceFile' => $temp_file_location,
                    'ACL' => 'public-read'
                ]);
            } else echo "<script> alert('Kích thước ảnh quá lớn');</script>";
        } else {
            $sql = "INSERT INTO posts (title, imgUrl,content, author_name, author_email, date_time) VALUES ('{$title}', NULL, '{$content}', '{$author_name}', '{$author_email}', '{$date}')";
            mysqli_query($connect, $sql);
            if ($imgFileType != "")
                echo "<script> alert('Chỉ hỗ trợ định dạng JPEG, PNG, JPG.');</script>";
        }
    }
    ?>
    <script>
        ClassicEditor
            .create(document.querySelector("#editor"), {
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', '|',
                        'link', '|',
                        'outdent', 'indent', '|',
                        'bulletedList', 'numberedList', '|',
                        'insertTable', '|',
                        'blockQuote', '|',
                        'undo', 'redo'
                    ],
                    shouldNotGroupWhenFull: true
                },
            })



            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>