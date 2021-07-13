# LifeBlog
https://ptud-web.herokuapp.com/
Web được code bằng PHP (back-end), Front-end sử dụng hai thư viện là jQuery và Bootstrap
CKEditor 5 (Thêm, sửa bài viết)
AWS S3 để làm server lưu trữ ảnh của tài khoản, bài viết
CSDL là MySQL

## Hướng dẫn cài đặt
### Composer
Chạy lệnh "composer update" để kiểm tra, cài đặt updates từ các gói hosting cũ và dependencies một lần cho tất cả các packages hoặc dependencies.
### MySQL
Chỉnh sửa file connect.php trong thư mục function để truy cập cơ sở dữ liệu

## Tính năng

### Đăng ký
![image](https://user-images.githubusercontent.com/24567549/125442829-d550b959-39db-4321-83c0-c25eb826d8cf.png)

Form đăng ký tài khoản của trang web sẽ hiện ra khi nhấn Đăng ký

![image](https://user-images.githubusercontent.com/24567549/125442893-56ec30fa-5be0-4f16-932c-8654dcd8ab23.png)

### Đăng nhập
![image](https://user-images.githubusercontent.com/24567549/125442936-efbd1af5-c67a-4e02-8e33-73e3b91c1690.png)

Nhập thông tin Đăng nhập khi nhấn nút Đăng nhập. Nếu thông tin đăng nhập bị sai sẽ có thông báo

![image](https://user-images.githubusercontent.com/24567549/125442954-13e65dc7-7464-433a-9bdf-6fef32c2ab72.png)

Nếu đăng nhập đúng sẽ có dòng xin chào + tên user

### Đăng xuất

![image](https://user-images.githubusercontent.com/24567549/125442981-1be47d0f-3e5a-46dc-a852-223b5a4a15d7.png)

Đăng xuất thành công, giao diện tự động trở về trang ban đầu

### Search 

![image](https://user-images.githubusercontent.com/24567549/125443004-ddb1005a-1a67-4c3c-a384-15bc87dc539b.png)

Nhấn nội dung cần tìm vào thanh tìm kiếm và nhấn nút Tìm kiếm

![image](https://user-images.githubusercontent.com/24567549/125443019-e3f1fde2-b806-48a2-bb17-010be7aaa064.png)

Giao diện sẽ đưa ra những bài viết có chứa nội dung tìm kiếm

### Trang chủ

![image](https://user-images.githubusercontent.com/24567549/125443033-8cff7579-7b33-451b-a7a2-4a01ebefa7d4.png)

![image](https://user-images.githubusercontent.com/24567549/125443043-5bfc0dd4-ed41-4fc7-a9ed-57aa90aa9b58.png)

![image](https://user-images.githubusercontent.com/24567549/125443048-30304b0a-9508-4521-9010-b9e50fcdebbc.png)

![image](https://user-images.githubusercontent.com/24567549/125443054-1f2856b2-f644-444b-92e6-eb90089bc0f5.png)

![image](https://user-images.githubusercontent.com/24567549/125443062-0a4db4dd-bba2-47a7-ac41-0cef9da504b7.png)

Trừ phần carousel (4 bài), mỗi trang sẽ hiển thị 10 bài viết, mỗi dòng 2 bài.

Những bài viết do người dùng đăng lên ứng với tài khoản đang đăng nhập sẽ có quyền chỉnh sửa, xóa đối với bài viết mà họ đăng.

![image](https://user-images.githubusercontent.com/24567549/125443076-efb66ff6-e00c-4bd2-832b-855f48191be2.png)

Trên thanh công cụ sẽ có logo của trang web, cạnh bên là dòng xin chào user tiếp đó có chuông thông báo nếu có tương tác với bài viết mình đăng. Khi nhấn vào sẽ dẫn đến bài viết được tương tác.

![image](https://user-images.githubusercontent.com/24567549/125443122-b8d1a37a-c497-42f2-b57c-b4f544a509b5.png)

![image](https://user-images.githubusercontent.com/24567549/125443132-515b6ec9-85e9-41ed-b472-0209df2b4784.png)

Phần phân trang dưới cùng giúp người dùng lựa chọn trang muốn hiển thị. Đây là trang 2 của web.

### Thêm bài viết

![image](https://user-images.githubusercontent.com/24567549/125443160-48ff08c3-d064-4d2d-8c1a-f87108b9372c.png)

Giao diện trang thêm bài viết. Thanh công cụ nơi nhập nội dung hỗ trợ tạo bảng, thay đổi form nội dung hoặc lập dạng danh sách. Có thể update ảnh hoặc không.

![image](https://user-images.githubusercontent.com/24567549/125443180-39bf5d0d-a30d-4063-8e99-930e22c8454d.png)

Nội dung đưa vào bài viết và nhấn nút Tạo.

![image](https://user-images.githubusercontent.com/24567549/125443198-8602ff57-9ab6-4307-b04c-0a12b6400c59.png)

Sau khi tạo bài viết sẽ hiển thị ở trang chủ

### Trang bài viết

![image](https://user-images.githubusercontent.com/24567549/125443280-1b95e06b-36d7-435c-8fd0-026b300d9693.png)

Trang bài viết hiển thị khi nhấn phím “ Xem thêm”

![image](https://user-images.githubusercontent.com/24567549/125443297-05b6cdda-ce2d-48fa-b74c-73427536211b.png)

Trang bài viết thay đổi khi có người nhấn Like  

![image](https://user-images.githubusercontent.com/24567549/125443337-5e6d844c-7c6b-47c0-bb1c-cf5589dedd85.png)

Trang bài viết thay đổi khi có người bình luận, nhấn Like bình luận và trả lời bình luận.

![image](https://user-images.githubusercontent.com/24567549/125443350-176243b6-b4e6-48e4-88b2-6b2acc78af3f.png)

Trang bài viết thay đổi khi xóa bình luận, chỉnh sửa nội dung bình luận và xóa like bình luận.

### Trang cá nhân

![image](https://user-images.githubusercontent.com/24567549/125443378-b39b4989-5765-41cf-b4fe-e5bdf7eb520a.png)

![image](https://user-images.githubusercontent.com/24567549/125443384-0ce0c1df-aafe-4dde-b760-d11e9ad4c811.png)

Hiển thị thông tin cá nhân và các bài viết đã từng đăng

Có thể thay đổi mật khẩu, tên user, ngày tháng năm sinh và ảnh đại diện nếu muốn

Có thể chỉnh sửa, xóa bài viết và có phân trang để chia nhỏ số lượng bài đăng giống trang chủ.

![image](https://user-images.githubusercontent.com/24567549/125443409-25583e6b-ea7d-459c-887d-23d7809acc80.png)

Muốn chỉnh sửa thông tin cá nhân cần nhập mật khẩu xác nhận

![image](https://user-images.githubusercontent.com/24567549/125443425-0dfc7943-b90e-4eb0-8e70-53f549eaf699.png)

Thay đổi thành công Tên user và ảnh đại diện

![image](https://user-images.githubusercontent.com/24567549/125443450-10665dad-1c48-4702-9671-b4cb7bf17b8b.png)

Bạn cũng có thể nhấn vào tên người viết để xem bài viết họ đăng ở trang cá nhân của họ.

![image](https://user-images.githubusercontent.com/24567549/125443467-5460f39b-3a0b-4040-9f03-7f61ef40df64.png)

Trang cá nhân của người viết.



