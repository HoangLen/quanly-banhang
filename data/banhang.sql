-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2022 at 01:19 AM
-- Server version: 5.7.25
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendanhmuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendanhmuc`) VALUES
(1, 'Fast Food'),
(2, 'Drink'),
(3, 'Ice cream'),
(4, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `diachi`
--

CREATE TABLE `diachi` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `macdinh` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diachi`
--

INSERT INTO `diachi` (`id`, `nguoidung_id`, `diachi`, `macdinh`) VALUES
(1, 27, 'An Giang', 1),
(2, 27, 'Vũng Tàu', 1),
(7, 27, 'Chau doc', 1),
(16, 27, 'Sóc Trăng', 1),
(17, 27, 'Cao Bằng', 1),
(19, 27, 'Tịnh Biên', 1),
(20, 28, 'Trà Vinh', 1),
(21, 29, 'xã Nhơn Mỹ, huyện Chợ Mới, tỉnh An Giang', 1),
(22, 29, 'ấp Mỹ Thành, huyện Chợ Mới, tỉnh An Giang', 1),
(23, 30, 'Tân Phú', 1),
(24, 30, 'Long Điền A', 1),
(25, 34, 'Tây Ninh', 1),
(26, 35, 'ádasd', 1),
(27, 36, 'Long Xuyên', 1);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `diachi_id` int(11) NOT NULL,
  `ngay` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tongtien` int(11) NOT NULL,
  `ghichu` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `nguoidung_id`, `diachi_id`, `ngay`, `tongtien`, `ghichu`) VALUES
(17, 27, 17, '2022-04-18 12:34:59', 90000, 2),
(19, 27, 19, '2022-04-18 12:36:05', 20000, 2),
(20, 28, 20, '2022-04-18 12:40:43', 17000, 0),
(21, 29, 21, '2022-04-20 07:37:24', 15000, 1),
(22, 29, 22, '2022-04-20 07:42:06', 51000, 0),
(23, 29, 22, '2022-04-20 07:45:52', 67000, 0),
(24, 30, 23, '2022-04-25 21:20:20', 45000, 0),
(25, 30, 24, '2022-04-25 21:23:58', 147000, 2),
(26, 30, 24, '2022-04-25 21:24:22', 17000, 0),
(27, 34, 25, '2022-04-28 15:19:34', 545000, 1),
(28, 35, 26, '2022-04-28 15:25:31', 60000, 0),
(29, 36, 27, '2022-05-10 07:58:15', 135000, 2),
(30, 36, 27, '2022-05-11 09:10:53', 76000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `donhangct`
--

CREATE TABLE `donhangct` (
  `id` int(11) NOT NULL,
  `donhang_id` int(11) NOT NULL,
  `mathang_id` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donhangct`
--

INSERT INTO `donhangct` (`id`, `donhang_id`, `mathang_id`, `dongia`, `soluong`, `thanhtien`) VALUES
(20, 17, 23, 15000, 1, 15000),
(21, 17, 31, 15000, 3, 45000),
(22, 17, 5, 15000, 2, 30000),
(24, 19, 18, 20000, 1, 20000),
(25, 20, 16, 17000, 1, 17000),
(26, 21, 31, 15000, 1, 15000),
(27, 22, 25, 17000, 3, 51000),
(28, 23, 21, 25000, 2, 50000),
(29, 23, 11, 17000, 1, 17000),
(30, 24, 31, 15000, 3, 45000),
(31, 25, 25, 17000, 1, 17000),
(32, 25, 5, 15000, 2, 30000),
(33, 25, 21, 25000, 2, 50000),
(34, 25, 19, 25000, 2, 50000),
(35, 26, 15, 17000, 1, 17000),
(36, 27, 31, 15000, 3, 45000),
(37, 27, 29, 45000, 1, 45000),
(38, 27, 28, 45000, 2, 90000),
(39, 27, 30, 60000, 2, 120000),
(40, 27, 18, 20000, 10, 200000),
(41, 27, 4, 15000, 3, 45000),
(42, 28, 30, 60000, 1, 60000),
(43, 29, 30, 60000, 2, 120000),
(44, 29, 31, 15000, 1, 15000),
(45, 30, 15, 17000, 2, 34000),
(46, 30, 21, 25000, 1, 25000),
(47, 30, 25, 17000, 1, 17000);

-- --------------------------------------------------------

--
-- Table structure for table `donhangct_khachle`
--

