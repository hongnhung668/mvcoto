-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 28, 2020 lúc 03:52 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mvcoto`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminPass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'lee', 'lee@gmail.com', 'leeadmin', '12345', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogger`
--

CREATE TABLE `blogger` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminID` int(11) NOT NULL,
  `is_public` int(11) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogger`
--

INSERT INTO `blogger` (`ID`, `title`, `content`, `image`, `adminID`, `is_public`, `createdate`, `updatedate`) VALUES
(26, 'BMW', 'Hãy biến nó thành của bạn', '49f2b6c4bd.png', 1, 1, '2020-11-21 17:02:55', '2020-11-19 22:00:47'),
(27, 'PORSCHE', 'đừng hài lòng với những điều bình thường sự độc đáo được thể hiện qua PORSCHE', 'c5e1ad1e0d.png', 1, 1, '2020-11-20 16:54:08', '2020-11-19 22:36:46'),
(29, 'JAGUAR', 'sự độc đáo luôn thể hiện', '60eb3ab48d.png', 1, 1, '2020-11-20 16:19:47', '2020-11-20 23:19:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `brandID` int(11) NOT NULL,
  `brandName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`brandID`, `brandName`) VALUES
(1, 'Audi'),
(3, 'BMW'),
(5, 'Ford'),
(9, 'Lexus'),
(10, 'Mercedes'),
(11, 'Mazda'),
(18, 'Porsche'),
(19, 'Jaguar'),
(20, 'Maserati'),
(21, 'Land Rover'),
(22, 'Rolls Royce'),
(23, 'Pagani'),
(24, 'McLaren'),
(25, 'Bugatti'),
(26, 'Bentley'),
(27, 'Lamborghini'),
(28, 'Aston Martin'),
(29, 'Ferrari'),
(30, 'Genesis');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `sID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cartID`, `productID`, `sID`, `productName`, `price`, `quantity`, `image`) VALUES
(1, 4, '8f9hp0tots39cvpf8rs0e31vas', 'Audi Q8', '4505000000', 4, '562fa358ca.png'),
(2, 3, '8f9hp0tots39cvpf8rs0e31vas', 'Audi Q7', '1420000000', 1, 'd92322336a.png'),
(3, 8, '8f9hp0tots39cvpf8rs0e31vas', 'Audi R8', '4500000000', 1, 'db4b758942.png'),
(4, 22, '8f9hp0tots39cvpf8rs0e31vas', 'Ford Mustang', '4400000000', 1, '968ab9c12d.png'),
(12, 21, 'q9la6u0kqv944g25cpvjq5bmok', 'Ford Mustang', '4400000000', 1, '6f25ced846.png'),
(13, 32, '4e520qc18if318nlp5t2s2s5ca', 'Jaguar F–Type', '12800000000', 1, '21a2f813ce.png'),
(15, 55, 'vug2798jibkpmra3fbj9q1g3om', 'Rolls Royce Dawn', '36000000000', 3, '472e78a878.png'),
(16, 51, 'vug2798jibkpmra3fbj9q1g3om', 'Lamborghini Urus', '10900000000', 1, '36d1dd6463.png'),
(17, 47, 'vug2798jibkpmra3fbj9q1g3om', 'Bentley Continental', '23000000000', 3, '2a4350581f.png'),
(24, 54, 'nq1lfhm871mei7g8tmm428fn24', 'Rolls Royce Dawn', '36000000000', 1, '71dbb87bcf.png'),
(67, 56, 'g48blvvm7r2fakjr4npieumq0e', 'Porsche Panamera', '11050000000', 1, '70fcffdae3.png'),
(68, 33, 'g48blvvm7r2fakjr4npieumq0e', 'Jaguar XJL Autobiography', '10052000000', 1, '56843dd4c8.png'),
(69, 57, '4el1mn9ehdb18q0f23sh7gujvb', 'Porsche 911 Carrera S Cabriolet', '7770000000', 3, '684e71066b.png'),
(70, 52, 'o57s8rgbojb49kc03roqeql8kt', 'Lamborghini Urus', '10900000000', 1, '936191a276.png'),
(71, 8, 'o57s8rgbojb49kc03roqeql8kt', 'Audi R8', '4500000000', 1, 'db4b758942.png'),
(72, 53, 'der0nrtml4b7ub2kdvi3ee126a', 'Rolls Royce Cullinan', '41277000000', 1, 'dff915640a.png'),
(73, 53, 'ed6gbknensa5bpsq4oehik9g0h', 'Rolls Royce Cullinan', '41277000000', 1, 'dff915640a.png'),
(74, 50, 'ed6gbknensa5bpsq4oehik9g0h', 'Lamborghini Aventador', '60000000000', 1, '0315b9efa3.png'),
(75, 15, 'hnvgfdmo52bvq2l0nv3qu6r4qm', 'BMW M6', '6688000000', 1, 'be498e4dff.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `catID` int(11) NOT NULL,
  `catName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`catID`, `catName`) VALUES
