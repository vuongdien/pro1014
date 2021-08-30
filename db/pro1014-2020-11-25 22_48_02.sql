-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pro1014
CREATE DATABASE IF NOT EXISTS `pro1014` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `pro1014`;

-- Dumping structure for table pro1014.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL COMMENT 'ID người viết',
  `title` char(255) NOT NULL DEFAULT '' COMMENT 'Tiêu đề',
  `created` datetime NOT NULL COMMENT 'Ngày giờ đăng bài viết',
  `update` datetime DEFAULT NULL COMMENT 'Ngày giờ cập nhật bài viết',
  `thumb` char(255) DEFAULT NULL COMMENT 'Hình mô tả',
  `description` varchar(500) DEFAULT NULL COMMENT 'Mô tả',
  `content` text COMMENT 'Bài viết',
  `view` int(11) unsigned DEFAULT NULL COMMENT 'Lượt xem',
  `show` bit(1) DEFAULT NULL COMMENT '(0) Ẩn, (1) Hiện',
  `priority` int(10) unsigned DEFAULT NULL COMMENT 'Thứ tự sắp xếp',
  PRIMARY KEY (`id`),
  KEY `FK_blog_user` (`user_id`),
  CONSTRAINT `FK_blog_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.blog: ~6 rows (approximately)
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
REPLACE INTO `blog` (`id`, `user_id`, `title`, `created`, `update`, `thumb`, `description`, `content`, `view`, `show`, `priority`) VALUES
	(1, 1, 'Thương hiệu thời trang Fila có gì đặc biệt?', '2020-11-01 08:52:06', NULL, 'assets/img/blog/1/fila-la-gi.jpg', 'Fila là gì? Giày Fila của nước nào? Thương hiệu đình đám được các sao Việt và Quốc tế liên tục lăng xê trong khoảng thời gian qua. Hãy cùng SaigonSneaker.com mổ xẻ để tìm ra nguyên nhân qua bài viết nhé.', '1. Ý nghĩa thương hiệu thời trang Fila<br><br>Với những tính đồ thời trang và đặc biệt là những ai ưa thích street style, chắc hẳn chúng ta không còn lạ lẫm với thương hiệu mang tên Fila. Những đôi giày với logo Fila đã – đang và sẽ còn được diện trên đường phố như một biểu tượng của sự năng động và thời thượng. Vậy hãy cùng tìm hiểu và lý giải sức hút của thương hiệu này đối với giới trẻ nhé.<br><br>Fila, Inc. là một công ty chuyên sản đồ thể thao của Hàn Quốc, được thành lập tại Ý.<br><br>Được thành lập vào năm 1911 tại Ý sau đó được tiếp quản bởi Fila Hàn Quốc vào năm 2007, Fila nay đã đã được sở hữu và quản lý tại công ty mẹ ở Hàn Quốc. Chủ tịch cũng như CEO của công ty là Yoon-Soo Yoon, hiện nay Fila đã có văn phòng đại diện tại 11 quốc gia trên thế giới<br>Nghĩa của từ Fila là gì<br><br>Fila là một từ trong tiếng Ý, nó có nghĩa là Sắp xếp; Kế tiếp.<br><br>Hàm ý của từ Fila là một sự liên tiếp có kế thừa và sự sáng tạo dựa trên sự kế thừa trước đó.<br>Sự phát triển của thương hiệu Fila<br><br>Trước khi trở thành một thương hiệu của Hàn Quốc thì Fila được bắt nguồn từ đất nước Ý vào năm 1911. Fila là một thương hiệu may mặc thể thao được thành lập bởi hai anh em nhà Fila.<br><br>Khởi điểm là một công ty chuyên sản xuất các sản phẩm may mặc cho khu vực dân cư xung quanh. Trong suốt quá trình phát triển, Fila dần trở thành doanh nghiệp dệt may cao cấp, chuyên cung cấp các sản phẩm thời trang thể thao đẳng cấp thế giới.<br>2. Những thông tin về Fila<br><br>Một thông tin khá thú vị về Fila đó là vào lúc mới thành lập và chưa xây dựng được tiếng tăm trên thị trường thì nhãn hiệu này chủ yếu sản xuất đồ lót.<br><br>Nhưng kể từ khi lấn sân sang mảng trang phục thể thao và được vận động viên quần vợt Björn Borg sử dụng thì Fila đã thu hút được nhiều sự chú ý hơn.<br><br>Tuy nhiên từ năm 2003, Fila phải bán lại thương hiệu cho Cerberus Capital Management – quỹ tự bảo hiểm rủi ro, do làm ăn khó khăn. Do có những chiến lược thích hợp từ&nbsp; Cerberus Capital Management, Fila dần phát triển trên toàn thế giới.<br><br>Ban đầu Fila Korea chỉ là một công ty hoạt động độc lập của thương hiệu cùng tên, tuy nhiên sau khi về chung một nhà vào năm 2007 thì thương hiệu này đã trở nên nổi tiếng, cạnh tranh với các sản phẩm phân khúc thấp như Vans, Converse,..<br>3. Các item của Fila bạn nên sở hữu<br><br>Kể từ giai đoạn năm 2017 đến gần đây, hẳn chúng ta không còn xa lạ với sự hiện diện của các sản phẩm của Fila tại thị trường Việt Nam. Thương hiệu Hàn Quốc này đã cho ra nhiều dòng sản phẩm gây sốt cho giới trẻ yêu thời trang. Hãy cùng điểm qua những cái tên đang “hot” của Fila nhé!<br>Giày Fila<br><br>Có một điều không thể phủ nhận được đó là độ hot của những đôi Sneaker của thương hiệu Fila. Được thiết kế theo phong cách hầm hố nhưng vẫn tùy biến để phù hợp với dáng người Châu Á, đôi sneaker Fila “chất lừ” đã lên ngôi khiến cho bất kì ai cũng muốn sở hữu.<br>fila là gì<br><br>Thiết kế đẹp mắt của Fila Disruptor 2<br><br>Với phối màu full trắng, đôi sneaker Fila vừa thời thượng lại cực kỳ dễ phối đồ. Bạn có thể kết hợp nó với nhiều kiểu trang phục và biến hóa để có một outfit chất lượng nhất.<br>fila shoes<br><br>Một thiết kế khác cũng bắt mắt không kém của Fila, đó là sneaker full đen.<br>Dép Fila<br><br>Không chỉ được ưa thích ở những đôi giày hầm hố mà dép Fila cũng là một sản phẩm “Hot” không kém. Dép Fila được giới trẻ yêu chuộng bởi sự đơn giản, tính tiện dụng nhưng vẫn thời trang, dễ dàng phối đồ.<br>thời trang fila<br><br>Dép Fila trắng – phối màu gây bão của năm 2019<br>thương hiệu fila<br><br>Đen và trắng là hai phối màu cơ bản và được yêu thích nhất của dép Fila<br>Áo thun Fila Big logo<br><br>Bên cạnh những đôi Sneaker thì mặt hàng quần áo Fila cũng là một sản phẩm được yêu thích không kém. Những chiếc áo Fila đơn giản chỉ có logo và được tập trung vào chất liệu đã làm nên sự đặc biệt cho sản phẩm này.<br>fila t shirt<br><br>Thiết kế đơn giản nhưng đẹp mắt của T-Shirt Fila<br><br>Nếu muốn sắm cho mình một set đồ đơn giản nhưng sành điệu thì áo phông Fila là một sự lựa chọn hoàn hảo cho bạn. Với thiết kế tối giản dễ dàng cho bạn phối đồ và chất liệu tốt mang lại cảm giác thoải mái cho người mặc, áo thun Fila sẽ làm hài lòng bạn ngay đấy.<br>quần áo fila<br><br>Nếu muốn nổi bật hơn, bạn có thể chọn chiếc áo thun Fila với phối màu lạ mắt này.<br>Quần Fila<br><br>Là hãng thời trang thể thao nên các mẫu quần Fila cũng thiên về sự đơn giản, mang lại sự thoải mái, năng động và trẻ trung cho người mặc. Quần Fila được may bằng chất liệu tốt, giá thành phù hợp và có nhiều mẫu mã như Jogger, quần ống rộng, Legging,…<br>fila vietnam<br><br>Sơn Tùng MTP – một Fan của thương hiệu Fila<br>fila track pants<br><br>Chiếc track pants với thiết kế phá cách và phối màu năng động<br>fila leggings<br><br>Quần legging Fila cũng là một lựa chọn không tồi dành cho những cô nàng năng động<br><br>Qua bài viết trên bạn đã hiểu rõ thương hiệu Fila là gì. Là một trong những thương hiệu thời trang được giới trẻ yêu thích bởi sự đơn giản, cá tính nhưng cũng rất thời trang, Fila đang từng ngày khẳng định độ “hot” của nó trên thị trường thời trang. Bạn hãy chọn cho mình một sản phẩm ưa thích nhất của thương hiệu này nhé.<br>', 295, b'1', NULL),
	(2, 1, 'Ý nghĩa và sự khác nhau của các biểu tượng của thương hiệu Adidas', '2020-11-18 18:31:50', NULL, 'assets/img/blog/2/adidas-logo.jpg.jpg', 'Trong thị trường giày thể thao hiện nay, không thể nào không nhắc đến thương hiệu Adidas. Qua thời gian, Adidas càng ngày càng phát triển, song song với đó logo biểu tượng cho thương hiệu cũng thay đổi theo.', '<p><br></p><p><em>Trong thị trường giày thể thao hiện nay, không thể nào không nhắc\r\n đến thương hiệu Adidas. Qua thời gian, Adidas càng ngày càng phát \r\ntriển, song song với đó logo biểu tượng cho thương hiệu cũng thay đổi \r\ntheo. Tùy vào từng thời gian giai đoạn quảng bá hay dòng sản phẩm sẽ \r\nđược in những adidas logo khác nhau. Chính vì thế, hôm nay chúng tôi sẽ \r\nbật mí cho các bạn về ý nghĩa và sự khác nhau của 3 <strong>logo Adidas</strong> đẹp nhưng quen thuộc qua từng mốc thời gian.</em></p><h2><strong>1. Logo đại diện cho cả tập đoàn</strong></h2><p>Khi sáng tạo ra thương hiệu Adidas, các nhà điều hành của tập đoàn luôn băn khoăn không biết nên lấy logo nào là <strong>biểu tượng adidas</strong> chính cho cả thương hiệu.</p><p>Đến tận năm 2005, các nhân viên trong tập đoàn đã quyết định lấy biểu\r\n tượng đơn giản nhất, dễ nhớ nhất là ba sọc ngang nằm cạnh chữ adidas để\r\n làm logo chính thức.</p><p><strong>Adidas logo</strong> này đáp ứng được sự tối giản, dễ nhớ và \r\ncả tính linh hoạt. Bởi dựa theo logo này, khách hàng rất dễ nhớ ra những\r\n logo khác của adidas</p><div class="se-component se-image-container __se__float-center" contenteditable="false"><figure style="margin: auto;"><img src="https://saigonsneaker.com/wp-content/uploads/2020/01/logo-adidas.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-align="center" data-size="," data-percentage="auto,auto" data-index="0" data-file-name="logo-adidas.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Logo đại diện của thương hiệu Adidas</p><p>Ý tưởng 3 sọc của thương hiệu Adidas bắt nguồn từ việc thiết kế đôi \r\ngiày của anh em nhà Dassler. Ban đầu, ba sọc gạch chéo này được may lên \r\ncác bộ phận của đôi giày để giúp chúng có khả năng bám dính và dễ ổn \r\nđịnh hơn khi di chuyển nhanh.</p><p>Nhưng dần về sau, chi tiết này được phát triển trở thành 3 sọc trang trí và là biểu tượng đặc trưng cho toàn tập đoàn Adidas.</p><h2><strong>2. Ý nghĩa logo adidas tam giác 3 sọc</strong></h2><p>Logo tam giác 3 sọc là loại <strong>logo adidas</strong> dễ thấy \r\nnhất, ra đời năm 1991, nó được gọi là adidas Performance (nhằm chỉ đến \r\nsự vận động của thể thao). Chính vì thế logo này hay xuất hiện trên \r\nnhững sản phẩm giày thể thao, các sản phẩm liên quan đến thể thao như \r\nquần áo, túi, balo,…. Ngoài ra, thương hiệu cũng dùng logo này để tài \r\ntrợ cho các câu lạc bộ, bộ môn liên quan đến thể thao như bóng đá, bóng \r\nbầu dục,…</p><div class="se-component se-image-container __se__float-center" contenteditable="false"><figure style="margin: auto;"><img src="https://saigonsneaker.com/wp-content/uploads/2020/01/bieu-tuong-adidas.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-align="center" data-size="," data-percentage="auto,auto" data-index="1" data-file-name="bieu-tuong-adidas.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Biểu tượng adidas thường thấy trên những đôi giày</p><p>Ngoài ra, 3 sọc hình tam giác của <strong>adidas logo</strong> được \r\nthiết kế với góc nghiêng 30 độ. Các nhà sáng tạo còn cho biết, ba sọc \r\nnày tượng trưng cho những ngọn núi, với núi sau luôn cao hơn núi trước \r\nnhằm ám chỉ các thử thách phải vượt qua.</p><div class="se-component se-image-container __se__float-center" contenteditable="false"><figure style="margin: auto;"><img src="https://saigonsneaker.com/wp-content/uploads/2020/01/thuong-hieu-adidas.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-align="center" data-size="," data-percentage="auto,auto" data-index="2" data-file-name="thuong-hieu-adidas.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Quả bóng đá được sử dụng trong World Cup 2018 gần đây nhất do Adidas Performance sản xuất</p><p>Hơn nữa còn có câu slogan rất ý nghĩa đi kèm “Challenge to be faced, \r\nGoals to be achieved” (tạm dịch: “Chinh phục thử thách, đạt được mục \r\ntiêu”).</p><h2><strong>3. Giải thích Logo cỏ 3 lá – adidas Originals là gì</strong></h2><p>Một logo khác của adidas mà chúng ta vẫn thường hay thấy đó chính là <strong>adidas 3 lá</strong>.\r\n Cỏ 3 lá được lấy làm hình ảnh chính và logo này được biết với cái tên \r\n“Trefoil logo” hay “adidas Originals” – ở đây Trefoil còn có nghĩa là 3 \r\nlá – được sáng tạo ra vào năm 1971.</p><p>Tập đoàn đã quyết định sử dụng logo này nhằm mục đích trang trí, tạo \r\nnét thời trang cho sản phẩm hơn là với mục đích thể thao. Hơn nữa, các \r\nthiết kế có logo này cũng được công nhận mang đến cảm giác “old-school”,\r\n retro với nét độc đáo riêng biệt, đặc biệt được các bạn trẻ trong giới \r\nsneaker yêu thích.</p><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2020/01/adidas-3-la.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="3" data-file-name="adidas-3-la.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Logo adidas 3 lá</p><p>Do đó ở các sản phẩm như Adidas Stan Smith hay Adidas Super Star và \r\nmột số dòng OG khác bạn sẽ thấy logo này. Logo này là đại diện cho \r\nAdidas Original – hướng đi khác so với mảng Adidas Performance.</p><div class="se-component se-image-container __se__float-center" contenteditable="false"><figure style="margin: auto;"><img src="https://saigonsneaker.com/wp-content/uploads/2020/01/logo-adidas-dep.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-align="center" data-size="," data-percentage="auto,auto" data-index="4" data-file-name="logo-adidas-dep.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Adidas SuperStar – dòng sản phẩm thuộc Adidas Original với logo 3 lá</p><h2><strong>4. Logo hình tròn – adidas Neo logo</strong></h2><p>Adidas logo hình tròn là mẫu logo ít được người tiêu dùng biết tới \r\nnhất. Vẫn giữ nguyên ba sọc đặc trưng nhưng chúng được biến tấu nằm \r\ntrong một hình tròn. Logo ra đời nhằm đại diện cho các sản phẩm mang đặc\r\n tính adidas Style, và đây cũng là một trong những phân khúc được adidas\r\n đầu tư trên thị trường giày thể thao.</p><div class="se-component se-image-container __se__float-center" contenteditable="false"><figure style="margin: auto;"><img src="https://saigonsneaker.com/wp-content/uploads/2020/01/hinh-anh-adidas.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-align="center" data-size="," data-percentage="auto,auto" data-index="5" data-file-name="hinh-anh-adidas.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Logo adidas Neo có hình tròn</p><p>Trong phân khúc này, adidas đã cho ra đời các dòng sản phẩm phù hợp với từng người tiêu dùng.</p><p>Ví dụ như Adidas NEO sẽ là dòng sản phẩm với những mặt hàng có giá cả\r\n phải chăng, có đôi khi còn thấp hơn giá mặt bằng chung để thu hút người\r\n tiêu dùng, đặc biệt là giới trẻ.</p><p>Hay như dòng sản phẩm Y-3 (Collaboration giữa Adidas và Yohji \r\nYamamoto) là một nhánh mang đậm tính thời trang, thời thượng với mức giá\r\n cao cấp hơn.</p><p>Trên đây là 3 dòng logo nổi bật và <strong>ý nghĩa logo adidas</strong> của nó. Mong rằng qua bài viết này, bạn đã có thêm nhiều thông tin bổ ích hơn về thương hiệu nổi tiếng adidas.</p>', 0, b'1', NULL),
	(3, 1, 'Nike Air Mag – Đôi giày đắt nhất Thế Giới', '2020-11-18 18:54:57', NULL, 'assets/img/blog/3/nike-mag-doi-giay-dat-nhat-the-gioi.jpg', 'Nike là một trong thương hiệu về giày thể thao nổi tiếng trên thế giới. Sản phẩm của tập đoàn Nike không chỉ đáp ứng về chất lượng mà còn về vẻ ngoài thời trang, phong cách. Ngoài ra, Nike cũng là thương hiệu đầu tiên tung ra đôi sneaker có có khả năng tự thắt dây với giá không tưởng.', '<p><br></p><p>Nike là một trong thương hiệu về giày thể thao nổi tiếng trên \r\nthế giới. Sản phẩm của tập đoàn Nike không chỉ đáp ứng về chất lượng mà \r\ncòn về vẻ ngoài thời trang, phong cách. Ngoài ra, Nike cũng là thương \r\nhiệu đầu tiên tung ra đôi sneaker có có khả năng tự thắt dây với giá \r\nkhông tưởng. Hàng chục câu hỏi đặt ra, tại sao nó lại có giá như vậy? \r\nHãy cùng SaigonSneaker.com tìm câu trả lời cho đôi <strong>Nike air mag</strong> – đôi <strong>giày đắt nhất thế giới</strong> nhé!<br><br></p><h2><strong>1. Đôi giày đầu tiên trên thế giới tự thắt dây</strong></h2><p>Nếu bạn biết đến series phim đình đám Back To The Future thì bạn chắc chắn sẽ nhận ra cảm hứng cho đôi <strong>nike air mag</strong>. Vào năm 1989, khi phần 2 của loạt phim điện ảnh Back To The Future trình làng thì đã tạo nên một cơn sốt.</p><p>Song song với nội dung phim về việc du hành đến tương lai, bộ phim đã\r\n phần nào quảng cáo cho thương hiệu Nike với đôi giày có khả năng tự \r\nthắt dây và phát sáng trong phim. Mặc dù chi tiết đó hoàn toàn do kỹ xảo\r\n nhưng rất nhiều fans hâm mộ thời bấy giờ luôn tự hỏi: “Liệu Nike sẽ tạo\r\n được sản phẩm như vậy trong tương lai chứ?”</p><div class="se-component se-image-container __se__float-center" contenteditable="false"><figure style="margin: auto;"><img src="https://saigonsneaker.com/wp-content/uploads/2020/01/nike-mag-doi-giay-dat-nhat-the-gioi.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-align="center" data-size="," data-percentage="auto,auto" data-index="1" data-file-name="nike-mag-doi-giay-dat-nhat-the-gioi.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Nike Air Mag 2016 – Đôi giày đắt giá của thế giới</p><p>Vì là đôi giày sneaker có tích hợp công nghệ thông minh nên một sản phẩm như <strong>Nike air mag</strong> được rất nhiều các Sneakerhead mong chờ. Nhưng phải thú nhận rằng đôi giày khá “xấu”.</p><h2><strong>2. Nike air mag giá cao đỉnh điểm và cơn sốt khi lần đầu ra mắt</strong></h2><p>Sau 20 năm từ sau bộ phim đình đám Back To The Future 2, Nike tạo nên\r\n cơn sốt khi bất ngờ tung ra đôi giày có tên Hyperdunk 2008. Đôi giày \r\nnày được Nike phối màu đặc biệt thời thượng và chỉ bán với số lượng giới\r\n hạn tại Los Angeles. Và đôi Hyperdunk này tiếp tục làm mưa làm gió cho \r\nđến năm 2011.</p><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2020/01/giay-nike-mag.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="2" data-file-name="giay-nike-mag.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Đôi giày bóng rổ Nike Hyperdunk được release năm 2008</p><p>Đến năm 2011, Nike tung ra một phiên bản với thiết kế rất giống Air \r\nMag nhưng với cái tên “Back to The Future”, điều này lại làm người hâm \r\nmộ một lần nữa sục sôi.</p><p>Nike chỉ bán ra 1510 đôi trên eBay, điều đó làm rất nhiều người mong \r\nmuốn sở hữu và unbox (khui hộp giày) một trong những đôi sneaker này. \r\nNhưng dù gây chú ý với cái thiết kế giống trong phim nhưng Back to The \r\nFuture phiên bản năm 2011 vẫn chưa có chế độ tự động cột dây như mong \r\nchờ.</p><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2020/01/giay-nike-air-mag.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="3" data-file-name="giay-nike-air-mag.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Nike Air Mag “Back to The Future” lần đầu tiên ra mắt</p><p>Và điều tất cả mọi người mong chờ cũng tới, sau 5 hoàn thiện, <strong>Nike air mag</strong> phiên bản được release năm 2016 đã đem đến cho cả thế giới sự bất ngờ.</p><p>Chỉ với một nút bấm ở cổ giày, bạn chỉ cần nhấn và giữ vài giây để hệ\r\n thống power laces sẽ được kích hoạt, khi đó giày sẽ tự động ôm gọn vào \r\nbàn chân của người dùng. Đây là một bước tiến lớn giúp <strong>Nike air mag</strong> trở thành đôi sneaker huyền thoại và trở thành một trong những đôi giày đắt nhất thế giới.</p><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2020/01/giay-air-mag.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="4" data-file-name="giay-air-mag.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Nike Air Mag với mức giá resell cao ngất ngưởng</p><p>Khi đôi giày <strong>nike air mag</strong> “Back to the Future” bản \r\n2011 lần đầu tiên được tung ra, theo báo cáo thống kê của Nike, hãng đã \r\nthu về được 5,7 triệu USD cho một buổi đấu giá. Được biết mức giá retail\r\n của đôi giày là 2.500 USD và giá cao mức giá resell kỷ lục lên đến \r\n10.000 USD, đôi giày nghiễm nhiên đứng đầu danh sách những <strong>đôi giày đắt nhất thế giới</strong>.</p><p>Nhưng đây vẫn chưa là con số cao nhất, vào thời điểm <strong>Nike air mag 2016</strong>\r\n được tung ra, giá của đôi giày đã được đẩy lên tới 35.000 USD, hay thậm\r\n chí là 75.000 USD. Shock hơn nữa, vào lúc size 39 của đôi giày khan \r\nhiếm thì nó đã được định giá 139.000 USD ở eBay.</p><h2><strong>3. 15 điều có thể bạn chưa biết của Nike Mag</strong></h2><h3><strong>Air Mag là đôi sneaker đầu tiên Nike thiết kế dành riêng cho một bộ film</strong></h3><p>Mag – đôi giày đầu tiên mà Nike đặc biệt thiết kế dành cho bộ phim \r\nBack to the future 2: Vinh dự trở thành đôi giày đầu tiên mà Nike độc \r\nquyền thiết kế cho bộ phim mà không hề dựa vào bất kỳ mẫu nào khác, sản \r\nphẩm được hoàn thiện dựa trên những mẫu thiết kế sơ khai nhất, có thể là\r\n bản nháp.</p><p>Việc sản xuất một sản phẩm hoàn toàn mới để cống hiến cho phim ảnh \r\ncủa Nike được công chúng đánh giá cao, nhờ thành công đó Nike đã khẳng \r\nđịnh mình với vị trí số 1 trên toàn thế giới.</p><h3><strong>Tên gọi “Mag” là viết tắt của “Magnetic” (từ tính)</strong></h3><p>Chữ “Mag” trong tên gọi đến từ “Magnetic”: Từ Mag (từ tính, nam châm)\r\n đã được Tinker Hatfiled sử dụng đúng theo nghĩa đen. Thật vậy, đây là \r\nđôi giày nổi trội với công nghệ từ trường cùng những tính năng vốn có \r\ncủa một Nike Mag hệt như trong phim.</p><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2020/01/nike-air-mag-2016.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="5" data-file-name="nike-air-mag-2016.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Lý do đôi giày dính được vào chiếc ván bay trong phim</p><h3><strong>Nike ảnh hưởng khá nhiều đến việc dựng phim</strong></h3><p>Nike đặc biệt có tiếng nói trong việc dàn dựng phim: Thoạt đầu cứ \r\nnghĩ sẽ rất khó bàn bạc và đàm phán khi có thay đổi gì trong quá trình \r\ndựng phim, tuy nhiên thực tế lại hoàn toàn trái ngược, và mọi thứ đều \r\ndiễn ra một cách suôn sẻ.</p><p>Nike không chỉ tự cho mình cơ hội để thử sức thiết kế một sản phẩm \r\nmới hoàn toàn, đồng thời được ra mắt sản phẩm ngay trong bộ phim ấy. \r\nTinker và Mark đã có cơ hội bắt tay nhau và tạo dựng nên một bộ phim \r\nthành công rực rỡ kèm theo đó là một siêu phẩm giày bậc nhất thế giới.</p><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2020/01/nike-back-to-the-future.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="6" data-file-name="nike-back-to-the-future.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Kịch bản của bộ phim được Nike duyệt qua</p><h3><strong>Mag trong phim không thần thánh như bạn nghĩ</strong></h3><p>Trong bộ phim, Mag hoàn toàn không có power-lace: Trên phim ảnh, khi \r\nkhán giả đón xem cứ ngỡ là hiện thực, nhưng thực tế tất cả đều dựa trên \r\nsự dàn dựng chuyên nghiệp của đoàn phim.</p><p>Đôi giày được mang trong bộ phim chỉ được trang bị vào đó các hệ \r\nthống đèn thiết yếu, còn những tính năng khác đều phụ thuộc vào kỹ xảo \r\ncủa công nghệ. Bật mí rằng power lace mà bạn nhìn thấy trong phim, tất \r\ncả đều nhờ sự trợ giúp của dàn back-up dưới lòng đất để mang lại cảm \r\ngiác tự buộc dây giày trở nên chân thật hơn.</p><h3><strong>Có đến 2-3 size giày Nike Mag trong phim</strong></h3><p>Có nhiều size khác nhau cho Nike Air Mag: trong bộ phim, Mag được đầu\r\n tư kỹ lưỡng với từng size giày. Ví dụ đơn giản rằng chân Michael J.Fox \r\nkhá nhỏ, trong khi đó diễn viên đóng thế cho ảnh có đôi chân to hơn rất \r\nnhiều.</p><h3><strong>Power lace – cái tên mà Tinker tự nghĩ ra</strong></h3><p>Tính năng “power lace”: Credit cho câu nói này trong kịch bản phim được trao cho cha đẻ của Nike Mag – Tinker Hatfield.</p><h3><strong>Thiết kế liền mạch và dấu Swoosh là thiết kế cho tương lai.</strong></h3><p>Đôi Mag với cấu trúc liền mạch, không đường may là xuất phát từ ý \r\ntưởng của Tinker cho đôi giày trong tương lai: Với sự phát triển công \r\nnghệ hiện đại ngày nay, mọi thứ đều trở nên công nghệ hoá, và cách chế \r\ntạo giày trong tương lai. Quả thật, đôi Mag ra đời với thiết kế không \r\nđường may rất độc đáo và đáng trải nghiệm.</p><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2020/01/giay-tu-that-day-nike-mag.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="7" data-file-name="giay-tu-that-day-nike-mag.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Thiết kế với không một đường chỉ may của đôi Nike Mag – Một trong những đôi giày đẹp nhất thế giới</p><h3><strong>Bat Boots là đôi giày tiếp theo của Nike dành cho bộ phim khác</strong></h3><p>Nike Mag nổi trội và được biết đến nhiều tuy nhiên không phải là đôi \r\nduy nhất được Nike thiết kế cho bộ phim: Sau thành công rực rỡ của Back \r\nto the future 2, Nike tiếp tục thiết kế các mẫu giày khác cho bộ phim \r\nBat boots trong Batman.</p><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2020/01/nike-air-max-95-bat-boots.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="8" data-file-name="nike-air-max-95-bat-boots.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Đôi Nike Air Max 95 Bat Boots xuất hiện trong phim Bat Man 1989</p><h3><strong>Nhà phát triển Nike Mag onfeet khiến tin đồn sự trở lại của đôi giày tăng cao</strong></h3><p>Câu chuyện về sự quay trở lại của Nike Mag cùng Tiffany Beers – nhà \r\nphát triển sản phẩm tại Nike Campus: Tiffany cùng Tinker đáng ra phải \r\ndiện đôi sneaker tuyệt nhất để tham dự một sự kiện của Nike Campus. Ban \r\nđầu Tinker quyết định mang đôi Mag, nhưng Tiffany lại ngại mang vị sợ \r\ngặp phải những rắc rối không đáng có. Kết quả là, Tiffany đã can đảm \r\ndiện đôi Mag đến sự kiện còn Tinker thì không. Nếu có ai hỏi về việc này\r\n thì Tinker chọn cách “no comment” (miễn bình luận)</p><h3><strong>Ý tưởng Nike Mag được quay lại vào 2005</strong></h3><p>Làm lại Nike Mag bắt đầu từ tháng 10 năm 2005: Tiffany Beers nhận \r\nthấy có rất nhiều người vẫn yêu thích Nike Mag và mong muốn sở hữu nó, \r\nchính vì vậy cô đã đề xuất ý kiến với Tinker để tiến hành tạo dự án làm \r\nlại Mag.</p><h3><strong>Kế hoạch ban đầu là đôi Nike Mag sẽ được giới thiệu vào kỷ niệm 20 năm của phim</strong></h3><p>Kế hoạch ban đầu là Mag sẽ được quay trở lại vào dịp kỷ niệm 20 năm \r\ncủa bộ phim Back to the future 2. Tuy nhiên có một số sơ xuất nhỏ trong \r\nkhâu tính toán nên dự định này đã không thực hiện được.</p><h3><strong>Bất ngờ với người onfeet đầu tiên</strong></h3><p>Muốn giữ bí mật về sự ra mắt hồi 2011, chính các nhân công nhà máy đã\r\n tự mình thử nghiệm sản phẩm: Size giày là một yếu tố vô cùng quan \r\ntrọng, thường thì có thể làm size to hơn nhưng rất khó để thiết kế size \r\nnhỏ hơn. Ban đầu hộ bắt đầu với size 9, không thành công nên đã quay lại\r\n với size 7 (size nhỏ nhất của Mag). Hầu như có rất nhiều công nhân ưng ý\r\n khi đi giày size 7, họ có thể dùng nó để mang mỗi ngày khi đến nơi làm \r\nviệc mà không gặp vấn đề gì</p><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2020/01/doi-giay-dat-nhat-the-gioi.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="9" data-file-name="doi-giay-dat-nhat-the-gioi.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Hình ảnh nhân viên Nike onfeet đôi Nike Mag</p><h3><strong>Một nhà kho được xây dựng chỉ để giữ bí mật</strong></h3><p>Các đôi giày sau khi sản xuất xong, được đặt vào một nhà kho với độ \r\nbảo mật nghiêm ngặt để đảm bảo giá trị hoàn hảo khi bán đấu giá</p><h3><strong>Mức giá cao nhất năm 2011 là?</strong></h3><p>Trong lần đấu giá năm. 2011, Nike Air Mag giá cao nhất đạt kỷ lục lên\r\n đến $37,500, lọt vào trong top những đôi giày đắt nhất thế giới lúc bấy\r\n giờ</p><h3><strong>$4.7 tỷ đô là con số kỷ lục đôi giày tạo ra năm 2011</strong></h3><p>Sự kiện đấu giá của Mag năm 2011 được diễn ra trong vòng 10 ngày với \r\ngiá trị lên tới $4,7 tỉ. Tổng $9,4 tỉ được quyên góp cho quỹ nghiên cứu \r\nParkinson của Michael J.Fox.</p><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2020/01/giay-dat-nhat-the-gioi.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="10" data-file-name="giay-dat-nhat-the-gioi.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>​<span style="color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;">Kỷ lục mà đôi Nike Air Mag tạo ra là 4.7 tỷ đô</span>​<br></p><p><br></p><p>Như vậy là toàn bộ thông tin và fun fact về đôi giày đắt giá nhất thế\r\n giới Nike Air Mag đã được SaigonSneaker.com tóm tắt lại. Nếu như bạn \r\nchưa có nhu cầu là một trong những người Việt Nam sở hữu Mag thì \r\nSaigonSneaker.com luôn sẵn sàng các mẫu giày khác để các bạn lựa chọn \r\nđấy.</p>', 0, b'1', NULL),
	(4, 1, 'Những mẫu giày Adidas Neo nam, nữ thịnh hành tại Việt Nam và trên thế giới', '2020-11-18 19:01:15', NULL, 'assets/img/blog/4/adidas-neo-la-gi.jpg', 'Adidas là một thương hiệu giày thể thao rất được yêu thích trên thị trường toàn cầu. Chúng ta thường quen thuộc với các dòng Adidas Originals nhưng bên cạnh đó, dòng Adidas Neo cũng được ưa chuộng không kém. Vậy Adidas Neo là gì? Hãy cùng khám phá nhé.', '<p><br></p><h2><strong>1. Adidas Neo là gì?</strong></h2><p>Với những ai đang theo đuổi phong cách thời trang năng động, mới lạ \r\nvà đầy ngẫu hứng thì Adidas Neo là một nhánh sản phẩm không thể bỏ qua.</p><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2019/12/adidas-neo-la-gi.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="0" data-file-name="adidas-neo-la-gi.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Đôi giày Neo Adidas bình dân rất được ưa chuộng</p><p>Adidas Neo là dòng sản phẩm dành riêng cho phân khúc khách hàng trẻ \r\ntuổi. Đây là đối tượng khách hàng thích sự mới mẻ, phá cách, mong muốn \r\ntrải nghiệm những sản phẩm mới.</p><p>Từ khi ra mắt, dòng Adidas đã chiếm được cảm tình của giới trẻ khắp \r\nthế giới và có thể sánh ngang hàng với những dòng Adidas khác.</p><h2><strong>2. Ưu điểm của Adidas Neo</strong></h2><p>So với dòng giày adidas Originals truyền thống, thiết kế của dòng \r\nAdidas Neo mang hơi hướng độc đáo và mới lạ với những đặc điểm như sau:</p><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2019/12/adidas-neo.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="1" data-file-name="adidas-neo.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Giày Adidas Neo nữ với form dáng ôm rất tôn chân người mang</p><h3><strong>Chất liệu</strong></h3><p>Tương tự như chất liệu của phiên bản cũ mà Adidas đã tung ra trước \r\nđó, Adidas Neo cũng sử dụng chất liệu da. Phần mũi giày được sử dụng \r\nchất da mềm như phần thân giày, điều tạo nên sự khác biệt so với dòng \r\nAdidas Superstar khi phần mũi giày của sản phẩm này được gia cố cứng cáp\r\n thành khối.</p><h3><strong>Thiết kế</strong></h3><p>Để hỗ trợ cho người sử dụng có thể di chuyển và hoạt động một cách \r\nlinh động và dễ dàng. Adidas Neo vừa có form dáng ôm vừa chân, vừa có \r\nphần đế giày khá mỏng. Đôi giày có trọng lượng nhẹ nhàng hơn nhiều so \r\nvới các loại giày truyền thống.</p><h3><strong>Giá thành</strong></h3><p>Việc sở hữu một đôi Adidas Neo không hề khó vì sản phẩm này được \r\nthiết kế hướng đến đối tượng là những khách hàng có độ tuổi từ 14 đến 19\r\n tuổi.</p><p>Giá thành của một đôi Adidas Neo trung bình chỉ bằng 1 phần 2 của một\r\n đôi Adidas Originals truyền thống. Đây cũng là lý do mà dòng sản phẩm \r\nnày rất được ưa thích.</p><h2><strong>3. Sự ra đời dòng giày Adidas Neo</strong></h2><p>Từ năm 2010 đến năm 2015, Adidas triển khai chiến lược kinh doanh với\r\n tên gọi ban đầu “Route 2015” với mục tiêu mở rộng thương hiệu. Adidas \r\nNeo trở thành một phần của chiến lược kinh doanh mới.</p><p>Với mục đích ban đầu là chỉ trở thành dòng thời trang “mì ăn liền” \r\ncủa thương hiệu lớn Adidas. Dòng sản phẩm này đã thu hút được phản ứng \r\ntích cực của đông đảo giới trẻ trên thế giới.</p><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2019/12/giay-adidas-neo.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="2" data-file-name="giay-adidas-neo.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Rất nhanh sau khi được trình làng, đôi Adidas Neo đã trở thành một xu hướng nổi bật trong giới trẻ.</p><p>Tháng 2 năm 2012, sản phẩm Adidas Neo đầu tiên đã ra mắt và tạo nên \r\nchuỗi 10 cửa hàng dành cho Adidas tại Đức. Không chỉ dừng lại ở mảng \r\nthời trang “mì ăn liền” mà Adidas Neo đã tạo nên những thành công vượt \r\nbậc kể từ khi ra mắt.</p><p>Chỉ trong một thời gian ngắn, Adidas Neo đã mang về thành công lớn \r\ntrong chiến lược kinh doanh cho Adidas. Cơn lốc mang tên Adidas Neo đã \r\nlan rộng không chỉ trong phân khúc thị trường mục tiêu mà còn lấn sân \r\nsang những đối tượng khách hàng khác. Nhờ đó mà Adidas quyết định tập \r\ntrung phát triển và cải tiến không ngừng dòng sản phẩm này.</p><p>Kết quả là vào năm 2016, dòng Adidas Neo chính thức ứng dụng công \r\nnghệ Cloudfoam trên các mẫu giày của mình, nhằm mang lại một định nghĩa \r\nmới của sự trải nghiệm êm ái cho đôi chân, cho người sử dụng một cảm \r\ngiác thoải mái tuyệt đối nhẹ nhàng, êm ái hơn bao giờ hết.</p><h2><strong>4. Những đôi Adidas Neo đáng để sở hữu nhất</strong></h2><h3><strong>Adidas Neo Cloudfoam</strong></h3><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2019/12/adidas-neo-cloudfoam-nu.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="3" data-file-name="adidas-neo-cloudfoam-nu.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Giày Adidas Neo Cloudfoam với thiết kế thời trang và năng động</p><p>Adidas Neo Cloudfoam sở hữu công nghệ đế giày Cloudfoam siêu nhẹ, \r\nđược kết hợp từ công nghệ EVA ở phần midsole và TPU phần đế outsole mang\r\n lại độ bền cao cho đôi giày. Với thiết kế thời trang đi cùng với tính \r\nứng dụng cao từ chất liệu, Neo Cloudfoam là một đôi sneaker dễ dàng kết \r\nhợp với quần áo trong nhiều hoàn cảnh.</p><p>Adidas sử dụng công nghệ Climacool, cùng với OrthoLite, tương tự \r\nnhững chiếc vớ thể thao êm ái, cho phần vải upper giày NEO Cloudfoam \r\nSuper Skate, cho bàn chân luôn thoáng mát. Bên cạnh đó, công nghệ \r\nclimacool cùng với Ortholite tựa như chiếc vớ thể thao êm ái cho bàn \r\nchân luôn được thoáng mát.</p><h3><strong>Adidas Neo Lite Racer</strong></h3><p>Một đôi Sneaker thường bị lầm tưởng bởi vẻ ngoài đơn giản đến mức \r\nnhạt nhẽo, nhưng sức “hot” ngoài sức tưởng tượng của nó đã khẳng định \r\nđược sự tinh tế toát lên từ đôi sneaker này.</p><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2019/12/adidas-neo-nu.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="5" data-file-name="adidas-neo-nu.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Đôi giày Adidas Neo Lite Racer sành điệu</p><p>Với mức giá siêu mềm nhắm đến đối tượng khách hàng trẻ tuổi, cùng với\r\n vẻ ngoài trendy bắt mắt, thích hợp mọi dịp từ đi chơi – đi học – đi \r\nlàm, Adidas Neo Lite Racer đã chiếm trọn cảm tình của giới trẻ.</p><p>Adidas vẫn luôn giữ được sự đơn giản khi thiết kế sản phẩm của mình \r\nnhưng vẫn đầy đủ chức năng chính mang lại trải nghiệm tốt nhất cho người\r\n dùng.</p><h3><strong>Adidas Neo Advantage</strong></h3><p>Với thiết kế đơn giản nhưng thời trang và cá tính, Adidas Neo đã cho \r\nra mắt rất nhiều mẫu giày đáng đồng tiền bát gạo và đặc biệt là Adidas \r\nNeo Advantage.</p><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2019/12/giay-adidas-neo-nu.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="6" data-file-name="giay-adidas-neo-nu.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Adidas Neo Advantage rất dễ phối đồ, cho bạn một vẻ ngoài chỉnh chu nhất.</p><p>Adidas Neo Advantage có nhiều nét tương đồng với đôi Adidas Stan \r\nSmith huyền thoại. Chất liệu da PU cao cấp thay thế cho Primeknit hoặc \r\nda nhuộm đem lại sự bền bỉ cho đôi giày và một vẻ ngoài hết sức thời \r\ntrang.</p><p>Chất liệu da PU Faux của dòng Neo này gần giống như lớp da thật của \r\nStan Smith, có khả năng chống nước, nhẹ và bền. Bạn có thể dễ dàng vệ \r\nsinh mà không để lại lốm đốm sau thời gian sử dụng.</p><h2><strong>5. Adidas Neo giá bao nhiêu?</strong></h2><p>Được thiết kế dành cho giới trẻ nằm trong độ tuổi từ 14 đến 19 tuổi. \r\nHọ là những bạn trẻ không muốn đầu tư quá nhiều vào những đôi giày nhưng\r\n vẫn mong muốn sở hữu một sản phẩm chất lượng và thời trang.</p><p>Vì thế những đôi <strong>giày Adidas NEO chính hãng</strong> có giá \r\nchính hãng giao động chỉ từ 1tr5 đến 2tr5. Vào những đợt sale lớn của \r\nhãng, bạn còn có thể nhanh tay sở hữu những đôi giày Neo với giá siêu \r\nhời. Hãy làm mới tủ đồ của mình với một đôi Adidas Neo thời trang nhé.</p><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2019/12/adidas-neo-gia-bao-nhieu.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="7" data-file-name="adidas-neo-gia-bao-nhieu.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Adidas NEO giá được coi là tốt nhất so với các dòng khác của Adidas</p><h2><strong>6. Mua giày Adidas Neo ở đâu?</strong></h2><p>Là một thương hiệu thời trang nổi tiếng toàn cầu, tại Việt Nam cũng \r\ncó vô số các cửa hàng giày Adidas đang hoạt động nhằm đáp ứng nhu cầu \r\nthị trường.</p><p>Chỉ cần đi đến bất kỳ một con đường lớn nào hay các khu vực mua sắm \r\nsầm uất, bạn sẽ dễ dàng tìm thấy các shop giày Adidas với không gian \r\nsang trọng và đẳng cấp. Thậm chí, bạn có thể đặt mua online qua website \r\nnữa đấy. Hãy tham khảo những mẫu giày tại SaigonSneaker.com để chọn được\r\n đôi giày ưng ý nhất nhé.</p><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2019/12/adidas-neo-cloudfoam-vietnam.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="4" data-file-name="adidas-neo-cloudfoam-vietnam.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div>', 0, b'1', NULL),
	(5, 1, 'Custom là gì? Cách custom sneaker bằng màu acrylic cực đẹp', '2020-11-18 19:05:46', NULL, 'assets/img/blog/5/custom-giay-1.jpg', 'Custom giày là một xu hướng đã du nhập vào Việt Nam một thời gian và nhận được sự hưởng ứng mạnh từ các bạn trẻ, đặc biệt dân chơi giày. Vậy bạn đã bao giờ tự tay thổi hồn vào đôi giày của mình chưa ? ', '<p><br></p><h2><strong>1. Giày custom – xu hướng thời trang nổi bật </strong></h2><p><strong>Custom giày</strong> là khái niệm không còn xa lạ gì đối với \r\nnhững người yêu giày. Có thể nói custom giày là một phương pháp “độ” \r\ngiày, giúp làm mới đôi giày thông qua những hình vẽ, ký họa,… thể hiện \r\nđược cá tính riêng.<br>\r\nTrong buổi phỏng vấn về xu hướng thời trang giày mới nhất, nhà thiết kế \r\nMinnesota Timberwolves đã chia sẻ quan điểm của mình: “Ai cũng có nhu \r\ncầu thể hiện bản thân mình”. Chuyện này giống như bạn đang ở trong một \r\nđội bóng, và bạn muốn đôi giày mình trở nên đặc biệt và dễ nhận ra hơn \r\nkhông chỉ bởi những con số và cái tên được viết lên. Và xu hướng cá nhân\r\n hóa đang ngày càng được giới trẻ ưa chuộng.”<br>\r\nĐể tạo ra những đôi giày “độc nhất vô nhị” phù hợp với style của mỗi \r\nkhách hàng, các ông lớn trong làng mốt giày đã cho ra mắt những dòng \r\nriêng để khách hàng thỏa sức sáng tạo, thể hiện cá tính, như Nike by \r\nyour custom shoes của Nike hay Vans với Design your own shoes.<br>\r\nNhưng nếu bạn giàu sức sáng tạo, yêu thích sự độc đáo thì bạn có thể \r\nthiết kế một đôi giày vẽ tay theo ý bạn, biến chúng không chỉ là một phụ\r\n kiện mà còn là tuyên ngôn nói lên bạn là ai.<br>\r\nNhững đôi giày thuộc nhiều thương hiệu khác nhau như được khoác thêm \r\nchiếc áo mới theo mong muốn của chủ nhân, bằng cách gắn thêm phụ kiện, \r\nthay đổi màu sắc hay vẽ lên những họa tiết lạ mắt.</p><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2019/12/giay-custom.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="0" data-file-name="giay-custom.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Những mẫu giày “độc nhất” vô nhị phù hợp với cá tính mỗi người</p><h2><strong>2. Cách custom giày tại nhà:</strong></h2><p>Để tạo nên những đôi giày mang nét cá tính riêng, hãy để SaigonSneaker.com gợi ý bạn những <strong>cách vẽ giày</strong> của mình tại nhà nhé!</p><h3><strong>Chuẩn bị dụng cụ vẽ: </strong></h3><p>Việc custom giày nghe tưởng dễ nhưng lại dễ không tưởng, tất cả bạn \r\ncần là một đôi tay khéo léo và những dụng cụ sau (Lưu ý rằng đây chỉ là \r\nnhững dụng cụ phổ biến khi custom giày, tùy thuộc vào sức sáng tạo của \r\nbạn, hãy mua những gì phù hợp).</p><ul><li>Giày cũ hoặc mới (Nếu là giày cũ thì cần rửa sạch bề mặt bằng Easy Cleaner của Angelus)</li><li><strong>Màu vẽ giày</strong> Angelus, <strong>màu Acrylic</strong> (chọn màu theo sở thích bản thân)</li><li>Acrylic Finisher để bảo vệ lớp <strong>màu custom giày</strong>.</li><li>Bộ cọ vẽ</li><li>Khay đựng màu vẽ</li><li>Dao rọc giấy</li><li>Kéo</li><li>Băng kéo giấy<br></li></ul><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2019/12/ve-giay.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="2" data-file-name="ve-giay.jpg.webp" data-file-size="0" origin-size="600,338" data-origin="," style=""></figure></div><p>Dụng cụ vẽ giày đơn giản và dễ tìm</p><h3><strong>Vệ sinh giày </strong></h3><p>Nếu bạn chọn giày mới để custom thì có thể bỏ qua bước này, nhưng nếu bạn muốn <strong>sơn vẽ giày</strong> cũ thì hãy chắc chắn rằng mình đã vệ sinh giày thật sạch sẽ để màu lên được đẹp và <strong>mực vẽ giày</strong> sẽ có độ bám màu bền hơn. Giặt sạch đôi giày của bạn, phơi chúng khô ráo để chuẩn bị cho dự án nghệ thuật của mình.</p><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2019/12/giay-ve.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="3" data-file-name="giay-ve.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Vệ sinh giày thật kỹ để khi vẽ, giày lên màu chuẩn và bền đẹp hơn</p><h3><strong>Phác thảo ý tưởng custom giày</strong></h3><p>Bạn đã có ý tưởng nào để custom đôi giày mình chưa? Nếu có thì hãy vẽ\r\n ra giấy nhé, còn nếu chưa thì thử tìm trên mạng những mẫu họa tiết yêu \r\nthích và tập luyện trước.</p><p>Lời khuyên là hãy dành thật nhiều thời gian vào việc tìm mẫu họa tiết\r\n phù hợp và luyện tập hay phác họa nháp trên giấy thật nhiều trước khi \r\nthực hành trên đôi giày của bạn. Vì một khi đã <strong>vẽ lên giày</strong>&nbsp;thì rất khó để xóa hay chỉnh sửa.<br>\r\nHơn nữa khi <strong>vẽ giày vải</strong> không có một mặt phẳng cố định thì rất khó khi thao tác. Đây là sẽ một thử thách với những bạn dự định <strong>vẽ giày Converse</strong> hay <strong>custom giày Vans</strong>.\r\n Đừng ngại luyện tập vẽ hàng chục lần, thậm chí ngay khi ngủ bạn cũng mơ\r\n thấy nó luôn nghĩa là bạn đã sẵn sàng “thổi hồn” cho đứa con yêu của \r\nmình rồi đấy! Tránh để “bút sa gà chết”nhé!</p><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2019/12/son-giay.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="4" data-file-name="son-giay.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Hãy thoải mái sáng tạo những mẫu họa tiết độc đáo nhé!</p><h3><strong>Chia ranh giới </strong></h3><p>Sau khi đã vẽ phác thảo lên giày, bạn hãy định hình họa tiết trên giày để phân chia những vùng sẽ vẽ và những vùng giữ nguyên.<br>\r\nDùng băng keo dán kín những phần không vẽ để trong quá trình <strong>vẽ giày</strong>,\r\n màu không bị lem và tránh được những vệt màu không mong muốn. Hãy dùng \r\nbăng keo giấy không chỉ vì độ bám dính tốt mà khi gỡ ra ít để lại vết \r\nkeo.</p><h3><strong>Tiến hành vẽ giày </strong></h3><p>Ở bước này đòi hỏi sự khéo léo, tỉ mỉ và kiên nhẫn để hoàn thành tác phẩm. Nên dùng sơn gì để sơn giày? Nếu bạn mới tập tành <strong>custom giày</strong> thì hãy chọn <strong>sơn giày</strong> bằng màu Acrylic vì dễ mua và dễ sử dụng. <strong>Cách vẽ màu Acrylic lên giày</strong> sẽ theo các bước sau :</p><ul>\r\n<li>Dùng ghim để cố định giày.</li><li>Lựa chọn đầu cọ phù hợp, nhúng đầu cọ vào khay đựng và gạt màu ở thành khay để tránh lấy quá nhiều màu.</li><li>Vẽ viền theo họa tiết đã phác thảo. Ở bước này hãy thật sự cẩn thận \r\nbởi màu khô rất nhanh và bám bền nên khi tẩy sẽ gây ảnh hưởng đến bề \r\nmặt. Tuy vậy, bạn cũng có thể dùng màu Acrylic trắng để chỉnh sửa những \r\nchỗ lem không mong muốn và đợi khô để vẽ tiếp.</li><li>Khi vẽ xong bạn hãy để giày nơi khô ráo, thoáng mát để màu khô tự nhiên.</li></ul><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2019/12/custom-sneaker.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="5" data-file-name="custom-sneaker.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Vẽ giày là bước yêu cầu sự tỉ mỉ, kiên nhẫn cao</p><h3><strong>Những lưu ý khi custom giày</strong></h3><ul>\r\n<li>Màu Acrylic nhanh khô nhưng có nhược điểm là khi để lâu trên bề mặt giày sẽ bị nứt.</li><li>Độ tan của từng loại màu là khác nhau nên khi pha màu, bạn hãy điều \r\nchỉnh lượng nước phù hợp để màu không bị vón cục hoặc quá loãng không \r\nlên màu chuẩn. Hãy tham khảo cách pha màu Acrylic hoặc cách sử dụng màu \r\nAcrylic vẽ giày để có những hướng dẫn cụ thể nhất.</li><li>Sử dụng những đầu cọ, bút vẽ giày phù hợp cho từng họa tiết khác \r\nnhau. Hãy đầu tư bộ cọ có kích thước đa dạng để tác phẩm có sự sắc nét \r\nvà tinh tế nhé.</li><li>Để giày giữ màu bền đẹp, sau khi vẽ xong, bạn cần chờ màu khô và xịt một lớp bóng bảo vệ.</li></ul><div class="se-component se-image-container __se__float-none" contenteditable="false"><figure style="margin: 0px;"><img src="https://saigonsneaker.com/wp-content/uploads/2019/12/sneaker-custom.jpg.webp" alt="" data-rotate="" data-proportion="true" data-rotatex="" data-rotatey="" data-size="," data-align="none" data-percentage="auto,auto" data-index="6" data-file-name="sneaker-custom.jpg.webp" data-file-size="0" data-origin="," style=""></figure></div><p>Sản phẩm giày sau khi được custom sẽ thể hiện cá tính của chủ nhân</p><p>Với những hướng dẫn đơn giản trên, SaigonSneaker.com hy vọng đã giúp \r\nbạn có những gợi ý hữu ích cho việc custom giày, giúp cho đôi giày của \r\nmình khoác lên một chiếc áo mới thật độc đáo và ấn tượng.<br>\r\nĐừng ngần ngại mà hãy mua cho mình một bộ màu vẽ giày, những phụ kiện đa\r\n dạng và một đôi giày tại SaigonSneaker.com để thực hiện ngay thôi. Và \r\ncũng đừng quên chụp những tấm hình trước và sau khi hoàn thành để ghi \r\nnhận thành quả cho sự cố gắng của bản thân, bạn nhé!</p>', 0, b'1', NULL),
	(6, 1, 'Unisex style là gì? Bí quyết phối đồ chuẩn phong cách thời trang phi giới tính', '2020-11-18 19:09:27', NULL, 'assets/img/blog/6/unisex-la-gi-1.jpg', 'Unisex là phong cách thời trang đậm tính cá nhân, ngày càng khẳng định vị thế quan trọng của mình. Nếu bạn không biết unisex là gì hay phối đồ theo phong cách này như thế nào, hãy cùng tìm hiểu qua bài viết dưới đây nhé.', '<p><br></p><h2><strong>1. Unisex là gì?</strong></h2><p>Trước khi tìm hiểu về phong cách unisex, ta hãy tìm hiểu unisex là gì\r\n nhé. Unisex là một từ được dùng để chỉ những vật, phạm trù không mang \r\ntính phân biệt giới tính hoặc không phân chia giới tính từ những năm \r\n1960. Mãi cho đến năm 2007, khái niệm này mới lần đầu tiên “thâm nhập” \r\nvào thị trường Việt Nam.<br>Trước hết, chúng ta cần phải rõ ràng phi \r\ngiới tính không hề liên quan đến giới tính, phong cách thời trang này \r\nkhông phải chỉ những người yêu cùng giới hay khác giới. Mà đây là phong \r\ncách thời trang không phân biệt giới tính. <br>Phong cách này ngay từ \r\nkhi xuất hiện tại Việt Nam có lẽ đã vấp phải những bình luận trái chiều \r\nvì sự độc đáo của nó, thế nhưng style unisex vẫn được ưa chuộng và phát \r\ntriển mạnh mẽ cho đến ngày hôm nay. <br>Phong cách này đã lấy lòng những\r\n bạn trẻ thế nào? Có lẽ đến với phong cách unisex nữ sẽ giúp họ trông \r\nmạnh mẽ hơn, cứng cáp hơn. Còn đối với các bạn nam sẽ có phần nào đó \r\nquyến rũ hơn chăng? Sự độc đáo, bắt mắt và không nhầm lẫn giữa cá nhân \r\nbạn với một ai khác chính là điểm đặc biệt nhất của phong cách này.</p><h2><strong>2. Thời trang Unisex ra đời như thế nào?</strong></h2><p>Sau khi đã biết unisex là gì, ta hãy tìm hiểu về lịch sử phát triển của phong cách thời trang này nhé.<br>Quần\r\n áo unisex lần đầu tiên ra đời và bắt đầu từ năm 1960 khi cửa hàng thời \r\ntrang danh tiếng nhất tại đại lộ Oxford đã bày bán các mặt hàng thời \r\ntrang unisex. Đến năm 1968, chính là thời kì đỉnh cao của style unisex \r\nkhi style này từ Mỹ đã lan rộng qua đến Pháp và kéo dài cho đến 1975 rồi\r\n mới lụi tàn. Tuy nhiên, một lần nữa khẳng định mình khi phong cách \r\nunisex đã “sống dậy” vào năm 1990 và duy trì đến tận ngày nay.</p><h2><strong>3. Cách phối đồ cực kỳ cá tính theo phong cách Unisex</strong></h2><p>Chắc chắn đến đây, bạn đã hiểu được <strong>đồ unisex là gì</strong> rồi. Vậy thì chúng ta hãy cùng tìm hiểu những cách phối đồ sao cho cá tính, năng động và thời trang nhé!</p><h3><strong>3.1. Quần áo form rộng</strong></h3><p>Có thể nói, những mẫu quần áo unisex nam, nữ phổ biến nhất hiện nay \r\nchính là các item rộng, oversized. Không chỉ với giới nam, các bạn nữ \r\ncũng yêu thích diện những trang phục form rộng vì sự thoải mái và năng \r\nđộng.<br>Những chiếc áo size rộng có thể phối cùng với quần jean, quần \r\njean rách hoặc những chiếc quần short đều được. Kết hợp với một vài phụ \r\nkiện độc đáo và cá tính, bạn đã thành công thu hút ánh nhìn của mọi \r\nngười rồi đấy.</p><p>Các bạn nữ hiện đại ưa chuộng phong cách này bởi sự thoải mái mà nó mang lại</p><p>Không nghi ngờ gì cả, chắc hẳn các bạn nam đều thích những item năng động này rồi!</p><h3><strong>3.2. Trang phục bó sát</strong></h3><p>Ngược lại với những trang phục phía trên, những item thời trang bó \r\nsát vốn được xem dành cho phái nữ ngày nay đã được dùng phổ biến cho cả \r\nhai giới. Các bạn nam hiện đại không ngại thể nghiệm những trang phục \r\nmàu sắc sáng hơn, chất vải ôm và rủ hơn cũng như thử những chiếc quần \r\nôm, quần skinny hay quần ngố.</p><p>Bạn hẳn sẽ khó phân biệt đây là đồ unisex nam hay hay quần áo unisex nữ phải không nào</p><p>Các chàng trai\r\n không ngại ngùng thử những món đồ unisex nam như: chiếc quần skinny, \r\nnón rộng vành thậm chí họa tiết hoa điệu đà chuẩn phong cách unisex nam</p><p>Với đồ Skinny thì những đôi sneaker như Nike Cortez sẽ rất phù hợp</p><p>Hay mix &amp; match với đôi Converse</p><h3><strong>3.3. Quần áo unisex tối màu</strong></h3><p>Có thể nói, không chỉ những ai theo phong cách unisex, mà có rất \r\nnhiều người cũng thích những trang phục đơn sắc và tối màu bởi sự tối \r\ngiản, lịch thiệp và dễ phối. Các sắc màu như xám, bạc hay đen hầu như \r\nđều được mọi người ưa thích và lựa chọn.</p><p>All black luôn là đỉnh nhất</p><p>Tone màu tối, trung tính như đen, xám hay beige được ưa chuộng trong phong cách unisex</p><h3><strong>3.4. Sáng tạo với đồ đôi</strong></h3><p>Nhờ vào size và thiết kế phi giới tính của phong cách này, rất nhiều cặp đôi đã lựa chọn những sản phẩm unisex để mặc cùng nhau.</p><p>Sự kết hợp tone-sur-tone này giúp ai cũng nhận biết rằng hai bạn là của nhau</p><p>Vô cùng đáng yêu với những phụ kiện unisex style</p><p>Lúc này những đôi Vans sẽ rất tuyệt vời cho concept đồ đôi</p><p>Hay một đôi Air Force I đơn giản cũng là lựa chọn sáng suốt</p><h2><strong>4. Cách chọn quần áo theo phong cách thời trang unisex nam, nữ</strong></h2><h3><strong>4.1. Áo sơ mi</strong></h3><p>Áo sơ mi unisex là gì? Có gì khác so với áo thông thường? Tuy không \r\ncó quá nhiều khác biệt trong thiết kế, trang phục nam và nữ vẫn có một \r\nvài điểm nhấn riêng. Các bạn nữ nên lưu ý chọn những chiếc áo unisex nữ \r\nrộng hơn ở phần vai và phần lưng để tạo độ thoải mái.</p><p>Áo sơ mi luôn là item được các bạn theo phong cách Unisex lựa chọn</p><p>Để tạo điểm nhấn cho phong cách Unisex luôn cần đến đôi Mc.QUEEN đơn giản.</p><p>Hoặc giày Stan Smith đều dễ dàng phối hợp cùng</p><h3><strong>4.2. Quần Jogger</strong></h3><p>Một trong các item đồ unisex được ưa chuộng nhất hiện nay chính là \r\nnhững chiếc quần jogger. những chiếc quần được làm từ loại vải có tính \r\nđàn hồi cao này sẽ mang đến sự thoải mái và năng động cho bạn. Tuy \r\nnhiên, bạn cũng cần chắc chắn mua sản phẩm phù hợp với số đo của mình để\r\n tránh sự bất tiện trong hoạt động nếu lỡ mua một chiếc quá nhỏ.</p><p>Những mẫu quần unisex cá tính này được yêu thích và sử dụng rộng rãi</p><p>Một đôi Yeezy Boost sẽ góp phần giúp set đồ của bạn thời thượng hơn</p><p>Một đôi Balenciaga Triple S sặc sỡ cũng sẽ giúp bạn “ngầu” hơn đó</p><h3><strong>4.3. Áo khoác</strong></h3><p>Bạn sẽ dễ dàng tìm cho mình những chiếc áo khoác unisex ngoài các cửa\r\n hiệu, tuy nhiên bạn vẫn cần phải lưu ý những yếu tố sau. Đối với các \r\nchiếc áo hoodie hay đặc biệt là jacket, bạn sẽ dễ bị đánh lừa về size \r\nthế nên bạn nên thử trước khi lựa chọn chi tiền cho sản phẩm.</p><p>Áo khoác luôn là item unisex thu hút</p><p>Nike Air Max 97 sẽ là một đôi giày vừa đủ “hầm hố” để mix cùng các trang phục unisex</p><p>Nếu thích mang giày cổ cao, các bạn nữ có thể chọn Converse nếu mix đồ cùng váy ngắn hoặc quần short nhé</p><h3><strong>4.4. Giày và phụ kiện</strong></h3><p>Nói về unisex ta có thể nói về các item giày và phụ kiện đi kèm như: \r\nvòng cổ, túi đeo chéo, thắt lưng. Thông thường đây đều là những item có \r\nthiết kế đơn giản, dễ phối hợp và dễ sử dụng cho cả nam và nữ.</p><p>Ta có thể dễ dàng bắt gặp những chiếc mũ lưỡi trai đầy cá tính</p><p>Bên cạnh Converse thì NMD cũng là một trong những mẫu giày unisex được ưa chuộng tại SaigonSneaker</p><p>Hoặc những đôi New Balance cổ điển cũng tạo điểm nhấn cho phong cách Unisex.</p><p>Với mong muốn phá vỡ rào cản về giới tính không chỉ trong thời trang \r\nmà còn nhiều khía cạnh khác trong cuộc sống, phong cách unisex đã phát \r\ntriển mạnh mẽ và khẳng định vị thế của mình trong thị trường thời trang \r\nngày nay. <br>Qua bài viết trên, mọi người đều đã biết <strong>unisex là gì</strong>, <strong>phong cách unisex</strong> là gì cũng như những cách phối hàng <strong>unisex</strong>\r\n đẹp và thời thượng nhất. Nếu bạn đang cần “tậu” cho mình những đôi giày\r\n unisex để phối hợp cùng set đồ của mình, hãy đến ngay với \r\nSaigonSneaker.com để tìm cho mình những mẫu giày độc đáo với mức giá hấp\r\n dẫn nhé.</p>', 0, b'1', NULL);
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;

-- Dumping structure for table pro1014.blog_comment
CREATE TABLE IF NOT EXISTS `blog_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `content` varchar(1000) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_comment_user` (`user_id`) USING BTREE,
  KEY `FK_comment_product` (`blog_id`) USING BTREE,
  CONSTRAINT `FK_blog_comment_blog` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `blog_comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table pro1014.blog_comment: ~4 rows (approximately)
