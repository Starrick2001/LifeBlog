<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>XỬ LÝ CÁC CẢM XÚC TIÊU CỰC</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo/Logo1.png" sizes="16x16" type="image/png">
    <link rel="stylesheet" href="../style.css">
    <style>
        .wrap {
            width: 990px;
            /* kích thước chiều rộng trang web */
            float: left;
            /* canh div từ trái sang */
            border: 1px solid #AAA;
            box-shadow: -10px -10px 5px -5px #888888, 10px 10px 5px 5px #888888;
        }


        .main {
            width: 990px;
            /* kích thước chiều rộng trang web */
            float: left;
            /* canh div từ trái sang */
        }

        /* chiều rộng của 2 vùng div "nav" và "content" phải bằng tổng độ rộng của trang */
        /* chú ý padding, border, margin có thể ảnh hưởng đến độ rộng của trang web */
        .nav {
            width: 277px;
            /* kích thước chiều rộng của vùng thanh bên */
            float: left;
            /* canh div từ trái sang */
            border-right: 1px solid #999;
            /* tạo viền bên phải */
        }


        #footer {
            width: 980px;
            /* kích thước chiều rộng của vùng nội dung */
            float: left;
            /* canh div từ trái sang */
            border-top: 1px dashed #AAA;
        }

        p {
            text-indent: 50px;
        }
    </style>
    <script>
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
                                    url: "../function/dangky.php",
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
                        url: "../function/dangnhap.php",
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
                    url: "../function/dangxuat.php",
                    success: function(data) {
                        location.reload();
                    }
                })
            });
        });
    </script>
    <script>
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
                                    url: "function/dangky.php",
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
                        url: "function/dangnhap.php",
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
                    url: "function/dangxuat.php",
                    success: function(data) {
                        location.reload();
                    }
                })
            });
        });
    </script>
</head>

