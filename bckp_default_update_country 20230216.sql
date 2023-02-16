-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.51-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema rss_segurvid
--

CREATE DATABASE IF NOT EXISTS rss_segurvid;
USE rss_segurvid;

--
-- Temporary table structure for view `view_contract`
--
DROP TABLE IF EXISTS `view_contract`;
DROP VIEW IF EXISTS `view_contract`;
CREATE TABLE `view_contract` (
  `usid` bigint(20) unsigned,
  `name` varchar(191),
  `code_company` varchar(11),
  `user_company` varchar(191),
  `city_company` varchar(191),
  `address_company` varchar(191),
  `cuid` bigint(20) unsigned,
  `code_customer` varchar(8),
  `name_customer` varchar(191),
  `country_customer` varchar(24),
  `city_customer` varchar(191),
  `address_customer` varchar(191),
  `mobile_customer` varchar(17),
  `phone_customer` varchar(17),
  `email_customer` varchar(191),
  `odid` bigint(20) unsigned,
  `code_order` char(11),
  `date_order` date,
  `type_payment` tinyint(1),
  `cost_order` double,
  `description_order` text,
  `monthname` varchar(9),
  `date_accident` date,
  `time_accident` time,
  `location_accident` text,
  `code_partner` varchar(8),
  `name_partner` varchar(191),
  `phone_partner` varchar(17),
  `file_order` text,
  `status_order` char(1),
  `user_id` varchar(24),
  `typeaccident_id` tinyint(4),
  `kin_id` varchar(24),
  `company_id` bigint(20) unsigned,
  `insurance_id` bigint(20) unsigned,
  `customer_id` bigint(20) unsigned,
  `service_id` bigint(20) unsigned,
  `coid` bigint(20) unsigned,
  `name_company` varchar(191),
  `irid` bigint(20) unsigned,
  `name_insurance` varchar(191),
  `seid` bigint(20) unsigned,
  `name_service` varchar(191),
  `taid` bigint(20) unsigned,
  `type_accident` varchar(191)
);

--
-- Temporary table structure for view `view_invoice`
--
DROP TABLE IF EXISTS `view_invoice`;
DROP VIEW IF EXISTS `view_invoice`;
CREATE TABLE `view_invoice` (
  `usid` bigint(20) unsigned,
  `name` varchar(191),
  `profile_photo_path` varchar(2048),
  `cuid` bigint(20) unsigned,
  `code_customer` varchar(8),
  `name_customer` varchar(191),
  `country_customer` varchar(24),
  `city_customer` varchar(191),
  `mobile_customer` varchar(17),
  `odid` bigint(20) unsigned,
  `code_order` char(11),
  `date_order` date,
  `cost_order` double,
  `ivid` bigint(20) unsigned,
  `code_invoice` char(11),
  `month` int(2),
  `year` int(4),
  `date_invoice` date,
  `subtotal_invoice` double(9,2),
  `discount_invoice` double(9,2),
  `tax_invoice` double(9,2),
  `total_invoice` double(9,2),
  `deposit_invoice` double(9,2),
  `coid` bigint(20) unsigned,
  `name_company` varchar(191),
  `seid` bigint(20) unsigned,
  `code_service` varchar(20),
  `name_service` varchar(191),
  `icid` bigint(20) unsigned,
  `name_insurance` varchar(191),
  `paid` bigint(20) unsigned,
  `name_payment` varchar(191)
);

--
-- Temporary table structure for view `view_order`
--
DROP TABLE IF EXISTS `view_order`;
DROP VIEW IF EXISTS `view_order`;
CREATE TABLE `view_order` (
  `cuid` bigint(20) unsigned,
  `code_customer` varchar(8),
  `name_customer` varchar(191),
  `country_customer` varchar(24),
  `city_customer` varchar(191),
  `address_customer` varchar(191),
  `mobile_customer` varchar(17),
  `phone_customer` varchar(17),
  `email_customer` varchar(191),
  `odid` bigint(20) unsigned,
  `code_order` char(11),
  `date_order` date,
  `type_payment` tinyint(1),
  `cost_order` double,
  `description_order` text,
  `date_accident` date,
  `location_accident` text,
  `code_partner` varchar(8),
  `name_partner` varchar(191),
  `phone_partner` varchar(17),
  `file_order` text,
  `status_order` char(1),
  `user_id` varchar(24),
  `typeaccident_id` tinyint(4),
  `kin_id` varchar(24),
  `company_id` bigint(20) unsigned,
  `insurance_id` bigint(20) unsigned,
  `customer_id` bigint(20) unsigned,
  `service_id` bigint(20) unsigned,
  `coid` bigint(20) unsigned,
  `name_company` varchar(191),
  `irid` bigint(20) unsigned,
  `name_insurance` varchar(191),
  `seid` bigint(20) unsigned,
  `name_service` varchar(191)
);

