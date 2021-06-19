        $(document).ready(function() {

            $(window).scroll(function() {
                if ($(this).scrollTop != 0) {
                    $("#back-to-top").fadeIn();
                } else {
                    $("#back-to-top").fadeOut();
                }
                $("#back-to-top").click(function() {
                    $("body,html").animate({
                        scrollTop: 0
                    }, 0);
                });
            });

            $("#signup-btn").click(function() {
                var email = $('#floatingInputSignup').val();
                if (email == "")
                    alert("Email không được bỏ trống");
                else {
                    var password = $('#floatingPasswordSignup').val();
                    var reenterPassword = $('#floatingReEnterPasswordSignup').val();
                    if (password == "" || reenterPassword == "")
                        alert("Mật khẩu không được bỏ trống");
                    else
                    if (password != reenterPassword)
                        alert("Mật khẩu không khớp");
                    else {
                        var name = $("#floatingNameSignup").val();
                        if (name == "")
                            alert("Tên không được bỏ trống.");
                        else {
                            var birth = $("#floatingBirthSignup").val();
                            if (birth == "")
                                alert("Ngày sinh không được bỏ trống.");
                            else {
                                $.ajax({
                                    method: "POST",
                                    url: url + "function/dangky.php",
                                    data: {
                                        email: email,
                                        name: name,
                                        birth: birth,
                                        password: password,
                                        reEnterPassword: reenterPassword
                                    },
                                    success: function(data) {
                                        switch (data) {
                                            case "Success":
                                                $("#signup").hide();
                                                location.reload();
                                                break;
                                            case "Email error":
                                                alert("Email này đã được sử dụng");
                                                $("#floatingInputSignup").val() = "";
                                                break;
                                        }
                                    }
                                })
                            }
                        }
                    }
                }
            });



            $("#signin-btn").click(function() {
                var email = $("#floatingInputSignin").val();
                var password = $("#floatingPasswordSignin").val();
                if (email != "" && password != "") {
                    $.ajax({
                        method: "POST",
                        url: url + "function/dangnhap.php",
                        data: {
                            email: email,
                            password: password
                        },
                        success: function(data) {
                            if (data == "No")
                                alert("Email hoặc mật khẩu không đúng");
                            else {
                                $("#signin").hide();
                                location.reload();
                            }
                        }
                    });
                } else {
                    alert("Email hoặc mật khẩu không được bỏ trống.");
                }
            });

            $("#logout-btn").click(function() {
                $.ajax({
                    url: url + "function/dangxuat.php",
                    success: function(data) {
                        
                    }
                });
                window.location.href = url;
            });
        });