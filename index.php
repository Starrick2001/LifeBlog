<?php
session_start();
?>
<!DOCTYPE html>

<html>

<head>
    <title>Xây dựng blog cá nhân</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/logo/Logo1.png" sizes="32x32" type="image/png">
    <link rel="icon" href="img/logo/Logo1.png" sizes="16x16" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand px-2 py-0" href="">
                <img src="img/logo/Logo2.png" width="56px" height="56px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-content">
                <ul class="navbar-nav">
                    <?php
                    if (isset($_SESSION["email"])) {
                    ?>
                        <li class="nav-item m-auto">
                            <a class="btn"><?php echo "Xin chào " . $_SESSION["name"]; ?></a>
                        </li>
                        <li class="nav-item m-auto">
                            <a class="btn" href="function/create-post.php">Thêm bài viết</a>
                        </li>
                        <li class="nav-item m-auto">
                            <a class="btn" id="logout-btn">Đăng xuất</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item m-auto">
                            <a class="btn" data-bs-toggle="modal" data-bs-target="#signin">Đăng nhập</a>
                        </li>
                        <li class="nav-item m-auto">
                            <a class="btn" data-bs-toggle="modal" data-bs-target="#signup">Đăng ký</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2 w-50" type="text" placeholder="Tìm kiếm">
                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                </form>
            </div>
        </div>
    </nav>
    <main class="container">
        <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel" data-touch="true">


            <!-- Indicator -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="3"></button>
            </div>

            <!-- main carousel -->

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/159414778_505907824146012_4802705699852904088_n.png" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block bg-text">
                        <h5>CHĂM SÓC BẢN THÂN (SELF-CARE) HAY LÀ ÍCH KỶ (SELFISH)? </h5>
                        <p>Ai trong chúng ta cũng có những nhu cầu riêng cho bản thân dù trong bất kỳ khía cạnh nào
                            trong cuộc sống: công việc, gia đình, mối quan hệ, hay chỉ đơn giản là nhu cầu ăn uống, vui
                            chơi, nghỉ ngơi.</p>
                        <a class="btn btn-light" data-bs-toggle="modal" data-bs-target="#notification">Xem thêm</a>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img src="img/161172302_506101420793319_50094516776462664_n.png" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block bg-text">
                        <h5>XỬ LÝ CÁC CẢM XÚC TIÊU CỰC
                        </h5>
                        <p>Mình nghĩ là nhiều người trong chúng ta hơi kém trong việc đối mặt và xử lý các cảm xúc tiêu
                            cực. Mỗi khi chúng ta rơi vào trạng thái đau khổ, buồn bã hoặc cảm thấy khổ sở, ta thường cố
                            gắng vật vã tìm cách nào nhanh nhất có thể để ngắt mình khỏi cảm xúc ấy.</p>
                        <a class="btn btn-light" href="posts/Xuly.php">Xem thêm</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/162535409_509034327166695_2726708296117186477_n.jpg" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block bg-text">
                        <h5>ĐỪNG BỎ QUA NHỮNG NỖI ĐAU NHỎ </h5>
                        <p>Đã bao giờ bạn tự nhiên cảm thấy rất đau, sợ hãi, lo lắng, buồn, khổ sở mà không hề có lý do
                            cụ thể không?</p>
                        <a class="btn btn-light" data-bs-toggle="modal" data-bs-target="#notification">Xem thêm</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/162809020_511778586892269_3687806669231235166_n.png" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block bg-text">
                        <h5>ĐI NGƯỢC LẠI VỚI ĐỊNH NGHĨA "THÀNH CÔNG"?</h5>
                        <p>Tôi ngày càng trở nên dễ tâm giao với các bạn trẻ gần tới 30, liệu chăng là luật hấp dẫn, hay
                            vì 1 lí do gì khác, tôi cũng không biết nữa. Tôi vẫn nhớ hoài năm tôi 29 tuổi, chính thức
                            chia tay mối tình bình yên một cách văn minh. Rồi 30 tuổi, tôi bắt đầu hành trình đi sâu vào
                            trong mình qua những khóa học phát triển bản thân.
                            Năm 30 tuổi ấy, tôi đổi nghề.</p>
                        <a class="btn btn-light" data-bs-toggle="modal" data-bs-target="#notification">Xem thêm</a>
                    </div>
                </div>
            </div>



            <!-- Control buttons -->

            <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <div class="row mb-2">
            <div class="col-md">
                <div class="row shadow rounded m-3 p-2">
                    <div class="col-md-4">
                        <img src="img/158351993_501520857918042_9005686644728006349_n.png" class="w-100" alt="" />
                    </div>
                    <div class="col-md-8">
                        <!--                            Content-->
                        <h6 class="pt-2">"MÙA ĐÔNG Ủ ẤM, MÙA HÈ TẢN BỘ"</h6>
                        <p class="">
                            "The best relationship is the one that makes you become a better person, without changing
                            you into someone than yourself."
                            Bạn đời, trước hết phải là bạn.
                            Tôi không biết phụ nữ khác đánh giá đàn ông thế nào.
                            Với tôi, đẹp trai đến mấy mà không lịch sự cũng chẳng bằng ô hợp lang bạt. Giàu có đến mấy
                            mà bẩn bựa cũng không bằng anh nông dân chân chất.</p>
                        <!--                            Button "Xem thêm"-->

                        <p class="text-end">
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#notification">Xem
                                thêm</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="row shadow rounded m-3 p-2">
                    <div class="col-md-4">
                        <img src="img/156506992_497887028281425_8352005501900063895_n.jpg" class="w-100" alt="" />
                    </div>
                    <div class="col-md-8">
                        <!--                            Content-->
                        <h6 class="pt-2">LUÔN YÊU BẢN THÂN</h6>
                        <p class="p-2">Hãy nhớ rằng: sức khoẻ tinh thần của bạn quan trọng hơn sự nghiệp của bạn, tiền
                            bạc, ý kiến của những người khác, những trách nhiệm hay lời hứa mà bạn đã nói như buổi tiệc
                            cuối tuần hay hẹn hò cafe. Thậm chí, sức khoẻ tinh thần của bạn cũng quan trọng hơn cảm xúc
                            hay mong muốn của những người khác trong gia đình. Nếu chăm sóc bản thân có nghĩa là làm ai
                            đó thất vọng. THÌ LÀM HỌ THẤT VỌNG ĐI.</p>

                        <!--                            Button "Xem thêm"-->

                        <p class="text-end">
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#notification">Xem
                                thêm</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!-- <div class="row">
            <div class="col-9">
                <div class="blog-post p-3">
                    <h2 class="blog-post-title" id="thg3-2021"> ăn trông nồi, ngồi trông hướng</h2>
                    <p class="blog-post-meta">25 Thg 3, 2021 by <a href="https://www.facebook.com/stellimicanseyes/" target="_blank">Mắt Toét</a></p>
                    <hr>
                    <p>cái cách mà chúng ta làm một điều gì đó đều một phần thể hiện phong thái (manner) của chính mình.
                        từng việc làm có thể nhỏ như gấp chăn màn, cuộn thảm yoga, hay việc to hơn một chút là nấu ăn
                        trong một căn bếp chung, chăm sóc không gian chung.</p>
                    <hr>
                    <p>buổi đầu định hướng, mọi người chia sẻ cách gấp các thứ theo kiểu Marie Kondo, bọn tớ hay nói đùa
                        là “kiểu Kônđồ”. như là một cái màn to dành cho bọn trẻ con ngủ trưa, các móc nhỏ mà người sản
                        xuất chia ra cũng là có ý đồ: vì màn có bốn góc, mình sẽ gập chiều rộng của màn lại, rồi cuốn
                        theo các móc có sẵn trên chiều ngang của màn, ta da, rồi cuốn lại thôi. ngày xưa không gập được
                        màn vì bốn góc của nó, tớ hay vo viên rồi cất vào đáy tủ. cuộn thảm yoga, thì nghĩ đến khi mình
                        và người dùng nó. mình quay mặt dùng ra ngoài, vừa để cho thông thoáng sau khi tập, vừa để cho
                        người sau trải thảm thì góc thảm không bị quăn lên, mà sẽ úp xuống đất.<br>
                        việc to to hơn chút là chăm sóc trong căn nhà chung. người chăm để ý lau dọn trước khi mọi người
                        dậy và đi lại, người trong nhà để ý sàn nhà vừa mới được lau thì bỏ dép lại để đi chân đất.
                        trong bếp cũng vậy, nhà có nhiều người rất thích nấu ăn, và cả những đứa thích hóng hớt. dù
                        không phải người nấu mà rẽ vào bếp pha một món đồ uống nào đó, cũng cần phải lau dọn chỗ mà mình
                        vừa bày ra. hay khi bếp hôm nay nấu xong, cũng cần để lại một không gian tinh tươm sạch sẽ cho
                        người nấu bếp ngày mai. không một ai muốn nhận “chuyển giao” với nồi niêu xoong chảo chưa được
                        rửa, bếp thì bụi mù cả.<br>
                        tớ nhớ lại khi đi làm cũng vậy. chuyển giao công việc gọn gàng, “leave it in the best shape” để
                        người tiếp theo đảm nhận không phải dọn rác của mình. hoàn thành những việc còn dang dở, hay chỉ
                        cần làm một task thật chỉn chu để vừa tiết kiệm thời gian lẫn công sức của cả mình và đồng
                        nghiệp. hoặc chỉ khi đi ăn thôi, hãy dành chút thời gian để lau qua bàn, xếp bát để bạn nhân
                        viên dọn đỡ cực. vứt rác vào đúng nơi để cô quét dọn có thể hoàn thành công việc sớm hơn, dù chỉ
                        một chút.<br>
                        từng cử chỉ nhỏ nhặt như vậy, cộng lại là to to lắm đó.</p>
                    <hr>
                </div>
                <div class="blog-post p-3">
                    <h2 class="blog-post-title">Điều mình làm & Người mình là</h2>
                    <p class="blog-post-meta">8 Thg 3, 2021 by <a href="https://www.facebook.com/stellimicanseyes/" target="_blank">Mắt Toét</a></p>
                    <hr>
                    <p>Tớ là một đứa rất ghét đi học. Thằng bạn tớ thường nói “Việc học mày để dưới đít, còn việc của tổ
                        chức X, tổ chức A mày đội lên đầu”. Nó không sai. Cơ mà có một điều tớ rất thích khi đi học, là
                        được làm về những chủ đề tự do. Tớ để ý rằng khi mình có bất cứ vấn đề nào trong cuộc sống, tớ
                        thường lấy vấn đề đó ra để thuyết trình, tranh luận, và chính tớ thường tự giải quyết vấn đề đó
                        vì tớ biết cần làm gì, nhưng tớ chỉ cần động lực bảo vệ và cho rằng nó đúng để mình làm
                        thôi.<br>
                        <br>
                        Khi hỏi về việc tại sao mình làm những việc mình làm, tớ thường luôn có lí do riêng của mình.
                        Đặc biệt, vì mình. Trong khi những đồng đội xung quanh làm là vì người khác, vì tổ chức, vì muốn
                        tạo ra ảnh hưởng, vì muốn thế giới này tốt đẹp hơn,…Trong một thời gian dài, tớ cứ sống với suy
                        nghĩ “mình thật là ích kỉ khi mình chỉ làm cho mình”. Lúc đó cho đến giờ, tớ vẫn giữ vững quan
                        điểm “nếu muốn tạo ra thay đổi, hãy thay đổi mình trước”, chừng nào tớ chưa thể thay đổi mình,
                        thì chừng ấy tớ không thể tạo ra ảnh hưởng. Và tớ vẫn mâu thuẫn với chính mình với suy nghĩ “ích
                        kỉ” kia.<br>
                        <br>
                        Tớ từng làm nhiều dự án, sự kiện vì muốn học, muốn biết hơn là muốn tạo ảnh hưởng. Tớ từng làm
                        dự án vì muốn mình quay trở lại làm chính mình, dũng cảm để bị tổn thương và nhìn con người với
                        đôi mắt trần trụi nhất. Và để dám nhìn con người với đôi mắt ấy, hãy để cho tâm hồn mình trần
                        trụi nhất với tất cả những niềm vui, đau khổ, lỗ hổng và những lấp đầy trong tâm hồn mình. Và tớ
                        sợ. Tớ sợ nhiều chứ. Tớ sợ bị đánh giá, bị phán xét rằng mình không hoàn hảo, không thể làm vừa
                        lòng ai cả. Tớ từng làm dự án chỉ vì muốn “được quay lại một cách hoành tráng”, mà thực sự lí do
                        đằng sau đấy là muốn tìm lại mình, muốn mình quay lại vòng tròn kỉ luật của bản thân, muốn vắt
                        kiệt bản thân ra những học hỏi, nhận ra tinh tuý nhất của quá trình rèn luyện.<br>
                        <br>
                        Và đó là cách tớ nhìn nhận khi tớ làm công việc của tớ.<br>
                        <br>
                        Khi tớ đặt một mục tiêu cho bản thân mình, là phải làm một chương trình, dự án thật hay, thật có
                        ý nghĩa, thật tạo ảnh hưởng. Tớ đặt áp lực cho mình phải tìm tòi, phải học hỏi, nghiên cứu nhiều
                        để truyền tải mục đích chung sao cho đúng.<br>
                        <br>
                        Và cùng lúc, một người chỉ ra cho tớ rằng, “ngay khi em đang cố gắng tìm hiểu, học hỏi và san
                        sẻ, là em đang mở ra một con đường mới cho những người chưa biết, một con đường không cũ cho
                        những người cần luyện tập, và trong đó có cả chính em. Và ngay khi em đang làm công việc của
                        mình đòi hỏi sự học hỏi đó, khi người khác quan sát được em, thì họ cũng thấy một niềm cảm hứng
                        tự thân phát ra nơi em”.<br>
                        <br>
                        Cái tiêu đề tớ đặt ra, cả hai vế đều có sự liên kết và ảnh hưởng lẫn nhau, tớ không thể đặt
                        xuống bất cứ cái nào cả.<br>
                        <br>
                        Ngay khi tớ đặt tên cho một sự kiện về những khía cạnh, góc nhìn mới, hành động mới, chính tớ đã
                        thay đổi về những khía canh, góc nhìn và hành động theo như thế. Và ngược lại, nếu cậu hiểu ý
                        tớ.<br>
                        <br>
                        Tớ ghét cái việc làm xong không biết đằng sau nó là gì. Là đúng hay sai, trắng hay đen, hoặc
                        không gì cả. Và mình cũng chẳng thể lấy lại nó nữa. Một năm trước, một tháng trước, một tuần
                        trước, hay thậm chí mười lăm phút trước. Chuyện đã xảy ra rồi. Để tớ nói cho cậu biết điều
                        này.<br>
                        <br>
                        Chúng mình không phải chúng mình của mười lăm phút trước, hoặc một giây trước khi cậu đọc bài
                        viết này.<br>
                        <br>
                        Và khi cậu nhìn cái cốc là chính nó – nửa đầy hoặc nửa vơi, xin hãy nhớ điều này: cái cốc luôn
                        luôn có thể rót cho đầy lại.
                    </p>
                    <hr>
                    <p>Tớ viết bài này khi đang mắc kẹt với một đống lỗi sai của mình, và băn khoăn rằng những điều tớ
                        coi là làm đúng có bù đắp cho những thứ mà tớ coi là sai.<br>
                        <br>
                        Dù sao thì, bài viết này cũng không thuộc phạm trù cuộc sống riêng, mà thiên về công việc của
                        mình hơn 🙂.
                    </p>
                    <hr>
                </div>
                <div class="blog-post p-3">
                    <h2 class="blog-post-title">THẤT TÌNH THÌ ĐỌC GÌ </h2>
                    <p class="blog-post-meta">1 Thg 3, 2021 by <a href="https://www.facebook.com/vietchualanh/" target="_blank">Mto</a></p>
                    <p>Mình đã được hỏi câu này mấy lần, lần nào cũng hứa để em nghĩ xem, xong quên mất luôn vì nói thật
                        mình cũng chưa nghĩ ra câu trả lời cho nó. Tự nhiên hôm nay nhận ra lý do mình chưa nghĩ ra câu
                        trả lời, vì câu hỏi chưa đúng và chưa đủ.</p>
                    <hr>
                    <p>Thất tình là một ngữ cảnh rất chung chung, không khác gì hỏi học tiếng anh thì đọc sách gì? Nhưng
                        bạn sẽ không thể có câu trả lời chính xác nếu không chẻ nhỏ và làm rõ được mình học tiếng Anh
                        với mục tiêu gì (học để thi chứng chỉ, học để giao tiếp, học chuyên ngành phục vụ công việc, học
                        để nói, để nghe, để đọc hay để viết).<br>
                        Thì thất tình cũng thế. Thế trong câu chuyện tình yêu thất bại đó, vấn đề của bạn là gì? Bạn
                        đang muốn đọc 1 quyển sách để xoa dịu trạng thái tâm lý lúc này thôi, hay bạn đã nhìn thấy những
                        mô thức phản ứng không hiệu quả trong mối quan hệ cũ và muốn tìm hiểu nguyên nhân để khắc phục
                        trong các mối quan hệ tiếp theo? Bạn cảm thấy mình chưa yêu bản thân nên mới gặp vấn đề trong
                        mối quan hệ và muốn tìm hiểu về chuyện yêu bản thân. Đến đây, câu hỏi đã rõ ràng và “hướng về
                        tương lai” hơn rất nhiều. Câu hỏi được chuyển hoá thành đọc sách gì để yêu bản thân? Đọc sách gì
                        để hiểu và chuyển hoá các sang chấn tâm lý? Đọc sách gì để xây dựng hệ giá trị cho mình? Câu hỏi
                        nghe sang và thông minh hơn hẳn rồi nhỉ ^^<br>
                        Hãy nhớ, chỉ có thứ xảy ra trong tương lai bạn mới thay đổi được. Câu hỏi hướng về xử lý “quá
                        khứ” là câu hỏi “chết”, vì không ai thay đổi được quá khứ, nhưng bạn luôn có thể thay đổi hiện
                        tại để thiết lập dòng tương lai tươi đẹp hơn. Và càng rõ ràng về mục tiêu, người khác càng dễ
                        dàng hỗ trợ bạn, phải không nào? </p>
                    <hr>
                </div>
                <div class="blog-post p-3">
                    <h2 class="blog-post-title" id="thg2-2021">MỐI QUAN HỆ GIỮA THỜI GIAN VÀ SỰ TRÙ PHÚ</h2>
                    <p class="blog-post-meta">27 Thg 2, 2021 by <a href="https://www.facebook.com/vietchualanh/" target="_blank">Mto</a></p>
                    <p>Mình lúc nào cũng bảo, nếu muốn giàu thì đơn giản lắm. Bỏ qua level cao hơn là đầu tư từ tiền
                        sinh ra nhiều tiền nhé, thì level đầu tiên mình sẽ vẫn kiếm tiền bằng công sức của mình đúng
                        không. Thế thì công thức cơ bản là thế này:<br>
                        Thu nhập = Năng suất x Thời gian</p>
                    <hr>
                    <p>Năng suất là số tiền mình kiếm được 1 giờ, thời gian là số tiền mình bỏ ra để kiếm tiền. Ví dụ
                        sức mình tháng là 30 tiếng, kiếm 30 triệu thì tức là quy đổi 1 tiếng của mình là 1 triệu. Thế
                        thì lúc này, nếu muốn tăng thu nhập bạn có hai cách. Một là tăng thời gian, hai là tăng năng
                        suất. <br>
                        - Tăng thời gian thì là cày tiền đó: Bình thường ngày làm 8 tiếng, muốn cày tiền thì ngày làm 16
                        tiếng đi... tăng liền. Nhưng cách tăng này 1 là mệt, 2 là tốn thời gian, 3 là ừ nó cũng chỉ tăng
                        được đến 1 mức nào đó. Vì thời gian, là có giới hạn. Bạn có thể tự tính được nếu muốn tăng thu
                        nhập theo cách này thì tối đa là tăng được bao nhiêu.<br>
                        - Cách thứ hai là tăng năng suất: Giá trị mình đang là 1 tiếng 1 triệu, giờ làm sao để nâng giá
                        trị của mình lên 1 tiếng nhiều triệu. Để làm được điều này, cái bạn cần là thời gian :))). Nên
                        bước đầu tiên để có thời gian và upgrade bản thân là phải cắt bỏ thời gian làm những việc dư
                        thừa. Muốn có lời phải bỏ vốn nha. Nếu làm việc, làm những việc để nâng cấp bản thân, giúp bản
                        thân học hỏi và tăng level. Nếu công việc hiện tại không giúp bạn phát triển, suy nghĩ cách rời
                        bỏ, cắt bớt nó đi để có thêm thời gian trống. Thời gian trống dư thừa sẽ giúp bạn học thêm skill
                        nào đó để biết đâu sau 2-3 tháng ủ mưu, tự nhiên giá trị lên hẳn 3 triệu/tiếng :)). Hoặc đơn
                        giản, thời gian trống sẽ giúp bạn đồng ý đi cafe liền với 1 cơ hội bất kì, và có được một dự án
                        ngon nghẻ. Mình là đứa nhận được rất nhiều cơ hội làm ăn có lời cũng do mình làm freelance, mình
                        có nhiều thời gian để nhận những công việc thú vị<br>
                        Nhìn chung thời gian quan trọng lắm. Nếu bạn thấy cuộc sống bây giờ đang chưa như ý thì để nó
                        như ý hơn cần phải có thời gian. Thời gian là tài sản lớn nhất mà nếu có nó dư thừa thì làm gì
                        cũng được. Mình gần đây chơi vs 1 hội rảnh, dù mỗi người đều có công việc và lịch sinh hoạt
                        riêng nhưng họ độc lập tự do sắp xếp thời gian và công việc của họ (toàn giám đốc hoặc thất
                        nghiệp mà :))). Và vì thế nên họ luôn có thể có thời gian nhận cơ hội mới. Nếu không có gì mới,
                        bản thân họ cũng có đủ thứ để làm và 1 công việc nhưng không bị phụ thuộc tài chính và phụ thuộc
                        thời gian mà họ có thể tự tạo ra công việc và thời gian cho mình, quả là trù phú, xịn xịn :))
                    </p>
                    <hr>
                </div>
                <div class="blog-post p-3">
                    <h2 class="blog-post-title">NGUYÊN LÝ CHIẾC CỐC</h2>
                    <p class="blog-post-meta">24 thg 2, 2021 by Thanh Hương - Học viên lớp Viết Chữa Lành</p>
                    <p>Nếu chiếc cốc chỉ đầy 1 nửa:<br>
                        Người tiêu cực nhìn vào sẽ buồn rầu, sầu khổ "Chỉ còn có 1/2 thôi sao." Đó cũng là cách họ nhìn
                        vào cuộc đời họ - bi quan, tiêu cực, nhìn đâu cũng chỉ là nỗi buồn.<br>
                        Người tích cực sẽ vui vẻ, tìm những giá trị ít ỏi còn lại của chiếc cốc vơi đó, cũng như những
                        điều vui vẻ, an lạc trong cuộc sống "Còn tận 1/2 cốc nữa, vẫn đủ để mình dùng cơ mà."<br>
                        Bạn muốn mình là ai?</p>
                    <hr>
                    <p>Chiếc cốc đầy<br>
                        Nếu bạn rót vào chiếc cốc mỗi ngày 1 chút thì chiếc cốc cũng sẽ đầy thêm mỗi ngày 1 chút đến khi
                        nó tràn ra khỏi thành cốc. Chẳng vậy mà ông bà ta có câu "Chiếc cốc tràn ly".<br>
                        Nhưng, cũng vẫn tình trạng như trên, người tiêu cực nếu luôn dồn nén tức giận, sầu khổ, bi ai
                        thì chiếc cốc ấy sẽ chỉ đầy ắp những điều đó. Đến khi "tràn ly" thì sự tiêu cực đó sẽ bị họ tác
                        động lên người khác, đổ lỗi & oán trách bắt đầu xảy ra.<br>
                        Còn người tích cực, trái lại, họ sẽ luôn làm đầy chiếc cốc cũng như cuộc sống của mình bằng yêu
                        thương, sự an lạc & hoan hỉ chia sẻ nó cho người khác, làm đẹp cho đời hơn nữa. Người xung quanh
                        sẽ được lan tỏa & tận hưởng niềm tin, tình yêu thương từ bạn. Nhưng hãy nhớ rằng, muốn giúp
                        người khác thì chính bạn cũng phải luôn đầy năng lượng tích cực đó & vững vàng.<br>
                        Bây giờ, bạn lựa chọn mình là ai?<br>
                        Mỗi người chúng ta đến với cuộc đời này đều phải trải qua hành trình của chính mình. Bài thi lớn
                        nhất của cuộc đời chỉ mỗi mình mình tự thi với sự quan sát & thưởng phạt nghiêm khắc từ vũ trụ,
                        còn lại tất cả mọi người khác, những chuyện vui buồn, bực dọc, đau khổ - vốn chỉ là đề bài mà vũ
                        trụ gửi đến để thử thách độ bền chí, khả năng kiên định & hóa giải khó khăn của ta mà thôi.<br>
                        Hãy luôn tin rằng bạn có khả năng vượt qua mọi bài thi đó, mà lỡ có thất bại vài lần thì đó cũng
                        là bài học vũ trụ gửi cho bạn. Chính bạn viết nên hành trình của bạn, mọi lựa chọn là của
                        bạn.<br>
                        Bạn muốn là ai trong hành trình của mình?</p>
                    <hr>
                </div>
                <div class="blog-post p-3">
                    <h2 class="blog-post-title">cho mình cơ hội nói ra</h2>
                    <p class="blog-post-meta">6 Thg 2, 2021 by <a href="https://www.facebook.com/stellimicanseyes/" target="_blank">Mắt Toét</a></p>
                    <p>Hồi trước, tớ có một cái tính không-tốt-lắm là khi ai đó lỡ làm mình tổn thương, tớ sẽ ôm hết vào
                        lòng rồi lùi lại, tránh xa khỏi họ, thậm chí là cắt đứt mối quan hệ giữa mình và họ. Hồi đó tớ
                        rất ngại mâu thuẫn, rất ngại cãi nhau, cố gắng chối bỏ cảm xúc tổn thương của mình mà nghĩ “ừ họ
                        cũng có ý gì đâu, chỉ là tự dưng mình bị tổn thương thì đấy là lỗi tại mình”, rồi tránh đi để
                        mình bớt bị tổn thương thôi. Tớ hồi đó chỉ muốn bảo vệ trái tim mình.<br>
                        <br>
                        Vì thế, tớ không hay có nhiều bạn. Cứ một vài lần thân với ai đó, người ta không còn giữ ý hay
                        để ý mình nữa để rồi quá lời, tớ sẽ lại lặng lẽ unfollow, unfriend họ không lí do vì tớ nghĩ
                        “nếu họ đã không giữ thì có lẽ là mình không quan trọng đến thế để tạo ra sự khác biệt trong đời
                        họ”.
                    </p>
                    <hr>
                    <p>Nhưng đời tớ cũng rất may, khi tớ lùi lại, bạn tớ sẽ để ý và sẽ “bắt” tớ nói thật ra thì thôi.
                        “Vì sao mày không còn kể cho tao nhiều như trước nữa?” và lúc đấy tớ chẳng thể nào mà trốn tránh
                        được, đành phải nói thật. Những lúc như thế, tớ rất sợ bạn tớ sẽ nói rằng “ừ vì tao nghĩ thế
                        thật, mày xứng đáng bị như thế”, hoặc nổi đoá lên vì “mày chả việc gì phải phản ứng như thế
                        cả”,…<br>
                        <br>
                        Cơ mà, nếu cậu cũng có suy nghĩ rằng “mình chẳng quan trọng đến thế”, thì mình cũng đã đánh giá
                        thấp bản thân mình rồi.<br>
                        <br>
                        Bởi đó, vẫn sẽ có những người ngồi xuống, lắng nghe vì sao, tìm hiểu nhu cầu và cảm xúc của cả
                        hai, xin lỗi và nói chuyện để xoa dịu nỗi tổn thương đó, cùng xây dựng lại mối quan hệ và cùng
                        với tớ chữa lành tổn thương đó và cùng nhau đi tiếp.<br>
                        <br>
                        Tớ cũng từng có một người bạn đã từng rất thân, cứ dần dần người ta lùi lại chẳng chơi với mình
                        nữa, tớ cũng hụt hẫng và thất vọng chẳng thể hiểu nổi tại sao. Hồi đó tớ hay trách móc rằng “ừ
                        vì mọi thứ đã thay đổi, không đi được cùng nhau thì thôi” như một sự ương bướng lì lợm. Tuy vậy
                        trong lòng vẫn cảm thấy buồn và gượng gạo. Mãi sau này khi gặng hỏi người khác, tớ mới biết lí
                        do mình đã làm tổn thương họ nhiều tới mức nào mà không hề để ý để rồi đẩy ra xa người bạn thân
                        của mình. Mới chợt thấy, hoá ra nó đến từ những điều nhỏ nhất mà mình đã bỏ quên. Lúc này mới
                        hiểu cảm giác của đối phương khi mình lùi lại và chạy đi.<br>
                        <br>
                        Trong một buổi phỏng vấn về sách Braving the Wilderness của cô Brene Brown, có một câu hỏi được
                        đặt ra mà tớ cảm thấy cái băn khoăn của mình được cộng hưởng là “How can we stay brave in
                        difficult conversations?” – “Làm thế nào để chúng ta có thể can đảm trong các cuộc trò chuyện
                        ‘khó’?”. Khi “khó” có nghĩa là mình thành thật với bản thân và với đối phương. Khi “khó” có
                        nghĩa là mình ôm lấy những nỗi sợ của mình, những sự không chắc chắn về phản ứng của đối phương
                        và thậm chí là cả mối quan hệ sau này. Khi “khó” là không kì vọng vào bất kì kết quả nào, kể cả
                        với hi vọng “sau chuyện này mình sẽ không bị tổn thương nữ<br>
                        <br>
                        Thử để biết, còn hơn không thử và cũng không bao giờ có thể biết được mối quan hệ giữa mình và
                        người ta sẽ đi tới đâu. Thử để biết, bởi vì, những ai ở lại mới là những người quan trọng.
                    </p>
                    <hr>
                </div>
                <div class="blog-post p-3">
                    <h2 class="blog-post-title" id="thg1-2021">ta là ai?</h2>
                    <p class="blog-post-meta">22 Thg 1, 2021 by <a href="https://www.facebook.com/stellimicanseyes/" target="_blank">Mắt Toét</a></p>
                    <p>lâu lâu rồi mới quay lại một câu hỏi như này. bởi vì tối nay vừa đi dự một gặp mặt nơi mình chẳng
                        hề quen một ai, và khi bắt đầu nói chuyện với một ai đó, họ đều giới thiệu theo công thức chung:
                        tên và nơi làm việc hiện tại.</p>
                    <hr>
                    <p>tớ cũng phát hiện mình sẽ hỏi những câu hỏi đó như một lời chào. và tớ cũng chưa biết hỏi gì “hay
                        ho” hơn.<br>
                        nhưng về phần tớ, tớ chẳng biết nói thế nào cả. tớ chỉ biết nói tớ là Huyền. tớ cũng không định
                        danh mình theo một công việc nhất định, nhưng nếu được hỏi, và phải trả lời, thì tớ nói rằng
                        mình là một freelancer, một người làm tự do. rồi họ sẽ đi tiếp theo những câu hỏi như “mày làm
                        trong lĩnh vực nào? ở công ty/tổ chức nào?”…<br>
                        câu hỏi “ta là ai?” quẩn quanh trong đầu tớ khi những cuộc trò chuyện như vậy hiện lên. tớ cũng
                        quên hết tất cả những lần đầu tiên quen bạn bè của mình. tớ không có bất kì công thức nào cả và
                        rất ngại người lạ, dù biết họ là những thế giới khác nhau để mình tiếp xúc và học hỏi. dù gì
                        thì, khi nói về việc giới thiệu bản thân, thật khó để nói tớ là ai.<br>
                        <hr>
                        sau đó tớ đi nghe thursday disclosure ở hanoi rock city. trong một bài hát nào đó, tớ nghe thấy
                        từ “vô danh tiểu tốt”. tớ chợt nghĩ về những lời khen “em đặc biệt” đến tớ của hồi xưa. tớ luôn
                        được nhận xét là cá tính, khác biệt, và tớ của hồi đó sẽ bực bội khi có ai đó giống tớ ở một
                        điểm gì đó. một cái áo, một kiểu tóc, một câu punchline,…tớ nhớ mình đã liên tục bám vào lời
                        công nhận, lời nhận xét “em đặc biệt”, “em khác biệt” này để cố chứng tỏ rằng mình khác người,
                        mình “dị”, mình chẳng giống ai. nhưng cùng lúc, tớ lại thiết tha mong muốn mình được thuộc về
                        một nơi nào đó, chỉ để cảm thấy an toàn với người-của-mình.<br>
                        mâu thuẫn, đúng không?<br>
                        tớ không còn bám vào lời công nhận kia nữa. tớ cũng chẳng hề cố để nổi bật hơn ai hay cố chứng
                        tỏ “sự đặc biệt” của mình. tớ cũng chẳng thấy ai nói rằng họ dị hợm, khác người thật sự khác
                        người cả. tớ chỉ thấy bọn mình là người bình thường khi quen biết nhau, và sẽ chỉ điên dở với
                        những người thân và thật sự hiểu tính của mình. giống như việc “lấy nhau rồi mới lộ hết tính
                        xấu” khi người ta nói về cặp vợ chồng son, hay một khuôn mặt mộc không trang điểm của một cô bạn
                        gái, hay thực ra chàng trai có-vẻ-cứng-rắn kia thật ra là một người hay khóc. chẳng có gì xấu và
                        sai ở đây cả, chỉ là mình bộc lộ cho người khác xem đến đâu.<br>
                        và vẫn mong muốn được thương mến sau khi phơi bày chính mình.<br>
                        <hr>
                        ta là ai? - là một câu hỏi (có vẻ) mang tính triết học không có lời giải, có khả năng đem đến
                        khủng hoảng nhân dạng (identity crisis). ta là ai? - qua ngôn từ đã định dạng mình là một loài:
                        con người. nhưng ai ở đây là ai? một hình mẫu? một vai trò? một hành động “đủ tính đại diện
                        mình”? là một thầy giáo? một giám đốc marketing? một người mẹ? một cô gái 23 tuổi? một đứa hút
                        thuốc?<br>
                        đến lúc này, tớ chẳng muốn mình là một người đặc biệt (so với người khác?). tớ cũng chưa chắc
                        mình muốn mình là một người vô danh - kiểu như không ai biết mình là ai, mình có thể là bất cứ
                        ai, nhưng tớ sẽ không cảm thấy có gì để “neo” mình lại. bởi vì mình đã có quá nhiều yếu tố khác
                        nhau đã góp phần xây dựng mình-là-ai đến bây giờ rồi.<br>
                        có lẽ câu hỏi “ta là ai?” sẽ không thể gói ghém đủ vào một câu trả lời, cũng không thể không
                        thay đổi qua thời gian. tớ chỉ muốn tự hỏi mình một câu, “mình có đang là mình không?” - mình có
                        đang trung thực với suy nghĩ, cảm xúc của mình không?
                    </p><br>
                </div><br>

            </div>
            <div class="h-100 col-3 sticky-top">
                <h5 class="text-center">Dòng thời gian</h5>
                <p class="text-center">
                    <a href="#thg3-2021">Tháng 3, 2021</a> <br>
                    <a href="#thg2-2021">Tháng 2, 2021</a> <br>
                    <a href="#thg1-2021">Tháng 1, 2021</a> <br>
                </p>
            </div> 


        </div> -->
        <?php
        include_once "function/connect.php";
        $query = "SELECT title, imgUrl, content, author FROM posts";
        $result = mysqli_query($connect, $query);
        ?>

        <!-- Khởi tạo row -->
        <div class="row mb-2">
            <?php
            $tmp = 0;
            while ($post = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>
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
        ?>
        <div class="col-6">
            <div class="row shadow rounded m-3 p-2">
                <div class="col-md-4">
                    <img src="<?php echo $post["imgUrl"]; ?>" class="w-100" alt="" />
                </div>
                <div class="col-md-8">
                    <!--                            Content-->
                    <h6 class="pt-2"><?php echo $post["title"]; ?></h6>
                    <p class="content">
                        <?php echo $post["content"]; ?>
                    </p>
                    <p class="text-end">
                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#notification">Xem
                            thêm</a>
                    </p>
                </div>
                <p class="author text-end">
                    <?php echo "Người viết: " . $post["author"]; ?>
                </p>
            </div>
        </div>
    <?php
            }
    ?>
    </main>
    <div id="back-to-top" class="position-fixed bottom-0 end-0 p-2">
        <a type="button" class="btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z">
                </path>
            </svg>
        </a>
    </div>
    <div id="modal">
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
    </div>
</body>

</html>