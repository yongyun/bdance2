-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-11-22 17:32:53
-- 伺服器版本: 10.1.16-MariaDB
-- PHP 版本： 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `bdance`
--

-- --------------------------------------------------------

--
-- 資料表結構 `about_awards`
--

CREATE TABLE `about_awards` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `awardName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `about_awards`
--

INSERT INTO `about_awards` (`id`, `title`, `description`, `awardName`, `created_at`, `updated_at`) VALUES
(1, 'Floating Flowers', '20th MASDANZA International choreography competition', 'Best choreography of Audience', '2016-11-20 15:40:43', '2016-11-20 15:40:43'),
(3, 'Floating Flowers', '29th International Choreography Competition Hanover in 2014', 'Gauthier Dance//Dance company Theaterhaus Stuttgart Production Award. & Audience award', '2016-11-20 15:41:31', '2016-11-20 15:41:31'),
(4, 'Hugin/Munin', 'Copenhagen International Choreography Competition', 'First prize & Tanz Luzerner Theater Production Award', '2016-11-20 15:41:50', '2016-11-20 15:41:50');

-- --------------------------------------------------------

--
-- 資料表結構 `about_media`
--

CREATE TABLE `about_media` (
  `am_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `awardName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `about_media`
--

INSERT INTO `about_media` (`am_id`, `description`, `awardName`, `created_at`, `updated_at`) VALUES
(2, 'Featuring unpredictability, Tsai Po-Cheng puts everyday objects to good uses and creates new ideas out of them.\r\nIn a nut shell, he is a magician that unveils the mystery of the gift cordially presented to the audience.', 'October 2015 Issue, La vie', '2016-11-20 14:42:27', '2016-11-20 14:42:27'),
(6, 'Germany''s Stuttgart dance troupe founder and artistic director Dric Gauthier: “Floatign flower” is an eye-catching materpiece', 'Report of the Central News Agency', '2016-11-20 15:42:29', '2016-11-20 15:42:29'),
(7, 'The audience’s favorite piece “Floating Flower” is a pas de deux filled with surprises created by Tsai Po-Cheng from Taiwan. As the dance starts, the male partner readily hiding under the puffy skirt lets the female dancer sit on his shoulder. Suddenly the peitite female dancer grows like a tree, briing the first surprise to the audicence, folllowed by an interesting mix of rhthymic and lively dance.', 'HAZ Anmeldung newspaper’', '2016-11-20 15:42:42', '2016-11-20 15:42:42'),
(8, 'Tsao Cheng-Yuan: “Tsai Po-Cheng’s “Floating Flower” emphasizes interpersonal relationships. From this work you will discover that instead of performing in a certain mood, they use stage language devices to perform through clothing and action”.', 'nddaily', '2016-11-20 15:42:58', '2016-11-20 15:42:58'),
(9, 'It is precise to say the work is a clever balance of body and poetry. The choreographer’s arrangement of two dancers sitting on each other’s shoulders makes them appear like a giant dancer’s perfect skirt. Floating Flower is indeed a clever masterpiece.', 'Germany kreiszeitung newspaper', '2016-11-20 15:43:11', '2016-11-20 15:47:14');

-- --------------------------------------------------------

--
-- 資料表結構 `boom_info`
--

CREATE TABLE `boom_info` (
  `bi_id` int(11) NOT NULL,
  `bi_info` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `boom_info`
--

INSERT INTO `boom_info` (`bi_id`, `bi_info`) VALUES
(1, 'B.OOM by B.DANCE - a pioneer dance project transcends borders Initiated by B.DANCE in 2016, B.OOM is an international dance project across borders. B.DANCE aims at creating a dance platform for strengthening cultural exchange in the international dance scene. Nowadays, artists can easily travel around in the world, where they can meet other artists from different disciplines, share with each other and learn from others as well. B.OOM not only creates a transparent platform for cross-cultural exchange but also provides opportunities for international dance performers to increase their visibility in the Eastern dance scene. This is the main concept of B.OOM.');

-- --------------------------------------------------------

--
-- 資料表結構 `index_view`
--

CREATE TABLE `index_view` (
  `iv_id` int(11) NOT NULL,
  `iv_type` tinyint(1) NOT NULL,
  `iv_data` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `index_view`
--

INSERT INTO `index_view` (`iv_id`, `iv_type`, `iv_data`) VALUES
(1, 1, 'upload/index/20161120015958364.jpg'),
(2, 0, 'upload/index/20161120020254457.mp4'),
(3, 1, 'upload/index/20161120020310139.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `menu_link`
--

CREATE TABLE `menu_link` (
  `ml_id` int(11) NOT NULL,
  `ml_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ml_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `menu_link`
--

INSERT INTO `menu_link` (`ml_id`, `ml_name`, `ml_link`) VALUES
(1, 'FB', 'https://www.facebook.com/tsaipocheng/?fref=ts'),
(2, 'vimeo', 'https://vimeo.com/bdancetw'),
(3, 'axearts', 'http://www.axearts.org');

-- --------------------------------------------------------

--
-- 資料表結構 `slogan`
--

CREATE TABLE `slogan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ps` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `slogan`
--

INSERT INTO `slogan` (`id`, `name`, `ps`) VALUES
(1, 'We believe focus and sincerity define beauty', 'while stunning beauty is bigoted focus with a human touch, coupled with the test of time, to create the value of "creation".');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `about_awards`
--
ALTER TABLE `about_awards`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `about_media`
--
ALTER TABLE `about_media`
  ADD PRIMARY KEY (`am_id`);

--
-- 資料表索引 `boom_info`
--
ALTER TABLE `boom_info`
  ADD PRIMARY KEY (`bi_id`);

--
-- 資料表索引 `index_view`
--
ALTER TABLE `index_view`
  ADD PRIMARY KEY (`iv_id`);

--
-- 資料表索引 `menu_link`
--
ALTER TABLE `menu_link`
  ADD PRIMARY KEY (`ml_id`);

--
-- 資料表索引 `slogan`
--
ALTER TABLE `slogan`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `about_awards`
--
ALTER TABLE `about_awards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用資料表 AUTO_INCREMENT `about_media`
--
ALTER TABLE `about_media`
  MODIFY `am_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用資料表 AUTO_INCREMENT `boom_info`
--
ALTER TABLE `boom_info`
  MODIFY `bi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `index_view`
--
ALTER TABLE `index_view`
  MODIFY `iv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `menu_link`
--
ALTER TABLE `menu_link`
  MODIFY `ml_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `slogan`
--
ALTER TABLE `slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
