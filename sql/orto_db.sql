-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 05, 2016 at 01:05 PM
-- Server version: 10.0.25-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ortoped`
--

-- --------------------------------------------------------

--
-- Table structure for table `orto_alerts`
--

CREATE TABLE IF NOT EXISTS `orto_alerts` (
  `id` int(10) unsigned NOT NULL,
  `doctor_id_to` int(10) unsigned DEFAULT '0' COMMENT 'id врача кому',
  `doctor_id_from` int(10) unsigned DEFAULT '0' COMMENT 'id врача от кого',
  `date` int(10) unsigned DEFAULT '0' COMMENT 'дата сообщения',
  `read_status` tinyint(1) unsigned DEFAULT '0' COMMENT '1-прочитано 0 нет',
  `text` text COMMENT 'текст сообщения'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orto_banners`
--

CREATE TABLE IF NOT EXISTS `orto_banners` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(50) DEFAULT NULL COMMENT 'название баннера',
  `banner` varchar(50) DEFAULT NULL COMMENT 'имя файла',
  `type` tinyint(1) unsigned DEFAULT NULL COMMENT 'тип баннера 0-картинка 1-текст',
  `date` int(10) unsigned DEFAULT NULL COMMENT 'дата добавления',
  `date_start` int(10) unsigned DEFAULT NULL COMMENT 'дата начала показа',
  `date_finish` int(10) unsigned DEFAULT NULL COMMENT 'дата завершения показа',
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT 'состояние баннера ',
  `text` text COMMENT 'текст баннера '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='баннеры';

-- --------------------------------------------------------

--
-- Table structure for table `orto_chat`
--

