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
-- 資料表結構 `message`
--

CREATE TABLE `message` (
  `cID` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `ID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `class` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mess` varchar(3000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `message`
--

INSERT INTO `message` (`cID`, `ID`, `class`, `mess`) VALUES
(01, 1000000, '魔藥學', '太難了！'),
(02, 2000000, '魔藥學', '呵呵'),
(03, 1000000, '變形學', '天啊'),
(04, 9000000, '符咒學', '哈哈哈哈哈哈哈'),
(05, 1100000, '草藥學', '不難的'),
(45, 2000000, '黑魔法防禦學', '第一'),
(07, 8000000, '魔藥學', '........無言'),
(08, 7000000, '符咒學', '留個言'),
(09, 4000000, '變形學', '111222'),
(10, 5000000, '符咒學', 'jijlndislvjs[vkr'),
(11, 8000000, '草藥學', '天啊！太酷了！'),
(12, 7000000, '變形學', '我.......'),
(14, 1100000, '符咒學', '我的媽啊！'),
(15, 2000000, '變形學', 'so easy！'),
(16, 3000000, '變形學', '囂張！！！'),
(17, 4000000, '草藥學', '恩............好吧！'),
(18, 1000000, '草藥學', '太瘋狂了！'),
(19, 6000000, '魔藥學', '噁心啊！'),
(20, 7000000, '草藥學', '不知該說什麼？'),
(21, 5000000, '符咒學', '人生艱難阿~'),
(22, 6000000, '魔藥學', '來留個言'),
(23, 8000000, '魔藥學', '大家好啊'),
(24, 1072019, '魔藥學', '嘿嘿'),
(25, 9000000, '魔藥學', '真的很噁心'),
(26, 1100000, '魔藥學', '很很很很好玩啊'),
(28, 8000000, '魔藥學', '嗯嗯嗯嗯嗯嗯'),
(29, 4000000, '魔藥學', '呵呵'),
(30, 9000000, '魔藥學', '加油加油'),
(31, 7000000, '魔藥學', '一起阿'),
(32, 6000000, '魔藥學', '魔藥學魔藥學魔藥學魔藥學'),
(33, 2000000, '魔藥學', '一點都不難'),
(34, 3000000, '魔藥學', '..........'),
(35, 1000000, '魔藥學', '.........'),
(36, 6000000, '魔藥學', '無言'),
(37, 7000000, '魔藥學', '同意'),
(44, 1072019, '草藥學', 'i喔喔喔喔喔'),
(39, 1072019, '變形學', '55599997777\r\n53535'),
(40, 6000000, '草藥學', '新增新增新增新增新增'),
(41, 6000000, '符咒學', 'test test\r\ntest\r\ntest'),
(42, 8000000, '草藥學', '測試測試測試'),
(43, 8000000, '符咒學', '111151515151'),
(46, 1234567, '魔藥學', '嗯嗯嗯嗯嗯嗯嗯'),
(47, 1072019, '魔藥學', '555555'),
(48, 1072019, '黑魔法防禦學', '1212123535315353513535\r\n45351\r\n535468');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`cID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message`
--
ALTER TABLE `message`
  MODIFY `cID` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
