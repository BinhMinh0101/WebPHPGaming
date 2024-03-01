-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 27, 2022 lúc 08:32 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `gear_web_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaDonHang` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `DonGia` float NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaDonHang`, `MaSanPham`, `DonGia`, `SoLuong`, `ThanhTien`) VALUES
(103, 8, 25290000, 1, 25290000),
(104, 23, 16990000, 2, 33980000),
(104, 19, 240000, 5, 1200000),
(105, 1, 21999000, 4, 87996000),
(106, 1, 21999000, 1, 21999000),
(106, 2, 11190000, 3, 33570000),
(106, 4, 500000, 4, 1200000),
(106, 14, 22990000, 2, 45980000),
(107, 9, 25990000, 3, 77970000),
(107, 3, 500000, 5, 2500000),
(107, 4, 500000, 5, 1500000),
(107, 8, 25290000, 4, 101160000),
(107, 16, 25990000, 4, 103960000),
(108, 17, 66990000, 14, 937860000),
(109, 3, 500000, 100, 50000000),
(110, 4, 500000, 200, 100000000),
(110, 3, 500000, 300, 150000000),
(111, 4, 500000, 300, 150000000),
(112, 4, 500000, 450, 225000000),
(113, 3, 500000, 550, 275000000),
(114, 3, 500000, 4, 2000000),
(115, 4, 500000, 3, 1500000),
(116, 4, 300000, 1, 300000),
(117, 3, 500000, 500, 250000000),
(117, 4, 500000, 500, 250000000),
(118, 3, 500000, 2500, 1250000000),
(118, 4, 500000, 2500, 1250000000),
(119, 29, 3999000, 2, 7998000),
(119, 24, 22990000, 1, 22990000),
(119, 28, 1790000, 4, 7160000),
(120, 10, 25490000, 2, 50980000),
(121, 4, 300000, 4000, 1200000000),
(122, 3, 500000, 200, 100000000),
(123, 29, 3999000, 2, 7998000),
(124, 4, 300000, 1000, 300000000),
(125, 9, 25990000, 1, 25990000),
(127, 4, 300000, 3, 900000),
(127, 5, 24990000, 1, 24990000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `MaPN` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `DonGia` float NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietphieunhap`
--

INSERT INTO `chitietphieunhap` (`MaPN`, `MaSanPham`, `DonGia`, `SoLuong`, `ThanhTien`) VALUES
(1, 1, 10000000, 3, 30000000),
(1, 2, 3000000, 10, 30000000),
(1, 3, 15000000, 2, 30000000),
(1, 4, 6000000, 5, 30000000),
(2, 5, 2500000, 2, 5000000),
(2, 6, 5000000, 1, 5000000),
(3, 7, 20000000, 1, 20000000),
(4, 2, 50000000, 10, 500000000),
(4, 29, 50000000, 5, 250000000),
(5, 4, 100000, 13, 1300000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MaDanhMuc` int(11) NOT NULL,
  `TenDanhMuc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TrangThai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`MaDanhMuc`, `TenDanhMuc`, `TrangThai`) VALUES
(1, 'LapTopoooooooooooo', 1),
(2, 'Chuột + Lót Chuột', 1),
(3, 'Bàn Phím', 1),
(4, 'Loa + Tai Nghe', 1),
(5, 'Màn Hình', 1),
(19, 'Danh mục Vy', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MaDonHang` int(11) NOT NULL,
  `NgayMua` date NOT NULL,
  `TongTien` float NOT NULL,
  `TinhTrang` int(11) NOT NULL,
  `HoTen` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TinhThanh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `QuanHuyen` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaTaiKhoan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDonHang`, `NgayMua`, `TongTien`, `TinhTrang`, `HoTen`, `Email`, `Phone`, `DiaChi`, `TinhThanh`, `QuanHuyen`, `MaTaiKhoan`) VALUES
(103, '2021-12-18', 25290000, 1, 'Trương Nhật Vy', 'truongnhatvy78@gmail.com', '0814840484', '122b,NguyễnTất Thành,Khóm 1,Phường 8,Thành phố Cà Mau', 'Cà Mau', 'Cà Mau', 2),
(104, '2021-12-18', 35180000, 1, 'Hồ quý ly', 'nhatvy.truong1@gmail.com', '0814840484', '122b, Nguyễn Tất Thành, Khóm 1, Phường 8, Thành phố Cà Mau', 'Cà Mau111111', 'HCM', 2),
(105, '2021-12-19', 87996000, 1, 'Trương Nhật Vy', 'nhatvy.truong1@gmail.com', '0814840484', '122b, Nguyễn Tất Thành, Khóm 1, Phường 8, Thành phố Cà Mau', 'Cà Mau', 'Cà Mau', 2),
(106, '2021-12-19', 102749000, 1, 'Trương Nhật Vy', 'nhatvy.truong1@gmail.com', '0814840484', '122b, Nguyễn Tất Thành, Khóm 1, Phường 8, Thành phố Cà Mau', 'Cà Mau', 'Cà Mau', 2),
(107, '2021-12-19', 287090000, 1, 'Trương Nhật Vy', 'nhatvy.truong1@gmail.com', '0814840484', '122b, Nguyễn Tất Thành, Khóm 1, Phường 8, Thành phố Cà Mau', 'Cà Mau', 'Cà Mau', 2),
(108, '2021-12-19', 937860000, 1, 'Trương Nhật Vy', 'nhatvy.truong1@gmail.com', '0814840484', '122b, Nguyễn Tất Thành, Khóm 1, Phường 8, Thành phố Cà Mau', 'Cà Mau', 'Cà Mau', 2),
(109, '2021-12-19', 50000000, 1, 'Trương Nhật Vy', 'nhatvy.truong1@gmail.com', '0814840484', '122b, Nguyễn Tất Thành, Khóm 1, Phường 8, Thành phố Cà Mau', 'Cà Mau', 'Cà Mau', 2),
(110, '2021-12-19', 250000000, 1, 'Trương Nhật Vy', 'nhatvy.truong1@gmail.com', '0814840484', 'ca mau nguyen huu hao trung tan truc', 'Cà Mau', 'Cà Mau nef', 2),
(111, '2021-12-19', 150000000, 1, 'Nguyen trung truc', 'nhatvy.truong1@gmail.com', '0914125', 'ca mau nguyen huu hao trung tan truc', 'Cà Mau111111', 'HCM', 2),
(112, '2021-12-19', 225000000, 1, 'Trương Nhật Vysdhsdfsdf', 'kimlng0707@gmail.com', '0814840484', 'ca mau nguyen huu hao trung tan truc', 'Cà Mau', 'Cà Mau nef', 2),
(113, '2021-12-19', 275000000, 1, 'Hồ quý ly', 'phan2001hieu@gmail.com', '0814840484', '122b, Nguyễn Tất Thành, Khóm 1, Phường 8, Thành phố Cà Mau', 'ho chi minh', 'Cà Mau nef', 2),
(114, '2021-12-19', 2000000, 1, 'Trương Nhật Vy', 'nhatvy.truong1@gmail.com', '0814840484', '122b, Nguyễn Tất Thành, Khóm 1, Phường 8, Thành phố Cà Mau', 'Cà Mau', 'Cà Mau', 2),
(115, '2021-12-19', 1500000, 1, 'Trương Nhật Vy', 'nhatvy.truong1@gmail.com', '0814840484', '122b, Nguyễn Tất Thành, Khóm 1, Phường 8, Thành phố Cà Mau', 'Cà Mau', 'Cà Mau', 2),
(116, '2021-12-19', 300000, 1, 'Trương Nhật Vy', 'nhatvy.truong1@gmail.com', '0814840484', '122b, Nguyễn Tất Thành, Khóm 1, Phường 8, Thành phố Cà Mau', 'Cà Mau', 'Cà Mau', 2),
(117, '2021-12-19', 500000000, 1, 'Hồ quý ly', 'nhatvy.truong1@gamil.com', '0814840484', '122b, Nguyễn Tất Thành, Khóm 1, Phường 8, Thành phố Cà Mau', 'Cà Mau', 'Cà Mau', 2),
(118, '2021-12-19', 2500000000, 1, 'Trương Nhật Vy', 'nhatvy.truong1@gmail.com', '0814840484', '122b, Nguyễn Tất Thành, Khóm 1, Phường 8, Thành phố Cà Mau', 'Cà Mau', 'Cà Mau', 2),
(119, '2021-12-17', 38148000, 1, 'Trương Nhật Vy', 'kimlng0707@gmail.com', '0814840484', '122b, Nguyễn Tất Thành, Khóm 1, Phường 8, Thành phố Cà Mau', 'Cà Mau', 'Cà Mau', 2),
(120, '2021-12-21', 50980000, 1, 'Trương Nhật Vy', 'nhatvy.truong1@gmail.com', '0814840484', '122b, Nguyễn Tất Thành, Khóm 1, Phường 8, Thành phố Cà Mau', 'Cà Mau', 'Cà Mau nef', 2),
(121, '2021-12-22', 1200000000, 0, 'Trương Nhật Vy', 'nhatvy.truong1@gmail.com', '0814840484', '122b, Nguyễn Tất Thành, Khóm 1, Phường 8, Thành phố Cà Mau', 'Cà Mau', 'Cà Mau', 2),
(122, '2021-12-22', 100000000, 0, 'Trương Nhật Vy', 'nhatvy.truong1@gmail.com', '0814840484', '122b, Nguyễn Tất Thành, Khóm 1, Phường 8, Thành phố Cà Mau', 'Cà Mau', 'Cà Mau', 2),
(123, '2021-12-22', 7998000, 0, 'Trương Nhật Vy', 'nhatvy.truong1@gmail.com', '0814840484', '122b, Nguyễn Tất Thành, Khóm 1, Phường 8, Thành phố Cà Mau', 'Cà Mau', 'Cà Mau', 2),
(124, '2021-12-22', 300000000, 0, 'Trương Nhật Vy', 'nhatvy.truong1@gmail.com', '0814840484', '122b, Nguyễn Tất Thành, Khóm 1, Phường 8, Thành phố Cà Mau', 'Cà Mau', 'Cà Mau', 2),
(125, '2021-12-23', 25990000, 1, 'Trương Nhật Vy', 'nhatvy.truong1@gmail.com', '0814840484', '122b, Nguyễn Tất Thành, Khóm 1, Phường 8, Thành phố Cà Mau', 'Cà Mau', 'Cà Mau', 2),
(126, '2022-04-27', 25890000, 0, 'Trương Nhật Vy', 'nhatvy.truong1@gmail.com', '0814840484', '122b, Nguyễn Tất Thành, Khóm 1, Phường 8, Thành phố Cà Mau', 'Cà Mau', 'Cà Mau nef', 2),
(127, '2022-04-27', 25890000, 0, 'Trương Nhật Vy', 'nhatvy.truong1@gmail.com', '0814840484', '122b, Nguyễn Tất Thành, Khóm 1, Phường 8, Thành phố Cà Mau', 'Cà Mau', 'Cà Mau nef', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MaPN` int(11) NOT NULL,
  `MaTaiKhoan` int(10) NOT NULL,
  `NgayNhap` date NOT NULL,
  `TongGia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`MaPN`, `MaTaiKhoan`, `NgayNhap`, `TongGia`) VALUES
