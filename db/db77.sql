-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-07-31 10:26:32
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db77`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(1) UNSIGNED NOT NULL,
  `length` int(3) UNSIGNED NOT NULL,
  `ondate` date NOT NULL,
  `publish` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `director` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `trailer`, `poster`, `intro`, `rank`, `sh`, `director`) VALUES
(1, '院線片a1', 1, 90, '2020-07-29', '院線片01的發行商', '03B01v.mp4', '03B01.png', '院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹', 1, 1, '院線片01的導演'),
(2, '院線片a2', 1, 90, '2020-07-30', '院線片02的發行商', '03B01v.mp4', '03B02.png', '院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹', 3, 1, '院線片02的導演'),
(3, '院線片a3', 1, 90, '2020-07-29', '院線片03的發行商', '03B01v.mp4', '03B03.png', '院線片02的劇情介紹院線片02的劇情介紹院線片02的劇情介紹院線片02的劇情介紹院線片02的劇情介紹院線片02的劇情介紹院線片02的劇情介紹院線片02的劇情介紹院線片02的劇情介紹院線片02的劇情介紹院線片02的劇情介紹院線片02的劇情介紹院線片02的劇情介紹院線片02的劇情介紹院線片02的劇情介紹', 4, 1, '院線片03的導演'),
(4, '院線片a4', 1, 90, '2020-07-28', '院線片04的發行商', '03B01v.mp4', '03B04.png', '院線片04的劇情介紹院線片04的劇情介紹院線片03的劇情介紹院線片03的劇情介紹院線片03的劇情介紹院線片03的劇情介紹院線片03的劇情介紹院線片03的劇情介紹院線片03的劇情介紹院線片03的劇情介紹院線片03的劇情介紹院線片03的劇情介紹院線片03的劇情介紹院線片03的劇情介紹院線片03的劇情介紹', 2, 1, '院線片04的導演'),
(6, '院線片a6', 1, 90, '2020-07-28', '院線片06的發行商', '03B01v.mp4', '03B06.png', '院線片05的劇情介紹院線片05的劇情介紹院線片05的劇情介紹院線片05的劇情介紹院線片05的劇情介紹院線片05的劇情介紹院線片05的劇情介紹院線片05的劇情介紹院線片05的劇情介紹院線片05的劇情介紹院線片05的劇情介紹院線片05的劇情介紹院線片05的劇情介紹院線片05的劇情介紹院線片05的劇情介紹', 5, 1, '院線片06的導演'),
(7, '院線片a7', 1, 90, '2020-07-30', '院線片07的發行商', '03B01v.mp4', '03B07.png', '院線片06的劇情介紹院線片06的劇情介紹院線片06的劇情介紹院線片06的劇情介紹院線片06的劇情介紹院線片06的劇情介紹院線片06的劇情介紹院線片06的劇情介紹院線片06的劇情介紹院線片06的劇情介紹院線片06的劇情介紹院線片06的劇情介紹院線片06的劇情介紹院線片06的劇情介紹院線片06的劇情介紹', 6, 1, '院線片07的導演'),
(8, '院線片a8', 1, 90, '2020-07-23', '院線片08的發行商', '03B01v.mp4', '03B08.png', '院線片07的劇情介紹院線片07的劇情介紹院線片07的劇情介紹院線片07的劇情介紹院線片07的劇情介紹院線片07的劇情介紹院線片07的劇情介紹院線片07的劇情介紹院線片07的劇情介紹院線片07的劇情介紹院線片07的劇情介紹院線片07的劇情介紹院線片07的劇情介紹院線片07的劇情介紹院線片07的劇情介紹', 7, 1, '院線片08的導演'),
(9, '院線片a9', 1, 90, '2020-07-24', '院線片09的發行商', '03B01v.mp4', '03B09.png', '院線片08的劇情介紹院線片08的劇情介紹院線片08的劇情介紹院線片08的劇情介紹院線片08的劇情介紹院線片08的劇情介紹院線片08的劇情介紹院線片08的劇情介紹院線片08的劇情介紹院線片08的劇情介紹院線片08的劇情介紹院線片08的劇情介紹院線片08的劇情介紹院線片08的劇情介紹院線片08的劇情介紹', 8, 1, '院線片09的導演'),
(10, '院線片10', 1, 90, '2020-07-29', '院線片10的發行商', '03B01v.mp4', '03B10.png', '院線片09的劇情介紹院線片09的劇情介紹院線片09的劇情介紹院線片09的劇情介紹院線片09的劇情介紹院線片09的劇情介紹院線片09的劇情介紹院線片09的劇情介紹院線片09的劇情介紹院線片09的劇情介紹院線片09的劇情介紹院線片09的劇情介紹院線片09的劇情介紹院線片09的劇情介紹院線片09的劇情介紹', 9, 1, '院線片10的導演'),
(11, '院線片a11', 1, 90, '2020-07-25', '院線片11的發行商', '03B01v.mp4', '03B11.png', '院線片10的劇情介紹院線片10的劇情介紹院線片10的劇情介紹院線片10的劇情介紹院線片10的劇情介紹院線片10的劇情介紹院線片10的劇情介紹院線片10的劇情介紹院線片10的劇情介紹院線片10的劇情介紹院線片10的劇情介紹院線片10的劇情介紹院線片10的劇情介紹院線片10的劇情介紹院線片10的劇情介紹', 10, 1, '院線片11的導演');

-- --------------------------------------------------------

--
-- 資料表結構 `ord`
--

CREATE TABLE `ord` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `session` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `qt` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `ord`
--

INSERT INTO `ord` (`id`, `movie`, `date`, `session`, `no`, `seat`, `qt`) VALUES
(3, '院線片a8', '2020-07-25', '20:00~22:00', '202007240003', 'a:3:{i:0;s:2:\"14\";i:1;s:2:\"17\";i:2;s:2:\"18\";}', 3);

-- --------------------------------------------------------

--
-- 資料表結構 `poster`
--

CREATE TABLE `poster` (
  `id` int(10) UNSIGNED NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `ani` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `poster`
--

INSERT INTO `poster` (`id`, `path`, `name`, `rank`, `sh`, `ani`) VALUES
(8, '03A01.jpg', '預告片11111', 3, 1, 4),
(10, '03A02.jpg', '預告片2222', 2, 1, 1),
(12, '03A03.jpg', '預告片03', 1, 1, 2),
(13, '03A04.jpg', '預告片04', 4, 1, 3),
(14, '03A05.jpg', '預告片05', 5, 1, 2),
(15, '03A06.jpg', '預告片06', 6, 1, 3),
(16, '03A07.jpg', '預告片07', 7, 1, 3);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `ord`
--
ALTER TABLE `ord`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ord`
--
ALTER TABLE `ord`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `poster`
--
ALTER TABLE `poster`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
