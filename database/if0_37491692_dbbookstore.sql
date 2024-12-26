-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql311.infinityfree.com
-- Generation Time: Dec 26, 2024 at 04:47 AM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_37491692_dbbookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `maSach` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `maHD` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `soLuong` int(11) NOT NULL DEFAULT 0,
  `donGia` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`maSach`, `maHD`, `soLuong`, `donGia`) VALUES
('S1', 'HD00000001', 2, 9000000),
('S8', 'HD67506546af5f9', 1, 155000),
('S6', 'HD67506546af5f9', 1, 379000),
('S2', 'HD67506f989e154', 2, 299000),
('S8', 'HD67506f989e154', 1, 155000),
('S9', 'HD67507bdbdcdec', 1, 999000),
('S18', 'HD67507bdbdcdec', 1, 58000),
('S8', 'HD67507cc730ad9', 1, 155000),
('S7', 'HD67507eabe5f0f', 1, 99000),
('S9', 'HD67507fb34a913', 1, 999000),
('S3', 'HD67507fde9c91b', 1, 399000),
('S4', 'HD67508120a0f47', 1, 699000),
('S3', 'HD6750819b6634d', 1, 399000),
('S8', 'HD6750fd584841d', 1, 155000),
('S3', 'HD675100919f4ac', 2, 399000),
('S17', 'HD675100919f4ac', 1, 299000),
('S2', 'HD675104bc6ac2e', 1, 299000),
('S2', 'HD675106aa356e1', 1, 299000),
('S5', 'HD6757b57711441', 3, 299000),
('S3', 'HD6757bcc0e3de0', 1, 399000),
('S2', 'HD6757bcc0e3de0', 1, 299000),
('S13', 'HD675d0e23c3e7f', 26, 155000),
('S15', 'HD67643e8007639', 1, 79000),
('S4', 'HD67643e8007639', 1, 699000),
('S1', 'HD67643eb4da8e2', 2, 500000),
('S18', 'HD67643fbbf40d6', 1, 58000);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `maHD` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tenNguoiNhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `diaChiNguoiNhan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `soDienThoaiHD` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ngayLapHD` date NOT NULL,
  `ngayNhan` date DEFAULT NULL,
  `trangThaiHD` enum('dagiao','dahuy','choxuly','danggiao') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'choxuly',
  `phuongThucThanhToan` enum('COD','chuyenkhoan') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'COD',
  `phuongThucGiaoHang` enum('giaoNhanh','giaoTietKiem') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ghiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`maHD`, `email`, `tenNguoiNhan`, `diaChiNguoiNhan`, `soDienThoaiHD`, `ngayLapHD`, `ngayNhan`, `trangThaiHD`, `phuongThucThanhToan`, `phuongThucGiaoHang`, `ghiChu`) VALUES
('HD0000000002', NULL, 'hehe', '12 egeg', '0386547789', '2024-12-03', NULL, 'choxuly', 'COD', 'giaoNhanh', NULL),
('HD00000001', 'user1@example.com', 'Nguyễn Văn User1', '116 Văn Hoàng Quận 1', '0321548854', '2024-11-15', '2024-11-30', 'dagiao', 'COD', NULL, NULL),
('HD67506546af5f9', 'nguyenvantruongan7746@gmail.com', 'Nguyễn Văn Trường An', '168 HE HE', '0365852247', '2024-12-04', NULL, 'choxuly', 'COD', 'giaoTietKiem', 'Không ghi chú gì đâu'),
('HD67506f989e154', 'nguyenvantruongan7746@gmail.com', 'Nguyễn Văn Trường Anhhhh', '168 gsdfdsfsfsf', '036585299', '2024-12-04', '2024-12-07', 'danggiao', 'COD', 'giaoNhanh', 'cc'),
('HD67507bdbdcdec', 'nguyenvantruongan7747@gmail.com', 'lalllaaaaal', '5', '55', '2024-12-04', NULL, 'choxuly', '', '', ''),
('HD67507cc730ad9', 'nguyenvantruongan7746@gmail.com', 'dsadasd', '456hhh', '546', '2024-12-04', NULL, 'choxuly', '', '', ''),
('HD67507eabe5f0f', 'nguyenvantruongan7746@gmail.com', 'sad', '168 HE HE', '0365852247', '2024-12-04', NULL, 'choxuly', '', '', ''),
('HD67507fb34a913', 'nguyenvantruongan7746@gmail.com', 'fsdf', '54646', '456546', '2024-12-04', NULL, 'dagiao', 'COD', 'giaoTietKiem', ''),
('HD67507fde9c91b', 'nguyenvantruongan7746@gmail.com', 'rewrerwr', '5', '5', '2024-12-04', NULL, 'choxuly', 'COD', 'giaoNhanh', ''),
('HD67508120a0f47', 'nguyenvantruongan7746@gmail.com', 'sfd', '4', '456', '2024-12-04', NULL, 'choxuly', 'COD', 'giaoTietKiem', ''),
('HD6750819b6634d', 'nguyenvantruongan7746@gmail.com', 'qwe', 'sf', '5466', '2024-12-04', '2024-12-10', 'dagiao', 'COD', 'giaoTietKiem', ''),
('HD6750fd584841d', NULL, 'fgfdgfgfg', '168 gsdfdsfsfsfsdsdseeee', '036585245', '2024-12-05', NULL, 'choxuly', 'COD', 'giaoTietKiem', 'aa'),
('HD675100919f4ac', 'nguyenvantruongan7748@gmail.com', 'Phong nè', '116 rrgght', '0365852247', '2024-12-05', NULL, 'choxuly', 'COD', 'giaoNhanh', ''),
('HD675104bc6ac2e', 'nguyenvantruongan7748@gmail.com', 'sdfsdf', '121 dfd', '4564564', '2024-12-05', NULL, 'choxuly', 'COD', 'giaoTietKiem', ''),
('HD675106aa356e1', 'nguyenvantruongan7748@gmail.com', 'dsadasfafasfasf', '4545d adasdad', '56546', '2024-12-05', NULL, 'choxuly', 'COD', 'giaoTietKiem', 'cf'),
('HD6757b57711441', 'nguyenvantruongan7746@gmail.com', 'a', 'đa', '21', '2024-12-10', NULL, 'choxuly', 'chuyenkhoan', 'giaoNhanh', 'ada'),
('HD6757bcc0e3de0', 'nguyenvantruongan7746@gmail.com', 'Nguyenletiendung', 'đa', '123', '2024-12-10', NULL, 'choxuly', 'chuyenkhoan', 'giaoNhanh', 'An Khùng'),
('HD675d0e23c3e7f', NULL, 'ew', 'sdfsdfsfs', 'sdfad', '2024-12-13', NULL, 'choxuly', 'chuyenkhoan', 'giaoTietKiem', 'fsdfdsfds'),
('HD67643e8007639', NULL, '123', '123', '123', '2024-12-19', NULL, 'choxuly', 'chuyenkhoan', 'giaoNhanh', '123'),
('HD67643eb4da8e2', NULL, '123', '123', '123', '2024-12-19', NULL, 'choxuly', 'chuyenkhoan', 'giaoTietKiem', '123'),
('HD67643fbbf40d6', NULL, '123', '123', '123', '2024-12-19', NULL, 'choxuly', 'chuyenkhoan', 'giaoTietKiem', 'BYE BYE , BÙNG HÀNG NHA');