<body>

    <!-- navbar -->

    <nav class="navbar navbar-light navbar-expand-lg bg-light">
        <a class="navbar-brand px-2" href="../index.php">
            <img src="../img/logo/Logo2.png" width="68px" height="68px">
        </a>
        <div class="collapse navbar-collapse">
            <!-- <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" data-bs-toggle="modal" data-bs-target="#login">Đăng nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" data-bs-toggle="modal" data-bs-target="#signup">Đăng ký</a>
                    </li>
                </ul> -->

        </div>
        <form class="">
            <input class="form-control" type="text" label="Tìm kiếm" placeholder="Tìm kiếm">
        </form>
        <?php
        if (isset($_SESSION["email"])) {
        ?>
            <div class="m-auto p-2">
                <h5><?php echo "Xin chào " . $_SESSION["name"]; ?></h5>
                <a class="btn m-auto" id="logout-btn">Đăng xuất</a>
            </div>
        <?php
        } else {
        ?>
            <div>
                <a class="btn" data-bs-toggle="modal" data-bs-target="#signin">Đăng nhập</a>
                <a class="btn" data-bs-toggle="modal" data-bs-target="#signup">Đăng ký</a>
            </div>
        <?php
        }
        ?>
    </nav>
    <!-- navbar -->


    <!-- sử dụng main bao hết nội dung web lại -->
    <main class="container">

        <!-- bao phần nội dung chính -->
        <div class="row">
            <div class="col-4">
                <img src="../img/161172302_506101420793319_50094516776462664_n.png" alt="xử lý các cảm xúc tiêu cực" class="w-100">
            </div>
            <div class="col-8">
                <div class="shadow rounded p-3">
                    <h2 class="text-center">XỬ LÝ CÁC CẢM XÚC TIÊU CỰC</h2>
                    </br>
                    <p>Mình nghĩ là nhiều người trong chúng ta hơi kém trong việc đối mặt và
                        xử lý các cảm xúc tiêu cực. Mỗi khi chúng ta rơi vào trạng thái đau khổ, buồn bã hoặc cảm thấy
                        khổ sở, ta thường cố gắng vật vã tìm cách nào nhanh nhất có thể để ngắt mình khỏi cảm xúc ấy.
                        Có một số chiến thuật điển hình mà mọi người sử dụng như là:</p>
                    <b>1. Đổ lỗi:</b>
                    <p>Thực ra thì có nhiều nguyên nhân khác nhau khiến ta đổ lỗi cho người khác vì những đau khổ
                        của bản thân mình. Nhưng theo mình, một trong các nguyên nhân lớn nhất là để đánh lạc hướng cảm
                        xúc của bản thân. Khi ta đổ lỗi cho ai đó, thậm chí chê trách hay chửi mắng ai đó, cảm xúc “tức giận”
                        của chúng ta sẽ bắt đầu thức dậy. Nếu như coi mọi trạng thái cảm xúc đều có hình hài năng lượng riêng,
                        thì mình thấy là cảm xúc “tức giận” nó có năng lượng mạnh và khoẻ hơn so với cảm xúc “đau khổ”.
                        Và khi cảm xúc “tức giận” xuất hiện, nó sẽ xua bớt, đè nén hoặc át đi cảm xúc “buồn thương” trước đó.
                        Khi cảm xúc tức giận xuất hiện, tâm trí sẽ tự động kích hoạt cơ chế “chiến binh”, nghĩ ra hàng trăm
                        lí lẽ bảo vệ bản thân và tấn công người khác (kẻ địch). Lúc ấy mình cảm thấy có quyền lực hơn mà không
                        cảm thấy yếu đuối, dễ bị hạ gục, dễ bị người khác thao túng điều khiển như khi mình đang bị cảm xúc
                        “buồn thương” chi phối.</p>
                    <p>Ví dụ thế này. Mấy tháng trước, em chó cưng của gia đình mình chết vì ăn phải bả. Gia đình mình đau lòng
                        và thương em nó kinh khủng. Nhưng thi thoảng nói chuyện về nó, mình và người nhà lại trách kiểu “chó ngu”,
                        “ngu si, ăn lung tung nên mới bị thế”. Tự lí trí biết điều đó là không đúng, nhưng mình để ý khi mình
                        trách móc như vậy, trong lòng bắt đầu cảm thấy hơi giận và cảm xúc thương cũng bớt đi trong khoảnh khắc.
                        Mình đã không hề muốn đón nhận cảm xúc “thương” ấy chút nào. Bởi lúc “thương” thì sẽ muốn làm gì đó để “bù đắp”,
                        “giúp đỡ”, “hỗ trợ” đối tượng (cơ chế tự nhiên của con người) nhưng hoàn cảnh thực tế thì mình lại không thể
                        làm gì được nữa. Nên càng thương lại càng thấy bế tắc, khó chịu. Cuối cùng chọn cách “đổ lỗi” cho em chó để
                        có thể giận em và bớt thương đi.</p>
                    <b>2. Né tránh:</b>
                    <p>Cơ chế né tránh này thì rất phổ biến này. Ta sẽ có xu hướng không thích nói về vấn đề của mình với ai, ai hỏi
                        động đến thì mình lảng đi vì không muốn nghĩ tới. Thậm chí ai hỏi nhiều quá thì ta còn nhảy dựng lên và tấn công
                        đối phương. Ta sẽ né như thế cho đến khi tâm trí ta “quên dần” về chuyện đó. Còn nếu thời gian quên lâu quá thì
                        cơ chế né tránh của ta hoạt động ngày càng mạnh: Ta không chỉ né tránh nói về vấn đề của mình mà còn né những
                        người có vấn đề tương tự, né các loại phim ảnh sách báo truyền thông hay bất cứ cái gì, sự kiện gì, mối quan hệ
                        nào gợi nhắc ta nhớ đến cảm xúc đó. Nhiều khi mình còn né yêu đương, né hẹn hò, né gặp gỡ người khác là vì vậy.
                        Không phải là mình ghét người đó đâu, mà mình ghét đối diện với vấn đề bên trong mình.</p></br>
                    <p>Cách né tránh cảm xúc kiểu này thì giúp bạn tạm thời không phải chịu đựng cảm xúc ấy ngay bây giờ nhưng tự bạn
                        thừa biết là nó vẫn lù lù ở đấy. Rồi đến khi nó phình to quá mức rồi và vô tình bị chạm vào, nó sẽ nổ tung toé tanh
                        bành. Be bét luôn.</p>
                    <b>3. Đánh lạc hướng:</b>
                    <p>Cơ chế này cũng là một kiểu cơ chế phổ biến mà mọi người hay sử dụng. Ví dụ như buồn quá, đau lòng quá, không biết
                        phải làm sao nên uống ly rượu, làm tí thuốc lắc, lướt Face, đọc lá cải, làm việc cho đỡ buồn thôi, ra ngoài mua sắm
                        ăn cho nứt bụng nào. Ai buồn tình, đau lòng vì anh A thì chọn cách yêu ngay một anh B. Nghe thì có vẻ hiệu quả nhưng
                        cũng chỉ là đánh lạc hướng cảm xúc. Yêu anh mới để quên anh cũ không bao giờ là một cách khôn ngoan.
                        Vì thế này: Bạn có thể quên anh cũ nhờ vào anh mới nhưng cảm xúc buồn, chỗ tổn thương bên trong bạn do anh cũ tạo ra
                        thì nó vẫn ở nguyên đấy. Nên bạn sẽ bê con Tim vỡ vụn đấy của mình lết từ cuộc tình này sang cuộc tình khác.
                        Rốt cuộc thì yêu ai cũng không ra hồn.</p>
                    <p>Có một điều không biết mọi người có nhận ra không, nhưng các cảm xúc của chúng ta hoạt động cực kì độc lập:
                        Tức giận, buồn, thương, đau khổ, hạnh phúc, phấn khích. Hãy tưởng tượng tâm hồn mình giống như một cái nhà ấy,
                        và lần lượt có những anh bạn cảm xúc tới thăm. Hôm nay bạn mới bị người yêu phản bội, thế là cô nàng “đau đớn”
                        đến ghé thăm nhà bạn xong ở lì đấy. Cổ làm cho cả cái nhà bạn u ám theo. Bạn không muốn nói chuyện hay đối diện
                        với cổ vì bạn sợ tổn thương, nên bạn quyết định làm tí rượu để gọi anh “phấn khích” tới chơi. Nhưng vấn đề là cô
                        “đau đớn” chưa được nói chuyện với bạn để giải toả nên cổ ở lì đấy không đi cơ, ờ. Bạn cố gắng tập trung chơi với
                        anh “phấn khích” nên bạn không nhận ra là cô “đau đớn” đang ở đó, chui dưới gầm bàn và làm nhà bạn tối thui.
                        Bạn cũng không nhận ra rằng, dù bạn có mời ai đến: phấn khích, hạnh phúc hay sung sướng thì họ đều không ở lại
                        được lâu vì nhà bạn càng lúc càng tăm tối. Đến lúc nó tối đến nỗi ko có bất kỳ anh bạn Niềm vui nào mò tới được,
                        bạn mới tá hoả gọi cô bạn “đau đớn” ra nói chuyện thì muộn mất rồi. “Ting”, cánh cửa nhà bạn bật mở và trước mặt
                        bạn là anh “Trầm cảm”. Anh này đã đến mà muốn mời anh đi cho thì còn khó khăn hơn gấp bội !</p></br>
                    <h>(Cô giáo Bảo Ngọc)</h></br>
                    <a href="https://www.facebook.com/hashtag/baobaostories">#baobaostories</a></br>
                    <a href="https://www.facebook.com/hashtag/vietchualanh">#vietchualanh</a></br>
                    <a href="https://www.facebook.com/hashtag/baongocviet">#baongocviet</a></br>
                    <a>--------</a></br>
                    <h>CÁC LỚP VIẾT THÁNG 3/2021</h></br>
                    <h>* Viết Chữa Lành chuyên sâu (Hà Nội):</br>
                        Thời gian: 27/3 và 28/3</br>
                        Địa điểm: Trà Quán Đủng Đỉnh, 88 Yên Phụ, Hà Nội</br>
                        Lớp được thiết kế nhóm nhỏ, tối đa 6 người học/lớp để có thể đi sâu và xử lý vấn đề tinh thần cho từng thành viên trong lớp</br>
                        <a href=" https://forms.gle/nuk9FzqGG3mziXwh7">Link Đăng Ký</a>
                    </h></br>
                    <h>• Viết Trù Phú (Online): </br>
                        Thời gian: 8-10PM 24/3 & 31/3</br>
                        Đối tượng học: Các bạn muốn xử lý các vấn đề về tiền và tài chính, tái thiết lập mối quan hệ với tiền</br>
                        <a href=" https://forms.gle/uPSxNUkusYp3iRLj6">Link Đăng Ký</a>
                    </h></br></br></br>
                </div>
            </div>
        </div>
        <div id="cmt">
            <div class="w-100 h-100 d-inline-block">

            </div>
        </div>
        <!-- kết thúc nội dung chính -->
    </main>
    <!-- sử dụng main bao hết nội dung web lại -->
    <div id="back-to-top" class="position-fixed bottom-0 end-0 p-5">
        <a type="button" class="btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z">
                </path>
            </svg>
        </a>
    </div>
    <div class="modal" id="notification" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p class="text-secondary">Tính năng này hiện đang trong giai đoạn phát triển</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="signin" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Đăng nhập</h5>
                </div>
                <div class="modal-body">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingInputSignin" placeholder="name@example.com">
                        <label for="floatingInputSignin">Địa chỉ email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPasswordSignin" placeholder="Password">
                        <label for="floatingPasswordSignin">Mật khẩu</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" data-bs-toggle="modal" id="signin-btn">Đăng nhập</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#notification">Quên mật khẩu</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="signup" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Đăng ký</h5>
                </div>
                <div class="modal-body">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingInputSignup" placeholder="name@example.com">
                        <label for="floatingInputSignup">Địa chỉ email</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingNameSignup" placeholder="name">
                        <label for="floatingNameSignup">Tên</label>
                    </div>
                    <div class="form-floating">
                        <input type="date" class="form-control" id="floatingBirthSignup">
                        <label for="floatingBirthSignup">Ngày sinh</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPasswordSignup" placeholder="Password">
                        <label for="floatingPasswordSignup">Mật khẩu</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingReEnterPasswordSignup" placeholder="Password">
                        <label for="floatingReEnterPasswordSignup">Nhập lại mật khẩu</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" data-bs-toggle="modal" id="signup-btn">Đăng ký</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>

            </div>
        </div>
    </div>
</body>

</html>