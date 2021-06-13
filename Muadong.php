<!DOCTYPE html>
<html>
    <head>
        <title>MÙA ĐÔNG Ủ ẤM, MÙA HÈ TẢN BỘ</title>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
        body
            {
                margin: 0 auto; /* canh bố cục đều 2 bên */
                padding: 0;
                width: 928px;
            }
             
            .wrap
            {
                width: 990px; /* kích thước chiều rộng trang web */
                float: left; /* canh div từ trái sang */
                border:1px solid #AAA;
                box-shadow: -10px -10px 5px -5px #888888 , 10px 10px 5px 5px #888888;
            }
             
            /* id="header" thì phải định nghĩa bằng dấu # và tên id (header) */
            #header 
            {
                width: 990px; /* kích thước chiều rộng trang web */
                float: left; /* canh div từ trái sang */
                border-bottom:1px dashed #AAA;
            }
             
            .main
            {
                width: 990px; /* kích thước chiều rộng trang web */
                float: left; /* canh div từ trái sang */
            }
             
            /* chiều rộng của 2 vùng div "nav" và "content" phải bằng tổng độ rộng của trang */
            /* chú ý padding, border, margin có thể ảnh hưởng đến độ rộng của trang web */
            .nav
            {
                width: 277px; /* kích thước chiều rộng của vùng thanh bên */
                float: left; /* canh div từ trái sang */
                border-right:1px solid #999; /* tạo viền bên phải */
            }
             
            .content
            {
                width: 700px; /* kích thước chiều rộng của vùng nội dung */
                float: left; /* canh div từ trái sang */
            }
             
            #footer
            {
                width: 980px; /* kích thước chiều rộng của vùng nội dung */
                float: left; /* canh div từ trái sang */
                border-top:1px dashed #AAA;
            }
            p {
                 text-indent: 50px;
            }
            </style>
    </head>

    <body>
        <div class="wrap"> <!-- sử dụng 1 div bao hết nội dung web lại -->
 
            <div id="header"> <!-- phần header -->
            </br> <!-- dùng thẻ br để xuống dòng làm vùng to ra dễ nhìn -->
            <nav class="navbar navbar-light navbar-expand-lg bg-light">
                <div class="container">
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav">
						<img src="/WEB.php/img/vuông.png" height="50" width="50">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disable" href="#">Đăng nhập</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disable" href="#">Đăng ký</a>
                            </li>
                        </ul>
    
                    </div> 
                    <form class="d-flex">
                        <input class="form-control" type="text" label="Tìm kiếm" placeholder="Tìm kiếm">
                    </form>
                </div>
            </nav>
            <main class="container">
                <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel" data-touch="true">
    
            </div>

            <div class="main"> <!-- bao phần nội dung chính -->
			</br> 
			<div class="nav">
                <img src="/WEB.php/img/mùa đông.png" alt="mùa đông ủ ấm" height="500" width="260">
                </div>
				<div class="content">
                     <b><font size="+2"><center>MÙA ĐÔNG Ủ ẤM, MÙA HÈ TẢN BỘ </center></font></b>
                </br>
                <p><font size="3.5px"><b>"The best relationship is the one that makes you become a better person,
                 without changing you into someone than yourself."</b></br>
                <p>Bạn đời, trước hết phải là bạn.
                    Tôi không biết phụ nữ khác đánh giá đàn ông thế nào.
                    Với tôi, đẹp trai đến mấy mà không lịch sự cũng chẳng bằng ô hợp lang bạt. Giàu có đến mấy mà bẩn bựa 
                    cũng không bằng anh nông dân chân chất.</br>
                <p>Cuộc đời con người, dễ vì những thứ nhìn thấy bằng mắt thường mà xác định vị trí, yêu ghét.</br>
                <p>Tôi sẽ nhìn rõ hơn một người, vì anh ta kéo ghế cho tôi, giữ thang máy cho tôi. Tôi sẽ rung động trước một
                 người mà anh ta nhẹ nhàng khoác áo cho tôi, đổi ly nước sang bên khi tôi chuyển chỗ. Tôi trân trọng người mà,
                  hỏi tôi ăn gì tôi còn đang lưỡng lự có thể đề xuất thứ tôi thích. Tôi sẽ lưu luyến, người vì tôi mà lưu
                tâm từng lời nói cử chỉ. Phụ nữ thực ra rất đơn giản. Phụ nữ tệ chẳng nói làm gì. Nhưng người phụ nữ
                tốt thực sự không cần quá nhiều. Một căn nhà nhỏ ấm cúng không quá cao sang, anh trồng cây em nấu ăn,
                 anh đọc sách em xem phim. Mùa đông ủ ấm, mùa hè tản bộ. Đời sống đơn giản, suôn sẻ, tôn trọng khoảng
                 trời riêng của đối phương. Không cần nghi kỵ, không cần xét hỏi, tin tưởng mà bên nhau cùng già đi.</br>
                <p> Cổ nhân có câu: <b>"Tương kính như tân"</b></br>
                <p>Một mối quan hệ muốn bền lâu, thì đừng quên lúc ban đầu mình đã từng trân trọng đối phương như thế nào.</br>
                <p>Bạn đời, trước khi làm vợ chồng thì thực sự nên là bạn. Vì khi tình yêu qua thời xuân mộng thì chính là 
                tình thương ở lại. Nhưng phần nhiều người ta làm ngược lại, khi yêu thì cung phụng, cưới xong thì hoàn thành 
                trách nhiệm, mặc thời gian phá hủy mối quan hệ. Họ không còn tôn trọng, trân quý nhau, họ coi đối phương đã
                 là vật sở hữu trong tay, tùy ý đối đãi, thế nào cũng được.</br>
                <p>Thà rằng không có, một đời tự mình phong phú hưởng thụ, đừng vội vã tạm bợ để rồi hối tiếc dài lâu.</br>
                <p>Vì anh em mài đi móng vuốt, vì em anh từ bỏ tôn nghiêm. Chỉ khi nào người ta có thể vì đối phương mà 
                cho đi, cũng không đánh mất mình, càng trở nên tốt đẹp hơn, khi ấy mới có thể trọn vẹn.</br>
                <p>Nếu đã không thể cùng nhau đi đến cuối đường, thì khi ra đi cũng hãy văn minh lịch thiệp như khi xuất hiện,
                 đừng để yêu thương trở thành oán hận. </br>
                <p>Hoa càng rực rỡ càng chóng tàn.</br>
                <p>Người càng phô trương càng dễ lãng quên.</br></br>
                <p>(Bài viết của bạn Mã Cát Hi Di trên group Viết Chữa Lành)</br>
                <a href="https://www.facebook.com/hashtag/m%C3%A3_c%C3%A1t_hi_di">#mã_cát_hi_di</a></br>
                <a>-----------</a></br>
                <h>Lớp Viết Chữa Lành chuyên sâu (Hà Nội) tháng này sẽ diễn ra vào 2 ngày 27/3 và 28/3.
                 Địa điểm: Trà Quán Đủng Đỉnh, 88 Yên Phụ, Hà Nội. Lớp được thiết kế nhóm nhỏ, tối đa 6 người học/lớp
                  để có thể đi sâu và xử lý vấn đề tinh thần cho từng thành viên trong lớp</h></br>
                <a href=" https://forms.gle/nuk9FzqGG3mziXwh7">Link Đăng Ký</a></br></br>
                </font></p></div>
            </div> <!-- kết thúc nội dung chính -->
             
             
        </div> <!-- sử dụng 1 div bao hết nội dung web lại -->
    </body>
</html>
