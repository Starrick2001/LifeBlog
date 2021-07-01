<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // $(document).ready(function() {
        $(".cmt-submit-btn").click(function() {
            var cmt_parent = $(this).attr("cmt_id");
            var cmt_content = $(".cmt-content[cmt_id=" + cmt_parent + "]").val();
            $.ajax({
                method: "POST",
                url: "../function/add-comment.php",
                data: {
                    post_id: "<?php echo $_GET["post_id"]; ?>",
                    cmt_parent: cmt_parent,
                    cmt_content: cmt_content
                },
                success: function(data) {
                    $(".cmt-content[cmt_id=" + cmt_parent + "]").val("");
                    $("#show-comment").load(url + "function/show-cmt.php?post_id=<?php echo $_GET["post_id"]; ?>&cmt_parent=0");
                }
            });
        });

        // })
    </script>
</head>

<body>
    <?php
    if ($_GET["cmt_parent"] == 0) {
    ?>
        <h3>Bình luận</h3>
    <?php
    }
    ?>
    <?php
    session_start();
    if (isset($_SESSION["email"])) {
    ?>
        <form onsubmit="return false">
            <div class="input-group my-3">
                <input type="text" cmt_id="<?php echo $_GET["cmt_parent"]; ?>" class="form-control cmt-content" placeholder="Nhập bình luận" required autocomplete="off">
                <input type="submit" class="btn btn-primary cmt-submit-btn" value="Bình luận" cmt_id="<?php echo $_GET["cmt_parent"]; ?>"></input>
            </div>
        </form>
    <?php
    }
    ?>
</body>