/*!40000 ALTER TABLE `blog_comment` DISABLE KEYS */;
REPLACE INTO `blog_comment` (`id`, `blog_id`, `user_id`, `content`, `created`) VALUES
	(1, 1, 1, 'This is comment.', '2020-11-18 22:25:21'),
	(2, 1, 2, 'This is comment.', '2020-11-18 22:17:22'),
	(4, 1, 3, 'This is comment.', '2020-11-18 21:58:24');
/*!40000 ALTER TABLE `blog_comment` ENABLE KEYS */;

-- Dumping structure for table pro1014.brand
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT 'Tên hãng giày',
  `show` bit(1) DEFAULT NULL COMMENT '(0) Ẩn, (1) Hiện',
  `priority` int(11) unsigned DEFAULT NULL COMMENT 'thứ tụ sắp xếp',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.brand: ~8 rows (approximately)
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
REPLACE INTO `brand` (`id`, `name`, `show`, `priority`) VALUES
	(1, 'Nike', NULL, 0),
	(2, 'Jordan', NULL, 1),
	(3, 'Adidas', NULL, 2),
	(4, 'Converse', NULL, 3),
	(5, 'Puma', NULL, 4),
	(6, 'Vans', NULL, 5),
	(7, 'Reebok', NULL, 6),
	(8, 'New Balance', NULL, 7);
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;