(1, 'Hatchback'),
(2, 'Sedan'),
(3, 'Coupe'),
(4, 'Convertible &amp; spyder'),
(5, 'SUV'),
(6, 'CUV'),
(7, 'MPV'),
(8, 'Pick-up');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `binhluanID` int(11) NOT NULL,
  `tenbinhluan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `binhluan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `productID` int(11) NOT NULL,
  `blogID` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`binhluanID`, `tenbinhluan`, `binhluan`, `productID`, `blogID`, `image`) VALUES
(1, 'Gin', 'sgag', 8, 0, ''),
(2, 'Gin', 'sgag', 8, 0, ''),
(3, 'Gin', 'sgagfdb', 8, 0, ''),
(4, 'sv', 'sgsz', 57, 0, ''),
(5, 'sv', 'sgsz', 57, 0, ''),
(6, 'sv', 'sgsz', 57, 0, ''),
(7, 'Gin', 'hgsh', 57, 0, ''),
(8, 'Gin', 'hgsh', 57, 0, ''),
(9, 'yến', 'sản phẩm đẹp quá', 50, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `compare`
--

CREATE TABLE `compare` (
  `ID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `compare`
--

INSERT INTO `compare` (`ID`, `customerID`, `productID`, `productName`, `price`, `image`) VALUES
(7, 1, 53, 'Rolls Royce Cullinan', '41277000000', 'dff915640a.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `City` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Zipcode` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`ID`, `Name`, `Address`, `City`, `Zipcode`, `Phone`, `Email`, `Password`) VALUES
(1, 'Gin', 'Hà Nội', 'Hà Nội', '1', '12345678', 'Gin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productName` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `catID` int(11) NOT NULL,
  `brandID` int(11) NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`productID`, `productName`, `catID`, `brandID`, `product_desc`, `type`, `price`, `image`) VALUES
(1, 'Audi A5', 3, 1, '<p>Nhập khẩu</p>', 0, '2500000000', 'ec31db1fc1.png'),
(2, 'Audi A7', 3, 1, '<p>Nhập khẩu</p>', 1, '3800000000', '10eb8a171d.png'),
(3, 'Audi Q7', 3, 1, '<p>Nhập khẩu</p>', 1, '1420000000', 'd92322336a.png'),
(4, 'Audi Q8', 3, 1, '<p>Nhập khẩu</p>', 1, '4505000000', '562fa358ca.png'),
(5, 'Audi A5 Carbriolet', 3, 1, '<p>Nhập khẩu</p>', 0, '2510000000', '6e7afe5231.jpg'),
(7, 'Audi A8', 3, 1, '<p>Nhập khẩu</p>', 1, '5600000000', '9b9e67c3db.png'),
(8, 'Audi R8', 3, 1, '<p>Nhập khẩu</p>', 1, '4500000000', 'db4b758942.png'),
(9, 'BMW Z4', 4, 3, '<p>Nhập khẩu</p>', 1, '3099000000', 'd5444d0155.png'),
(10, 'BMW X5', 5, 3, '<p>Nhập khẩu</p>', 1, '4199000000', 'ae56b0354a.png'),
(11, 'BMW X6', 6, 3, '<p>Nhập khẩu</p>', 1, '3969000000', '2006358841.png'),
(12, 'BMW 750LI', 2, 3, '<p>Nhập khẩu</p>', 1, '9299000000', 'f937a4688b.png'),
(13, 'BMW 320i', 2, 3, '<p>Nhập khẩu</p>', 0, '2159000000', '49baa28126.png'),
(14, 'BMW I8', 4, 3, '<p>Nhập khẩu</p>', 0, '3460000000', '5c6cfc3210.png'),
(15, 'BMW M6', 2, 3, '<p>Nhập khẩu</p>', 1, '6688000000', 'be498e4dff.png'),
(16, 'BMW M850i', 3, 3, '<p>Nhập khẩu</p>', 1, '9500000000', 'c2f0ef70ea.png'),
(17, 'Ford Tuorneo', 7, 5, '<p>Lắp r&aacute;p</p>', 0, '999000000', 'dd10e711ca.png'),
(19, 'Ford Ranger Raptor', 8, 5, '<p>Nhập khẩu</p>', 1, '1198000000', '4150585ba3.png'),
(20, 'Ford Transit', 7, 5, '<p>Nhập khẩu</p>', 1, '1355000000', 'fde5675427.png'),
(21, 'Ford Mustang', 3, 5, '<p>Nhập khẩu</p>', 1, '4400000000', '6f25ced846.png'),
(23, 'Mercedes C300', 3, 10, '<p>lắp r&aacute;p</p>', 1, '2699000000', 'ec7189cbf7.png'),
(24, 'Mercedes C250', 3, 10, '<p>nhập khẩu</p>', 0, '1729000000', 'e239d7d671.png'),
(25, 'Mercedes-Maybach S560', 3, 10, '<p>nhập khẩu</p>', 1, '11099000000', '9f9e556fd2.png'),
(26, 'Mercedes-Benz SL', 3, 10, '<p>nhập khẩu</p>', 1, '6709000000', 'ba2ff0641d.png'),
(27, 'Mercedes-Benz CLS', 3, 10, '<p>nhập khẩu</p>', 1, '5750000000', 'bdd9871968.png'),
(28, 'Mercedes AMG G63', 5, 10, '<p>nhập khẩu</p>', 1, '10829000000 ', 'd20fd44262.png'),
(29, 'Mercedes-Benz GLS 500', 5, 10, '<p>nhập khẩu</p>', 1, '7829000000', '291e2da82b.png'),
(30, 'Mercedes S650', 2, 10, '<p>nhập khẩu</p>', 1, '14899000000', 'de25611682.png'),
(31, 'Mercedes S450', 2, 10, '<p>nhập khẩu</p>', 0, '7369000000', '0a8f648b5e.png'),
(32, 'Jaguar F–Type', 3, 19, '<p>nhập khẩu</p>', 1, '12800000000', '21a2f813ce.png'),
(33, 'Jaguar XJL Autobiography', 2, 19, '<p>nhập khẩu</p>', 1, '10052000000', '56843dd4c8.png'),
(34, 'F-PACE Prestige', 5, 19, '<p>nhập khẩu</p>', 0, '3359000000', 'a34a08171d.png'),
(35, 'Maserati', 5, 20, '<p>nhập khẩu</p>', 1, '5049000000', '7177e5e746.png'),
(37, 'Maserati Quattroporte SQ4', 2, 20, '<p>nhập khẩu</p>', 1, '8868000000', 'c674cf3523.png'),
(38, 'Land Rover Discovery', 5, 21, '<p>nhập khẩu</p>', 1, '6585000000', 'e2419f0021.png'),
(39, 'Range Rover Vogue LWB', 2, 21, '<p>nhập khẩu</p>', 1, '9880000000', '7e4196594c.png'),
(40, 'Pagani Zonda', 3, 23, '<p>nhập khẩu</p>', 1, '44033450000', 'e0faa97087.png'),
(41, 'Pagani Huayra Roadster', 3, 23, '<p>nhập khẩu</p>', 1, '78836616690', 'b70a8f91af.png'),
(42, 'McLaren 720S', 3, 24, '<p>nhập khẩu</p>', 1, '6700000000', '2de5a82da1.png'),
(43, 'Mclaren P1', 3, 24, '<p>nhập khẩu</p>', 1, '55649376487', '89c7eee348.png'),
(44, 'Bugatti Veyron', 3, 25, '<p>nhập khẩu</p>', 1, '32462136284', '1fc2c510f8.png'),
(45, 'Bugatti Chiron', 3, 25, '<p>nhập khẩu</p>', 1, '69480149000', '79fa5455c2.png'),
(46, 'Bentley Flying spur', 2, 26, '<p>nhập khẩu</p>', 1, '16868000000', '521dd3ef86.png'),
(47, 'Bentley Continental', 4, 26, '<p>nhập khẩu</p>', 1, '23000000000', '2a4350581f.png'),
(48, 'Ferrari F12 Berlinetta', 2, 29, '<p>nhập khẩu</p>', 1, '20000000000', '7176a3f3e3.png'),
(49, 'Aston Martin DB11', 3, 28, '<p>nhập khẩu</p>', 1, '15700000000', '82009e6221.png'),
(50, 'Lamborghini Aventador', 3, 27, '<p>nhập khẩu</p>', 1, '60000000000', '0315b9efa3.png'),
(51, 'Lamborghini Urus', 5, 27, '<p>nhập khẩu</p>', 1, '10900000000', '36d1dd6463.png'),
(52, 'Lamborghini Urus', 5, 27, '<p>nhập khẩu</p>', 1, '10900000000', '936191a276.png'),
(53, 'Rolls Royce Cullinan', 2, 22, '<p>nhập khẩu</p>', 1, '41277000000', 'dff915640a.png'),
(54, 'Rolls Royce Dawn', 4, 22, '<p>nhập khẩu</p>', 1, '36000000000', '71dbb87bcf.png'),
(56, 'Porsche Panamera', 3, 18, '<p>nhập khẩu</p>', 1, '11050000000', '70fcffdae3.png'),
(57, 'Porsche 911 Carrera S Cabriolet', 3, 18, '<p>nhập khẩu</p>', 0, '7770000000', '684e71066b.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `sliderID` int(11) NOT NULL,
  `sliderName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sliderImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`sliderID`, `sliderName`, `sliderImage`, `type`) VALUES
(1, 'slider1', 'bf0cf22727.png', 1),
(2, 'slider2', 'f7e1731b2c.png', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_order`
--

CREATE TABLE `tb_order` (
  `ID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `ID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlist`
--

INSERT INTO `wishlist` (`ID`, `customerID`, `productID`, `productName`, `price`, `image`) VALUES
(1, 1, 53, 'Rolls Royce Cullinan', '41277000000', 'dff915640a.png'),
(3, 1, 51, 'Lamborghini Urus', '10900000000', '36d1dd6463.png'),
(4, 1, 48, 'Ferrari F12 Berlinetta', '20000000000', '7176a3f3e3.png'),
(5, 1, 49, 'Aston Martin DB11', '15700000000', '82009e6221.png'),
(6, 1, 50, 'Lamborghini Aventador', '60000000000', '0315b9efa3.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Chỉ mục cho bảng `blogger`
--
ALTER TABLE `blogger`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandID`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catID`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`binhluanID`);

--
-- Chỉ mục cho bảng `compare`
--
ALTER TABLE `compare`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`sliderID`);

--
-- Chỉ mục cho bảng `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `blogger`
--
ALTER TABLE `blogger`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `brandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `binhluanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `compare`
--
ALTER TABLE `compare`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `sliderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
