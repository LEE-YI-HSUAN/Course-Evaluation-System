-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `finaltopic`
--

-- --------------------------------------------------------

--
-- 資料表結構 `evaluation`
--

CREATE TABLE `evaluation` (
  `cID` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `ID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `class` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `recommend` tinyint(2) NOT NULL,
  `astronomical` tinyint(2) NOT NULL,
  `HWpressure` tinyint(2) NOT NULL,
  `midterm` enum('個人報告','團體報告','個人專題','團體專題','考試','其他') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '考試',
  `finalterm` enum('個人報告','團體報告','個人專題','團體專題','考試','其他') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '考試',
  `supplement` varchar(900) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `evaluation`
--

INSERT INTO `evaluation` (`cID`, `ID`, `class`, `recommend`, `astronomical`, `HWpressure`, `midterm`, `finalterm`, `supplement`) VALUES
(01, 1000000, '魔藥學', 2, 5, 5, '考試', '考試', '						太可怕了					'),
(02, 2000000, '魔藥學', 5, 1, 3, '考試', '考試', NULL),
(03, 1000000, '變形學', 5, 5, 3, '考試', '考試', '9999999								'),
(04, 2000000, '草藥學', 4, 2, 3, '個人專題', '團體專題', NULL),
(05, 3000000, '符咒學', 5, 5, 4, '考試', '考試', NULL),
(06, 3000000, '變形學', 2, 4, 3, '考試', '考試', NULL),
(07, 4000000, '魔藥學', 4, 5, 4, '個人專題', '團體專題', NULL),
(08, 5000000, '符咒學', 5, 5, 4, '考試', '考試', NULL),
(09, 9000000, '草藥學', 3, 2, 4, '個人專題', '團體專題', NULL),
(10, 1100000, '變形學', 3, 4, 2, '考試', '考試', '就這樣'),
(11, 6000000, '草藥學', 4, 1, 3, '個人專題', '團體專題', '很好玩的說'),
(16, 7000000, '符咒學', 3, 4, 3, '考試', '考試', '1231321'),
(18, 2000000, '黑魔法防禦學', 5, 2, 3, '考試', '考試', NULL),
(19, 2000000, '符咒學', 4, 1, 1, '考試', '考試', NULL),
(20, 1072019, '魔藥學', 3, 3, 2, '考試', '考試', NULL);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`cID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `cID` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