(1, 2, '2021-12-19', 120000000),
(2, 2, '2021-12-18', 10000000),
(3, 2, '2021-12-17', 20000000),
(4, 0, '2021-12-24', 750000000),
(5, 0, '2021-12-24', 1300000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `MaThuongHieu` int(11) NOT NULL,
  `MaDanhMuc` int(11) NOT NULL,
  `Anh` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `MoTa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gia` bigint(20) NOT NULL,
  `GiamGia` bigint(20) NOT NULL,
  `LoaiShow` int(11) NOT NULL,
  `TrangThai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `SoLuong`, `MaThuongHieu`, `MaDanhMuc`, `Anh`, `MoTa`, `Gia`, `GiamGia`, `LoaiShow`, `TrangThai`) VALUES
(1, 'Laptop Gaming Acer Nitro 5 AN515 57 56S5', 83, 2, 1, 'laptop_gaming_acer_nitro_5_an515_57_56ss_3a6937a70e5c403f8cc7059d10daaa1a.jpg', 'CPU:	Intel® Core i5-11400H upto 4.50 GHz, 6 nhân 12 luồng;\r\nRam:	8GB DDR4 3200MHz (2 slot SO-DIMM socket, nâng cấp tối đa 32GB SDRAM);\r\nỔ cứng:	512GB SSD M.2 PCIE (nâng cấp tối đa 1TB SSD PCIe Gen3, 8 Gb/s, NVMe và 2TB HDD 2.5-inch 5400 RPM) (Còn trống 1 khe SSD M.2 PCIE và 1 khe 2.5\" SATA);\r\nCard đồ họa:	NVIDIA® GeForce GTX™ 1650 4GB GDDR6;\r\nMàn hình:	15.6 inch FHD(1920 x 1080) IPS 144Hz SlimBezel;\r\nCổng giao tiếp:	3x USB 3.1 Gen 1, 1x USB 3.2 Gen 2 Type C, 1x HDMI, RJ45;\r\nỔ quang:	None;\r\nAudio:	Waves MaxxAudio®, Acer TrueHarmony™;\r\nBàn phím:	Đơn sắc đỏ;\r\nĐọc thẻ nhớ:	None;\r\nChuẩn LAN:	10/100/1000/Gigabits Base T;\r\nChuẩn WIFI:	802.11AX (2x2);\r\nBluetooth:	Bluetooth® 5.1;\r\nWebcam:	HD Webcam;\r\nHệ điều hành:	Windows 11 Home;\r\nPin:	4 Cell 57.5WHr;\r\nTrọng lượng:	2.20 kg;\r\nMàu sắc:	Đen;\r\nKích thước:	363.4 x 255 x 23.9 mm;', 21999000, 0, 1, 0),
(2, 'Laptop Acer Aspire 3 A315 56 37DV', 54, 2, 1, 'laptop-acer-aspire-3-a315-56-37dv-1_14c2a4369f244da3a18a6a9884da2f0a_2d6425a24d4e40bea850a55c2ff54d59.jpg', 'CPU:	Intel Core i3-1005G1 1.2GHz up to 3.4GHz 4MB;\r\nRAM:	4GB DDR4 2400MHz Onboard ( 1x onboard 4GB + 1x SO-DIMM socket, up to 12GB SDRAM);\r\nỔ cứng:	256GB SSD M.2 PCIE, 1x slot SATA3 2.5\";\r\nCard đồ họa:	Intel UHD Graphics;\r\nMàn hình:	15.6\" FHD (1920 x 1080) Acer ComfyView LCD, Anti-Glare;\r\nCổng giao tiếp:	1x USB 3.1, 2x USB 2.0, HDMI, RJ-45;\r\nỔ quang:	None;\r\nAudio:	Realtek High Definition;\r\nĐọc thẻ nhớ:	None;\r\nChuẩn LAN:	10/100/1000 Mbps;\r\nChuẩn WIFI:	802.11 ac\r\nBluetooth:	v4.2;\r\nWebcam:	HD Webcam;\r\nHệ điều hành:	Windows 10 Home;\r\nPin:	3 Cell 36.7 Whr;\r\nTrọng lượng:	1.7 kg;\r\nMàu sắc:	Shale Black;\r\nKích thước:	363 x 247.5 x 19.9 (mm);', 11190000, 0, 1, 1),
(3, 'Chuột Logitech G102 Lightsync RGB Black', 300, 7, 2, 'logitech-g102-lightsync-rgb-black-1_bf4f5774229c4a0f81b8e8a2feebe4d8.jpg', 'Thiết kế: Đối xứng - Ambidextrous;\r\nMắt đọc: Mercury Sensor;\r\nĐiểm ảnh trên 1 inch (DPI): 8000;\r\nIPS: 200;\r\nGia tốc: 30g;\r\nTần số phản hồi: 1000Hz;\r\nChất liệu vỏ: Nhựa ABS;\r\nMàu sắc: Đen;\r\nSố lượng nút bấm: 6;\r\nSwitch: Omron;\r\nTuổi thọ: 50 triệu lần nhấn;\r\nLED: RGB Lightsync;\r\nKết nối: USB;\r\nĐộ dài dây (cm): 210;\r\nKích thước (mm): Dài 116.6 x Rộng 62.15 x Cao 38.2;\r\nTrọng lượng (gr): 85g (không cable);\r\nPhần mềm: Logitech G-Hub;', 500000, 0, 1, 1),
(4, 'Chuột Akko Hamster Wireless', 110, 11, 2, '6704383c936c6932307d_18d0fac97c764bfe954f9087b2c24986.jpg', 'Hãng sản xuất:	Akko;\r\nModel:	akko hamster;\r\nKhoảng cách kết nối: tối đa 10m;\r\nmục đích:	Thích hợp cho công việc văn phòng;\r\npin và thời gian sử dụng:	Sử dụng 1 pin AA (thời gian sử dụng lên tới 6 tháng, trong hộp đã có 1 pin);\r\nhệ điều hành thích hợp:	Windows XP/Vista/7/8/10 – Mac OS – Chrome OS;\r\nDPI:	1200;\r\nTrọng lượng:	84gram;', 300000, 0, 1, 1),
(5, 'Laptop Gaming MSI Katana GF66 11UC 676VN', 2, 3, 1, 'msi_katana_gf66_gearvn-2499_876b94af79224316a56a36aeaf95d751.jpg', 'Thương hiệu:\r\n\r\nMSI;\r\n\r\nBảo hành:\r\n\r\n12 tháng;\r\n\r\nSeries:\r\n\r\nMSI Katana GF66 11UC 676VN;\r\n\r\nCPU:\r\n\r\nIntel Core i5-11400H;\r\nRAM:\r\n\r\n8GB (8GB x 1) DDR4 3200MHz (2 khe, tối đa 64GB);\r\n\r\nỔ lưu trữ:\r\n\r\n512GB NVMe PCIe Gen3x4 SSD;\r\n\r\nCard đồ họa:\r\n\r\nNVIDIA GeForce RTX 3050 4GB GDDR6 + Intel UHD Graphics;\r\n\r\nMàn hình:\r\n\r\n15.6 inch FHD (1920*1080), 144Hz 45% NTSC;\r\n\r\nBàn phím:\r\n\r\nSingle Led (Red);\r\n\r\nAudio:\r\n\r\nHi-Res Audio;\r\n\r\nĐọc thẻ nhớ:\r\n\r\n-;\r\n\r\nKết nối có dây (LAN):\r\n\r\nKiller Gb LAN;\r\n\r\nKết nối không dây:\r\n\r\nIntel Wi-Fi 6 AX201(2*2 ax), Bluetooth v5.2;\r\n\r\nWebcam:\r\n\r\nHD 720p@30fps;\r\n\r\nCổng giao tiếp:\r\n\r\n1x Type-C USB3.2 Gen1,\r\n2x Type-A USB3.2 Gen1,\r\n1x Type-A USB2.0,\r\n1x (4K @ 60Hz) HDMI,\r\n1x Mic-in/Headphone-out Combo Jack;\r\n\r\nHệ điều hành:\r\n\r\nWindows 10 Home;\r\n\r\nPin: \r\n\r\n3 cell, 53.5Whr;\r\n\r\nTrọng lượng:\r\n\r\n2.1 kg;\r\n\r\nKích thước:\r\n\r\n359 x 259 x 24.9 (mm);\r\n\r\nMàu sắc:\r\n\r\nĐen;', 24990000, 0, 1, 1),
(6, 'Laptop Gaming Dell Alienware M15 R6 P109F001BBL', 5, 6, 1, 'laptop_gaming_dell_alienware_m15_r6_p109f004bbl_e9c1f4cdd3d24a238442333904656ec1.jpg', 'Thương hiệu:	DELL;\r\nBảo hành:	12 tháng;\r\nModel:	Dell Alienware M15 R6 P109F001BBL\r\nCPU	Intel Core i7-11800H (8 nhân, 16 luồng);\r\nRAM:	32GB (2x16GB) DDR4 3200Mhz (2 khe, max 64GB RAM);\r\nỔ cứng:	1TB SSD M.2 PCIE \r\nCard đồ họa	NVIDIA® GeForce RTX 3060 (6GB GDDR4);\r\nMàn hình:	15.6\" FHD (1920 x 1080) WVA, 165Hz, 3ms with ComfortView Plus, 100% sRGB, 300nits;\r\nCổng giao tiếp:	1x Type-C port (Includes Thunderbolt™ 4i, USB 3.2 Gen 2, Display Port 1.4, and Power Delivery 15W Output (5V/3A) capabilities)\r\n3x Type-A USB 3.2 Gen 1 ports (one with PowerShare)\r\n1x HDMI 2.1 Output port\r\n1x Killer E2600 1 Gbps rated RJ-45 Ethernet port\r\n1x Global Headset jack\r\n1x Power/DC-In port;\r\nBàn phím:	Alienware mSeries 4-Zone AlienFX RGB keyboard;\r\nChuẩn WIFI:	802.11AX (WiFi 6);\r\nBluetooth:	v5.0;\r\nWebcam:	Alienware HD (1280x720 resolution) camera with dual-array microphones;\r\nHệ điều hành:	Windows 10 Home + Office Home & Student;\r\nPin:	3 Cell 56WHr Li-ion polymer;\r\nTrọng lượng:	2.69 kg;\r\nMàu sắc:	Dark Side of the Moon;\r\nKích thước:	356.2 x 272.5 x 19.2 (mm);', 61990000, 0, 1, 1),
(7, 'Laptop Gaming Dell Alienware M15 R6 P109F001ABL', 43, 6, 1, 'laptop_gaming_dell_alienware_m15_r6_p109f001abl_0745e0606417408eadd9055a2bff5f99.jpg', 'Thương hiệu:	DELL;\r\nBảo hành:	12 tháng;\r\nModel:	Dell Alienware M15 R6 P109F001BBL\r\nCPU	Intel Core i7-11800H (8 nhân, 16 luồng);\r\nRAM:	32GB (2x16GB) DDR4 3200Mhz (2 khe, max 64GB RAM);\r\nỔ cứng:	1TB SSD M.2 PCIE;\r\nCard đồ họa:	NVIDIA® GeForce RTX 3060 (6GB GDDR4);\r\nMàn hình:	15.6\" FHD (1920 x 1080) WVA, 165Hz, 3ms with ComfortView Plus, 100% sRGB, 300nits;\r\nCổng giao tiếp:	1x Type-C port (Includes Thunderbolt™ 4i, USB 3.2 Gen 2, Display Port 1.4, and Power Delivery 15W Output (5V/3A) capabilities)\r\n3x Type-A USB 3.2 Gen 1 ports (one with PowerShare)\r\n1x HDMI 2.1 Output port\r\n1x Killer E2600 1 Gbps rated RJ-45 Ethernet port\r\n1x Global Headset jack\r\n1x Power/DC-In port;\r\nBàn phím:	Alienware mSeries 4-Zone AlienFX RGB keyboard;\r\nChuẩn WIFI:	802.11AX (WiFi 6);\r\nBluetooth:	v5.0;\r\nWebcam:	Alienware HD (1280x720 resolution) camera with dual-array microphones;\r\nHệ điều hành:	Windows 10 Home + Office Home & Studen;\r\nPin:	3 Cell 56WHr Li-ion polymer;\r\nTrọng lượng:	2.69 kg;\r\nMàu sắc:	Dark Side of the Moon;\r\nKích thước:	356.2 x 272.5 x 19.2 (mm);', 65590000, 0, 1, 1),
(8, 'Laptop ASUS ZenBook UX325EA KG363T', 95, 1, 1, 'laptop_asus_zenbook_ux325ea.jpg', 'CPU: Intel® Core™ i5-1135G7 (4.20GHz, 8 MB cache, 4 cores 8 threads); RAM: 8GB 4266MHz LPDDR4X; Ổ cứng: 512GB PCIe® NVMe™ 3.0 x2 M.2 SSD; Màn hình: 13.3\", 1920 x 1080 Pixel, OLED, 60 Hz, 400 nits, OLED; Card màn hình: Intel® Iris® Xe Graphics; Wireless: Intel WiFi 6 with Gig+ performance (802.11ax); LAN: None; Bluetooth: Bluetooth 5.0; Cổng kết nối:2 x Thunderbolt™ 4 USB-C® (up to 40Gbps), 1 x USB 3.2 Gen 1 Type-A (up to 5Gbps), 1 x Standard HDMI, 1 x MicroSD card reader; Pin: 4-cell, 65WHrs; Hệ điều hành: Windows 10 Home; Kích thước: 30.4 x 20.3 x 13.9 cm; Trọng lượng: 1.1 kg; Màu Sắc: Xám đen', 25290000, 22190000, 2, 1),
(9, 'Laptop Gaming Asus TUF Dash F15 FX516PC HN002T', 93, 1, 1, 'tuf_dash_f15_fx516pc.png', 'CPU: Intel® Core™ i5-11300H upto 4.40 GHz, 4 cores 8 threads;RAM: 8GB DDR4 3200Mhz Onboard (1x SO-DIMM slot); Ổ cứng:	512GB M.2 PCIe NVMe 3.0; Card đồ họa: NVIDIA® GeForce® RTX 3050 4GB GDDR6;\r\nMàn hình: 15.6 inch FHD (1920*1080) IPS, Non-Glare, 144Hz, Nanoedge; Cổng giao tiếp: 1x Type C USB 4 with Power Delivery, Display Port and Thunderbolt™ 4,3x USB 3.2 Gen 1 Type-A,1x HDMI 2.0b,1x RJ45,1x 3.5mm Combo Audio Jack; Audio:	DTS:X® Ultra; Bàn phím: Backlit Chiclet Keyboard White; Chuẩn LAN: 10/100/1000 Mbps: Chuẩn WIFI: 802.11ax (2X2); Bluetooth: Bluetooth V5.1; Webcam:	None; Hệ điều hành: Windows 10 Home; Pin: 4 Cell 76Whr;Trọng lượng: 2 kg; Màu sắc:	Eclipse Gray;Kích thước: 36.0 x 25.2 x 1.99 cm', 25990000, 24490000, 2, 1),
(10, 'Laptop Asus Zenbook UX425EA KI818T', 98, 1, 1, 'bkp_zenbook_ux425_product_photo_1a_lilac_mist_05_numberpad.jpg', 'CPU:	Intel® Core™ i5-1135G7 (4.20GHz, 8 MB cache, 4 cores 8 threads);\r\nRAM:	16GB 4266MHz LPDDR4X\r\nỔ cứng	512GB PCIe® NVMe™ 3.0 x2 M.2 SSD;\r\nMàn hình:	14.0 inch Full HD (1920 x 1080), anti-glare screen, 400nits brightness display, 100% sRGB;\r\nCard màn hình: 	Intel® Iris® Xe Graphics;\r\nWireless:	WiFi 6 with Gig+ performance (802.11ax);\r\nLAN:	None;\r\nBluetooth:	Bluetooth 5.0;\r\nCổng kết nối:	2 x Thunderbolt™ 4 USB-C® (up to 40Gbps),\r\n1 x USB 3.2 Gen 1 Type-A (up to 5Gbps),\r\n1 x Standard HDMI,\r\n1 x MicroSD card reader;\r\nPin:	4-cell, 67WHrs;\r\nHệ điều hành:	Windows 10 Home;\r\nKích thước:	31.90 x 20.80 x 1.39 ~ 1.39 cm;\r\nTrọng lượng:	1.17 kg;\r\nMàu sắc:	Tím;', 25490000, 0, 1, 1),
(11, 'Laptop Asus Zenbook Duo UX482EA KA081T', 100, 1, 1, 'zenbook_duo_14_ux482_product_photo_1b_celestial_blue_05_2000x2000_f12fa0ce7cf647cab4273a64df4a36e8.jpg', 'CPU:	Intel Core i5-1135G7 2.4GHz up to 4.2GHz 8MB;\r\nRAM:	8GB LPDDR4X 4267MHz;\r\nỔ cứng:	512GB M.2 NVMe™ PCIe® 3.0 SSD;\r\nCard đồ họa:	Intel® Iris Xe Graphics;\r\nMàn hình:	- 14\" FHD (1920 x 1080) 16:9, Touch, IPS-level Panel, Anti-glare display, LED Backlit, 400nits, sRGB: 100%, Pantone Validated, Screen-to-body ratio: 93 %, With stylus support\r\n- Dou-screen 12.65” FHD (1920 x 515) IPS-level Panel Support Stylus;\r\nCổng giao tiếp:	\r\n2x Thunderbolt™ 4 supports display / power delivery,\r\n1x USB 3.2 Gen 1 Type-A,\r\n1x HDMI 1.4,\r\n1x 3.5mm Combo Audio Jack;\r\nAudio:	Harman/Kardon (Premium);\r\nĐọc thẻ nhớ:	MicroSD card reader;\r\nChuẩn LAN:	10/100/1000 Mbps:\r\nChuẩn WIFI:	Wi-Fi 6(802.11ax) (2x2);\r\nBluetooth:	v5.0;\r\nWebcam:	IR HD Camera with facial login;\r\nHệ điều hành:	Windows 10 Home;\r\nPin:	4 Cell 7 Whr;\r\nTrọng lượng:	1.61 kg;\r\nMàu sắc:	Celestial Blue;', 32490000, 0, 1, 1),
(12, 'Laptop Gaming Asus ROG Flow X13 GV301QC K6029T', 100, 1, 1, 'rog_flow_x13__6__dad8b21b5b8746a5b8dba0c69b7d9393.png', 'CPU:	AMD Ryzen™ 9 5980HS Processor 3.1 GHz (16M cache, up to 4.8GHz);\r\nRam:	32GB(16GB + 16GB On board) DDR4 3200MHz;\r\nỔ cứng:	1TB M.2 2230 NVMe™ PCIe® 3.0 SSD;\r\nCard đồ họa:	NVIDIA® GeForce® RTX 3050 4GB GDDR6, VGA rời cắm ngoài eGPU ROG XG Mobile: NVIDIA GeForce RTX 3080 (1810MHz at 150W);\r\n\r\nMàn hình:	13.4 inch 16:10 , FHD (1920 x 1200) IPS 120Hz, 100% sRGB, Pantone Validated, Gorilla Glass;\r\nCổng giao tiếp:	1x 3.5mm Combo Audio Jack,\r\n\r\n1x HDMI 2.0b,\r\n\r\n1x USB 3.2 Gen 2 Type-A,\r\n\r\n1x ROG XG Mobile Interface,\r\n\r\n2x Type C USB 3.2 Gen 2 with Power Delivery and Display Port;\r\n\r\nĐọc thẻ nhớ:	Không;\r\nWebcam:	Có 720P HD;\r\nChuẩn WIFI:	Wi-Fi 6(802.11ax);\r\nBluetooth:	Bluetooth 5.1 (Dual band) 2*2;\r\nAudio:	Smart Amp Technology, Audio by Dolby Atmos, DAC, AI mic noise-canceling, Smart Amp Technology, Built-in array microphone, 2x 1W speaker with Smart Amp Technology;\r\n\r\nHệ điều hành:	Windows 10 Home;\r\nPin:	62WHrs, 4S1P, 4-cell Li-ion;\r\nTrọng lượng:	1.3 kg;\r\nMàu sắc:	Off Black;\r\nKích thước:	29.9 x 22.2 x 1.58 ~ 1.58 cm;', 79990000, 0, 1, 1),
(13, 'Laptop Gaming Acer Predator Helios 300 PH315 54 75YD', 98, 2, 1, 'predator-helios-300-02_60efc2e699084caab27c3da8ea0b40f2.png', 'Hãng sản xuất:\r\n\r\nAcer;\r\n\r\nBảo hành:\r\n\r\n12 Tháng;\r\n\r\nCPU:\r\n\r\nIntel® Core™ i7-11800H upto 4.60GHz, 8 nhân 16 luồng;\r\n\r\nRAM:\r\n\r\n16GB (8x2) DDR4 3200MHz (2x SO-DIMM socket, up to 32GB SDRAM);\r\nỔ cứng:\r\n\r\n512GB SSD M.2 PCIE (nâng cấp tối đa 2TB SSD PCIe NVMe và 2TB HDD 2.5-inch 5400 RPM);\r\n\r\nCard đồ họa:\r\n\r\nNVIDIA® GeForce RTX™ 3060 6GB GDDR6;\r\n\r\nMàn hình:\r\n\r\n15.6\" QHD (2560 x 1440) IPS, 165Hz slim bezel LCD, Acer ComfyView LED-backlit TFT LCD, 300 nits, 100% sRGB;\r\n\r\nÂm thanh:\r\n\r\nDTS® X:Ultra Audio;\r\n\r\nCổng giao tiếp:\r\n\r\n1 x Cổng USB Type-C USB 3.2 Gen 2 (up to 10 Gbps)\r\n1 x Cổng USB 3.2 Gen 2 cổng có tính năng sạc USB tắt nguồn\r\n2 x Cổng USB 3.2 Gen 1 \r\n1 x Cổng HDMI®2.1 hỗ trợ HDCP\r\n1 x Cổng Mini DisplayPort 1.4\r\n1 x Cổng 3.5 mm headphone/speaker\r\n1 x Cổng Ethernet (RJ-45);\r\n\r\nĐọc thẻ nhớ:\r\n\r\nNone;\r\n\r\nChuẩn LAN:\r\n\r\nKiller™ Ethernet E2600;\r\n\r\nChuẩn WIFI:\r\n\r\nKillerTM Wi-Fi 6 AX 1650i;\r\n\r\nBluetooth:\r\n\r\nv5.1;\r\n\r\nBàn phím:	Led RGB 4 Vùng;\r\nWebcam:\r\n\r\nAcer Crystal Eye 720p;\r\n\r\nHệ điều hành:\r\n\r\nWindows 10 Home;\r\n\r\nPin:\r\n\r\n4 Cell 59 WHr;\r\n\r\nTrọng lượng:\r\n\r\n2.3 kg;\r\n\r\nMàu sắc:\r\n\r\nAbyssal Black;\r\n\r\nKích thước:\r\n\r\n363 (W) x 255 (D) x 22.9 (H) mm;', 39990000, 0, 1, 1),
(14, 'Laptop Gaming Acer Aspire 7 A715 42G R05G', 98, 2, 1, 'aspire_a715__3__1d809be5d81149438be815d876b751f0.jpg', 'CPU:	AMD Ryzen 5 – 5500U (6 nhân 12 luồng);\r\nRAM:	8GB DDR4 (2x SO-DIMM socket, up to 32GB SDRAM);\r\nỔ cứng:	512GB PCIe® NVMe™ M.2 SSD;\r\nCard đồ họa:	NVIDIA GeForce GTX 1650 4GB GDDR6;\r\nMàn hình:	15.6\" FHD (1920 x 1080) IPS, Anti-Glare, 144Hz\r\nCổng giao tiếp	1x USB 3.0\r\n1x USB Type C\r\n2x USB 2.0\r\n1x HDMI\r\n1x RJ45;\r\nỔ quang:	None;\r\nAudio:	True Harmony; Dolby® Audio Premium;\r\nĐọc thẻ nhớ:	None;\r\nChuẩn LAN:	10/100/1000/Gigabits Base T;\r\nChuẩn WIFI:	Wi-Fi 6(Gig+)(802.11ax) (2x2);\r\nBluetooth:	v5.0;\r\nWebcam:	HD Webcam;\r\nHệ điều hành:	Windows 11 Home;\r\nPin:	4 Cell 48Whr;\r\nTrọng lượng:	2.1 kg;\r\nMàu sắc:	Đen, Có đèn bàn phím;\r\nKích thước:	363.4 x 254.5 x 23.25 (mm);', 22990000, 20390000, 2, 1),
(15, 'Laptop MSI Modern 15 A5M 238VN', 100, 3, 1, '20887_laptop_msi_modern_15_a5m_239vn_2_dac0f430fbf8490cbc9b40bce770b014.jpg', 'CPU:\r\n\r\nRyzen 5 5500U 6 Nhân 12 Luồng ;\r\n\r\nRAM:\r\n\r\n8GB DDR4 3200Mhz  (trống 1 khe, up to 64GB SDRAM);\r\n\r\nỔ cứng:\r\n\r\n512GB NVMe PCIe Gen 3x4 SSD (2x M.2 SSD slot (NVMe PCIe Gen3x4));\r\n\r\nCard đồ họa:\r\n\r\nAMD Radeon™ Graphics;\r\n\r\nMàn hình:\r\n\r\n15.6 inch FHD (1920*1080), IPS-Level , 45% NTSC;\r\n\r\nCổng giao tiếp:\r\n\r\n2x Type-A USB3.2 Gen2\r\n1x (4K @ 30Hz) HDMI\r\n1x Type-C USB3.2 Gen2\r\n1 x cổng sạc;\r\n\r\nBàn phím:\r\n\r\nBacklight Keyboard (Single-Color, White);\r\n\r\nChuẩn LAN:\r\n\r\nKhông có;\r\n\r\nChuẩn WIFI:\r\n\r\n802.11ax Wifi 6;\r\n\r\nBluetooth:\r\n\r\nBluetooth v;\r\n\r\nWebcam:\r\n\r\nHD 720p 30fps;\r\n\r\nHệ điều hành:\r\n\r\nWindows 11 Home;\r\n\r\nPin:\r\n\r\n3 cell, 52Whr;\r\n\r\nTrọng lượng:\r\n\r\n1.6 kg;\r\n\r\nMàu sắc:\r\n\r\nXám đen;\r\n\r\nKích thước:\r\n\r\n356.8 x 233.7 x 18.9 mm;', 17990000, 0, 1, 1),
(16, 'Laptop Gaming MSI Bravo 15 B5DD 275VN', 96, 3, 1, 'msi_bravo_15__1__5c1c9deb46b84608a521703fc26da48f.jpg', 'CPU:	AMD Ryzen 7-5800H 3.20GHz upto 4.40GHz, 8 cores 16 threads;\r\nRAM:	DDR4 8GB (1 x 8GB) 3200MHz; 2 slots, Up to 64GB;\r\nỔ cứng:	512GB NVMe PCIe Gen3x4 SSD;\r\nCard đồ họa:	Radeon RX5500M 4GB;\r\nMàn hình:	15.6 inch FHD (1920*1080), 60Hz 45%NTSC IPS-Level;\r\nCổng giao tiếp:	\r\n1x (4K @ 30Hz) HDMI\r\n\r\n1x RJ45\r\n\r\n2x Type-C USB3.2 Gen1\r\n\r\n2x Type-A USB3.2 Gen1;\r\n\r\nBàn phím:	Backlight Keyboard ( Red );\r\nChuẩn LAN:	Gb LAN;\r\nChuẩn WIFI:	Wi-Fi 6E; \r\nBluetooth:	Bluetooth v5.1;\r\nWebcam:	HD type (30fps@720p);\r\nHệ điều hành:	Windows 11 Home;\r\nPin:	3 Cell 53.5WHr;\r\nTrọng lượng:	2.35 kg;\r\nMàu sắc:	Đen;\r\nKích thước:	359 x 259 x 24.95 mm;', 25990000, 23990000, 2, 1),
(17, 'Laptop MSI Creator Z16 A11UET 218VN', 86, 3, 1, '1024__1__bebff7b7618a4878a9008bd6d267becf.png', 'CPU:	Intel® Core™ i9-11900H 8 nhân 16 luồng;\r\nRAM:	32GB (2 x 16 GB) DDR4 3200MHz (2x SO-DIMM socket, up to 64GB SDRAM);\r\nỔ cứng:	1TB M.2 NVMe PCIe Gen4x4;\r\nCard đồ họa:	NVIDIA® GeForce RTX™ 3060, 6GB GDDR6;\r\nMàn hình:	16 inch QHD+ (2560*1600), 120Hz DCI-P3 100% typical, Finger Touch panel;\r\nCổng giao tiếp:	1x Micro SD\r\n2x Type-A USB3.2 Gen2\r\n2x Type-C (USB / DP / Thunderbolt™ 4)\r\n1x Mic-in/Headphone-out Combo Jack\r\nAudio	Nahimic 3 / Hi-Res Audio, Dynaudio Speakers 2W*4;\r\nBàn phím:	Per key RGB MiniLED keyboard by Steelseries;\r\nChuẩn LAN:	-;\r\nChuẩn WIFI:	Killer ax Wi-Fi 6E (802.11ax);\r\nBluetooth:	v5.2;\r\nWebcam:	IR HD type (30fps@720p);\r\nHệ điều hành:	Windows 10 Home;\r\nPin:	90 Whr;\r\nTrọng lượng:	2.2 kg;\r\nKích thước:	359 x 256 x 15.9 mm;', 66990000, 64990000, 2, 1),
(18, 'Laptop MSI Summit E13 Flip Evo A11MT 211VN', 100, 3, 1, 'images_74a374004d4c4d7a8efdc8ee53f98af5.jpeg', 'CPU:	Intel® Core™ i7-1185G7 upto 4.80GHz, 4 cores 8 threads;\r\nRAM:	16GB LPDDR4X onboard;\r\nỔ cứng:	1TB SSD NVMe PCIe Gen4;\r\nCard đồ họa:	Intel Iris X Graphics;\r\nMàn hình:	13.4 inch FHD+ (1920x1200), 16:10, IPS-Level, Support MSI Pen - Cảm ứng;\r\nCổng giao tiếp:	1x Type-C USB3.2 Gen2\r\n1x Type-A USB3.2 Gen1\r\n2x Type-C (USB4 / DP / Thunderbolt™4) with PD charging\r\n1x Mic-in/Headphone-out Combo Jack;\r\nAudio:	2 Loa Hi-Resolution Audio và Nahimic Audio;\r\nBàn phím:	White backlight keyboard;\r\nĐọc thẻ nhớ:	Micro SD;\r\nChuẩn WIFI:	802.11 ax Wi-Fi 6E ;\r\nBluetooth:	Bluetooth v5.2;\r\nWebcam:	IR HD type (30fps@720p);\r\nHệ điều hành:	Windows 10 Home;\r\nPin:	4 Cell, 70Wh;\r\nTrọng lượng:	1.35 kg;\r\nMàu sắc:	Đen;\r\nKích thước:	300.2 x 222.25 x 14.9 mm;', 39990000, 37990000, 2, 1),
(19, 'Bàn phím Dare-U LK135', 95, 10, 3, 'gearvn-dareu-lk135_large.jpg', 'Hãng sản xuất:\r\n\r\nDareU;\r\n\r\nChủng loại:\r\n\r\nDareU LK135;\r\n\r\n \r\n\r\nChuẩn bàn phím:\r\n\r\nCó dây;\r\n\r\nChuẩn giao tiếp:\r\n\r\nUSB 2.0;\r\n\r\nMàu:\r\n\r\nĐen;\r\n\r\nĐèn bàn phím:\r\n\r\nN/A;\r\n\r\nNgôn ngữ:\r\n\r\nTiếng Anh;\r\n\r\nCác chứng năng đặc biệt:\r\n\r\nKhả năng chống bụi, chống nước;\r\n\r\n \r\n\r\nPhụ kiện đi kèm\r\n\r\nHộp', 240000, 0, 1, 1),
(20, 'Lót Chuột Dare-U EQ200 RGB', 100, 10, 2, 'gearvn-mousepad-eq200-rgb-1.jpg', 'Nhà sản xuất: Dare-U;\r\n\r\nBề mặt: Speed - Trơn;\r\n\r\nTình trạng: Mới - 100%;\r\n\r\nKích thước Medium: 350 x 250 x 3.5mm;', 590000, 0, 1, 1),
(21, 'Tai nghe DareU A710 RGB Wireless', 94, 10, 4, 'gearvn-tai-nghe-dareu-a710-rgb-wireless-1_7e91046bc4bb4ac6bf69e6acb60fb7a1_large.jpg', 'Thương hiệu:\r\n\r\nDareU;\r\n\r\nBảo hành:\r\n\r\n12 tháng;\r\n\r\nSeries/Model:\r\n\r\nA710 Wireless;\r\n\r\nMàu sắc:\r\n\r\nĐen;\r\n\r\nKiểu tai nghe:\r\n\r\nOver-ear;\r\n\r\nKiểu kết nối:\r\n\r\nKhông dây;\r\n\r\nLED:\r\n\r\nRGB ;\r\n\r\nChuẩn kết nối:\r\n\r\n5.8GHz + Type-C + 3.5mm;\r\n\r\nMicrophone:\r\n\r\nCó thể tháo rời;\r\n\r\nTrở kháng:\r\n\r\n24 +- 15% (Ohm);\r\n\r\nChất liệu khung:\r\n\r\nNhựa;\r\n\r\nChất liệu đệm tai nghe:\r\n\r\nDa mềm cao cấp;\r\n\r\nTương thích:\r\n\r\nWindows / MacOS / PS / Xbox / Switch / Android;\r\n\r\nChức năng đặc biệt: \r\n\r\nDung lượng pin 1400mAh; Thời lượng pin từ 10h->12h;', 14990000, 1390000, 2, 1),
(22, 'Màn hình cong Acer Predator X34P 34\" IPS 2K 120Hz G-Sync UW QHD\r\n', 100, 2, 5, 'acer_x34p_gearvn2_large.jpg', 'Thương hiệu:\r\n\r\nAcer;\r\n\r\nBảo hành:\r\n\r\n36 tháng;\r\n\r\nKích thước:\r\n\r\n34\";\r\n\r\nĐộ phân giải:\r\n\r\n2K 3440x1440;\r\n\r\nTấm nền:\r\n\r\nIPS;\r\n\r\nTần số quét:\r\n\r\nOC 120 Hz;\r\n\r\nThời gian phản hồi:\r\n\r\n4 ms;\r\n\r\nKiểu màn hình (phẳng/cong):\r\n\r\nCong;\r\n\r\nĐộ sáng:\r\n\r\n300 nits;\r\n\r\nGóc nhìn:\r\n\r\n178° (H) / 178° (V);\r\n\r\nKhả năng hiển thị màu sắc:\r\n\r\n100% sRGB;\r\n\r\nĐộ tương phản tĩnh:\r\n\r\n1,000:1;\r\n\r\nĐộ tương phản động:\r\n\r\n100,000,000:1;\r\n\r\nCổng xuất hình:\r\n\r\nDisplayPort;\r\n\r\nHDMI;\r\n\r\nTính năng đặc biệt:\r\n\r\nDải LED Acer Ambient Lighting;\r\n\r\nHỗ trợ NVIDIA G-Sync;\r\n\r\nLoa kép 7W x 2;\r\n\r\nHỗ trợ chuẩn VESA 100x100;\r\n\r\nKhối lượng:\r\n\r\nKhông kèm chân: 6.76 kg;\r\n\r\nKèm chân đế: 9.8 kg;\r\n\r\nTiêu thụ điện:\r\n\r\n66W;\r\n\r\nKích thước chuẩn:\r\n\r\n817 x 571 x 299 (mm);\r\n\r\nPhụ kiện đi kèm:\r\n\r\nHướng dẫn sử dụng;\r\n\r\nCáp DisplayPort;', 29190000, 0, 1, 1),
(23, 'Màn hình HP OMEN 27i 27\" Nano IPS 2K 165Hz 1ms chuyên game', 98, 4, 5, 'hp_omen_27i_gearvn_590f29cab1184eea8c2df75c79517555_large.jpg', '-Nhà sản xuất : HP\r\n\r\n-Tình trạng : NEW - 100%\r\n\r\n-Bảo hành : 36 tháng', 16990000, 15990000, 2, 1),
(24, 'Laptop Gaming HP VICTUS 16 e0177AX 4R0U9PA', 99, 4, 1, 'hp_victus_16_e0177ax_4r0u9pa_a_4234f78875e047b6bcebd643f31b72ec.png', 'Thương hiệu	HP;\r\nBảo hành	12 tháng;\r\nModel	HP VICTUS 16 e0177AX 4R0U9PA;\r\nCPU	AMD Ryzen 5 5600H;\r\nRAM	8GB (2x4GB) DDR4 3200Mhz (2 khe, max 64GB RAM);\r\nỔ cứng	512GB SSD M.2 PCIE (2x M.2 SATA/NVMe);\r\nCard đồ họa	NVIDIA® GeForce GTX™ 1650 Laptop GPU;\r\nMàn hình	16.1\" FHD (1920 x 1080) IPS, 144Hz;\r\nCổng giao tiếp	1x RJ45 LAN port\r\n1x 3.5mm Combo Audio Jack\r\n1x SuperSpeed USB Type-C 5Gbps signaling rate (DisplayPort™ 1.4, HP Sleep and Charge)\r\n1x SuperSpeed USB Type-A 5Gbps signaling rate (HP Sleep and Charge)\r\n2x SuperSpeed USB Type-A 5Gbps signaling rate;\r\nChuẩn WIFI	802.11AX ;\r\nBluetooth	v5.2;\r\nWebcam	HD 720p;\r\nHệ điều hành	Windows 10 Home;\r\nPin	4 Cell 70WHr Li-ion polymer;\r\nTrọng lượng	2.46 kg;\r\nMàu sắc	Mica Silver;\r\nKích thước	37 x 26 x 23.5 cm;', 22990000, 22490000, 2, 1),
(25, 'Chuột HP X4000b', 100, 4, 2, 'gearvn.com-products-chuot-hp-x4000b-1_5d4bf0663f7141a8b28ba235cd000651.jpg', 'Hãng sản xuất:	HP;\r\nModel:	HP X4000b;\r\nCảm biến: 	Quang học;\r\nĐộ phân giải:	1000 dpi;\r\nĐịnh dạng dữ liệu USB: 	16 bit/trục;\r\nKết nối:	Không dây;\r\nBluetooth:	4.0;\r\nTrọng lượng: 	117 g;\r\nTrọng lượng thêm tùy chọn:	lên tới 30g; (pin AA);', 490000, 0, 1, 1),
(26, 'Laptop Gaming Dell G15 5511 70266676', 100, 6, 1, '60646_laptop_dell_gaming_g5_5511_5_1e5b4b823de442058b5687efab399e58.jpg', 'CPU	Intel Core i5-11400H, up to 4.5GHz 12MB;\r\nRAM	8GB (2x4GB) DDR4 3200hz (2x SO-DIMM socket, up to 32GB SDRAM);\r\nỔ cứng	256GB SSD M.2 PCIe (2 slots);\r\nCard đồ họa	NVIDIA GeForce RTX 3050 4GB GDDR6 + Intel UHD Graphics;\r\nMàn hình	15.6 inch FHD (1920*1080) 120Hz, 250 nits WVA Anti- Glare LED Backlit Narrow;\r\nCổng giao tiếp	1x USB 3.2 Gen 2 Type-C with DisplayPort\r\n1x USB 3.2 Gen 1 with PowerShare\r\n2x USB 3.2 Gen 1\r\n1x LAN RJ-45\r\n1x Jack audio 3.5\r\n1x HDMI;\r\nBàn phím	Orange Backlit Keyboard;\r\nChuẩn LAN	10/100/1000 GbE LAN;\r\nChuẩn WIFI	802.11AX (WiFi 6);\r\nBluetooth	Bluetooth V5.0;\r\nWebcam	HD 720p;\r\nHệ điều hành	Windows 11 Home;\r\nPin	3 Cell ;\r\nTrọng lượng	2.81 kg;\r\nMàu sắc	Dark Shadow Grey;\r\nKích thước	35.7 x 27.2 x 2.5 cm;', 27990000, 26990000, 2, 1),
(27, 'Màn hình Dell UltraSharp U2422HE 24\" IPS USBC RJ45', 100, 6, 5, 'k3_4b9ceeb7d2bf4f37af2931456bcf7609.jpg', 'Thương hiệu:\r\n\r\nDell;\r\n\r\nBảo hành:\r\n\r\n36 tháng;\r\n\r\nKích thước:\r\n\r\n24\";\r\n\r\nĐộ phân giải:\r\n\r\nFullHD 1920x1080;\r\n\r\nTấm nền:\r\n\r\nIPS;\r\n\r\nTần số quét:\r\n\r\n60 Hz;\r\n\r\nThời gian phản hồi:\r\n\r\n5 ms;\r\n\r\nKiểu màn hình (phẳng/cong):\r\n\r\nPhẳng;\r\n\r\nĐộ sáng:\r\n\r\n250 nits;\r\n\r\nGóc nhìn:\r\n\r\n178° (H) / 178° (V);\r\n\r\nKhả năng hiển thị màu sắc:\r\n\r\n100% sRGB, 100% Rec709, 85% DCI-P3;\r\n\r\nĐộ tương phản tĩnh:\r\n\r\n1,000:1;\r\n\r\nĐộ tương phản động:\r\n\r\n100,000,000:1;\r\n\r\nCổng xuất hình:\r\n\r\n1 x Cổng DP 1.4\r\n1 x Cổng HDMI 1.4\r\n1 x Cổng DisplayPort (đầu ra) với MST\r\n1 x Cổng USB Type-C (chế độ Altenrate với Display POrt 1.4, Power Delivery tối đa 90W)\r\n1 x Cổng ngược dòng USB Type-C (chỉ dữ liệu 10GPBs USB 3.2 gen 2)\r\n1 x Cổng hạ lưu USB Loại C với khả năng sạc ở mức 15W (Tối đa)\r\n1 x USB siêu tốc độ 10Gbps với khả năng sạc BC1.2 ở 2 A (tối đa)\r\n3 x USB siêu tốc độ 10 Gbps (Thế hệ USB 3.2 2) cổng hạ lưu\r\n1 x cổng ra âm thanh\r\n1 x cổng LAN RJ45;\r\n\r\nTính năng đặc biệt:\r\n\r\nHỗ trợ chuẩn VESA 100x100;\r\n\r\nKhối lượng:\r\n\r\n3.95 kg;\r\n\r\nTiêu thụ điện:\r\n\r\n11.8W;\r\n\r\nKích thước chuẩn:\r\n\r\n538 x 363 x 180 (mm);\r\n\r\nPhụ kiện đi kèm:\r\n\r\n1 x cáp DisplayPort\r\n\r\n1 x cáp USB SuperSpeed ​​- USB Type C to A\r\n\r\n1 x cáp USB Type C to C;', 7990000, 0, 1, 1),
(28, 'Chuột Logitech G502 Hero KDA', 96, 7, 2, 'thumbchuot_be9a45ef2bec4b7e9dfaf83c2d37ad27.png', 'Hãng sản xuất:	Logitech;\r\nModel:	Logitech G502 Hero KDA;\r\nCảm biến: 	HERO™;\r\nĐộ phân giải:	100 - 25.600 dpi;\r\nTăng tốc tối đa:	> 40 G;\r\nTốc độ tối đa:	> 400 IPS;\r\nĐịnh dạng dữ liệu USB: 	16 bit/trục;\r\nTốc độ báo cáo USB: 	1000 Hz (1ms);\r\nBộ vi xử lý: 	ARM 32-bit;\r\nChân PTFE:	> 250 ki-lô-mét;\r\nBộ nhớ tích hợp: 	Tối đa 5 cấu hình (yêu cầu phần mềm 127.1.7);\r\nLIGHTSYNC RGB:	1 khu vực;\r\n\r\n\r\nTương thích:	\r\nWindows® 7 trở lên\r\nmacOS 10.11 trở lên\r\nChrome OS™;\r\nCổng USB\r\nKết nối Internet tới G HUB Logitech (tùy chọn);\r\nTrọng lượng: 	121 g, chỉ chuột;\r\nTrọng lượng thêm tùy chọn:	lên tới 18 g (5x3,6g);\r\nĐộ dài dây: 	2,10 m;\r\nKích thước:	132x75x40 mm;', 1790000, 0, 1, 1),
(29, 'Tai nghe Logitech G733 KDA Lightspeed Wireless', 101, 7, 4, 'g733_6f97109db5774b769bf60c5d225d8254.png', 'Thương hiệu:\r\n\r\nLogitech;\r\n\r\nBảo hành:\r\n\r\n24 tháng;\r\n\r\nSeries/Model:\r\n\r\nG733 KDA LightSpeed Wireless;\r\n\r\nMàu sắc:\r\n\r\nTrắng;\r\n\r\nKiểu tai nghe:\r\n\r\nOver-ear;\r\n\r\nKiểu kết nối:\r\n\r\nKhông dây;\r\n\r\nLED:\r\n\r\nCó LED RGB ;\r\n\r\nChuẩn kết nối:\r\n\r\nReciever USB type A;\r\n\r\nMicrophone:\r\n\r\nCó thể tháo rời;\r\n\r\nTrở kháng:\r\n\r\n1kHz 32Ohm;\r\n\r\nTần số:\r\n\r\n20Hz - 20KHz;\r\n\r\nKhả năng cách âm:\r\n\r\nCó;\r\n\r\nChất liệu khung:\r\n\r\nNhựa;\r\n\r\nChất liệu đệm tai nghe:\r\n\r\nVải thoáng;\r\n\r\nPhụ kiện đi kèm:\r\n\r\nHướng dẫn sử dụng;\r\n\r\nUSB Reciever;\r\n\r\nCáp sạc USB type A to USB type C;\r\n\r\nTương thích:\r\n\r\nWindows 7 trở lên / MacOS X 10.12 trở lên / PlayStation 4;\r\n\r\nChức năng đặc biệt: \r\n\r\nCông nghệ kết nối không dây Lighspeed độc quyền Logitech;', 3999000, 3499000, 2, 1),
(30, 'Lót chuột Logitech G640 Gaming Mousepad', 100, 7, 2, 'gearvn-lot-chuot-logitech-g640-gaming-mousepad-666_3f85209c3bbd48e5beb1ce9f8eb0b13a.jpg', 'Hãng sản xuất:	Logitech;\r\nModel:	G640 Gaming Mousepad;\r\nChiều cao:	400 mm;\r\nChiều rộng:	460 mm;\r\nChiều dày:	3 mm;\r\nTrọng lượng: 	352 g;', 500000, 0, 1, 1),
(31, 'Sản phẩm của Vy 1', 0, 10, 4, '268188799_4604550196303631_4712683724326994945_n.jpg', 'hơi bị xịn', 15092001, 0, 1, 0),
(32, 'Laptop Gaming Dell G15 5511 7026667666666666', 0, 3, 1, 'sugoi.jpg', 'sản phẩm khác 1 chút xíu cái tên đã có', 15092001, 0, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `showsanpham`
--

CREATE TABLE `showsanpham` (
  `MaHang` int(11) NOT NULL,
  `TenMuc` varchar(100) NOT NULL,
  `TrangThai` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `showsanpham`
--

INSERT INTO `showsanpham` (`MaHang`, `TenMuc`, `TrangThai`) VALUES
(1, 'Sản Phẩm Nổi Bật', b'01'),
(2, 'Sản phẩm giảm giá', b'01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTaiKhoan` int(10) NOT NULL,
  `HoLot` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ten` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `MatKhau` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `KichHoat` int(2) NOT NULL,
  `Quyen` int(11) NOT NULL,
  `GhiChu` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaTaiKhoan`, `HoLot`, `Ten`, `Email`, `Phone`, `MatKhau`, `KichHoat`, `Quyen`, `GhiChu`) VALUES
