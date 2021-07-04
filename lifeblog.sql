-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2021 at 05:49 PM
-- Server version: 8.0.13-4
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lifeblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `cmt_like`
--

CREATE TABLE `cmt_like` (
  `email` varchar(255) NOT NULL,
  `cmt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cmt_like`
--

INSERT INTO `cmt_like` (`email`, `cmt_id`) VALUES
('hoale@gmail.com', 1),
('lebuidihoa257@gmail.com', 1),
('myhtddiii2@gmail.com', 1),
('hoale@gmail.com', 2),
('lebuidihoa257@gmail.com', 3),
('lebuidihoa257@gmail.com', 5),
('lebuidihoa257@gmail.com', 9),
('hoale@gmail.com', 11),
('lebuidihoa257@gmail.com', 11),
('myhtddiii2@gmail.com', 12),
('lebuidihoa257@gmail.com', 19);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cmt_id` int(11) NOT NULL,
  `cmt_parent` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `cmt_content` text NOT NULL,
  `author` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cmt_id`, `cmt_parent`, `post_id`, `cmt_content`, `author`, `date_time`) VALUES
(1, 0, 5, 'Check in nè nè nè nè', 'lebuidihoa257@gmail.com', '2021-05-19 12:08:14'),
(2, 0, 12, 'Đậm chất ngôn tình, sâu sắc như truyện ngôn tình TQ', 'lebuidihoa257@gmail.com', '2021-06-30 06:08:14'),
(3, 2, 12, 'nếu trong túi có tiền thì tự nhiên hạnh phúc.', 'lebuidihoa257@gmail.com', '2021-06-30 06:08:36'),
(6, 0, 2, 'Trịnh Công Sơn', 'hoale@gmail.com', '2021-06-16 15:18:17'),
(7, 6, 2, 'Trịnh Công Sơn', 'lebuidihoa257@gmail.com', '2021-06-17 17:56:57'),
(8, 0, 5, 'Muốn biến mất ghê', 'lebuidihoa257@gmail.com', '2021-06-08 22:53:36'),
(9, 0, 7, 'I miss you', 'lebuidihoa257@gmail.com', '2021-07-01 06:08:14'),
(10, 1, 5, 'Check in nuôn', 'hoale@gmail.com', '2021-07-03 00:04:46'),
(11, 0, 5, 'Test thử nè', 'myhtddiii2@gmail.com', '2021-07-03 00:10:25'),
(12, 0, 9, 'Biết sai lầm vậy sao không thay đổi đi?', 'myhtddiii2@gmail.com', '2021-07-03 00:12:12'),
(13, 8, 5, 'Don’t', 'myhtddiii2@gmail.com', '2021-07-03 00:28:37'),
(14, 0, 20, 'Dân chuyên văn đăng bài nó khác thật ', 'nhuhuynhpham2001@gmail.com', '2021-07-03 21:16:48'),
(15, 0, 9, 'Dính sai lầm lần đầu là do bạn còn non, nhưng vẫn dính sai lầm đó vào những lần sau? Là do bạn ngu', 'HoaSimp@gmail.com', '2021-07-03 21:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatarUrl` varchar(100) NOT NULL,
  `birth` date NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`email`, `name`, `avatarUrl`, `birth`, `password`) VALUES
('bancuaHoaLe@Wibunetwork.com', 'Ngô Hải', 'img/logo/Logo1.png', '2001-08-03', '74fc46011350386f05c94c9b48633ae7'),
('Baoquoccle@gmail.com', 'Lê Quốc Bảo', 'img/logo/Logo1.png', '2001-05-19', '68fe8f2aa739126f5df2c6e556f800ae'),
('dbrr@gmail.com', 'VL nuôn', 'img/logo/Logo1.png', '2021-07-13', '9d372c45762b35e645f110b9d4b56029'),
('hieubui12345@gmail.com', 'Hiếu Bùi', 'img/logo/Logo1.png', '2001-09-09', '01ddae4032e17a1c338baac9c4322b30'),
('hoale@gmail.com', 'Hoà Lê', 'img/avatar/hoale@gmail.com.png', '2021-06-21', '912ec803b2ce49e4a541068d495ab570'),
('HoaSimp@gmail.com', 'SimpLord', 'img/avatar/Logo1.png', '2001-07-13', '6994e1b7ee5373fd66675c705ae1f306'),
('ibesttrollvn1@gmail.com', 'love my', 'img/avatar/Logo1.png', '1998-10-13', '46773c6b28758022b6d6f8729a79f787'),
('lebuidihoa257@gmail.com', 'Lê Bùi Dĩ Hoà', 'img/avatar/lebuidihoa257@gmail.com.jpg', '2001-07-25', '7815696ecbf1c96e6894b779456d330e'),
('minh2454@gmail.com', 'Minh Fet', 'img/logo/Logo1.png', '2001-05-03', '5ab434881fffb9ad3fc061997aae8f51'),
('myhtddiii2@gmail.com', 'Huỳnh Trương Diễm My', 'img/avatar/myhtddiii2@gmail.com.jpg', '2021-07-30', 'c89f51a4377670c244c7b2baa3a2d8f2'),
('nhuhuynhpham2001@gmail.com', 'Huỳnh Như', 'img/avatar/nhuhuynhpham2001@gmail.com.jpg', '2001-08-11', 'd0b656889d677ccd2bff8e3c40f05242'),
('tai05122001@gmail.com', 'Tài Đòn', 'img/avatar/tai05122001@gmail.com.jpg', '2001-12-03', 'bb82fd2ec53bc92ea9a9b5ee8a8ac85b');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `noti_id` int(11) NOT NULL,
  `noti_content` text NOT NULL,
  `TIME` datetime NOT NULL,
  `email` varchar(255) NOT NULL,
  `seen` bit(1) DEFAULT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`noti_id`, `noti_content`, `TIME`, `email`, `seen`, `post_id`) VALUES
(4, '<strong>hoale@gmail.com</strong> đã thích bình luận của bạn', '2021-07-03 00:04:37', 'lebuidihoa257@gmail.com', b'1', 5),
(5, '<strong>hoale@gmail.com</strong> đã trả lời về bình luận của bạn', '2021-07-03 00:04:46', 'lebuidihoa257@gmail.com', b'1', 5),
(8, '<strong>myhtddiii2@gmail.com</strong> đã thích bình luận của bạn', '2021-07-03 00:11:07', 'lebuidihoa257@gmail.com', b'1', 5),
(9, '<strong>myhtddiii2@gmail.com</strong> đã thích bài viết của bạn', '2021-07-03 00:11:10', 'lebuidihoa257@gmail.com', b'1', 5),
(10, '<strong>myhtddiii2@gmail.com</strong> đã trả lời về bình luận của bạn', '2021-07-03 00:28:37', 'lebuidihoa257@gmail.com', b'1', 5),
(12, '<strong>myhtddiii2@gmail.com</strong> đã thích bài viết của bạn', '2021-07-03 12:06:01', 'lebuidihoa257@gmail.com', b'1', 2),
(13, '<strong>nhuhuynhpham2001@gmail.com</strong> đã thích bài viết của bạn', '2021-07-03 15:24:36', 'lebuidihoa257@gmail.com', b'1', 7),
(14, '<strong>lebuidihoa257@gmail.com</strong> đã thích bình luận của bạn', '2021-07-03 17:22:29', 'nhuhuynhpham2001@gmail.com', b'1', 5),
(15, '<strong>ibesttrollvn1@gmail.com</strong> đã thích bài viết của bạn', '2021-07-03 19:45:14', 'myhtddiii2@gmail.com', b'1', 20),
(16, '<strong>tai05122001@gmail.com</strong> đã thích bài viết của bạn', '2021-07-03 20:05:42', 'lebuidihoa257@gmail.com', b'1', 3),
(20, '<strong>nhuhuynhpham2001@gmail.com</strong> đã thích bài viết của bạn', '2021-07-03 21:15:35', 'myhtddiii2@gmail.com', b'1', 20);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `imgUrl` varchar(100) DEFAULT NULL,
  `content` longtext NOT NULL,
  `date_time` datetime NOT NULL,
  `author_email` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `imgUrl`, `content`, `date_time`, `author_email`, `author_name`) VALUES
