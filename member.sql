CREATE TABLE `member`(
    `email` VARCHAR(255) NOT NULL PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `avatarUrl` VARCHAR(100) NOT NULL,
    `birth` DATE NOT NULL,
    `password` VARCHAR(255) NOT NULL
);

CREATE TABLE `posts`(
    `post_id` INTEGER(11) AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `imgUrl` VARCHAR(100),
    `content` TEXT NOT NULL,
    `author` TEXT NOT NULL
);

CREATE TABLE `post_like`(
    `email` VARCHAR(255) NOT NULL,
    `post_id` INTEGER(11) NOT NULL,
    CONSTRAINT FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
    CONSTRAINT PRIMARY KEY (`email`, `post_id`)
);

CREATE TABLE `comments`(
    `cmt_id` INTEGER(11) AUTO_INCREMENT PRIMARY KEY,
    `post_id` INTEGER(11) NOT NULL,
    `cmt_parent` INTEGER(11),
    `cmt_like` INTEGER NOT NULL,
    `cmt_content` TEXT NOT NULL,
    `author` TEXT NOT NULL,
    CONSTRAINT `fk_post_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`)
);

INSERT INTO
    `posts` (
        `post_id`,
        `title`,
        `imgUrl`,
        `content`,
        `author`
    )
VALUES
    (
        NULL,
        'Trích một số đoạn ngắn trong \"thư tình gửi một người\" của nhạc sĩ Trịnh Công Sơn',
        'img/188985131_3964110483642195_8319599559141823789_n.png',
        'Ánh thân yêu,\r\nBuổi chiều hôm qua đọc xong thư Ánh anh chỉ mơ hồ cảm thấy mình vừa nhận một điều lành. Rồi anh lấy xe xuống anh Ý uống rượu để đốt cho ngời thêm những hân hoan trong anh. Khuya về thì cũng vừa để ngủ.\r\nBuổi sáng thật xanh và hiền, anh nghĩ xem nên nói gì với Ánh nữa không. Có lẽ không nên, anh đã nói với Ánh điều cần thiết của chúng mình, cũng là điều - cần - thiết - chóp - đỉnh. Như vậy đã quá đủ.\r\nTất cả những điều kiện khác chỉ là những âm mưu - vô - tình hủy diệt mà thôi.',
        'Lê Bùi Dĩ Hoà - lebuidihoa257@gmail.com'
    ),
    (
        NULL,
        'tết thiếu nhi kể chuyện làm người lớn',
        'img/191373423_1850578158444324_7226812569125501867_n.jpg',
        'nếu nghĩ về mình của khoảnh khắc này, cậu sẽ nghĩ gì? có tính từ nào hiện lên, nỗi đau khổ nào cậu vẫn ôm hay hi vọng nào trong cậu đang được thắp sáng?',
        'Lê Bùi Dĩ Hoà - lebuidihoa257@gmail.com'
    ),
    (
        NULL,
        'You are where you need to be',
        'img/178877777_1826699274165546_2205671345323187883_n.jpg',
        '“it didn’t feel right if it’s still going on” - nếu chuyện đó vẫn tiếp diễn thì nó không đúng nữa.\r\n\r\nở đây, bọn tớ hay chơi trò “mình đang được nhắn nhủ điều gì?” từ một trang sách, một lá bài tarot, một bức tranh hay suy nghĩ hiện lên.',
        'Lê Bùi Dĩ Hoà - lebuidihoa257@gmail.com'
    ),
    (
        NULL,
        'check in đi,',
        'img/178545680_1823629367805870_7018709141424960778_n.jpg',
        'cậu đang thế nào?\r\n',
        'Lê Bùi Dĩ Hoà - lebuidihoa257@gmail.com'
    ),
    (
        NULL,
        'Chúng ta chỉ thực sự tổn thương ở giây phút phải giả vờ rằng mình vẫn ổn',
        'img/196315264_593029915433802_7069546036523675502_n.jpg',
        'Không biết có ai giống mình không? Có một thời gian mình hay tự huyễn hoặc bản thân bằng những lời kiểu “không sao đâu”, “đừng nghĩ nhiều”, “không quan trọng đến thế đâu”, “ổn mà’,… Nhưng khi đó mình không biết rằng đa phần những lời “nói dối ngọt ngào” giả vờ rằng mình vẫn ổn ấy chỉ có hiệu quả trong thời gian rất ngắn. Để rồi sau mỗi lần mình nén xuống những cảm xúc, nỗi đau ấy thì chúng càng chồng chéo, càng rắc rối và không lối thoát. Cứ như thể bơm mãi một trái bóng căng phồng vậy. Mình cứ bơm mãi, bơm mãi những tiêu cực, giấu kín vào cái túi đấy, rồi đến một ngày nó sẽ vỡ oà khi nào chẳng hay.',
        'Lê Bùi Dĩ Hoà - lebuidihoa257@gmail.com'
    ),
    (
        NULL,
        'Miss trong tiếng anh là nhớ, nhưng miss cũng là bỏ lỡ',
        'img/193035562_591199938950133_8131373737949004407_n.jpg',
        'Có những người mình nhớ họ, nhưng mình cũng đã bỏ lỡ họ rồi. Dù mình vẫn còn xót xa, nuối tiếc nhưng việc níu giữ những mối quan hệ đã đi đến hồi kết có khác gì tiếp tục tưới nước cho một chậu cây đã héo úa đâu?\r\n',
        'Lê Bùi Dĩ Hoà - lebuidihoa257@gmail.com'
    ),
    (
        NULL,
        'Test',
        NULL,
        '<p><i><strong>Nội dung đó</strong></i></p>',
        'Hiếu Bùi - hieubui12345@gmail.com'
    ),
    (
        NULL,
        'Test',
        NULL,
        '<p>Nội dung</p>',
        'Hiếu Bùi - hieubui12345@gmail.com'
    ),
    (
        NULL,
        '\"MÙA ĐÔNG Ủ ẤM, MÙA HÈ TẢN BỘ\"',
        'img/158351993_501520857918042_9005686644728006349_n.png',
        '<p>\"The best relationship is the one that makes you become a better person, without changing you into someone than yourself.\"</p><p>Bạn đời, trước hết phải là bạn.</p><p>Tôi không biết phụ nữ khác đánh giá đàn ông thế nào.</p><p>Với tôi, đẹp trai đến mấy mà không lịch sự cũng chẳng bằng ô hợp lang bạt. Giàu có đến mấy mà bẩn bựa cũng không bằng anh nông dân chân chất.</p><p>Cuộc đời con người, dễ vì những thứ nhìn thấy bằng mắt thường mà xác định vị trí, yêu ghét.</p><p>Tôi sẽ nhìn rõ hơn một người, vì anh ta kéo ghế cho tôi, giữ thang máy cho tôi. Tôi sẽ rung động trước một người mà anh ta nhẹ nhàng khoác áo cho tôi, đổi ly nước sang bên khi tôi chuyển chỗ. Tôi trân trọng người mà, hỏi tôi ăn gì tôi còn đang lưỡng lự có thể đề xuất thứ tôi thích. Tôi sẽ lưu luyến, người vì tôi mà lưu tâm từng lời nói cử chỉ.</p><p>Phụ nữ thực ra rất đơn giản. Phụ nữ tệ chẳng nói làm gì. Nhưng người phụ nữ tốt thực sự không cần quá nhiều. Một căn nhà nhỏ ấm cúng không quá cao sang, anh trồng cây em nấu ăn, anh đọc sách em xem phim. Mùa đông ủ ấm, mùa hè tản bộ. Đời sống đơn giản, suôn sẻ, tôn trọng khoảng trời riêng của đối phương. Không cần nghi kỵ, không cần xét hỏi, tin tưởng mà bên nhau cùng già đi.</p><p>Cổ nhân có câu:</p><p>\"Tương kính như tân\"</p><p>Một mối quan hệ muốn bền lâu, thì đừng quên lúc ban đầu mình đã từng trân trọng đối phương như thế nào.</p><p>Bạn đời, trước khi làm vợ chồng thì thực sự nên là bạn. Vì khi tình yêu qua thời xuân mộng thì chính là tình thương ở lại. Nhưng phần nhiều người ta làm ngược lại, khi yêu thì cung phụng, cưới xong thì hoàn thành trách nhiệm, mặc thời gian phá hủy mối quan hệ. Họ không còn tôn trọng, trân quý nhau, họ coi đối phương đã là vật sở hữu trong tay, tùy ý đối đãi, thế nào cũng được.</p><p>Thà rằng không có, một đời tự mình phong phú hưởng thụ, đừng vội vã tạm bợ để rồi hối tiếc dài lâu.</p><p>Vì anh em mài đi móng vuốt, vì em anh từ bỏ tôn nghiêm. Chỉ khi nào người ta có thể vì đối phương mà cho đi, cũng không đánh mất mình, càng trở nên tốt đẹp hơn, khi ấy mới có thể trọn vẹn.</p><p>Nếu đã không thể cùng nhau đi đến cuối đường, thì khi ra đi cũng hãy văn minh lịch thiệp như khi xuất hiện, đừng để yêu thương trở thành oán hận.</p><p>Hoa càng rực rỡ càng chóng tàn.</p><p>Người càng phô trương càng dễ lãng quên.</p>',
        'Lê Bùi Dĩ Hoà - lebuidihoa257@gmail.com'
    ),
    (
        NULL,
        'Mũi',
        'img/176076408_1822859771216163_6550598812532589875_n.jpg',
        '<p>mỗi lần các chị ôm con mèo là sẽ dí mặt vào mặt nó, cọ cọ mũi vào mũi nó. mỗi lần mình thấy chó là cũng muốn làm thế, nhưng sợ mình là người lạ thì chúng nó cắn. mình nhớ hồi nhỏ làm vậy với bạn cún nhà mình, bạn ý ngay lập tức nhắm nghiền mắt lại, dừng một lúc để cảm nhận. hoặc sẽ hít hít và liếm mặt mình với cái mũi ướt của bạn.</p><p>mình nhớ lần ngủ cạnh mẹ gần nhất, hai mẹ con cũng nằm nghiêng người, quay mặt vào nhau. sát đến mức cụng cả trán và để nguyên như vậy. nếu có người khác thấy, mình nghĩ họ sẽ thấy hai mẹ con đang tạo hình trái tim.</p><p>mình không nhớ lần cụng trán hay cọ mũi lần cuối là với ai. có lẽ là với người từng thương, anh thường cụng trán, véo mũi mình rồi thơm lên trán. hoặc với một người bạn từng thương khác, hai đứa đi chơi về, đứa kia bảo là “ê mày có muốn thân với tao hơn bằng cách cọ mũi như người eskimo không?”. thế là hai đứa dở hơi đứng dưới nhà cọ cọ cái mũi rồi phì cười vào mặt nhau. rồi nó trở thành một thông lệ, rồi thành một cái hôn sau đó. hoặc một người bạn khác, khi thấy mình oải ra hoặc một giây phút chẳng gì cả, người đó sẽ vuốt nhẹ sống mũi rồi vuốt má rồi chẳng gì nữa cả.</p><p>mình thấy cái khoảnh khắc mong manh và gần gụi nhất không phải là khi hôn nhau hay chuẩn bị chạm môi. mà khi ta đủ gần ngắm nhìn con người trước mặt mình với một khoảng cách thật gần. không phải giữa một cặp đôi yêu nhau, mà là giữa người với người: hai mẹ con, mình và bạn cún thương, mình và người (yêu cũ), mình và bạn (dù có vẻ kì lạ). gần đến vậy, ta có thể nhìn thấy những đốm đồi mồi, tàn nhang, nốt ruồi, những sợi râu lún phún, nước dãi (của em cún), đôi môi khô, hoặc ướt vì hồi hộp mà liếm môi, hay làn da có nốt mụn hoặc dầu,</p><p>ta vẫn chọn chạm vào họ.</p><p>ảnh chụp từ 2016.</p>',
        'Lê Bùi Dĩ Hoà - lebuidihoa257@gmail.com'
    )