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
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `cID` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `ID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sex` enum('F','M') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'F',
  `college` enum('赫夫帕夫','史萊哲林','雷文克勞','葛來分多') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `grade` enum('1','2','3','4','5','6','7') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `administrator` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`cID`, `ID`, `name`, `sex`, `college`, `grade`, `password`, `administrator`) VALUES
(18, 3000000, '榮恩衛斯理', 'M', '葛來分多', '3', '$2y$10$ImUJcByrm7YAgjGic7MkOOYBN5N82bNRusWLekLtzuFjzXu5rECb2', 0),
(17, 2000000, '妙麗格蘭傑', 'F', '葛來分多', '3', '$2y$10$2QGWXAPQFlTTygkqSd159.EbxELsmwUNhQ2ORAOrayfb9jxBehGJG', 0),
(16, 1000000, '哈利波特', 'M', '葛來分多', '3', '$2y$10$UBR4AloLouS517yb.yJzfe7.pBh/YPnUlUQQzcC0xrndfJ6sbBg4K', 0),
(15, 1234567, '測試', 'F', '史萊哲林', '3', '$2y$10$LRC2I8RHAXGTRFa.q12wg.zOxcGFK0CaGAuIWZV5.H1kx03TnR79G', 0),
(19, 4000000, '跩哥馬份', 'M', '史萊哲林', '4', '$2y$10$OMPMzPjq2qOFv8ka89g.tOFUFcFRCVP96fU7swv2Onq6BM5Jhhtzm', 0),
(20, 5000000, '張秋', 'F', '雷文克勞', '6', '$2y$10$hoy7sZ3gZBYgSpQTx6ycmeNtj5bxgN/jAnl40HuzC/T73ltoHg.ni', 0),
(21, 6000000, '西追迪哥里', 'M', '赫夫帕夫', '5', '$2y$10$uHLMcSPs.f1pm5PW9AV6TeOdYZYSSn5ErjH.ehWigDTg2U2M8RHxK', 0),
(22, 7000000, '奈威隆巴頓', 'M', '葛來分多', '1', '$2y$10$DSmXeDPQ.p0CjkpMGFM2vebvkyR.ZJ1y5VrEOHkml7zDA7QXRGrg6', 0),
(23, 8000000, '露娜羅古德', 'F', '雷文克勞', '2', '$2y$10$sQ4gUrSCC3ezrNjDswjUW./f5W8hjtkrr7uOzRyLNw8CwhT9HdC1W', 0),
(24, 9000000, '小仙女東施', 'F', '赫夫帕夫', '1', '$2y$10$t4.a6eXimjNstV3EuRb.rOwCpOOVTkybs.p74sRd9FieCxCFmo9le', 0),
(25, 1100000, '湯姆瑞斗', 'M', '史萊哲林', '7', '$2y$10$3EIRJE1S2cw.fOwWK8H2veOPqOGz/q/7eB/Y5STTPLxNntVk/Yw/u', 0),
(26, 1072019, '李苡瑄', 'F', '雷文克勞', '2', '$2y$10$faK4dfR54v3W1krB8voPbeVFw6BWm9v/r1gpCjsSvI96wI8rceJ0C', 1),
(27, 1072027, '高嬿容', 'F', '赫夫帕夫', '3', '$2y$10$byT2zEI.7mJYMvwpeW5n8eg.4U3auu6NC0jafUGfth27BhAbvbQo2', 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`cID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `cID` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
