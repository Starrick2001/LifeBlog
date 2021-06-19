$(document).ready(function () {
  $("#cmt-btn").click(function () {
    var content = $("#cmt-content").val();
    $.ajax({
      method: "POST",
      url: url + "function/comment.php",
      data: {
        content: content
      },
      success: function (data) {
        if (data == "No") 
          alert("Bạn chưa đăng nhập tài khoản.");
      }
    });
  });
});