(1, 'ĐỪNG BỎ QUA NHỮNG NỖI ĐAU NHỎ ', 'img/162535409_509034327166695_2726708296117186477_n.jpg', '<p>Đã bao giờ bạn tự nhiên cảm thấy rất đau, sợ hãi, lo lắng, buồn, khổ sở mà không hề có lý do cụ thể không?</p><p>Mình bị rồi. Nhiều học viên của mình cũng thế. Chẳng hạn như đêm hôm trước, mình đang tự làm reiki cho bản thân thì thấy một cơn đau nổi lên xung quanh khu vực đầu, và mình tự phát ra tiếng khóc. Như kiểu là cơ thể mình nó tự khóc chứ mình vốn không hề nghĩ gì, chỉ định reiki ngủ cho ngon.</p><p>Mình thấy chúng mình nhiều khi gặp khó khăn khi xử lý các cảm xúc là vì mình cứ cố truy tìm một sang chấn lớn nào đấy. Học viên lớp Heal&amp;Grow có bạn đi đủ các lớp chữa lành mà không lớp nào bạn ý bật ra được ký ức nào gây tổn thương cụ thể. Có bạn thì mình nhìn là thấy người này chắc chắn có sang chấn, nhưng hỏi ra thì người ta nói từ bé tới lớn không có biến cố gì?</p><p>Thực ra là như thế này mọi người ạ: Những sự kiện nhỏ nhưng tác động thường xuyên có thể gây ra tổn thương lớn ngang bằng với một sự kiện lớn. Ví dụ:</p><p>Một đứa trẻ bị bố mẹ chê bai hàng ngày sẽ mất tự tin và tự trọng ngang ngửa với một đứa trẻ gặp một thất bại kinh khủng.</p><p>Thế nên là những thứ tác động tiêu cực trong thời gian dài cũng cần phải được nhận biết và giải quyết thì chúng ta mới ổn được, chứ không chỉ truy tìm những ký ức, sang chấn lớn.</p><p>Việc chữa lành không chỉ trong một khoảnh khắc, nó còn là mỗi ngày thực hành một tí, mỗi ngày yêu bản thân một tí, mỗi ngày rèn một thói quen tích cực, như tiết kiệm tiền ấy. Dần dần bạn sẽ loại bỏ được những cảm xúc và ký ức tiêu cực, thay thế bằng hạnh phúc và bình an.</p>', '2021-03-20 22:05:37', 'lebuidihoa257@gmail.com', 'Lê Bùi Dĩ Hoà'),
(2, 'Trích một số đoạn ngắn trong \"thư tình gửi một người\" của nhạc sĩ Trịnh Công Sơn', 'img/188985131_3964110483642195_8319599559141823789_n.png', '<p>Ánh thân yêu,</p><p>Buổi chiều hôm qua đọc xong thư Ánh anh chỉ mơ hồ cảm thấy mình vừa nhận một điều lành. Rồi anh lấy xe xuống anh Ý uống rượu để đốt cho ngời thêm những hân hoan trong anh. Khuya về thì cũng vừa để ngủ.</p><p>Buổi sáng thật xanh và hiền, anh nghĩ xem nên nói gì với Ánh nữa không. Có lẽ không nên, anh đã nói với Ánh điều cần thiết của chúng mình, cũng là điều - cần - thiết - chóp - đỉnh. Như vậy đã quá đủ.</p><p>Tất cả những điều kiện khác chỉ là những âm mưu - vô - tình hủy diệt mà thôi.</p><p>Hãy trong sáng và hồn nhiên như buổi mai xanh và hiền này. Buổi mai không âm mưu, tình cảm cũng chẳng nên buộc thêm vào một âm mưu nào cả.</p><p>Yêu dấu.</p><p>Trịnh Công Sơn</p><p>* * *</p><p>Ánh yêu dấu,</p><p>Buổi chiều anh ngồi nhìn mưa làm tối dần căn phòng và sẫm dần hàng lá xanh.</p><p>Trong một phút nghĩ rằng mình đang có người yêu nên thấy hạnh phúc.</p><p>Ánh nhớ sang ảnh cho anh. Cỡ postale (1) cho đẹp và cho rõ.</p><p>Chiều mai anh phải xuống anh Ý ăn cơm mời. Có cả anh Cường xuống đó nữa.</p><p>Ánh làm gì hôm qua và hôm nay. Kể cả ngày mai là ba ngày rồi đó nhé.</p><p>Je t’embrasse (2).</p><p>Thân yêu.</p><p>Trịnh Công Sơn</p><p>* * *</p><p>Ánh ơi,</p><p>Anh xin tạ tội cùng Ánh. Chiều hôm qua dưới anh Bửu Ý có mời bạn bè ăn lúc 4 giờ. Anh tưởng là ăn nhanh để về kịp với Ánh nhưng về đến thì Ánh đã vừa đi.</p><p>Chắc mùa xuân thì Ánh không giận lâu. Đừng giận anh nghe Ánh. Sáng nay chắc Ánh không qua anh vì thế nào cũng có tức nhưng chiều nay thì qua thăm anh nghe. Anh xin lỗi một lần nữa vì đã thất hẹn. Điều đó anh ghét nhất nhưng đã chính anh nhầm vào lỗi đó trước.</p><p>Merci về đồng bạc cho mùa xuân. Chiều qua anh sớm nghe Ánh để mình còn có thì giờ đi chơi với nhau nếu Ánh thích.</p><p>Đừng buồn nghe em.</p><p>Yêu dấu.</p><p>Anh,</p><p>Trịnh Công Sơn</p><p>* * *</p><p>Ánh ơi,</p><p>Ánh chỉ ngụy biện cho Ánh. Ánh cũng biết là anh vẫn cần Ánh hơn ai hết.</p><p>Anh đã bao nhiêu tháng trời rồi chứ không phải chỉ một ngày.</p><p>Ánh vẫn rong chơi bỏ quên anh ở đây. Anh ghi những ngày hoang vu đó và sẽ giao cho Ánh lúc anh đi.</p><p>Tất cả sự cần thiết Ánh đã thấy rõ hơn ai anh biết thế.</p><p>Anh đã bỏ thêm hơn mười lăm ngày ở đây để chỉ mong đổi lại đôi ba lần Ánh sang.</p><p>Như thế mà Ánh còn buộc tội anh thì thật là oan. Suốt cả chiều nay anh đã rơi xuống qua sâu hơn vực thẳm và buổi chiều anh cũng uống cho say vừa về. Bây giờ anh cũng lại lang thang.</p><p>Ánh đã tin không?</p><p>Trịnh Công Sơn</p><p>(Có lẽ khoảng 15/9 anh mới đi. Anh phải còn nhìn thấy Ánh nhiều hơn)</p><p>---</p><p>Chú thích:</p><p>(1) Bưu thiếp</p><p>(2) Anh ôm hôn em</p>', '2021-05-31 09:46:37', 'lebuidihoa257@gmail.com', 'Lê Bùi Dĩ Hoà '),
(3, 'tết thiếu nhi kể chuyện làm người lớn', 'img/191373423_1850578158444324_7226812569125501867_n.jpg', '<p>nếu nghĩ về mình của khoảnh khắc này, cậu sẽ nghĩ gì? có tính từ nào hiện lên, nỗi đau khổ nào cậu vẫn ôm hay hi vọng nào trong cậu đang được thắp sáng?<br><br>hôm trước livestream, có câu hỏi “hành trình làm người lớn (hồn nhiên) của Huyền thế nào?”. tự nhiên bối rối và trả lời vòng vo với những từ khoá điển hình như “trách nhiệm”, “tâm hồn”, “tâm thế” rồi cũng tự thấy ngớ ngẩn. có lẽ vì chợt nhận ra việc lớn đến cả bố mẹ vẫn phải lớn, vỏ cây nứt toác ra vì nó lớn từ bên trong, thì mình cũng đang lớn.<br><br>rồi cũng thấy, khoảnh khắc này là mình đang trẻ nhất từ giờ đến hết quãng thời gian còn lại của mình, lớn nhất từ khi mình sinh ra cho tới nay, và mình vẫn đang lớn.<br><br>phải có nhìn lại, thấy những hành vi và suy nghĩ của mình mới biết hôm nay mình nghĩ khác thế nào. từng cái niềm tin rơi lả tả rồi để mình xây được niềm tin mới để bơi lội tiếp. rồi có lúc nhận ra mình chẳng muốn “người mình muốn là” lắm. và cũng chẳng có người lớn hồn nhiên nào cả, chỉ là một đứa trẻ với thân xác lớn chịu lột bỏ những thứ nó đã đắp lên để là một “người lớn”. một con người là chính họ, chẳng phải là đứa trẻ bên trong hay người lớn hồn nhiên gì cả.<br><br>trẻ con luôn có đôi mắt mới, người lớn thì có kinh nghiệm. tớ nghĩ khi mình lớn là mình tôi luyện khả năng của bản thân với những cơ hội và thử thách sắp tới. cũng chẳng phải bất cứ ai trong bọn mình là học sinh giỏi hay kém của “ông thầy” cuộc sống, mà mình đang cần học được điều gì lúc này thôi.<br><br>thấy vui vì mình được là mình, vì mình đã cho phép mình là mình.</p><p>Mắt toét</p>', '2021-06-01 22:38:37', 'lebuidihoa257@gmail.com', 'Lê Bùi Dĩ Hoà '),
(4, 'You are where you need to be', 'img/178877777_1826699274165546_2205671345323187883_n.jpg', '<p>“it didn’t feel right if it’s still going on” - nếu chuyện đó vẫn tiếp diễn thì nó không đúng nữa.</p><p>ở đây, bọn tớ hay chơi trò “mình đang được nhắn nhủ điều gì?” từ một trang sách, một lá bài tarot, một bức tranh hay suy nghĩ hiện lên.</p><p>để sống trong thực tại, tớ tập đem lại các giác quan trong mình. cảm nhận hơi thở từ bên ngoài vào phổi và đi ra. cảm nhận gió mơn man trên da, hoặc tê rần rần khi trời lặng gió. cảm nhận cái nóng hầm hập ban trưa và mồ hôi từng giọt chảy xuống lưng. cảm nhận từng thớ cơ căng duỗi khi tập yoga. nghiền-ngẫm đồ ăn trong bát với sự im lặng.</p><p>sống ở thực tại, là kể cả khi mình đang bị kéo về quá khứ hay kéo đến tương lai, mình vẫn ý thức được điều đó và quan sát nó.</p><p>có nhiều chuyện tớ vẫn tự hỏi vì sao nó không thành. có nhiều chuyện chẳng cần hỏi mà mình đã có câu trả lời, và nó cũng đã thành cục đá chìm thật sâu trong lòng.</p><p>rồi cũng chợt nhận ra, mọi thứ diễn ra để mình được ở đây. hiện tại là hiện tại tốt nhất có thể xảy ra, tớ luôn nghĩ vậy. không phải vì mình đang phải (hoặc được) học một bài học nào đó, hay một thử thách nào đó, chỉ là ở đây, ngay lúc này.</p><p>như kiểu:</p><p>ở cạnh một người mình đáng-lẽ nên ở cạnh thay vì một người mình đã thật sự muốn</p><p>đi cùng câu chuyện mà gặp ngõ cụt</p><p>gặp người, gặp chuyện mà trực giác đã bảo “đéo” nhưng mình thì còn lì lợm để rồi lì đòn và cũng đủ khôn ra để biết bỏ cuộc</p><p>ở trong một câu chuyện mà mình tự dựng lên một con người hoàn hảo và nương theo cái lý tưởng đó về mình thay vì là mình thật</p><p>thấy rõ ràng có thể bỏ được thì chẳng có nghĩa lý gì không nên bỏ càng sớm càng tốt</p><p>kiểu vậy.</p><p>bởi vì mọi chuyện đã đều đúng người, đúng thời điểm ĐÓ. nhưng nếu vẫn còn tiếp diễn (đến bây giờ) thì không thể nào thấy đúng được nữa.</p><p>vậy nên mọi thứ có cách vận hành của riêng nó.</p><p>Mắt toét</p>', '2021-05-01 22:25:37', 'lebuidihoa257@gmail.com', 'Lê Bùi Dĩ Hoà '),
(5, 'check in đi,', 'img/178545680_1823629367805870_7018709141424960778_n.jpg', '<p>cậu đang thế nào?</p><p>Mắt toét</p>', '2021-04-27 21:35:37', 'lebuidihoa257@gmail.com', 'Lê Bùi Dĩ Hoà'),
(6, 'Chúng ta chỉ thực sự tổn thương ở giây phút phải giả vờ rằng mình vẫn ổn', 'img/196315264_593029915433802_7069546036523675502_n.jpg', '<p>Không biết có ai giống mình không? Có một thời gian mình hay tự huyễn hoặc bản thân bằng những lời kiểu “không sao đâu”, “đừng nghĩ nhiều”, “không quan trọng đến thế đâu”, “ổn mà\",… Nhưng khi đó mình không biết rằng đa phần những lời “nói dối ngọt ngào” giả vờ rằng mình vẫn ổn ấy chỉ có hiệu quả trong thời gian rất ngắn. Để rồi sau mỗi lần mình nén xuống những cảm xúc, nỗi đau ấy thì chúng càng chồng chéo, càng rắc rối và không lối thoát. Cứ như thể bơm mãi một trái bóng căng phồng vậy. Mình cứ bơm mãi, bơm mãi những tiêu cực, giấu kín vào cái túi đấy, rồi đến một ngày nó sẽ vỡ oà khi nào chẳng hay.</p><p>Tại sao khi đó mình lại giả vờ là mình vẫn ổn? Tại sao không ổn mà không dám nói ra? Đến bây giờ nhìn lại, mình mới nhận ra rằng, có lẽ lí do thật sự khiến mình không dám đối mặt với chúng là bởi mình sợ khi phải gánh chịu hệ luỵ của cảm xúc đó. Mình sợ rằng việc nói ra chỉ khiến mọi thứ tồi tệ hơn. Mình sợ rằng mất sẽ nhiều hơn là được. Bởi đã có lúc, mình nhìn thấy người khác không kiềm chế được nỗi đau, cơn giận của họ và khiến không chỉ họ mà cả những người khác cũng tổn thương lây. Mình sợ hãi và không muốn bản thân cũng rơi vào trạng thái như vậy.</p><p>Vậy phải làm sao giờ? Có một cách tuy đơn giản nhưng rất hiệu quả mà mình học được sau này chính là: không ổn thì cứ nhận là không ổn. Bạn buồn, bạn giận dữ và thất vọng, đó là những cảm xúc hoàn toàn bình thường, chẳng việc gì phải che giấu cả. Cứ chân thành, dám đối mặt với những cảm xúc ấy thay vì trốn tránh chúng. Thậm chí, cứ “phát tiết” hết sức có thể cũng được. Khi đã đủ can đảm đối diện trực tiếp bạn sẽ nhận ra rằng à, thì ra cảm xúc tiêu cực cũng không đáng sợ đến vậy. Bên cạnh đó, việc dành thời gian quan tâm, giải quyết những mầm mống tiêu cực từ đầu vẫn đỡ hơn là chờ đến khi chúng đã bén rễ sâu mới xử lí đó bạn à.</p><p>Thực lòng với cảm xúc của mình chưa bao giờ là một điều dễ dàng cả, nhất là khi chúng ta đang rơi vào trạng thái buồn bã, đau khổ hay giận dữ. Thế nhưng trốn tránh chúng chỉ khiến mọi chuyện tồi tệ hơn thôi. Chúng mình đều là người trần mắt thịt, đều biết buồn, biết đau, vậy sao phải giả vờ rằng mình ổn khi thực chất không phải vậy nhỉ?Dù là khi bạn vui, bạn buồn hay không ổn thì hãy cứ nói thật rõ ra bạn nhé!</p><p>Mong rằng mỗi ngày thức dậy chúng mình đều có thể nở nụ cười hạnh phúc thật tươi, an yên từ tận đáy lòng</p><p>Viết chữa lành</p>', '2021-06-18 11:41:37', 'lebuidihoa257@gmail.com', 'Lê Bùi Dĩ Hoà '),
(7, 'Miss trong tiếng anh là nhớ, nhưng miss cũng là bỏ lỡ', 'img/193035562_591199938950133_8131373737949004407_n.jpg', '<p>Có những người mình nhớ họ, nhưng mình cũng đã bỏ lỡ họ rồi. Dù mình vẫn còn xót xa, nuối tiếc nhưng việc níu giữ những mối quan hệ đã đi đến hồi kết có khác gì tiếp tục tưới nước cho một chậu cây đã héo úa đâu?</p><p>Đừng vì miss - nỗi nhớ cho một điều gì đó đã qua khiến bạn miss - bỏ lỡ những điều tuyệt vời hơn thế đang chờ đợi nhé. Hãy tập trung vào hiện tại, vào những người đang ở bên bạn. Bởi lẽ điều tuyệt vời nhất không phải ở quá khứ hay tương lai mà nằm trong chính khoảnh khắc hiện tại đó bạn à.</p><p>Viết chữa lành</p>', '2021-06-15 12:47:37', 'lebuidihoa257@gmail.com', 'Lê Bùi Dĩ Hoà '),
(8, 'Bước vào thế giới của nhau', 'img/206029426_1871731016329038_6670521706383161342_n.jpg', '<p>Một đêm trong những đêm ngẫu nhiên, bạn nhắn tin cho tớ. Như mọi lần, hai đứa vừa cười đùa vừa kể chuyện cho nhau nghe. Chuyện này dẫn đến chuyện nọ, tự nhiên chạm vào một phần mà tớ giữ kín với bạn mấy năm nay.</p><p>Chơi với nhau hơn 12 năm, bạn là người chứng kiến tớ lớn lên từ nhỏ tới lớn. Từ lúc bạn giành ngôi vị đầu bảng của tớ trong lớp tiếng Anh, từ khi tớ hậm hực giận dỗi với bạn về điều đó. Lần đầu tiên thua một đứa con trai, tớ đã ghét bạn. Nhưng như mọi đứa trẻ con khác, tớ chẳng thể giận lâu. Ngày đó bạn còn giật tóc tớ nếu ngồi đằng sau. Bạn vẽ tranh biếm hoạ về tớ giống như trên báo. Bạn thậm chí còn chẳng chấp tớ về những tranh đua này. Khi tớ đã thích bạn từ lớp 5 đến lớp 11. Khi tớ nói tớ thích bạn tận 4 lần trong 6 năm. Khi tớ thay đổi từ một đứa kẹp răng đeo kính hồng, da ngăm, thành một cô gái biết mặc váy và trang điểm. Và với bạn, tớ vừa lớn, mà cũng chẳng khác gì.</p><p>Tớ cũng chứng kiến bạn lớn lên. Khi bạn còn là một đứa con trai nghịch ngợm thích gửi virus sang máy cô giáo, tắt hơn trăm cái tab hiện không dứt. Là đứa hack buzz yahoo của tớ đến khi nào tớ trả lời thì thôi. Là đứa nghe người khác bảo thích mà cứ “Ừ, tao cũng thích mày”, hoặc “mày là đứa con gái tuyệt vời nhất tao từng gặp”. Rồi thôi :D. Là đứa hay bày trò làm tớ cười như nắc nẻ. “Ê mày nhìn này &gt;++++&gt;, đây là xương cá”. Là người cho tớ biết meme là gì. Là đứa đến tận cấp 3 mới học gần hơn để đi ăn thịt xiên với nhau, và đưa cho nhau thanh snickers vào giao thừa. Là đứa chịu chở tớ trên con xe đạp mà có lẽ tớ cảm thấy mình nặng lắm. Rồi bạn lớn hơn tớ một cái đầu, rồi khi đứng cạnh, tớ chỉ đứng đến vai bạn. Rồi bạn đi du học, và chịu xách cho tớ 4 cân sách về Việt Nam. Rồi bạn lại đi tiếp, mang hẳn về cho tớ một đôi giày tớ thích, nguyên hộp và nặng trịch, chỉ để cho món quà được trọn vẹn. Bạn còn biết thú thật rằng hồi đó bạn thích tớ, nhưng chẳng biết làm gì hơn. Năm đó bạn nắm tay tớ “bù” trong rạp phim. Tớ cũng ôm và thơm má bạn cho những năm thích-không-thầm đó. Với tớ, bạn vừa lớn, mà cũng chẳng khác gì.</p><p>Số lần hai đứa nói chuyện với nhau gần như đếm trên đầu ngón tay. Thi thoảng nhớ ra thì hỏi chuyện, có meme gợi thì tag hoặc gửi cho. Tết đến bạn không ở nhà thì hai đứa gọi, một đứa vừa chơi game hoặc chứng khoán, đứa kia thì dọn nhà và giả vờ làm youtuber “chào mừng các bạn đã đến phiên dọn nhà của bạn Hoèn”. Thi thoảng tớ cảm thấy chẳng được nhìn thấy, bạn gửi cho tớ bài “Darling I do” để nhắc là tớ tuyệt zời thế nào. Mọi thứ cứ như nửa đùa nửa thật. Lúc deep thì sẽ có đứa vươn vai rồi xoà đi nhẹ tênh. Lúc lêu hêu thì có đứa lại nghiêm túc rồi đứa kia sẽ bĩu môi…</p><p>Hôm đó, như mọi hôm. Kể chuyện như đùa mà cũng như thật. Nhưng lần này bạn đã giẫm phải một quả mìn được chôn chặt từ lâu. Tớ coi bạn là người thân, nhưng không phải chuyện gì tớ cũng kể vì tớ nghĩ bạn sẽ không hiểu được. Bạn năm đó thấy tớ quạu quọ, nghĩ tớ vì chuyện trường lớp nên cáu bẳn. Bạn đã không biết, và bạn đã lỡ lời trêu tớ. Tớ, lúc đó, mong manh đến chết, chảy một giọt nước mắt, nằm xem phim rồi đi ngủ. Bỏ mặc hai tin nhắn xin lỗi của bạn. Tớ nhắm mắt với suy nghĩ “tình bạn dừng ở đây thôi”. Tớ nghĩ đến viễn cảnh tớ sẽ chẳng bao giờ đáp lại tin nhắn của bạn nữa. Rồi một ngày nọ bạn sẽ vào facebook tớ, và thấy chẳng còn bạn bè gì nữa.</p><p>Sáng ra, tớ vẫn nghĩ vậy. Có bớt nặng nề hơn. Chưa bao giờ tớ bị áp lực phải làm bạn với bạn, và bạn cũng thế. Có lẽ vì vậy mà tớ cảm thấy tình bạn này nhẹ hều à. Nhưng thực ra, tớ cảm thấy sợ vì tớ nghĩ nếu mình kể câu chuyện đó cho bạn, bạn sẽ không hiểu, bạn sẽ đánh giá tớ, bạn sẽ mắng tớ. Nhưng tớ đủ biết bạn và đặt niềm tin vào bạn, và cũng đặt niềm tin vào mình, rằng sẽ không sao cả nếu như bạn có giận, vì đó là câu chuyện của tớ.</p><p>Tối muộn, tớ nhắn lại cho bạn, tớ biết rằng bạn không cố ý. Tớ kể về ý định ghost bạn của tớ. Bạn bật cười, hiểu tớ đến mức bạn cũng nghĩ như vậy. Cơ mà hai đứa lớn rồi. Nếu một đứa không lớn thì kệ đấy. Tớ cũng tỉ mỉ “chỉnh” bạn trong trường hợp như thế này thì cần phải làm gì, chỉ bạn “emotional aid” cho mình và người khác.</p><p>Rồi tớ kể chuyện cho bạn. Vẫn với những cảm xúc ấy, nhưng không còn cảm thấy tệ về chính mình nữa. Tớ vừa kể vừa mỉa mai, lại vừa buồn bực và cũng cười vui với chính mình. Bạn im lặng một lúc, có đùa một câu hùa theo tớ, và cũng im lặng để “đọc” đến cuối câu chuyện đó. Bạn im lặng, và hỏi tớ “tao gọi cho mày được không?”</p><p>Tớ thì sụt sịt, bạn thì cười phá lên. “Cười cái gì?”, tớ dỗi, và cũng nhắm tịt mắt chờ bạn mắng. “Trời ơi tao đang rất mừng vì mày đã kể cho tao, thật sự đấy, tao rất tự hào về mày, trời ơi,…”. Bạn bảo, hoá ra năm đó tớ phải trải qua chuyện đó, mà bạn lại cứ nghĩ tớ trẻ con với những chuyện “nhỏ nhặt”. Bạn bảo, nếu không được biết thì chắc vẫn nghĩ hồi đấy tớ bị dở hơi mất. Rồi bạn đi vào tâm trạng rất nghiêm túc: “mày có ổn không? thế giờ mày cảm thấy thế nào về chuyện ấy? thế chuyện này có hệ quả gì tệ cho mày sau này không? thế giờ mày có cần hỗ trợ gì không?…” Bạn đặt nhiều câu hỏi đến mức tớ phải cố nhớ và trả lời lần lượt, buồn cười trong nước mắt vì sự ngây ngô nhưng cũng người lớn của bạn. Tớ vui vì đã kể cho bạn nghe.</p><p>Hơn 2h sáng, mắt tớ díu lại mà bạn vẫn hỏi han. Bạn cứ khen tớ không ngừng, và dỗ tớ không ngừng, “người thông minh cũng có lúc đần độn mà, chẳng sao cả”. “Mày ổn là tốt rồi”. Rồi lại còn nói chuyện phiếm, năm đó sao tao lại ít nói chuyện với mày nhỉ, à, vì có người yêu á hả? Ừ, mày có người yêu thì tao cũng phải tem tém không là bạn kia sẽ ghen đấy. Thế tao sẽ không bao giờ có người yêu để làm bạn với mày suốt đời…Tớ, đầu dây bên này khúc khích trong nước mắt, vừa thấy bạn người lớn thoáng chốc đã lại trẻ con rồi.</p><p>Mắt toét</p>', '2021-07-02 02:35:59', 'hoale@gmail.com', 'Hoà Lê'),
(9, 'LỪA MÌNH DỐI NGƯỜI', 'img/IMG_20210615_161522.jpg', '<p>Bám theo những sai lầm, miệng bảo sẽ ổn thôi. Nhưng có thật sự ổn không?</p>', '2021-07-02 14:24:01', 'nhuhuynhpham2001@gmail.com', 'Huỳnh Như'),
(12, 'Bạn đời, trước hết phải là bạn.', 'img/158351993_501520857918042_9005686644728006349_n.png', '<p>\"The best relationship is the one that makes you become a better person, without changing you into someone than yourself.\"</p><p>Bạn đời, trước hết phải là bạn.</p><p>Tôi không biết phụ nữ khác đánh giá đàn ông thế nào.</p><p>Với tôi, đẹp trai đến mấy mà không lịch sự cũng chẳng bằng ô hợp lang bạt. Giàu có đến mấy mà bẩn bựa cũng không bằng anh nông dân chân chất.</p><p>Cuộc đời con người, dễ vì những thứ nhìn thấy bằng mắt thường mà xác định vị trí, yêu ghét.</p><p>Tôi sẽ nhìn rõ hơn một người, vì anh ta kéo ghế cho tôi, giữ thang máy cho tôi. Tôi sẽ rung động trước một người mà anh ta nhẹ nhàng khoác áo cho tôi, đổi ly nước sang bên khi tôi chuyển chỗ. Tôi trân trọng người mà, hỏi tôi ăn gì tôi còn đang lưỡng lự có thể đề xuất thứ tôi thích. Tôi sẽ lưu luyến, người vì tôi mà lưu tâm từng lời nói cử chỉ.</p><p>Phụ nữ thực ra rất đơn giản. Phụ nữ tệ chẳng nói làm gì. Nhưng người phụ nữ tốt thực sự không cần quá nhiều. Một căn nhà nhỏ ấm cúng không quá cao sang, anh trồng cây em nấu ăn, anh đọc sách em xem phim. Mùa đông ủ ấm, mùa hè tản bộ. Đời sống đơn giản, suôn sẻ, tôn trọng khoảng trời riêng của đối phương. Không cần nghi kỵ, không cần xét hỏi, tin tưởng mà bên nhau cùng già đi.</p><p>Cổ nhân có câu:</p><p>\"Tương kính như tân\"</p><p>Một mối quan hệ muốn bền lâu, thì đừng quên lúc ban đầu mình đã từng trân trọng đối phương như thế nào.</p><p>Bạn đời, trước khi làm vợ chồng thì thực sự nên là bạn. Vì khi tình yêu qua thời xuân mộng thì chính là tình thương ở lại. Nhưng phần nhiều người ta làm ngược lại, khi yêu thì cung phụng, cưới xong thì hoàn thành trách nhiệm, mặc thời gian phá hủy mối quan hệ. Họ không còn tôn trọng, trân quý nhau, họ coi đối phương đã là vật sở hữu trong tay, tùy ý đối đãi, thế nào cũng được.</p><p>Thà rằng không có, một đời tự mình phong phú hưởng thụ, đừng vội vã tạm bợ để rồi hối tiếc dài lâu.</p><p>Vì anh em mài đi móng vuốt, vì em anh từ bỏ tôn nghiêm. Chỉ khi nào người ta có thể vì đối phương mà cho đi, cũng không đánh mất mình, càng trở nên tốt đẹp hơn, khi ấy mới có thể trọn vẹn.</p><p>Nếu đã không thể cùng nhau đi đến cuối đường, thì khi ra đi cũng hãy văn minh lịch thiệp như khi xuất hiện, đừng để yêu thương trở thành oán hận.</p><p>Hoa càng rực rỡ càng chóng tàn.</p><p>Người càng phô trương càng dễ lãng quên.</p><p>Viết chữa lành</p>', '2021-03-09 21:39:37', 'lebuidihoa257@gmail.com', 'Lê Bùi Dĩ Hoà '),
(13, 'Mũi', 'img/176076408_1822859771216163_6550598812532589875_n.jpg', '<p>mỗi lần các chị ôm con mèo là sẽ dí mặt vào mặt nó, cọ cọ mũi vào mũi nó. mỗi lần mình thấy chó là cũng muốn làm thế, nhưng sợ mình là người lạ thì chúng nó cắn. mình nhớ hồi nhỏ làm vậy với bạn cún nhà mình, bạn ý ngay lập tức nhắm nghiền mắt lại, dừng một lúc để cảm nhận. hoặc sẽ hít hít và liếm mặt mình với cái mũi ướt của bạn.</p><p>mình nhớ lần ngủ cạnh mẹ gần nhất, hai mẹ con cũng nằm nghiêng người, quay mặt vào nhau. sát đến mức cụng cả trán và để nguyên như vậy. nếu có người khác thấy, mình nghĩ họ sẽ thấy hai mẹ con đang tạo hình trái tim.</p><p>mình không nhớ lần cụng trán hay cọ mũi lần cuối là với ai. có lẽ là với người từng thương, anh thường cụng trán, véo mũi mình rồi thơm lên trán. hoặc với một người bạn từng thương khác, hai đứa đi chơi về, đứa kia bảo là “ê mày có muốn thân với tao hơn bằng cách cọ mũi như người eskimo không?”. thế là hai đứa dở hơi đứng dưới nhà cọ cọ cái mũi rồi phì cười vào mặt nhau. rồi nó trở thành một thông lệ, rồi thành một cái hôn sau đó. hoặc một người bạn khác, khi thấy mình oải ra hoặc một giây phút chẳng gì cả, người đó sẽ vuốt nhẹ sống mũi rồi vuốt má rồi chẳng gì nữa cả.</p><p>mình thấy cái khoảnh khắc mong manh và gần gụi nhất không phải là khi hôn nhau hay chuẩn bị chạm môi. mà khi ta đủ gần ngắm nhìn con người trước mặt mình với một khoảng cách thật gần. không phải giữa một cặp đôi yêu nhau, mà là giữa người với người: hai mẹ con, mình và bạn cún thương, mình và người (yêu cũ), mình và bạn (dù có vẻ kì lạ). gần đến vậy, ta có thể nhìn thấy những đốm đồi mồi, tàn nhang, nốt ruồi, những sợi râu lún phún, nước dãi (của em cún), đôi môi khô, hoặc ướt vì hồi hộp mà liếm môi, hay làn da có nốt mụn hoặc dầu,</p><p>ta vẫn chọn chạm vào họ.</p><p>ảnh chụp từ 2016.</p><p>Mắt toét</p>', '2021-07-01 06:19:37', 'lebuidihoa257@gmail.com', 'Lê Bùi Dĩ Hoà '),
(14, 'ĐI NGƯỢC LẠI VỚI ĐỊNH NGHĨA ', 'img/162809020_511778586892269_3687806669231235166_n.png', '<p>Tôi ngày càng trở nên dễ tâm giao với các bạn trẻ gần tới 30, liệu chăng là luật hấp dẫn, hay vì 1 lí do gì khác, tôi cũng không biết nữa. Tôi vẫn nhớ hoài năm tôi 29 tuổi, chính thức chia tay mối tình bình yên một cách văn minh. Rồi 30 tuổi, tôi bắt đầu hành trình đi sâu vào trong mình qua những khóa học phát triển bản thân.</p><p>Năm 30 tuổi ấy, tôi đổi nghề.</p><p>Giữa đỉnh cao của sự nghiệp đương đại với mức lương cao ngất ngưỡng trong ngành nghề khá hot, tôi đổi nghề, rẽ sang một hướng khác. Vì sao ư? Vì nó đúng.</p><p>Mãi sau này tình cờ đọc quyển 1987 +: 30 chưa phải là Tết, tôi nghĩ câu chuyện của tôi có thể là 1 chương của quyển sách ấy. Tôi cảm ơn các tác giả, đã truyền một ngọn lửa cảm hứng cho độc giả, về sự dũng cảm của những người trẻ dám sống hết mình. Xin phép trích dẫn 1 đoạn review về sách “ đây là những câu chuyện về tuổi 30, về những suy tư, trăn trở khi đã “tam thập nhi lập”. Đó là Trần Đặng Đăng Khoa, chàng trai phượt thủ quyết định kỷ niệm cột mốc tuổi 30 bằng việc lái xe máy đi du lịch vòng quanh thế giới. Đó là hoa hậu Mai Phương Thúy sau ánh hào quang showbiz tưởng như khuynh đảo thông tin mạng xã hội đã khám phá bản thân mình ở lĩnh vực đầu tư tài chính. Đó là Uyên Linh, cô gái 10 năm trước vẫn còn đi kinh doanh quần áo thời sinh viên để rồi trở thành Thần tượng âm nhạc Việt Nam và đến nay là một trong những nữ ca sĩ hàng đầu. Đó là Luân, chàng trai từ bỏ giấc mơ Mỹ để lên Đà Lạt xây ngôi nhà có tên gọi “ Thời Thanh Xuân” là nơi mà “người nói” và “ người điếc “ chung sống hạnh phúc. Đó cũng là Machi, cô gái Đinh Mão đã qua “ hai lần đò” để rồi tìm thấy hạnh phúc nơi căn bếp bên chiếc tạp dề”…</p><p>Những nhân vật ấy, đã đi ngược lại với định nghĩa “thành công” của gia đình và xã hội theo cách truyền thống, để sống hết mình và tỏa sáng, họ, trong mắt tôi, là những người thành công hạnh phúc.</p><p>Họ đã dám “đổi nghề”, đổi con đường thẳng tắp mình đang đi mà rẽ sang 1 khúc ngoặt quanh co, để giấc mơ của mình không bị phản bội.</p><p>Nhưng liệu tất cả chúng ta ai cũng có được nghị lực phi thường ấy, hay có được những sự kiện và cuộc thi quan trọng giúp chúng ta nhận ra con đường nào mới là dành cho mình, mới đúng là thứ mình giỏi, thứ mình thích và là việc mang lại ý nghĩa cho bản thân và cuộc đời này.</p><p>Chắc chắn là tất cả chúng ta không được may mắn như thế. Mình và Trang Mto, vì thế đã cho ra đời dự án “ Viết sự nghiệp – Vẽ cuộc đời”, các bạn đã được cung cấp các công cụ cực kì đơn giản và mang tính ứng dụng cao để các bạn thấy rõ hơn hết con đường nào BẠN nên đi. Tin mình đi, ai trong chúng ta cũng là 1 siêu anh hùng, là những ngôi sao, và các bạn sẽ thấy trận mạc hay bầu trời của mình.</p><p>Hãy cùng chúng mình tìm ra NÓ nhé.</p><p>Từ một người yêu năm 30 của mình</p><p>Viết chữa lành</p>', '2021-03-24 20:01:37', 'hoale@gmail.com', 'Hoà Lê '),
(15, 'CHĂM SÓC BẢN THÂN (SELF-CARE) HAY LÀ ÍCH KỶ (SELFISH)? ', 'img/159414778_505907824146012_4802705699852904088_n.png', '<p>Ai trong chúng ta cũng có những nhu cầu riêng cho bản thân dù trong bất kỳ khía cạnh nào trong cuộc sống: công việc, gia đình, mối quan hệ, hay chỉ đơn giản là nhu cầu ăn uống, vui chơi, nghỉ ngơi. Không có nhu cầu nào của một người là giống hoàn toàn với nhu cầu của người khác, vì vậy quan điểm của mỗi người với mỗi việc cũng sẽ khác nhau. Việc đáp ứng các nhu cầu của mình bản chất là chăm sóc bản thân, nhưng vì chúng ta bị ảnh hưởng từ quan điểm, ý kiến của người khác nên không ít người, đặc biệt là chị em phụ nữ gạt bỏ nhu cầu của mình với lí do sợ bị cho là \"ích kỷ.\"</p><p>Mình đã từng được tiếp xúc với rất nhiều bệnh nhân phải gánh vác mọi thứ vì không muốn cảm thấy tội lỗi, thấy ích kỷ mà quên đi bản thân mình. Việc bỏ bê nhu cầu của bản thân sẽ để lại hậu quả nặng nề về cảm xúc và rồi biểu hiện trên cả cơ thể vật lý và đời sống thường ngày nữa. Vì vậy, chúng ta cần phân biệt giữa self-care và selfish một cách rõ ràng, nhưng đôi khi cùng cần hiểu rằng self-care có thể có nghĩa là selfish trong một số trường hợp và như vậy cũng không sao hết! Trong bài viết hôm nay, mình sẽ đưa ra cách phân biệt và một số trường hợp bạn có thể \"ích kỷ\" một chút vì bản thân mà không thấy tội lỗi.</p><p>1. Self-care thực sự là gì và định nghĩa \"ích kỷ\"?</p><p>Trước hết, cần làm rõ rằng biểu hiện của self-care không chỉ là những hình thức được thương mại, truyền thông hoá như tắm bồn, chăm sóc da, thưởng cho mình một tối thư giãn, v.v. Self-care bắt đầu là một cách để chăm sóc thể chất cho bản thân. Sau đó, nó phát triển thành việc chăm sóc sức khỏe tinh thần của bạn có thể là việc tập thể dục, quan sát cảm xúc khó chịu của mình mà không chối bỏ chúng, nói không với một cam kết khiến mình không thoải mái, v.v. Những việc này đôi khi không cho bạn cảm giác dễ chịu khi thực hiện chúng.</p><p>Trong khi đó, ích kỷ thường định nghĩa là khi ta đặt lợi ích của mình lên trước lợi ích của người khác một cách bất chấp. Nhưng hãy để ý trên máy bay, bạn luôn được yêu cầu đeo mặt nạ dưỡng khí cho mình trước khi trợ giúp ai đó. Ở khía cạnh nào đó, hành động này được cho là \"ích kỷ\" nhưng lại là việc làm đúng đắn. Vì vậy không có thước đo trắng và đen gán nhãn cho quyết định của chúng ta. Nhưng khi nào thì mình có thể để bản thân \"ích kỷ\" một chút?</p><p>2. Bạn cần giúp đỡ</p><p>Mọi người thỉnh thoảng cần được giúp đỡ, nhưng chúng ta thường tránh tìm kiếm sự giúp đỡ đó. Cho dù chúng ta có thừa nhận hay không, đôi khi yêu cầu giúp đỡ có thể khiến bạn cảm thấy mình kém cỏi, yếu đuối hoặc thiếu thốn - ngay cả khi không yêu cầu giúp đỡ đồng nghĩa với việc thêm căng thẳng không cần thiết.</p><p>Nhưng yêu cầu giúp đỡ khi bạn cần là điều quan trọng. Nếu căng thẳng của một dự án công việc đang đến với bạn, hãy nhờ đồng nghiệp hỗ trợ hoặc ủy thác nhiệm vụ. Nếu bạn cần sự đồng hành, hãy nhờ bạn bè hỗ trợ. Nếu bạn cần một tiếng nói bên ngoài không thiên vị, hãy tìm kiếm người trị liệu chuyên nghiệp.</p><p>3. Bạn cần nghỉ ngơi</p><p>Khi bạn cảm thấy mệt mỏi - không quan trọng là cảm xúc, tinh thần hay thể chất - đó là thời gian để nghỉ ngơi. Đôi khi, tất cả những gì bạn cần là giấc ngủ.</p><p>Nếu bạn làm việc muộn và thiếu ngủ liên tục, đã đến lúc bạn cần tìm lại sự cân bằng giữa công việc và cuộc sống. Và lần tới khi bạn chọn về nhà và ngủ thay vì đi ăn uống muộn với bạn bè, điều đó không sao cả.</p><p>Hơn nữa, nghỉ ngơi không phải lúc nào cũng có nghĩa là ngủ. Cho dù bộ não của bạn đang cảm thấy mất thăng bằng hay tình trạng sức khỏe của bạn bùng phát, hãy xin nghỉ một ngày và dành thời gian nghỉ ngơi. Đừng cảm thấy phải giặt giũ vì bạn đang ở nhà. Thay vào đó, đọc sách trên giường, say sưa xem một chương trình hoặc chợp mắt một lúc.</p><p>Nếu bạn cảm thấy mệt mỏi, kiệt sức hoặc đau đớn, đã đến lúc bạn nên nghỉ ngơi thêm và không cảm thấy tội lỗi về điều đó. Nghỉ ngơi là điều cần thiết đối với bất kỳ giai đoạn phục hồi nào.</p><p>4. Bạn cần thời gian một mình</p><p>Một số người có thể không hiểu được khi bạn chọn ở nhà thay vì đi ra ngoài chơi. Nếu đó là điều bạn muốn làm, đừng cảm thấy ích kỷ khi muốn ở một mình.</p><p>Tất cả chúng ta đôi khi cần thời gian ở một mình, và một số người cần nhiều hơn những người khác. Tương tác xã hội có thể khiến một số người mệt mỏi. Không có gì xấu hổ khi dành thời gian cho bản thân.</p><p>Nếu bạn đang làm việc không ngừng nghỉ, tâm trạng của bạn không được như ý muốn hoặc bạn cần đánh giá lại các mối quan hệ của mình, thì bây giờ có thể là thời điểm tốt để lên kế hoạch cho thời gian ở một mình.</p><p>Bạn không cần lấp đầy lịch của mình bằng các sự kiện xã hội trừ khi bạn muốn. Đi tắm và có “thời gian dành cho tôi” mà bạn đang khao khát.</p><p>5. Đã đến lúc kết thúc một mối quan hệ, công việc hoặc hoàn cảnh sống</p><p>Việc chia tay với một người, chuyển đến một thành phố mới hoặc từ bỏ một công việc chưa bao giờ là dễ dàng. Nếu bạn cảm thấy tồi tệ khi tiếp xúc với ai đó hoặc sợ gặp lại họ, thì đã đến lúc suy nghĩ lại về mối quan hệ của bạn.</p><p>Chúng ta thường giữ mối quan hệ bạn bè hoặc các mối quan hệ vì chúng ta sợ làm tổn thương ai đó. Nhưng khi nói đến những mối quan hệ gây tổn hại, đôi khi bạn cần đặt bản thân mình lên hàng đầu.</p><p>Việc tiếp tục một mối quan hệ - hoặc công việc hay bất cứ điều gì, đặc biệt là mối quan hệ bị lạm dụng theo bất kỳ cách nào - không còn khiến bạn hạnh phúc nữa. Nếu điều gì đó ảnh hưởng đến hạnh phúc của bạn, có thể đã đến lúc bạn phải nói lời tạm biệt.</p><p>6. Khi bạn đang cho nhiều hơn đáng kể so với nhận</p><p>Mặc dù nó có thể dao động nhưng bất kỳ mối quan hệ nào cũng nên có sự cân bằng tốt giữa việc cho và nhận. Khi tất cả những gì bạn đang làm là cống hiến và tất cả những gì họ đang làm là tận dụng, có thể đã đến lúc bạn phải làm điều gì đó.</p><p>Sự cân bằng giữa cho và nhận đặc biệt quan trọng khi sống với một ai đó. Bạn có thấy mình đang làm tất cả những việc lặt vặt và việc vặt khi bạn đi làm về trong khi họ trở về nhà và gác chân lên không? Điều quan trọng là phải có sự cân bằng để tránh cả hai đều bực bội và mệt mỏi.</p><p>Tùy thuộc vào tình huống, bạn có thể chọn nói chuyện với họ, nghỉ ngơi một chút để nạp năng lượng hoặc cắt bỏ hoàn toàn. Bạn không ích kỷ khi ưu tiên nhu cầu của bản thân hơn nhu cầu của người khác nếu hành động cho đi đang khiến bạn bị tổn hại nhiều hơn.</p><p>Trên đây là một số trường hợp để xác định bạn nên nghĩ cho mình một chút mà không đánh giá mình là ích kỷ. Như đã nói, đôi khi ích kỷ là điều cần làm và bạn nên chấp nhận mọi nhu cầu của mình. Nếu mệt mỏi, hãy nghỉ ngơi dù người yêu cầu từ phía còn lại là bất kỳ ai. Hi vọng rằng bài viết giúp ích cho bạn! Chúc bạn một ngày vui vẻ!</p>', '2021-03-16 11:46:37', 'lebuidihoa257@gmail.com', 'Lê Bùi Dĩ Hoà'),
(16, 'XỬ LÝ CÁC CẢM XÚC TIÊU CỰC', 'img/161172302_506101420793319_50094516776462664_n.png', '<p>Mình nghĩ là nhiều người trong chúng ta hơi kém trong việc đối mặt và xử lý các cảm xúc tiêu cực. Mỗi khi chúng ta rơi vào trạng thái đau khổ, buồn bã hoặc cảm thấy khổ sở, ta thường cố gắng vật vã tìm cách nào nhanh nhất có thể để ngắt mình khỏi cảm xúc ấy. Có một số chiến thuật điển hình mà mọi người sử dụng như là:</p><p>1. Đổ lỗi:</p><p>Thực ra thì có nhiều nguyên nhân khác nhau khiến ta đổ lỗi cho người khác vì những đau khổ của bản thân mình. Nhưng theo mình, một trong các nguyên nhân lớn nhất là để đánh lạc hướng cảm xúc của bản thân. Khi ta đổ lỗi cho ai đó, thậm chí chê trách hay chửi mắng ai đó, cảm xúc “tức giận” của chúng ta sẽ bắt đầu thức dậy. Nếu như coi mọi trạng thái cảm xúc đều có hình hài năng lượng riêng, thì mình thấy là cảm xúc “tức giận” nó có năng lượng mạnh và khoẻ hơn so với cảm xúc “đau khổ”. Và khi cảm xúc “tức giận” xuất hiện, nó sẽ xua bớt, đè nén hoặc át đi cảm xúc “buồn thương” trước đó. Khi cảm xúc tức giận xuất hiện, tâm trí sẽ tự động kích hoạt cơ chế “chiến binh”, nghĩ ra hàng trăm lí lẽ bảo vệ bản thân và tấn công người khác (kẻ địch). Lúc ấy mình cảm thấy có quyền lực hơn mà không cảm thấy yếu đuối, dễ bị hạ gục, dễ bị người khác thao túng điều khiển như khi mình đang bị cảm xúc “buồn thương” chi phối.</p><p>Ví dụ thế này. Mấy tháng trước, em chó cưng của gia đình mình chết vì ăn phải bả. Gia đình mình đau lòng và thương em nó kinh khủng. Nhưng thi thoảng nói chuyện về nó, mình và người nhà lại trách kiểu “chó ngu”, “ngu si, ăn lung tung nên mới bị thế”. Tự lí trí biết điều đó là không đúng, nhưng mình để ý khi mình trách móc như vậy, trong lòng bắt đầu cảm thấy hơi giận và cảm xúc thương cũng bớt đi trong khoảnh khắc. Mình đã không hề muốn đón nhận cảm xúc “thương” ấy chút nào. Bởi lúc “thương” thì sẽ muốn làm gì đó để “bù đắp”, “giúp đỡ”, “hỗ trợ” đối tượng (cơ chế tự nhiên của con người) nhưng hoàn cảnh thực tế thì mình lại không thể làm gì được nữa. Nên càng thương lại càng thấy bế tắc, khó chịu. Cuối cùng chọn cách “đổ lỗi” cho em chó để có thể giận em và bớt thương đi.</p><p>2. Né tránh:</p><p>Cơ chế né tránh này thì rất phổ biến này. Ta sẽ có xu hướng không thích nói về vấn đề của mình với ai, ai hỏi động đến thì mình lảng đi vì không muốn nghĩ tới. Thậm chí ai hỏi nhiều quá thì ta còn nhảy dựng lên và tấn công đối phương. Ta sẽ né như thế cho đến khi tâm trí ta “quên dần” về chuyện đó. Còn nếu thời gian quên lâu quá thì cơ chế né tránh của ta hoạt động ngày càng mạnh: Ta không chỉ né tránh nói về vấn đề của mình mà còn né những người có vấn đề tương tự, né các loại phim ảnh sách báo truyền thông hay bất cứ cái gì, sự kiện gì, mối quan hệ nào gợi nhắc ta nhớ đến cảm xúc đó. Nhiều khi mình còn né yêu đương, né hẹn hò, né gặp gỡ người khác là vì vậy. Không phải là mình ghét người đó đâu, mà mình ghét đối diện với vấn đề bên trong mình.</p><p>Cách né tránh cảm xúc kiểu này thì giúp bạn tạm thời không phải chịu đựng cảm xúc ấy ngay bây giờ nhưng tự bạn thừa biết là nó vẫn lù lù ở đấy. Rồi đến khi nó phình to quá mức rồi và vô tình bị chạm vào, nó sẽ nổ tung toé tanh bành. Be bét luôn.</p><p>3. Đánh lạc hướng:</p><p>Cơ chế này cũng là một kiểu cơ chế phổ biến mà mọi người hay sử dụng. Ví dụ như buồn quá, đau lòng quá, không biết phải làm sao nên uống ly rượu, làm tí thuốc lắc, lướt Face, đọc lá cải, làm việc cho đỡ buồn thôi, ra ngoài mua sắm ăn cho nứt bụng nào. Ai buồn tình, đau lòng vì anh A thì chọn cách yêu ngay một anh B. Nghe thì có vẻ hiệu quả nhưng cũng chỉ là đánh lạc hướng cảm xúc. Yêu anh mới để quên anh cũ không bao giờ là một cách khôn ngoan. Vì thế này: Bạn có thể quên anh cũ nhờ vào anh mới nhưng cảm xúc buồn, chỗ tổn thương bên trong bạn do anh cũ tạo ra thì nó vẫn ở nguyên đấy. Nên bạn sẽ bê con Tim vỡ vụn đấy của mình lết từ cuộc tình này sang cuộc tình khác. Rốt cuộc thì yêu ai cũng không ra hồn.</p><p>Có một điều không biết mọi người có nhận ra không, nhưng các cảm xúc của chúng ta hoạt động cực kì độc lập: Tức giận, buồn, thương, đau khổ, hạnh phúc, phấn khích. Hãy tưởng tượng tâm hồn mình giống như một cái nhà ấy, và lần lượt có những anh bạn cảm xúc tới thăm. Hôm nay bạn mới bị người yêu phản bội, thế là cô nàng “đau đớn” đến ghé thăm nhà bạn xong ở lì đấy. Cổ làm cho cả cái nhà bạn u ám theo. Bạn không muốn nói chuyện hay đối diện với cổ vì bạn sợ tổn thương, nên bạn quyết định làm tí rượu để gọi anh “phấn khích” tới chơi. Nhưng vấn đề là cô “đau đớn” chưa được nói chuyện với bạn để giải toả nên cổ ở lì đấy không đi cơ, ờ. Bạn cố gắng tập trung chơi với anh “phấn khích” nên bạn không nhận ra là cô “đau đớn” đang ở đó, chui dưới gầm bàn và làm nhà bạn tối thui. Bạn cũng không nhận ra rằng, dù bạn có mời ai đến: phấn khích, hạnh phúc hay sung sướng thì họ đều không ở lại được lâu vì nhà bạn càng lúc càng tăm tối. Đến lúc nó tối đến nỗi ko có bất kỳ anh bạn Niềm vui nào mò tới được, bạn mới tá hoả gọi cô bạn “đau đớn” ra nói chuyện thì muộn mất rồi. “Ting”, cánh cửa nhà bạn bật mở và trước mặt bạn là anh “Trầm cảm”. Anh này đã đến mà muốn mời anh đi cho thì còn khó khăn hơn gấp bội !</p>', '2021-03-16 19:20:37', 'lebuidihoa257@gmail.com', 'Lê Bùi Dĩ Hoà '),
(17, 'Tình cảm', 'img/205338753_330035178676698_5836509305794724829_n.png', '<p>Tình cảm phải trải qua nhiều nấc để chạm tới hạnh phúc mĩ mãn.</p><p>Nấc đầu tiên chính là:</p><p>\"Tớ hic cậu\".</p><p>Tờ Yên</p>', '2021-07-01 06:32:01', 'lebuidihoa257@gmail.com', 'Lê Bùi Dĩ Hoà'),
(18, 'Lãng quên', 'img/193203613_4004593099593933_7768850903341797445_n.jpg', '<p>\"...Người bạn tôi nói: hình như loại cây nào không có hoa thì cũng không có trái. Cây tre chỉ có lá mà thôi. Tôi nghĩ thầm mụt măng cũng có thể xem như một loại trái hài nhi của thân tre vậy. Tiếc rằng những thứ trái hài nhi ấy chưa kịp manh nha thành thân, thành lá lại thường oan mệnh trước cuộc hoá thân.</p><p>Những âm thanh rời lẻ có khi hoá thân thành những dòng nhạc đẹp, nhưng lắm khi cũng yểu mệnh vô thường.</p><p>Những quán hàng cũng có một kiếp sống vô thường. Nơi đây ngày xưa có quán. Hôm nay có thể không còn. Bóng dáng của quán ấy ở lại trong trí nhớ của con người. Con người mất đi, trí nhớ về quán ấy cũng mất đi.</p><p>Sự vắng bóng đó có khi vô nghĩa, trong cái bề bộn của cuộc sống, nhưng ngẫu nhiên, ai biết được bỗng rơi tỏm vào đời riêng của một người. Câu chuyện về một cái quán khả ái nào đó tình cờ được nhắc nhở. Và phút chốc cái quán cũng bàn ghế, cảnh trí, người ngợm của cái ngày nào xa xôi ấy bỗng thức dậy trong trí nhớ một người xa lạ. Cái quán kia phục sinh trong một đời sống khác.</p><p>Cũng như thế, có những câu hát một thời đã sống, đã lãng quên và sống lại.</p><p>Một tác phẩm không bị lãng quên thường được mở rộng đường để đi đến chốn không bờ bến của những giá trị dường như huyễn hoặc.</p><p>Con người bị lãng quên là kẻ đã tự đánh mất mình để rồi xoá nốt mình trong trí nhớ kẻ khác. Cũng như thế, có những dòng nhạc của một đời người đã đứng ngoài và cao hơn số phận của người đó\".</p><p>Trịnh Công Sơn</p>', '2021-06-12 20:29:37', 'lebuidihoa257@gmail.com', 'Lê Bùi Dĩ Hoà '),
(19, 'Buồn ngủ', 'img/a53e582e686a920d9f668fdfc1d53d78.png', '<p><strong>Buồn ngủ&nbsp;</strong>là là một trạng thái khao khát mãnh liệt được ngủ, hoặc ngủ trong thời gian dài bất thường. Buồn ngủ mang ý nghĩa và nguyên nhân riêng biệt. Có thể là sự ám chỉ đến trạng thái bình thường trước khi ngủ, trạng thái buồn ngủ do rối loạn<a href=\"https://vi.wikipedia.org/wiki/Nh%E1%BB%8Bp_%C4%91i%E1%BB%87u_sinh_h%E1%BB%8Dc_h%C3%A0ng_ng%C3%A0y\">nhịp sinh học</a> các điều kiện khi ở trong một trạng thái buồn ngủ do <a href=\"https://vi.wikipedia.org/wiki/Nh%E1%BB%8Bp_%C4%91i%E1%BB%87u_sinh_h%E1%BB%8Dc_h%C3%A0ng_ng%C3%A0y\">nhịp sinh học</a> loạn, hoặc một triệu chứng của các vấn đề sức khỏe khác.&nbsp;có thể được đi kèm với thờ ơ, suy nhược và thiếu sự nhanh nhẹn tinh thần.</p><p>Buồn ngủ thường được xem như một triệu chứng chứ không phải là một rối loạn. Tuy nhiên, khái niệm về buồn ngủ định kỳ vào những thời điểm nhất định vì một số lý do nhất định được cấu thành các rối loạn khác nhau, chẳng hạn như quá buồn ngủ vào ban ngày, rối loạn giấc ngủ do giờ giấc làm việc thay đổi. Có những mã y tế coi sự buồn ngủ là một rối loạn.</p><p>Buồn ngủ có thể nguy hiểm khi thực hiện các nhiệm vụ đòi hỏi sự tập trung liên tục, chẳng hạn như <a href=\"https://vi.wikipedia.org/wiki/Xe\">lái xe</a>.Khi một người mệt mỏi, có thể gặp phải cơn buồn ngủ. Trong những người bị mất ngủ, thì buồn ngủ có thể tự tiêu tan trong một thời gian ngắn; hiện tượng này được gọi là <i>cơn gió thứ hai</i>, và kết quả của chu kỳ bình thường của nhịp sinh học can thiệp vào các quá trình cơ thể thực hiện để chuẩn bị cho bản thân nghỉ ngơi…</p>', '2021-07-03 22:15:25', 'ibesttrollvn1@gmail.com', 'love my'),
(20, 'Chọn người mình yêu hay người yêu mình? ', 'img/blog1.jpg', '<p>Mình biết bạn đang phân vân với câu trả lời của chính mình, thật khó để lựa chọn đúng không?&nbsp;</p><p>Thật ra tuổi trẻ ai cũng sẽ có ít nhất 1 mối tình làm mình “ lên bờ xuống ruộng ” nhưng bạn vẫn sẽ cứ yêu, nó như một chất kích thích vậy. Sự mới mẻ, cảm giác tò mò thú vị pha thêm một chút khoái lạc sẽ chẳng ai muốn dứt ra cả, cảm giác đó rất tuyệt vời mình biết. Tất nhiên chẳng có cuộc tình nào toàn trái ngọt cả, dần dà cả 2 sẽ khó hiểu nhau hơn, con người thật sự sẽ lộ diện cộng với cái tuổi đôi mươi mang trên vai nhiều gánh nặng, những cuộc cãi vã và lời qua tiếng lại chưa từng có khi trước giờ lại cứ buông lời cho nhau. Rồi ta lại cứ làm nhau đau, một vòng tròn lẩn quẩn cứ xoay thật nhanh cho đến một ngày vô tình dừng lại thấy trên người đầy những vết thương. Hỏi khi ấy thấy đau không? Không, sẽ chỉ còn thẩn thờ và đó cũng là lúc ta tỉnh giấc với một câu hỏi rất lớn trong đầu “ Họ có thực sự yêu mình không? \"&nbsp;</p><p>Đến lúc này bạn nên tự ngồi lại một mình, xâu chuỗi lại tất cả mọi thứ họ dành cho mình và quan trọng nhất là hãy đánh giá nó bằng lí trí nhé! Rồi bạn sẽ có câu trả lời.&nbsp;</p><p>Mình không khuyên bạn nên chọn ai, những hãy yêu lấy bản thân mình, nhất định phải yêu lấy nó, đừng để bất kì ai làm tổn thương mình bạn nhé, chúng ta dù có luân hồi chuyển kiếp bao nhiêu lần để đến với thế giới này thì cũng chỉ vì mục tiêu cuối cùng là hạnh phúc thôi.</p>', '2021-07-03 00:20:32', 'myhtddiii2@gmail.com', 'Huỳnh Trương Diễm My'),
(22, 'Tiêu cực của mình', 'img/inbound7429504503618288278.jpg', '<p>Thật ra đôi khi mình cũng rơi vào trạng thái cực kỳ tiêu cực nhưng có vẻ kiểu người như mình thì trạng thái đó kéo dài không lâu lắm. Lần gần đây nhất chỉ kéo dài đúng nửa ngày. Tuy nhiên, có thể là mình có khả năng nhanh chóng thoát khỏi tình trạng đó nhưng chỉ được một phần nào thôi. Phần còn lại nó cứ đeo bám âm ỉ bên cạnh mình cả một &nbsp;quãng thời gian dài mà mình cũng chẳng nhớ được.&nbsp;</p><p>Và mình vẫn chưa tìm được cách giải quyết những vấn đề lộn xộn đó.</p>', '2021-07-03 19:41:20', 'nhuhuynhpham2001@gmail.com', 'Huỳnh Như'),
(23, 'Speak yourself ', 'img/inbound6122973406022071040.jpg', '<p>“No matter who you are, where you from, your skin color, gender identity, just speak yourself ”</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; -<i> Kim NamJoon</i>-</p>', '2021-07-03 19:45:29', 'nhuhuynhpham2001@gmail.com', 'Huỳnh Như'),
(25, 'Thôi xong', 'img/sticker-facebook-hot-nhat-2020-300x300.jpg', '<p>&nbsp;</p><p>Một anh chàng đi&nbsp;làm&nbsp;ca chiều về, cảm thấy ” thèm ” vợ.</p><p>Anh lẻn vào phòng ngủ, thấy vợ&nbsp;đang&nbsp;ngủ trên giường.</p><p>Vứt vội quần áo, anh ta chui từ cuối giường xuống dưới chăn…(&nbsp;háo hức&nbsp;! …)</p><p>Xong việc anh bỗng thấy thèm thuốc lá và một cốc bia nên dậy đi xuống bếp.</p><p>Ở dưới bếp anh gặp… vợ&nbsp;đã&nbsp;ngồi chờ mình !</p><p>– Ơ. Giờ này em&nbsp;vẫn&nbsp;sử dụng&nbsp;gì ở đây ?&nbsp;vì sao&nbsp;em&nbsp;luôn luôn&nbsp;chưa ngủ ? Ai ở trong phòng ngủ vậy ?</p><p>– À quên, bà ngoại đến chơi&nbsp;vừa mới&nbsp;ngủ trong đấy, tự nhiên bà cảm thấy&nbsp;k&nbsp;được khỏe !</p><p>– C…á…a…i….g…g…gì…i…..</p>', '2021-07-03 20:19:31', 'tai05122001@gmail.com', 'Tài đẹp trai');

