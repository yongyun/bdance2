-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-11-25 02:37:17
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
-- 資料表結構 `awards`
--

CREATE TABLE `awards` (
  `id` int(10) UNSIGNED NOT NULL,
  `work_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `awardName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `awards`
--

INSERT INTO `awards` (`id`, `work_id`, `title`, `description`, `awardName`, `created_at`, `updated_at`) VALUES
(1, 20, 'Floating Flowers', 'The 20th MASDANZA International Choreography Competition', 'Audience Award for Best Choreography', NULL, NULL),
(2, 20, 'Floating Flowers', 'The 29th International Choreography Competition Hannover', 'Gauthier Dance | Dance company Theaterhaus Stuttgart Production Award & Audience Award', NULL, NULL),
(3, 20, '測試標題****', '測試我好強\r\n好強的說明****', '測試獎品名稱**', '2016-11-19 15:50:37', '2016-11-19 15:53:59');

-- --------------------------------------------------------

--
-- 資料表結構 `boom_ad`
--

CREATE TABLE `boom_ad` (
  `ba_id` int(11) NOT NULL,
  `ba_work` int(11) NOT NULL,
  `ba_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ba_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `boom_ad`
--

INSERT INTO `boom_ad` (`ba_id`, `ba_work`, `ba_title`, `ba_image`) VALUES
(2, 2, 'HUGIN / MUNIN by Po-Cheng Tsai', '2_20161124012513937.jpg'),
(3, 2, 'ENFANT by Joeri Alexander Dubbe', '2_20161124013609936.jpg');

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
-- 資料表結構 `boom_list`
--

CREATE TABLE `boom_list` (
  `bl_id` int(11) NOT NULL,
  `bl_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `bl_image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bl_content` text COLLATE utf8_unicode_ci NOT NULL,
  `bl_location` text COLLATE utf8_unicode_ci NOT NULL,
  `bl_duration` text COLLATE utf8_unicode_ci NOT NULL,
  `bl_show` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bl_video` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `bl_buy_now` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bl_workshop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bl_date` datetime NOT NULL,
  `bl_update` datetime NOT NULL,
  `bl_del` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `boom_list`
--

INSERT INTO `boom_list` (`bl_id`, `bl_title`, `bl_image`, `bl_content`, `bl_location`, `bl_duration`, `bl_show`, `bl_video`, `bl_buy_now`, `bl_workshop`, `bl_date`, `bl_update`, `bl_del`) VALUES
(1, '2016 B.oom', '', '', '', '', '', '', '', '', '2016-11-24 00:44:16', '0000-00-00 00:00:00', 0),
(2, '2016 B.oomaaa', 'upload/boom/2/2_20161124012116746.jpg', '<p>sdfsfsaaaaaa</p>\r\n\r\n<p>sdfsdffdsffff</p>\r\n\r\n<p>dd</p>\r\n\r\n<p><span style="color:rgb(0, 0, 0); font-family:raleway,sans-serif,microsoft jhenghei,微軟正黑體; font-size:15px">The first edition of B.OOM will spotlight on acclaimed choreography works of international award-winning choreographers. As initiator, B.DANCE itself received two Gold and one Silver Awards at different international choreography competitions in 2015 and 2014. During these competitions, B.DANCE met many talented choreographers from all around the world. Thus, B.DANCE cordially invites those award-winning choreographers among them to present their outstanding performances as guests-performers for the first edition of B.OOM in Taiwan in 2016. 2016 B.OOM Project has the honour to present below award-winning independent choreographers from internationally acclaimed choreography competitions:</span></p>\r\n', 'Concert Hall of Taipei National University of the Arts （1 Hsueh-Yuan Rd., Peitou District, Taipei 11201, Taiwan, ', '60mins without intermission', '27th-28th October 2016 PM 7:30', 'https://vimeo.com/179031782', 'https://www.artsticket.com.tw/CKSCC2005/cart/cart00/ShowMap.aspx?PerformanceId=8JNfZ4VZd5RtUOxQvA62L9sMP56NfMHuHdHl3VWIPt4', 'http://www.accupass.com/event/register/1609201817241808410365#apjs-leftmenu', '2016-11-24 00:45:15', '2016-11-24 02:11:29', 0),
(3, '2016 B.oom', 'upload/boom/3/3_20161124004554349.jpg', '', '', '', '', '', '', '', '2016-11-24 00:45:54', '2016-11-24 00:45:54', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `boom_user`
--

CREATE TABLE `boom_user` (
  `bu_id` int(11) NOT NULL,
  `bu_work` int(11) NOT NULL,
  `bu_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bu_uname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `bu_country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bu_info` text COLLATE utf8_unicode_ci NOT NULL,
  `bu_concept` text COLLATE utf8_unicode_ci NOT NULL,
  `bu_date` int(11) NOT NULL,
  `bu_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- 資料表結構 `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Yonyun Deng', 'yongyunwork@gmail.com', 'Hello 1002 test', '2016-10-02 03:27:34', '2016-10-02 03:27:34'),
(2, 'cheney', 'cheney.avio@gmail.com', 'test message\r\n123 test \r\n456 message', '2016-11-17 07:37:43', '2016-11-17 07:37:44');

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_08_20_143507_create_projects_table', 2),
('2016_08_21_131105_create_reviews_table', 3),
('2016_08_21_133146_create_photos_table', 4),
('2016_08_21_133346_update_works_table', 5),
('2016_08_21_140644_create_stuffs_table', 6),
('2016_08_21_140931_update_stuff_table', 7),
('2016_08_21_141213_update_stuff2_table', 8),
('2016_08_27_060931_update_stuff_table2', 9),
('2016_09_20_155922_create_tours_table', 10),
('2016_09_20_160300_add_duration_to_table', 10),
('2016_09_23_034232_create_award_table', 10),
('2016_09_23_073237_add_order_to_tours_table', 10),
('2016_09_24_142116_alter_date_to_string_to_tours_table', 11),
('2016_09_25_064744_alter_allow_null_to_projects_table', 11),
('2016_10_01_005209_create_messages_table', 12);

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `nw_id` int(11) NOT NULL,
  `nw_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nw_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nw_synopsis` text COLLATE utf8_unicode_ci NOT NULL,
  `nw_synopsis_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nw_date` datetime NOT NULL,
  `nw_top_content` text COLLATE utf8_unicode_ci NOT NULL,
  `nw_content` text COLLATE utf8_unicode_ci NOT NULL,
  `nw_update` datetime NOT NULL,
  `nw_status` tinyint(1) NOT NULL,
  `nw_link` text COLLATE utf8_unicode_ci NOT NULL,
  `nw_del` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `news`
--

INSERT INTO `news` (`nw_id`, `nw_user`, `nw_title`, `nw_synopsis`, `nw_synopsis_image`, `nw_date`, `nw_top_content`, `nw_content`, `nw_update`, `nw_status`, `nw_link`, `nw_del`) VALUES
(1, 'admin', 'Weiwuying Arts Festival888', 'Morbi lacus massa, euismod ut turpis molestie, tristique sodales est. Integer sit amet mi id sapien tempor molestie in nec.', 'upload/ckeditor/images/4.jpg', '2016-11-08 00:17:48', '<p><span style="color:rgb(0, 0, 0); font-family:raleway,sans-serif,microsoft jhenghei,微軟正黑體; font-size:15px">Chemistry invites award-winning choreographers around the world come to show-off in Taiwan! Their works promise to reshape our conceptions of contemporary dance.</span></p>\r\n', '<p><img alt="" src="http://localhost/upload/ckeditor/images/1.jpg" style="height:267px; width:400px" /></p>\r\n\r\n<p>Taiwan Dance Platform will be held at Weiwuying between November 11-13th this year. Choreographers, professionals, educators and dance lovers from around the world will gather together to talk about the developments of dance in Asia. Taiwan Dance Platform&#39;s program will include performances, open talks, and workshops etc. Please check for updates on our website.</p>\r\n\r\n<p>link&nbsp;http://waf.org.tw/en/programs/program_5/</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="" src="http://localhost/upload/ckeditor/images/4.jpg" style="height:500px; width:750px" /></p>\r\n\r\n<p>台北市藝術創作者工會在靜慮 2.0 進行了第一次國際專題藝術工作者採訪 。 表演藝術類邀請到屢獲國際大獎的 B.DANCE 丞舞製作團隊 : 青年編舞家蔡博丞 Benson Tsai 與舞團經理 Kelly Hsu 分享他們近期的國際創作表與工作經驗以下分享這個傑出舞團的資歷與 10 月的購票資訊 ~ 歡迎愛好藝文展演的朋友們多多支持超越國界的潮流驅動者。</p>\r\n', '2016-11-12 23:51:10', 0, '<p>10 月關渡藝術節 B.OOM by B.DANCE ( 票券 )&nbsp;售票連結</p>\r\n\r\n<p>11 月衛武營藝術祭台灣舞蹈平台 ( 已售罄 )</p>\r\n\r\n<h6># BOOMbyBDANCE</h6>\r\n', 0),
(2, 'admin', 'Pie Chart Example', '台北市藝術創作者工會在靜慮 2.0 進行了第一次國際專題藝術工作者採訪', 'upload/news/2_20161109020018441.jpg', '2016-11-09 01:59:47', '<p>11111</p>\r\n', '<p><img alt="" src="http://localhost/upload/ckeditor/images/2.jpg" style="height:201px; width:300px" /></p>\r\n\r\n<p>Taiwan Dance Platform will be held at Weiwuying between November 11-13th this year. Choreographers, professionals, educators and dance lovers from around the world will gather together to talk about the developments of dance in Asia. Taiwan Dance Platform&#39;s program will include performances, open talks, and workshops etc. Please check for updates on our website...</p>\r\n\r\n<p>link&nbsp;http://waf.org.tw/en/programs/program_5/</p>\r\n\r\n<p>台北市藝術創作者工會在靜慮 2.0 進行了第一次國際專題藝術工作者採訪 。 表演藝術類邀請到屢獲國際大獎的 B.DANCE 丞舞製作團隊 : 青年編舞家蔡博丞 Benson Tsai 與舞團經理 Kelly Hsu 分享他們近期的國際創作表與工作經驗以下分享這個傑出舞團的資歷與 10 月的購票資訊 ~ 歡迎愛好藝文展演的朋友們多多支持超越國界的潮流驅動者。</p>\r\n', '2016-11-13 17:05:56', 0, '<p>5555</p>\r\n', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `news_ad`
--

CREATE TABLE `news_ad` (
  `na_id` int(11) NOT NULL,
  `na_nwid` int(11) NOT NULL,
  `na_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `na_description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `na_del` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `news_ad`
--

INSERT INTO `news_ad` (`na_id`, `na_nwid`, `na_image`, `na_description`, `na_del`) VALUES
(1, 1, '1_20161109001536264.jpg', '', 0),
(2, 1, '1_20161109001552845.jpg', '', 0),
(4, 1, '1_20161109003401600.jpg', '', 0),
(5, 2, '2_20161109020008766.jpg', '', 1),
(6, 2, '2_20161109020018441.jpg', '', 1),
(7, 1, '1_20161110023215809.jpg', 'ENFANT by Joeri Alexander Dubbe', 0),
(8, 2, '2_20161124235136904.jpg', '', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `news_video`
--

CREATE TABLE `news_video` (
  `nv_id` int(11) NOT NULL,
  `nv_nwid` int(11) NOT NULL,
  `nv_type` tinyint(1) NOT NULL,
  `nv_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nv_del` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `news_video`
--

INSERT INTO `news_video` (`nv_id`, `nv_nwid`, `nv_type`, `nv_link`, `nv_del`) VALUES
(1, 1, 2, 'https://vimeo.com/179031782', 0),
(2, 1, 1, 'https://www.youtube.com/watch?v=UBvYefURRks', 1),
(3, 2, 1, 'https://www.youtube.com/watch?v=wKo_7bQX5X4', 1),
(4, 1, 1, 'aaaaaa', 1),
(5, 1, 1, 'https://www.youtube.com/watch?v=xAAin4YQvNU', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `work_id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `photos`
--

INSERT INTO `photos` (`id`, `work_id`, `url`, `description`, `created_at`, `updated_at`) VALUES
(1, 20, 'photos/1/1012599_267587193426062_5952564303732391958_n.jpg', '', NULL, NULL),
(2, 20, 'photos/1/10245351_267587246759390_8125284288458844857_n.jpg', '', NULL, NULL),
(3, 20, 'photos/1/10363399_267587230092725_5567577841873392480_n.jpg', '', NULL, NULL),
(4, 20, '/photos/1/10411321_267587366759378_1891259313551974666_n.jpg', '', NULL, NULL),
(5, 20, 'photos/1/10407590_267587326759382_1418415725848702690_n.jpg', '', NULL, NULL),
(6, 20, 'photos/1/10418882_267587206759394_2568009610047073637_n.jpg', '', NULL, NULL),
(7, 20, 'photos/1/10419485_267587016759413_8642646302064880105_n.jpg', '', NULL, NULL),
(8, 20, 'photos/1/10421606_267587270092721_5652519243009504974_n.jpg', '', NULL, NULL),
(9, 20, 'photos/1/10422065_267587173426064_6976001359985955390_n.jpg', '', NULL, NULL),
(10, 20, 'photos/1/10426859_267587300092718_6616744354673023547_n.jpg', '', NULL, NULL),
(11, 20, 'photos/1/10441241_267587203426061_4715780302270083984_n.jpg', '', NULL, NULL),
(12, 20, 'photos/1/10446489_267587063426075_8603217588924477514_n.jpg', '', NULL, NULL),
(13, 20, 'photos/1/10446506_267587306759384_7687217478304442073_n.jpg', '', NULL, NULL),
(15, 20, 'photos/1/10457560_267587136759401_7370131639112250422_n.jpg', '', NULL, NULL),
(16, 20, 'photos/1/10489814_267587066759408_7296135101600695231_n.jpg', '', NULL, NULL),
(17, 20, 'photos/1/10501658_267587050092743_7866702015243482094_n.jpg', '', NULL, NULL),
(18, 20, 'photos/1/10501705_267587146759400_6280891474092193152_n.jpg', '', NULL, NULL),
(19, 20, 'photos/1/10502223_267587100092738_9028579877209809858_n.jpg', '', NULL, NULL),
(20, 20, 'photos/1/10511237_267587026759412_5478829893266195246_n.jpg', '', NULL, NULL),
(21, 20, 'photos/1/10513494_267587023426079_2984160086215787980_n.jpg', '', NULL, NULL),
(22, 20, 'photos/1/浮花劇照3.jpg', '', NULL, NULL),
(23, 20, 'photos/1/浮花劇照4.jpg', '', NULL, NULL),
(24, 20, 'photos/1/浮花劇照5.jpg', '', NULL, NULL),
(25, 20, 'photos/1/浮花劇照6.jpg', '', NULL, NULL),
(26, 20, 'photos/1/浮花Floating Flowers©B.DANCE.2.jpg', '', NULL, NULL),
(27, 20, 'photos/1/浮花Floating Flowers©B.DANCE.3.jpg', '', NULL, NULL),
(28, 20, 'photos/1/浮花Floating Flowers©B.DANCE.jpg', '', NULL, NULL),
(29, 15, 'photos/2/2-10.jpg', '', NULL, NULL),
(30, 15, 'photos/2/2-11.jpg', '', NULL, NULL),
(32, 15, 'photos/2/2-13.jpg', '', NULL, NULL),
(33, 15, 'photos/2/2-14.jpg', '', NULL, NULL),
(34, 15, 'photos/2/2-15.jpg', '', NULL, NULL),
(35, 15, 'photos/2/2-16.jpg', '', NULL, NULL),
(36, 15, 'photos/2/2-17.jpg', '', NULL, NULL),
(37, 15, 'photos/2/2-18.jpg', '', NULL, NULL),
(38, 15, 'photos/2/2-19.jpg', '', NULL, NULL),
(39, 15, 'photos/2/2-12.jpg', '', NULL, NULL),
(40, 1, 'photos/4/4-1.jpg', '', NULL, NULL),
(41, 1, 'photos/4/4-2.jpg', '', NULL, NULL),
(42, 1, 'photos/4/4-3.jpg', '', NULL, NULL),
(43, 1, 'photos/4/4-4.jpg', '', NULL, NULL),
(44, 1, 'photos/4/4-5.jpg', '', NULL, NULL),
(46, 1, 'photos/4/4-6.jpg', '', NULL, NULL),
(47, 1, 'photos/4/4-7.jpg', '', NULL, NULL),
(48, 28, 'photos/28/28_20161114173723609.jpg', '輪播1', '2016-11-14 09:37:23', NULL),
(49, 28, 'photos/28/28_20161114173822986.jpg', '輪播2', '2016-11-14 09:38:22', NULL),
(50, 28, 'photos/28/28_20161114173839903.jpg', '輪播三', '2016-11-14 09:38:39', NULL),
(51, 28, 'photos/28/28_20161114173851409.jpg', '輪播4', '2016-11-14 09:38:51', NULL),
(52, 28, 'photos/28/28_20161114174341220.jpg', '', '2016-11-14 09:43:41', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intro` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `video_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `perform_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feature_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `premiere` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_chanel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `projects`
--

INSERT INTO `projects` (`id`, `name`, `intro`, `description`, `video_url`, `perform_date`, `created_at`, `updated_at`, `feature_img`, `duration`, `premiere`, `video_chanel`) VALUES
(1, 'Innermost', 'Do you really know what the real voice of your mind is?', 'Most of the pain in life results from the causes of worries in the past and at present, and the bitter fruits thus arise. If you want to relieve yourself from the suffering, you have to search for your inner harmony. But, do you really know what the real voice of your mind is?', NULL, '2016-10-22', NULL, NULL, 'photos/4/p4.jpg', '20 minutes', 'Oct 22nd, 2016 Danse Péi, Réunion', NULL),
(15, 'Floating Flowers', '(60 minutes version)', 'Floating Flowers is about our journey in life inspired by floating lanterns, a traditional Taiwanese\r\n\r\nritual for the lost loved ones at the Ghost Festival in the seventh month of the lunar calendar. Each\r\n\r\nand every up and down in life is part of self-searching process. Is it we who create our own life, or\r\n\r\nlife leads us through its own way?\r\n\r\nThe core concept of Floating Flowers comes from a religious tradition of Taiwan. Water Lantern, a\r\n\r\nritual held during the Ghost Festival, is one of the most important Buddhist ceremonies. Floating\r\n\r\nthe lanterns is meant to worship God to send away bad luck and bring happiness, and it also\r\n\r\nrepresents our respect for the spirits in the water. In Southeast Asian culture, water lanterns are to\r\n\r\ndeliver wishes from people as well as their concern for the dead. In Po-Cheng Tsai’s childhood, his\r\n\r\nfather took him to the festival every year. His father led him to write down his wishes on the\r\n\r\nlanterns and sent them away with the flow of the river. He always hoped that all of his wishes\r\n\r\nwould come true one day. Many years later, his father passed away due to cancer. Since then, he\r\n\r\ndid not attend the festival any more.\r\n\r\nHowever, he believes that everything has been arranged already. Two years ago, while he was\r\n\r\ntaking the MRT to his dancing lesson, suddenly, he saw a picture of water lanterns on the wall. It\r\n\r\nbrought him back to his childhood, and the memory was all coming back to him. He realised how\r\n\r\nfoolish he was to make a wish only for himself in his childhood rather than praying for his family.\r\n\r\nWhile he was reminiscing his father, he realised how changeable and fleeting life could be: it might\r\n\r\nperish anytime, without warning. Then, he decided to create a piece for his father to commemorate\r\n\r\nhim and at the same time free himself from the past haunting memory. This is why he created\r\n\r\nFloating Flowers.', 'www.youtube.com/embed/tqdt0fceBNo', '2015-12-25', NULL, NULL, 'photos/2/p2.jpg', '60 minutes without intermission', 'December 25th, 2015 at Waterspring Theater, Taiwan', NULL),
(20, 'Floating Flowers', '(10 minutes version)', '“Floating Flowers” is about our journey in life inspired by floating lanterns, a traditional Taiwanese\r\n\r\nritual for the lost loved ones at the Ghost Festival in the seventh month of the lunar calendar.\r\n\r\nEach and every up and down in life is part of self-searching process. Is it we who create our own\r\n\r\nlife, or life leads us through its own way?', 'www.youtube.com/embed/tqdt0fceBNo', '2014-06-28', NULL, NULL, 'photos/1/p1.jpg', '10 minutes without intermission', 'June 28th, 2014 at Theater am Aegi, Hannover, Germany', NULL),
(28, '測試標題', '這邊是小小的訊息', '<p>大多數從過去和現在擔憂的原因，以及苦果生活結果的痛苦由此產生。如果你想從苦難緩解一下自己，你必須尋找你內心的和諧。但是，你真的知道你的心靈的真實的聲音是什麼？</p>\r\n', 'https://www.youtube.com/watch?v=loRDgiySoZ0', '2016-11-13', '2016-11-14 09:29:30', '2016-11-14 13:09:48', 'photos/28/28_20161114181322692.jpg', '20分鐘', '2016年10月22日探戈裴，留尼汪', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `work_id` int(10) UNSIGNED NOT NULL,
  `reviewer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `reviews`
--

INSERT INTO `reviews` (`id`, `work_id`, `reviewer`, `content`, `created_at`, `updated_at`) VALUES
(1, 20, '- Les Trois Coups | Le Journal du Spectacle Vivant , France', '“Une idée somme toute très simple, mais exploitée ici avec beaucoup d’intelligence de la part de Po-Cheng\r\n\r\nTsai, mais aussi avec une extraordinaire virtuosité chez les interprètes. Tout cela a l’air tellement facile ! Il y a\r\n\r\nmême parfois une légère pointe d’humour... L’atmosphère de rituel magique est également entretenue par\r\n\r\nun superbe travail de lumière. Les danseurs sont tantôt enveloppés dans de suaves lueurs ocre, tantôt dans\r\n\r\nun noir et blanc quasi expressionniste. Ce spectacle, présenté pour la première fois en France, serait digne\r\n\r\nd’être programmé dans les meilleures salles.”', NULL, NULL),
(2, 20, '- Kreiszeitung.de', '“Die einzige Dopplung gab es bei „Floating Flowers” von Po-Cheng Tsai aus Taiwan, der sowohl den\r\n\r\nPublikumspreis als auch den brandneuen Produktionspreis von Gauthier Dance/Theaterhaus Stuttgart\r\n\r\nabräumte: eine treffend betitelte Arbeit, ebenso poetisch wie klug. Letzteres vor allem deshalb, weil der\r\n\r\nEffekt, einen Rock so geschickt einzusetzen, dass die beiden aufeinander geschulterten Akteure wirkten wie\r\n\r\nein einziger Tanzriese, nicht totgeritten wurde.”', NULL, NULL),
(3, 20, '- Hannoversche Allgemeine, Germany', '“Der Publikumsliebling kommt aus Taiwan: Tsai Po-Cheng bot mit seinem Duett „Floating\r\n\r\nFlowers“ einige Überraschungen auf der Bühne. Die erste war, wie die zierliche Tänzerin plötzlich\r\n\r\nbaumlang wurde, nachdem ihr Partner sich zuvor unter ihrem Reifrock verborgen hatte und sich\r\n\r\nschließlich mit der Frau auf seinen Schultern aufrichtete. Was folgte, war eine witzige und\r\n\r\ntemporeiche Zwitterpartie. Dafür gab es nicht nur den Zuschauerpreis (dotiert mit 1000 Euro),\r\n\r\nsondern auch einen von drei Produktionspreisen: Der mit seiner Compagnie Gauthier Dance im\r\n\r\nTheaterhaus Stuttgart international erfolgreiche Choreograf Eric Gauthier will mit Tsai Po-Cheng\r\n\r\nals Gastchoreograf im nächsten Jahr auf Tournee gehen.”', NULL, NULL),
(4, 20, '- New York Times', '“One became two during Mr. Tsai’s “Floating Flowers,” in which the diminutive Garazi Perez\r\n\r\nOloriz grows into a careening giant. Maurus Gauthier, hidden under Ms. Oloriz’s tulle skirt, forms\r\n\r\nher lower half, before they divide and conquer the space side by side.”', NULL, NULL),
(5, 15, '- Le Monde, France', '“...A main gauche, envolée de tulle et d’énergie âpre avec Floating Flowers, de Po-Cheng Tsai, à\r\n\r\nla tête de la compagnie B. Dance depuis 2010. Déjà bardé de prix récoltés lors de compétitions en\r\n\r\nAllemagne, en Espagne, ce jeune chorégraphe met le tutu romantique à l’épreuve de la question\r\n\r\ndes genres et d’une énergie parfois martiale. Et ça dépote, et ça fonce ! ”', NULL, NULL),
(6, 15, '- La Terrasse, France', '“Des danseurs magnifiques, enveloppés dans des mousselines vaporeuses, des images et des lumières rappelant des paysages mystérieux, voici Floating Flowers, une chorégraphie taïwanaise d’une pure beauté.”', NULL, NULL),
(7, 15, '- Jean Barak | ENVRAK, France', '“Floating Flowers, les fleurs flottantes de Po-Cheng Tsai...Ce sont des extra terrestres, on n’a jamais vu ça nulle part...Eux ont un appétit à dévorer le monde.” ', NULL, NULL),
(8, 15, '- Culturebox, France', 'Floating Flowers : la déferlante chorégraphique d''un jeune taïwanais à Avignon...Un spectacle chargé d''une énergie rare, servi par des danseurs impressionnants. La chorégraphie est signée Po-Cheng Tsai, jeune chorégraphe taïwanais de 29 ans particulièrement inspiré.”', NULL, NULL),
(9, 15, '- Kreiszeitung.de', '“Die einzige Dopplung gab es bei „Floating Flowers” von Po-Cheng Tsai aus Taiwan, der sowohl den Publikumspreis als auch den brandneuen Produktionspreis von Gauthier Dance/Theaterhaus Stuttgart abräumte: eine treffend betitelte Arbeit, ebenso poetisch wie klug. Letzteres vor allem deshalb, weil der Effekt, einen Rock so geschickt einzusetzen, dass die beiden aufeinander geschulterten Akteure wirkten wie ein einziger Tanzriese, nicht totgeritten wurde.”', NULL, NULL),
(10, 1, '', 'But the evening''s most surprising feature was reportedly enough also that which scored the biggest applause: a duel between two men and a red stick, created by Taiwanese Po-Cheng Tsai, who last year won the Copenhagen International Choreography Competition.', NULL, NULL),
(11, 1, '', 'A charitable different story conqueror stage with Sheng-Ho Chang and Chien-Chih Chang from the Taiwanese company B. DANCE.', NULL, NULL),
(12, 28, '台灣眼鏡仔', '“Floating Flowers, les fleurs flottantes de Po-Cheng Tsai...Ce sont des extra terrestres, on n’a jamais vu ça nulle part...Eux ont un appétit à dévorer le monde.”', '2016-11-01 16:00:00', '2016-11-13 16:00:00');

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

-- --------------------------------------------------------

--
-- 資料表結構 `stuffs`
--

CREATE TABLE `stuffs` (
  `id` int(10) UNSIGNED NOT NULL,
  `work_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('primary','secondary') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rest_stuffs` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `stuffs`
--

INSERT INTO `stuffs` (`id`, `work_id`, `name`, `type`, `created_at`, `updated_at`, `photo`, `role`, `rest_stuffs`) VALUES
(1, 20, 'Chiung-Tai Huang', 'primary', NULL, NULL, 'photos/1/Chiung-TaiHuang.jpg', 'Dancer', ''),
(2, 20, 'Sheng-Ho Chang ', 'primary', NULL, NULL, 'photos/1/Sheng-HoChang.jpg', 'Dancer', ''),
(4, 15, '張元豪Yuan-Hao CHANG', 'primary', NULL, NULL, 'photos/2/2-1.jpg', 'Dancer', ''),
(5, 15, '張瑀Yu Chang', 'primary', NULL, NULL, 'photos/2/2-2.jpg', 'Dancer', ''),
(6, 15, '傑克Jack', 'primary', NULL, NULL, 'photos/2/2-3.jpg', 'Dancer', ''),
(7, 15, '劉明軒Ming-Hsuan LIU', 'primary', NULL, NULL, 'photos/2/2-4.jpg', 'Dancer', ''),
(8, 15, '黃依涵I-Han Huang', 'primary', NULL, NULL, 'photos/2/2-5.jpg', 'Dancer', ''),
(9, 15, '黃芃睿Chiung-Tai Huang', 'primary', NULL, NULL, 'photos/2/2-6.jpg', 'Dancer', ''),
(10, 15, '張聖和Sheng-Ho Chang ', 'primary', NULL, NULL, 'photos/2/2-7.jpg', 'Dancer', ''),
(11, 15, '張堅志Chien-Chih Chang', 'primary', NULL, NULL, 'photos/2/2-8.jpg', 'Dancer', ''),
(12, 15, '蔡博丞Po-Cheng TSAI', 'primary', NULL, NULL, 'photos/2/2-20.jpg', 'Dancer', ''),
(13, 15, '1', 'secondary', NULL, NULL, '', '', ''),
(16, 28, '渾蛋', 'primary', '2016-11-14 17:07:15', '2016-11-14 17:07:15', 'photos/28/28_20161115010715820.jpg', '唬爛王', ''),
(17, 28, '舞者', 'primary', '2016-11-14 17:07:39', '2016-11-14 17:07:39', 'photos/28/28_20161115010739435.jpg', '暴力者', ''),
(29, 28, '', 'secondary', NULL, NULL, '', '', '<p>asdfasdf</p>\r\n\r\n<p>asdfasdf</p>\r\n\r\n<p>asdfasdfasf</p>\r\n'),
(30, 28, '', 'secondary', NULL, NULL, '', '', '<p>123456798</p>\r\n'),
(31, 28, '', 'secondary', NULL, NULL, '', '', '<p>111222244444000</p>\r\n\r\n<p>aaaaabbbbbbbbbb</p>\r\n'),
(32, 28, '', 'secondary', NULL, NULL, '', '', '<p>aaaaaa</p>\r\n\r\n<p>bbbbbb</p>\r\n\r\n<p>ccccccc</p>\r\n');

-- --------------------------------------------------------

--
-- 資料表結構 `tours`
--

CREATE TABLE `tours` (
  `id` int(10) UNSIGNED NOT NULL,
  `work_id` int(10) UNSIGNED NOT NULL,
  `tour_date` date NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `performed` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `tours`
--

INSERT INTO `tours` (`id`, `work_id`, `tour_date`, `name`, `performed`, `order`) VALUES
(1, 20, '0000-00-00', 'FLOATING FLOWERS & HUGIN/MUNIN,', 'CÁDIZ EN DANZA (ES)', 0),
(2, 20, '0000-00-00', 'FLOATING FLOWERS & HUGIN/MUNIN,', 'Zaragoza Trayecto (ES)', 0),
(3, 20, '0000-00-00', 'FLOATING FLOWERS,', 'LUCKY TRIMMER DOES WALES (UK)', 0),
(4, 20, '0000-00-00', 'FLOATING FLOWERS & INNERMOST & ALMOST HUMAN\r\n\r\n(world premiere)', '- Festival Danse Péi, La Réunion (FR)', 0),
(5, 20, '0000-00-00', 'B.DANCE GALA', '- Bilbao Dance Festival, Fundición Bilbao (ES)', 0),
(6, 20, '0000-00-00', 'FLOATING FLOWERS,', 'Jerusalem International Choreography Competition (IL)', 0),
(7, 15, '0000-00-00', 'FLOATING FLOWERS,', 'The Circulo de Bellas Artes in Madrid (CBA) (ES)', 0),
(8, 15, '0000-00-00', 'FLOATING FLOWERS,', 'CDC - Les Hivernales Festival Off d’Avignon (FR)', 0),
(9, 1, '0000-00-00', '(10 minutes)', 'Copenhagen International Choreography Competition', 0),
(10, 28, '2016-11-02', '亂流', '哥本哈根國際編舞大賽', 0),
(12, 28, '2016-11-10', '櫻花雪月', '亂演公會盛大演出', 0),
(13, 28, '2016-11-07', '三月雪', '紐約紐約時尚', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'cheney.avio@gmail.com', '74e379a0761a0c05b033bfb78359f05b', NULL, '2016-11-06 05:24:01', NULL);

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
-- 資料表索引 `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `awards_work_id_foreign` (`work_id`);

--
-- 資料表索引 `boom_ad`
--
ALTER TABLE `boom_ad`
  ADD PRIMARY KEY (`ba_id`),
  ADD KEY `ba_work` (`ba_work`);

--
-- 資料表索引 `boom_info`
--
ALTER TABLE `boom_info`
  ADD PRIMARY KEY (`bi_id`);

--
-- 資料表索引 `boom_list`
--
ALTER TABLE `boom_list`
  ADD PRIMARY KEY (`bl_id`);

--
-- 資料表索引 `boom_user`
--
ALTER TABLE `boom_user`
  ADD PRIMARY KEY (`bu_id`);

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
-- 資料表索引 `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`nw_id`),
  ADD KEY `nw_title` (`nw_title`);

--
-- 資料表索引 `news_ad`
--
ALTER TABLE `news_ad`
  ADD PRIMARY KEY (`na_id`),
  ADD KEY `na_nwid` (`na_nwid`);

--
-- 資料表索引 `news_video`
--
ALTER TABLE `news_video`
  ADD PRIMARY KEY (`nv_id`),
  ADD KEY `nv_nwid` (`nv_nwid`);

--
-- 資料表索引 `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- 資料表索引 `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_work_id_foreign` (`work_id`);

--
-- 資料表索引 `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_work_id_foreign` (`work_id`);

--
-- 資料表索引 `slogan`
--
ALTER TABLE `slogan`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `stuffs`
--
ALTER TABLE `stuffs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stuffs_work_id_foreign` (`work_id`);

--
-- 資料表索引 `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tours_work_id_foreign` (`work_id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
-- 使用資料表 AUTO_INCREMENT `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `boom_ad`
--
ALTER TABLE `boom_ad`
  MODIFY `ba_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `boom_info`
--
ALTER TABLE `boom_info`
  MODIFY `bi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `boom_list`
--
ALTER TABLE `boom_list`
  MODIFY `bl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `boom_user`
--
ALTER TABLE `boom_user`
  MODIFY `bu_id` int(11) NOT NULL AUTO_INCREMENT;
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
-- 使用資料表 AUTO_INCREMENT `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `nw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `news_ad`
--
ALTER TABLE `news_ad`
  MODIFY `na_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用資料表 AUTO_INCREMENT `news_video`
--
ALTER TABLE `news_video`
  MODIFY `nv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- 使用資料表 AUTO_INCREMENT `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- 使用資料表 AUTO_INCREMENT `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用資料表 AUTO_INCREMENT `slogan`
--
ALTER TABLE `slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `stuffs`
--
ALTER TABLE `stuffs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- 使用資料表 AUTO_INCREMENT `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用資料表 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `awards`
--
ALTER TABLE `awards`
  ADD CONSTRAINT `awards_work_id_foreign` FOREIGN KEY (`work_id`) REFERENCES `projects` (`id`);

--
-- 資料表的 Constraints `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_work_id_foreign` FOREIGN KEY (`work_id`) REFERENCES `projects` (`id`);

--
-- 資料表的 Constraints `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_work_id_foreign` FOREIGN KEY (`work_id`) REFERENCES `projects` (`id`);

--
-- 資料表的 Constraints `stuffs`
--
ALTER TABLE `stuffs`
  ADD CONSTRAINT `stuffs_work_id_foreign` FOREIGN KEY (`work_id`) REFERENCES `projects` (`id`);

--
-- 資料表的 Constraints `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `tours_work_id_foreign` FOREIGN KEY (`work_id`) REFERENCES `projects` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
