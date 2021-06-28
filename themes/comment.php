<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#cmt-submit-btn").click(function() {
                var cmt_content = $("#cmt-content").val();
                if (cmt_content != "") {
                    $.ajax({
                        method: "POST",
                        url: url + "function/add-comment.php",
                        data: {
                            post_id: <?php echo $_GET["post_id"]; ?>,
                            cmt_content: cmt_content
                        },
                        success: function(data) {
                            $("#cmt-content").val("");
                            $("#show-comment").load(url + "function/show-cmt.php?post_id=<?php echo $_GET["post_id"]; ?>");
                        }
                    });
                }
            });

        })
    </script>
</head>

<body>
    <h3>Bình luận</h3>
    <?php
    session_start();
    if (isset($_SESSION["email"])) {
    ?>
        <form onsubmit="return false">
            <div class="input-group mb-3">
                <input type="text" id="cmt-content" name="cmt_content" class="form-control" placeholder="Nhập bình luận" required autocomplete="off">
                <input type="submit" class="btn btn-primary" name="submit" id="cmt-submit-btn" value="Bình luận"></input>
            </div>
        </form>
    <?php
    }
    ?>
</body>