--
-- Definition of table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`,`name_category`,`created_at`,`updated_at`) VALUES 
 (1,'SOAT',NULL,NULL),
 (2,'FONDO DE COMPENSACIÓN',NULL,NULL),
 (3,'FONDO DE PENSIÓN',NULL,NULL),
 (4,'SEGURO DE VIDA LEY',NULL,NULL),
 (5,'ASESORÍA',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


--
-- Definition of table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code_company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_company` tinyint(1) NOT NULL,
  `phone_company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` (`id`,`code_company`,`name_company`,`status_company`,`phone_company`,`address_company`,`website_company`,`created_at`,`updated_at`) VALUES 
 (1,'12345678900','CLÍNICA CAYETANO',1,NULL,NULL,NULL,NULL,NULL),
 (2,'12345678900','CLÍNICA CHENET',1,NULL,NULL,NULL,NULL,NULL),
 (3,'12345678900','CLÍNICA ORTEGA',1,NULL,NULL,NULL,NULL,NULL),
 (4,'12345678900','CLÍNICA HUANCAYO',1,NULL,NULL,NULL,NULL,NULL),
 (5,'12345678900','CLÍNICA MIRANDA',1,NULL,NULL,NULL,NULL,NULL),
 (6,'12345678900','CLÍNICA SANTO DOMINGO',1,NULL,NULL,NULL,NULL,NULL),
 (7,'12345678900','HOSPITAL CARRIÓN',1,NULL,NULL,NULL,NULL,NULL),
 (8,'12345678900','HOSPITAL DEL CARMEN',1,NULL,NULL,NULL,NULL,NULL),
 (9,'12345678900','HOSPITAL DOMINGO OLAVEGOYA',1,NULL,NULL,NULL,NULL,NULL),
 (10,'12345678900','MORGUE DE HUANCAYO',1,NULL,NULL,NULL,NULL,NULL),
 (11,'12345678900','MORGUE DE JAUJA',1,NULL,NULL,NULL,NULL,NULL),
 (12,'12345678900','MORGUE DE TARMA',1,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;


--
-- Definition of table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_contact` varchar(117) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_file` text COLLATE utf8mb4_unicode_ci,
  `file_contact` text COLLATE utf8mb4_unicode_ci,
  `company_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contacts_company_id_foreign` (`company_id`),
  CONSTRAINT `contacts_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;


--
-- Definition of table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_code` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `three_code` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_country` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` (`id`,`name_country`,`nationality`,`iso_number`,`two_code`,`three_code`,`icon_country`,`created_at`,`updated_at`) VALUES 
 (1,'AFGHANISTAN','AFGHAN','93','AF','AFG','<img src=“https://flagcdn.com/16x12/af.png” srcset=“https://flagcdn.com/32x24/af.png 2x https://flagcdn.com/48x36/af.png 3x” width=“16” height=“12” alt=“Afghanistan”>',NULL,NULL),
 (2,'ALBANIA','ALBANIAN','355','AL','ALB','<img src=“https://flagcdn.com/16x12/al.png” srcset=“https://flagcdn.com/32x24/al.png 2x https://flagcdn.com/48x36/al.png 3x” width=“16” height=“12” alt=“Albania”>',NULL,NULL),
 (3,'ALGERIA','ALGERIAN','213','DZ','DZA','<img src=“https://flagcdn.com/16x12/dz.png” srcset=“https://flagcdn.com/32x24/dz.png 2x https://flagcdn.com/48x36/dz.png 3x” width=“16” height=“12” alt=“Algeria”>',NULL,NULL),
 (4,'AMERICAN SAMOA','AMERICAN SAMOAN','1-684','AS','ASM','<img src=“https://flagcdn.com/16x12/as.png” srcset=“https://flagcdn.com/32x24/as.png 2x https://flagcdn.com/48x36/as.png 3x” width=“16” height=“12” alt=“American_Samoa”>',NULL,NULL),
 (5,'ANDORRA','ANDORRAN','376','AD','AND','<img src=“https://flagcdn.com/16x12/ad.png” srcset=“https://flagcdn.com/32x24/ad.png 2x https://flagcdn.com/48x36/ad.png 3x” width=“16” height=“12” alt=“Andorra”>',NULL,NULL),
 (6,'ANGOLA','ANGOLAN','244','AO','AGO','<img src=“https://flagcdn.com/16x12/ao.png” srcset=“https://flagcdn.com/32x24/ao.png 2x https://flagcdn.com/48x36/ao.png 3x” width=“16” height=“12” alt=“Angola”>',NULL,NULL),
 (7,'ANGUILLA','ANGUILLAN','1-264','AI','AIA','<img src=“https://flagcdn.com/16x12/ai.png” srcset=“https://flagcdn.com/32x24/ai.png 2x https://flagcdn.com/48x36/ai.png 3x” width=“16” height=“12” alt=“Anguilla”>',NULL,NULL),
 (8,'ANTIGUA AND BARBUDA','ANTIGUAN','1-268','AG','ATG','<img src=“https://flagcdn.com/16x12/ag.png” srcset=“https://flagcdn.com/32x24/ag.png 2x https://flagcdn.com/48x36/ag.png 3x” width=“16” height=“12” alt=“Antigua_and_Barbuda”>',NULL,NULL),
 (9,'ARGENTINA','ARGENTINIAN','54','AR','ARG','<img src=“https://flagcdn.com/16x12/ar.png” srcset=“https://flagcdn.com/32x24/ar.png 2x https://flagcdn.com/48x36/ar.png 3x” width=“16” height=“12” alt=“Argentina”>',NULL,NULL),
 (10,'ARMENIA','ARMENIAN','374','AM','ARM','<img src=“https://flagcdn.com/16x12/am.png” srcset=“https://flagcdn.com/32x24/am.png 2x https://flagcdn.com/48x36/am.png 3x” width=“16” height=“12” alt=“Armenia”>',NULL,NULL),
 (11,'ARUBA','ARUBAN','297','AW','ABW','<img src=“https://flagcdn.com/16x12/aw.png” srcset=“https://flagcdn.com/32x24/aw.png 2x https://flagcdn.com/48x36/aw.png 3x” width=“16” height=“12” alt=“Aruba”>',NULL,NULL),
 (12,'AUSTRALIA','AUSTRALIAN','61','AU','AUS','<img src=“https://flagcdn.com/16x12/au.png” srcset=“https://flagcdn.com/32x24/au.png 2x https://flagcdn.com/48x36/au.png 3x” width=“16” height=“12” alt=“Australia”>',NULL,NULL),
 (13,'AUSTRIA','AUSTRIAN','43','AT','AUT','<img src=“https://flagcdn.com/16x12/at.png” srcset=“https://flagcdn.com/32x24/at.png 2x https://flagcdn.com/48x36/at.png 3x” width=“16” height=“12” alt=“Austria”>',NULL,NULL),
 (14,'AZERBAIJAN','AZERBAIJANI','994','AZ','AZE','<img src=“https://flagcdn.com/16x12/az.png” srcset=“https://flagcdn.com/32x24/az.png 2x https://flagcdn.com/48x36/az.png 3x” width=“16” height=“12” alt=“Azerbaijan”>',NULL,NULL),
 (15,'BAHAMAS','BAHAMIAN','1-242','BS','BHS','<img src=“https://flagcdn.com/16x12/bs.png” srcset=“https://flagcdn.com/32x24/bs.png 2x https://flagcdn.com/48x36/bs.png 3x” width=“16” height=“12” alt=“Bahamas”>',NULL,NULL),
 (16,'BAHRAIN','BAHRAINI','973','BH','BHR','<img src=“https://flagcdn.com/16x12/bh.png” srcset=“https://flagcdn.com/32x24/bh.png 2x https://flagcdn.com/48x36/bh.png 3x” width=“16” height=“12” alt=“Bahrain”>',NULL,NULL),
 (17,'BANGLADESH','BANGLADESHI','880','BD','BGD','<img src=“https://flagcdn.com/16x12/bd.png” srcset=“https://flagcdn.com/32x24/bd.png 2x https://flagcdn.com/48x36/bd.png 3x” width=“16” height=“12” alt=“Bangladesh”>',NULL,NULL),
 (18,'BARBADOS','BARBADIAN','1-246','BB','BRB','<img src=“https://flagcdn.com/16x12/bb.png” srcset=“https://flagcdn.com/32x24/bb.png 2x https://flagcdn.com/48x36/bb.png 3x” width=“16” height=“12” alt=“Barbados”>',NULL,NULL),
 (19,'BELARUS','BELARUSIAN','375','BY','BLR','<img src=“https://flagcdn.com/16x12/by.png” srcset=“https://flagcdn.com/32x24/by.png 2x https://flagcdn.com/48x36/by.png 3x” width=“16” height=“12” alt=“Belarus”>',NULL,NULL),
 (20,'BELGIUM','BELGIAN','32','BE','BEL','<img src=“https://flagcdn.com/16x12/be.png” srcset=“https://flagcdn.com/32x24/be.png 2x https://flagcdn.com/48x36/be.png 3x” width=“16” height=“12” alt=“Belgium”>',NULL,NULL),
 (21,'BELIZE','BELIZEAN','501','BZ','BLZ','<img src=“https://flagcdn.com/16x12/bz.png” srcset=“https://flagcdn.com/32x24/bz.png 2x https://flagcdn.com/48x36/bz.png 3x” width=“16” height=“12” alt=“Belize”>',NULL,NULL),
 (22,'BENIN','BENINESE','229','BJ','BEN','<img src=“https://flagcdn.com/16x12/bj.png” srcset=“https://flagcdn.com/32x24/bj.png 2x https://flagcdn.com/48x36/bj.png 3x” width=“16” height=“12” alt=“Benin”>',NULL,NULL),
 (23,'BERMUDA','BERMUDAN','1-441','BM','BMU','<img src=“https://flagcdn.com/16x12/bm.png” srcset=“https://flagcdn.com/32x24/bm.png 2x https://flagcdn.com/48x36/bm.png 3x” width=“16” height=“12” alt=“Bermuda”>',NULL,NULL),
 (24,'BHUTAN','BHUTANESE','975','BT','BTN','<img src=“https://flagcdn.com/16x12/bt.png” srcset=“https://flagcdn.com/32x24/bt.png 2x https://flagcdn.com/48x36/bt.png 3x” width=“16” height=“12” alt=“Bhutan”>',NULL,NULL),
 (25,'BOLIVIA','BOLIVIAN','591','BO','BOL','<img src=“https://flagcdn.com/16x12/bo.png” srcset=“https://flagcdn.com/32x24/bo.png 2x https://flagcdn.com/48x36/bo.png 3x” width=“16” height=“12” alt=“Bolivia”>',NULL,NULL),
 (26,'BOSNIA AND HERZEGOVINA','BOSNIAN','387','BA','BIH','<img src=“https://flagcdn.com/16x12/ba.png” srcset=“https://flagcdn.com/32x24/ba.png 2x https://flagcdn.com/48x36/ba.png 3x” width=“16” height=“12” alt=“Bosnia_and_Herzegovina”>',NULL,NULL),
 (27,'BOTSWANA','BOTSWANAN','267','BW','BWA','<img src=“https://flagcdn.com/16x12/bw.png” srcset=“https://flagcdn.com/32x24/bw.png 2x https://flagcdn.com/48x36/bw.png 3x” width=“16” height=“12” alt=“Botswana”>',NULL,NULL),
 (28,'BRAZIL','BRAZILIAN','55','BR','BRA','<img src=“https://flagcdn.com/16x12/br.png” srcset=“https://flagcdn.com/32x24/br.png 2x https://flagcdn.com/48x36/br.png 3x” width=“16” height=“12” alt=“Brazil”>',NULL,NULL),
 (29,'BRUNEI','BRUNEIAN','673','BN','BRN','<img src=“https://flagcdn.com/16x12/bn.png” srcset=“https://flagcdn.com/32x24/bn.png 2x https://flagcdn.com/48x36/bn.png 3x” width=“16” height=“12” alt=“Brunei”>',NULL,NULL),
 (30,'BULGARIA','BULGARIAN','359','BG','BGR','<img src=“https://flagcdn.com/16x12/bg.png” srcset=“https://flagcdn.com/32x24/bg.png 2x https://flagcdn.com/48x36/bg.png 3x” width=“16” height=“12” alt=“Bulgaria”>',NULL,NULL),
 (31,'BURKINA FASO','BURKINABE','226','BF','BFA','<img src=“https://flagcdn.com/16x12/bf.png” srcset=“https://flagcdn.com/32x24/bf.png 2x https://flagcdn.com/48x36/bf.png 3x” width=“16” height=“12” alt=“Burkina_Faso”>',NULL,NULL),
 (32,'BURUNDI','BURUNDIAN','257','BI','BDI','<img src=“https://flagcdn.com/16x12/bi.png” srcset=“https://flagcdn.com/32x24/bi.png 2x https://flagcdn.com/48x36/bi.png 3x” width=“16” height=“12” alt=“Burundi”>',NULL,NULL),
 (33,'CAMBODIA','CAMBODIAN','855','KH','KHM','<img src=“https://flagcdn.com/16x12/kh.png” srcset=“https://flagcdn.com/32x24/kh.png 2x https://flagcdn.com/48x36/kh.png 3x” width=“16” height=“12” alt=“Cambodia”>',NULL,NULL),
 (34,'CAMEROON','CAMEROONIAN','237','CM','CMR','<img src=“https://flagcdn.com/16x12/cm.png” srcset=“https://flagcdn.com/32x24/cm.png 2x https://flagcdn.com/48x36/cm.png 3x” width=“16” height=“12” alt=“Cameroon”>',NULL,NULL),
 (35,'CANADA','CANADIAN','1','CA','CAN','<img src=“https://flagcdn.com/16x12/ca.png” srcset=“https://flagcdn.com/32x24/ca.png 2x https://flagcdn.com/48x36/ca.png 3x” width=“16” height=“12” alt=“Canada”>',NULL,NULL),
 (36,'CAPE VERDE','CABO VERDEAN','238','CV','CPV','<img src=“https://flagcdn.com/16x12/cv.png” srcset=“https://flagcdn.com/32x24/cv.png 2x https://flagcdn.com/48x36/cv.png 3x” width=“16” height=“12” alt=“Cape_Verde”>',NULL,NULL),
 (37,'CAYMAN ISLANDS','CAYMANIAN','1-345','KY','CYM','<img src=“https://flagcdn.com/16x12/ky.png” srcset=“https://flagcdn.com/32x24/ky.png 2x https://flagcdn.com/48x36/ky.png 3x” width=“16” height=“12” alt=“Cayman_Islands”>',NULL,NULL),
 (38,'CENTRAL AFRICAN REPUBLIC','BISSAU-GUINEAN','236','CF','CAF','<img src=“https://flagcdn.com/16x12/cf.png” srcset=“https://flagcdn.com/32x24/cf.png 2x https://flagcdn.com/48x36/cf.png 3x” width=“16” height=“12” alt=“Central_African_Republic”>',NULL,NULL),
 (39,'CHAD','CHADIAN','235','TD','TCD','<img src=“https://flagcdn.com/16x12/td.png” srcset=“https://flagcdn.com/32x24/td.png 2x https://flagcdn.com/48x36/td.png 3x” width=“16” height=“12” alt=“Chad”>',NULL,NULL),
 (40,'CHILE','CHILEAN','56','CL','CHL','<img src=“https://flagcdn.com/16x12/cl.png” srcset=“https://flagcdn.com/32x24/cl.png 2x https://flagcdn.com/48x36/cl.png 3x” width=“16” height=“12” alt=“Chile”>',NULL,NULL),
 (41,'CHINA','CHINESE','86','CN','CHN','<img src=“https://flagcdn.com/16x12/cn.png” srcset=“https://flagcdn.com/32x24/cn.png 2x https://flagcdn.com/48x36/cn.png 3x” width=“16” height=“12” alt=“China”>',NULL,NULL),
 (42,'COLOMBIA','COLOMBIAN','57','CO','COL','<img src=“https://flagcdn.com/16x12/co.png” srcset=“https://flagcdn.com/32x24/co.png 2x https://flagcdn.com/48x36/co.png 3x” width=“16” height=“12” alt=“Colombia”>',NULL,NULL),
 (43,'COMOROS','COMORAN','269','KM','COM','<img src=“https://flagcdn.com/16x12/km.png” srcset=“https://flagcdn.com/32x24/km.png 2x https://flagcdn.com/48x36/km.png 3x” width=“16” height=“12” alt=“Comoros”>',NULL,NULL),
 (44,'COSTA RICA','COSTA RICAN','506','CR','CRI','<img src=“https://flagcdn.com/16x12/cr.png” srcset=“https://flagcdn.com/32x24/cr.png 2x https://flagcdn.com/48x36/cr.png 3x” width=“16” height=“12” alt=“Costa_Rica”>',NULL,NULL),
 (45,'CROATIA','CROATIAN','385','HR','HRV','<img src=“https://flagcdn.com/16x12/hr.png” srcset=“https://flagcdn.com/32x24/hr.png 2x https://flagcdn.com/48x36/hr.png 3x” width=“16” height=“12” alt=“Croatia”>',NULL,NULL),
 (46,'CUBA','CUBAN','53','CU','CUB','<img src=“https://flagcdn.com/16x12/cu.png” srcset=“https://flagcdn.com/32x24/cu.png 2x https://flagcdn.com/48x36/cu.png 3x” width=“16” height=“12” alt=“Cuba”>',NULL,NULL),
 (47,'CURACAO','CURACAOAN','599','CW','CUW','<img src=“https://flagcdn.com/16x12/cw.png” srcset=“https://flagcdn.com/32x24/cw.png 2x https://flagcdn.com/48x36/cw.png 3x” width=“16” height=“12” alt=“Curacao”>',NULL,NULL),
 (48,'CYPRUS','CYPRIOT','357','CY','CYP','<img src=“https://flagcdn.com/16x12/cy.png” srcset=“https://flagcdn.com/32x24/cy.png 2x https://flagcdn.com/48x36/cy.png 3x” width=“16” height=“12” alt=“Cyprus”>',NULL,NULL),
 (49,'CZECH REPUBLIC','CZECH','420','CZ','CZE','<img src=“https://flagcdn.com/16x12/cz.png” srcset=“https://flagcdn.com/32x24/cz.png 2x https://flagcdn.com/48x36/cz.png 3x” width=“16” height=“12” alt=“Czech_Republic”>',NULL,NULL),
 (50,'DENMARK','DANISH','45','DK','DNK','<img src=“https://flagcdn.com/16x12/dk.png” srcset=“https://flagcdn.com/32x24/dk.png 2x https://flagcdn.com/48x36/dk.png 3x” width=“16” height=“12” alt=“Denmark”>',NULL,NULL),
 (51,'DJIBOUTI','DJIBOUTIAN','253','DJ','DJI','<img src=“https://flagcdn.com/16x12/dj.png” srcset=“https://flagcdn.com/32x24/dj.png 2x https://flagcdn.com/48x36/dj.png 3x” width=“16” height=“12” alt=“Djibouti”>',NULL,NULL),
 (52,'DOMINICAN REPUBLIC','DOMINICAN','1-809  1-829','DO','DOM','<img src=“https://flagcdn.com/16x12/do.png” srcset=“https://flagcdn.com/32x24/do.png 2x https://flagcdn.com/48x36/do.png 3x” width=“16” height=“12” alt=“Dominican_Republic”>',NULL,NULL),
 (53,'ECUADOR','ECUADORIAN','593','EC','ECU','<img src=“https://flagcdn.com/16x12/ec.png” srcset=“https://flagcdn.com/32x24/ec.png 2x https://flagcdn.com/48x36/ec.png 3x” width=“16” height=“12” alt=“Ecuador”>',NULL,NULL),
 (54,'EGYPT','EGYPTIAN','20','EG','EGY','<img src=“https://flagcdn.com/16x12/eg.png” srcset=“https://flagcdn.com/32x24/eg.png 2x https://flagcdn.com/48x36/eg.png 3x” width=“16” height=“12” alt=“Egypt”>',NULL,NULL),
 (55,'EL SALVADOR','SALVADORAN','503','SV','SLV','<img src=“https://flagcdn.com/16x12/sv.png” srcset=“https://flagcdn.com/32x24/sv.png 2x https://flagcdn.com/48x36/sv.png 3x” width=“16” height=“12” alt=“El_Salvador”>',NULL,NULL),
 (56,'EQUATORIAL GUINEA','EQUATOGUINEAN','240','GQ','GNQ','<img src=“https://flagcdn.com/16x12/gq.png” srcset=“https://flagcdn.com/32x24/gq.png 2x https://flagcdn.com/48x36/gq.png 3x” width=“16” height=“12” alt=“Equatorial_Guinea”>',NULL,NULL),
 (57,'ERITREA','ERITREAN','291','ER','ERI','<img src=“https://flagcdn.com/16x12/er.png” srcset=“https://flagcdn.com/32x24/er.png 2x https://flagcdn.com/48x36/er.png 3x” width=“16” height=“12” alt=“Eritrea”>',NULL,NULL),
 (58,'ESTONIA','ESTONIAN','372','EE','EST','<img src=“https://flagcdn.com/16x12/ee.png” srcset=“https://flagcdn.com/32x24/ee.png 2x https://flagcdn.com/48x36/ee.png 3x” width=“16” height=“12” alt=“Estonia”>',NULL,NULL),
 (59,'ETHIOPIA','ETHIOPIAN','251','ET','ETH','<img src=“https://flagcdn.com/16x12/et.png” srcset=“https://flagcdn.com/32x24/et.png 2x https://flagcdn.com/48x36/et.png 3x” width=“16” height=“12” alt=“Ethiopia”>',NULL,NULL),
 (60,'FIJI','FIJIAN','679','FJ','FJI','<img src=“https://flagcdn.com/16x12/fj.png” srcset=“https://flagcdn.com/32x24/fj.png 2x https://flagcdn.com/48x36/fj.png 3x” width=“16” height=“12” alt=“Fiji”>',NULL,NULL),
 (61,'FINLAND','FINNISH','358','FI','FIN','<img src=“https://flagcdn.com/16x12/fi.png” srcset=“https://flagcdn.com/32x24/fi.png 2x https://flagcdn.com/48x36/fi.png 3x” width=“16” height=“12” alt=“Finland”>',NULL,NULL),
 (62,'FRANCE','FRENCH','33','FR','FRA','<img src=“https://flagcdn.com/16x12/fr.png” srcset=“https://flagcdn.com/32x24/fr.png 2x https://flagcdn.com/48x36/fr.png 3x” width=“16” height=“12” alt=“France”>',NULL,NULL),
 (63,'GABON','GABONESE','241','GA','GAB','<img src=“https://flagcdn.com/16x12/ga.png” srcset=“https://flagcdn.com/32x24/ga.png 2x https://flagcdn.com/48x36/ga.png 3x” width=“16” height=“12” alt=“Gabon”>',NULL,NULL),
 (64,'GAMBIA','GAMBIAN','220','GM','GMB','<img src=“https://flagcdn.com/16x12/gm.png” srcset=“https://flagcdn.com/32x24/gm.png 2x https://flagcdn.com/48x36/gm.png 3x” width=“16” height=“12” alt=“Gambia”>',NULL,NULL),
 (65,'GEORGIA','GEORGIAN','995','GE','GEO','<img src=“https://flagcdn.com/16x12/ge.png” srcset=“https://flagcdn.com/32x24/ge.png 2x https://flagcdn.com/48x36/ge.png 3x” width=“16” height=“12” alt=“Georgia”>',NULL,NULL),
 (66,'GERMANY','GERMAN','49','DE','DEU','<img src=“https://flagcdn.com/16x12/de.png” srcset=“https://flagcdn.com/32x24/de.png 2x https://flagcdn.com/48x36/de.png 3x” width=“16” height=“12” alt=“Germany”>',NULL,NULL),
 (67,'GHANA','GHANAIAN','233','GH','GHA','<img src=“https://flagcdn.com/16x12/gh.png” srcset=“https://flagcdn.com/32x24/gh.png 2x https://flagcdn.com/48x36/gh.png 3x” width=“16” height=“12” alt=“Ghana”>',NULL,NULL),
 (68,'GIBRALTAR','GIBRALTARIAN','350','GI','GIB','<img src=“https://flagcdn.com/16x12/gi.png” srcset=“https://flagcdn.com/32x24/gi.png 2x https://flagcdn.com/48x36/gi.png 3x” width=“16” height=“12” alt=“Gibraltar”>',NULL,NULL),
 (69,'GREECE','GREEK','30','GR','GRC','<img src=“https://flagcdn.com/16x12/gr.png” srcset=“https://flagcdn.com/32x24/gr.png 2x https://flagcdn.com/48x36/gr.png 3x” width=“16” height=“12” alt=“Greece”>',NULL,NULL),
 (70,'GREENLAND','GREENLANDIC','299','GL','GRL','<img src=“https://flagcdn.com/16x12/gl.png” srcset=“https://flagcdn.com/32x24/gl.png 2x https://flagcdn.com/48x36/gl.png 3x” width=“16” height=“12” alt=“Greenland”>',NULL,NULL),
 (71,'GRENADA','GRENADIAN','1-473','GD','GRD','<img src=“https://flagcdn.com/16x12/gd.png” srcset=“https://flagcdn.com/32x24/gd.png 2x https://flagcdn.com/48x36/gd.png 3x” width=“16” height=“12” alt=“Grenada”>',NULL,NULL),
 (72,'GUAM','GUAMANIAN','1-671','GU','GUM','<img src=“https://flagcdn.com/16x12/gu.png” srcset=“https://flagcdn.com/32x24/gu.png 2x https://flagcdn.com/48x36/gu.png 3x” width=“16” height=“12” alt=“Guam”>',NULL,NULL),
 (73,'GUATEMALA','GUATEMALAN','502','GT','GTM','<img src=“https://flagcdn.com/16x12/gt.png” srcset=“https://flagcdn.com/32x24/gt.png 2x https://flagcdn.com/48x36/gt.png 3x” width=“16” height=“12” alt=“Guatemala”>',NULL,NULL),
 (74,'GUERNSEY','GIERNÉSIAIS','44-1481','GG','GGY','<img src=“https://flagcdn.com/16x12/gg.png” srcset=“https://flagcdn.com/32x24/gg.png 2x https://flagcdn.com/48x36/gg.png 3x” width=“16” height=“12” alt=“Guernsey”>',NULL,NULL),
 (75,'GUINEA','GUINEAN','224','GN','GIN','<img src=“https://flagcdn.com/16x12/gn.png” srcset=“https://flagcdn.com/32x24/gn.png 2x https://flagcdn.com/48x36/gn.png 3x” width=“16” height=“12” alt=“Guinea”>',NULL,NULL),
 (76,'GUINEA-BISSAU','BISSAU-GUINEAN','245','GW','GNB','<img src=“https://flagcdn.com/16x12/gw.png” srcset=“https://flagcdn.com/32x24/gw.png 2x https://flagcdn.com/48x36/gw.png 3x” width=“16” height=“12” alt=“Guinea-Bissau”>',NULL,NULL),
 (77,'GUYANA','GUYANESE','592','GY','GUY','<img src=“https://flagcdn.com/16x12/gy.png” srcset=“https://flagcdn.com/32x24/gy.png 2x https://flagcdn.com/48x36/gy.png 3x” width=“16” height=“12” alt=“Guyana”>',NULL,NULL),
 (78,'HAITI','HAITIAN','509','HT','HTI','<img src=“https://flagcdn.com/16x12/ht.png” srcset=“https://flagcdn.com/32x24/ht.png 2x https://flagcdn.com/48x36/ht.png 3x” width=“16” height=“12” alt=“Haiti”>',NULL,NULL),
 (79,'HONDURAS','HONDURAN','504','HN','HND','<img src=“https://flagcdn.com/16x12/hn.png” srcset=“https://flagcdn.com/32x24/hn.png 2x https://flagcdn.com/48x36/hn.png 3x” width=“16” height=“12” alt=“Honduras”>',NULL,NULL),
 (80,'HONG KONG','HONG KONGESE','852','HK','HKG','<img src=“https://flagcdn.com/16x12/hk.png” srcset=“https://flagcdn.com/32x24/hk.png 2x https://flagcdn.com/48x36/hk.png 3x” width=“16” height=“12” alt=“Hong_Kong”>',NULL,NULL),
 (81,'HUNGARY','HUNGARIAN','36','HU','HUN','<img src=“https://flagcdn.com/16x12/hu.png” srcset=“https://flagcdn.com/32x24/hu.png 2x https://flagcdn.com/48x36/hu.png 3x” width=“16” height=“12” alt=“Hungary”>',NULL,NULL),
 (82,'ICELAND','ICELANDIC','354','IS','ISL','<img src=“https://flagcdn.com/16x12/is.png” srcset=“https://flagcdn.com/32x24/is.png 2x https://flagcdn.com/48x36/is.png 3x” width=“16” height=“12” alt=“Iceland”>',NULL,NULL),
 (83,'INDIA','INDIAN','91','IN','IND','<img src=“https://flagcdn.com/16x12/in.png” srcset=“https://flagcdn.com/32x24/in.png 2x https://flagcdn.com/48x36/in.png 3x” width=“16” height=“12” alt=“India”>',NULL,NULL),
 (84,'INDONESIA','INDONESIAN','62','ID','IDN','<img src=“https://flagcdn.com/16x12/id.png” srcset=“https://flagcdn.com/32x24/id.png 2x https://flagcdn.com/48x36/id.png 3x” width=“16” height=“12” alt=“Indonesia”>',NULL,NULL),
 (85,'IRAN','IRANIAN','98','IR','IRN','<img src=“https://flagcdn.com/16x12/ir.png” srcset=“https://flagcdn.com/32x24/ir.png 2x https://flagcdn.com/48x36/ir.png 3x” width=“16” height=“12” alt=“Iran”>',NULL,NULL),
 (86,'IRAQ','IRAQI','964','IQ','IRQ','<img src=“https://flagcdn.com/16x12/iq.png” srcset=“https://flagcdn.com/32x24/iq.png 2x https://flagcdn.com/48x36/iq.png 3x” width=“16” height=“12” alt=“Iraq”>',NULL,NULL),
 (87,'IRELAND','IRISH','353','IE','IRL','<img src=“https://flagcdn.com/16x12/ie.png” srcset=“https://flagcdn.com/32x24/ie.png 2x https://flagcdn.com/48x36/ie.png 3x” width=“16” height=“12” alt=“Ireland”>',NULL,NULL),
 (88,'ISRAEL','ISRAELI','972','IL','ISR','<img src=“https://flagcdn.com/16x12/il.png” srcset=“https://flagcdn.com/32x24/il.png 2x https://flagcdn.com/48x36/il.png 3x” width=“16” height=“12” alt=“Israel”>',NULL,NULL),
 (89,'ITALY','ITALIAN','39','IT','ITA','<img src=“https://flagcdn.com/16x12/it.png” srcset=“https://flagcdn.com/32x24/it.png 2x https://flagcdn.com/48x36/it.png 3x” width=“16” height=“12” alt=“Italy”>',NULL,NULL),
 (90,'IVORY COAST','IVORIAN','225','CI','CIV','<img src=“https://flagcdn.com/16x12/ci.png” srcset=“https://flagcdn.com/32x24/ci.png 2x https://flagcdn.com/48x36/ci.png 3x” width=“16” height=“12” alt=“Ivory_Coast”>',NULL,NULL),
 (91,'JAMAICA','JAMAICAN','1-876','JM','JAM','<img src=“https://flagcdn.com/16x12/jm.png” srcset=“https://flagcdn.com/32x24/jm.png 2x https://flagcdn.com/48x36/jm.png 3x” width=“16” height=“12” alt=“Jamaica”>',NULL,NULL),
 (92,'JAPAN','JAPANESE','81','JP','JPN','<img src=“https://flagcdn.com/16x12/jp.png” srcset=“https://flagcdn.com/32x24/jp.png 2x https://flagcdn.com/48x36/jp.png 3x” width=“16” height=“12” alt=“Japan”>',NULL,NULL),
 (93,'JORDAN','JORDANIAN','962','JO','JOR','<img src=“https://flagcdn.com/16x12/jo.png” srcset=“https://flagcdn.com/32x24/jo.png 2x https://flagcdn.com/48x36/jo.png 3x” width=“16” height=“12” alt=“Jordan”>',NULL,NULL),
 (94,'KAZAKHSTAN','KAZAKH','7','KZ','KAZ','<img src=“https://flagcdn.com/16x12/kz.png” srcset=“https://flagcdn.com/32x24/kz.png 2x https://flagcdn.com/48x36/kz.png 3x” width=“16” height=“12” alt=“Kazakhstan”>',NULL,NULL),
 (95,'KENYA','KENYAN','254','KE','KEN','<img src=“https://flagcdn.com/16x12/ke.png” srcset=“https://flagcdn.com/32x24/ke.png 2x https://flagcdn.com/48x36/ke.png 3x” width=“16” height=“12” alt=“Kenya”>',NULL,NULL),
 (96,'KIRIBATI','I-KIRIBATI','686','KI','KIR','<img src=“https://flagcdn.com/16x12/ki.png” srcset=“https://flagcdn.com/32x24/ki.png 2x https://flagcdn.com/48x36/ki.png 3x” width=“16” height=“12” alt=“Kiribati”>',NULL,NULL),
 (97,'KUWAIT','KUWAITI','965','KW','KWT','<img src=“https://flagcdn.com/16x12/kw.png” srcset=“https://flagcdn.com/32x24/kw.png 2x https://flagcdn.com/48x36/kw.png 3x” width=“16” height=“12” alt=“Kuwait”>',NULL,NULL),
 (98,'KYRGYZSTAN','KYRGYZ','996','KG','KGZ','<img src=“https://flagcdn.com/16x12/kg.png” srcset=“https://flagcdn.com/32x24/kg.png 2x https://flagcdn.com/48x36/kg.png 3x” width=“16” height=“12” alt=“Kyrgyzstan”>',NULL,NULL),
 (99,'LAOS','LAOTIAN','856','LA','LAO','<img src=“https://flagcdn.com/16x12/la.png” srcset=“https://flagcdn.com/32x24/la.png 2x https://flagcdn.com/48x36/la.png 3x” width=“16” height=“12” alt=“Laos”>',NULL,NULL),
 (100,'LATVIA','LATVIAN','371','LV','LVA','<img src=“https://flagcdn.com/16x12/lv.png” srcset=“https://flagcdn.com/32x24/lv.png 2x https://flagcdn.com/48x36/lv.png 3x” width=“16” height=“12” alt=“Latvia”>',NULL,NULL),
 (101,'LEBANON','LEBANESE','961','LB','LBN','<img src=“https://flagcdn.com/16x12/lb.png” srcset=“https://flagcdn.com/32x24/lb.png 2x https://flagcdn.com/48x36/lb.png 3x” width=“16” height=“12” alt=“Lebanon”>',NULL,NULL),
 (102,'LESOTHO','MOSOTHO','266','LS','LSO','<img src=“https://flagcdn.com/16x12/ls.png” srcset=“https://flagcdn.com/32x24/ls.png 2x https://flagcdn.com/48x36/ls.png 3x” width=“16” height=“12” alt=“Lesotho”>',NULL,NULL),
 (103,'LIBERIA','LIBERIAN','231','LR','LBR','<img src=“https://flagcdn.com/16x12/lr.png” srcset=“https://flagcdn.com/32x24/lr.png 2x https://flagcdn.com/48x36/lr.png 3x” width=“16” height=“12” alt=“Liberia”>',NULL,NULL),
 (104,'LIBYA','LIBYAN','218','LY','LBY','<img src=“https://flagcdn.com/16x12/ly.png” srcset=“https://flagcdn.com/32x24/ly.png 2x https://flagcdn.com/48x36/ly.png 3x” width=“16” height=“12” alt=“Libya”>',NULL,NULL),
 (105,'LIECHTENSTEIN','LIECHTENSTEINER','423','LI','LIE','<img src=“https://flagcdn.com/16x12/li.png” srcset=“https://flagcdn.com/32x24/li.png 2x https://flagcdn.com/48x36/li.png 3x” width=“16” height=“12” alt=“Liechtenstein”>',NULL,NULL),
 (106,'LITHUANIA','LITHUANIAN','370','LT','LTU','<img src=“https://flagcdn.com/16x12/lt.png” srcset=“https://flagcdn.com/32x24/lt.png 2x https://flagcdn.com/48x36/lt.png 3x” width=“16” height=“12” alt=“Lithuania”>',NULL,NULL),
 (107,'LUXEMBOURG','LUXEMBOURGER','352','LU','LUX','<img src=“https://flagcdn.com/16x12/lu.png” srcset=“https://flagcdn.com/32x24/lu.png 2x https://flagcdn.com/48x36/lu.png 3x” width=“16” height=“12” alt=“Luxembourg”>',NULL,NULL),
 (108,'MACAU','MACANESE','853','MO','MAC','<img src=“https://flagcdn.com/16x12/mo.png” srcset=“https://flagcdn.com/32x24/mo.png 2x https://flagcdn.com/48x36/mo.png 3x” width=“16” height=“12” alt=“Macau”>',NULL,NULL),
 (109,'MACEDONIA','MACEDONIAN','389','MK','MKD','<img src=“https://flagcdn.com/16x12/mk.png” srcset=“https://flagcdn.com/32x24/mk.png 2x https://flagcdn.com/48x36/mk.png 3x” width=“16” height=“12” alt=“Macedonia”>',NULL,NULL),
 (110,'MADAGASCAR','MALAGASY','261','MG','MDG','<img src=“https://flagcdn.com/16x12/mg.png” srcset=“https://flagcdn.com/32x24/mg.png 2x https://flagcdn.com/48x36/mg.png 3x” width=“16” height=“12” alt=“Madagascar”>',NULL,NULL),
 (111,'MALAWI','MALAWIAN','265','MW','MWI','<img src=“https://flagcdn.com/16x12/mw.png” srcset=“https://flagcdn.com/32x24/mw.png 2x https://flagcdn.com/48x36/mw.png 3x” width=“16” height=“12” alt=“Malawi”>',NULL,NULL),
 (112,'MALAYSIA','MALAYSIAN','60','MY','MYS','<img src=“https://flagcdn.com/16x12/my.png” srcset=“https://flagcdn.com/32x24/my.png 2x https://flagcdn.com/48x36/my.png 3x” width=“16” height=“12” alt=“Malaysia”>',NULL,NULL),
 (113,'MALDIVES','MALDIVIAN','960','MV','MDV','<img src=“https://flagcdn.com/16x12/mv.png” srcset=“https://flagcdn.com/32x24/mv.png 2x https://flagcdn.com/48x36/mv.png 3x” width=“16” height=“12” alt=“Maldives”>',NULL,NULL),
 (114,'MALI','MALINESE','223','ML','MLI','<img src=“https://flagcdn.com/16x12/ml.png” srcset=“https://flagcdn.com/32x24/ml.png 2x https://flagcdn.com/48x36/ml.png 3x” width=“16” height=“12” alt=“Mali”>',NULL,NULL),
 (115,'MALTA','MALTESE','356','MT','MLT','<img src=“https://flagcdn.com/16x12/mt.png” srcset=“https://flagcdn.com/32x24/mt.png 2x https://flagcdn.com/48x36/mt.png 3x” width=“16” height=“12” alt=“Malta”>',NULL,NULL),
 (116,'MARSHALL ISLANDS','MARSHALLESE','692','MH','MHL','<img src=“https://flagcdn.com/16x12/mh.png” srcset=“https://flagcdn.com/32x24/mh.png 2x https://flagcdn.com/48x36/mh.png 3x” width=“16” height=“12” alt=“Marshall_Islands”>',NULL,NULL),
 (117,'MAURITANIA','MAURITANIAN','222','MR','MRT','<img src=“https://flagcdn.com/16x12/mr.png” srcset=“https://flagcdn.com/32x24/mr.png 2x https://flagcdn.com/48x36/mr.png 3x” width=“16” height=“12” alt=“Mauritania”>',NULL,NULL),
 (118,'MAURITIUS','MAURITIAN','230','MU','MUS','<img src=“https://flagcdn.com/16x12/mu.png” srcset=“https://flagcdn.com/32x24/mu.png 2x https://flagcdn.com/48x36/mu.png 3x” width=“16” height=“12” alt=“Mauritius”>',NULL,NULL),
 (119,'MAYOTTE','MAHORAN','262','YT','MYT','<img src=“https://flagcdn.com/16x12/yt.png” srcset=“https://flagcdn.com/32x24/yt.png 2x https://flagcdn.com/48x36/yt.png 3x” width=“16” height=“12” alt=“Mayotte”>',NULL,NULL),
 (120,'MEXICO','MEXICAN','52','MX','MEX','<img src=“https://flagcdn.com/16x12/mx.png” srcset=“https://flagcdn.com/32x24/mx.png 2x https://flagcdn.com/48x36/mx.png 3x” width=“16” height=“12” alt=“Mexico”>',NULL,NULL),
 (121,'MICRONESIA','MICRONESIAN','691','FM','FSM','<img src=“https://flagcdn.com/16x12/fm.png” srcset=“https://flagcdn.com/32x24/fm.png 2x https://flagcdn.com/48x36/fm.png 3x” width=“16” height=“12” alt=“Micronesia”>',NULL,NULL),
 (122,'MOLDOVA','MOLDOVAN','373','MD','MDA','<img src=“https://flagcdn.com/16x12/md.png” srcset=“https://flagcdn.com/32x24/md.png 2x https://flagcdn.com/48x36/md.png 3x” width=“16” height=“12” alt=“Moldova”>',NULL,NULL),
 (123,'MONACO','MONACAN','377','MC','MCO','<img src=“https://flagcdn.com/16x12/mc.png” srcset=“https://flagcdn.com/32x24/mc.png 2x https://flagcdn.com/48x36/mc.png 3x” width=“16” height=“12” alt=“Monaco”>',NULL,NULL),
 (124,'MONGOLIA','MONGOLIAN','976','MN','MNG','<img src=“https://flagcdn.com/16x12/mn.png” srcset=“https://flagcdn.com/32x24/mn.png 2x https://flagcdn.com/48x36/mn.png 3x” width=“16” height=“12” alt=“Mongolia”>',NULL,NULL),
 (125,'MONTENEGRO','MONTENEGRIN','382','ME','MNE','<img src=“https://flagcdn.com/16x12/me.png” srcset=“https://flagcdn.com/32x24/me.png 2x https://flagcdn.com/48x36/me.png 3x” width=“16” height=“12” alt=“Montenegro”>',NULL,NULL),
 (126,'MONTSERRAT','MONTSERRATIAN','1-664','MS','MSR','<img src=“https://flagcdn.com/16x12/ms.png” srcset=“https://flagcdn.com/32x24/ms.png 2x https://flagcdn.com/48x36/ms.png 3x” width=“16” height=“12” alt=“Montserrat”>',NULL,NULL),
 (127,'MOROCCO','MOROCCAN','212','MA','MAR','<img src=“https://flagcdn.com/16x12/ma.png” srcset=“https://flagcdn.com/32x24/ma.png 2x https://flagcdn.com/48x36/ma.png 3x” width=“16” height=“12” alt=“Morocco”>',NULL,NULL),
 (128,'MOZAMBIQUE','MOZAMBICAN','258','MZ','MOZ','<img src=“https://flagcdn.com/16x12/mz.png” srcset=“https://flagcdn.com/32x24/mz.png 2x https://flagcdn.com/48x36/mz.png 3x” width=“16” height=“12” alt=“Mozambique”>',NULL,NULL),
 (129,'MYANMAR','BURMESE','95','MM','MMR','<img src=“https://flagcdn.com/16x12/mm.png” srcset=“https://flagcdn.com/32x24/mm.png 2x https://flagcdn.com/48x36/mm.png 3x” width=“16” height=“12” alt=“Myanmar”>',NULL,NULL),
 (130,'NAMIBIA','NAMIBIAN','264','NA','NAM','<img src=“https://flagcdn.com/16x12/na.png” srcset=“https://flagcdn.com/32x24/na.png 2x https://flagcdn.com/48x36/na.png 3x” width=“16” height=“12” alt=“Namibia”>',NULL,NULL),
 (131,'NAURU','NAURUAN','674','NR','NRU','<img src=“https://flagcdn.com/16x12/nr.png” srcset=“https://flagcdn.com/32x24/nr.png 2x https://flagcdn.com/48x36/nr.png 3x” width=“16” height=“12” alt=“Nauru”>',NULL,NULL),
 (132,'NEPAL','NEPALI','977','NP','NPL','<img src=“https://flagcdn.com/16x12/np.png” srcset=“https://flagcdn.com/32x24/np.png 2x https://flagcdn.com/48x36/np.png 3x” width=“16” height=“12” alt=“Nepal”>',NULL,NULL),
 (133,'NETHERLANDS','DUTCH','31','NL','NLD','<img src=“https://flagcdn.com/16x12/nl.png” srcset=“https://flagcdn.com/32x24/nl.png 2x https://flagcdn.com/48x36/nl.png 3x” width=“16” height=“12” alt=“Netherlands”>',NULL,NULL),
 (134,'NEW CALEDONIA','NEW CALEDONIAN','687','NC','NCL','<img src=“https://flagcdn.com/16x12/nc.png” srcset=“https://flagcdn.com/32x24/nc.png 2x https://flagcdn.com/48x36/nc.png 3x” width=“16” height=“12” alt=“New_Caledonia”>',NULL,NULL),
 (135,'NEW ZEALAND','NEW ZEALANDER','64','NZ','NZL','<img src=“https://flagcdn.com/16x12/nz.png” srcset=“https://flagcdn.com/32x24/nz.png 2x https://flagcdn.com/48x36/nz.png 3x” width=“16” height=“12” alt=“New_Zealand”>',NULL,NULL),
 (136,'NICARAGUA','NICARAGUAN','505','NI','NIC','<img src=“https://flagcdn.com/16x12/ni.png” srcset=“https://flagcdn.com/32x24/ni.png 2x https://flagcdn.com/48x36/ni.png 3x” width=“16” height=“12” alt=“Nicaragua”>',NULL,NULL),
 (137,'NIGER','NIGERIEN','227','NE','NER','<img src=“https://flagcdn.com/16x12/ne.png” srcset=“https://flagcdn.com/32x24/ne.png 2x https://flagcdn.com/48x36/ne.png 3x” width=“16” height=“12” alt=“Niger”>',NULL,NULL),
 (138,'NIGERIA','NIGERIAN','234','NG','NGA','<img src=“https://flagcdn.com/16x12/ng.png” srcset=“https://flagcdn.com/32x24/ng.png 2x https://flagcdn.com/48x36/ng.png 3x” width=“16” height=“12” alt=“Nigeria”>',NULL,NULL),
 (139,'NIUE','NIUEAN','683','NU','NIU','<img src=“https://flagcdn.com/16x12/nu.png” srcset=“https://flagcdn.com/32x24/nu.png 2x https://flagcdn.com/48x36/nu.png 3x” width=“16” height=“12” alt=“Niue”>',NULL,NULL),
 (140,'NORTH KOREA','NORTH KOREAN','850','KP','PRK','<img src=“https://flagcdn.com/16x12/kp.png” srcset=“https://flagcdn.com/32x24/kp.png 2x https://flagcdn.com/48x36/kp.png 3x” width=“16” height=“12” alt=“North_Korea”>',NULL,NULL),
 (141,'NORTHERN MARIANA ISLANDS','NORTHERN MARIANAN','1-670','MP','MNP','<img src=“https://flagcdn.com/16x12/mp.png” srcset=“https://flagcdn.com/32x24/mp.png 2x https://flagcdn.com/48x36/mp.png 3x” width=“16” height=“12” alt=“Northern_Mariana_Islands”>',NULL,NULL),
 (142,'NORWAY','NORWEGIAN','47','NO','NOR','<img src=“https://flagcdn.com/16x12/no.png” srcset=“https://flagcdn.com/32x24/no.png 2x https://flagcdn.com/48x36/no.png 3x” width=“16” height=“12” alt=“Norway”>',NULL,NULL),
 (143,'OMAN','OMANI','968','OM','OMN','<img src=“https://flagcdn.com/16x12/om.png” srcset=“https://flagcdn.com/32x24/om.png 2x https://flagcdn.com/48x36/om.png 3x” width=“16” height=“12” alt=“Oman”>',NULL,NULL),
 (144,'PAKISTAN','PAKISTANI','92','PK','PAK','<img src=“https://flagcdn.com/16x12/pk.png” srcset=“https://flagcdn.com/32x24/pk.png 2x https://flagcdn.com/48x36/pk.png 3x” width=“16” height=“12” alt=“Pakistan”>',NULL,NULL),
 (145,'PALAU','PALAUAN','680','PW','PLW','<img src=“https://flagcdn.com/16x12/pw.png” srcset=“https://flagcdn.com/32x24/pw.png 2x https://flagcdn.com/48x36/pw.png 3x” width=“16” height=“12” alt=“Palau”>',NULL,NULL),
 (146,'PALESTINE','PALESTINIAN','970','PS','PSE','<img src=“https://flagcdn.com/16x12/ps.png” srcset=“https://flagcdn.com/32x24/ps.png 2x https://flagcdn.com/48x36/ps.png 3x” width=“16” height=“12” alt=“Palestine”>',NULL,NULL),
 (147,'PANAMA','PANAMANIAN','507','PA','PAN','<img src=“https://flagcdn.com/16x12/pa.png” srcset=“https://flagcdn.com/32x24/pa.png 2x https://flagcdn.com/48x36/pa.png 3x” width=“16” height=“12” alt=“Panama”>',NULL,NULL),
 (148,'PAPUA NEW GUINEA','PAPUAN','675','PG','PNG','<img src=“https://flagcdn.com/16x12/pg.png” srcset=“https://flagcdn.com/32x24/pg.png 2x https://flagcdn.com/48x36/pg.png 3x” width=“16” height=“12” alt=“Papua_New_Guinea”>',NULL,NULL),
 (149,'PARAGUAY','PARAGUAYAN','595','PY','PRY','<img src=“https://flagcdn.com/16x12/py.png” srcset=“https://flagcdn.com/32x24/py.png 2x https://flagcdn.com/48x36/py.png 3x” width=“16” height=“12” alt=“Paraguay”>',NULL,NULL),
 (150,'PERU','PERUVIAN','51','PE','PER','<img src=“https://flagcdn.com/16x12/pe.png” srcset=“https://flagcdn.com/32x24/pe.png 2x https://flagcdn.com/48x36/pe.png 3x” width=“16” height=“12” alt=“Peru”>',NULL,NULL),
 (151,'PHILIPPINES','PHILIPPINE','63','PH','PHL','<img src=“https://flagcdn.com/16x12/ph.png” srcset=“https://flagcdn.com/32x24/ph.png 2x https://flagcdn.com/48x36/ph.png 3x” width=“16” height=“12” alt=“Philippines”>',NULL,NULL),
 (152,'PITCAIRN','PITCAIRN ISLAND','64','PN','PCN','<img src=“https://flagcdn.com/16x12/pn.png” srcset=“https://flagcdn.com/32x24/pn.png 2x https://flagcdn.com/48x36/pn.png 3x” width=“16” height=“12” alt=“Pitcairn”>',NULL,NULL),
 (153,'POLAND','POLISH','48','PL','POL','<img src=“https://flagcdn.com/16x12/pl.png” srcset=“https://flagcdn.com/32x24/pl.png 2x https://flagcdn.com/48x36/pl.png 3x” width=“16” height=“12” alt=“Poland”>',NULL,NULL),
 (154,'PORTUGAL','PORTUGUESE','351','PT','PRT','<img src=“https://flagcdn.com/16x12/pt.png” srcset=“https://flagcdn.com/32x24/pt.png 2x https://flagcdn.com/48x36/pt.png 3x” width=“16” height=“12” alt=“Portugal”>',NULL,NULL),
 (155,'PUERTO RICO','PUERTO RICAN','1-787 1-939','PR','PRI','<img src=“https://flagcdn.com/16x12/pr.png” srcset=“https://flagcdn.com/32x24/pr.png 2x https://flagcdn.com/48x36/pr.png 3x” width=“16” height=“12” alt=“Puerto_Rico”>',NULL,NULL),
 (156,'QATAR','QATARI','974','QA','QAT','<img src=“https://flagcdn.com/16x12/qa.png” srcset=“https://flagcdn.com/32x24/qa.png 2x https://flagcdn.com/48x36/qa.png 3x” width=“16” height=“12” alt=“Qatar”>',NULL,NULL),
 (157,'REUNION','RÉUNIONESE','262','RE','REU','<img src=“https://flagcdn.com/16x12/re.png” srcset=“https://flagcdn.com/32x24/re.png 2x https://flagcdn.com/48x36/re.png 3x” width=“16” height=“12” alt=“Reunion”>',NULL,NULL),
 (158,'ROMANIA','ROMANIAN','40','RO','ROU','<img src=“https://flagcdn.com/16x12/ro.png” srcset=“https://flagcdn.com/32x24/ro.png 2x https://flagcdn.com/48x36/ro.png 3x” width=“16” height=“12” alt=“Romania”>',NULL,NULL),
 (159,'RUSSIA','RUSSIAN','7','RU','RUS','<img src=“https://flagcdn.com/16x12/ru.png” srcset=“https://flagcdn.com/32x24/ru.png 2x https://flagcdn.com/48x36/ru.png 3x” width=“16” height=“12” alt=“Russia”>',NULL,NULL),
 (160,'RWANDA','RWANDAN','250','RW','RWA','<img src=“https://flagcdn.com/16x12/rw.png” srcset=“https://flagcdn.com/32x24/rw.png 2x https://flagcdn.com/48x36/rw.png 3x” width=“16” height=“12” alt=“Rwanda”>',NULL,NULL),
 (161,'SAINT MARTIN','SAINT-MARTINOISE','590','MF','MAF','<img src=“https://flagcdn.com/16x12/mf.png” srcset=“https://flagcdn.com/32x24/mf.png 2x https://flagcdn.com/48x36/mf.png 3x” width=“16” height=“12” alt=“Saint_Martin”>',NULL,NULL),
 (162,'SAINT PIERRE AND MIQUELON','SAINT-PIERRAIS','508','PM','SPM','<img src=“https://flagcdn.com/16x12/pm.png” srcset=“https://flagcdn.com/32x24/pm.png 2x https://flagcdn.com/48x36/pm.png 3x” width=“16” height=“12” alt=“Saint_Pierre_and_Miquelon”>',NULL,NULL),
 (163,'SAINT VINCENT AND THE GRENADINES','VINCENTIAN','1-784','VC','VCT','<img src=“https://flagcdn.com/16x12/vc.png” srcset=“https://flagcdn.com/32x24/vc.png 2x https://flagcdn.com/48x36/vc.png 3x” width=“16” height=“12” alt=“Saint_Vincent_and_the_Grenadines”>',NULL,NULL),
 (164,'SAMOA','SAMOAN','685','WS','WSM','<img src=“https://flagcdn.com/16x12/ws.png” srcset=“https://flagcdn.com/32x24/ws.png 2x https://flagcdn.com/48x36/ws.png 3x” width=“16” height=“12” alt=“Samoa”>',NULL,NULL),
 (165,'SAN MARINO','SAMMARINESE','378','SM','SMR','<img src=“https://flagcdn.com/16x12/sm.png” srcset=“https://flagcdn.com/32x24/sm.png 2x https://flagcdn.com/48x36/sm.png 3x” width=“16” height=“12” alt=“San_Marino”>',NULL,NULL),
 (166,'SAO TOME AND PRINCIPE','SAO TOMEAN','239','ST','STP','<img src=“https://flagcdn.com/16x12/st.png” srcset=“https://flagcdn.com/32x24/st.png 2x https://flagcdn.com/48x36/st.png 3x” width=“16” height=“12” alt=“Sao_Tome_and_Principe”>',NULL,NULL),
 (167,'SAUDI ARABIA','SAUDI ARABIAN','966','SA','SAU','<img src=“https://flagcdn.com/16x12/sa.png” srcset=“https://flagcdn.com/32x24/sa.png 2x https://flagcdn.com/48x36/sa.png 3x” width=“16” height=“12” alt=“Saudi_Arabia”>',NULL,NULL),
 (168,'SENEGAL','SENEGALESE','221','SN','SEN','<img src=“https://flagcdn.com/16x12/sn.png” srcset=“https://flagcdn.com/32x24/sn.png 2x https://flagcdn.com/48x36/sn.png 3x” width=“16” height=“12” alt=“Senegal”>',NULL,NULL),
 (169,'SERBIA','SERBIAN','381','RS','SRB','<img src=“https://flagcdn.com/16x12/rs.png” srcset=“https://flagcdn.com/32x24/rs.png 2x https://flagcdn.com/48x36/rs.png 3x” width=“16” height=“12” alt=“Serbia”>',NULL,NULL),
 (170,'SEYCHELLES','SEYCHELLOIS','248','SC','SYC','<img src=“https://flagcdn.com/16x12/sc.png” srcset=“https://flagcdn.com/32x24/sc.png 2x https://flagcdn.com/48x36/sc.png 3x” width=“16” height=“12” alt=“Seychelles”>',NULL,NULL),
 (171,'SIERRA LEONE','SIERRA LEONEAN','232','SL','SLE','<img src=“https://flagcdn.com/16x12/sl.png” srcset=“https://flagcdn.com/32x24/sl.png 2x https://flagcdn.com/48x36/sl.png 3x” width=“16” height=“12” alt=“Sierra_Leone”>',NULL,NULL),
 (172,'SINGAPORE','SINGAPOREAN','65','SG','SGP','<img src=“https://flagcdn.com/16x12/sg.png” srcset=“https://flagcdn.com/32x24/sg.png 2x https://flagcdn.com/48x36/sg.png 3x” width=“16” height=“12” alt=“Singapore”>',NULL,NULL),
 (173,'SLOVAKIA','SLOVAK','421','SK','SVK','<img src=“https://flagcdn.com/16x12/sk.png” srcset=“https://flagcdn.com/32x24/sk.png 2x https://flagcdn.com/48x36/sk.png 3x” width=“16” height=“12” alt=“Slovakia”>',NULL,NULL),
 (174,'SLOVENIA','SLOVENIAN','386','SI','SVN','<img src=“https://flagcdn.com/16x12/si.png” srcset=“https://flagcdn.com/32x24/si.png 2x https://flagcdn.com/48x36/si.png 3x” width=“16” height=“12” alt=“Slovenia”>',NULL,NULL),
 (175,'SOLOMON ISLANDS','SOLOMON ISLAND','677','SB','SLB','<img src=“https://flagcdn.com/16x12/sb.png” srcset=“https://flagcdn.com/32x24/sb.png 2x https://flagcdn.com/48x36/sb.png 3x” width=“16” height=“12” alt=“Solomon_Islands”>',NULL,NULL),
 (176,'SOMALIA','SOMALIAN','252','SO','SOM','<img src=“https://flagcdn.com/16x12/so.png” srcset=“https://flagcdn.com/32x24/so.png 2x https://flagcdn.com/48x36/so.png 3x” width=“16” height=“12” alt=“Somalia”>',NULL,NULL),
 (177,'SOUTH AFRICA','SOUTH AFRICAN','27','ZA','ZAF','<img src=“https://flagcdn.com/16x12/za.png” srcset=“https://flagcdn.com/32x24/za.png 2x https://flagcdn.com/48x36/za.png 3x” width=“16” height=“12” alt=“South_Africa”>',NULL,NULL),
 (178,'SOUTH KOREA','SOUTH KOREAN','82','KR','KOR','<img src=“https://flagcdn.com/16x12/kr.png” srcset=“https://flagcdn.com/32x24/kr.png 2x https://flagcdn.com/48x36/kr.png 3x” width=“16” height=“12” alt=“South_Korea”>',NULL,NULL),
 (179,'SOUTH SUDAN','SOUTH SUDANESE','211','SS','SSD','<img src=“https://flagcdn.com/16x12/ss.png” srcset=“https://flagcdn.com/32x24/ss.png 2x https://flagcdn.com/48x36/ss.png 3x” width=“16” height=“12” alt=“South_Sudan”>',NULL,NULL),
 (180,'SPAIN','SPANISH','34','ES','ESP','<img src=“https://flagcdn.com/16x12/es.png” srcset=“https://flagcdn.com/32x24/es.png 2x https://flagcdn.com/48x36/es.png 3x” width=“16” height=“12” alt=“Spain”>',NULL,NULL),
 (181,'SRI LANKA','SRI LANKAN','94','LK','LKA','<img src=“https://flagcdn.com/16x12/lk.png” srcset=“https://flagcdn.com/32x24/lk.png 2x https://flagcdn.com/48x36/lk.png 3x” width=“16” height=“12” alt=“Sri_Lanka”>',NULL,NULL),
 (182,'SUDAN','SUDANESE','249','SD','SDN','<img src=“https://flagcdn.com/16x12/sd.png” srcset=“https://flagcdn.com/32x24/sd.png 2x https://flagcdn.com/48x36/sd.png 3x” width=“16” height=“12” alt=“Sudan”>',NULL,NULL),
 (183,'SURINAME','SURINAMESE','597','SR','SUR','<img src=“https://flagcdn.com/16x12/sr.png” srcset=“https://flagcdn.com/32x24/sr.png 2x https://flagcdn.com/48x36/sr.png 3x” width=“16” height=“12” alt=“Suriname”>',NULL,NULL),
 (184,'SVALBARD AND JAN MAYEN','SVALBARD','47','SJ','SJM','<img src=“https://flagcdn.com/16x12/sj.png” srcset=“https://flagcdn.com/32x24/sj.png 2x https://flagcdn.com/48x36/sj.png 3x” width=“16” height=“12” alt=“Svalbard_and_Jan_Mayen”>',NULL,NULL),
 (185,'SWAZILAND','SWAZI','268','SZ','SWZ','<img src=“https://flagcdn.com/16x12/sz.png” srcset=“https://flagcdn.com/32x24/sz.png 2x https://flagcdn.com/48x36/sz.png 3x” width=“16” height=“12” alt=“Swaziland”>',NULL,NULL),
 (186,'SWEDEN','SWEDISH','46','SE','SWE','<img src=“https://flagcdn.com/16x12/se.png” srcset=“https://flagcdn.com/32x24/se.png 2x https://flagcdn.com/48x36/se.png 3x” width=“16” height=“12” alt=“Sweden”>',NULL,NULL),
 (187,'SWITZERLAND','SWISS','41','CH','CHE','<img src=“https://flagcdn.com/16x12/ch.png” srcset=“https://flagcdn.com/32x24/ch.png 2x https://flagcdn.com/48x36/ch.png 3x” width=“16” height=“12” alt=“Switzerland”>',NULL,NULL),
 (188,'SYRIA','SYRIAN','963','SY','SYR','<img src=“https://flagcdn.com/16x12/sy.png” srcset=“https://flagcdn.com/32x24/sy.png 2x https://flagcdn.com/48x36/sy.png 3x” width=“16” height=“12” alt=“Syria”>',NULL,NULL),
 (189,'TAIWAN','TAIWANESE','886','TW','TWN','<img src=“https://flagcdn.com/16x12/tw.png” srcset=“https://flagcdn.com/32x24/tw.png 2x https://flagcdn.com/48x36/tw.png 3x” width=“16” height=“12” alt=“Taiwan”>',NULL,NULL),
 (190,'TAJIKISTAN','TAJIK','992','TJ','TJK','<img src=“https://flagcdn.com/16x12/tj.png” srcset=“https://flagcdn.com/32x24/tj.png 2x https://flagcdn.com/48x36/tj.png 3x” width=“16” height=“12” alt=“Tajikistan”>',NULL,NULL),
 (191,'TANZANIA','TANZANIAN','255','TZ','TZA','<img src=“https://flagcdn.com/16x12/tz.png” srcset=“https://flagcdn.com/32x24/tz.png 2x https://flagcdn.com/48x36/tz.png 3x” width=“16” height=“12” alt=“Tanzania”>',NULL,NULL),
 (192,'THAILAND','THAI','66','TH','THA','<img src=“https://flagcdn.com/16x12/th.png” srcset=“https://flagcdn.com/32x24/th.png 2x https://flagcdn.com/48x36/th.png 3x” width=“16” height=“12” alt=“Thailand”>',NULL,NULL),
 (193,'TOGO','TOGOLESE','228','TG','TGO','<img src=“https://flagcdn.com/16x12/tg.png” srcset=“https://flagcdn.com/32x24/tg.png 2x https://flagcdn.com/48x36/tg.png 3x” width=“16” height=“12” alt=“Togo”>',NULL,NULL),
 (194,'TOKELAU','TOKELAUAN','690','TK','TKL','<img src=“https://flagcdn.com/16x12/tk.png” srcset=“https://flagcdn.com/32x24/tk.png 2x https://flagcdn.com/48x36/tk.png 3x” width=“16” height=“12” alt=“Tokelau”>',NULL,NULL),
 (195,'TONGA','TONGAN','676','TO','TON','<img src=“https://flagcdn.com/16x12/to.png” srcset=“https://flagcdn.com/32x24/to.png 2x https://flagcdn.com/48x36/to.png 3x” width=“16” height=“12” alt=“Tonga”>',NULL,NULL),
 (196,'TRINIDAD AND TOBAGO','TRINIDADIAN','1-868','TT','TTO','<img src=“https://flagcdn.com/16x12/tt.png” srcset=“https://flagcdn.com/32x24/tt.png 2x https://flagcdn.com/48x36/tt.png 3x” width=“16” height=“12” alt=“Trinidad_and_Tobago”>',NULL,NULL),
 (197,'TUNISIA','TUNISIAN','216','TN','TUN','<img src=“https://flagcdn.com/16x12/tn.png” srcset=“https://flagcdn.com/32x24/tn.png 2x https://flagcdn.com/48x36/tn.png 3x” width=“16” height=“12” alt=“Tunisia”>',NULL,NULL),
 (198,'TURKEY','TURKISH','90','TR','TUR','<img src=“https://flagcdn.com/16x12/tr.png” srcset=“https://flagcdn.com/32x24/tr.png 2x https://flagcdn.com/48x36/tr.png 3x” width=“16” height=“12” alt=“Turkey”>',NULL,NULL),
 (199,'TURKMENISTAN','TURKMEN','993','TM','TKM','<img src=“https://flagcdn.com/16x12/tm.png” srcset=“https://flagcdn.com/32x24/tm.png 2x https://flagcdn.com/48x36/tm.png 3x” width=“16” height=“12” alt=“Turkmenistan”>',NULL,NULL),
 (200,'TURKS AND CAICOS ISLANDS','TURKS AND CAICOS ISLAND','1-649','TC','TCA','<img src=“https://flagcdn.com/16x12/tc.png” srcset=“https://flagcdn.com/32x24/tc.png 2x https://flagcdn.com/48x36/tc.png 3x” width=“16” height=“12” alt=“Turks_and_Caicos_Islands”>',NULL,NULL),
 (201,'TUVALU','TUVALUAN','688','TV','TUV','<img src=“https://flagcdn.com/16x12/tv.png” srcset=“https://flagcdn.com/32x24/tv.png 2x https://flagcdn.com/48x36/tv.png 3x” width=“16” height=“12” alt=“Tuvalu”>',NULL,NULL),
 (202,'UGANDA','UGANDAN','256','UG','UGA','<img src=“https://flagcdn.com/16x12/ug.png” srcset=“https://flagcdn.com/32x24/ug.png 2x https://flagcdn.com/48x36/ug.png 3x” width=“16” height=“12” alt=“Uganda”>',NULL,NULL),
 (203,'UKRAINE','UKRAINIAN','380','UA','UKR','<img src=“https://flagcdn.com/16x12/ua.png” srcset=“https://flagcdn.com/32x24/ua.png 2x https://flagcdn.com/48x36/ua.png 3x” width=“16” height=“12” alt=“Ukraine”>',NULL,NULL),
 (204,'UNITED ARAB EMIRATES','EMIRATI','971','AE','ARE','<img src=“https://flagcdn.com/16x12/ae.png” srcset=“https://flagcdn.com/32x24/ae.png 2x https://flagcdn.com/48x36/ae.png 3x” width=“16” height=“12” alt=“United_Arab_Emirates”>',NULL,NULL),
 (205,'UNITED KINGDOM','BRITISH','44','GB','GBR','<img src=“https://flagcdn.com/16x12/gb.png” srcset=“https://flagcdn.com/32x24/gb.png 2x https://flagcdn.com/48x36/gb.png 3x” width=“16” height=“12” alt=“United_Kingdom”>',NULL,NULL),
 (206,'UNITED STATES','AMERICAN','1','US','USA','<img src=“https://flagcdn.com/16x12/us.png” srcset=“https://flagcdn.com/32x24/us.png 2x https://flagcdn.com/48x36/us.png 3x” width=“16” height=“12” alt=“United_States”>',NULL,NULL),
 (207,'URUGUAY','URUGUAYAN','598','UY','URY','<img src=“https://flagcdn.com/16x12/uy.png” srcset=“https://flagcdn.com/32x24/uy.png 2x https://flagcdn.com/48x36/uy.png 3x” width=“16” height=“12” alt=“Uruguay”>',NULL,NULL),
 (208,'UZBEKISTAN','UZBEK','998','UZ','UZB','<img src=“https://flagcdn.com/16x12/uz.png” srcset=“https://flagcdn.com/32x24/uz.png 2x https://flagcdn.com/48x36/uz.png 3x” width=“16” height=“12” alt=“Uzbekistan”>',NULL,NULL),
 (209,'VANUATU','VANUATUAN','678','VU','VUT','<img src=“https://flagcdn.com/16x12/vu.png” srcset=“https://flagcdn.com/32x24/vu.png 2x https://flagcdn.com/48x36/vu.png 3x” width=“16” height=“12” alt=“Vanuatu”>',NULL,NULL),
 (210,'VENEZUELA','VENEZUELAN','58','VE','VEN','<img src=“https://flagcdn.com/16x12/ve.png” srcset=“https://flagcdn.com/32x24/ve.png 2x https://flagcdn.com/48x36/ve.png 3x” width=“16” height=“12” alt=“Venezuela”>',NULL,NULL),
 (211,'VIETNAM','VIETNAMESE','84','VN','VNM','<img src=“https://flagcdn.com/16x12/vn.png” srcset=“https://flagcdn.com/32x24/vn.png 2x https://flagcdn.com/48x36/vn.png 3x” width=“16” height=“12” alt=“Vietnam”>',NULL,NULL),
 (212,'WALLIS AND FUTUNA','WALLISIAN','681','WF','WLF','<img src=“https://flagcdn.com/16x12/wf.png” srcset=“https://flagcdn.com/32x24/wf.png 2x https://flagcdn.com/48x36/wf.png 3x” width=“16” height=“12” alt=“Wallis_and_Futuna”>',NULL,NULL),
 (213,'WESTERN SAHARA','SAHRAWI','212','EH','ESH','<img src=“https://flagcdn.com/16x12/eh.png” srcset=“https://flagcdn.com/32x24/eh.png 2x https://flagcdn.com/48x36/eh.png 3x” width=“16” height=“12” alt=“Western_Sahara”>',NULL,NULL),
 (214,'YEMEN','YEMENI','967','YE','YEM','<img src=“https://flagcdn.com/16x12/ye.png” srcset=“https://flagcdn.com/32x24/ye.png 2x https://flagcdn.com/48x36/ye.png 3x” width=“16” height=“12” alt=“Yemen”>',NULL,NULL),
 (215,'ZAMBIA','ZAMBIAN','260','ZM','ZMB','<img src=“https://flagcdn.com/16x12/zm.png” srcset=“https://flagcdn.com/32x24/zm.png 2x https://flagcdn.com/48x36/zm.png 3x” width=“16” height=“12” alt=“Zambia”>',NULL,NULL),
 (216,'ZIMBABWE','ZIMBABWEAN','263','ZW','ZWE','<img src=“https://flagcdn.com/16x12/zw.png” srcset=“https://flagcdn.com/32x24/zw.png 2x https://flagcdn.com/48x36/zw.png 3x” width=“16” height=“12” alt=“Zimbabwe”>',NULL,NULL);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;


--
-- Definition of table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE `currencies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_currency` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_currency` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` (`id`,`name_currency`,`code_currency`,`number_currency`,`created_at`,`updated_at`) VALUES 
 (1,'ARGENTINE PESO','ARS','032',NULL,NULL),
 (2,'AUSTRALIAN DOLLAR','AUD','036',NULL,NULL),
 (3,'BOLIVIANO','BOB','068',NULL,NULL),
 (4,'BRAZILIAN REAL','BRL','986',NULL,NULL),
 (5,'CANADIAN DOLLAR','CAD','124',NULL,NULL),
 (6,'CHILEAN PESO','CLP','152',NULL,NULL),
 (7,'CHINA YUAN RENMINBI','CNY','156',NULL,NULL),
 (8,'COLOMBIAN PESO','COP','170',NULL,NULL),
 (9,'EURO','EUR','978',NULL,NULL),
 (10,'HONG KONG DOLLAR','HKD','344',NULL,NULL),
 (11,'INDIAN RUPEE','INR','356',NULL,NULL),
 (12,'MEXICAN PESO','MXN','484',NULL,NULL),
 (13,'NEW ZEALAND DOLLAR','NZD','554',NULL,NULL),
 (14,'PERUVIAN SOL','PEN','604',NULL,NULL),
 (15,'SOUTH AFRICAN RAND','ZAR','710',NULL,NULL),
 (16,'STERLING','GBP','826',NULL,NULL),
 (17,'SWEDISH KRONA','SEK','752',NULL,NULL),
 (18,'SWISS FRANC','CHF','756',NULL,NULL),
 (19,'UNITED STATES DOLLAR','USD','840',NULL,NULL),
 (20,'YEN','JPY','392',NULL,NULL);
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;


--
-- Definition of table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code_customer` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_customer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_customer` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_customer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_customer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_customer` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_customer` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_customer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_customer` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;


--
-- Definition of table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;


--
-- Definition of table `industries`
--

DROP TABLE IF EXISTS `industries`;
CREATE TABLE `industries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_industry` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

/*!40000 ALTER TABLE `industries` DISABLE KEYS */;
INSERT INTO `industries` (`id`,`name_industry`,`created_at`,`updated_at`) VALUES 
 (1,'ADVERTISING AGENCY',NULL,NULL),
 (2,'ADVISORY',NULL,NULL),
 (3,'AGENCY',NULL,NULL),
 (4,'AUDIT',NULL,NULL),
 (5,'BANK',NULL,NULL),
 (6,'BLOG',NULL,NULL),
 (7,'CARPENTRY',NULL,NULL),
 (8,'CATERING',NULL,NULL),
 (9,'CATTLE RAISING',NULL,NULL),
 (10,'CLEANING',NULL,NULL),
 (11,'CONSTRUCTION',NULL,NULL),
 (12,'DESIGN',NULL,NULL),
 (13,'DISCOTHEQUE',NULL,NULL),
 (14,'DJs',NULL,NULL),
 (15,'ELECTRICITY',NULL,NULL),
 (16,'ENERGETIC',NULL,NULL),
 (17,'EVENT ORGANIZATION',NULL,NULL),
 (18,'FARMING',NULL,NULL),
 (19,'FINTECH',NULL,NULL),
 (20,'FISHING',NULL,NULL),
 (21,'GAS',NULL,NULL),
 (22,'HOME APPLIANCES',NULL,NULL),
 (23,'HOTEL',NULL,NULL),
 (24,'INDUSTRIAL',NULL,NULL),
 (25,'INSURANCE CARRIER',NULL,NULL),
 (26,'INSURTECH',NULL,NULL),
 (27,'MAINTENANCE',NULL,NULL),
 (28,'MARKETING AGENCY',NULL,NULL),
 (29,'MESSENGER SERVICE',NULL,NULL),
 (30,'MINING',NULL,NULL),
 (31,'MORTUARY',NULL,NULL),
 (32,'MOVIE THEATER',NULL,NULL),
 (33,'PHOTOGRAPHY',NULL,NULL),
 (34,'PLUMBING',NULL,NULL),
 (35,'PROGRAMMING',NULL,NULL),
 (36,'PUB',NULL,NULL),
 (37,'REPAIR',NULL,NULL),
 (38,'RESTAURANT',NULL,NULL),
 (39,'TELECOMMUNICATION',NULL,NULL),
 (40,'TELEPHONY',NULL,NULL),
 (41,'WATER',NULL,NULL);
/*!40000 ALTER TABLE `industries` ENABLE KEYS */;


--
-- Definition of table `insurances`
--

DROP TABLE IF EXISTS `insurances`;
CREATE TABLE `insurances` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_insurance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insurances`
--

/*!40000 ALTER TABLE `insurances` DISABLE KEYS */;
INSERT INTO `insurances` (`id`,`name_insurance`,`created_at`,`updated_at`) VALUES 
 (1,'CRECER SEGUROS S.A.',NULL,NULL),
 (2,'INTERSEGURO COMPAÑIA DE SEGUROS S.A.',NULL,NULL),
 (3,'LA POSITIVA SEGUROS Y REASEGUROS S.A.A.',NULL,NULL),
 (4,'MAPFRE PERU COMPAÑÍA DE SEGUROS Y REASEGUROS',NULL,NULL),
 (5,'PROTECTA S.A. COMPAÑIA DE SEGUROS',NULL,NULL),
 (6,'RIMAC SEGUROS Y REASEGUROS',NULL,NULL);
/*!40000 ALTER TABLE `insurances` ENABLE KEYS */;


--
-- Definition of table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code_invoice` char(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_invoice` date NOT NULL,
  `subtotal_invoice` double(9,2) NOT NULL,
  `discount_invoice` double(9,2) NOT NULL,
  `tax_invoice` double(9,2) NOT NULL,
  `total_invoice` double(9,2) NOT NULL,
  `deposit_invoice` double(9,2) NOT NULL,
  `user_id` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` bigint(20) unsigned NOT NULL,
  `payment_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoices_order_id_foreign` (`order_id`),
  KEY `invoices_payment_id_foreign` (`payment_id`),
  CONSTRAINT `invoices_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `invoices_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;


--
-- Definition of table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_job` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` (`id`,`name_job`,`created_at`,`updated_at`) VALUES 
 (1,'ACCOUNTANT',NULL,NULL),
 (2,'ADVERTISER',NULL,NULL),
 (3,'ANALYST',NULL,NULL),
 (4,'ARTISAN',NULL,NULL),
 (5,'ASSISTANT',NULL,NULL),
 (6,'AUDITOR',NULL,NULL),
 (7,'CHIEF DATA OFFICER (CDO)',NULL,NULL),
 (8,'CHIEF EXECUTIVE OFFICER (CEO)',NULL,NULL),
 (9,'CHIEF FINANCIAL OFFICER (CFO)',NULL,NULL),
 (10,'CHIEF MARKETING  OFFICER (CMO)',NULL,NULL),
 (11,'CHIEF OPERATIONAL OFFICER (COO)',NULL,NULL),
 (12,'CHIEF PRODUCT OFFICER (CPO)',NULL,NULL),
 (13,'CHIEF TECHNOLOGY OFFICER (CTO)',NULL,NULL),
 (14,'COMMUNICATION CHIEF OFFICER (CCO)',NULL,NULL),
 (15,'CONSULTANT ',NULL,NULL),
 (16,'DENTIST',NULL,NULL),
 (17,'DEVELOPER',NULL,NULL),
 (18,'DESIGNER',NULL,NULL),
 (19,'DOCTOR',NULL,NULL),
 (20,'DRIVER',NULL,NULL),
 (21,'ELECTRICIAN',NULL,NULL),
 (22,'ENGINEER',NULL,NULL),
 (23,'FORESTRY',NULL,NULL),
 (24,'JOURNALIST',NULL,NULL),
 (25,'KITCHEN ASSISTANT',NULL,NULL),
 (26,'LABORATORY MANAGER',NULL,NULL),
 (27,'LAWYER',NULL,NULL),
 (28,'LIBRARIAN',NULL,NULL),
 (29,'MANAGER',NULL,NULL),
 (30,'MECHANIC',NULL,NULL),
 (31,'NURSE',NULL,NULL),
 (32,'NUTRITIONIST',NULL,NULL),
 (33,'OFFICE MANAGER',NULL,NULL),
 (34,'OPERATOR',NULL,NULL),
 (35,'PRESIDENT',NULL,NULL),
 (36,'PROFESSOR',NULL,NULL),
 (37,'SECRETARY',NULL,NULL),
 (38,'SERVICE PERSONNEL',NULL,NULL),
 (39,'SPECIALIST',NULL,NULL),
 (40,'STATIST',NULL,NULL),
 (41,'SUPERVISOR',NULL,NULL),
 (42,'TECHNICIAN',NULL,NULL),
 (43,'TRAINEE',NULL,NULL),
 (44,'TREASURER',NULL,NULL),
 (45,'UNIT CHIEF',NULL,NULL),
 (46,'WATCHMAN',NULL,NULL),
 (47,'WELDER',NULL,NULL),
 (48,'WORKER ',NULL,NULL);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;


--
-- Definition of table `kin`
--

DROP TABLE IF EXISTS `kin`;
CREATE TABLE `kin` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_kin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kin`
--

/*!40000 ALTER TABLE `kin` DISABLE KEYS */;
INSERT INTO `kin` (`id`,`name_kin`,`created_at`,`updated_at`) VALUES 
 (1,'MADRE',NULL,NULL),
 (2,'PADRE',NULL,NULL),
 (3,'ESPOSO(A)',NULL,NULL),
 (4,'HERMANO(A)',NULL,NULL),
 (5,'HIJO(A)',NULL,NULL),
 (6,'TÍO(A)',NULL,NULL),
 (7,'SOBRINO(A)',NULL,NULL),
 (8,'PRIMO(A)',NULL,NULL),
 (9,'ABUELO(A)',NULL,NULL),
 (10,'NIETO(A)',NULL,NULL),
 (11,'BISABUELO(A)',NULL,NULL),
 (12,'TATARABUELO(A)',NULL,NULL),
 (13,'TATARANIETO(A)',NULL,NULL),
 (14,'BISNIETO(A)',NULL,NULL),
 (15,'VECINO(A)',NULL,NULL),
 (16,'AMIGO(A)',NULL,NULL);
/*!40000 ALTER TABLE `kin` ENABLE KEYS */;


--
-- Definition of table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES 
 (1,'2014_10_12_000000_create_users_table',1),
 (2,'2014_10_12_100000_create_password_resets_table',1),
 (3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),
 (4,'2019_08_19_000000_create_failed_jobs_table',1),
 (5,'2019_12_14_000001_create_personal_access_tokens_table',1),
 (6,'2022_03_18_191420_create_sessions_table',1),
 (7,'2022_03_23_111246_create_insurances_table',1),
 (8,'2022_03_23_111341_create_companies_table',1),
 (9,'2022_03_23_111419_create_contacts_table',1),
 (10,'2022_03_23_111435_create_categories_table',1),
 (11,'2022_03_23_111517_create_services_table',1),
 (12,'2022_03_23_111552_create_customers_table',1),
 (13,'2022_03_23_111618_create_orders_table',1),
 (14,'2022_03_25_090621_create_promotions_table',1),
 (15,'2022_03_25_090712_create_payments_table',1),
 (16,'2022_03_25_090902_create_invoices_table',1),
 (17,'2022_03_25_093730_create_view_orders_table',1),
 (18,'2022_03_26_133729_create_view_invoices_table',1),
 (19,'2022_04_04_095644_create_type_accidents_table',1),
 (20,'2022_04_05_164418_create_kin_table',1),
 (21,'2022_04_05_173627_create_view_contracts_table',1),
 (22,'2022_12_20_181309_create_countries_table',1),
 (23,'2022_12_22_002421_create_jobs_table',1),
 (24,'2022_12_22_002444_create_industries_table',1),
 (25,'2023_01_12_033952_create_currencies_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


--
-- Definition of table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code_order` char(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_order` date NOT NULL,
  `type_payment` tinyint(1) NOT NULL,
  `cost_order` double NOT NULL,
  `description_order` text COLLATE utf8mb4_unicode_ci,
  `date_accident` date NOT NULL,
  `time_accident` time DEFAULT NULL,
  `location_accident` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_partner` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_partner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_partner` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_order` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeaccident_id` tinyint(4) NOT NULL,
  `kin_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_order` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint(20) unsigned NOT NULL,
  `insurance_id` bigint(20) unsigned NOT NULL,
  `customer_id` bigint(20) unsigned NOT NULL,
  `service_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_company_id_foreign` (`company_id`),
  KEY `orders_insurance_id_foreign` (`insurance_id`),
  KEY `orders_customer_id_foreign` (`customer_id`),
  KEY `orders_service_id_foreign` (`service_id`),
  CONSTRAINT `orders_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `orders_insurance_id_foreign` FOREIGN KEY (`insurance_id`) REFERENCES `insurances` (`id`),
  CONSTRAINT `orders_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;


--
-- Definition of table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


--
-- Definition of table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` (`id`,`name_payment`,`created_at`,`updated_at`) VALUES 
 (1,'Cheque',NULL,NULL),
 (2,'Vaucher',NULL,NULL),
 (3,'App móvil',NULL,NULL),
 (4,'Otro',NULL,NULL);
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;


--
-- Definition of table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;


--
-- Definition of table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
CREATE TABLE `promotions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code_promotion` char(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_promotion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_promotion` date NOT NULL,
  `end_promotion` date NOT NULL,
  `discount_promotion` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

/*!40000 ALTER TABLE `promotions` DISABLE KEYS */;
/*!40000 ALTER TABLE `promotions` ENABLE KEYS */;


--
-- Definition of table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code_service` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_service` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_category_id_foreign` (`category_id`),
  CONSTRAINT `services_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` (`id`,`code_service`,`name_service`,`category_id`,`created_at`,`updated_at`) VALUES 
 (1,'SIITE','INDEMNIZACIÓN POR INCAPACIDAD TEMPORAL',1,NULL,NULL),
 (2,'SIIPE','INDEMNIZACIÓN POR INVALIDEZ PERMANENTE',1,NULL,NULL),
 (3,'SIFAL','INDEMNIZACIÓN POR FALLECIMIENTO',1,NULL,NULL),
 (4,'SORSE','REEMBOLSO DE GASTOS POR SEPELIO',1,NULL,NULL),
 (5,'FCRGM','REEMBOLSO DE GASTOS MÉDICOS',2,NULL,NULL),
 (6,'FPERE','REEMBOLSO DE FONDO DE PENSIÓN',3,NULL,NULL),
 (7,'SEVLR','REMUNERACIÓN DE SEGURO DE VIDA LEY',4,NULL,NULL),
 (8,'ASESO','ASESORÍA JURÍDICA',5,NULL,NULL);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;


--
-- Definition of table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) VALUES 
 ('0cpCUPZVwvV81JX3tAzJpwoyU7EgR4HGMQP8tjjB',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZUN4ODE3OGdHYURVWmFSMEx0dktyNGpWNE02dXA5TkdlcUtyNWUzQyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9jYXNlL2xpc3QiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAka3pDOEx0YXZITkFsazdJNE80SWs5LjBsNjJ0TTk3cWlnVlpCTERPWlVlZk1GVVRFZFNOSWEiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGt6QzhMdGF2SE5BbGs3STRPNElrOS4wbDYydE05N3FpZ1ZaQkxET1pVZWZNRlVURWRTTklhIjt9',1674436715),
 ('CHmY24kHMQky4K7STep4tpxjtuwRgvXHrMYsL3VL',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 OPR/93.0.0.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiVDJMbFJnZ0dzTTQ1Rlp5NlYwdTVlRUtpdElTVFAxY2tSZEJwbzlXNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9hcHBfcmV0YWl0L3NlZ3VydmlkL3B1YmxpYyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1675912534),
 ('tKPBqISI13U023vCWfwRymFpKJRWBGM4Fyi3fVeC',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 OPR/94.0.0.0','YTo2OntzOjY6Il90b2tlbiI7czo0MDoibEY2WFlVWUJNc3pnVWxnd0tVZGFKc01Ud1dUZDBUS0tPdVVaeDhLYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9jYXNlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGt6QzhMdGF2SE5BbGs3STRPNElrOS4wbDYydE05N3FpZ1ZaQkxET1pVZWZNRlVURWRTTklhIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRrekM4THRhdkhOQWxrN0k0TzRJazkuMGw2MnRNOTdxaWdWWkJMRE9aVWVmTUZVVEVkU05JYSI7fQ==',1676573104);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;


--
-- Definition of table `type_accidents`
--

DROP TABLE IF EXISTS `type_accidents`;
CREATE TABLE `type_accidents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type_accident` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_accidents`
--

/*!40000 ALTER TABLE `type_accidents` DISABLE KEYS */;
INSERT INTO `type_accidents` (`id`,`type_accident`,`created_at`,`updated_at`) VALUES 
 (1,'ATROPELLO CON SUBSECUENTE DE LESIONES PERSONALES',NULL,NULL),
 (2,'ATROPELLO CON SUBSECUENTE MUERTE INSTANTANEA',NULL,NULL),
 (3,'CHOQUE CON SUBSECUENTE CON LESIONES PERSONALES',NULL,NULL),
 (4,'DESPISTE CON SUBSECUENTE CON LESIONES PERSONALES',NULL,NULL),
 (5,'VOLCADURA CON SUBSUCUENTE CON LESIONES PERSONALES',NULL,NULL);
/*!40000 ALTER TABLE `type_accidents` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code_user` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `job_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_birth` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_residence` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode_user` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_user` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_company` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry_company` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_company` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_company` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_company` tinyint(4) NOT NULL,
  `zipcode_company` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_company` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_user` tinyint(1) NOT NULL,
  `type_user` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`code_user`,`name`,`email`,`email_verified_at`,`password`,`two_factor_secret`,`two_factor_recovery_codes`,`job_user`,`country_birth`,`country_residence`,`city_user`,`zipcode_user`,`address_user`,`phone_user`,`code_company`,`user_company`,`industry_company`,`country_company`,`city_company`,`currency_company`,`tax_company`,`zipcode_company`,`address_company`,`phone_company`,`status_user`,`type_user`,`remember_token`,`current_team_id`,`profile_photo_path`,`created_at`,`updated_at`) VALUES 
 (1,'71873615','WILLIAM AVILA','william@retait.net',NULL,'$2y$10$kzC8LtavHNAlk7I4O4Ik9.0l62tM97qigVZBLDOZUefMFUTEdSNIa',NULL,NULL,'8','150','150',NULL,NULL,NULL,NULL,'10718736159','RETAIT SRL','35','150','LIMA','14',18,NULL,'JIRON PALMA DE MALLORCA 221, LA VICTORIA - LIMA',NULL,1,1,NULL,NULL,NULL,NULL,NULL),
 (2,'73462717','YAMILE ORTEGA','yamile@retait.net',NULL,'$2y$10$kzC8LtavHNAlk7I4O4Ik9.0l62tM97qigVZBLDOZUefMFUTEdSNIa',NULL,NULL,'8','150','150',NULL,NULL,NULL,NULL,'20603637683','SEGURVID SRL','25','150','HUANCAYO','14',18,NULL,'JIRÓN JULIO C. TELLO OF. 102',NULL,1,0,NULL,NULL,NULL,NULL,NULL),
 (3,'12345678','PAMELA ROMÁN','pamela@retait.net',NULL,'$2y$10$kzC8LtavHNAlk7I4O4Ik9.0l62tM97qigVZBLDOZUefMFUTEdSNIa',NULL,NULL,'11','150','150',NULL,NULL,NULL,NULL,'20603637683','SEGURVID SRL','25','150','HUANCAYO','14',18,NULL,'JIRÓN JULIO C. TELLO OF. 102',NULL,1,0,NULL,NULL,NULL,NULL,NULL),
 (4,'12345670','TESTITO','test@tes.comm',NULL,'$2y$10$dGS.2CeNjh5dTbXZB8hHiO9eII4/sbbRQwb0EQnPFPG42Yf2.9CdK',NULL,NULL,'7','15','15',NULL,NULL,NULL,NULL,NULL,'ktl','5','15',NULL,'9',7,NULL,NULL,NULL,1,1,NULL,NULL,NULL,'2023-01-22 20:19:12','2023-01-23 01:16:55');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


--
-- Definition of view `view_contract`
--

DROP TABLE IF EXISTS `view_contract`;
DROP VIEW IF EXISTS `view_contract`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_contract` AS select `us`.`id` AS `usid`,`us`.`name` AS `name`,`us`.`code_company` AS `code_company`,`us`.`user_company` AS `user_company`,`us`.`city_company` AS `city_company`,`us`.`address_company` AS `address_company`,`cu`.`id` AS `cuid`,`cu`.`code_customer` AS `code_customer`,`cu`.`name_customer` AS `name_customer`,`cu`.`country_customer` AS `country_customer`,`cu`.`city_customer` AS `city_customer`,`cu`.`address_customer` AS `address_customer`,`cu`.`mobile_customer` AS `mobile_customer`,`cu`.`phone_customer` AS `phone_customer`,`cu`.`email_customer` AS `email_customer`,`od`.`id` AS `odid`,`od`.`code_order` AS `code_order`,`od`.`date_order` AS `date_order`,`od`.`type_payment` AS `type_payment`,`od`.`cost_order` AS `cost_order`,`od`.`description_order` AS `description_order`,monthname(`od`.`date_accident`) AS `monthname`,`od`.`date_accident` AS `date_accident`,`od`.`time_accident` AS `time_accident`,`od`.`location_accident` AS `location_accident`,`od`.`code_partner` AS `code_partner`,`od`.`name_partner` AS `name_partner`,`od`.`phone_partner` AS `phone_partner`,`od`.`file_order` AS `file_order`,`od`.`status_order` AS `status_order`,`od`.`user_id` AS `user_id`,`od`.`typeaccident_id` AS `typeaccident_id`,`od`.`kin_id` AS `kin_id`,`od`.`company_id` AS `company_id`,`od`.`insurance_id` AS `insurance_id`,`od`.`customer_id` AS `customer_id`,`od`.`service_id` AS `service_id`,`co`.`id` AS `coid`,`co`.`name_company` AS `name_company`,`ir`.`id` AS `irid`,`ir`.`name_insurance` AS `name_insurance`,`se`.`id` AS `seid`,`se`.`name_service` AS `name_service`,`ta`.`id` AS `taid`,`ta`.`type_accident` AS `type_accident` from ((((((`users` `us` join `customers` `cu`) join `orders` `od`) join `companies` `co`) join `insurances` `ir`) join `services` `se`) join `type_accidents` `ta`) where ((`cu`.`id` = `od`.`customer_id`) and (`us`.`id` = `od`.`user_id`) and (`co`.`id` = `od`.`company_id`) and (`ir`.`id` = `od`.`insurance_id`) and (`se`.`id` = `od`.`service_id`) and (`ta`.`id` = `od`.`typeaccident_id`));

--
-- Definition of view `view_invoice`
--

DROP TABLE IF EXISTS `view_invoice`;
DROP VIEW IF EXISTS `view_invoice`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_invoice` AS select `us`.`id` AS `usid`,`us`.`name` AS `name`,`us`.`profile_photo_path` AS `profile_photo_path`,`cu`.`id` AS `cuid`,`cu`.`code_customer` AS `code_customer`,`cu`.`name_customer` AS `name_customer`,`cu`.`country_customer` AS `country_customer`,`cu`.`city_customer` AS `city_customer`,`cu`.`mobile_customer` AS `mobile_customer`,`od`.`id` AS `odid`,`od`.`code_order` AS `code_order`,`od`.`date_order` AS `date_order`,`od`.`cost_order` AS `cost_order`,`iv`.`id` AS `ivid`,`iv`.`code_invoice` AS `code_invoice`,month(`iv`.`date_invoice`) AS `month`,year(`iv`.`date_invoice`) AS `year`,`iv`.`date_invoice` AS `date_invoice`,`iv`.`subtotal_invoice` AS `subtotal_invoice`,`iv`.`discount_invoice` AS `discount_invoice`,`iv`.`tax_invoice` AS `tax_invoice`,`iv`.`total_invoice` AS `total_invoice`,`iv`.`deposit_invoice` AS `deposit_invoice`,`co`.`id` AS `coid`,`co`.`name_company` AS `name_company`,`se`.`id` AS `seid`,`se`.`code_service` AS `code_service`,`se`.`name_service` AS `name_service`,`ic`.`id` AS `icid`,`ic`.`name_insurance` AS `name_insurance`,`pa`.`id` AS `paid`,`pa`.`name_payment` AS `name_payment` from (((((((`users` `us` join `customers` `cu`) join `orders` `od`) join `invoices` `iv`) join `companies` `co`) join `services` `se`) join `insurances` `ic`) join `payments` `pa`) where ((`cu`.`id` = `od`.`customer_id`) and (`co`.`id` = `od`.`company_id`) and (`se`.`id` = `od`.`service_id`) and (`ic`.`id` = `od`.`insurance_id`) and (`od`.`id` = `iv`.`order_id`) and (`us`.`id` = `iv`.`user_id`) and (`pa`.`id` = `iv`.`payment_id`));

--
-- Definition of view `view_order`
--

DROP TABLE IF EXISTS `view_order`;
DROP VIEW IF EXISTS `view_order`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_order` AS select `cu`.`id` AS `cuid`,`cu`.`code_customer` AS `code_customer`,`cu`.`name_customer` AS `name_customer`,`cu`.`country_customer` AS `country_customer`,`cu`.`city_customer` AS `city_customer`,`cu`.`address_customer` AS `address_customer`,`cu`.`mobile_customer` AS `mobile_customer`,`cu`.`phone_customer` AS `phone_customer`,`cu`.`email_customer` AS `email_customer`,`od`.`id` AS `odid`,`od`.`code_order` AS `code_order`,`od`.`date_order` AS `date_order`,`od`.`type_payment` AS `type_payment`,`od`.`cost_order` AS `cost_order`,`od`.`description_order` AS `description_order`,`od`.`date_accident` AS `date_accident`,`od`.`location_accident` AS `location_accident`,`od`.`code_partner` AS `code_partner`,`od`.`name_partner` AS `name_partner`,`od`.`phone_partner` AS `phone_partner`,`od`.`file_order` AS `file_order`,`od`.`status_order` AS `status_order`,`od`.`user_id` AS `user_id`,`od`.`typeaccident_id` AS `typeaccident_id`,`od`.`kin_id` AS `kin_id`,`od`.`company_id` AS `company_id`,`od`.`insurance_id` AS `insurance_id`,`od`.`customer_id` AS `customer_id`,`od`.`service_id` AS `service_id`,`co`.`id` AS `coid`,`co`.`name_company` AS `name_company`,`ir`.`id` AS `irid`,`ir`.`name_insurance` AS `name_insurance`,`se`.`id` AS `seid`,`se`.`name_service` AS `name_service` from ((((`customers` `cu` join `orders` `od`) join `companies` `co`) join `insurances` `ir`) join `services` `se`) where ((`cu`.`id` = `od`.`customer_id`) and (`co`.`id` = `od`.`company_id`) and (`ir`.`id` = `od`.`insurance_id`) and (`se`.`id` = `od`.`service_id`));



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