-- --------------------------------------------------------

--
-- Table structure for table `loaisach`
--

CREATE TABLE `loaisach` (
  `maLoai` varchar(5) NOT NULL,
  `tenLoai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loaisach`
--

INSERT INTO `loaisach` (`maLoai`, `tenLoai`) VALUES
('BA', 'Bí ẩn'),
('KA', 'Kỳ ảo'),
('KH', 'Khoa học viễn tưởng'),
('LM', 'Lãng mạn'),
('LS', 'Lịch sử'),
('VH', 'Văn học');

-- --------------------------------------------------------

--
-- Table structure for table `nhaxuatban`
--

CREATE TABLE `nhaxuatban` (
  `maNXB` varchar(5) NOT NULL,
  `tenNXB` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhaxuatban`
--

INSERT INTO `nhaxuatban` (`maNXB`, `tenNXB`) VALUES
('XB1', 'A&D Exclusive Edition'),
('XB2', 'Signed A&D Exclusive Edition'),
('XB3', 'Deluxe Limited Edition'),
('XB4', 'A Hunger Games Novel');

-- --------------------------------------------------------

--
-- Table structure for table `roleadminuser`
--

CREATE TABLE `roleadminuser` (
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `diaChi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `soDienThoai` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `trangThai` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'active',
  `vaiTro` enum('admin','user','guest') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roleadminuser`
--

INSERT INTO `roleadminuser` (`email`, `username`, `password`, `full_name`, `diaChi`, `soDienThoai`, `trangThai`, `vaiTro`) VALUES
('admin1@example.com', 'admin', 'admin', 'Admin One', '123 Admin St', '1234567890', 'active', 'admin'),
('nguyenvantruongan2002@gmail.com', 'anne2002', '$2y$10$OSuenJ7ORyHYIOhTLUDkWO/RdRnVNL.bXgMYfCNh7FzDFbh3AaxUS', 'An 2002', '', '', 'active', 'user'),
('nguyenvantruongan7746@gmail.com', 'anne', '$2y$10$8dJL.5g6UUEIZX8MuH9WHeUXuhvnff.aqI3hxupHxao6B6zTbsw8C', NULL, NULL, '0386547784', 'active', 'user'),
('nguyenvantruongan7747@gmail.com', 'anne2', '$2y$10$0w.qWK7c9lkIGsvcacnEJuPWiYmy8k9BE.SmiSHFXZCzRBQ1dBfHm', NULL, NULL, NULL, 'active', 'user'),
('nguyenvantruongan7748@gmail.com', 'anne3', '$2y$10$kyR5QxV5ALz30wNLqnwwieS7afqdHXRSclaicMNm9fI6.v7jC2wve', NULL, NULL, NULL, 'active', 'user'),
('user1@example.com', 'user1', 'user1', 'User One', '456 User St', '0987654321', 'active', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

CREATE TABLE `sach` (
  `maSach` varchar(13) NOT NULL,
  `tenSach` varchar(50) NOT NULL,
  `gia` int(11) NOT NULL DEFAULT 0,
  `giaKM` int(11) NOT NULL DEFAULT 0,
  `anh` varchar(50) NOT NULL,
  `moTa` varchar(50) NOT NULL,
  `moTaDayDu` text NOT NULL,
  `trangThai` varchar(50) NOT NULL,
  `maNXB` varchar(5) NOT NULL,
  `maLoai` varchar(5) NOT NULL,
  `maTG` varchar(13) NOT NULL,
  `SoLuong` int(11) NOT NULL DEFAULT 0,
  `TinhTrang` varchar(20) NOT NULL DEFAULT 'Còn hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`maSach`, `tenSach`, `gia`, `giaKM`, `anh`, `moTa`, `moTaDayDu`, `trangThai`, `maNXB`, `maLoai`, `maTG`, `SoLuong`, `TinhTrang`) VALUES
('S1', 'The Boyfriend', 1000000, 500000, 'The_Boyfriend.jpg', 'Một tác phẩm kinh dị mới đầy hấp dẫn của tác giả b', '', 'xemnhieu', 'XB1', 'LM', 'TG1', 50, 'Còn hàng'),
('S10', 'Patriot: A Memoir', 150000, 55000, '9780593320969_p0_v2_s600x595.jpg', 'Alexei Navalny bắt đầu viết Patriot ngay sau khi b', 'Alexei Navalny bắt đầu viết Patriot ngay sau khi bị đầu độc gần chết vào năm 2020. Đây là toàn bộ câu chuyện về cuộc đời của ông: tuổi trẻ, lời kêu gọi hoạt động, cuộc hôn nhân và gia đình, cam kết thách thức một siêu cường thế giới quyết tâm làm ông im lặng và niềm tin hoàn toàn của ông rằng sự thay đổi không thể cưỡng lại được—và sẽ đến. \r\n \r\nVới những chi tiết sống động, hấp dẫn, bao gồm cả những bức thư chưa từng thấy từ trong tù, Navalny kể lại, trong số những thứ khác, sự nghiệp chính trị của mình, nhiều nỗ lực ám sát ông, và cuộc sống của những người thân thiết nhất với ông, và chiến dịch không ngừng nghỉ mà ông và nhóm của mình đã tiến hành chống lại một chế độ ngày càng độc tài. \r\n \r\nĐược viết bằng niềm đam mê, trí tuệ, sự thẳng thắn và lòng dũng cảm mà ông xứng đáng được ca ngợi, Patriot là bức thư cuối cùng của Navalny gửi đến thế giới: một câu chuyện cảm động về những năm cuối đời của ông trong nhà tù tàn bạo nhất trên trái đất; một lời nhắc nhở về lý do tại sao các nguyên tắc về quyền tự do cá nhân lại quan trọng đến vậy; và một lời kêu gọi mạnh mẽ để tiếp tục công việc mà ông đã hy sinh cả mạng sống của mình.\r\n\r\n“Cuốn sách này không chỉ là minh chứng cho cuộc đời của Alexei, mà còn là cam kết không lay chuyển của ông đối với cuộc chiến chống lại chế độ độc tài—một cuộc chiến mà ông đã cống hiến mọi thứ, kể cả mạng sống của mình. Qua những trang sách, độc giả sẽ biết đến người đàn ông mà tôi vô cùng yêu quý—một người đàn ông chính trực sâu sắc và lòng dũng cảm không gì lay chuyển được. Chia sẻ câu chuyện của ông không chỉ tôn vinh ký ức về ông mà còn truyền cảm hứng cho những người khác đấu tranh vì điều đúng đắn và không bao giờ đánh mất những giá trị thực sự quan trọng.\" —Yulia Navalnaya', 'muanhieu', 'XB2', 'VH', 'TG5', 50, 'Còn hàng'),
('S11', 'Skandar and the Skeleton Curse', 350000, 150000, '9781665971720_p0_v2_s600x595.jpg', 'Cuộc phiêu lưu tiếp tục với phần thứ tư đầy hồi hộ', 'Khi Skandar và những người bạn của mình bắt đầu năm thứ tư tại Eyrie, những chú kỳ lân trên Đảo bị trúng một lời nguyền khủng khiếp đe dọa thay đổi mọi thứ. Giữa một Chuẩn đô đốc quyết tâm loại bỏ nguyên tố tinh thần mãi mãi và một người chị quyết tâm trả thù, không nơi nào an toàn cho Skandar.\r\n\r\nKhi ngày càng nhiều kỳ lân bị ảnh hưởng bởi lời nguyền, thời gian đang trôi nhanh đối với Skandar và nhóm tứ tấu của anh, những người thấy mình đang chạy đua để giành giật sự sống. Liệu họ có thể ngăn chặn lời nguyền trước khi Đảo bị mất mãi mãi không?', 'decu', 'XB2', 'VH', 'TG2', 50, 'Còn hàng'),
('S12', 'The Night We Lost Him: A Novel', 100000, 49000, '9781668002957_p0_v3_s600x595.jpg', 'Trong cuốn tiểu thuyết hấp dẫn này của tác giả bán', 'Trong cuốn tiểu thuyết hấp dẫn này của tác giả bán chạy nhất của tờ New York Times với tác phẩm The Last Thing He Told Me , hai anh em xa cách phát hiện ra rằng cha họ đã giữ một bí mật trong hơn năm mươi năm, một bí mật có thể đã gây tử vong...\r\n\r\nLiam Noone là nhiều thứ đối với nhiều người. Đối với công chúng, ông là một ông trùm khách sạn chính hiệu, tự thân lập nghiệp đang trốn tránh quá khứ. Đối với ba người vợ cũ, ông là một người đàn ông gia đình yêu thương nhưng xa cách, luôn giữ cho tài chính của mình dồi dào và gia đình ông được tách biệt cẩn thận. Đối với Nora, ông là một người cha thường yêu thương cô từ xa—đáng chú ý là một ngôi nhà nhỏ bên vách đá trên bờ biển California, nơi ông đã rơi xuống và tử vong.\r\n\r\nChính quyền phán quyết cái chết là do tai nạn, nhưng Nora và người anh trai xa cách Sam lại có ý tưởng khác. Khi Nora và Sam tạo thành một liên minh khó khăn để giải mã bí ẩn, họ bắt đầu ghép lại những mảnh ghép quá khứ của cha mình và khám phá ra một bí mật gia đình làm thay đổi mọi thứ.\r\n\r\nVới sự pha trộn đặc trưng của Laura Dave giữa sự hồi hộp sâu lắng và bộ phim truyền hình gia đình gợi cảm, The Night We Lost Him là một tác phẩm hấp dẫn với một khúc quanh đau lòng mà bạn sẽ không bao giờ thấy trước.', 'decu', 'XB2', 'KH', 'TG7', 50, 'Còn hàng'),
('S13', 'War', 600000, 155000, '9781668052273_p0_v2_s600x595.jpg', 'Bob Woodward, người từng hai lần đoạt giải Pulitze', 'Bob Woodward, người từng hai lần đoạt giải Pulitzer, kể câu chuyện hậu trường, tiết lộ về ba cuộc chiến tranh—Ukraine, Trung Đông và cuộc đấu tranh giành chức Tổng thống Hoa Kỳ. Chiến tranh là một câu chuyện thân mật và bao quát về một trong những giai đoạn hỗn loạn nhất trong chính trường tổng thống và lịch sử Hoa Kỳ. Chúng ta thấy Tổng thống Joe Biden và các cố vấn hàng đầu của ông trong các cuộc trò chuyện căng thẳng với Tổng thống Nga Vladimir Putin, Thủ tướng Israel Benjamin Netanyahu và Tổng thống Ukraine Volodymyr Zelensky. Chúng ta cũng thấy Donald Trump, đang thực hiện một nhiệm kỳ tổng thống trong bóng tối và tìm cách giành lại quyền lực chính trị. Với các bản tin nội bộ vô song, Woodward cho thấy cách tiếp cận của Tổng thống Biden trong việc quản lý cuộc chiến ở Ukraine, cuộc chiến trên bộ quan trọng nhất ở châu Âu kể từ Thế chiến II và con đường đầy gian nan của ông để kiềm chế cuộc xung đột đẫm máu ở Trung Đông giữa Israel và nhóm khủng bố Hamas. Woodward tiết lộ sự phức tạp và hậu quả phi thường của hoạt động ngoại giao và ra quyết định ngầm trong thời chiến để ngăn chặn việc sử dụng vũ khí hạt nhân và sự trượt dốc nhanh chóng vào Thế chiến III. Cuộc chiến chính trị thô bạo diễn ra nhanh hơn khi người Mỹ chuẩn bị bỏ phiếu vào năm 2024, bắt đầu giữa Tổng thống Biden và Trump, và kết thúc bằng việc Phó Tổng thống Kamala Harris bất ngờ được đề cử làm ứng cử viên tổng thống của đảng Dân chủ. War cung cấp một cuộc kiểm tra không tô vẽ về phó tổng thống khi bà cố gắng nắm lấy di sản và chính sách của Biden trong khi bắt đầu vạch ra con đường của riêng mình với tư cách là ứng cử viên tổng thống. Các bài tường thuật của Woodward một lần nữa đặt ra tiêu chuẩn cho báo chí ở mức có thẩm quyền và sáng suốt nhất.', 'decu', 'XB1', 'LS', 'TG12', 50, 'Còn hàng'),
('S14', 'The Hotel Balzaar', 328000, 156000, '9781536223316_p0_v1_s600x595.jpg', 'Trong phần tiếp theo đầy khôn ngoan và kỳ diệu của', 'Trong phần tiếp theo đầy khôn ngoan và kỳ diệu của The Puppets of Spelhorst , Kate DiCamillo đã trở lại vùng đất Norendy, nơi những câu chuyện xoay quanh những câu chuyện—và mỗi khoảnh khắc đều là một câu chuyện đang được tạo nên.\r\n\r\nTại Khách sạn Balzaar, mẹ của Marta thức dậy trước khi mặt trời mọc, mặc đồng phục và hướng dẫn Marta đi lang thang theo ý muốn nhưng lặng lẽ , vô hình—như một chú chuột nhỏ. Trong khi mẹ cô dọn phòng, Marta lẻn xuống cầu thang sau đến sảnh lớn để trò chuyện với người khuân vác, nghiên cứu bức tranh vẽ đôi cánh thiên thần trên lò sưởi và xem một con mèo đuổi theo một con chuột quanh mặt đồng hồ quả lắc, trong khi vẫn mơ về sự trở về của người cha lính đã mất tích của cô. Một ngày nọ, một nữ bá tước bí ẩn với một con vẹt đến kiểm tra, hứa sẽ kể một câu chuyện—thực tế là tổng cộng bảy câu chuyện, mỗi câu chuyện sẽ được kể theo đúng thứ tự. Khi những câu chuyện diễn ra, Marta bắt đầu tự hỏi: liệu bí mật về sự mất tích của cha cô có nằm trong những câu chuyện của nữ bá tước không? Cuốn thứ hai trong bộ ba truyện ngắn gắn kết với nhau bằng bối cảnh và tâm trạng—với nét vẽ thanh lịch của Júlia Sardà— Khách sạn Balzaar khéo léo kết hợp giữa khao khát và niềm tin, soi sáng mọi góc tối.', 'decu', 'XB4', 'KA', 'TG10', 50, 'Còn hàng'),
('S15', 'How My Neighbor Stole Christmas', 250000, 79000, '9781464240942_p0_v2_s600x595.jpg', 'Mọi người dân Kringle ở ​​Kringletown đều rất háo ', 'Mọi người dân Kringle ở ​​Kringletown đều rất háo hức đón mừng Giáng sinh.Nhưng thật không may, Cole Black ở Whistler Lane lại không làm được điều đó.Trong khi những người dân đồng hương của mình trang trí thị trấn cổ kính của họ, tràn ngập những bài hát mừng và tin vui, Cole không muốn gì hơn là ngủ đông để tránh mùa đông. Nhưng kế hoạch buồn tẻ của anh đã bị phá vỡ khi kẻ thù Giáng sinh của anh, Storee Taylor, chuyển đến sống cạnh nhà để chăm sóc dì Cindy. Ngay lập tức, người hàng xóm mới biến cuộc sống của anh thành cơn ác mộng thực sự trước Giáng sinh, đặc biệt là khi cô quyết định tham gia cuộc thi Christmas Kringle của thị trấn để vinh danh Cindy. Và tuyệt hơn nữa, Storee quyết tâm giành chiến thắng.Cô ấy sẽ làm vậy khi bước qua xác chết của Cole. Với sự giúp đỡ của người bạn Max, Cole quyết định tham gia cuộc thi, để đánh bại Storee trong trò chơi của chính cô ấy bằng cách giả vờ rằng trái tim của gã quê mùa này đã lớn gấp ba lần trong mùa giải này và anh ta đã phải lòng cô gái hàng xóm. Và thật không may cho Storee, cô ấy phải đi theo sự dẫn dắt của anh ta để có cơ hội giành danh hiệu Christmas Kringle.Nhưng sự cạnh tranh không phải là thứ duy nhất nóng lên. Mối quan hệ giả tạo của Cole và Storee trở nên rất thật, và trước khi họ biết điều đó, họ đã cố gắng che giấu nó khỏi dì Cindy. Mọi thứ trở nên phức tạp, sự cạnh tranh trở nên khốc liệt, và chỉ cần một đêm duy nhất để ai đó đánh cắp tất cả…', 'decu', 'XB2', 'LM', 'TG5', 50, 'Còn hàng'),
('S16', 'Your Pasta Sucks: A (Cookbook)', 900000, 700000, '9781797237138_p0_v1_s600x595.jpg', 'Your pasta sucks, nhưng không nhất thiết phải như ', 'Your pasta sucks, nhưng không nhất thiết phải như vậy. Hãy để diễn viên hài nổi tiếng và tác giả thực thụ Matteo Lane chỉ cho bạn cách làm qua 30 công thức nấu ăn ngon và những câu chuyện cười sảng khoái .\r\n\r\nĐược sắp xếp theo những địa điểm và con người quan trọng nhất trong cuộc đời ông—từ Chicago và New York đến Rome và Sicily—cuốn sách dạy nấu ăn đầu tiên của diễn viên hài, diễn viên và hiện tượng YouTube Matteo Lane có các công thức nấu ăn bắt nguồn từ kiến ​​thức nghiêm túc về mì ống nhưng được trình bày bằng sự dí dỏm và láu lỉnh đặc trưng của ông. Lật những trang này để tìm:\r\nMột công thức trò chuyện (chắc chắn không phải là một cuộc tranh luận) với người bạn thân Nick Smith về phiên bản Mac and Cheese của họ.\r\nMột lời phàn nàn ngắn về tính hợp lệ của “alfredo” đã biến thành công thức nấu Penna alla Vodka thơm ngon.\r\nCông thức làm mì ống tự làm tuyệt vời của Matteo.\r\nRất nhiều mẹo hữu ích và thiết thực—giống như chuyên luận về cách không làm hỏng món mì ống—để bạn có thể học trong khi cười.\r\n\r\nĐối với những người hâm mộ Matteo Lane, những độc giả đang tìm kiếm góc nhìn hài hước về văn hóa Ý hoặc bất kỳ ai chỉ muốn học \"cách nấu mì ống như một người đồng tính Ý, Ireland, Mexico\",  Your Pasta Sucks sẽ làm hài lòng tất cả.\r\n\r\nSÁCH NẤU ĂN HILARIOUS CỦA NGƯỜI NỔI TIẾNG: Matteo Lane là một thế lực: Được Variety vinh danh là một trong Mười diễn viên hài đáng xem nhất, anh biểu diễn cho đám đông kín chỗ trên khắp thế giới. Trên kênh YouTube nổi tiếng của mình, Matteo hướng dẫn người xem qua các món ăn đơn giản yêu thích của mình và chiêu đãi họ bằng những câu chuyện phiếm vui nhộn. Người hâm mộ luôn yêu cầu công thức nấu ăn bằng văn bản và cuốn sách dạy\r\n\r\nnấu ăn Ý cực kỳ hài hước này sẽ trả lời cuộc gọi của họ. MỘT MỚI MỚI GIẢI TRÍ: Matteo không tự nhận mình là một chuyên gia khi nói đến nấu ăn. Anh ấy thực tế, anh ấy lộn xộn và anh ấy có một liều lượng lớn sự kiêu ngạo và quyến rũ. Đắm chìm trong những trang này giống như mời bạn thân của bạn đi ăn tối và để họ nấu một thứ gì đó hỗn loạn và tuyệt vời trong khi kể cho bạn nghe câu chuyện', 'hot', 'XB3', 'LM', 'TG13', 50, 'Còn hàng'),
('S17', 'Hope: The Autobiography', 599000, 299000, '9780593978771_p0_v3_s600x595.jpg', 'Đức Giáo hoàng Phanxicô ban đầu dự định cuốn sách ', 'Đức Giáo hoàng Phanxicô ban đầu dự định cuốn sách đặc biệt này chỉ xuất bản sau khi ngài qua đời, nhưng nhu cầu của thời đại chúng ta và Năm Thánh Hy vọng 2025 đã thúc đẩy ngài công bố di sản quý giá này ngay bây giờ.\r\n \r\nHy vọng là cuốn tự truyện đầu tiên trong lịch sử được một vị Giáo hoàng xuất bản. Được viết trong sáu năm, cuốn tự truyện hoàn chỉnh này bắt đầu từ những năm đầu của thế kỷ XX, với nguồn gốc Ý của Đức Giáo hoàng Phanxicô và cuộc di cư dũng cảm của tổ tiên ngài đến Mỹ Latinh, tiếp tục qua thời thơ ấu, những đam mê và bận tâm của tuổi trẻ, ơn gọi, cuộc sống trưởng thành và toàn bộ triều đại giáo hoàng của ngài cho đến ngày nay.\r\n \r\nKhi kể lại những ký ức của mình với sức mạnh tường thuật thân mật (không quên những đam mê cá nhân của mình), Đức Giáo hoàng Phanxicô đã giải quyết không khoan nhượng một số khoảnh khắc quan trọng trong triều đại giáo hoàng của mình và viết một cách thẳng thắn, không sợ hãi và tiên tri về một số câu hỏi quan trọng và gây tranh cãi nhất của thời đại chúng ta hiện nay: chiến tranh và hòa bình (bao gồm các cuộc xung đột ở Ukraine và Trung Đông), di cư, khủng hoảng môi trường, chính sách xã hội, vị thế của phụ nữ, tình dục, sự phát triển công nghệ, tương lai của Giáo hội và tôn giáo nói chung.\r\n \r\nHope bao gồm vô số những tiết lộ, giai thoại và suy nghĩ soi sáng. Đây là một hồi ký ly kỳ và rất nhân văn, cảm động và đôi khi buồn cười, đại diện cho \"câu chuyện của một cuộc đời\" và đồng thời, là một di chúc đạo đức và tinh thần cảm động sẽ làm say mê độc giả trên toàn thế giới và sẽ là di sản hy vọng của Đức Giáo hoàng Francis cho các thế hệ tương lai.\r\n \r\nCuốn sách được tăng cường bởi những bức ảnh đáng chú ý, bao gồm cả tài liệu riêng tư và chưa được công bố do chính Đức Giáo hoàng Francis cung cấp.', 'hot', 'XB3', 'VH', 'TG12', 50, 'Còn hàng'),
('S18', 'Cher: The Memoir, Part One', 162000, 58000, '9780062863102_p0_v3_s600x595.jpg', 'Cuộc đời phi thường của Cher chỉ có thể được kể lạ', 'Cuộc đời phi thường của Cher chỉ có thể được kể lại bởi một người... chính là Cher.\r\nSau hơn bảy mươi năm đấu tranh để sống theo cách của riêng mình, Cher cuối cùng đã tiết lộ câu chuyện có thật của mình một cách chi tiết trong cuốn hồi ký gồm hai phần.\r\n\r\nSự nghiệp đáng chú ý của bà là duy nhất và vô song. Là người phụ nữ duy nhất đứng đầu bảng xếp hạng Billboard trong bảy thập kỷ liên tiếp, bà là người chiến thắng Giải thưởng Viện hàn lâm, Giải Emmy, Giải Grammy và Giải thưởng Liên hoan phim Cannes, và là người được ghi danh vào Đại sảnh Danh vọng Rock and Roll, người được Trung tâm Kennedy ca ngợi.\r\n\r\nBà là một nhà hoạt động và nhà từ thiện lâu năm.\r\n\r\nLà một đứa trẻ mắc chứng khó đọc và mơ ước trở nên nổi tiếng, Cher lớn lên trong hoàn cảnh hỗn loạn, được bao quanh bởi các ca sĩ, diễn viên và một người mẹ đã truyền cảm hứng cho cô mặc dù mối quan hệ của họ không mấy tốt đẹp.\r\n\r\nVới sự trung thực và khiếu hài hước đặc trưng của mình , Cher: The Memoir kể lại hành trình viên kim cương thô này thành công mà không cần kế hoạch và sự tự tin thái quá để trở thành siêu sao tiên phong mà thế giới không thể bỏ qua trong hơn nửa thế kỷ.\r\n\r\nCher: The Memoir, Phần một kể về những ngày đầu phi thường của cô từ khi còn nhỏ cho đến khi gặp gỡ và kết hôn với Sonny Bono—và tiết lộ mối quan hệ vô cùng phức tạp đã giúp họ trở nên nổi tiếng thế giới, nhưng cuối cùng lại đẩy họ ra xa nhau.\r\n\r\nCher: Hồi ký tiết lộ về người con gái, người chị, người vợ, người tình, người mẹ và siêu sao.\r\n\r\nĐó là một cuộc đời quá bao la để có thể gói gọn trong một cuốn sách.', 'hot', 'XB3', 'BA', 'TG11', 5, 'Còn hàng'),
('S19', 'Sunrise on the Reaping', 599000, 355000, 'SunriseontheReaping.jpg', 'Khi bạn đã bị sắp đặt để mất đi mọi thứ mình yêu q', 'Khi ngày đầu tiên của Hunger Games lần thứ năm mươi bắt đầu, nỗi sợ hãi bao trùm các quận của Panem. Năm nay, để vinh danh Quarter Quell, số lượng vật phẩm được đưa ra khỏi nhà sẽ tăng gấp đôi.\r\n\r\nTrở lại Quận 12, Haymitch Abernathy đang cố gắng không nghĩ quá nhiều về cơ hội của mình. Tất cả những gì anh quan tâm là vượt qua ngày hôm nay và ở bên cô gái anh yêu.\r\n\r\nKhi tên của Haymitch được gọi, anh có thể cảm thấy mọi giấc mơ của mình tan vỡ. Anh bị tách khỏi gia đình và tình yêu của mình, bị đưa đến Capitol cùng với ba cống phẩm khác của Quận 12: một người bạn trẻ gần như là chị em với anh, một người cá cược bắt buộc, và là cô gái kiêu ngạo nhất trong thị trấn. Khi Thế vận hội bắt đầu, Haymitch hiểu rằng anh đã được sắp đặt để thất bại. Nhưng có điều gì đó trong anh muốn chiến đấu... và để cuộc chiến đó vang vọng xa hơn đấu trường chết chóc.', 'hot', 'XB3', 'KH', 'TG2', 50, 'Còn hàng'),
('S2', 'Great Big Beautiful Life', 700000, 299000, 'GreatBig.jpg', 'Một nữ thừa kế khó nắm bắt, một câu chuyện tình yê', '', 'xemnhieu', 'XB2', 'LM', 'TG2', 50, 'Còn hàng'),
('S20', 'Two Twisted Crowns', 450000, 150000, 'TwoTwistedCrowns.jpg', 'Bị một vị vua bạo chúa nắm giữ và bị ma thuật đen ', '. Bị một vị vua bạo chúa nắm giữ và bị ma thuật đen thống trị, vương quốc đang gặp nguy hiểm. Elspeth và Ravyn đã thu thập được hầu hết mười hai Thẻ Providence, nhưng thẻ cuối cùng—và quan trọng nhất—vẫn chưa được tìm thấy: Twin Alders. Nếu họ muốn tìm thấy thẻ trước Solstice và giải thoát vương quốc, họ sẽ cần phải đi qua khu rừng sương mù nguy hiểm. Người duy nhất có thể dẫn họ đi qua là con quái vật có chung đầu với Elspeth: Ác mộng.\r\n\r\nVà hắn không còn muốn chia sẻ nữa.\r\n\r\nLời khen ngợi cho  One Dark Window :\r\n\r\n\"Lôi cuốn từ đầu đến cuối gây sốc.\" —Hannah Whitten,  tác giả bán chạy nhất của  New York Times  về For the Wolf', 'hot', 'XB1', 'BA', 'TG8', 50, 'Còn hàng'),
('S3', 'Onyx Storm', 1000000, 399000, 'OnyxStorm.jpg', 'Cái kết gây sốc của Iron Flame khiến chúng ta chón', '', 'xemnhieu', 'XB3', 'KH', 'TG3', 50, 'Còn hàng'),
('S4', 'The Knight and the Moth', 800000, 699000, 'TheKnightandtheMoth.jpg', 'Một câu chuyện cổ tích khiến bạn mê mẩn, Rachel Gi', '', 'xemnhieu', 'XB4', 'LS', 'TG4', 50, 'Còn hàng'),
('S5', 'One Dark Window', 499000, 299000, 'OneDarkWindow.jpg', 'Tác phẩm đầu tay kỳ ảo đen tối, tươi tốt này mang ', '', 'xemnhieu', 'XB3', 'KA', 'TG5', 50, 'Còn hàng'),
('S6', 'The Mighty Red', 800000, 379000, 'TheMightyRed.jpg', 'Tác giả đoạt giải Pulitzer Louise Erdrich trở lại ', 'Lịch sử là một trận lụt. Màu đỏ hùng mạnh...\r\n\r\nTại Argus, Bắc Dakota, một nhóm người tập trung xung quanh một đám cưới đầy căng thẳng. \r\n\r\nGary Geist, một chàng trai trẻ sợ hãi sắp được thừa kế hai trang trại, vô cùng muốn kết hôn với Kismet Poe, một người đàn ông Goth bốc đồng, sa ngã, không thể đọc được tương lai của mình nhưng dường như đã quyết định được tương lai của mình. \r\n\r\nHugo, một gã khổng lồ tóc đỏ hiền lành, được học tại nhà, cũng yêu Kismet. Anh ta quyết tâm đánh cắp cô và háo hức trở thành kẻ phá hoại gia đình.  \r\n\r\nMẹ của Kismet, Crystal, vận chuyển củ cải đường cho gia đình Gary, và trong những chuyến đi đêm, bà thường nghe đài phát thanh đêm khuya, nhìn thấy hình ảnh các thiên thần hộ mệnh và lo lắng cho tương lai, của con gái bà và của chính bà.\r\n\r\nThời gian của con người, thời gian sâu thẳm, thời gian của Red River, chu kỳ bán rã của thuốc diệt cỏ và thuốc trừ sâu, và sự thanh lịch của thời gian được thể hiện trong các mẫu lõi thủy lực từ độ sâu không thể tưởng tượng được, được đặt đối lập với tốc độ của biến đổi khí hậu, sự cạn kiệt tài nguyên thiên nhiên và sự suy thoái kinh tế đột ngột của năm 2008-2009. Một chiếc váy có giá bao nhiêu? Một chiếc ô tô đã qua sử dụng? Một gói bánh quế quế? Bạn có thể thấy hình dạng của tâm hồn mình trong những đám mây luôn thay đổi không? Sự cứu rỗi cá nhân của bạn trong bầu trời rộng lớn? Đây là những câu hỏi mà người dân Thung lũng Red River ở phía Bắc phải vật lộn với mỗi ngày.\r\n\r\nThe Mighty Red là một tiểu thuyết hài hước dịu dàng, gây xáo trộn và tang tóc ảo giác. Nó nói về những nỗi đau trong công việc và sự thỏa mãn vô bờ bến, một cảnh quan hỗn loạn và việc ăn cỏ dại bản địa mọc trong sân sau nhà bạn. Nó nói về những con người bình thường mơ ước, trưởng thành, yêu đương, đấu tranh, chịu đựng bi kịch, mang trong mình những bí mật cay đắng; đàn ông và phụ nữ vừa phức tạp vừa mâu thuẫn, vừa khiếm khuyết vừa đàng hoàng, vừa cô đơn vừa hy vọng. Nó nói về một cộng đồng thảo nguyên tuyệt đẹp mà các thành viên phải đối mặt với những hậu quả tàn khốc khi những thế lực mạnh mẽ lật đổ họ. Giống như mọi cuốn sách mà bậc thầy hiện đại vĩ đại này viết, The Mighty Red nói về mối liên kết rách nát của chúng ta với trái đất, và về tình yêu trong tất cả sự phi lý và lộng lẫy của nó.', 'muanhieu', 'XB2', 'BA', 'TG3', 50, 'Còn hàng'),
('S7', 'Intermezzo', 650000, 99000, 'Intermezzo.jpg', 'Tất cả chúng ta đều bị Sally Rooney mê hoặc với tá', 'Ngoài việc là anh em, Peter và Ivan Koubek dường như có rất ít điểm chung.\r\n\r\nPeter là một luật sư ở Dublin ngoài ba mươi tuổi—thành đạt, có năng lực và dường như không thể bị tấn công. Nhưng sau cái chết của cha mình, anh phải dùng thuốc để ngủ và đấu tranh để quản lý mối quan hệ với hai người phụ nữ rất khác nhau—mối tình đầu bền bỉ của anh, Sylvia, và Naomi, một sinh viên đại học mà cuộc sống chỉ là một trò đùa dài.\r\n\r\nIvan là một kỳ thủ cờ vua chuyên nghiệp hai mươi hai tuổi. Anh luôn coi mình là người vụng về trong giao tiếp xã hội, một kẻ cô độc, trái ngược hẳn với người anh trai lắm lời của mình. Bây giờ, trong những tuần đầu của nỗi đau mất mát, Ivan gặp Margaret, một người phụ nữ lớn tuổi đang thoát khỏi quá khứ đầy biến động của chính mình, và cuộc sống của họ nhanh chóng và gắn bó chặt chẽ với nhau.\r\n\r\nĐối với hai anh em đang đau buồn và những người họ yêu thương, đây là một khoảng thời gian mới - một giai đoạn của khát khao, tuyệt vọng và khả năng; một cơ hội để tìm hiểu xem một cuộc sống có thể chứa đựng được bao nhiêu mà không bị tan vỡ.', 'muanhieu', 'XB3', 'BA', 'TG7', 50, 'Còn hàng'),
('S8', 'The Striker', 300000, 155000, 'TheStriker.jpg', 'Asher Donovan là một huyền thoại sống - cầu thủ đư', 'Nhưng những trò hề liều lĩnh và việc chuyển đội gần đây của anh đã gây ra nhiều tranh cãi, và khi mối thù của anh với đối thủ trở thành đồng đội khiến họ mất chức vô địch, họ buộc phải \"gắn kết\" trong quá trình tập luyện chéo ngoài mùa giải.\r\n\r\nSống sót qua mùa hè không phải là điều khó khăn...cho đến khi Asher gặp huấn luyện viên mới của họ. Cô ấy xinh đẹp, tài năng, và dù anh có cố gắng thế nào, anh cũng không thể rời mắt khỏi cô.\r\n\r\nVấn đề duy nhất? Cô ấy là em gái của đối thủ của anh ta—và hoàn toàn không được phép đụng tới.\r\n\r\n***\r\n\r\nScarlett DuBois là một cựu diễn viên ba lê nổi tiếng nhưng sự nghiệp của cô đã bị cắt ngắn bởi một tai nạn thương tâm.\r\n\r\nHiện là giáo viên tại một học viện khiêu vũ danh tiếng nhưng vẫn bị ám ảnh bởi những bóng ma quá khứ, điều cuối cùng cô muốn là dành cả mùa hè để huấn luyện chéo với Asher Donovan.\r\n\r\nCô ấy đã thề sẽ không bao giờ hẹn hò với một cầu thủ bóng đá, nhưng khi anh trai cô rời thị trấn vì có việc khẩn cấp, cô thấy mình bị đẩy vào tình thế nguy hiểm khi ở rất gần với chàng tiền đạo đẹp trai, quyến rũ này.\r\n\r\nTập luyện, cô ấy có thể giải quyết được. Nhưng yêu? Điều đó là không thể - đặc biệt là khi anh ấy là người duy nhất có khả năng làm tan vỡ trái tim cô ấy.', 'muanhieu', 'XB1', 'VH', 'TG8', 50, 'Còn hàng'),
('S9', 'The Fury of the Gods', 2000000, 999000, '9780316539951_p0_v4_s600x595.jpg', 'Trận chiến cuối cùng quyết định số phận của Vigrid', 'Varg đã vượt qua những thử thách trong quá khứ và trở thành thành viên được chấp nhận của Bloodsworn, nhưng giờ đây anh và những người đồng đội mới phải đối mặt với thử thách lớn nhất từ ​​trước đến nay: giết một con rồng.\r\n\r\nElvar đang đấu tranh để củng cố quyền lực của mình ở Snakavik, nơi cô phải đối mặt với những mối đe dọa từ bên ngoài và bên trong. Khi cô chiến đấu để khẳng định quyền lực của mình để sẵn sàng cho cuộc xung đột sắp tới, cô phải đối mặt với một nhiệm vụ chắc chắn là không thể vượt qua: chế ngự sự hung dữ của một vị thần sói.\r\n\r\nKhi Biórr và nhóm chiến binh của anh ta tiến về phía bắc, khao khát máu, Guðvarr theo đuổi một nhiệm vụ của riêng mình, hy vọng giành được sự ủng hộ của Lik-Rifa và thúc đẩy tham vọng của riêng mình.\r\n\r\nMọi con đường đều dẫn đến Snakavik, nơi các ranh giới đang được vạch ra cho trận chiến cuối cùng - một cuộc đụng độ khổng lồ sẽ làm rung chuyển nền tảng của thế giới và chứng kiến ​​cơn thịnh nộ thực sự của các vị thần.  ', 'muanhieu', 'XB3', 'LS', 'TG9', 50, 'Còn hàng');

-- --------------------------------------------------------

--
-- Table structure for table `tacgia`
--

CREATE TABLE `tacgia` (
  `maTG` varchar(13) NOT NULL,
  `tenTG` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tacgia`
--

INSERT INTO `tacgia` (`maTG`, `tenTG`) VALUES
('TG1', 'Freida McFadden'),
('TG10', 'Alexei Navalny'),
('TG11', 'A.F. Steadman'),
('TG12', 'Bob Woodward'),
('TG13', 'Kate DiCamillo'),
('TG2', 'Emily Henry'),
('TG3', 'Rebecca Yarros'),
('TG4', 'Rachel Gillig'),
('TG5', 'Suzanne Collins'),
('TG6', 'Louise Erdrich'),
('TG7', 'Sally Rooney'),
('TG8', 'Ana Huang'),
('TG9', 'John Gwynne');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `maTin` int(11) NOT NULL,
  `tieuDe` varchar(100) NOT NULL,
  `noiDungTomTat` varchar(250) NOT NULL,
  `noiDungDayDu` text NOT NULL,
  `anhTinTuc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`maTin`, `tieuDe`, `noiDungTomTat`, `noiDungDayDu`, `anhTinTuc`) VALUES
(1, 'Sách tranh hay nhất 2024', 'Từ những câu chuyện trước khi đi ngủ đến việc đọc sách vào ngày mưa và những cuốn sách yêu thích mà trẻ mang theo mọi lúc mọi nơi, sách tranh…', 'Từ những câu chuyện trước khi đi ngủ đến việc đọc sách vào ngày mưa và những cuốn sách yêu thích mà trẻ mang theo mọi lúc mọi nơi, sách luôn là người bạn đồng hành tuyệt vời trong tuổi thơ của mỗi người. Những trang sách mở ra thế giới đầy màu sắc, nơi các nhân vật phiêu lưu, học hỏi và trưởng thành. Trẻ em không chỉ tìm thấy sự giải trí, mà còn khám phá bài học về lòng tốt, sự dũng cảm và tình bạn. Qua từng câu chữ, trí tưởng tượng của trẻ được chắp cánh bay xa.\r\n\r\nKhi cuốn sách yêu thích được ôm vào lòng, trẻ tìm thấy sự an ủi trong những lúc buồn bã hay cô đơn. Đọc sách trở thành một hành trình cá nhân, nơi trẻ tự mình kết nối với câu chuyện và nhân vật. Những câu hỏi ngây ngô về thế giới cũng dần tìm được lời giải trong từng trang giấy. Đó là món quà tinh thần vô giá mà bất kỳ ai cũng có thể trao tặng cho một đứa trẻ.\r\n\r\nVà rồi, khi lớn lên, những cuốn sách tuổi thơ ấy vẫn mãi là những kỷ niệm đẹp trong tâm trí. Chúng không chỉ lưu giữ giấc mơ thời bé mà còn gieo mầm cho niềm đam mê học hỏi và khám phá. Từ những câu chuyện nhỏ, trẻ dần học cách viết nên câu chuyện của chính mình trong cuộc đời. Sách, vì thế, không chỉ là một món đồ vật lý, mà còn là một người bạn tâm hồn bền bỉ theo năm tháng.', 'BestBook_2024_Headers_PictureBooks.jpg'),
(2, 'Một giấc mơ thành sự thật', 'Xin chúc mừng tác giả YA đoạt giải thưởng Sách thiếu nhi và YA B&N năm 2024! Lauren Roberts chưa bao giờ có ý định viết…', 'Viết sách chắc chắn không nằm trong chương trình nghị sự của tôi khi một cô gái 18 tuổi vừa phải học đại học vừa phải làm công việc mà cô ấy thường xuyên đến muộn sau đó. Mặc dù đam mê viết lách, tôi đã cam chịu cuộc sống đọc về những thế giới khác thay vì tự tạo ra thế giới của riêng mình. Nhưng quỹ đạo cuộc đời tôi đã thay đổi chỉ sau một suy nghĩ thoáng qua: Tôi muốn viết một câu chuyện về một cô gái được bao quanh bởi những khả năng, nhưng lại không có khả năng của riêng mình. Cô ấy không phải là người được chọn. Không phải là người mạnh nhất. Nhưng, có một sức mạnh nhất định trong câu chuyện đó mà không thể bỏ qua.\r\n\r\nÝ tưởng đó nhanh chóng nở rộ thành một dự án, rồi len lỏi vào mọi suy nghĩ của tôi cho đến khi Powerless trở thành chính không khí tôi hít thở. Tôi dành từng khoảnh khắc tỉnh táo để lên kế hoạch và nghiên cứu cách người ta tạo ra thứ gì đó hữu hình (một câu chuyện tự khắc sâu vào tận đáy tâm hồn bạn) từ hư không (tâm trí thiếu kinh nghiệm của tôi, chỉ biết vài lớp tiếng Anh mà tôi đã học). Hai tuần sau khoảnh khắc kích thích đó trong phòng tắm được dành để phát triển các nhân vật, tiếp thu vô số hướng dẫn trên YouTube về cách phác thảo và khó khăn nhất là giữ im lặng về toàn bộ mọi thứ. Tôi không thể chịu đựng được ý nghĩ tuyên bố niềm đam mê của mình với thế giới chỉ để rồi nó chắc chắn chỉ là một giấc mơ viển vông. Vì vậy, tôi im lặng, cúi đầu và quyết tâm theo đuổi câu chuyện này đến cùng.', 'powerless.jpg'),
(3, 'Sách dành cho độc giả trẻ hay nhất 2024', 'Điều gì làm nên một cuốn sách tuyệt vời cho độc giả trẻ? Hành động, hài hước và tình cảm, trước hết, và dòng sách này có tất cả.…', 'Điều gì làm nên một cuốn sách dành cho độc giả trẻ tuyệt vời? Hành động, hài hước và tình cảm, để bắt đầu, và dòng sách này có tất cả. Từ những nhân vật mà chúng ta luôn yêu thích (Greg Heffley và Percy Jackson, chúng ta sẽ đọc về bạn bất cứ lúc nào, bất cứ nơi đâu) cho đến những nhân vật mà chúng ta cảm thấy như những người bạn thân mới của mình, năm nay đã tràn ngập những câu chuyện đáng kinh ngạc. Sau đây là những cuốn sách dành cho độc giả trẻ hay nhất năm 2024.', 'YoungReaders.jpg'),
(4, 'Thế giới kỳ diệu', 'Nếu bạn từng bị thu hút bởi những điều kỳ diệu của mặt trăng, cuốn sách này dành cho bạn. Một học viện u ám đầy không khí…', 'Nếu bạn đã từng bị thu hút bởi những điều kỳ diệu của mặt trăng, thì cuốn sách này là dành cho bạn. Một câu chuyện giả tưởng hàn lâm đen tối lấy bối cảnh tại Aldryn College for Lunar Magics danh giá, Lựa chọn hàng tháng dành cho thanh thiếu niên của chúng tôi là một câu chuyện tuyệt vời. Khám phá phép thuật đằng sau hậu trường của Curious Tides trong bài đăng của khách mời Pascale Lacelle bên dưới.\r\nCurious Tides  phần lớn lấy cảm hứng từ tình yêu của tôi dành cho những cuốn sách viễn tưởng về cổng thông tin như  The Starless Sea ,  The Ten Thousand Doors of January và  The Magicians . Có điều gì đó vô cùng hấp dẫn về các nhân vật khám phá ra thế giới kỳ diệu mà họ chưa từng nghĩ là có thể tồn tại, đặc biệt là khi đó là điều họ đã đọc trong sách.\r\n\r\nTôi đặc biệt bị thu hút bởi bối cảnh học thuật của  The Magicians  và những tác phẩm học thuật đen tối khác như  Ninth House . Đối với  Curious Tides , tôi đã nghĩ đến bối cảnh bên bờ biển này—cụ thể hơn, một ngôi trường nơi học sinh liên tục biến mất trong các hang động bí ẩn trên biển, bị thủy triều nuốt chửng. Và vì thủy triều có liên hệ mật thiết với mặt trăng, nên việc những học sinh này sử dụng phép thuật chịu ảnh hưởng của cả hai là điều hợp lý. Đó là cách  hệ thống phép thuật của Curious Tides —các ngôi nhà mặt trăng thiêng liêng và sự liên kết thủy triều của chúng—ra đời.', 'Curious.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD KEY `maHD` (`maHD`),
  ADD KEY `maSach` (`maSach`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`maHD`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `loaisach`
--
ALTER TABLE `loaisach`
  ADD PRIMARY KEY (`maLoai`);

--
-- Indexes for table `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  ADD PRIMARY KEY (`maNXB`);

--
-- Indexes for table `roleadminuser`
--
ALTER TABLE `roleadminuser`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`maSach`),
  ADD KEY `sach_ibfk_1` (`maLoai`),
  ADD KEY `sach_ibfk_2` (`maNXB`),
  ADD KEY `sach_ibfk_3` (`maTG`);

--
-- Indexes for table `tacgia`
--
ALTER TABLE `tacgia`
  ADD PRIMARY KEY (`maTG`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`maTin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `maTin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`maHD`) REFERENCES `hoadon` (`maHD`) ON UPDATE CASCADE,
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`maSach`) REFERENCES `sach` (`maSach`) ON UPDATE CASCADE;

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`email`) REFERENCES `roleadminuser` (`email`) ON UPDATE CASCADE;

--
-- Constraints for table `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`maLoai`) REFERENCES `loaisach` (`maLoai`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sach_ibfk_2` FOREIGN KEY (`maNXB`) REFERENCES `nhaxuatban` (`maNXB`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sach_ibfk_3` FOREIGN KEY (`maTG`) REFERENCES `tacgia` (`maTG`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