(1, 'Phan Thế', 'Hiếu', 'phan2001hieu@gmail.com', '0909607426', '123', 1, 1, ''),
(2, 'Trương Nhật', 'Vy', 'nhatvy.truong1@gmail.com', '0814840484', '123', 1, 0, ''),
(3, 'Phan Thế', 'Hiếu', 'phanhieu110101@gmail.com', '0935357395', '123', 0, 0, ''),
(4, 'Nguyễn Hữu', 'Vinh', 'nhatvy.truong1@gmail.com1', 'aaa', '123', 0, 0, ''),
(5, '@@@', '@@@', 'nhatvy.truong1@gamil.com', 'aaaaaa', '1@@@', 0, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `MaThuongHieu` int(11) NOT NULL,
  `TenThuongHieu` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TrangThai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`MaThuongHieu`, `TenThuongHieu`, `TrangThai`) VALUES
(1, 'Asus', 0),
(2, 'Acer', 0),
(3, 'MSI', 0),
(4, 'HP', 1),
(5, 'Lenovo', 1),
(6, 'Dell', 1),
(7, 'Logitech', 1),
(8, 'Razer', 1),
(9, 'Zowie', 1),
(10, 'Dare-U', 1),
(11, 'Akko', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MaDanhMuc`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDonHang`),
  ADD KEY `MaTaiKhoan` (`MaTaiKhoan`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MaPN`),
  ADD KEY `MaTaiKhoan` (`MaTaiKhoan`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `MaThuongHieu` (`MaThuongHieu`),
  ADD KEY `MaDanhMuc` (`MaDanhMuc`);

--
-- Chỉ mục cho bảng `showsanpham`
--
ALTER TABLE `showsanpham`
  ADD PRIMARY KEY (`MaHang`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTaiKhoan`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`MaThuongHieu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MaDanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `MaPN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `showsanpham`
--
ALTER TABLE `showsanpham`
  MODIFY `MaHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTaiKhoan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `MaThuongHieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaThuongHieu`) REFERENCES `thuonghieu` (`MaThuongHieu`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`MaDanhMuc`) REFERENCES `danhmuc` (`MaDanhMuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
