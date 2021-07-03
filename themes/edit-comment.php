<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".cmt-submit-btn").click(function() {
                var cmt_id = $(this).attr("cmt_id");
                var cmt_content = $(".cmt-content[cmt_id=" + cmt_id + "]").val();
                $.ajax({
                    method: "POST",
                    url: "../function/edit-comment.php",
                    data: {
                        cmt_id: cmt_id,
                        cmt_content: cmt_content
                    },
                    success: function(data) {
                        $(".cmt-content[cmt_id=" + cmt_id + "]").val("");
                        $("#show-comment").load(url + "function/show-cmt.php?post_id=<?php echo $_GET["post_id"]; ?>&cmt_parent=0");
                    }
                });
            });

        })
    </script>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["email"])) {
        require_once "../function/connect.php";
        $sql_get_data_cmt = "SELECT cmt_content FROM comments WHERE cmt_id = '" . $_GET["cmt_id"] . "'";
        $data = $connect->query($sql_get_data_cmt)->fetch_assoc();
    ?>
        <form onsubmit="return false">
            <div class="input-group my-3">
                <input type="text" cmt_id="<?php echo $_GET["cmt_id"]; ?>" class="form-control cmt-content" placeholder="Nhập bình luận" required autocomplete="off" value="<?php echo $data["cmt_content"]; ?>">
                <input type="submit" class="btn btn-primary cmt-submit-btn" value="Lưu" cmt_id="<?php echo $_GET["cmt_id"]; ?>"></input>
            </div>
        </form>
    <?php
    }
    ?>
</body>