-- Dumping structure for table pro1014.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `size_id` int(10) unsigned NOT NULL,
  `color_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  KEY `FK_cart_user` (`user_id`),
  KEY `FK_cart_product` (`product_id`),
  KEY `FK_cart_size` (`size_id`),
  KEY `FK_cart_color` (`color_id`),
  CONSTRAINT `FK_cart_color` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_cart_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_cart_size` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_cart_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.cart: ~2 rows (approximately)
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
REPLACE INTO `cart` (`user_id`, `product_id`, `size_id`, `color_id`, `quantity`) VALUES
	(1, 1, 38, 10, 1),
	(1, 2, 43, 10, 2);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- Dumping structure for table pro1014.color
CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) DEFAULT NULL COMMENT 'Tên màu',
  `colorCode` char(20) DEFAULT NULL COMMENT 'Mã HEX color',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.color: ~2 rows (approximately)
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
REPLACE INTO `color` (`id`, `name`, `colorCode`) VALUES
	(1, 'Đen', '#000000'),
	(10, 'White', '#fffffff');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;

-- Dumping structure for table pro1014.config
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `config` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.config: ~2 rows (approximately)
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
REPLACE INTO `config` (`id`, `name`, `config`) VALUES
	(1, 'default_layout', '{"home": ["layouts/header", "home/banner", "home/features", "home/newProduct", "home/category", "home/product", "home/ExclusiveDeal", "home/brand", "home/RelatedPoduct", "layouts/Footer"], "topmenu": [["Home", "home.php"], ["Shop", "shop.php"], ["Blog", "blog.php"], ["Contact", "contact.php"], ["Login", "account.php"], ["Admin", "admin.php"]]}'),
	(2, 'layout', '{"home": ["layouts/header", "home/banner", "home/features", "home/newProduct", "home/category", "home/product", "home/ExclusiveDeal", "home/brand", "home/RelatedProduct", "layouts/Footer"], "topmenu": [["Home", "home.php"], ["Shop", "shop.php"], ["Blog", "blog.php"], ["Contact", "contact.php"], ["Login", "account.php"], ["Admin", "admin.php"]]}');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;

