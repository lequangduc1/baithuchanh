-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 25, 2020 lúc 04:30 PM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbxemay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `IDAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `tendangnhap` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `thaydoimatkhau` varchar(50) NOT NULL,
  PRIMARY KEY (`IDAdmin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`IDAdmin`, `tendangnhap`, `matkhau`, `thaydoimatkhau`) VALUES
(2, 'sinhvienstu', '202cb962ac59075b964b07152d234b70', 'ongbagiataolohet');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bophan`
--

DROP TABLE IF EXISTS `bophan`;
CREATE TABLE IF NOT EXISTS `bophan` (
  `MaBP` int(11) NOT NULL AUTO_INCREMENT,
  `TenBP` varchar(255) NOT NULL,
  PRIMARY KEY (`MaBP`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bophan`
--

INSERT INTO `bophan` (`MaBP`, `TenBP`) VALUES
(1, 'tintuc'),
(4, 'sanpham'),
(6, 'khachhang'),
(7, 'nhanvien'),
(8, 'donhang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

DROP TABLE IF EXISTS `chitietdonhang`;
CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `MaDH` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `Gia` int(11) NOT NULL,
  `SoLuongMua` int(11) NOT NULL,
  PRIMARY KEY (`MaDH`,`MaSP`),
  KEY `MaSP` (`MaSP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaDH`, `MaSP`, `Gia`, `SoLuongMua`) VALUES
(24, 21, 88800000, 1),
(24, 23, 17790000, 2),
(24, 24, 949000000, 2),
(25, 20, 41190000, 1),
(25, 21, 88800000, 1),
(25, 25, 48990000, 1),
(26, 21, 88800000, 2),
(26, 22, 21690000, 2),
(26, 23, 17790000, 1),
(26, 29, 10000, 1),
(27, 49, 159000000, 1),
(28, 21, 88800000, 1),
(29, 20, 41190000, 3),
(29, 21, 88800000, 2),
(29, 22, 21690000, 1),
(30, 23, 17790000, 1),
(31, 20, 41190000, 1),
(32, 22, 21690000, 2),
(32, 50, 159900000, 1),
(33, 20, 41190000, 1),
(33, 24, 949000000, 1),
(34, 20, 41190000, 3),
(35, 22, 21690000, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietgiohang`
--

DROP TABLE IF EXISTS `chitietgiohang`;
CREATE TABLE IF NOT EXISTS `chitietgiohang` (
  `MaCTGH` int(11) NOT NULL AUTO_INCREMENT,
  `GiaBan` int(11) NOT NULL,
  `SoLuongMua` int(11) NOT NULL,
  `MaGH` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  PRIMARY KEY (`MaCTGH`),
  KEY `MaSP` (`MaSP`),
  KEY `MaGH` (`MaGH`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitietgiohang`
--

INSERT INTO `chitietgiohang` (`MaCTGH`, `GiaBan`, `SoLuongMua`, `MaGH`, `MaSP`) VALUES
(52, 10000, 6, 10, 29);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `MaDH` int(11) NOT NULL AUTO_INCREMENT,
  `TrangThaiDH` int(11) NOT NULL,
  `NgayGiaoHang` date NOT NULL,
  `SDTNguoiNhan` int(11) NOT NULL,
  `DiaChiNguoiNhan` varchar(50) NOT NULL,
  `TenNguoiNhan` varchar(50) NOT NULL,
  `NgayGioDatHang` datetime NOT NULL,
  `EmailNguoiDat` varchar(255) NOT NULL,
  `TongTien` int(11) NOT NULL,
  PRIMARY KEY (`MaDH`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDH`, `TrangThaiDH`, `NgayGiaoHang`, `SDTNguoiNhan`, `DiaChiNguoiNhan`, `TenNguoiNhan`, `NgayGioDatHang`, `EmailNguoiDat`, `TongTien`) VALUES
(24, -1, '2020-12-14', 113, '23 chấn hưng', 'lê quang đức', '2020-12-14 16:53:49', 'ducdiduc761311@gmail.com', 2022380000),
(25, 2, '2020-12-14', 113, '23 chấn hưng', 'lê quang đức', '2020-12-14 17:52:57', 'ducdiduc761311@gmail.com', 178980000),
(26, -1, '2020-12-14', 113, '23 chấn hưng', 'lê quang đức', '2020-12-14 18:39:14', 'ducdiduc761311@gmail.com', 238780000),
(27, 2, '2020-12-17', 113, '23 chấn hưng', 'lê quang đức', '2020-12-17 21:48:16', 'ducdiduc761311@gmail.com', 159000000),
(28, 2, '2020-12-17', 113, '23 chấn hưng', 'lê quang đức', '2020-12-17 22:30:15', 'ducdiduc761311@gmail.com', 88800000),
(29, 2, '2020-12-17', 123456789, '23 chấn hưng', 'lê quang đức', '2020-12-17 23:52:22', 'lientran121117@gmail.com', 322860000),
(30, -1, '2020-12-17', 123456789, '23 chấn hưng', 'lê quang đức', '2020-12-18 00:17:00', 'lientran121117@gmail.com', 17790000),
(31, -1, '2020-12-17', 123456789, '23 chấn hưng', 'lê quang đức', '2020-12-18 00:22:10', 'lientran121117@gmail.com', 41190000),
(32, 2, '2020-12-17', 123456789, '23 chấn hưng', 'lê quang đức', '2020-12-18 01:06:52', 'lientran121117@gmail.com', 203280000),
(33, 2, '2020-12-19', 113, '23 chấn hưng', 'lê quang đức', '2020-12-19 09:06:21', 'ducdiduc761311@gmail.com', 990190000),
(34, 0, '2020-12-19', 909555666, '122 le quan duc', 'le quang duc', '2020-12-19 10:20:44', 'ducdiduc@gmail.com', 123570000),
(35, 0, '2020-12-19', 909555666, '122 le quan duc', 'le quang duc', '2020-12-19 10:44:45', 'ducdiduc@gmail.com', 130140000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

DROP TABLE IF EXISTS `giohang`;
CREATE TABLE IF NOT EXISTS `giohang` (
  `MaGH` int(11) NOT NULL AUTO_INCREMENT,
  `MaKH` int(11) NOT NULL,
  PRIMARY KEY (`MaGH`),
  KEY `MaKH` (`MaKH`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`MaGH`, `MaKH`) VALUES
(5, 13),
(4, 14),
(8, 15),
(9, 16),
(10, 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangxe`
--

DROP TABLE IF EXISTS `hangxe`;
CREATE TABLE IF NOT EXISTS `hangxe` (
  `HangXe` varchar(255) NOT NULL,
  PRIMARY KEY (`HangXe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hangxe`
--

INSERT INTO `hangxe` (`HangXe`) VALUES
('Ducati'),
('HonDa'),
('Kawasaki'),
('Piaggio'),
('Suzuki'),
('Yamaha');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `MaKH` int(11) NOT NULL AUTO_INCREMENT,
  `TenKH` varchar(50) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `SDT` int(11) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `TrangThai` int(11) NOT NULL,
  PRIMARY KEY (`MaKH`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `DiaChi`, `Email`, `SDT`, `MatKhau`, `TrangThai`) VALUES
(13, 'lê quang đức', '23 chấn hưng', 'ducdiduc761311@gmail.com', 113, '202cb962ac59075b964b07152d234b70', 1),
(14, 'lê quang đức', '23 chấn hưng', 'dh51703293@student.stu.edu.vn', 113, '73278a4a86960eeb576a8fd4c9ec6997', 1),
(15, 'lê quang đức', '23 chấn hưng', 'duc761311@gmail.com', 113, '73278a4a86960eeb576a8fd4c9ec6997', 1),
(16, 'lê quang đức', '23 chấn hưng', 'lientran121117@gmail.com', 123456789, '202cb962ac59075b964b07152d234b70', 1),
(17, 'le quang duc', '122 le quan duc', 'ducdiduc@gmail.com', 909555666, 'e10adc3949ba59abbe56e057f20f883e', 1),
(18, 'lê quang đức', '23 chấn hưng', 'ducdiduc2@gmail.com', 1, '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

DROP TABLE IF EXISTS `nhanvien`;
CREATE TABLE IF NOT EXISTS `nhanvien` (
  `MaNV` int(11) NOT NULL AUTO_INCREMENT,
  `TenDangNhap` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `TenNV` varchar(255) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `SDT` int(11) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `MaBP` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL,
  PRIMARY KEY (`MaNV`),
  KEY `MaBP` (`MaBP`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `TenDangNhap`, `MatKhau`, `TenNV`, `DiaChi`, `SDT`, `Email`, `MaBP`, `TrangThai`) VALUES
(1, 'nhanvien1', '202cb962ac59075b964b07152d234b70', 'lê văn tèo', 'quân khu 7', 113, 'ducdiduc761311@gmail.com', 1, 1),
(2, 'nhanvien2', '202cb962ac59075b964b07152d234b70', 'phan văn tài em', '180 cao lỗ', 113, 'dh51703293@student.stu.edu.vn', 4, 1),
(3, 'nhanvien3', '202cb962ac59075b964b07152d234b70', 'lê đức', '23 chấn hưng', 113, 'duc761311@gmail.com', 1, 1),
(4, 'nhanvien4', '202cb962ac59075b964b07152d234b70', 'lùi văn heo', '120 trần nhân tôn p.2 q.10', 999, 'dh51703293@student.stu.edu.vnn', 8, 1),
(5, 'nhanvientintuc', '202cb962ac59075b964b07152d234b70', 'duc', '23 chấn hưng', 123, 'duc1@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `MaSP` int(11) NOT NULL AUTO_INCREMENT,
  `TenSP` varchar(255) NOT NULL,
  `NoiDungMoTa` varchar(1000) NOT NULL,
  `HinhAnh` varchar(255) NOT NULL,
  `Gia` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `HangXe` varchar(255) NOT NULL,
  PRIMARY KEY (`MaSP`),
  KEY `HangXe` (`HangXe`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `NoiDungMoTa`, `HinhAnh`, `Gia`, `SoLuong`, `HangXe`) VALUES
(20, 'Air Blade 125/150', 'xe đẹp', 'honda1.png', 41190000, 1, 'HonDa'),
(21, 'Blade 110', 'đẹp', 'piaggio2.jpg', 90000000, 494, 'Ducati'),
(22, 'Wave RSX FI 110', 'quá đẹp', 'honda3.png', 21690000, 1, 'HonDa'),
(23, 'Wave Alpha 110cc', 'đẹp', 'honda4.jpg', 17790000, 5, 'HonDa'),
(24, 'CBR1000RR-R', 'mota', 'honda5.png', 949000000, 6, 'HonDa'),
(25, 'EXCITER 150', 'xe côn', 'yamaha1.png', 48990000, 10, 'Yamaha'),
(29, 'EXCITER 150', 'ádads', 'sym2.jfif', 10000, 1, 'Ducati'),
(32, 'EXCITER 150 GIỚI HẠN', 'Loại	4 thì, 4 van, SOHC, làm mát bằng dung dịch\r\nBố trí xi lanh: Xy lanh đơn\r\nDung tích xy lanh (CC): 150\r\nĐường kính và hành trình piston	57.0 x 58.7 mm\r\nTỷ số nén	10.4:1\r\nCông suất tối đa	11,3 kW (15,4 PS) / 8.500 vòng/phút\r\nMô men cực đại	13,8 N·m (1,4 kgf·m) / 7.000 vòng/phút\r\nHệ thống khởi động	Điện\r\nHệ thống bôi trơn	Cácte ướt\r\nDung tích dầu máy	1,15 lít\r\nDung tích bình xăng	4,2 lít\r\nMức tiêu thụ nhiên liệu (l/100km)	2 l/100km\r\nBộ chế hòa khí	Phun xăng (1 vòi phun)\r\nHệ thống đánh lửa	T.C.I (kỹ thuật số)\r\nTỷ số truyền sơ cấp và thứ cấp	3,042 (73/24) / 3,000 (42/14)\r\nHệ thống ly hợp	Đa đĩa loại ướt\r\nTỷ số truyền động	1: 2.833 / 2: 1.875 / 3: 1.429 / 4: 1.143 / 5: 0.957\r\nKiểu hệ thống truyền lực	5 số', 'Exciter-Blue-Orange-004-1.png', 47990000, 10, 'Yamaha'),
(33, 'EXCITER 150 MONSTER ENERGY', 'Loại	4 thì, 4 van, SOHC, làm mát bằng dung dịch\r\nBố trí xi lanh	Xy lanh đơn\r\nDung tích xy lanh (CC)	150 cc\r\nĐường kính và hành trình piston	57 x 58,7 mm\r\nTỷ số nén	10,4:1\r\nCông suất tối đa	11,3 kW (15,4 PS) / 8.500 vòng/phút\r\nMô men cực đại	13,8 N·m (1,4 kgf·m) / 7.000 vòng/phút\r\nHệ thống khởi động	Khởi động điện\r\nHệ thống bôi trơn	Cácte ướt\r\nMức tiêu thụ nhiên liệu (l/100km)	2 l/100km\r\nBộ chế hòa khí	Phun xăng (1 vòi phun)\r\nHệ thống đánh lửa	T.C.I (kỹ thuật số)\r\nTỷ số truyền sơ cấp và thứ cấp	3,042 (73/24) / 3,000 (42/14)\r\nHệ thống ly hợp	Đa đĩa loại ướt\r\nTỷ số truyền động	1: 2,833/ 2: 1,875/ 3: 1,429/ 4: 1,143/ 5: 0,957\r\nKiểu hệ thống truyền lực	5 số', 'yamaha1.png', 48990000, 5, 'Yamaha'),
(34, 'EXCITER 150 DOXOU', 'Loại	4 thì, 4 van, SOHC, làm mát bằng dung dịch\r\nBố trí xi lanh	Xy lanh đơn\r\nDung tích xy lanh (CC)	150\r\nĐường kính và hành trình piston	57.0 x 58.7 mm\r\nTỷ số nén	10.4:1\r\nCông suất tối đa	11,3 kW (15,4 PS) / 8.500 vòng/phút\r\nMô men cực đại	13,8 N·m (1,4 kgf·m) / 7.000 vòng/phút\r\nHệ thống khởi động	Điện\r\nHệ thống bôi trơn	Cácte ướt\r\nDung tích dầu máy	1,15 l\r\nDung tích bình xăng	4,2 l\r\nMức tiêu thụ nhiên liệu (l/100km)	2 l/100km\r\nBộ chế hòa khí	Phun xăng (1 vòi phun)\r\nHệ thống đánh lửa	T.C.I (kỹ thuật số)\r\nTỷ số truyền sơ cấp và thứ cấp	3,042 (73/24) / 3,000 (42/14)\r\nHệ thống ly hợp	Đa đĩa loại ướt\r\nTỷ số truyền động	1: 2.833 / 2: 1.875 / 3: 1.429 / 4: 1.143 / 5: 0.957\r\nKiểu hệ thống truyền lực	5 số', 'Exciter-Doxou-004.png', 47990000, 7, 'Yamaha'),
(35, 'SIRIUS FI RC VÀNH ĐÚC', 'Loại	4 thì, 2 van SOHC, làm mát bằng không khí\r\nBố trí xi lanh	Xi lanh đơn\r\nDung tích xy lanh (CC)	115\r\nĐường kính và hành trình piston	50.0×57.9 mm\r\nTỷ số nén	9,3:1\r\nCông suất tối đa	6.4 kW (8.7PS)/7,000 vòng/phút\r\nMô men cực đại	9.5 N.m (0.97kgf/m)/5,500 vòng/phút\r\nHệ thống khởi động	Điện / Cần đạp\r\nHệ thống bôi trơn	Các te ướt\r\nDung tích dầu máy	1 L\r\nDung tích bình xăng	3,8 L\r\nMức tiêu thụ nhiên liệu (l/100km)	1,57\r\nHệ thống đánh lửa	T.C.I (kỹ thuật số)\r\nTỷ số truyền sơ cấp và thứ cấp	2.900(58/20)/2.857(40/14)\r\nHệ thống ly hợp	Ly hợp ướt đa đĩa, ly tâm tự động\r\nTỷ số truyền động	1st: 2.833 (34/12) 2nd: 1.875 (30/16) 3rd: 1.353 (23/17) 4th: 1.045 (23/22)\r\nKiểu hệ thống truyền lực	4 số tròn', 'Sirius-Mat-Black-RC-004.png', 23190000, 7, 'Yamaha'),
(36, 'JUPITER FI GP Xanh', 'Loại	4 kỳ, 2 van, SOHC, làm mát bằng không khí tự nhiên\r\nBố trí xi lanh	Xy lanh đơn\r\nDung tích xy lanh (CC)	114\r\nĐường kính và hành trình piston	50,0mm x 57,9mm\r\nTỷ số nén	9,3:1\r\nCông suất tối đa	7,4 kW (9,9 PS) / 7.000 vòng/phút\r\nMô men cực đại	9,9 N.m (0,99kgf.m) / 6.500 vòng/phút\r\nHệ thống khởi động	Điện / Cần khởi động\r\nHệ thống bôi trơn	Các-te ướt\r\nDung tích dầu máy	1,0 lít\r\nDung tích bình xăng	4,1 lít\r\nMức tiêu thụ nhiên liệu (l/100km)	1,55\r\nHệ thống đánh lửa	T.C.I (kỹ thuật số)\r\nTỷ số truyền sơ cấp và thứ cấp	2,900 (58/20) / 3,154 (41/13)\r\nHệ thống ly hợp	Đa đĩa, ly tâm loại ướt\r\nTỷ số truyền động	1: 2,833 2: 1,875 3: 1,353 4: 1,045\r\nKiểu hệ thống truyền lực	4 số tròn', 'Jupiter-GP-004-2.png', 30000000, 10, 'Yamaha'),
(37, 'Air Blade 2020 125cc', 'Air Blade 125cc: 111kg\r\nAir Blade 150cc: 113kg\r\nDài x Rộng x Cao Air Blade 125cc: 1.870mm x 687mm x 1.091mm\r\nAir Blade 150cc: 1.870mm x 686mm x 1.112mm\r\nKhoảng cách trục bánh xe 1.286 mm', 'xe-may-honda-air-blade-2020-125cc.jpg', 39790000, 10, 'HonDa'),
(38, 'Honda CB300R', 'Dài x Rộng x Cao (mm): 2.020 x 805 x 1.050 (mm)\r\nKhoảng cách trục bánh xe: 1.355 mm\r\nĐộ cao yên: 800 mm\r\nKhoảng sáng gầm xe: 150 mm\r\nDung tích bình xăng: 10,1 lít\r\nKích cỡ lốp trước/ sau\r\nLốp trước 110/70R17M/C 54H', 'cb300r.jpeg', 102000000, 5, 'HonDa'),
(39, 'Winner x thể thao', 'Phần đầu xe thay đổi mạnh ở thiết kế, với đèn pha được mang xuống dưới, chuyển thành đèn đôi\r\nCông nghệ LED, cùng với đèn xi-nhan lắp rời hai bên hông xe.\r\nThiết kế này khiến Winner X dễ dàng tạo cảm giác giống những chiếc sportbike phân khối lớn.\r\nPhần đầu xe có khe hở thiết kế lạ mắt, bên trong là còi xe.', 'winner-150-(phien-ban-the-thao).jpeg', 36075000, 5, 'HonDa'),
(40, 'Honda SH 125i 2020', 'Dài x Rộng x Cao: 2.090mm x 739mm x 1.129mm\r\nKhoảng cách trục bánh xe: 1.353mm\r\nĐộ cao yên: 668mm\r\nKhoảng sáng gầm xe: 146mm\r\nDung tích bình xăng: 7,8 lít', 'sh-125i-phanh-cbs-2020.jpeg', 80890000, 10, 'HonDa'),
(41, 'Xe Máy Honda SH 125i', 'Dài x Rộng x Cao: 2.090mm x 739mm x 1.129mm\r\nKhoảng cách trục bánh xe: 1.353mm\r\nĐộ cao yên: 668mm\r\nKhoảng sáng gầm xe: 146mm\r\nDung tích bình xăng: 7,8 lít', 'sh-125i-phanh-cbs-2020.jpeg', 82890000, 5, 'HonDa'),
(42, 'Xe Máy Honda SH 125i', 'Dài x Rộng x Cao: 2.090mm x 739mm x 1.129mm\r\nKhoảng cách trục bánh xe: 1.353mm\r\nĐộ cao yên: 668mm\r\nKhoảng sáng gầm xe: 146mm\r\nDung tích bình xăng: 7,8 lít', 'sh-125i-phanh-cbs-2020.jpeg', 82890000, 5, 'HonDa'),
(43, 'Moto Ducati SuperSport', 'Ducati SuperSport được giới thiệu tại thị trường Việt Nam vào hồi cuối năm 2017. Kể từ đó cho tới nay, dòng xe này luôn chiếm được cảm tình của đông đảo cộng đồng yêu xe phân khối lớn bởi hầu như mọi yếu tố đều tích hợp đầy đủ trên mẫu mô tô này.', 'ducati-dupersport-2019.jpg', 570900000, 5, 'Ducati'),
(44, 'Moto Ducati Monster', 'Dòng xe Ducati Monster luôn hấp dẫn đối với cộng đồng yêu mô tô chuyên nghiệp tại Việt Nam. Xe sở hữu các giá trị ưu việt như loạt thiết bị điện tử thường thấy của Ducati và trang bị công nghệ Quick Shift (Chuyển số nhanh), cho công suất tối đa trên 100 mã lực.', 'ducati-monster-821.jpg', 430900000, 1, 'Ducati'),
(45, 'Moto Ducati Monster', 'Dòng xe Ducati Monster luôn hấp dẫn đối với cộng đồng yêu mô tô chuyên nghiệp tại Việt Nam. Xe sở hữu các giá trị ưu việt như loạt thiết bị điện tử thường thấy của Ducati và trang bị công nghệ Quick Shift (Chuyển số nhanh), cho công suất tối đa trên 100 mã lực.', 'ducati-monster-821.jpg', 430900000, 1, 'Ducati'),
(46, 'Moto Ducati Scrambler', 'Hiện nay, nhiều thương hiệu mô tô quá tập trung vào cuộc chạy đua động cơ công suất  “khủng” mà quên mất một chiếc mô tô đẹp đủ gây ấn tượng, đủ kích thích nhưng dễ lái, đã là toại nguyện cho mỗi cuộc rong ruổi của phần đông khách hàng.', 'ducati-scrambler.jpg', 339900000, 5, 'Ducati'),
(47, 'Moto Kawasaki dòng Classic', 'Dòng Classic là một định nghĩa chung, dùng để chỉ những chiếc xe cổ điển, Vintage hoặc cổ xưa antique. Những chiếc xe dòng này mang tới trải nghiệm xưa cũ, hoài niệm đầy cảm xúc.\r\n\r\nHiện nay, Kawasaki đang phân phối mẫu xe Classic W175 tại thị trường Việt Nam với mức giá khá phải chăng.\r\n\r\nXe được trang bị động cơ mới SOHC, dung tích 177cc, xi-lanh đơn với bộ chế hòa khí. Động cơ này cho công suất tối đa 13 mã lực tại 7500 vòng/phút và mô-men xoắn cực đại 13.2 Nm tại 6000 vòng/phút. Xe có bộ phuộc lồng trước và giảm chấn sau, cùng đèn pha đa năng.', 'kawasaki-w175.jpg', 69000000, 5, 'Kawasaki'),
(48, 'Moto Kawasaki dòng Naked Bike', 'Giống như ý nghĩa tên gọi của mình, Naked Bike được hiểu về cơ bản là những chiếc xe có phần vỏ xe đơn giản, không có phần ốp chắn phía trước cũng như 2 bên hông, để lộ khung sườn và động cơ. Bình xăng đặt ở ngay phía trước, ngang tầm hông người lái.\r\n\r\nNhiều ý kiến cho rằng Naked Bike biến thể ra từ những chiếc SportBike bị tai nạn, người chủ không muốn thay thế phần vỏ mà tháo bỏ ra luôn. Chính vì vậy Naked Bike thưởng sở hữu sức mạnh khá lớn, nhưng lại có mức giá không quá cao nhờ tiết kiệm được nhiều chi tiết, đồng thời đa dụng hơn trên đường phố bởi đặc tính đơn giản của mình.', 'kawasaki-z300.jpg', 129000000, 10, 'Kawasaki'),
(49, 'Moto Kawasaki dòng SportBike', 'Đây là những chiếc xe môtô đậm chất thể thao, gợi liên tưởng tới những cuộc đua tốc độ cao với bình xăng lớn phía trước, lốp to, bám đường và thiết kế tối ưu hoá cho các quá trình khí động học nhằm mang tới khả năng vận hành vượt trội.  \r\n\r\nBên cạnh động cơ mạnh mẽ, SportBike cũng thường được chăm chút khá nhiều ở vẻ bề ngoài. Chúng được thiết kế phảng phất đường nét của một mũi tên, có phần vỏ xe che kín máy, khung sườn. Các chi tiết như cốp đựng đồ, chỗ ngồi sau cũng thường được loại bỏ để đạt hiệu quả tốc độ ấn tượng nhất.', 'kawasaki-ninja-400.jpg', 159000000, 0, 'Kawasaki'),
(50, 'Moto Kawasaki dòng Touring', 'Đây là dòng xe chuyên dụng cho những chuyến đi dã ngoại hay du lịch xa. Chính vì vậy, Touring thường có kích thước khá lớn với đầy đủ các tiện nghi, chẳng hạn như khoang chứa đồ, chỗ tựa lưng hoặc thậm chí là cả túi khí như một chiếc xe hơi.\r\n\r\nDòng xe này thường có bình xăng khá lớn, có kính chắn gió, kiểu dáng có thể giống Scooter hoặc Cruiser. Touring cũng thường có mức giá khá cao. Một dòng xe khác phát triển từ Touring là Sport Touring, sở hữu đầy đủ các tính năng của dòng này cùng thiết kế đậm chất thể thao, năng động.', 'kawasaki-versys-x300-muaxegiatot-vn.jpg', 159900000, 0, 'Kawasaki'),
(51, 'Moto Kawasaki dòng Cruiser', 'Cruiser là loại xe mang phong cách cổ điển với yên thấp, dáng người ngồi thẳng lưng và có rất nhiều trang trí mạ chrome.\r\n\r\nNhiều chiếc Cruiser còn được trang bị các thùng để đồ phía sau, tiện dụng và mang đến cảm giác sang trọng cho người đi.\r\n\r\nKhi nhắc đến Cruiser đa phần mọi người sẽ nghĩ ngay tới thương hiệu vang danh nước Mỹ – Harley Davidson.\r\n\r\nTuy nhiên, Kawasaki cũng phân phối một chiếc Cruiser hết sức đáng chú ý đó là Kawasaki Vulcan S. Xe luôn lọt top những mẫu xe đáng mua nhất của nhiều bảng xếp hạng danh tiếng.\r\n\r\nVulcan S à một chiếc mô-tô cruiser dựa trên cùng một nền tảng với Ninja 650R, cũng như ER-6N. Hệ thống truyền động cũng như khung gầm đã được chia sẻ với Ninja 650R.', 'kawasaki-vulcan-s-muaxegiatot-vn.jpg', 249000000, 5, 'Ducati'),
(52, 'Suzuki GD 110', 'Với thiết kế mang đậm phong cách cổ điển, Suzuki GD 110 thu hút nhiều ánh nhìn khi lưu thông trên đường. Bình xăng lưng gồ trước gợi tưởng tới những dòng xe classic đã từng vang bóng một thời.\r\n\r\nĐồng thời, cấu trúc xe có khung sườn khá vững chắc giúp người dùng có thể “cày” những cung đường xa. Phần sau xe có yên sắt để “thồ” hành lý dễ dàng hơn. Không những thế, người dùng dễ dàng chống chân với chiều cao yên xe thấp (765 mm).\r\n\r\nKhối động cơ GD 110 bền bỉ với 4 thì, làm mát bằng không khí cùng hệ thống đánh lửa DC – CDI giúp tối ưu hóa khả năng vận hành và tăng hiệu quả tiết kiệm nhiên liệu của xe. Đồng thời, các thông số trên giúp xe tạo ra công suất cực đại lên đến 8.04 Hp tại 8.500 vòng/phút và mô men xoắn cực đại là 8.53 Nm tại 5.500 vòng/phút. Xe còn có hộp số 4 cấp ly hợp ướt nên khá mượt mà trong việc đá “số”.', 'suzuki-gd110-2019-muaxegiatot-vn.jpg', 28490000, 5, 'Suzuki'),
(53, 'Axelo 125', 'Suzuki Axelo 125 là một dòng sản phẩm cá tính và nổi bật trong tầm phân khúc xe tay côn giá rẻ. Sở hữu những chi tiết ấn tượng và trau chuốt từng chi tiết, Axelo 125 là một trong những sự lựa chọn hàng đầu của những chàng trai trẻ tuổi.\r\n\r\nPhần thân xe được gia công mềm mại và cong vuốt nhằm gia tăng tối ưu khí động học.Tuy nhiên, xe có một điểm trừ là vào những ngày mưa, người dùng xe bị dính bùn do thanh chắn bùn ngắn.', 'suzuki-axelo-2019-muaxegiatot-vn.jpg', 27790000, 10, 'Suzuki'),
(54, 'Address 110 Fi', 'Đây là một dòng xe mà Suzuki thiết kế để dành cho nữ giới. Nhưng dựa vào những đường nét khá mạnh mẽ, Suzuki Address cũng được nam giới ưa chuộng.\r\n\r\nĐầu xe có hình mũi nhọn lên phía trước giúp giảm thiểu lực cản của gió cùng 2 dải đèn pha halogen vuốt về phía sau. Thân xe lại sở hữu nhiều đường gân gai góc mang lại cảm giác mạnh mẽ cho người dùng. Cốp xe rộng rãi để vừa một nón bảo hiểm toàn đầu phù hợp với các chị em phụ nữ.', 'suzuki-address-2019-muaxegiatot-vn.jpg', 28290000, 10, 'Ducati'),
(55, 'Impulse 125 Fi', 'Chắc hẳn, dòng xe tay ga Suzuki Impulse đã không còn xa lạ gì đối với mọi người Việt Nam. Là đối thủ trực tiếp của dòng xe Honda Air Blade 125, Suzuki Umpulse 125 Fi không hề thua kém gì về các thông số vận hành lẫn mẫu mã bên ngoài.\r\n\r\nTổng thể xe nổi bật với cụm đèn pha lớn hình chữ V tích hợp cặp đèn xi nhan và logo chữ S của hãng Suzuki nằm chính giữa.', 'suzuki-Impulse-muaxegiatot-vn.jpg', 31990000, 10, 'Suzuki'),
(56, 'Raider FI 150', 'Suzuki Raider là một dòng xe đã làm nên thương hiệu của hãng song vẫn được Suzuki “thay máu” về diện mạo để giúp tạo cảm giác mới mẻ trong mắt người dùng.\r\n\r\nTrong năm 2019, hãng cho ra mắt dòng xe Raider mới mang tên Suzuki Raider Fi 150 Yoshimura màu sắc mới thời trang, sành điệu và tem xe mới thể thao và cá tính. Suzuki Raider có diện mạo thể thao hơn so với mẫu tiền nhiệm.', 'suzuki-raider-r150-2019-muaxegiatot-vn.jpg', 49190000, 10, 'Suzuki'),
(57, 'Piaggio Medley', 'Với câu nói “luôn cân bằng dù cả thế giới nghiêng” – Piaggio Medley là dòng xe thể hiện sự tỉ mỉ của những kỹ sư người Ý trong từng chi tiết.\r\n\r\nKhông những thế, Medley là dòng tay ga bánh lớn nên rất vững chắc cho cả người mới chạy, ngoài ra còn rất được các phái đẹp tin tưởng khi có cốp rộng đủ chỗ cho cả 2 chiếc nón “Full – face”.\r\n\r\nNgoài ra, dòng xe còn “full” các công nghệ an toàn khác như khóa từ chống trộm, phanh ABS 2 kênh, cảm biến nghiêng. Với những phiên bản sở hữu công nghệ I-get, xe giảm tối đa tiếng ồn và rất tiết kiệm nhiên liệu.', 'piaggio1.webp', 71500000, 5, 'Piaggio'),
(58, 'Piaggio Medley', 'Với câu nói “luôn cân bằng dù cả thế giới nghiêng” – Piaggio Medley là dòng xe thể hiện sự tỉ mỉ của những kỹ sư người Ý trong từng chi tiết.\r\n\r\nKhông những thế, Medley là dòng tay ga bánh lớn nên rất vững chắc cho cả người mới chạy, ngoài ra còn rất được các phái đẹp tin tưởng khi có cốp rộng đủ chỗ cho cả 2 chiếc nón “Full – face”.\r\n\r\nNgoài ra, dòng xe còn “full” các công nghệ an toàn khác như khóa từ chống trộm, phanh ABS 2 kênh, cảm biến nghiêng. Với những phiên bản sở hữu công nghệ I-get, xe giảm tối đa tiếng ồn và rất tiết kiệm nhiên liệu.', 'piaggio1.webp', 71500000, 5, 'Piaggio'),
(59, 'Piaggio Liberty ABS', 'Là một trong những mẫu xe tay ga bán chạy nhất của thương hiệu Ý, Piaggio Liberty luôn được nhà sản xuất trau chuốt trên từng chi tiết.\r\n\r\nVới thiết kế nữ tính duyên dáng, dòng xe này phần lớn được ưa chuộng với các khách hàng nữ trẻ tuổi. Ở phiên bản 2019, Piaggio Liberty không có quá nhiều thay đổi về ngoại hình, ốp kim loại bóng bảy khắp thân xe và một cụm đèn pha gọn gàng, thanh thoát.\r\n\r\nXe nâng cấp bảng đồng hồ analog thành màn hình LCD hiện đại giúp người dùng dễ nhìn về đêm hơn. Không những thế, cốp xe cũng đã tăng 30% dung tích so với phiên bản trước. Nhờ đó, người dùng có thể để vừa nón bảo hiểm lẫn một số đồ dùng cá nhân cần thiết khác.', 'piaggio-liberty-125-abs-muaxegiatot-vn.jpg', 55500000, 10, 'Piaggio'),
(60, 'Piaggio Zip', 'Không được nổi tiếng như 2 dòng sản phẩm trên, nhưng Piaggio Zip vẫn có một vị thế nhất định trong thị trường tay ga Việt Nam.\r\n\r\nThiết kế bên ngoài đặc trưng với dáng xe nhỏ, phù hợp với phụ nữ Á Đông. Xe không có nổi trội gì về trang bị bên ngoài, vẫn là các chi tiết như đồng hồ kim hiển thị thông số, cốp xe đủ rộng để chứa một chiếc mũ bảo hiểm 3/4. Xe còn sở hữu bộ lốp không săm giúp người dùng an tâm hơn khi di chuyển.\r\n\r\nTrải nghiệm trên xe êm ái với hệ thống ống lòng giảm chấn thủy lực và giảm xóc đơn phía sau với lò xo giảm chấn thủy lực.  Zip 100 trang bị động cơ 4 thì HI-PER, 2 xi-lanh tạo ra công suất cực đại 5,6 HP, với định vị là dòng xe tay ga hạng nhỏ nhưng động cơ mạnh mẽ ngang ngửa các dòng phân khúc cao hơn như Honda Vision.', 'piaggio-zip-100-2019-muaxegiatot-vn.jpg', 34000000, 10, 'Piaggio'),
(61, 'Fly 125', 'Dòng xe Fly Piaggio 125 được đánh giá cao bởi sở hữu một động cơ mạnh mẽ với mức giá hợp lý. Xác định là một dòng tay ga “ Công suất tối đa”, xe mang lại người dùng một vẻ quý phái và tinh tế riêng.\r\n\r\nFly Piaggio 125 phù hợp với phân khúc dân công sở nhờ thiết kế nhỏ gọn và những đường nét lịch sự. Fly Piaggio 125 có yên xe hạ thấp với bề ngang xe rộng giúp cốp đủ không gian để chứa 2 mũ bảo hiểm nửa đầu. Sàn để chân xe thiết kế rộng rãi giúp vị trí để chân được thoải mái.\r\n\r\nÂm thanh nổ máy của xe khá nhỏ và động cơ tối ưu giúp tiết kiệm nhiên liệu (tiêu hao 1.56 lít xăng/100 km).', 'piaggio-fly-125-muaxegiatot-vn.jpg', 41900000, 10, 'Piaggio'),
(62, 'Fly 125', 'Dòng xe Fly Piaggio 125 được đánh giá cao bởi sở hữu một động cơ mạnh mẽ với mức giá hợp lý. Xác định là một dòng tay ga “ Công suất tối đa”, xe mang lại người dùng một vẻ quý phái và tinh tế riêng.\r\n\r\nFly Piaggio 125 phù hợp với phân khúc dân công sở nhờ thiết kế nhỏ gọn và những đường nét lịch sự. Fly Piaggio 125 có yên xe hạ thấp với bề ngang xe rộng giúp cốp đủ không gian để chứa 2 mũ bảo hiểm nửa đầu. Sàn để chân xe thiết kế rộng rãi giúp vị trí để chân được thoải mái.\r\n\r\nÂm thanh nổ máy của xe khá nhỏ và động cơ tối ưu giúp tiết kiệm nhiên liệu (tiêu hao 1.56 lít xăng/100 km).', 'piaggio-fly-125-muaxegiatot-vn.jpg', 41900000, 10, 'Piaggio');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

DROP TABLE IF EXISTS `tintuc`;
CREATE TABLE IF NOT EXISTS `tintuc` (
  `MaTT` int(11) NOT NULL AUTO_INCREMENT,
  `TenTT` varchar(255) NOT NULL,
  `TieuDe` varchar(255) NOT NULL,
  `HinhAnh` varchar(100) NOT NULL,
  `NoiDung` varchar(1000) NOT NULL,
  PRIMARY KEY (`MaTT`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`MaTT`, `TenTT`, `TieuDe`, `HinhAnh`, `NoiDung`) VALUES
(5, 'khuyến mãi tháng 1', 'Chương trình quy mô lớn tại TUYÊN QUANG và SÓC TRĂNG', 'tt1.jpg', 'Thời gian: Từ 8h – 21h thứ 7 ngày 05/12 và 8h – 17h ngày 06/12/2020, với chương trình ca nhạc đặc biệt diễn ra từ 19h-21h tối thứ 7\r\nĐịa điểm:'),
(6, 'tin sốc', 'TÍN ĐỒ TỐC ĐỘ TRẢI NGHIỆM 3 PHIÊN BẢN MONSTER YAMAHA TẠI Y-RIDERS FEST 2020', 'tt2.jpg', 'Cộng đồng yêu xe thể thao tại miền Trung cháy hết mình cùng loạt hoạt động racing và trải nghiệm bộ 3 phiên bản Monster Yamaha: NVX 155 VVA thế hệ mới, Exciter 150 và R15.'),
(7, 'hội xe máy', 'sự kiện xe máy', 'tt3.jpg', 'Sự kiện diễn ra tại Trung tâm Văn hóa – Điện ảnh tỉnh Thừa Thiên – Huế, phường Phú Hội, thành phố Huế. Hàng nghìn anh em Y-Riders được tận hưởng những khoảnh khắc bùng cháy cùng loạt hoạt động nối tiếp nhau do Yamaha Motor Việt Nam tổ chức như: Biểu diễn môtô mạo hiểm; thi tay lái lụa trên sa hình theo tiêu chuẩn Revkhana của Yamaha; thi độ xe; hướng dẫn lái xe phân khối lớn cho các “tân binh”; những trò chơi vận động với hàng nghìn phần quà hấp dẫn; chương trình ca nhạc sôi động với sự tham gia của ca sĩ Isaac và ban nhạc Parasite.'),
(8, 'hội xe máy', 'sự kiện xe máy', 'tt3.jpg', 'Sự kiện diễn ra tại Trung tâm Văn hóa – Điện ảnh tỉnh Thừa Thiên – Huế, phường Phú Hội, thành phố Huế. Hàng nghìn anh em Y-Riders được tận hưởng những khoảnh khắc bùng cháy cùng loạt hoạt động nối tiếp nhau do Yamaha Motor Việt Nam tổ chức như: Biểu diễn môtô mạo hiểm; thi tay lái lụa trên sa hình theo tiêu chuẩn Revkhana của Yamaha; thi độ xe; hướng dẫn lái xe phân khối lớn cho các “tân binh”; những trò chơi vận động với hàng nghìn phần quà hấp dẫn; chương trình ca nhạc sôi động với sự tham gia của ca sĩ Isaac và ban nhạc Parasite.'),
(9, 'ĐIỂM DỪNG CHÂN CUỐI CÙNG CỦA Y-RIDERS FEST 2020: CHÀO ĐÓN PHIÊN BẢN MONSTER – “UY LỰC MÃNH THÚ” SẼ DIỄN RA TẠI HUẾ VÀO 2 NGÀY 05-06/12', 'ĐIỂM DỪNG CHÂN CUỐI CÙNG CỦA Y-RIDERS FEST 2020: CHÀO ĐÓN PHIÊN BẢN MONSTER – “UY LỰC MÃNH THÚ” SẼ DIỄN RA TẠI HUẾ VÀO 2 NGÀY 05-06/12', 'tt4.jpg', 'Tiếp nối thành công vang dội của Y-Riders Fest 2020 tại miền Nam và miền Bắc, đại hội Y-Riders Fest cuối cùng trong năm nay sẽ đặt chân tới Huế trong 2 ngày 5-6/12. Các anh em yêu xe thể thao tại miền Trung sẽ được cháy hết mình cùng loạt hoạt động đậm chất racing và sự ra mắt của bộ 3 phiên bản Monster: NVX 155 VVA phiên bản mới, Exciter 150 và R15.'),
(10, 'BÙNG CHÁY CẢM XÚC CÙNG NINH DƯƠNG LAN NGỌC VÀ TRỊNH THĂNG BÌNH', 'GRANDE FASHION SHOW TẠI HÀ NỘI: THỎA LÒNG “TÍN ĐỒ” GRANDE, BÙNG CHÁY CẢM XÚC CÙNG NINH DƯƠNG LAN NGỌC VÀ TRỊNH THĂNG BÌNH', 'tt6.jpg', 'Tiếp nối thành công của sự kiện tại TP.Hồ Chí Minh, Yamaha Grande Fashion Show – chuỗi sự kiện khám phá mừng “Hành trình chinh phục số 1 Việt Nam về tiết kiệm nhiên liệu của Yamaha Grande” đã thực sự “đốn” tim các quý cô tại Hà Nội với những chương trình đặc sắc, ngập tràn cảm xúc trong 2 ngày 7 và 8/11 vừa qua.'),
(11, 'sự kiện', 'Chương trình quy mô lớn tại cùng các nghệ sĩ', 'tt7.jpg', 'Sự kiện đã thu hút được đông đảo các bạn trẻ tại Hà Nội, đặc biệt là những quý cô sành điệu, yêu thích “nữ hoàng” tiết kiệm nhiêu liệu Grande của nhà Yamaha.\r\n\r\nVới sự đầu tư hoành tráng, hàng loạt các hoạt động hấp dẫn đã giúp cho khách mời được tận hưởng và đắm chìm trong cảm xúc thăng hoa sôi động. Đó là màn trìnhdiễn thời trang đặc sắc được lấy cảm hứng từ phong cách thiết kế của 3 mẫu xe tay ga tiết kiệm nhiên liệu số 1 Việt Nam là Grande, Latte và Janus.');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`),
  ADD CONSTRAINT `chitietdonhang_ibfk_3` FOREIGN KEY (`MaDH`) REFERENCES `donhang` (`MaDH`);

--
-- Các ràng buộc cho bảng `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD CONSTRAINT `chitietgiohang_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`),
  ADD CONSTRAINT `chitietgiohang_ibfk_3` FOREIGN KEY (`MaGH`) REFERENCES `giohang` (`MaGH`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`MaBP`) REFERENCES `bophan` (`MaBP`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`HangXe`) REFERENCES `hangxe` (`HangXe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