CREATE TABLE `donhangct_khachle` (
  `id` int(11) NOT NULL,
  `donhangkhachle_id` int(11) NOT NULL,
  `mathang_id` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donhangct_khachle`
--

INSERT INTO `donhangct_khachle` (`id`, `donhangkhachle_id`, `mathang_id`, `dongia`, `soluong`, `thanhtien`) VALUES
(7, 18, 28, 45000, 1, 45000),
(8, 19, 4, 15000, 2, 30000),
(9, 20, 29, 45000, 1, 45000),
(10, 21, 28, 45000, 1, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `donhang_khachle`
--

CREATE TABLE `donhang_khachle` (
  `id` int(11) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `ngay` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tongtien` int(11) NOT NULL,
  `ghichu` tinyint(4) NOT NULL DEFAULT '0',
  `hoten` varchar(255) DEFAULT NULL,
  `sdt` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donhang_khachle`
--

INSERT INTO `donhang_khachle` (`id`, `diachi`, `ngay`, `tongtien`, `ghichu`, `hoten`, `sdt`) VALUES
(18, 'Ở môt nơi xa xôi nào đó', '2022-05-19 18:57:25', 45000, 1, 'Nguyễn Văn A', '0678594543'),
(19, 'Nhơn Mỹ ', '2022-05-20 07:50:58', 30000, 1, 'Trần B', '0368586983'),
(20, 'Long Xuyen', '2022-05-24 08:00:00', 45000, 1, 'Huy', '0352392757'),
(21, 'An Giang', '2022-05-24 08:00:31', 45000, 0, 'Khanh', '0357685964');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `ngay` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id`, `nguoidung_id`, `ngay`, `tongtien`) VALUES
(6, 1, '2022-04-13 15:42:22', 45000),
(7, 1, '2022-04-13 15:48:31', 45000),
(8, 1, '2022-04-13 22:41:55', 80000),
(9, 1, '2022-04-14 00:08:08', 230000),
(10, 1, '2022-04-14 06:48:57', 80000),
(11, 1, '2022-04-14 08:36:18', 47000),
(12, 1, '2022-04-18 12:33:27', 219000),
(13, 24, '2022-04-19 11:49:10', 109000),
(14, 24, '2022-04-19 11:53:04', 25000),
(15, 24, '2022-04-19 11:56:22', 49000),
(16, 1, '2022-04-20 08:03:16', 80000),
(17, 1, '2022-04-21 08:35:24', 17000),
(18, 1, '2022-04-25 21:31:03', 280000),
(19, 17, '2022-05-10 08:37:47', 85000),
(20, 17, '2022-05-17 09:28:50', 85000);

-- --------------------------------------------------------

--
-- Table structure for table `hoadonct`
--