-- Dumping structure for table pro1014.deal
CREATE TABLE IF NOT EXISTS `deal` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `end_time` datetime NOT NULL,
  `start_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Bản khuyến mãi, khuyến mãi sẽ bắt đầu từ start_time, đến hết end_time, trong thời gian khuyến mãi, sản phẩm sẽ được bán với giá deal_price với số lượng quantity.';

-- Dumping data for table pro1014.deal: ~0 rows (approximately)
/*!40000 ALTER TABLE `deal` DISABLE KEYS */;
REPLACE INTO `deal` (`id`, `end_time`, `start_time`) VALUES
	(1, '2020-11-06 22:32:25', '2020-11-03 22:32:30');
/*!40000 ALTER TABLE `deal` ENABLE KEYS */;

-- Dumping structure for table pro1014.deal_detail
CREATE TABLE IF NOT EXISTS `deal_detail` (
  `deal_id` int(255) unsigned NOT NULL DEFAULT '0' COMMENT 'Mã đợt khuyến mãi',
  `product_id` int(255) unsigned NOT NULL DEFAULT '0' COMMENT 'Sản phẩm được khuyến mãi',
  `quantity` int(255) unsigned NOT NULL COMMENT 'Số lượng sản phẩm',
  `deal_thumb` text COMMENT 'Hình ảnh khuyến mãi',
  `deal_price` float unsigned DEFAULT NULL COMMENT 'Giá khuyến mãi',
  `sold` int(11) DEFAULT NULL COMMENT 'Số lượng đã bán',
  KEY `FK_product_of_deal_deal` (`deal_id`),
  KEY `FK_product_of_deal_product` (`product_id`),
  CONSTRAINT `FK_product_of_deal_deal` FOREIGN KEY (`deal_id`) REFERENCES `deal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_product_of_deal_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.deal_detail: ~2 rows (approximately)
