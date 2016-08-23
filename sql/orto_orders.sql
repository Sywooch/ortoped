-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.30-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2016-08-08 09:47:57
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for ortoped
CREATE DATABASE IF NOT EXISTS `ortoped` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ortoped`;


-- Dumping structure for table ortoped.orto_orders
DROP TABLE IF EXISTS `orto_orders`;
CREATE TABLE IF NOT EXISTS `orto_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `files` varchar(1024) DEFAULT NULL COMMENT 'список загружаемых файлов',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table ortoped.orto_orders: ~7 rows (approximately)
/*!40000 ALTER TABLE `orto_orders` DISABLE KEYS */;
REPLACE INTO `orto_orders` (`id`, `date`, `num`, `group_id`, `doctor_id`, `clinics_id`, `pacient_code`, `date_paid`, `type_paid`, `status_paid`, `status_object`, `order_status`, `admin_check`, `status_agreement`, `status`, `scull_type`, `type`, `price`, `discount`, `sum_paid`, `count_models`, `count_elayners`, `count_attachment`, `count_checkpoint`, `count_reteiners`, `count_models_vp`, `count_elayners_vp`, `count_attachment_vp`, `count_checkpoint_vp`, `count_reteiners_vp`, `count_models_vc`, `count_elayners_vc`, `count_attachment_vc`, `count_checkpoint_vc`, `count_reteiners_vc`, `count_models_nc`, `count_elayners_nc`, `count_attachment_nc`, `count_checkpoint_nc`, `count_reteiners_nc`, `level_1_doctor_id`, `level_2_doctor_id`, `level_3_doctor_id`, `level_4_doctor_id`, `level_5_doctor_id`, `level_1_status`, `level_2_status`, `level_3_status`, `level_4_status`, `level_5_status`, `level_1_result`, `level_2_result`, `level_3_result`, `level_4_result`, `level_5_result`, `comments`, `files`) VALUES
	(1, '0000-00-00', 234, 0, 2, 1, 0, 0, 3, 2, 1, 0, 0, 0, 1, 0, 1, 1.000, 0.000, 1.000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erer', '[{"name":"data.xlsx","size":51740,"type":"application\\/vnd.openxmlformats-officedocument.spreadsheetml.sheet"},{"name":"northwindEF.db","size":830464,"type":"application\\/octet-stream"},{"name":"pers.png","size":2176,"type":"image\\/png"},{"name":"test.db","size":8192,"type":"application\\/octet-stream"}]'),
	(2, NULL, 2, 0, NULL, 0, 0, 0, 0, 1, 2, 0, 0, 0, 0, 0, 1, 0.000, 0.000, 23.000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0'),
	(3, NULL, 123, NULL, 12, 2, 1, 0, 0, 0, 255, 0, 0, 0, 1, 0, 22, 55555.000, 555.000, 54165.000, 2, 2, 54, 2, 787, 4, 4, 3, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 14, 8, 2, 12, 0, 0, 0, 0, 0, NULL, NULL, NULL, '', NULL, 'wergg345345llll', ''),
	(4, NULL, 1, 0, 12, 1, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 2, 2, 2, 23, 1, 6, 10, 12, 8, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'sss', '[{"name":"pers.png","size":2176,"type":"image\\/png"},{"name":"test.db","size":8192,"type":"application\\/octet-stream"}]'),
	(5, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', NULL),
	(6, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', NULL),
	(7, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.000, 0.000, 0.000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', NULL);
/*!40000 ALTER TABLE `orto_orders` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