CREATE TABLE `hoadonct` (
  `id` int(11) NOT NULL,
  `hoadon_id` int(11) NOT NULL,
  `mathang_id` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoadonct`
--

INSERT INTO `hoadonct` (`id`, `hoadon_id`, `mathang_id`, `dongia`, `soluong`, `thanhtien`) VALUES
(8, 6, 5, 15000, 1, 15000),
(9, 6, 10, 30000, 1, 30000),
(10, 7, 5, 15000, 1, 15000),
(11, 7, 4, 15000, 2, 30000),
(12, 8, 8, 25000, 2, 50000),
(13, 8, 10, 30000, 1, 30000),
(14, 9, 18, 20000, 3, 60000),
(15, 9, 17, 25000, 2, 50000),
(16, 9, 29, 40000, 3, 120000),
(17, 10, 15, 15000, 1, 15000),
(18, 10, 25, 15000, 1, 15000),
(19, 10, 18, 20000, 1, 20000),
(20, 10, 5, 15000, 2, 30000),
(21, 11, 15, 17000, 1, 17000),
(22, 11, 25, 15000, 2, 30000),
(23, 12, 15, 17000, 2, 34000),
(24, 12, 17, 25000, 2, 50000),
(25, 12, 29, 45000, 3, 135000),
(26, 13, 15, 17000, 2, 34000),
(27, 13, 19, 25000, 3, 75000),
(28, 14, 17, 25000, 1, 25000),
(29, 15, 4, 15000, 1, 15000),
(30, 15, 14, 17000, 2, 34000),
(31, 16, 21, 25000, 2, 50000),
(32, 16, 10, 30000, 1, 30000),
(33, 17, 15, 17000, 1, 17000),
(34, 18, 28, 45000, 2, 90000),
(35, 18, 10, 30000, 1, 30000),
(36, 18, 19, 25000, 3, 75000),
(37, 18, 17, 25000, 1, 25000),
(38, 18, 23, 15000, 4, 60000),
(39, 19, 15, 17000, 2, 34000),
(40, 19, 25, 17000, 3, 51000),
(41, 20, 15, 17000, 2, 34000),
(42, 20, 25, 17000, 3, 51000);

-- --------------------------------------------------------

--
-- Table structure for table `mathang`
--

CREATE TABLE `mathang` (
  `id` int(11) NOT NULL,
  `tenmathang` varchar(255) NOT NULL,
  `mota` varchar(255) DEFAULT NULL,
  `gia` int(11) NOT NULL DEFAULT '0',
  `soluongton` int(11) DEFAULT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `luotxem` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mathang`
--

INSERT INTO `mathang` (`id`, `tenmathang`, `mota`, `gia`, `soluongton`, `hinhanh`, `danhmuc_id`, `luotxem`) VALUES
(4, 'Ô lông', '1 chai + 1 tẩy', 15000, NULL, 'img/olong.jpg', 2, 34),
(5, 'Chocolate', 'Kem được giữ lanh trong tủ đông, 1 ly', 15000, NULL, 'img/chocolate.jpg', 3, 5),
(7, 'Áo phao', 'Áo phao dành cho trẻ em, giúp phụ huynh yên tâm trong việc trông trừng trẻ nhỏ', 50000, NULL, 'img/aophao.jpg', 4, 6),
(8, 'Ốc', 'Kem được giữ lạnh trong tủ đông, 1 cây', 25000, NULL, 'img/oc.png', 3, 21),
(9, 'Dưa hấu', 'Mát lạnh, bổ rẻ', 10000, NULL, 'img/duahau.jpg', 3, 39),
(10, 'Mỳ xào hải sản', 'Bao gồm 1 phần tôm, 1 phần mực và rau cải', 30000, NULL, 'img/myxaohaisan.jpg', 1, 11),
(11, 'Nước cam Twister', '1 chai + 1 tẩy', 17000, NULL, 'img/cam.jpg', 2, 0),
(12, 'Sting', '1 chai + 1 tẩy', 15000, NULL, 'img/sting.jpg', 2, 0),
(14, 'Rivive', '1 chai + 1 tẩy', 17000, NULL, 'img/rivive.jpg', 2, 1),
(15, '7 Up', '1 chai + 1 tẩy', 17000, NULL, 'img/7up.jpg', 2, 0),
(16, 'Rivive chanh muối', '1 chai + 1 tẩy', 17000, NULL, 'img/rivive_chanhmuoi.jpg', 2, 0),
(17, 'Cafe', '1 tách cà phê pha nóng', 25000, NULL, 'img/cafe.jpg', 2, 0),
(18, 'Cacao sữa đá', 'Thành phần gồm bột cacao + sữa đặc', 20000, NULL, 'img/cacao.jpg', 2, 0),
(19, 'Trà đào', '1 ly 500ml ', 25000, NULL, 'img/tradao.jpg', 2, 0),
(20, 'Trà sữa', 'Trà sữa + trân châu đen/trắng', 30000, NULL, 'img/trasua.jpg', 1, 0),
(21, 'Kimbap chiên', '1 cuộn kimbap', 25000, NULL, 'img/kimbap.jpg', 1, 0),
(22, 'Pizza Xúc xích', '1 đế pizza + xúc xích ', 40000, NULL, 'img/pizza_xx.jpg', 1, 0),
(23, 'Cá viên chiên', '1 que ', 15000, NULL, 'img/cavien.jpg', 1, 0),
(24, 'Xúc xích chiên', '1 cây', 15000, NULL, 'img/xucxich.jpg', 1, 0),
(25, 'Bò viên chiên', '1 phần 6 viên', 17000, NULL, 'img/bovien.jpg', 1, 0),
(26, 'Ốc nhồi chiên', '1 que', 15000, NULL, 'img/ocnhoi.jpg', 1, 0),
(27, 'Súng nước 2 nòng', '1 cây', 55000, NULL, 'img/sungnuoc.jpg', 4, 1),
(28, 'Súng 1 nòng', '1 cây', 45000, NULL, 'img/sung.jpg', 4, 46),
(29, 'Kính bơi', '1 cái', 45000, NULL, 'img/kinhboi.jpg', 4, 0),
(30, 'Quần bơi', '1 cái (Full size)', 60000, NULL, 'img/quanboi.jpg', 4, 2),
(31, 'Túi chống nước', '1 cái', 15000, NULL, 'img/tui.jpg', 4, 21);

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `sdt` varchar(10) DEFAULT NULL,
  `loai` tinyint(4) NOT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT '1',
  `hinhanh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `hoten`, `email`, `matkhau`, `sdt`, `loai`, `trangthai`, `hinhanh`) VALUES
(1, 'Lê Ngọc Hải Châu', 'lnhchau@gmail.com', 'fda6b0f2d14c2dbfa04bf16f25f10446', '0788847301', 1, 1, 'woman.png'),
(17, 'Lại Hoàng Lên ', 'lhlen@gmail.com', '2e31dce4950e0e0434824feb323a519a', '0352392757', 2, 1, 'man.png'),
(24, 'Nhân viên quầy nước', 'quaynuoc@gmail.com', '2407b1e5c3f4146674f89cf481f9f98f', '0362098909', 2, 1, NULL),
(25, 'Nhân viên Fast Food', 'fastfood@gmail.com', 'e314b72ecaa14263359fa8166d20b903', '0326661114', 2, 1, NULL),
(26, 'Nhân viên siêu thị', 'sieuthi@gmail.com', '4de436f81961572debe9fa07fc7c2e39', '0785111222', 2, 1, NULL),
(27, 'QWE', 'qwe@gmail.com', '76d80224611fc919a5d54f0ff9fba446', '0873459459', 3, 1, NULL),
(28, 'ABC', 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '0363777888', 3, 1, NULL),
(29, 'Trần Nghĩa', 'trannghia@gmail.com', '94ec2448eb8f1b3d1b538af0382fac70', '0987656123', 3, 1, NULL),
(30, 'Trần Văn B', 'tranvanb@gmail.com', '7e760a87dcf61e89dd87d345c83673f2', '0989585757', 3, 1, 'hacker.png'),
(31, 'Nguyễn Hoàng Luân', 'hoangluanmusic@gmail.com', '202cb962ac59075b964b07152d234b70', '0356977899', 2, 1, NULL),
(32, 'Nguyễn Văn Tí', 'nguyenvanti@gmail.com', '9a2a12737f3f3e499f0fe9e81a99f081', '036586959', 2, 1, NULL),
(33, 'Trần Khanh', 'trankhanh@gmail.com', '93d0d2e516e99c51475e5a9f5cb31e09', '0769667887', 3, 1, NULL),
(34, 'Nguyễn Văn Tèo', 'nguyenvanteo@gmail.com', '124bd1296bec0d9d93c7b52a71ad8d5b', '0123456', 3, 1, NULL),
(35, 'Nguyễn Văn', 'nguyenvanteo@gmail.com', '0e8bb007b6a3690feb0aafe051110cb5', '0424242', 3, 1, NULL),
(36, 'Trần Huy', 'tranhuy@gmail.com', 'fb52093b7a1644c3ad00c92743b5152c', '012345', 3, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diachi`
--
ALTER TABLE `diachi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoidung_id` (`nguoidung_id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoidung_id` (`nguoidung_id`),
  ADD KEY `diachi_id` (`diachi_id`);

--
-- Indexes for table `donhangct`
--
ALTER TABLE `donhangct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donhang_id` (`donhang_id`),
  ADD KEY `mathang_id` (`mathang_id`);

--
-- Indexes for table `donhangct_khachle`
--
ALTER TABLE `donhangct_khachle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donhangkhachle_id` (`donhangkhachle_id`),
  ADD KEY `mathang_id` (`mathang_id`);

--
-- Indexes for table `donhang_khachle`
--
ALTER TABLE `donhang_khachle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoidung_id` (`nguoidung_id`);

--
-- Indexes for table `hoadonct`
--
ALTER TABLE `hoadonct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoadon_id` (`hoadon_id`),
  ADD KEY `mathang_id` (`mathang_id`);

--
-- Indexes for table `mathang`
--
ALTER TABLE `mathang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhmuc_id` (`danhmuc_id`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `diachi`
--
ALTER TABLE `diachi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `donhangct`
--
ALTER TABLE `donhangct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `donhangct_khachle`
--
ALTER TABLE `donhangct_khachle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `donhang_khachle`
--
ALTER TABLE `donhang_khachle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `hoadonct`
--
ALTER TABLE `hoadonct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `mathang`
--
ALTER TABLE `mathang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diachi`
--
ALTER TABLE `diachi`
  ADD CONSTRAINT `diachi_ibfk_1` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`diachi_id`) REFERENCES `diachi` (`id`);

--
-- Constraints for table `donhangct`
--
ALTER TABLE `donhangct`
  ADD CONSTRAINT `donhangct_ibfk_1` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`),
  ADD CONSTRAINT `donhangct_ibfk_2` FOREIGN KEY (`mathang_id`) REFERENCES `mathang` (`id`);

--
-- Constraints for table `donhangct_khachle`
--
ALTER TABLE `donhangct_khachle`
  ADD CONSTRAINT `donhangct_khachle_ibfk_1` FOREIGN KEY (`mathang_id`) REFERENCES `mathang` (`id`),
  ADD CONSTRAINT `donhangct_khachle_ibfk_2` FOREIGN KEY (`donhangkhachle_id`) REFERENCES `donhang_khachle` (`id`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`);

--
-- Constraints for table `hoadonct`
--
ALTER TABLE `hoadonct`
  ADD CONSTRAINT `hoadonct_ibfk_1` FOREIGN KEY (`hoadon_id`) REFERENCES `hoadon` (`id`),
  ADD CONSTRAINT `hoadonct_ibfk_2` FOREIGN KEY (`mathang_id`) REFERENCES `mathang` (`id`);

--
-- Constraints for table `mathang`
--
ALTER TABLE `mathang`
  ADD CONSTRAINT `mathang_ibfk_1` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