/*!40000 ALTER TABLE `deal_detail` DISABLE KEYS */;
REPLACE INTO `deal_detail` (`deal_id`, `product_id`, `quantity`, `deal_thumb`, `deal_price`, `sold`) VALUES
	(1, 1, 100, 'assets/img/product/1/1.jpg', 75, 13);
/*!40000 ALTER TABLE `deal_detail` ENABLE KEYS */;

-- Dumping structure for table pro1014.order
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT 'Mới(0), đang giao(1), đã hoàn thành (2), Hủy(3)',
  `created` datetime DEFAULT NULL,
  `name` char(100) DEFAULT NULL,
  `address` char(255) DEFAULT NULL,
  `phone` char(20) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_order_user` (`user_id`),
  CONSTRAINT `FK_order_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.order: ~7 rows (approximately)
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
REPLACE INTO `order` (`id`, `user_id`, `status`, `created`, `name`, `address`, `phone`, `email`) VALUES
	(1, 1, 0, '2020-11-10 18:40:53', NULL, NULL, NULL, NULL),
	(2, 3, 1, '2020-10-27 18:40:53', NULL, NULL, NULL, NULL),
	(3, 1, 3, '2020-11-20 12:36:53', NULL, NULL, NULL, NULL),
	(4, 2, 1, '2020-11-06 23:33:53', NULL, NULL, NULL, NULL),
	(5, 2, 0, '2020-11-07 16:02:53', NULL, NULL, NULL, NULL),
	(6, 2, 3, '2020-11-13 11:33:30', NULL, NULL, NULL, NULL),
	(7, 2, 2, '2020-11-13 11:33:47', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;

-- Dumping structure for table pro1014.order_detail
CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_id` int(11) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `color_id` int(11) unsigned NOT NULL,
  `size_id` int(11) unsigned NOT NULL,
  `quantity` int(11) unsigned DEFAULT NULL COMMENT 'Số lượng',
  `price` float unsigned DEFAULT NULL COMMENT 'Giá sản phẩm lúc đặt hàng',
  KEY `FK_order_detail_product` (`order_id`),
  KEY `FK_order_detail_product_2` (`product_id`),
  KEY `FK_order_detail_size` (`size_id`),
  KEY `FK_order_detail_color` (`color_id`),
  CONSTRAINT `FK_order_detail_color` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_order_detail_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_order_detail_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_order_detail_size` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.order_detail: ~3 rows (approximately)
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;

-- Dumping structure for table pro1014.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm',
  `name` char(255) NOT NULL DEFAULT '' COMMENT 'Tên sản phẩm',
  `cost` float unsigned NOT NULL COMMENT 'Giá gốc chưa giảm',
  `price` float unsigned DEFAULT NULL COMMENT 'Giá bán ra, đã giảm giá',
  `description` varchar(20000) DEFAULT '' COMMENT 'Mô tả sản phẩm',
  `thumb` char(255) DEFAULT '' COMMENT 'Ảnh bìa sản phẩm, không nền, .PNG, ít nhất 2 hình',
  `images` json DEFAULT NULL COMMENT 'Hình ảnh thực tế của sản phẩm',
  `update` datetime NOT NULL COMMENT 'Thời gian update mới nhất',
  `show` bit(1) DEFAULT NULL COMMENT '(0) Ẩn, (1) Hiện',
  `priority` int(10) unsigned DEFAULT NULL COMMENT 'Thứ tự sắp xếp',
  `view` int(10) unsigned DEFAULT NULL,
  `brand_id` int(10) unsigned DEFAULT NULL,
  `color_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_product_brand` (`brand_id`),
  KEY `FK_product_color` (`color_id`) USING BTREE,
  CONSTRAINT `FK_product_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_product_color` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.product: ~4 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
REPLACE INTO `product` (`id`, `name`, `cost`, `price`, `description`, `thumb`, `images`, `update`, `show`, `priority`, `view`, `brand_id`, `color_id`) VALUES
	(1, 'Giày Vans Old Skool Đen, Bản Cổ Điển', 900000, 850000, '<p>Số lượng giới hạn ! Sản phẩm có số lượng giới hạn và thường sẽ hết mà không có thông báo trước.</div><div>Đổi Trả Dễ Dàng - Dễ dàng đổi nếu size không vừa hoặc sản phẩm lỗi sau khi nhận hàng.<br></div><div>Giao Hàng Toàn Quốc - Đơn hàng đặt trước 17h sẽ được chốt ngay trong ngày và đến tay quí khách trong khoảng 3-5 ngày. Khu vực nội thành HCM giao nhanh trong vòng 2h.<br></div><div>Có Sẵn Tại Cửa Hàng - Khách hàng tại khu vực HCM có thể đến trực tiếp cửa hàng của chúng tôi.</p>', 'assets/img/product/1/1224.jpg', '["assets/img/product/1/1224.jpg", "assets/img/product/1/4790.jpg", "assets/img/product/1/389.jpg", "assets/img/product/1/7299.jpg", "assets/img/product/1/7751.jpg", "assets/img/product/1/9031.jpg"]', '2020-11-18 00:00:00', NULL, NULL, 24, 6, 1),
	(2, 'Giày Trắng Vans Old Skool True White', 900000, 850000, '<p>Fullbox Old Skool Full White Trắng. Phù hợp: nam nữ, đi học, đi làm, hoạt động thể thao. Size: 36-44. Chất liệu: Canvas. Giao hàng toàn quốc. Bảo hành 3 tháng. Đổi trả dễ dàng. Streetwear, trẻ trung năng động.</p>', 'assets/img/product/2/1.jpg', '["assets/img/product/2/1.jpg", "assets/img/product/2/2.jpg", "assets/img/product/2/3.jpg", "assets/img/product/2/4.jpg"]', '2020-11-04 00:00:00', NULL, NULL, 92, 6, 10),
	(3, 'Giày Nike Air Force 1 ‘Just Do It’', 2100000, 1990000, '<p>Air Force 1 “JUST DO IT” được coi là một trong những đứa con cưng của N.ike, góp phần đưa khách hàng đến gần hơn với nhà sản xuất. Thương hiệu và uy tín của hãng vì thế mà cũng ngày càng được đánh giá cao hơn sau sự kiện ra mắt của dòng sản phẩm đẳng cấp này.Dòng giày này không phải là quá mới mẻ với các tín đồ giày nhưng sức hút của nó thì chưa bao giờ mất đi. Bạn có thể sử dụng giày để đi hàng ngày và đặc biệt có thể trưng diện vào những dịp đặc biệt, lễ hội, tiệc tùng một cách ấn tượng, không cầu kỳ nhưng vẫn luôn thể hiện được đẳng cấp riêng của mình.</p>', 'assets/img/product/3/1.jpg', '["assets/img/product/3/1.jpg", "assets/img/product/3/2.jpg", "assets/img/product/3/3.jpg", "assets/img/product/3/4.jpg", "assets/img/product/3/5.jpg", "assets/img/product/3/6.jpg", "assets/img/product/3/7.jpg", "assets/img/product/3/8.jpg", "assets/img/product/3/9.jpg"]', '2020-11-04 00:00:00', NULL, NULL, 49, 1, 10),
	(4, 'Giày Adidas Alphabounce Beyond Cloud White', 1500000, 1150000, '<p>Fullbox Alphabounce Beyond. 2 ver Trắng / Đen. Phù hợp: nam nữ, đi học, đi làm, tập gym. Size: 36-44. Êm chân, thoáng khí. Giao hàng toàn quốc. Bảo hành 3 tháng. Đổi trả dễ dàng. Streetwear, trẻ trung năng động.</p>', 'assets/img/product/4/1.jpg', '["assets/img/product/4/1.jpg", "assets/img/product/4/2.jpg", "assets/img/product/4/3.jpg", "assets/img/product/4/4.jpg"]', '2020-11-18 20:48:21', NULL, NULL, 25, 3, 10),
	(5, 'Giày Nike Air Force 1 Low GS Triple White', 1000000, 750000, '<p>Air Force 1 (AF1) là một trong những mẫu sneaker kinh điển mọi thời đại của thương hiệu này. Là một trong những item được cả những người sành giày và các bạn trẻ yêu thích phong cách thời trang đường phố trên khắp thế giới yêu thích. Thiết kế trẻ trung với duy nhất một màu trắng chính là điểm nhấn đặc biệt. Mọi thứ bạn trải qua trên đôi chân sẽ được lưu lại vĩnh viễn.</p>', 'assets/img/product/5/1.jpg', '["assets/img/product/5/1.jpg", "assets/img/product/5/2.jpg", "assets/img/product/5/3.jpg", "assets/img/product/5/4.jpg", "assets/img/product/5/5.jpg", "assets/img/product/5/6.jpg"]', '2020-11-18 20:54:48', NULL, NULL, 63, 1, 10),
	(6, 'Giày Addias Stan Smith Fairway', 850000, 790000, '<p>Fullbox Stan Smith. 2 ver Trắng Gót Xanh/ Full White. Thiết kế basic trend dài dài. Phù hợp: nam nữ, đi học, đi làm, hoạt động thể thao. Size: 36-44. Chất liệu: Da. Giao hàng toàn quốc. Bảo hành 3 tháng. Đổi trả dễ dàng. Streetwear, trẻ trung năng động.</p>', 'assets/img/product/6/1.jpg', '["assets/img/product/6/1.jpg", "assets/img/product/6/2.jpg", "assets/img/product/6/3.jpg", "assets/img/product/6/4.jpg"]', '2020-11-18 20:54:48', NULL, NULL, 29, 3, 10),
	(7, 'Giày Trắng Adidas Stan Smith Triple', 850000, 790000, '<p>Fullbox Stan Smith. 2 ver Trắng Gót Xanh/ Full White. Thiết kế basic trend dài dài. Phù hợp: nam nữ, đi học, đi làm, hoạt động thể thao. Size: 36-44. Chất liệu: Da. Giao hàng toàn quốc. Bảo hành 3 tháng. Đổi trả dễ dàng. Streetwear, trẻ trung năng động.</p>', 'assets/img/product/7/1.jpg', '["assets/img/product/7/1.jpg", "assets/img/product/7/2.jpg", "assets/img/product/7/3.jpg", "assets/img/product/7/4.jpg", "assets/img/product/7/5.jpg"]', '2020-11-18 20:54:48', NULL, NULL, 39, 3, 10),
	(8, 'Giày Trắng Addias Superstar Running', 850000, 750000, '<p>Fullbox Superstar Trắng. Điểm nhấn: mũi giày, tem vàng. Style basic trend dài dài. Phù hợp: nam nữ, đi học, đi làm, hoạt động thể thao. Size: 36-44. Chất liệu: Da Trơn. Giao hàng toàn quốc. Bảo hành 3 tháng. Đổi trả dễ dàng.</p>', 'assets/img/product/8/1.jpg', '["assets/img/product/8/1.jpg", "assets/img/product/8/2.jpg", "assets/img/product/8/3.jpg", "assets/img/product/8/4.jpg"]', '2020-11-18 20:54:48', NULL, NULL, 63, 3, 10),
	(9, 'Giày Trắng Nike Air Max 97 Ultra 17 Triple', 1100000, 1000000, '<p>Air Max 97 có thiết kế lấy cảm hứng từ chiếc tàu siêu tốc – bullet train của Nhật và cấu tạo từ chất liệu mesh. Một dòng air max trong bộ sưu tập air max huyền thoại của thương hiệu này. Toàn bộ đế giày được lót đệm khí so với những phiên bản air max đời trước. Vừa cổ điển vừa hiện đại, năng động, sáng tạo là tất cả những gì có thể nói về Air Max 97 – sở hữu vẻ đặc trưng , nổi bật không thể lẫn lộn.</p>', 'assets/img/product/9/1.jpg', '["assets/img/product/9/1.jpg", "assets/img/product/9/2.jpg", "assets/img/product/9/3.jpg"]', '2020-11-18 20:54:48', NULL, NULL, 25, 1, 10),
	(10, 'Giày Đen Nike Air Max 97 Ultra 17 Triple', 1100000, 1000000, '<p>Air Max 97 có thiết kế lấy cảm hứng từ chiếc tàu siêu tốc – bullet train của Nhật và cấu tạo từ chất liệu mesh. Một dòng air max trong bộ sưu tập air max huyền thoại của thương hiệu này. Toàn bộ đế giày được lót đệm khí so với những phiên bản air max đời trước. Vừa cổ điển vừa hiện đại, năng động, sáng tạo là tất cả những gì có thể nói về Air Max 97 – sở hữu vẻ đặc trưng , nổi bật không thể lẫn lộn.</p>', 'assets/img/product/10/1.jpg', '["assets/img/product/10/1.jpg", "assets/img/product/10/2.jpg", "assets/img/product/10/3.jpg"]', '2020-11-18 20:54:48', NULL, NULL, 74, 1, 1),
	(11, 'Giày Trắng New Balance CRT 300 Beige Navy', 1500000, 1250000, '<p>Fullbox NB CRT 300. 3 ver Gót Đỏ / Xanh Navy / Full White. Phù hợp: nam nữ, đi học, đi làm, hoạt động thể thao. Size: 36-44. Chất liệu: Da lộn. Giao hàng toàn quốc. Bảo hành 3 tháng. Đổi trả dễ dàng. Streetwear, trẻ trung năng động.</p>', 'assets/img/product/11/1.jpg', '["assets/img/product/11/1.jpg", "assets/img/product/11/2.jpg", "assets/img/product/11/3.jpg"]', '2020-11-18 20:54:48', NULL, NULL, 53, 8, 10),
	(12, 'Giày Addias Prophere Grey Solar Red', 1500000, 1050000, '<p>Fullbox Prophere. 3 ver Trắng / Đen / Xám. Đế giày tăng chiều cao. Phù hợp: nam nữ, đi học, đi làm, hoạt động thể thao. Size: 36-44. Giao hàng toàn quốc. Bảo hành 3 tháng. Đổi trả dễ dàng. Streetwear, trẻ trung năng động.</p>', 'assets/img/product/12/1.jpg', '["assets/img/product/12/1.jpg", "assets/img/product/12/2.jpg", "assets/img/product/12/3.jpg"]', '2020-11-18 20:54:48', NULL, NULL, 27, 3, 10),
	(13, 'Giày Nữ Nike Air Force 1 Shadow Pale Ivory.', 1300000, 1190000, '<p>Giày sneaker Nike Air Force 1. Phong cách trẻ trung năng động. Thích hợp Nữ du lịch, đi học, chơi thể thao,… Đế Double Air nâng dáng.</p>', 'assets/img/product/13/1.jpg', '["assets/img/product/13/1.jpg", "assets/img/product/13/2.jpg", "assets/img/product/13/3.jpg", "assets/img/product/13/4.jpg", "assets/img/product/13/5.jpg", "assets/img/product/13/6.jpg", "assets/img/product/13/7.jpg"]', '2020-11-18 20:54:48', NULL, NULL, 82, 1, 10),
	(14, 'Giày Adidas NMD R1 Grey', 1300000, 1190000, '<p>Fullbox NMD R1. 2 màu Xám / Trắng. Đế boost đàn hồi êm chân. Phù hợp: nam nữ, đi học, đi làm, hoạt động thể thao. Size: 36-44. Chất liệu: Vải dệt Primeknit. Giao hàng toàn quốc. Bảo hành 3 tháng. Đổi trả dễ dàng.</p>', 'assets/img/product/14/1.jpg', '["assets/img/product/14/1.jpg", "assets/img/product/14/2.jpg", "assets/img/product/14/3.jpg", "assets/img/product/14/4.jpg"]', '2020-11-18 20:54:48', NULL, NULL, 28, 3, 10),
	(15, 'Giày Nike Air Force 1 ’07 LV8 Overbranding.', 1300000, 1190000, '<p>Fullbox A.i.r Force 1 ’07 LV8 Utility. Basic mà style cực kì. Phù hợp: nam nữ, đi học, đi làm, hoạt động thể thao. Size: 36-44. Chất liệu: Da. Giao hàng toàn quốc. Bảo hành 3 tháng. Đổi trả dễ dàng. Streetwear, trẻ trung năng động.</p>', 'assets/img/product/15/1.jpg', '["assets/img/product/14/1.jpg", "assets/img/product/14/2.jpg", "assets/img/product/14/3.jpg", "assets/img/product/14/4.jpg", "assets/img/product/14/5.jpg", "assets/img/product/14/6.jpg"]', '2020-11-18 20:54:48', NULL, NULL, 45, 3, 10);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table pro1014.product_comment
CREATE TABLE IF NOT EXISTS `product_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `content` varchar(1000) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comment_product` (`product_id`),
  KEY `FK_comment_user` (`user_id`),
  CONSTRAINT `FK_comment_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_comment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.product_comment: ~4 rows (approximately)
/*!40000 ALTER TABLE `product_comment` DISABLE KEYS */;
REPLACE INTO `product_comment` (`id`, `product_id`, `user_id`, `content`, `created`) VALUES
	(1, 1, 1, 'This is comment.', '2020-11-18 23:50:27'),
	(2, 1, 2, 'This is comment.', '2020-11-18 22:38:28'),
	(3, 2, 3, 'This is comment.', '2020-11-18 21:33:29'),
	(4, 1, 3, 'This is comment.', '2020-11-18 14:38:29');
/*!40000 ALTER TABLE `product_comment` ENABLE KEYS */;

-- Dumping structure for table pro1014.product_detail
CREATE TABLE IF NOT EXISTS `product_detail` (
  `product_id` int(10) unsigned NOT NULL COMMENT 'Mã sản phẩm',
  `color_id` int(10) unsigned NOT NULL COMMENT 'Màu sản phẩm',
  `size_id` int(10) unsigned NOT NULL COMMENT 'Size sản phẩm',
  `quantity` int(10) unsigned NOT NULL COMMENT 'Số lượng',
  KEY `FK__product` (`product_id`),
  KEY `FK__color` (`color_id`),
  KEY `FK__size` (`size_id`),
  CONSTRAINT `FK__color` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__size` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.product_detail: ~5 rows (approximately)
/*!40000 ALTER TABLE `product_detail` DISABLE KEYS */;
REPLACE INTO `product_detail` (`product_id`, `color_id`, `size_id`, `quantity`) VALUES
	(1, 1, 38, 26),
	(1, 10, 38, 50),
	(1, 1, 39, 13),
	(1, 1, 42, 31),
	(2, 10, 36, 45);
/*!40000 ALTER TABLE `product_detail` ENABLE KEYS */;

-- Dumping structure for table pro1014.review
CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `review` varchar(1000) DEFAULT NULL,
  `rate` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_review_product` (`product_id`),
  KEY `FK_review_user` (`user_id`),
  CONSTRAINT `FK_review_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_review_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.review: ~2 rows (approximately)
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
REPLACE INTO `review` (`id`, `product_id`, `user_id`, `review`, `rate`) VALUES
	(1, 1, 1, 'Nice shoes !!!', 5),
	(2, 1, 2, 'It Beauty !!!', 4);
/*!40000 ALTER TABLE `review` ENABLE KEYS */;

-- Dumping structure for table pro1014.size
CREATE TABLE IF NOT EXISTS `size` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `size` int(11) unsigned NOT NULL COMMENT 'Size giày',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.size: ~14 rows (approximately)
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
REPLACE INTO `size` (`id`, `size`) VALUES
	(35, 35),
	(36, 36),
	(37, 37),
	(38, 38),
	(39, 39),
	(40, 40),
	(41, 41),
	(42, 42),
	(43, 43),
	(44, 44),
	(45, 45),
	(46, 46),
	(47, 47),
	(48, 48);
/*!40000 ALTER TABLE `size` ENABLE KEYS */;

-- Dumping structure for table pro1014.slider
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL COMMENT 'Sản phẩm của slider',
  `img` text NOT NULL COMMENT 'Đường dẫn hình ảnh',
  `description` text COMMENT 'Mô tả slider',
  `title` text COMMENT 'Tiêu đề slider',
  `show` bit(1) DEFAULT NULL COMMENT '(0) Ẩn,(1) Hiện',
  `priority` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Thứ tự slider',
  PRIMARY KEY (`id`),
  KEY `FK_slider_product` (`product_id`),
  CONSTRAINT `FK_slider_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.slider: ~2 rows (approximately)
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
REPLACE INTO `slider` (`id`, `product_id`, `img`, `description`, `title`, `show`, `priority`) VALUES
	(3, 3, 'assets/img/product/3/nike-air-force-1-jdi.png', 'Từng bừng Khai Trương, Khuyến Mãi Đến 30% Tất Cả các mặt hàng.', 'Giảm giá đến 30%!!!', NULL, 0),
	(4, 3, 'assets/img/product/3/nike-air-force-1-jdi.png', 'Từng bừng Khai Trương, Khuyến Mãi Đến 30% Tất Cả các mặt hàng.', 'Giảm giá đến 30%!!!', NULL, 0);
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;

-- Dumping structure for table pro1014.tag_blog
CREATE TABLE IF NOT EXISTS `tag_blog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL DEFAULT '',
  `show` bit(1) DEFAULT NULL,
  `priority` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.tag_blog: ~7 rows (approximately)
/*!40000 ALTER TABLE `tag_blog` DISABLE KEYS */;
REPLACE INTO `tag_blog` (`id`, `name`, `show`, `priority`) VALUES
	(1, 'Giày Yeezy', NULL, NULL),
	(2, 'Giày Air Max 98', NULL, NULL),
	(3, 'Giày Air Jordan 11', NULL, NULL),
	(4, 'Giày Air Max 270', NULL, NULL),
	(5, 'Giày Kyrie 4', NULL, NULL),
	(17, 'Giày Adidas', NULL, NULL),
	(18, 'Giày Nike', NULL, NULL),
	(19, 'Giày Vans', NULL, NULL);
/*!40000 ALTER TABLE `tag_blog` ENABLE KEYS */;

-- Dumping structure for table pro1014.tag_of_blog
CREATE TABLE IF NOT EXISTS `tag_of_blog` (
  `blog_id` int(11) unsigned NOT NULL,
  `tag_id` int(11) unsigned NOT NULL,
  KEY `FK_tag_of_blog_blog` (`blog_id`),
  KEY `FK_tag_of_blog_tag_blog` (`tag_id`),
  CONSTRAINT `FK_tag_of_blog_blog` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tag_of_blog_tag_blog` FOREIGN KEY (`tag_id`) REFERENCES `tag_blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.tag_of_blog: ~8 rows (approximately)
/*!40000 ALTER TABLE `tag_of_blog` DISABLE KEYS */;
REPLACE INTO `tag_of_blog` (`blog_id`, `tag_id`) VALUES
	(1, 1),
	(1, 3),
	(2, 17),
	(3, 18),
	(4, 17),
	(5, 1),
	(5, 18),
	(6, 17),
	(6, 18),
	(6, 19);
/*!40000 ALTER TABLE `tag_of_blog` ENABLE KEYS */;

-- Dumping structure for table pro1014.tag_of_product
CREATE TABLE IF NOT EXISTS `tag_of_product` (
  `product_id` int(11) unsigned DEFAULT NULL,
  `tag_id` int(11) unsigned DEFAULT NULL,
  KEY `FK_tag_of_product_product` (`product_id`),
  KEY `FK_tag_of_product_tag` (`tag_id`),
  CONSTRAINT `FK_tag_of_product_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tag_of_product_tag` FOREIGN KEY (`tag_id`) REFERENCES `tag_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.tag_of_product: ~3 rows (approximately)
/*!40000 ALTER TABLE `tag_of_product` DISABLE KEYS */;
REPLACE INTO `tag_of_product` (`product_id`, `tag_id`) VALUES
	(1, 6),
	(2, 7),
	(3, 6);
/*!40000 ALTER TABLE `tag_of_product` ENABLE KEYS */;

-- Dumping structure for table pro1014.tag_product
CREATE TABLE IF NOT EXISTS `tag_product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL DEFAULT '' COMMENT 'Tên danh mục',
  `show` bit(1) DEFAULT NULL,
  `priority` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.tag_product: ~7 rows (approximately)
/*!40000 ALTER TABLE `tag_product` DISABLE KEYS */;
REPLACE INTO `tag_product` (`id`, `name`, `show`, `priority`) VALUES
	(1, 'Giày Adidas Superstar', NULL, NULL),
	(2, 'Giày NMD', NULL, NULL),
	(3, 'Giày Athletic & Sneakers', NULL, NULL),
	(4, 'Giày Ultraboost', NULL, NULL),
	(5, 'Stan Smith', NULL, NULL),
	(6, 'Giày Nam', NULL, NULL),
	(7, 'Giày Nữ', NULL, NULL);
/*!40000 ALTER TABLE `tag_product` ENABLE KEYS */;

-- Dumping structure for table pro1014.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(255) NOT NULL DEFAULT '',
  `password` char(255) NOT NULL DEFAULT '',
  `email` char(255) NOT NULL,
  `phone` char(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `fullname` char(255) DEFAULT NULL,
  `avartar` char(255) DEFAULT NULL,
  `rank` tinyint(255) unsigned DEFAULT NULL,
  `address` char(255) DEFAULT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table pro1014.user: ~4 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id`, `username`, `password`, `email`, `phone`, `created`, `birthday`, `fullname`, `avartar`, `rank`, `address`, `verification_code`) VALUES
	(1, 'huy', '$2y$10$q/CXZMVUqI8jetJUR0mCWuiSS.irB1KAM4xDDLuYGxgpcGkohZsH.', 'huy@gmail.com', '09090909', '2020-10-10 05:37:57', '2001-04-21 18:38:23', 'Nguyễn Văn Huy', 'assets/img/user/1.jpg', 10, 'Quận 1, HCMC', NULL),
	(2, 'dien', '$2y$10$Zmag6qzDtujLQ1c1jhnXhuiDtklo0gSPVY3G6qUfUU1x3Se8ixqXq', 'dien@gmail.com', '08080808', '2020-10-11 01:37:58', '2001-05-05 18:38:24', 'Nguyễn Văn Điền', 'assets/img/user/2.jpg', 1, 'Quận 2, HCMC', NULL),
	(3, 'dung', '$2y$10$xEyjNLhkwDstItvTU3/3LujzVGhy5YAq0YyNS5KsB.GrNKPHFhQq.', 'dung@gmail.com', '07070707', '2020-10-10 08:37:59', '2001-07-15 18:38:25', 'Nguyễn Văn Dung', 'assets/img/user/3.jpg', 1, 'Quận 3, HCMC', NULL),
	(4, 'admin', '$2y$10$RdzH.ludsZX6/m2a8.TnZe2N4yT9ioPaIIiL9DpLGMMuKPiJ4u8Im', 'huyn.dev@gmail.com', NULL, NULL, NULL, NULL, NULL, 10, NULL, 'NULL'),
	(5, 'user', '$2y$10$XRVjjRGu0F8mSucFAZ9QLuHQkG0N1U6dr07QocigaYI7iBuJkCk5.', 'huynguyeexn@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'NULL');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
