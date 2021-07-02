<?php
session_start();
$url = "../";
include_once "connect.php";
if (!isset($_SESSION["email"])) {
    echo "Bạn chưa đăng nhập tài khoản.";
    exit;
}
$post_id = $_GET["post_id"];
$search = "
        SELECT * FROM posts
        WHERE post_id = '" . $post_id . "'
        ";
$result_search = $connect->query($search);
if ($result_search->num_rows > 0) {
    $post_data = $result_search->fetch_assoc();
    if ($post_data["author"] == $_SESSION["name"] . " - " . $_SESSION["email"]) {
?>

        <head>
            <title>Sửa bài viết</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
            <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                var url = "../";
            </script>
            <script src="../function/signin-signout.js"></script>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" href="https://lifeblog.s3.ap-southeast-1.amazonaws.com/img/logo/Logo1.png" sizes="16x16" type="image/png">
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
            $setVisibleCreatePostBtn = true;
            include $url . "themes/navbar.php";
            ?>
            <!-- navbar -->
            <main class="form-edit-post container py-3">
                <form method="POST" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Tiêu đề" name="title" required value="<?php echo $post_data["title"]; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <textarea type="text" class="form-control" id="editor" rows="5" placeholder="Nội dung bài viết" name="content" required><?php echo $post_data["content"]; ?> </textarea>
                    </div>
                    <div id="word-count"></div>
                    <div class="input-group mb-3 row">
                        <img class="col-md-4" src="<?php echo "https://lifeblog.s3.ap-southeast-1.amazonaws.com/" . $post_data["imgUrl"]; ?>">

                        <div class="col-md m-auto input-group">
                            <label class="input-group-text" for="thumbnail">Sửa ảnh đại diện</label>
                            <input class="form-control" type="file" name="thumbnail" id="thumbnail" accept="image/*" capture @change="setImage">

                        </div>
                    </div>
                    <div class=" mb-3">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                </form>
            </main>
            <?php
            include $url . "themes/backtotopbtn.php";
            include $url . "themes/modal.php";
            ?>
            <?php
            include "connect.php";
            if (isset($_POST["title"]) && isset($_POST["content"]) && isset($_POST["title"])) {
                $title = $_POST["title"];
                $content = $_POST["content"];
                $author = $_SESSION["name"] . " - " . $_SESSION["email"];
                $target_dir = "../img/";
                $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
                $imgFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                if ($imgFileType == "jpg" || $imgFileType == "png" || $imgFileType == "jpeg") {
                    if ($_FILES["thumbnail"]["size"] < 500000) {
                        $imgUrl = "img/" . basename($_FILES["thumbnail"]["name"]);
                        $sql = "UPDATE posts  SET title ='" . $title . "', imgUrl = '" . $imgUrl . "', content = '" . $content . "' WHERE post_id = '" . $post_id . "'";
                        mysqli_query($connect, $sql);
                        // move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);
                        require '../vendor/autoload.php';

                        $file_name = $_FILES['thumbnail']['name'];
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
                    if ($imgFileType != "")
                        echo "<script> alert('Chỉ hỗ trợ định dạng JPEG, PNG, JPG.');</script>";
                    else {
                        $sql = "UPDATE posts  SET title ='" . $title . "', content = '" . $content . "' WHERE post_id = '" . $post_id . "'";
                        mysqli_query($connect, $sql);
                    }
                }
                echo "<script>window.history.go(-2); ''</script>";
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
<?php
    }
}

?>