-- --------------------------------------------------------

--
-- Table structure for table `post_like`
--

CREATE TABLE `post_like` (
  `email` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `post_like`
--

INSERT INTO `post_like` (`email`, `post_id`) VALUES
('asdf', 2),
('lebuidihoa257@gmail.com', 2),
('myhtddiii2@gmail.com', 2),
('asdf', 3),
('lebuidihoa257@gmail.com', 3),
('tai05122001@gmail.com', 3),
('lebuidihoa257@gmail.com', 5),
('myhtddiii2@gmail.com', 5),
('nhuhuynhpham2001@gmail.com', 5),
('hoale@gmail.com', 6),
('lebuidihoa257@gmail.com', 6),
('lebuidihoa257@gmail.com', 7),
('nhuhuynhpham2001@gmail.com', 7),
('asdf', 12),
('hoale@gmail.com', 12),
('lebuidihoa257@gmail.com', 13),
('ibesttrollvn1@gmail.com', 20),
('nhuhuynhpham2001@gmail.com', 20),
('tai05122001@gmail.com', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cmt_like`
--
ALTER TABLE `cmt_like`
  ADD PRIMARY KEY (`email`,`cmt_id`),
  ADD KEY `cmt_id` (`cmt_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cmt_id`),
  ADD KEY `fk_post_id` (`post_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`noti_id`),
  ADD KEY `email` (`email`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `author_email` (`author_email`);

--
-- Indexes for table `post_like`
--
ALTER TABLE `post_like`
  ADD PRIMARY KEY (`email`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `noti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_post_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`email`) REFERENCES `member` (`email`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author_email`) REFERENCES `member` (`email`);

--
-- Constraints for table `post_like`
--
ALTER TABLE `post_like`
  ADD CONSTRAINT `post_like_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