CREATE TABLE IF NOT EXISTS `orto_chat` (
  `id` int(10) unsigned NOT NULL,
  `date` datetime NOT NULL COMMENT 'дата создания',
  `date_view` datetime DEFAULT NULL COMMENT 'дата  просмотра',
  `user_id` int(10) unsigned NOT NULL,
  `sender_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0-не прочитано 1-прочитано',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0-обычное 1-срочное',
  `msg` varchar(1024) NOT NULL COMMENT 'сообщение 1Кб'
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8 COMMENT='чат для техников и мед директоров';

--
-- Dumping data for table `orto_chat`
--

INSERT INTO `orto_chat` (`id`, `date`, `date_view`, `user_id`, `sender_id`, `status`, `type`, `msg`) VALUES
(1, '2016-08-04 11:40:41', '2016-08-05 00:00:00', 2, 12, 1, 0, 'test 1'),
(2, '2016-08-04 11:41:38', '2016-08-05 00:00:00', 2, 12, 1, 0, 'test 2\nsfdsf dsfdsfds'),
(3, '2016-08-04 11:49:18', '2016-08-05 00:00:00', 2, 12, 1, 0, 'test 3'),
(4, '2016-08-04 11:49:48', '2016-08-05 00:00:00', 2, 12, 1, 0, 'test 4'),
(5, '2016-08-04 11:59:05', '2016-08-05 00:00:00', 2, 12, 1, 0, 'test 5'),
(6, '2016-08-04 12:01:55', '2016-08-05 00:00:00', 2, 12, 1, 0, 'test 6'),
(7, '2016-08-04 12:04:40', '2016-08-05 00:00:00', 2, 12, 1, 0, 'Test 7\nsdfs '),
(8, '2016-08-04 12:06:53', '2016-08-05 00:00:00', 4, 12, 1, 0, 'rtretre'),
(9, '2016-08-04 12:07:26', '2016-08-05 00:00:00', 4, 12, 1, 0, 'wrere'),
(10, '2016-08-04 12:29:36', '2016-08-05 00:00:00', 2, 12, 1, 0, 'test 8'),
(11, '2016-08-04 12:34:33', '2016-08-05 00:00:00', 12, 2, 1, 0, 'tet'),
(12, '2016-08-04 12:35:02', '2016-08-05 00:00:00', 12, 2, 1, 0, 'sdrtesfsd'),
(13, '2016-08-04 12:38:20', '2016-08-05 00:00:00', 2, 12, 1, 0, 'test'),
(14, '2016-08-04 12:38:27', '2016-08-05 00:00:00', 12, 2, 1, 0, 'sdfdfds'),
(15, '2016-08-04 12:38:51', '2016-08-05 00:00:00', 12, 2, 1, 0, '111'),
(16, '2016-08-04 12:44:16', '2016-08-05 00:00:00', 4, 2, 1, 0, 'teste'),
(17, '2016-08-04 12:49:34', '2016-08-05 00:00:00', 2, 12, 1, 0, 'tesfdfds'),
(18, '2016-08-04 12:52:39', '2016-08-05 00:00:00', 2, 12, 1, 0, 'test'),
(19, '2016-08-04 12:54:01', '2016-08-05 00:00:00', 2, 12, 1, 0, 'test'),
(20, '2016-08-04 12:54:48', '2016-08-05 00:00:00', 2, 12, 1, 0, 'dfgfdg'),
(21, '2016-08-04 12:55:01', '2016-08-05 00:00:00', 2, 12, 1, 0, 'test'),
(22, '2016-08-04 12:55:07', '2016-08-05 00:00:00', 12, 2, 1, 0, 'hewersd'),
(23, '2016-08-04 12:58:17', '2016-08-05 00:00:00', 2, 12, 1, 0, 'tsdfs'),
(24, '2016-08-04 12:58:50', '2016-08-05 00:00:00', 4, 2, 1, 0, 'sdfd'),
(25, '2016-08-04 13:00:42', '2016-08-05 00:00:00', 12, 2, 1, 0, 'sdfsdfds\nsdfdsf'),
(26, '2016-08-05 04:59:18', '2016-08-05 00:00:00', 2, 13, 1, 0, 'buhhhh'),
(27, '2016-08-05 05:30:44', '2016-08-05 00:00:00', 2, 12, 1, 0, 'test'),
(28, '2016-08-05 05:31:13', '2016-08-05 00:00:00', 12, 2, 1, 0, 'sdfdsfsdfsd'),
(29, '2016-08-05 05:32:07', '2016-08-05 00:00:00', 12, 2, 1, 0, 'esfrfsd'),
(30, '2016-08-05 05:32:25', '2016-08-05 00:00:00', 12, 2, 1, 0, 'dsfdsfds'),
(31, '2016-08-05 05:33:53', '2016-08-05 00:00:00', 2, 12, 1, 0, 'assadas'),
(32, '2016-08-05 05:35:56', '2016-08-05 00:00:00', 2, 12, 1, 0, 'dsfdsfsd'),
(33, '2016-08-05 05:36:10', '2016-08-05 00:00:00', 2, 12, 1, 0, 'dsfdsf'),
(34, '2016-08-05 05:48:27', '2016-08-05 00:00:00', 2, 12, 1, 0, 'dfgfdg'),
(35, '2016-08-05 05:48:38', '2016-08-05 00:00:00', 12, 2, 1, 0, 'dsfdsfd'),
(36, '2016-08-05 05:48:53', '2016-08-05 00:00:00', 12, 2, 1, 0, 'rdfdg'),
(37, '2016-08-05 05:51:43', '2016-08-05 00:00:00', 2, 12, 1, 0, 'sdfdsfdsf\nsasfd'),
(38, '2016-08-05 05:52:34', '2016-08-05 00:00:00', 12, 2, 1, 0, 'dfgdfg\ndsgf'),
(39, '2016-08-05 05:52:43', '2016-08-05 00:00:00', 2, 12, 1, 0, 'sfdsf'),
(40, '2016-08-05 05:52:47', '2016-08-05 00:00:00', 12, 2, 1, 0, 'sdfsdfds'),
(41, '2016-08-05 05:53:10', '2016-08-05 00:00:00', 2, 12, 1, 0, 'sdfdsf'),
(42, '2016-08-05 05:53:50', '2016-08-05 00:00:00', 2, 12, 1, 0, 'sdfdsf'),
(43, '2016-08-05 05:56:16', '2016-08-05 00:00:00', 2, 12, 1, 0, 'test'),
(44, '2016-08-05 05:56:33', '2016-08-05 00:00:00', 12, 2, 1, 0, 'dfgdgf'),
(45, '2016-08-05 05:57:25', '2016-08-05 00:00:00', 2, 13, 1, 0, 'efsadfdsfds'),
(46, '2016-08-05 05:57:58', '2016-08-05 00:00:00', 13, 2, 1, 0, 'dsfgdsfdsf'),
(47, '2016-08-05 05:58:06', '2016-08-05 00:00:00', 2, 12, 1, 0, 'sdfdsfdsf'),
(48, '2016-08-05 05:58:11', '2016-08-05 00:00:00', 2, 13, 1, 0, 'sdfsfsd'),
(49, '2016-08-05 06:02:53', '2016-08-05 00:00:00', 12, 2, 1, 0, 'dsfd'),
(50, '2016-08-05 06:08:56', '2016-08-05 00:00:00', 2, 12, 1, 0, 'dsfsdfdsf'),
(51, '2016-08-05 06:09:34', '2016-08-05 00:00:00', 2, 12, 1, 0, 'sdfds'),
(52, '2016-08-05 06:10:44', '2016-08-05 00:00:00', 2, 12, 1, 0, 'dsfdf'),
(53, '2016-08-05 06:10:53', '2016-08-05 00:00:00', 12, 2, 1, 0, 'sadasd'),
(54, '2016-08-05 06:14:48', '2016-08-05 00:00:00', 12, 13, 1, 0, 'dfgdfgd'),
(55, '2016-08-05 06:14:51', '2016-08-05 00:00:00', 12, 13, 1, 0, 'ddfgdf'),
(56, '2016-08-05 06:15:02', '2016-08-05 00:00:00', 12, 13, 1, 0, 'sdfsdfdsfds'),
(57, '2016-08-05 06:27:19', '2016-08-05 00:00:00', 12, 2, 1, 0, 'sdfdsfsd'),
(58, '2016-08-05 06:29:03', '2016-08-05 00:00:00', 12, 2, 1, 0, 'sfdsdf'),
(59, '2016-08-05 06:29:12', '2016-08-05 00:00:00', 2, 12, 1, 0, 'dsfdsf'),
(60, '2016-08-05 06:29:30', '2016-08-05 00:00:00', 2, 12, 1, 0, 'asds'),
(61, '2016-08-05 07:50:23', '2016-08-05 00:00:00', 12, 2, 1, 0, 'serser\ndfd'),
(62, '2016-08-05 07:50:48', '2016-08-05 00:00:00', 12, 2, 1, 0, 'terter\nre'),
(63, '2016-08-05 07:54:06', '2016-08-05 00:00:00', 12, 2, 1, 0, 'dsfdsfd'),
(64, '2016-08-05 07:54:27', '2016-08-05 00:00:00', 12, 2, 1, 0, 'sdfd\ns'),
(65, '2016-08-05 07:55:06', '2016-08-05 00:00:00', 12, 2, 1, 0, 'dfgf'),
(66, '2016-08-05 07:57:29', '2016-08-05 00:00:00', 2, 12, 1, 0, 'sdfds'),
(67, '2016-08-05 07:57:44', '2016-08-05 00:00:00', 2, 12, 1, 0, 'efrsd'),
(68, '2016-08-05 08:03:22', '2016-08-05 00:00:00', 2, 12, 1, 0, 'edfdf'),
(69, '2016-08-05 08:04:30', '2016-08-05 00:00:00', 2, 12, 1, 0, 'dgd\nsd'),
(70, '2016-08-05 08:48:03', '2016-08-05 00:00:00', 12, 2, 1, 0, 'dfgdfg\nsd'),
(71, '2016-08-05 08:48:35', '2016-08-05 00:00:00', 12, 2, 1, 0, 'ds'),
(72, '2016-08-05 08:54:37', '2016-08-05 00:00:00', 12, 2, 1, 0, 's'),
(73, '2016-08-05 08:55:07', '2016-08-05 00:00:00', 12, 2, 1, 0, 'sfds'),
(74, '2016-08-05 08:58:58', '2016-08-05 00:00:00', 12, 2, 1, 0, 'dsfd'),
(75, '2016-08-05 09:00:02', '2016-08-05 00:00:00', 2, 12, 1, 0, 'sdfsdfd'),
(76, '2016-08-05 09:00:48', '2016-08-05 00:00:00', 2, 12, 1, 0, 'sds'),
(77, '2016-08-05 09:08:42', '2016-08-05 00:00:00', 2, 12, 1, 0, 'fdtgrt'),
(78, '2016-08-05 09:13:47', '2016-08-05 00:00:00', 2, 12, 1, 0, 'fd'),
(79, '2016-08-05 09:14:08', '2016-08-05 00:00:00', 12, 2, 1, 0, 'dfd'),
(80, '2016-08-05 09:14:26', '2016-08-05 00:00:00', 2, 12, 1, 0, 'sdf'),
(81, '2016-08-05 09:14:34', '2016-08-05 00:00:00', 12, 2, 1, 0, 'sdfd'),
(82, '2016-08-05 09:15:00', '2016-08-05 00:00:00', 2, 12, 1, 0, 'sfdsf'),
(83, '2016-08-05 09:15:02', '2016-08-05 00:00:00', 12, 2, 1, 0, 'sdfsd'),
(84, '2016-08-05 09:18:08', '2016-08-05 00:00:00', 2, 12, 1, 0, 'sdf'),
(85, '2016-08-05 09:19:46', '2016-08-05 00:00:00', 2, 12, 1, 0, 'sdfds'),
(86, '2016-08-05 09:19:48', '2016-08-05 00:00:00', 12, 2, 1, 0, 'sdfd'),
(87, '2016-08-05 09:19:54', '2016-08-05 00:00:00', 2, 12, 1, 0, 'sdf'),
(88, '2016-08-05 09:20:01', '2016-08-05 00:00:00', 12, 2, 1, 0, 'sdfds'),
(89, '2016-08-05 09:20:04', '2016-08-05 00:00:00', 2, 12, 1, 0, 'sdf'),
(90, '2016-08-05 09:20:22', '2016-08-05 00:00:00', 12, 2, 1, 0, 'asdsa'),
(91, '2016-08-05 09:20:36', '2016-08-05 00:00:00', 2, 12, 1, 0, 'sdf'),
(92, '2016-08-05 09:20:39', '2016-08-05 00:00:00', 12, 2, 1, 0, 'sdf'),
(93, '2016-08-05 09:20:41', '2016-08-05 00:00:00', 2, 12, 1, 0, 'sdf'),
(94, '2016-08-05 09:20:44', '2016-08-05 00:00:00', 2, 12, 1, 0, 'sdf'),
(95, '2016-08-05 09:21:43', '2016-08-05 00:00:00', 12, 13, 1, 0, 'gfdg'),
(96, '2016-08-05 09:22:11', '2016-08-05 00:00:00', 13, 12, 1, 0, 'sdfds'),
(97, '2016-08-05 09:22:18', '2016-08-05 00:00:00', 12, 13, 1, 0, 'sdfsdf'),
(98, '2016-08-05 09:22:19', '2016-08-05 00:00:00', 12, 13, 1, 0, 'sdf'),
(99, '2016-08-05 09:22:22', '2016-08-05 00:00:00', 13, 12, 1, 0, 'sdf'),
(100, '2016-08-05 09:22:35', '2016-08-05 00:00:00', 12, 13, 1, 0, 'zsdsds'),
(101, '2016-08-05 09:22:51', '2016-08-05 00:00:00', 12, 2, 1, 0, 'dsfd'),
(102, '2016-08-05 09:22:58', '2016-08-05 00:00:00', 12, 13, 1, 0, 'dfd'),
(103, '2016-08-05 09:23:10', '2016-08-05 00:00:00', 2, 12, 1, 0, 'sads'),
(104, '2016-08-05 09:23:21', '2016-08-05 00:00:00', 12, 13, 1, 0, 'edfd'),
(105, '2016-08-05 09:23:30', '2016-08-05 00:00:00', 12, 2, 1, 0, 'fdgf'),
(106, '2016-08-05 09:23:55', '2016-08-05 00:00:00', 13, 12, 1, 0, 'asd'),
(107, '2016-08-05 09:24:09', '2016-08-05 00:00:00', 2, 12, 1, 0, 'dsfsd'),
(108, '2016-08-05 09:24:32', '2016-08-05 00:00:00', 2, 12, 1, 0, 'dfgfd'),
(109, '2016-08-05 09:29:33', '2016-08-05 00:00:00', 12, 4, 1, 0, 'sdfd'),
(110, '2016-08-05 09:29:45', '2016-08-05 00:00:00', 12, 4, 1, 0, 'dfdfg'),
(111, '2016-08-05 09:30:07', '2016-08-05 00:00:00', 4, 12, 1, 0, 'dsfdsfds'),
(112, '2016-08-05 09:31:18', '2016-08-05 00:00:00', 2, 12, 1, 0, 'sdfd'),
(113, '2016-08-05 09:37:05', '2016-08-05 00:00:00', 4, 12, 1, 0, 'dsd'),
(114, '2016-08-05 09:37:32', '2016-08-05 00:00:00', 12, 4, 1, 0, 'dgdfg'),
(115, '2016-08-05 09:52:54', '2016-08-05 00:00:00', 12, 4, 1, 0, 'sdfdsfsdf'),
(116, '2016-08-05 09:53:18', '2016-08-05 00:00:00', 4, 12, 1, 0, 'sdfdf'),
(117, '2016-08-05 09:58:52', '2016-08-05 00:00:00', 4, 12, 1, 0, 'sdfdsdf'),
(118, '2016-08-05 09:59:34', '2016-08-05 00:00:00', 12, 4, 1, 0, 'sdfds'),
(119, '2016-08-05 09:59:46', '2016-08-05 00:00:00', 4, 12, 1, 0, 'sfsdf'),
(120, '2016-08-05 10:00:04', '2016-08-05 00:00:00', 12, 4, 1, 0, 'sdfsd'),
(121, '2016-08-05 10:01:52', '2016-08-05 00:00:00', 12, 4, 1, 0, ',o,koko'),
(122, '2016-08-05 10:01:55', '2016-08-05 00:00:00', 12, 4, 1, 0, 'kimi'),
(123, '2016-08-05 10:02:35', '2016-08-05 00:00:00', 12, 4, 1, 0, 'dfgdfg'),
(124, '2016-08-05 10:03:18', '2016-08-05 00:00:00', 12, 4, 1, 0, 'dfgfdgfd'),
(125, '2016-08-05 10:03:25', '2016-08-05 00:00:00', 12, 4, 1, 0, 'dfgfd'),
(126, '2016-08-05 10:03:45', '2016-08-05 00:00:00', 4, 12, 1, 0, 'dfgfd'),
(127, '2016-08-05 10:04:00', '2016-08-05 00:00:00', 4, 12, 1, 0, 'fdgf'),
(128, '2016-08-05 11:31:41', '2016-08-05 00:00:00', 12, 2, 1, 0, 'sdfdsf'),
(129, '2016-08-05 11:32:16', '2016-08-05 00:00:00', 2, 12, 1, 0, 'dgdfg'),
(130, '2016-08-05 11:32:21', '2016-08-05 00:00:00', 12, 2, 1, 0, 'dsfd'),
(131, '2016-08-05 11:46:04', '2016-08-05 00:00:00', 12, 2, 1, 0, 'test<h1>test</h1>');

-- --------------------------------------------------------

--
-- Table structure for table `orto_clinics`
--

CREATE TABLE IF NOT EXISTS `orto_clinics` (
  `id` int(10) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `adress` varchar(128) DEFAULT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `contacts_admin` varchar(128) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `model_price` float(10,3) unsigned DEFAULT NULL COMMENT 'цена',
  `elayner_price` float(10,3) unsigned DEFAULT NULL,
  `attachment_price` float(10,3) unsigned DEFAULT NULL,
  `checkpoint_price` float(10,3) unsigned DEFAULT NULL,
  `reteiner_price` float(10,3) unsigned DEFAULT NULL,
  `model_discount` float(10,3) unsigned DEFAULT NULL COMMENT 'скидка',
  `elayner_discount` float(10,3) unsigned DEFAULT NULL,
  `attachment_discount` float(10,3) unsigned DEFAULT NULL,
  `checkpoint_discount` float(10,3) unsigned DEFAULT NULL,
  `reteiner_discount` float(10,3) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='клиники';

--
-- Dumping data for table `orto_clinics`
--

INSERT INTO `orto_clinics` (`id`, `title`, `adress`, `phone`, `contacts_admin`, `email`, `model_price`, `elayner_price`, `attachment_price`, `checkpoint_price`, `reteiner_price`, `model_discount`, `elayner_discount`, `attachment_discount`, `checkpoint_discount`, `reteiner_discount`) VALUES
(1, 'test', 'test asdtet', '9209349234', '2319849234', 'clinic@clic.cld', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'ssss', 's', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'dfdfdf', 'dsf', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orto_clinic_doctor`
--

CREATE TABLE IF NOT EXISTS `orto_clinic_doctor` (
  `doctor_id` int(10) unsigned NOT NULL COMMENT 'врач',
  `clinic_id` int(10) unsigned NOT NULL COMMENT 'клиника'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='статусы догворов врачей и клиник\r\n';

--
-- Dumping data for table `orto_clinic_doctor`
--

INSERT INTO `orto_clinic_doctor` (`doctor_id`, `clinic_id`) VALUES
(12, 1),
(12, 2),
(12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `orto_comments`
--

CREATE TABLE IF NOT EXISTS `orto_comments` (
  `id` int(10) unsigned NOT NULL,
  `doctor_id` int(10) unsigned DEFAULT NULL,
  `date` int(10) unsigned DEFAULT NULL,
  `text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='комментарии';

-- --------------------------------------------------------

--
-- Table structure for table `orto_doctors`
--

CREATE TABLE IF NOT EXISTS `orto_doctors` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `clinic_id` int(10) unsigned DEFAULT NULL COMMENT '0-клиника 1-торг.предст',
  `age` int(10) unsigned DEFAULT NULL COMMENT 'дата рождения (для возраста)',
  `firstname` varchar(32) DEFAULT NULL COMMENT 'имя',
  `lastname` varchar(32) DEFAULT NULL COMMENT 'фамилия',
  `thirdname` varchar(32) DEFAULT NULL COMMENT 'отчество',
  `type` tinyint(1) unsigned DEFAULT NULL COMMENT '0-техник, 1-врач, 2-директор,3-бухгалтер, 4-админ',
  `edu` tinyint(1) unsigned DEFAULT NULL COMMENT '0-клиника 1-торг.предст',
  `gender` tinyint(1) unsigned DEFAULT NULL COMMENT 'пол 0-женщина 1 мужчина',
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT 'состояние',
  `passport` varchar(32) DEFAULT NULL COMMENT 'паспорт',
  `email` varchar(64) DEFAULT NULL COMMENT 'email',
  `phone` varchar(16) DEFAULT NULL COMMENT 'телефон',
  `regalies` varchar(128) DEFAULT NULL COMMENT 'состояние',
  `password` varchar(255) DEFAULT NULL COMMENT 'смена пароля'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='врачи и техники';

--
-- Dumping data for table `orto_doctors`
--

INSERT INTO `orto_doctors` (`id`, `clinic_id`, `age`, `firstname`, `lastname`, `thirdname`, `type`, `edu`, `gender`, `status`, `passport`, `email`, `phone`, `regalies`, `password`) VALUES
(2, 1, 1189972800, 'Анвар', NULL, NULL, 0, 0, 0, 1, '453454545', 'qwewe@qw4ew.ew', '555555', 'sdfnkdlf', '11111'),
(4, 1, 189982800, 'Виктор', NULL, NULL, 1, NULL, NULL, 1, '1', '32', '13', '123', NULL),
(8, 1, 0, 'Боря', NULL, NULL, 2, NULL, NULL, 1, '', '', '', '', NULL),
(12, 2, 172800, 'Михаил', NULL, NULL, 1, 1, 1, 1, '21321231', 'sdfdf@wewe.wew', '41452112', 'test', '1'),
(13, 1, 539298000, 'Анна', NULL, NULL, 3, 1, 0, 1, '21321231', 'sdfdf@wewe.wew', '41452112', '', NULL),
(14, NULL, NULL, 'Валя', NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(15, NULL, NULL, 'Гала', NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orto_materials`
--

CREATE TABLE IF NOT EXISTS `orto_materials` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `order_id` int(10) unsigned DEFAULT NULL COMMENT 'номер заказа',
  `doctor_id` int(10) unsigned DEFAULT NULL COMMENT 'id врача',
  `type` tinyint(1) unsigned DEFAULT NULL COMMENT 'тип модели',
  `date_start` int(10) unsigned DEFAULT NULL COMMENT 'начало создания',
  `date_finish` int(10) unsigned DEFAULT NULL COMMENT 'завершение создания',
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT '0 не соотв стандартам, 1-принят',
  `descr_err` varchar(1024) DEFAULT NULL COMMENT 'описание отклонения диагностич. модели',
  `filename` varchar(32) DEFAULT NULL COMMENT 'файл диагностической модели'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='элероны и ретенционные каппы';

-- --------------------------------------------------------

--
-- Table structure for table `orto_objects`
--

CREATE TABLE IF NOT EXISTS `orto_objects` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `order_id` int(10) unsigned DEFAULT NULL COMMENT 'номер заказа',
  `doctor_id` int(10) unsigned DEFAULT NULL COMMENT 'id врача',
  `type` tinyint(1) unsigned DEFAULT NULL COMMENT '0-каппа 1-элайнер',
  `price` float(10,2) unsigned DEFAULT NULL COMMENT 'стоимость',
  `counts` int(10) unsigned DEFAULT NULL COMMENT 'начало создания',
  `ready` int(10) unsigned DEFAULT NULL COMMENT 'кол-во изготовлено',
  `sending` int(10) unsigned DEFAULT NULL COMMENT 'кол-во отправлено',
  `date_start` int(10) unsigned DEFAULT NULL COMMENT 'начало создания',
  `date_finish` int(10) unsigned DEFAULT NULL COMMENT 'завершение создания',
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT '0 не соотв стандартам, 1-принят',
  `descr` varchar(1024) DEFAULT NULL COMMENT 'описание диагностической модели',
  `filename` varchar(32) DEFAULT NULL COMMENT 'файл диагностической модели'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='элероны и ретенционные каппы';

-- --------------------------------------------------------

--
-- Table structure for table `orto_options`
--

CREATE TABLE IF NOT EXISTS `orto_options` (
  `id` int(10) unsigned NOT NULL,
  `model_price` float(10,3) unsigned DEFAULT NULL,
  `elayner_price` float(10,3) unsigned DEFAULT NULL,
  `attachment_price` float(10,3) unsigned DEFAULT NULL,
  `checkpoint_price` float(10,3) unsigned DEFAULT NULL,
  `reteiner_price` float(10,3) unsigned DEFAULT NULL,
  `days_payd` int(10) unsigned DEFAULT '10',
  `chat_time` int(3) unsigned DEFAULT '15'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='общие параметры, изменяемые админом, такие как: цена, даты окончания и тд';

--
-- Dumping data for table `orto_options`
--

INSERT INTO `orto_options` (`id`, `model_price`, `elayner_price`, `attachment_price`, `checkpoint_price`, `reteiner_price`, `days_payd`, `chat_time`) VALUES
(1, 1200.000, 800.000, 620.000, 320.000, 350.000, 10, 15);

-- --------------------------------------------------------

--
-- Table structure for table `orto_orders`
--

CREATE TABLE IF NOT EXISTS `orto_orders` (
  `id` int(10) unsigned NOT NULL,
  `date` date DEFAULT NULL COMMENT 'дата заказа',
  `num` int(10) unsigned DEFAULT '0' COMMENT 'Номер заказа',
  `group_id` int(10) unsigned DEFAULT '0' COMMENT 'группа для нескольких частично оплоченных заказов',
  `doctor_id` int(10) unsigned DEFAULT '0' COMMENT 'врач заказчик',
  `clinics_id` int(10) unsigned DEFAULT '0' COMMENT 'текущая клиника заказчик ',
  `pacient_code` int(10) unsigned DEFAULT '0' COMMENT 'код пациента',
  `date_paid` int(10) unsigned DEFAULT '0' COMMENT 'дата оплаты полностью',
  `type_paid` tinyint(1) unsigned DEFAULT '0' COMMENT 'тип заказа 0- 100% 1- предоплата 2 этапа, 2- 3 этапа предоплата ',
  `status_paid` tinyint(1) unsigned DEFAULT '0' COMMENT '0-1 предоплата уст-ся бухгалтером',
  `status_object` tinyint(1) unsigned DEFAULT '0' COMMENT 'статус заказа 0-бесплатно 1-рассрочка 2-Полная оплата',
  `order_status` tinyint(1) unsigned DEFAULT '0' COMMENT '0- не отправлен 1 заказ отправлен',
  `admin_check` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0-1 утвержден админом',
  `status_agreement` tinyint(1) unsigned DEFAULT '0' COMMENT 'состояние договора 0 не подписан 1-подписан',
  `status` tinyint(1) unsigned DEFAULT '0' COMMENT '? состояние заказа 1-подтвержден  0-нет админом директором',
  `scull_type` tinyint(1) unsigned DEFAULT '0' COMMENT 'челюсть 0 - нижняя 1- верхняя 2-обе',
  `type` tinyint(1) unsigned DEFAULT '0' COMMENT 'тип объекта 0-каппа 1-элерон',
  `price` float(10,3) unsigned DEFAULT '0.000' COMMENT 'цена',
  `discount` float(10,3) unsigned DEFAULT '0.000' COMMENT 'скидка',
  `sum_paid` float(10,3) unsigned DEFAULT '0.000' COMMENT 'сумма к оплате',
  `count_models` int(10) unsigned DEFAULT '0' COMMENT 'кол-во объектов для заказа',
  `count_elayners` int(10) unsigned DEFAULT '0' COMMENT 'кол-во объектов для заказа',
  `count_attachment` int(10) unsigned DEFAULT '0' COMMENT 'кол-во объектов для заказа',
  `count_checkpoint` int(10) unsigned DEFAULT '0' COMMENT 'кол-во объектов для заказа',
  `count_reteiners` int(10) unsigned DEFAULT '0' COMMENT 'кол-во объектов для заказа',
  `count_models_vp` int(10) unsigned DEFAULT '0' COMMENT 'кол-во вп объектов для заказа',
  `count_elayners_vp` int(10) unsigned DEFAULT '0' COMMENT 'кол-во вп объектов для заказа',
  `count_attachment_vp` int(10) unsigned DEFAULT '0' COMMENT 'кол-во вп объектов для заказа',
  `count_checkpoint_vp` int(10) unsigned DEFAULT '0' COMMENT 'кол-во вп объектов для заказа',
  `count_reteiners_vp` int(10) unsigned DEFAULT '0' COMMENT 'кол-во вп объектов для заказа',
  `count_models_vc` int(10) unsigned DEFAULT '0' COMMENT 'кол-во вп объектов для заказа верхняя челюсть',
  `count_elayners_vc` int(10) unsigned DEFAULT '0' COMMENT 'кол-во вп объектов для заказа',
  `count_attachment_vc` int(10) unsigned DEFAULT '0' COMMENT 'кол-во вп объектов для заказа',
  `count_checkpoint_vc` int(10) unsigned DEFAULT '0' COMMENT 'кол-во вп объектов для заказа',
  `count_reteiners_vc` int(10) unsigned DEFAULT '0' COMMENT 'кол-во вп объектов для заказа',
  `count_models_nc` int(10) unsigned DEFAULT '0' COMMENT 'кол-во вп объектов для заказа нижняя челюсть',
  `count_elayners_nc` int(10) unsigned DEFAULT '0' COMMENT 'кол-во вп объектов для заказа',
  `count_attachment_nc` int(10) unsigned DEFAULT '0' COMMENT 'кол-во вп объектов для заказа',
  `count_checkpoint_nc` int(10) unsigned DEFAULT '0' COMMENT 'кол-во вп объектов для заказа',
  `count_reteiners_nc` int(10) unsigned DEFAULT '0' COMMENT 'кол-во вп объектов для заказа',
  `level_1_doctor_id` int(10) unsigned DEFAULT '0' COMMENT 'врач для level1 - оценка качества',
  `level_2_doctor_id` int(10) unsigned DEFAULT '0' COMMENT 'врач для level2 - сканирование',
  `level_3_doctor_id` int(10) unsigned DEFAULT '0' COMMENT 'врач для level3 - моделирование',
  `level_4_doctor_id` int(10) DEFAULT '0' COMMENT 'врач для level4 - изготовление элайнеров',
  `level_5_doctor_id` int(10) unsigned DEFAULT '0' COMMENT 'врач для level5 - отправка готовых изделий',
  `level_1_status` tinyint(1) DEFAULT '0' COMMENT 'статус уровня 1,  0-возврат 1-ок',
  `level_2_status` tinyint(1) DEFAULT '0' COMMENT 'статус уровня 2,  0-возврат 1-ок',
  `level_3_status` tinyint(1) DEFAULT '0' COMMENT 'статус уровня 3,  0-возврат 1-ок',
  `level_4_status` tinyint(1) DEFAULT '0' COMMENT 'статус уровня 4,  0-возврат 1-ок',
  `level_5_status` tinyint(1) DEFAULT '0' COMMENT 'статус уровня 5,  0-возврат 1-ок',
  `level_1_result` text COMMENT 'описание 1',
  `level_2_result` text COMMENT 'описание 2',
  `level_3_result` text COMMENT 'описание 3',
  `level_4_result` text COMMENT 'описание 4',
  `level_5_result` text COMMENT 'описание 5',
  `comments` text NOT NULL COMMENT 'комментарий к заказу',
  `files` varchar(1024) DEFAULT NULL COMMENT 'список загружаемых файлов'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orto_orders`
--

INSERT INTO `orto_orders` (`id`, `date`, `num`, `group_id`, `doctor_id`, `clinics_id`, `pacient_code`, `date_paid`, `type_paid`, `status_paid`, `status_object`, `order_status`, `admin_check`, `status_agreement`, `status`, `scull_type`, `type`, `price`, `discount`, `sum_paid`, `count_models`, `count_elayners`, `count_attachment`, `count_checkpoint`, `count_reteiners`, `count_models_vp`, `count_elayners_vp`, `count_attachment_vp`, `count_checkpoint_vp`, `count_reteiners_vp`, `count_models_vc`, `count_elayners_vc`, `count_attachment_vc`, `count_checkpoint_vc`, `count_reteiners_vc`, `count_models_nc`, `count_elayners_nc`, `count_attachment_nc`, `count_checkpoint_nc`, `count_reteiners_nc`, `level_1_doctor_id`, `level_2_doctor_id`, `level_3_doctor_id`, `level_4_doctor_id`, `level_5_doctor_id`, `level_1_status`, `level_2_status`, `level_3_status`, `level_4_status`, `level_5_status`, `level_1_result`, `level_2_result`, `level_3_result`, `level_4_result`, `level_5_result`, `comments`, `files`) VALUES
(1, '0000-00-00', 234, 0, 2, 1, 0, 0, 3, 2, 1, 0, 0, 0, 1, 0, 1, 1.000, 0.000, 1.000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erer', '[{"name":"data.xlsx","size":51740,"type":"application\\/vnd.openxmlformats-officedocument.spreadsheetml.sheet"},{"name":"northwindEF.db","size":830464,"type":"application\\/octet-stream"},{"name":"pers.png","size":2176,"type":"image\\/png"},{"name":"test.db","size":8192,"type":"application\\/octet-stream"}]'),
(2, NULL, 2, 0, NULL, 0, 0, 0, 0, 1, 2, 0, 0, 0, 0, 0, 1, 0.000, 0.000, 23.000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0'),
(3, NULL, 123, NULL, 12, 2, 1, 0, 0, 0, 255, 0, 0, 0, 1, 0, 22, 55555.000, 555.000, 54165.000, 2, 2, 54, 2, 787, 4, 4, 3, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 14, 8, 2, 12, 0, 0, 0, 0, 0, NULL, NULL, NULL, '', NULL, 'wergg345345llll', ''),
(4, NULL, 1, 0, 12, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 2, 2, 2, 23, 1, 6, 10, 12, 8, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'sss', '[{"name":"pers.png","size":2176,"type":"image\\/png"},{"name":"test.db","size":8192,"type":"application\\/octet-stream"}]'),
(5, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', NULL),
(6, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', NULL),
(7, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orto_pacients`
--

CREATE TABLE IF NOT EXISTS `orto_pacients` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `doctor_id` int(10) unsigned DEFAULT NULL COMMENT 'врач лечащий',
  `order_id` int(10) unsigned DEFAULT NULL COMMENT '№ заказа',
  `vp_id` int(10) unsigned DEFAULT NULL COMMENT 'ВП',
  `code` int(10) unsigned DEFAULT NULL COMMENT 'код пациента',
  `age` int(10) unsigned DEFAULT NULL COMMENT 'дата рождения',
  `date` int(10) unsigned DEFAULT NULL COMMENT 'дата добавления',
  `gender` tinyint(1) unsigned DEFAULT NULL COMMENT 'пол 0-женский 1-мужской',
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT 'статус пациента',
  `alert_date` int(10) unsigned DEFAULT NULL COMMENT 'дата вызова',
  `alert_msg` varchar(256) DEFAULT NULL COMMENT 'сообщение вызова',
  `firstname` varchar(32) DEFAULT NULL COMMENT 'имя',
  `lastname` varchar(32) DEFAULT NULL COMMENT 'фамилия',
  `thirdname` varchar(32) DEFAULT NULL COMMENT 'отчество',
  `type_paid` tinyint(1) unsigned DEFAULT NULL COMMENT 'способ оплаты',
  `var_paid` tinyint(1) unsigned DEFAULT NULL COMMENT 'варианты оплаты',
  `phone` varchar(128) DEFAULT NULL COMMENT 'телефон',
  `diagnosis` varchar(1024) DEFAULT NULL COMMENT 'диагноз',
  `result` varchar(1024) DEFAULT NULL COMMENT 'желаемый результат',
  `files` varchar(16) DEFAULT NULL COMMENT 'файлы'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orto_pacients`
--

INSERT INTO `orto_pacients` (`id`, `doctor_id`, `order_id`, `vp_id`, `code`, `age`, `date`, `gender`, `status`, `alert_date`, `alert_msg`, `firstname`, `lastname`, `thirdname`, `type_paid`, `var_paid`, `phone`, `diagnosis`, `result`, `files`) VALUES
(1, 12, 1, 1, 1, 1, 1, 1, 1, 1, 'aaa', 'test', 'test', 'test', 0, 1, '11122233', '1111', '222', ''),
(2, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'ertert', 'errt', 'ertert', 1, 1, '23434', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orto_plans`
--

CREATE TABLE IF NOT EXISTS `orto_plans` (
  `id` int(10) unsigned NOT NULL,
  `version` varchar(16) DEFAULT NULL COMMENT 'версия виртуального плана',
  `ready` tinyint(1) unsigned DEFAULT NULL COMMENT 'готовность',
  `ver_confirm` varchar(16) DEFAULT NULL,
  `correct` varchar(16) DEFAULT NULL,
  `approved` varchar(16) DEFAULT NULL,
  `count_models` int(10) unsigned DEFAULT '0' COMMENT 'кол-во объектов для заказа',
  `count_elayners` int(10) unsigned DEFAULT '0' COMMENT 'кол-во объектов для заказа',
  `count_attachment` int(10) unsigned DEFAULT '0' COMMENT 'кол-во объектов для заказа',
  `count_checkpoint` int(10) unsigned DEFAULT '0' COMMENT 'кол-во объектов для заказа',
  `count_reteiners` int(10) unsigned DEFAULT '0' COMMENT 'кол-во объектов для заказа',
  `count_models_vp` int(10) unsigned DEFAULT '0' COMMENT 'кол-во вп объектов для заказа',
  `count_elayners_vp` int(10) unsigned DEFAULT '0' COMMENT 'кол-во вп объектов для заказа',
  `count_attachment_vp` int(10) unsigned DEFAULT '0' COMMENT 'кол-во вп объектов для заказа',
  `count_checkpoint_vp` int(10) unsigned DEFAULT '0' COMMENT 'кол-во вп объектов для заказа',
  `count_reteiners_vp` int(10) unsigned DEFAULT '0' COMMENT 'кол-во вп объектов для заказа',
  `doctor_id` int(10) unsigned DEFAULT '0' COMMENT 'врач для ВП',
  `pacient_id` int(10) unsigned DEFAULT '0' COMMENT 'пациент для ВП',
  `order_id` int(10) unsigned DEFAULT '0' COMMENT 'заказ для ВП',
  `level_1_doctor_id` int(10) unsigned DEFAULT '0' COMMENT 'врач для level1 - оценка качества',
  `level_2_doctor_id` int(10) unsigned DEFAULT '0' COMMENT 'врач для level2 - сканирование',
  `level_3_doctor_id` int(10) unsigned DEFAULT '0' COMMENT 'врач для level3 - моделирование',
  `level_4_doctor_id` int(10) DEFAULT '0' COMMENT 'врач для level4 - изготовление элайнеров',
  `level_5_doctor_id` int(10) unsigned DEFAULT '0' COMMENT 'врач для level5 - отправка готовых изделий',
  `level_1_status` tinyint(1) DEFAULT '0' COMMENT 'статус уровня 1,  0-возврат 1-ок',
  `level_2_status` tinyint(1) DEFAULT '0' COMMENT 'статус уровня 2,  0-возврат 1-ок',
  `level_3_status` tinyint(1) DEFAULT '0' COMMENT 'статус уровня 3,  0-возврат 1-ок',
  `level_4_status` tinyint(1) DEFAULT '0' COMMENT 'статус уровня 4,  0-возврат 1-ок',
  `level_5_status` tinyint(1) DEFAULT '0' COMMENT 'статус уровня 5,  0-возврат 1-ок',
  `level_1_result` text COMMENT 'список загружаемых файлов',
  `level_2_result` text COMMENT 'список загружаемых файлов',
  `level_3_result` text COMMENT 'список загружаемых файлов',
  `level_4_result` text COMMENT 'список загружаемых файлов',
  `level_5_result` text COMMENT 'список загружаемых файлов',
  `comments` text NOT NULL COMMENT 'комментарий к заказу',
  `files` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orto_user`
--

CREATE TABLE IF NOT EXISTS `orto_user` (
  `id` int(11) unsigned NOT NULL COMMENT 'id = doctor_id',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_confirm_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `role` int(11) unsigned NOT NULL COMMENT 'тип пользователя  0- техник, 1-врач, 2-мед.директор, 3-бухгалтер, 4-админ'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orto_user`
--

INSERT INTO `orto_user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email_confirm_token`, `email`, `status`, `created_at`, `updated_at`, `role`) VALUES
(2, 'admin', 'Hde0iz3y2qxRj4C7JWYZvuRhCVTPDhFK', '$2y$13$MO/Y0DPWQUCSVwEoRxbZseJ9v7Za8Ol9Il.hXmzXEttlXRJ8xWE8S', NULL, NULL, 'admin@mail.ru', 1, 1466677688, 1469593884, 4),
(4, 'dir', 'Hde0iz3y2qxRj4C7JWYZvuRhCVTPDhFK', '$2y$13$MO/Y0DPWQUCSVwEoRxbZseJ9v7Za8Ol9Il.hXmzXEttlXRJ8xWE8S', NULL, NULL, 'grigoriev.ua@gmail.com', 1, 1466677688, 1466686652, 2),
(8, 'tehnik1', 'WiG7c8wyUBfymUTY2SHZwAM0dchFrvZd', '$2y$13$jeLAZs.FUwsQcV7Zz2AC8.fnBNKF3OIPEyaC/cJehyBlrcFMftD0q', NULL, NULL, '', 1, 1469785032, 1469785032, 0),
(12, 'vrach', 'MWAY1C1LHykHEz55975CI91EeU4h8SyP', '$2y$13$/D3Rod5vb81LrcMiBzzTjO25WR9R88PWORUtrvaDNJPgsEP7j76o6', NULL, NULL, '', 1, 1469785507, 1470398388, 1),
(13, 'buh', 'Hde0iz3y2qxRj4C7JWYZvuRhCVTPDhFK', '$2y$13$MO/Y0DPWQUCSVwEoRxbZseJ9v7Za8Ol9Il.hXmzXEttlXRJ8xWE8S', NULL, NULL, '', 1, 1469786674, 1469786674, 3),
(14, 'vrach3', 'cTCZO48l6SWGjnkR7PK9aDmk8Ov1ex59', '$2y$13$PxkPzhBGu6DhiY5i5T3YueBY/cpTn6AYIN1orHB3DPk78b11BvXfW', NULL, NULL, 'test@test.com', 1, 1470122759, 1470122759, 1),
(15, 'vrach4', 'Z-y6HhsQ0tddxAe4tg1C_3dMjvd80uKM', '$2y$13$Xzb924b5GEhTmRYN2gl7/uDUJ/TLlnICQopJeKVcPR27.yQ/hunr.', NULL, NULL, 'test2@test.com', 1, 1470122855, 1470122855, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orto_user_info`
--

CREATE TABLE IF NOT EXISTS `orto_user_info` (
  `id` int(11) unsigned NOT NULL,
  `active` set('1','0') NOT NULL DEFAULT '1',
  `user_type` tinyint(1) unsigned NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `second_name` varchar(255) DEFAULT NULL,
  `country` varchar(128) DEFAULT NULL,
  `city` varchar(128) NOT NULL,
  `contactPerson` varchar(255) DEFAULT NULL,
  `contactEmail` varchar(255) DEFAULT NULL,
  `phone` varchar(24) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orto_user_info`
--

INSERT INTO `orto_user_info` (`id`, `active`, `user_type`, `first_name`, `second_name`, `country`, `city`, `contactPerson`, `contactEmail`, `phone`, `description`) VALUES
(4, '1', 1, 'Valentin', 'Valentin', NULL, '', '', '', NULL, ''),
(55, '0', 2, 'fashion', 'fashion', 'Узбекистан', 'test', '', '', '', ''),
(57, '0', 1, 'admins', 'admins', NULL, '', '', '', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orto_alerts`
--
ALTER TABLE `orto_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orto_banners`
--
ALTER TABLE `orto_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orto_chat`
--
ALTER TABLE `orto_chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usr` (`user_id`,`sender_id`,`id`) USING BTREE;

--
-- Indexes for table `orto_clinics`
--
ALTER TABLE `orto_clinics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orto_clinic_doctor`
--
ALTER TABLE `orto_clinic_doctor`
  ADD PRIMARY KEY (`doctor_id`,`clinic_id`);

--
-- Indexes for table `orto_comments`
--
ALTER TABLE `orto_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orto_doctors`
--
ALTER TABLE `orto_doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orto_materials`
--
ALTER TABLE `orto_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orto_objects`
--
ALTER TABLE `orto_objects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orto_options`
--
ALTER TABLE `orto_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orto_orders`
--
ALTER TABLE `orto_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orto_pacients`
--
ALTER TABLE `orto_pacients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orto_plans`
--
ALTER TABLE `orto_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orto_user`
--
ALTER TABLE `orto_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD UNIQUE KEY `email_confirm_token` (`email_confirm_token`);

--
-- Indexes for table `orto_user_info`
--
ALTER TABLE `orto_user_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `first_name` (`first_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orto_alerts`
--
ALTER TABLE `orto_alerts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orto_banners`
--
ALTER TABLE `orto_banners`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orto_chat`
--
ALTER TABLE `orto_chat`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT for table `orto_clinics`
--
ALTER TABLE `orto_clinics`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orto_comments`
--
ALTER TABLE `orto_comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orto_options`
--
ALTER TABLE `orto_options`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orto_orders`
--
ALTER TABLE `orto_orders`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orto_plans`
--
ALTER TABLE `orto_plans`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orto_user`
--
ALTER TABLE `orto_user`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id = doctor_id',AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
