-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 01, 2024 lúc 02:24 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `mahang` varchar(5) NOT NULL,
  `tenhang` varchar(30) NOT NULL,
  `giahang` decimal(10,0) NOT NULL,
  `hinhanh` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`mahang`, `tenhang`, `giahang`, `hinhanh`) VALUES
('SP01', 'Bot Giat OMO', 200000, 'botgiatomo.jpg'),
('SP03', 'Bot giat Sufff', 250000, 'botgiatsuf.jpg'),
('SP111', 'sdfsafdsafsa', 0, 'bai-3.png'),
('SP112', 'fdfgdsgfds', 0, 'anh7.jpg'),
('SP114', 'San pham tot', 0, 'anh7.jpg'),
('SP115', 'San pham chua tot', 0, 'anh7.jpg'),
('SP15', 'San pham kem danh rang', 0, 'anh1.jpg'),
('SP2', 'Sua rua mat tri mun', 1500000, 'botgiatlix.jpg'),
('SP20', 'kem danh rang', 0, 'anh4.jpg'),
('SP4', 'Sua tam LIX', 1500000, 'botgiatlix.jpg'),
('SP40', 'May do hoi nuoc', 0, 'anh4.jpg');

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
