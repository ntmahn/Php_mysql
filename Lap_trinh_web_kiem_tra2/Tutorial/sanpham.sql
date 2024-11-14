-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 14, 2024 lúc 05:13 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ktra2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `mahang` varchar(5) NOT NULL,
  `tenhang` varchar(30) NOT NULL,
  `giahang` decimal(10,0) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `hinhanh` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`mahang`, `tenhang`, `giahang`, `diachi`, `hinhanh`) VALUES
('DA001', 'Chung cư tòa C Westbay', 1, 'chung cư tòa C Westbay hướng Bắc, Ecopark Văn Giang', 'DA001.jpg'),
('DA002', 'chung cư Sunshine Riverside Tâ', 1, 'Sunshine Riverside, Phường Phú Thượng, Tây Hồ, Hà Nội', 'DA002.jfif'),
('DA003', 'Chung cư GoldView', 1, '346 Bến Vân Đồn, Quận 4, TP. Hồ Chí Minh', 'DA003.jfif'),
('DA004', 'Vinhomes Central Park', 1, '208 Nguyễn Hữu Cảnh, Quận Bình Thạnh, TP. Hồ Chí Minh', 'DA004.jfif'),
('DA005', 'The Sun Avenue', 1, '28 Mai Chí Thọ, An Phú, Quận 2, TP. Hồ Chí Minh', 'DA005.jfif'),
('DA006', 'Times City', 1, '458 Minh Khai, Hai Bà Trưng, Hà Nội', 'DA006.jfif');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`mahang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
