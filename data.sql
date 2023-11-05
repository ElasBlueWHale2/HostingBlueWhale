-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th7 04, 2023 lúc 03:16 PM
-- Phiên bản máy phục vụ: 10.3.39-MariaDB
-- Phiên bản PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `topc1bwptpy_aaa`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `DataCard`
--

CREATE TABLE `DataCard` (
  `id` int(11) NOT NULL,
  `username` text DEFAULT NULL,
  `code` text DEFAULT NULL,
  `serial` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `telco` text DEFAULT NULL,
  `requestid` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `time` text DEFAULT NULL,
  `time2` text DEFAULT NULL,
  `time3` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `DataCard`
--

INSERT INTO `DataCard` (`id`, `username`, `code`, `serial`, `amount`, `telco`, `requestid`, `status`, `time`, `time2`, `time3`) VALUES
(1, 'topcloudvn123', '525272058515318', '20000251127560', '10000', 'VIETTEL', '14955045570', '0', '1688471527', '04/07/2023', '07/2023'),
(2, 'TaPhat', '713164951385412', '10009856105945', '50000', 'VIETTEL', '82060278247', '2', '1688476339', '04/07/2023', '07/2023'),
(3, 'TaPhat', '216364642292603', '10009503339093', '100000', 'VIETTEL', '87031314073', '2', '1688478192', '04/07/2023', '07/2023'),
(4, 'TaPhat', '713164951385499', '10009856105999', '50000', 'VIETTEL', '99553522645', '2', '1688482162', '04/07/2023', '07/2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `DataWeb`
--

CREATE TABLE `DataWeb` (
  `id` int(11) NOT NULL,
  `username` text DEFAULT NULL,
  `domain` text DEFAULT NULL,
  `taikhoan` text DEFAULT NULL,
  `matkhau` text DEFAULT NULL,
  `template` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `time` text DEFAULT NULL,
  `timeend` text DEFAULT NULL,
  `timesuspended` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `DataWeb`
--

INSERT INTO `DataWeb` (`id`, `username`, `domain`, `taikhoan`, `matkhau`, `template`, `status`, `time`, `timeend`, `timesuspended`) VALUES
(8, 'topcloudvn123', 'hanhdzccscss.com', 'hanhdzccscss', 'hanhdzccscss', '2', '0', '1688473042', '1691065042', NULL),
(9, 'topcloudvn123', 'cloudcheap.net', 'cloudcheap', 'cloudcheap', '2', '0', '1688473069', '1691065069', NULL),
(10, 'topcloudvn123', '3333exp.com', '3333exp', '3333exp', '2', '0', '1688473122', '1691065122', NULL),
(16, 'topcloudvn123', 'ccccccccc.net', 'ccccccccc', 'ccccccccc', '2', '0', '1688473638', '1691065638', NULL),
(17, 'topcloudvn123', 'ccccccccc2.net', 'ccccccccc', 'ccccccccc', '2', '0', '1688473680', '1691065680', NULL),
(18, 'TaPhat', 'minhphat.codeflow.store', 'minhphat', 'yysd', '2', '1', '1688475861', '1691067861', NULL),
(19, 'TaPhat', 'minhphat.site.codeflow.store', 'dhhhfdd', 'dueuueud', '2', '0', '1688481738', '1691073738', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `DuoiMien`
--

CREATE TABLE `DuoiMien` (
  `id` int(11) NOT NULL,
  `domain` text DEFAULT NULL,
  `price` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `DuoiMien`
--

INSERT INTO `DuoiMien` (`id`, `domain`, `price`) VALUES
(2, 'net', 300000),
(5, 'COM', 200000),
(8, 'codeflow.store', 0),
(9, 'dichvucloud.shop', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Hosting`
--

CREATE TABLE `Hosting` (
  `id` int(11) NOT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `taikhoan` varchar(255) DEFAULT NULL,
  `matkhau` varchar(255) DEFAULT NULL,
  `plan` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `maychu` text DEFAULT NULL,
  `hsd` varchar(255) CHARACTER SET ucs2 COLLATE ucs2_vietnamese_ci DEFAULT NULL,
  `timesuspended` text DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  `urlcallback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `Hosting`
--

INSERT INTO `Hosting` (`id`, `domain`, `username`, `taikhoan`, `matkhau`, `plan`, `status`, `time`, `maychu`, `hsd`, `timesuspended`, `price`, `urlcallback`) VALUES
(2, 'minhphat.site', 'TaPhat', 'azct329432', 'topc8640305', 'VN1', '0', '1688479535', '', '1691071535', NULL, 9500, NULL),
(3, 'mphat.store', 'TaPhat', 'mpa280748', 'dvc1204215', 'FR1', '0', '1688483732', '', '1691075732', NULL, 4500, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Plans`
--

CREATE TABLE `Plans` (
  `id` int(11) NOT NULL,
  `dungluong` varchar(255) DEFAULT NULL,
  `ssl` varchar(255) DEFAULT NULL,
  `bangthong` varchar(255) DEFAULT NULL,
  `mienkhac` varchar(255) DEFAULT NULL,
  `bidanh` varchar(255) DEFAULT NULL,
  `maychu` varchar(255) DEFAULT NULL,
  `backup` varchar(255) DEFAULT NULL,
  `planapi` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `Plans`
--

INSERT INTO `Plans` (`id`, `dungluong`, `ssl`, `bangthong`, `mienkhac`, `bidanh`, `maychu`, `backup`, `planapi`, `price`) VALUES
(1, '800', 'Miễn Phí SSL', 'Không Giới Hạn', 'Không Giới Hạn', 'Không Giới Hạn', '', 'Có Hỗ Trợ', 'VN1', '9500'),
(2, '10000', 'Miễn Phí SSL', 'Không Giới Hạn', 'Không Giới Hạn', 'Không Giới Hạn', '', 'Có Hỗ Trợ', 'VN1', '27000'),
(3, '10000', 'Miễn Phí SSL', 'Không Giới Hạn', 'Không Giới Hạn', 'Không Giới Hạn', '', 'Có Hỗ Trợ', 'FR1', '4500');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Recharge`
--

CREATE TABLE `Recharge` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `requestid` varchar(266) DEFAULT NULL,
  `pin` varchar(266) DEFAULT NULL,
  `serial` varchar(266) DEFAULT NULL,
  `type` varchar(266) DEFAULT NULL,
  `amount` varchar(266) DEFAULT NULL,
  `status` varchar(266) DEFAULT NULL,
  `time` varchar(266) DEFAULT NULL,
  `transaction_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `SaveMomo`
--

CREATE TABLE `SaveMomo` (
  `id` int(11) NOT NULL,
  `requestid` text DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  `noidung` text DEFAULT NULL,
  `time` text DEFAULT NULL,
  `time2` text DEFAULT NULL,
  `time3` text DEFAULT NULL,
  `nameBank` text DEFAULT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ServerHost`
--

CREATE TABLE `ServerHost` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `maychu` text DEFAULT NULL,
  `hostname` text DEFAULT NULL,
  `whmuser` text DEFAULT NULL,
  `passwhm` text DEFAULT NULL,
  `dns1` text DEFAULT NULL,
  `dns2` text DEFAULT NULL,
  `ip` text DEFAULT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ServerHost`
--

INSERT INTO `ServerHost` (`id`, `name`, `maychu`, `hostname`, `whmuser`, `passwhm`, `dns1`, `dns2`, `ip`, `value`) VALUES
(2, 'VIỆT NAM (VN)', '', '', '', '', '', '', '', 'on'),
(3, 'FRANCE (FR)', '', '', '', '', '', '', '', 'on'),
(4, 'SINGAPORE (SG)', '', '', '', '', '', '', '', 'on');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Settings`
--

CREATE TABLE `Settings` (
  `id` int(11) NOT NULL,
  `callback` text DEFAULT NULL,
  `tokenmomo` text DEFAULT NULL,
  `namemomo` text DEFAULT NULL,
  `numberacc` text DEFAULT NULL,
  `partnerkey` text NOT NULL,
  `partnerid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `Settings`
--

INSERT INTO `Settings` (`id`, `callback`, `tokenmomo`, `namemomo`, `numberacc`, `partnerkey`, `partnerid`) VALUES
(1, NULL, 'NULL', 'TẠ MINH PHÁT', '0961154794', '36d08665581d5271d80b3f704f3d241f', '15390743089');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Template`
--

CREATE TABLE `Template` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `images` text DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  `datao` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `Template`
--

INSERT INTO `Template` (`id`, `name`, `description`, `image`, `images`, `price`, `datao`) VALUES
(2, 'SHOP ROBLOX GIAO DIỆN ĐỎ, ĐẦY ĐỦ CHỨC NĂNG', '', '/media/qsr1jqlg6r.jpg', '/media/qsr1jqlg6r.jpg', 17000, NULL),
(3, 'SHOP FREEFIRE CÓ VÒNG QUAY MAY MẮN GIỐNG SHOPCUALOCFF.VN', '', 'https://i.imgur.com/LLB5ZUz.jpg', 'https://i.imgur.com/LLB5ZUz.jpg', 17000, NULL),
(4, 'SHOP BÁN ACC ROBLOX CÓ CÀY THUÊ, NẠP THẺ AUTO, GIAO DIỆN ĐẸP DÀNH CHO YOUTUBER', '', '/media/Screenshot-2023-03-20-225947.png', '/media/Screenshot-2023-03-20-225947.png', 600000, NULL),
(5, 'SHOP BÁN ACC FREEFIRE, LIÊN QUÂN CÓ VÒNG QUAY, NẠP THẺ TỰ ĐỘNG', '', '/media/IMG_20220806_171448.jpg', '/media/IMG_20220806_171448.jpg', 17000, NULL),
(6, 'SHOP ACC ROBLOX, CÓ CÀY THUÊ, GAMEPASS, BÁN ROBUX VÀ VÒNG QUAY, DÀNH CHO YOUTUBER', '', '/media/Screenshot-2023-06-05-091057.png', '/media/Screenshot-2023-06-05-091057.png', 99000, NULL),
(7, 'SHOP BÁN ACC ROBLOX CÓ CÀY THUÊ VÀ VÒNG QUAY, NẠP THẺ AUTO', '', '/media/08kDWae.png', '/media/08kDWae.png', 17000, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `monney` int(255) DEFAULT NULL,
  `band` text DEFAULT NULL,
  `time` text DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `level` text DEFAULT NULL,
  `token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `Users`
--

INSERT INTO `Users` (`id`, `username`, `password`, `email`, `monney`, `band`, `time`, `avatar`, `level`, `token`) VALUES
(3, 'TaPhat', 'b7b3acb854f21ac202200702ac80de99', 'mphat@gmail.com', 936500, '0', '1688360675', '/media/avatar.jpg', 'admin', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `DataCard`
--
ALTER TABLE `DataCard`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `DataWeb`
--
ALTER TABLE `DataWeb`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `DuoiMien`
--
ALTER TABLE `DuoiMien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Hosting`
--
ALTER TABLE `Hosting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Plans`
--
ALTER TABLE `Plans`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Recharge`
--
ALTER TABLE `Recharge`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `SaveMomo`
--
ALTER TABLE `SaveMomo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ServerHost`
--
ALTER TABLE `ServerHost`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Settings`
--
ALTER TABLE `Settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Template`
--
ALTER TABLE `Template`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `DataCard`
--
ALTER TABLE `DataCard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `DataWeb`
--
ALTER TABLE `DataWeb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `DuoiMien`
--
ALTER TABLE `DuoiMien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `Hosting`
--
ALTER TABLE `Hosting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `Plans`
--
ALTER TABLE `Plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `Recharge`
--
ALTER TABLE `Recharge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `SaveMomo`
--
ALTER TABLE `SaveMomo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ServerHost`
--
ALTER TABLE `ServerHost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `Settings`
--
ALTER TABLE `Settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `Template`
--
ALTER TABLE `Template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
