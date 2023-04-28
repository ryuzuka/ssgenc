-- --------------------------------------------------------
-- 호스트:                          127.0.0.1
-- 서버 버전:                        10.4.22-MariaDB - mariadb.org binary distribution
-- 서버 OS:                        Win64
-- HeidiSQL 버전:                  11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- ssgenc 데이터베이스 구조 내보내기
DROP DATABASE IF EXISTS `ssgenc`;
CREATE DATABASE IF NOT EXISTS `ssgenc` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `ssgenc`;

-- 테이블 ssgenc.accesses 구조 내보내기
DROP TABLE IF EXISTS `accesses`;
CREATE TABLE IF NOT EXISTS `accesses` (
  `access_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `menu_id` bigint(20) NOT NULL,
  `access_nm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `useflag` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`access_id`,`menu_id`) USING BTREE,
  KEY `access_nm` (`access_nm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.accesses:~42 rows (대략적) 내보내기
/*!40000 ALTER TABLE `accesses` DISABLE KEYS */;
INSERT INTO `accesses` (`access_id`, `menu_id`, `access_nm`, `created_at`, `updated_at`, `useflag`) VALUES
	(1, 1, 'test_1', '2022-02-23 08:48:32', '2022-02-24 06:25:14', 'Y'),
	(1, 2, 'test_1', '2022-02-23 08:48:32', '2022-02-24 06:25:14', 'Y'),
	(1, 3, 'test_1', '2022-02-23 08:48:32', '2022-02-24 06:25:14', 'Y'),
	(1, 4, 'test_1', '2022-02-23 08:48:32', '2022-02-24 06:25:14', 'Y'),
	(1, 5, 'test_1', '2022-02-23 08:48:32', '2022-02-24 06:25:14', 'Y'),
	(1, 6, 'test_1', '2022-02-23 08:48:32', '2022-02-24 06:25:14', 'N'),
	(1, 7, 'test_1', '2022-02-23 08:48:32', '2022-02-24 06:25:14', 'N'),
	(1, 8, 'test_1', '2022-02-23 08:48:32', '2022-02-24 06:25:14', 'N'),
	(1, 9, 'test_1', '2022-02-23 08:48:32', '2022-02-24 06:25:14', 'N'),
	(1, 10, 'test_1', '2022-02-23 08:48:32', '2022-02-24 06:25:14', 'N'),
	(1, 11, 'test_1', '2022-02-23 08:48:32', '2022-02-24 06:25:14', 'N'),
	(1, 12, 'test_1', '2022-02-23 08:48:32', '2022-02-24 06:25:14', 'N'),
	(1, 13, 'test_1', '2022-02-23 08:48:32', '2022-02-24 06:25:14', 'N'),
	(1, 14, 'test_1', '2022-02-23 08:48:32', '2022-02-24 06:25:14', 'Y'),
	(1, 15, 'test_1', '2022-02-23 08:48:32', '2022-02-24 06:25:14', 'N'),
	(1, 16, 'test_1', '2022-02-23 08:48:32', '2022-02-24 06:25:14', 'N'),
	(1, 17, 'test_1', '2022-02-23 08:48:32', '2022-02-24 06:25:14', 'N'),
	(1, 18, 'test_1', '2022-02-23 08:48:32', '2022-02-24 06:25:14', 'N'),
	(1, 19, 'test_1', '2022-02-23 08:48:32', '2022-02-24 06:25:14', 'Y'),
	(1, 20, 'test_1', '2022-02-23 08:48:32', '2022-02-24 06:25:14', 'Y'),
	(1, 21, 'test_1', '2022-02-23 08:48:32', '2022-02-24 06:25:14', 'Y'),
	(2, 1, 'kdhong', '2022-02-24 07:52:40', '2022-02-24 07:52:40', 'Y'),
	(2, 2, 'kdhong', '2022-02-24 07:52:40', '2022-02-24 07:52:40', 'Y'),
	(2, 3, 'kdhong', '2022-02-24 07:52:40', '2022-02-24 07:52:40', 'Y'),
	(2, 4, 'kdhong', '2022-02-24 07:52:40', '2022-02-24 07:52:40', 'N'),
	(2, 5, 'kdhong', '2022-02-24 07:52:40', '2022-02-24 07:52:40', 'Y'),
	(2, 6, 'kdhong', '2022-02-24 07:52:40', '2022-02-24 07:52:40', 'N'),
	(2, 7, 'kdhong', '2022-02-24 07:52:40', '2022-02-24 07:52:40', 'N'),
	(2, 8, 'kdhong', '2022-02-24 07:52:40', '2022-02-24 07:52:40', 'N'),
	(2, 9, 'kdhong', '2022-02-24 07:52:40', '2022-02-24 07:52:40', 'N'),
	(2, 10, 'kdhong', '2022-02-24 07:52:40', '2022-02-24 07:52:40', 'N'),
	(2, 11, 'kdhong', '2022-02-24 07:52:40', '2022-02-24 07:52:40', 'N'),
	(2, 12, 'kdhong', '2022-02-24 07:52:40', '2022-02-24 07:52:40', 'N'),
	(2, 13, 'kdhong', '2022-02-24 07:52:40', '2022-02-24 07:52:40', 'N'),
	(2, 14, 'kdhong', '2022-02-24 07:52:40', '2022-02-24 07:52:40', 'Y'),
	(2, 15, 'kdhong', '2022-02-24 07:52:40', '2022-02-24 07:52:40', 'N'),
	(2, 16, 'kdhong', '2022-02-24 07:52:40', '2022-02-24 07:52:40', 'N'),
	(2, 17, 'kdhong', '2022-02-24 07:52:40', '2022-02-24 07:52:40', 'N'),
	(2, 18, 'kdhong', '2022-02-24 07:52:40', '2022-02-24 07:52:40', 'N'),
	(2, 19, 'kdhong', '2022-02-24 07:52:40', '2022-02-24 07:52:40', 'N'),
	(2, 20, 'kdhong', '2022-02-24 07:52:40', '2022-02-24 07:52:40', 'N'),
	(2, 21, 'kdhong', '2022-02-24 07:52:40', '2022-02-24 07:52:40', 'Y');
/*!40000 ALTER TABLE `accesses` ENABLE KEYS */;

-- 테이블 ssgenc.accesshistories 구조 내보내기
DROP TABLE IF EXISTS `accesshistories`;
CREATE TABLE IF NOT EXISTS `accesshistories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` bigint(20) NOT NULL,
  `access_id` bigint(20) NOT NULL,
  `reason` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.accesshistories:~21 rows (대략적) 내보내기
/*!40000 ALTER TABLE `accesshistories` DISABLE KEYS */;
INSERT INTO `accesshistories` (`id`, `menu_id`, `access_id`, `reason`, `approved_id`, `created_id`, `updated_id`, `created_at`, `updated_at`) VALUES
	(85, 1, 2, '홈페이지 운영', '관리자', NULL, NULL, '2022-02-24 07:52:40', '2022-02-24 07:52:40'),
	(86, 2, 2, '홈페이지 운영', '관리자', NULL, NULL, '2022-02-24 07:52:40', '2022-02-24 07:52:40'),
	(87, 3, 2, '홈페이지 운영', '관리자', NULL, NULL, '2022-02-24 07:52:40', '2022-02-24 07:52:40'),
	(88, 4, 2, '홈페이지 운영', '관리자', NULL, NULL, '2022-02-24 07:52:40', '2022-02-24 07:52:40'),
	(89, 5, 2, '홈페이지 운영', '관리자', NULL, NULL, '2022-02-24 07:52:40', '2022-02-24 07:52:40'),
	(90, 6, 2, '홈페이지 운영', '관리자', NULL, NULL, '2022-02-24 07:52:40', '2022-02-24 07:52:40'),
	(91, 7, 2, '홈페이지 운영', '관리자', NULL, NULL, '2022-02-24 07:52:40', '2022-02-24 07:52:40'),
	(92, 8, 2, '홈페이지 운영', '관리자', NULL, NULL, '2022-02-24 07:52:40', '2022-02-24 07:52:40'),
	(93, 9, 2, '홈페이지 운영', '관리자', NULL, NULL, '2022-02-24 07:52:40', '2022-02-24 07:52:40'),
	(94, 10, 2, '홈페이지 운영', '관리자', NULL, NULL, '2022-02-24 07:52:40', '2022-02-24 07:52:40'),
	(95, 11, 2, '홈페이지 운영', '관리자', NULL, NULL, '2022-02-24 07:52:40', '2022-02-24 07:52:40'),
	(96, 12, 2, '홈페이지 운영', '관리자', NULL, NULL, '2022-02-24 07:52:40', '2022-02-24 07:52:40'),
	(97, 13, 2, '홈페이지 운영', '관리자', NULL, NULL, '2022-02-24 07:52:40', '2022-02-24 07:52:40'),
	(98, 14, 2, '홈페이지 운영', '관리자', NULL, NULL, '2022-02-24 07:52:40', '2022-02-24 07:52:40'),
	(99, 15, 2, '홈페이지 운영', '관리자', NULL, NULL, '2022-02-24 07:52:40', '2022-02-24 07:52:40'),
	(100, 16, 2, '홈페이지 운영', '관리자', NULL, NULL, '2022-02-24 07:52:40', '2022-02-24 07:52:40'),
	(101, 17, 2, '홈페이지 운영', '관리자', NULL, NULL, '2022-02-24 07:52:40', '2022-02-24 07:52:40'),
	(102, 18, 2, '홈페이지 운영', '관리자', NULL, NULL, '2022-02-24 07:52:40', '2022-02-24 07:52:40'),
	(103, 19, 2, '홈페이지 운영', '관리자', NULL, NULL, '2022-02-24 07:52:40', '2022-02-24 07:52:40'),
	(104, 20, 2, '홈페이지 운영', '관리자', NULL, NULL, '2022-02-24 07:52:40', '2022-02-24 07:52:40'),
	(105, 21, 2, '홈페이지 운영', '관리자', NULL, NULL, '2022-02-24 07:52:40', '2022-02-24 07:52:40');
/*!40000 ALTER TABLE `accesshistories` ENABLE KEYS */;

-- 테이블 ssgenc.awards 구조 내보내기
DROP TABLE IF EXISTS `awards`;
CREATE TABLE IF NOT EXISTS `awards` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gubun` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency_ko` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency_en` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_ko` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_en` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expo_yn` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attach_id` int(11) NOT NULL,
  `created_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.awards:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `awards` DISABLE KEYS */;
/*!40000 ALTER TABLE `awards` ENABLE KEYS */;

-- 테이블 ssgenc.codegroups 구조 내보내기
DROP TABLE IF EXISTS `codegroups`;
CREATE TABLE IF NOT EXISTS `codegroups` (
  `codegroup_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codegroup_nm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `useflag` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`codegroup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.codegroups:~25 rows (대략적) 내보내기
/*!40000 ALTER TABLE `codegroups` DISABLE KEYS */;
INSERT INTO `codegroups` (`codegroup_id`, `codegroup_nm`, `remark`, `useflag`, `created_at`, `updated_at`) VALUES
	('agree_yn', '동의여부', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('area', '지역', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('bf_gubun', '건축시설구분', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('biz_area', '사업분야', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('boards', '게시판관리', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('cf_gubun', '토목시설구분', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('contrib', '사회공헌분류', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('custsvc', '고객상담구분', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('custsvc_typ', '고객상담유형', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('employs', '채용공고구분', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('expo_yn', '노출여부', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('lang', '언어', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('lb_gubu', '레저사업구분', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('main_yn', '메인여부', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('msg_acc', '메시지관리구좌', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('news_gubun', '뉴스구분', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('open_yn', '공개여부', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('post_gubun', '공시관리구분', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('projects', '프로젝트관리', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('reg_month', '등록개월', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('reply_flag', '고객상담답변여부', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('rf_gubun', '주거시설구분', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('sites', '사이트관리', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('states', '상태', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38'),
	('tipoffs', '제보관리구분', '', 'Y', '2021-12-25 15:09:38', '2021-12-25 15:09:38');
/*!40000 ALTER TABLE `codegroups` ENABLE KEYS */;

-- 테이블 ssgenc.codes 구조 내보내기
DROP TABLE IF EXISTS `codes`;
CREATE TABLE IF NOT EXISTS `codes` (
  `code_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codegroup_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_nm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_nm_en` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `useflag` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`code_id`,`codegroup_id`),
  KEY `codes_code_id_index` (`code_id`),
  KEY `codes_codegroup_id_index` (`codegroup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.codes:~134 rows (대략적) 내보내기
/*!40000 ALTER TABLE `codes` DISABLE KEYS */;
INSERT INTO `codes` (`code_id`, `codegroup_id`, `code_nm`, `code_nm_en`, `useflag`, `view`, `created_at`, `updated_at`) VALUES
	('00', 'bf_gubun', '구분', '', 'N', 'N', '2021-12-30 13:34:22', '2021-12-30 13:34:22'),
	('00', 'cf_gubun', '구분', '', 'N', 'N', '2022-02-03 13:34:20', '2022-02-03 13:34:20'),
	('00', 'commit_type', '전체', '', 'Y', 'Y', '2022-02-03 13:34:20', '2022-02-03 13:34:20'),
	('00', 'contrib', '전체', '', 'Y', 'N', '2022-02-03 13:34:20', '2022-02-03 13:34:20'),
	('00', 'custsvc', '전체', 'All', 'Y', 'Y', '2021-12-30 13:34:25', '2021-12-30 13:34:25'),
	('00', 'lb_gubun', '구분', '', 'N', 'N', '2022-02-03 13:34:20', '2022-02-03 13:34:20'),
	('00', 'msg_acc', '전체', 'All', 'Y', 'N', '2021-12-30 13:34:26', '2021-12-30 13:34:26'),
	('00', 'tipoffs', '전체', 'All', 'Y', 'Y', '2021-12-30 13:34:25', '2021-12-30 13:34:25'),
	('00', 'user_find_key', '전체', '', 'Y', 'Y', '2022-02-03 13:34:20', '2022-02-03 13:34:20'),
	('01', 'area', '전체', '', 'Y', 'N', '2021-12-30 13:34:21', '2021-12-30 13:34:21'),
	('01', 'bf_gubun', '전체', 'View all', 'Y', 'N', '2021-12-30 13:34:22', '2021-12-30 13:34:22'),
	('01', 'biz_area', '전체', '', 'Y', 'N', '2021-12-30 13:34:21', '2021-12-30 13:34:21'),
	('01', 'boards', '이사회 진행사항 관리', '', 'Y', 'Y', '2021-12-30 13:34:26', '2021-12-30 13:34:26'),
	('01', 'cf_gubun', '전체', 'View all', 'Y', 'N', '2022-02-03 13:34:20', '2022-02-03 13:34:20'),
	('01', 'commit_type', '사외이사', '', 'Y', 'Y', '2022-02-03 13:34:20', '2022-02-03 13:34:20'),
	('01', 'committee', '윤명규', '', 'Y', 'Y', '2022-03-03 13:34:20', '2022-03-03 13:34:20'),
	('01', 'contrib', '희망배달 캠페인', '', 'Y', 'Y', '2021-12-30 13:34:23', '2021-12-30 13:34:23'),
	('01', 'custsvc', '분양/계약', 'Sales/Contract', 'Y', 'Y', '2021-12-30 13:34:25', '2021-12-30 13:34:25'),
	('01', 'custsvc_typ', '고객상담', '', 'Y', 'Y', '2021-12-30 13:34:24', '2021-12-30 13:34:24'),
	('01', 'employs', '상반기', '', 'Y', 'Y', '2021-12-30 13:34:24', '2021-12-30 13:34:24'),
	('01', 'lang', '국문', '', 'Y', 'Y', '2021-12-30 13:34:23', '2021-12-30 13:34:23'),
	('01', 'lb_gubun', '전체', 'View all', 'Y', 'N', '2022-02-03 13:34:20', '2022-02-03 13:34:20'),
	('01', 'msg_acc', '1구좌(오전 6시-오후 12시)', '', 'Y', 'Y', '2021-12-30 13:34:26', '2021-12-30 13:34:26'),
	('01', 'news_gubun', '전체', '', 'Y', 'N', '2021-12-30 13:34:23', '2021-12-30 13:34:23'),
	('01', 'open_yn', '전체', '', 'Y', 'Y', '2021-12-30 13:34:22', '2021-12-30 13:34:22'),
	('01', 'post_gubun', '결산공시', '', 'Y', 'Y', '2021-12-30 13:34:23', '2021-12-30 13:34:23'),
	('01', 'projects', '프로젝트 관리', '', 'Y', 'Y', '2021-12-30 13:34:26', '2021-12-30 13:34:26'),
	('01', 'reg_month', '3개월', '', 'Y', 'Y', '2021-12-30 13:34:23', '2021-12-30 13:34:23'),
	('01', 'reply_flag', '답변완료', '', 'Y', 'Y', '2021-12-30 13:34:25', '2021-12-30 13:34:25'),
	('01', 'rf_gubun', '전체', 'View all', 'Y', 'N', '2021-12-30 13:34:21', '2021-12-30 13:34:21'),
	('01', 'sites', '메인 키비주얼/메시지 관리', '', 'Y', 'Y', '2021-12-30 13:34:27', '2021-12-30 13:34:27'),
	('01', 'tipoffs', '윤리경영위반', '', 'Y', 'Y', '2021-12-30 13:34:25', '2021-12-30 13:34:25'),
	('01', 'user_find_key', '아이디', '', 'Y', 'Y', '2022-02-03 13:34:20', '2022-02-03 13:34:20'),
	('01', 'user_type', '관리자', '', 'Y', 'Y', '2022-02-03 13:34:20', '2022-02-03 13:34:20'),
	('01', 'vote_st', '가결', '', 'Y', 'Y', '2022-02-03 13:34:20', '2022-02-03 13:34:20'),
	('02', 'area', '서울', '', 'Y', 'Y', '2021-12-30 13:34:21', '2021-12-30 13:34:21'),
	('02', 'bf_gubun', '상업시설', 'Commercial facility', 'Y', 'Y', '2021-12-30 13:34:22', '2021-12-30 13:34:22'),
	('02', 'biz_area', '주거시설', '', 'Y', 'Y', '2021-12-30 13:34:21', '2021-12-30 13:34:21'),
	('02', 'boards', '위원회 운영내역 관리', '', 'Y', 'Y', '2021-12-30 13:34:26', '2021-12-30 13:34:26'),
	('02', 'cf_gubun', '도로철도항만', 'Road·railroad·port', 'Y', 'Y', '2021-12-30 13:34:22', '2021-12-30 13:34:22'),
	('02', 'commit_type', '후보추천위원회', '', 'Y', 'Y', '2022-02-03 13:34:20', '2022-02-03 13:34:20'),
	('02', 'committee', '정두영', '', 'Y', 'Y', '2022-03-03 13:34:20', '2022-03-03 13:34:20'),
	('02', 'contrib', '취약계층 지원', '', 'Y', 'Y', '2021-12-30 13:34:23', '2021-12-30 13:34:23'),
	('02', 'custsvc', 'AS/하자', 'AS/Flaw', 'Y', 'Y', '2021-12-30 13:34:25', '2021-12-30 13:34:25'),
	('02', 'custsvc_typ', '제보', '', 'Y', 'Y', '2021-12-30 13:34:24', '2021-12-30 13:34:24'),
	('02', 'employs', '하반기', '', 'Y', 'Y', '2021-12-30 13:34:24', '2021-12-30 13:34:24'),
	('02', 'lang', '영문', '', 'Y', 'Y', '2021-12-30 13:34:23', '2021-12-30 13:34:23'),
	('02', 'lb_gubun', '골프장', 'Golf club', 'Y', 'Y', '2021-12-30 13:34:22', '2021-12-30 13:34:22'),
	('02', 'msg_acc', '2구좌(오후 12시-오후 6시)', '', 'Y', 'Y', '2021-12-30 13:34:26', '2021-12-30 13:34:26'),
	('02', 'news_gubun', '뉴스', '', 'Y', 'Y', '2021-12-30 13:34:23', '2021-12-30 13:34:23'),
	('02', 'open_yn', '국문', '', 'Y', 'Y', '2021-12-30 13:34:22', '2021-12-30 13:34:22'),
	('02', 'post_gubun', '주주총회공시', '', 'Y', 'Y', '2021-12-30 13:34:23', '2021-12-30 13:34:23'),
	('02', 'projects', '프로젝트 실적 관리', '', 'Y', 'Y', '2021-12-30 13:34:26', '2021-12-30 13:34:26'),
	('02', 'reg_month', '6개월', '', 'Y', 'Y', '2021-12-30 13:34:23', '2021-12-30 13:34:23'),
	('02', 'reply_flag', '답변 준비중', '', 'Y', 'Y', '2021-12-30 13:34:25', '2021-12-30 13:34:25'),
	('02', 'rf_gubun', '아파트', 'Apartment', 'Y', 'Y', '2021-12-30 13:34:21', '2021-12-30 13:34:21'),
	('02', 'sites', '정보관리', '', 'Y', 'Y', '2021-12-30 13:34:27', '2021-12-30 13:34:27'),
	('02', 'tipoffs', '직장 내 성희롱.성폭력', '', 'Y', 'Y', '2021-12-30 13:34:25', '2021-12-30 13:34:25'),
	('02', 'user_find_key', '이름', '', 'Y', 'Y', '2022-02-03 13:34:20', '2022-02-03 13:34:20'),
	('02', 'user_type', '사용자', '', 'Y', 'Y', '2022-02-03 13:34:20', '2022-02-03 13:34:20'),
	('02', 'vote_st', '부결', '', 'Y', 'Y', '2022-02-03 13:34:20', '2022-02-03 13:34:20'),
	('03', 'area', '경기', '', 'Y', 'Y', '2021-12-30 13:34:21', '2021-12-30 13:34:21'),
	('03', 'bf_gubun', '물류플랜트', 'Logistics plants', 'Y', 'Y', '2021-12-30 13:34:22', '2021-12-30 13:34:22'),
	('03', 'biz_area', '건축시설', '', 'Y', 'Y', '2021-12-30 13:34:21', '2021-12-30 13:34:21'),
	('03', 'boards', '뉴스 관리', '', 'Y', 'Y', '2021-12-30 13:34:26', '2021-12-30 13:34:26'),
	('03', 'cf_gubun', '환경에너지사업', 'Environment and energy projects', 'Y', 'Y', '2021-12-30 13:34:22', '2021-12-30 13:34:22'),
	('03', 'commit_type', '감사위원회', '', 'Y', 'Y', '2022-02-03 13:34:20', '2022-02-03 13:34:20'),
	('03', 'committee', '김정선', '', 'Y', 'Y', '2022-03-03 13:34:20', '2022-03-03 13:34:20'),
	('03', 'contrib', '지역사회공헌', '', 'Y', 'Y', '2021-12-30 13:34:23', '2021-12-30 13:34:23'),
	('03', 'custsvc', '수주상담', 'Order consultation', 'Y', 'Y', '2021-12-30 13:34:25', '2021-12-30 13:34:25'),
	('03', 'employs', '수시채용', '', 'Y', 'Y', '2021-12-30 13:34:24', '2021-12-30 13:34:24'),
	('03', 'lb_gubun', '아쿠아필드', 'Entertainment', 'Y', 'Y', '2021-12-30 13:34:22', '2021-12-30 13:34:22'),
	('03', 'msg_acc', '3구좌(오후 6시 ~)', '', 'Y', 'Y', '2021-12-30 13:34:26', '2021-12-30 13:34:26'),
	('03', 'news_gubun', '공지', '', 'Y', 'Y', '2021-12-30 13:34:23', '2021-12-30 13:34:23'),
	('03', 'open_yn', '영문', '', 'Y', 'Y', '2021-12-30 13:34:22', '2021-12-30 13:34:22'),
	('03', 'reg_month', '12개월', '', 'Y', 'Y', '2021-12-30 13:34:23', '2021-12-30 13:34:23'),
	('03', 'reply_flag', '통보완료', '', 'Y', 'Y', '2021-12-30 13:34:25', '2021-12-30 13:34:25'),
	('03', 'rf_gubun', '주상복합', 'Residential and commercial complex', 'Y', 'Y', '2021-12-30 13:34:21', '2021-12-30 13:34:21'),
	('03', 'sites', '메인 팝업 관리', '', 'Y', 'Y', '2021-12-30 13:34:28', '2021-12-30 13:34:28'),
	('03', 'tipoffs', '애로/개선사항', '', 'Y', 'Y', '2021-12-30 13:34:25', '2021-12-30 13:34:25'),
	('03', 'vote_st', '보고', '', 'Y', 'Y', '2022-02-03 13:34:20', '2022-02-03 13:34:20'),
	('04', 'area', '강원', '', 'Y', 'Y', '2021-12-30 13:34:21', '2021-12-30 13:34:21'),
	('04', 'bf_gubun', '교육업무시설', 'Education facility', 'Y', 'Y', '2021-12-30 13:34:22', '2021-12-30 13:34:22'),
	('04', 'biz_area', '토목시설', '', 'Y', 'Y', '2021-12-30 13:34:21', '2021-12-30 13:34:21'),
	('04', 'boards', '실적보고서 관리', '', 'Y', 'Y', '2021-12-30 13:34:26', '2021-12-30 13:34:26'),
	('04', 'cf_gubun', '기타', 'Others', 'Y', 'Y', '2021-12-30 13:34:22', '2021-12-30 13:34:22'),
	('04', 'commit_type', '내부거래위원회', '', 'Y', 'Y', '2022-02-03 13:34:20', '2022-02-03 13:34:20'),
	('04', 'committee', '최진구', '', 'Y', 'Y', '2022-03-03 13:34:20', '2022-03-03 13:34:20'),
	('04', 'contrib', '교육.학교.학술', '', 'Y', 'Y', '2021-12-30 13:34:24', '2021-12-30 13:34:24'),
	('04', 'custsvc', '협력회사', 'Business partners', 'Y', 'Y', '2021-12-30 13:34:25', '2021-12-30 13:34:25'),
	('04', 'lb_gubun', '기타', 'Others', 'Y', 'Y', '2021-12-30 13:34:22', '2021-12-30 13:34:22'),
	('04', 'news_gubun', '영상', '', 'Y', 'Y', '2021-12-30 13:34:23', '2021-12-30 13:34:23'),
	('04', 'open_yn', '비공개', '', 'Y', 'Y', '2021-12-30 13:34:22', '2021-12-30 13:34:22'),
	('04', 'reply_flag', '통보대기', '', 'Y', 'Y', '2021-12-30 13:34:25', '2021-12-30 13:34:25'),
	('04', 'rf_gubun', '오피스텔', 'Office Hotel', 'Y', 'Y', '2021-12-30 13:34:21', '2021-12-30 13:34:21'),
	('04', 'tipoffs', '아이디어개선', '', 'Y', 'Y', '2021-12-30 13:34:25', '2021-12-30 13:34:25'),
	('05', 'area', '충청', '', 'Y', 'Y', '2021-12-30 13:34:21', '2021-12-30 13:34:21'),
	('05', 'bf_gubun', '호텔리조트', 'Hotel resorts', 'Y', 'Y', '2021-12-30 13:34:22', '2021-12-30 13:34:22'),
	('05', 'biz_area', '레저사업', '', 'Y', 'Y', '2021-12-30 13:34:21', '2021-12-30 13:34:21'),
	('05', 'boards', 'ESG 공시관리', '', 'Y', 'Y', '2021-12-30 13:34:27', '2021-12-30 13:34:27'),
	('05', 'commit_type', 'ESG위원회', '', 'Y', 'Y', '2022-02-03 13:34:20', '2022-02-03 13:34:20'),
	('05', 'committee', '조주현', '', 'Y', 'Y', '2022-03-03 13:34:20', '2022-03-03 13:34:20'),
	('05', 'contrib', '문화재 지킴이 활동', '', 'Y', 'Y', '2021-12-30 13:34:24', '2021-12-30 13:34:24'),
	('05', 'custsvc', '일반문의', '', 'Y', 'Y', '2021-12-30 13:34:25', '2021-12-30 13:34:25'),
	('05', 'reply_flag', '불필요', '', 'Y', 'Y', '2021-12-30 13:34:25', '2021-12-30 13:34:25'),
	('05', 'rf_gubun', '생활숙박시설', 'Residente', 'Y', 'Y', '2021-12-30 13:34:21', '2021-12-30 13:34:21'),
	('06', 'area', '전라', '', 'Y', 'Y', '2021-12-30 13:34:21', '2021-12-30 13:34:21'),
	('06', 'bf_gubun', '기타', 'Others', 'Y', 'Y', '2021-12-30 13:34:22', '2021-12-30 13:34:22'),
	('06', 'boards', '공시 관리', '', 'Y', 'Y', '2021-12-30 13:34:27', '2021-12-30 13:34:27'),
	('06', 'committee', '정인창', '', 'Y', 'Y', '2022-03-03 13:34:20', '2022-03-03 13:34:20'),
	('06', 'contrib', '친환경캠페인', '', 'Y', 'Y', '2021-12-30 13:34:24', '2021-12-30 13:34:24'),
	('06', 'rf_gubun', '기타', 'Etc', 'Y', 'Y', '2021-12-30 13:34:21', '2021-12-30 13:34:21'),
	('07', 'area', '경상', '', 'Y', 'Y', '2021-12-30 13:34:21', '2021-12-30 13:34:21'),
	('07', 'boards', '수상실적 관리', '', 'Y', 'Y', '2021-12-30 13:34:27', '2021-12-30 13:34:27'),
	('07', 'contrib', '문화예술 후원', '', 'Y', 'Y', '2021-12-30 13:34:24', '2021-12-30 13:34:24'),
	('08', 'area', '제주', '', 'Y', 'Y', '2021-12-30 13:34:21', '2021-12-30 13:34:21'),
	('08', 'boards', '사회공헌 관리', '', 'Y', 'Y', '2021-12-30 13:34:27', '2021-12-30 13:34:27'),
	('08', 'contrib', '희망나눔 프로젝트', '', 'Y', 'Y', '2021-12-30 13:34:24', '2021-12-30 13:34:24'),
	('09', 'area', '해외기타', '', 'Y', 'Y', '2021-12-30 13:34:21', '2021-12-30 13:34:21'),
	('09', 'boards', '직무소개 관리', '', 'Y', 'Y', '2021-12-30 13:34:27', '2021-12-30 13:34:27'),
	('09', 'contrib', '기타활동', '', 'Y', 'Y', '2021-12-30 13:34:24', '2021-12-30 13:34:24'),
	('10', 'boards', '채용공고 관리', '', 'Y', 'Y', '2021-12-30 13:34:27', '2021-12-30 13:34:27'),
	('11', 'boards', '제보 관리', '', 'Y', 'Y', '2021-12-30 13:34:27', '2021-12-30 13:34:27'),
	('A', 'agree_yn', 'N/A', '', 'Y', 'Y', '2021-12-30 13:34:23', '2021-12-30 13:34:23'),
	('N', 'agree_yn', '반대', '', 'Y', 'Y', '2021-12-30 13:34:23', '2021-12-30 13:34:23'),
	('N', 'expo_yn', 'N', '', 'Y', 'Y', '2021-12-30 13:34:23', '2021-12-30 13:34:23'),
	('N', 'main_yn', '해제', '', 'Y', 'Y', '2021-12-30 13:34:22', '2021-12-30 13:34:22'),
	('N', 'shortcut_expo_yn', '버튼 미노출', '', 'Y', 'Y', '2021-12-30 13:34:23', '2021-12-30 13:34:23'),
	('N', 'states', '중지', '', 'Y', 'Y', '2021-12-30 13:34:28', '2021-12-30 13:34:28'),
	('Y', 'agree_yn', '찬성', '', 'Y', 'Y', '2021-12-30 13:34:22', '2021-12-30 13:34:22'),
	('Y', 'expo_yn', 'Y', '', 'Y', 'Y', '2021-12-30 13:34:23', '2021-12-30 13:34:23'),
	('Y', 'main_yn', '지정', '', 'Y', 'Y', '2021-12-30 13:34:22', '2021-12-30 13:34:22'),
	('Y', 'shortcut_expo_yn', '버튼 노출', '', 'Y', 'Y', '2021-12-30 13:34:23', '2021-12-30 13:34:23'),
	('Y', 'states', '사용', '', 'Y', 'Y', '2021-12-30 13:34:28', '2021-12-30 13:34:28');
/*!40000 ALTER TABLE `codes` ENABLE KEYS */;

-- 테이블 ssgenc.committees 구조 내보내기
DROP TABLE IF EXISTS `committees`;
CREATE TABLE IF NOT EXISTS `committees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `commit_type` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hold_at` date NOT NULL,
  `vote_st` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_a_nm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_a_yn` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_b_nm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_b_yn` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_c_nm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_c_yn` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_d_nm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_d_yn` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 ssgenc.contributions 구조 내보내기
DROP TABLE IF EXISTS `contributions`;
CREATE TABLE IF NOT EXISTS `contributions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contrib` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_ko` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_en` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_ko` varchar(3000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_en` varchar(3000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expo_yn` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attach_id` int(11) NOT NULL,
  `created_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.contributions:~7 rows (대략적) 내보내기
/*!40000 ALTER TABLE `contributions` DISABLE KEYS */;
INSERT INTO `contributions` (`id`, `contrib`, `subject_ko`, `subject_en`, `content_ko`, `content_en`, `expo_yn`, `attach_id`, `created_id`, `updated_id`, `created_at`, `updated_at`) VALUES
	(1, '01', '희망장난감도서관', '희망장난감도서관', '희망장난감도서관 리모델링은 지난 2014년부터 진행항 신세계건설 사업의 특성이 반영된 당사의 대표적인 사회공헌활동입니다.\n 초록우산 어린이재단과의 협약을 통해 지역의 어린이 도서관 중 노후화되거나 시설이 낙후된 곳을 보수하고 장난감과 어린이 도서를 기증하는 프로그램입니다.\n 이는 지역 어린이들의 희망을 채워주는 활동이며, 현재까지 서울, 대전, 전주, 광주, 대구, 울산, 제주 등 전국 24개 지역 30여개소에 달합니다.', '희망장난감도서관 리모델링은 지난 2014년부터 진행항 신세계건설 사업의 특성이 반영된 당사의 대표적인 사회공헌활동입니다.\n 초록우산 어린이재단과의 협약을 통해 지역의 어린이 도서관 중 노후화되거나 시설이 낙후된 곳을 보수하고 장난감과 어린이 도서를 기증하는 프로그램입니다.\n 이는 지역 어린이들의 희망을 채워주는 활동이며, 현재까지 서울, 대전, 전주, 광주, 대구, 울산, 제주 등 전국 24개 지역 30여개소에 달합니다.', 'Y', 7, NULL, NULL, '2022-02-15 00:00:00', '2022-02-15 06:26:02'),
	(2, '02', '사랑의', '사랑의', '사랑의 집수리 사업은 저소득 취약계층의 주거환경 개선을 위해 신세계건설이 지원하고 있는 프로그램입니다. 집수리 사업은 대구시와 하남시 등 지자체와 당사간의\n 민관협력 프로젝트로 신세계건설은 주거형편이 어려운 시민의 아픔과 기쁨을 함께 나누는 활동을 전개하고 있습니다.', '사랑의 집수리 사업은 저소득 취약계층의 주거환경 개선을 위해 신세계건설이 지원하고 있는 프로그램입니다. 집수리 사업은 대구시와 하남시 등 지자체와 당사간의\n 민관협력 프로젝트로 신세계건설은 주거형편이 어려운 시민의 아픔과 기쁨을 함께 나누는 활동을 전개하고 있습니다.', 'Y', 8, NULL, NULL, '2022-02-15 00:00:00', '2022-02-15 06:27:28'),
	(3, '03', '하남시', '하남시', '아하(아무거나 하남)\'는 하남시에서 청소년 문화놀이터 구축을 위한 사업입니다. 신세계건설은 하남시, 하남시의회, 하남시청소년수련관 등과의 협약을 통해 하남시 청소년들의\n 미래를 만들어가는데 이바지하고 있습니다.', '아하(아무거나 하남)\'는 하남시에서 청소년 문화놀이터 구축을 위한 사업입니다. 신세계건설은 하남시, 하남시의회, 하남시청소년수련관 등과의 협약을 통해 하남시 청소년들의\n 미래를 만들어가는데 이바지하고 있습니다.', 'Y', 9, NULL, NULL, '2022-02-15 00:00:00', '2022-02-15 07:53:33'),
	(4, '02', '청소년', '청소년', '중, 고등학교 진학을 앞둔 저소득층 가정 청소년들에게 학용품 및 부교재를 제공함으로써, 활기찬 새학기를 맞이할 수 있도록 지원합니다. 또한 보호종료 청소년들에게 자기 계발\n 기회를 제공하고 안정적인 사회 자립을 도모할 수 있도록 지원 활동을 하고 있습니다.', '중, 고등학교 진학을 앞둔 저소득층 가정 청소년들에게 학용품 및 부교재를 제공함으로써, 활기찬 새학기를 맞이할 수 있도록 지원합니다. 또한 보호종료 청소년들에게 자기 계발\n 기회를 제공하고 안정적인 사회 자립을 도모할 수 있도록 지원 활동을 하고 있습니다.', 'Y', 10, NULL, NULL, '2022-02-15 00:00:00', '2022-02-15 07:54:17'),
	(5, '02', '취약계층', '취약계층', '신세계건설은 회사 인근 사회복지시설을 통해 지역사회에 도움이 되고자 지속적인 봉사활동을 진행하고 있습니다. 서울시 중구자원봉사센터와의 협약을 맺은 당사는 관내\n 독거노인 어르신들 반찬 만들기, 경로당 정화활동 등 취약계층 지원을 통해 어려움을 겪고 있는 지역주민에게 조금이나마 보탬이 되고자 노력하고 있습니다.', '신세계건설은 회사 인근 사회복지시설을 통해 지역사회에 도움이 되고자 지속적인 봉사활동을 진행하고 있습니다. 서울시 중구자원봉사센터와의 협약을 맺은 당사는 관내\n 독거노인 어르신들 반찬 만들기, 경로당 정화활동 등 취약계층 지원을 통해 어려움을 겪고 있는 지역주민에게 조금이나마 보탬이 되고자 노력하고 있습니다.', 'Y', 11, NULL, NULL, '2022-02-15 00:00:00', '2022-02-15 07:55:01'),
	(6, '05', '문화재 지킴이 활동', '문화재 지킴이 활동', '문화재 지킴이 활동은 역사･문화적으로 의미 있는 문화재를 대상으로 시설 및 환경정비를 진행하는 활동으로, 특히 임직원 가족 참여 행사로 운영하고 있습니다.\n 창경궁 정원 가꾸기, 성균관 문묘 지킴이 등을 통해 문화재 보존활동의 중요성을 가족과 함께 확인할 수 있는 활동입니다.', '문화재 지킴이 활동은 역사･문화적으로 의미 있는 문화재를 대상으로 시설 및 환경정비를 진행하는 활동으로, 특히 임직원 가족 참여 행사로 운영하고 있습니다.\n 창경궁 정원 가꾸기, 성균관 문묘 지킴이 등을 통해 문화재 보존활동의 중요성을 가족과 함께 확인할 수 있는 활동입니다.', 'Y', 0, NULL, NULL, '2022-02-15 00:00:00', '2022-02-15 02:53:37'),
	(7, '06', '친환경 캠페인', '친환경 캠페인', '신세계건설은 친환경 캠페인의 일환으로 하남시 나무고아원 \'유아숲체험장\'에 나무심기 봉사활동을 펼쳤습니다. 하남 나무고아원은 도시개발로 인해 옮겨진 1만5천여본의 나무가\n 있는 곳이며, 봉사활동을 통해 심어진 나무들로 유아들이 안전하게 숲을 경험할 수 있는 숲 체험장이 조성되었습니다. 이외에도 도시 텃밭 가꾸기, 벽화그리기 등 가족과 함께 환경을\n 생각하는 활동을 전개하고 있습니다.', '신세계건설은 친환경 캠페인의 일환으로 하남시 나무고아원 \'유아숲체험장\'에 나무심기 봉사활동을 펼쳤습니다. 하남 나무고아원은 도시개발로 인해 옮겨진 1만5천여본의 나무가\n 있는 곳이며, 봉사활동을 통해 심어진 나무들로 유아들이 안전하게 숲을 경험할 수 있는 숲 체험장이 조성되었습니다. 이외에도 도시 텃밭 가꾸기, 벽화그리기 등 가족과 함께 환경을\n 생각하는 활동을 전개하고 있습니다.', 'Y', 0, NULL, NULL, '2022-02-15 00:00:00', '2022-02-15 02:54:45');
/*!40000 ALTER TABLE `contributions` ENABLE KEYS */;

-- 테이블 ssgenc.customers 구조 내보내기
DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `cust_id` bigint(20) NOT NULL,
  `cust_nm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adult_yn` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy_info_yn` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy_policy_yn` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_cd` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cust_id`),
  KEY `customers_cust_nm_index` (`cust_nm`),
  KEY `customers_mobile_index` (`mobile`),
  KEY `customers_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 ssgenc.customquestions 구조 내보내기
DROP TABLE IF EXISTS `customquestions`;
CREATE TABLE IF NOT EXISTS `customquestions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cust_id` bigint(20) NOT NULL,
  `type` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gubun` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_yn` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gu` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gfa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `land_area` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usage` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floors_no` int(11) NOT NULL,
  `basement_no` int(11) NOT NULL,
  `contract_amt` bigint(20) NOT NULL,
  `lang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `attach_id` bigint(20) DEFAULT NULL,
  `accuser_nm` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_nm` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `household` int(11) DEFAULT NULL,
  `reply_flag` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_yn` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customquestions_cust_id_index` (`cust_id`),
  KEY `customquestions_type_index` (`type`),
  KEY `customquestions_gubun_index` (`gubun`),
  KEY `customquestions_gu_index` (`gu`),
  KEY `customquestions_lang_index` (`lang`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 ssgenc.customreplys 구조 내보내기
DROP TABLE IF EXISTS `customreplys`;
CREATE TABLE IF NOT EXISTS `customreplys` (
  `id` bigint(20) NOT NULL,
  `seq` bigint(20) NOT NULL,
  `subject` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attach_id` int(11) NOT NULL,
  `created_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`,`seq`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 ssgenc.duties 구조 내보내기
DROP TABLE IF EXISTS `duties`;
CREATE TABLE IF NOT EXISTS `duties` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `duty_nm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_nm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duty_desc` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interview` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expo_yn` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attach_id` int(11) NOT NULL,
  `created_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.duties:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `duties` DISABLE KEYS */;
/*!40000 ALTER TABLE `duties` ENABLE KEYS */;

-- 테이블 ssgenc.esgpostings 구조 내보내기
DROP TABLE IF EXISTS `esgpostings`;
CREATE TABLE IF NOT EXISTS `esgpostings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expo_yn` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attach_id` int(11) NOT NULL,
  `created_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.esgpostings:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `esgpostings` DISABLE KEYS */;
/*!40000 ALTER TABLE `esgpostings` ENABLE KEYS */;

-- 테이블 ssgenc.failed_jobs 구조 내보내기
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.failed_jobs:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- 테이블 ssgenc.files 구조 내보내기
DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `file_id` bigint(20) NOT NULL,
  `file_seq` bigint(20) NOT NULL,
  `file_ext` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_nm` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_nm_uuid` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_view_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` int(11) NOT NULL,
  `useflag` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`file_id`,`file_seq`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 ssgenc.informations 구조 내보내기
DROP TABLE IF EXISTS `informations`;
CREATE TABLE IF NOT EXISTS `informations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `housing` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `construct` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leisure` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civil` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hf_age` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hf_project` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hf_amt` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cf_age` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cf_project` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cf_amt` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ce_age` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ce_project` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ce_amt` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lb_age` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lb_count` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lb_amt` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ent_age` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ent_count` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ent_amt` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.informations:~1 rows (대략적) 내보내기
/*!40000 ALTER TABLE `informations` DISABLE KEYS */;
INSERT INTO `informations` (`id`, `housing`, `construct`, `leisure`, `civil`, `hf_age`, `hf_project`, `hf_amt`, `cf_age`, `cf_project`, `cf_amt`, `ce_age`, `ce_project`, `ce_amt`, `lb_age`, `lb_count`, `lb_amt`, `ent_age`, `ent_count`, `ent_amt`, `created_at`, `updated_at`, `created_id`, `updated_id`) VALUES
	(1, '40', '450', '5', '60', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '2022-02-09 01:31:03', '2022-02-10 08:15:29', NULL, NULL);
/*!40000 ALTER TABLE `informations` ENABLE KEYS */;

-- 테이블 ssgenc.loginmenus 구조 내보내기
DROP TABLE IF EXISTS `loginmenus`;
CREATE TABLE IF NOT EXISTS `loginmenus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` bigint(20) NOT NULL,
  `menu_nm` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.loginmenus:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `loginmenus` DISABLE KEYS */;
/*!40000 ALTER TABLE `loginmenus` ENABLE KEYS */;

-- 테이블 ssgenc.logins 구조 내보내기
DROP TABLE IF EXISTS `logins`;
CREATE TABLE IF NOT EXISTS `logins` (
  `login_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_time` datetime NOT NULL,
  `out_time` datetime NOT NULL,
  `err_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `err_msg` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_yn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`login_id`),
  KEY `logins_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 ssgenc.mainnotices 구조 내보내기
DROP TABLE IF EXISTS `mainnotices`;
CREATE TABLE IF NOT EXISTS `mainnotices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subject_ko` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_en` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_text_ko` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_text_en` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expo_yn` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expo_yn` (`expo_yn`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.mainnotices:~3 rows (대략적) 내보내기
/*!40000 ALTER TABLE `mainnotices` DISABLE KEYS */;
INSERT INTO `mainnotices` (`id`, `subject_ko`, `subject_en`, `url`, `link_text_ko`, `link_text_en`, `expo_yn`, `created_at`, `updated_at`, `created_id`, `updated_id`) VALUES
	(1, '제31회 정기주주총회(회계연도 2021년) 권리행사 주주 기준일 공고', 'news_1', '/html/information/if_01_dt_10.html', '정기주주총회', 'text_1', 'Y', '2022-02-08 09:03:37', '2022-02-10 05:58:52', NULL, NULL),
	(2, '신세계건설, 빌리브 성공으로 매출, 수주, 이익 빠르게 증가세', 'notice_2', '/html/information/if_01_dt_09.html', '뉴스', 'text_2', 'Y', '2022-02-08 09:03:37', '2022-02-10 06:00:19', NULL, NULL),
	(3, '빌리브 매거진 구독자 20만 돌파', 'news_3', '/html/information/if_01_dt_08.html', '뉴스', 'text_3', 'Y', '2022-02-08 09:03:37', '2022-02-10 06:01:25', NULL, NULL);
/*!40000 ALTER TABLE `mainnotices` ENABLE KEYS */;

-- 테이블 ssgenc.mainpopups 구조 내보내기
DROP TABLE IF EXISTS `mainpopups`;
CREATE TABLE IF NOT EXISTS `mainpopups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descript` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_text` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expo_yn` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attach_id` int(11) NOT NULL,
  `created_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mainpopups_expo_yn_index` (`expo_yn`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.mainpopups:~1 rows (대략적) 내보내기
/*!40000 ALTER TABLE `mainpopups` DISABLE KEYS */;
INSERT INTO `mainpopups` (`id`, `subject`, `descript`, `url`, `link_text`, `expo_yn`, `attach_id`, `created_id`, `updated_id`, `created_at`, `updated_at`) VALUES
	(1, '신세계가 만든 라이프스타일<br>주거 브랜드 빌리브 VILLIV', '아파트먼트 Apartment를 넘어 라이프스타일먼트 Lifestylement의 실현. 빌리브는 \'좋은 집과 좋은 삶\'에 대한 신세계건설의 철학이 담겨 있습니다. 전세계 다양한 사람, 공간에 대한 이야기를 통해 더 나은 삶이란 무엇일지 고민해 보세요. 아파트먼트 Apartment를 넘어 라이프스타일먼트 Lifestylement의 실현.', '#', '링크텍스트', 'Y', 5, NULL, NULL, '2022-02-10 08:55:17', '2022-02-10 14:50:03');
/*!40000 ALTER TABLE `mainpopups` ENABLE KEYS */;

-- 테이블 ssgenc.meetings 구조 내보내기
DROP TABLE IF EXISTS `meetings`;
CREATE TABLE IF NOT EXISTS `meetings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hold_at` date NOT NULL,
  `round` int(11) NOT NULL,
  `vote_st` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_a_nm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_a_yn` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_b_nm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_b_yn` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_c_nm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_c_yn` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_d_nm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_d_yn` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 ssgenc.menus 구조 내보내기
DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `menu_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `menu_nm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `useflag` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.menus:~21 rows (대략적) 내보내기
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` (`menu_id`, `menu_nm`, `category`, `url`, `remark`, `created_at`, `updated_at`, `useflag`) VALUES
	(1, '프로젝트 관리', '프로젝트 관리', 'project', '프로젝트를 관리한다.', '2022-02-14 06:46:57', '2022-02-14 06:46:57', 'Y'),
	(2, '프로젝트 실적 관리', '프로젝트 관리', NULL, '프로젝트 실적 목록을 보여준다.', '2022-02-14 06:51:09', '2022-02-14 07:06:35', 'Y'),
	(3, '이사회 진행사항 관리', '게시판 관리', NULL, '이사회 진행사항을 관리한다.', '2022-02-14 07:07:54', '2022-02-14 07:07:54', 'Y'),
	(4, '위원회 운영내역 관리', '게시판 관리', NULL, '위원회 운영내역을 관리한다.', '2022-02-14 07:08:45', '2022-02-14 07:08:45', 'Y'),
	(5, '뉴스 관리', '게시판 관리', NULL, '뉴스를 관리한다.', '2022-02-14 07:09:28', '2022-02-14 07:09:28', 'Y'),
	(6, '실적보고서 관리', '게시판 관리', NULL, '실적 보고서를 관리한다.', '2022-02-14 07:10:22', '2022-02-14 07:10:22', 'Y'),
	(7, 'ESG 공시관리', '게시판 관리', NULL, 'ESG 공시관리', '2022-02-14 07:10:59', '2022-02-14 07:10:59', 'Y'),
	(8, '공시관리', '게시판 관리', NULL, '공시관리', '2022-02-14 07:11:29', '2022-02-14 07:11:29', 'Y'),
	(9, '수상실적 관리', '게시판 관리', NULL, '수상실적 관리', '2022-02-14 07:12:05', '2022-02-14 07:12:05', 'Y'),
	(10, '사회공헌 관리', '게시판 관리', NULL, '사회공헌 관리', '2022-02-14 07:20:41', '2022-02-14 07:20:41', 'Y'),
	(11, '직무소개 관리', '게시판 관리', NULL, '직무소개 관리', '2022-02-14 07:21:12', '2022-02-14 07:21:12', 'Y'),
	(12, '고객상담 관리', '게시판 관리', NULL, '고객상담 관리', '2022-02-14 07:21:38', '2022-02-14 07:22:46', 'Y'),
	(13, '제보 관리', '게시판 관리', NULL, '제보 관리', '2022-02-14 07:23:17', '2022-02-14 07:23:17', 'Y'),
	(14, '분양/계약', '고객상담 관리', NULL, '분양/계약', '2022-02-14 07:24:29', '2022-02-14 07:25:00', 'Y'),
	(15, 'AS/하자', '고객상담 관리', NULL, 'AS/하자', '2022-02-14 07:25:39', '2022-02-14 07:25:39', 'Y'),
	(16, '수주상담', '고객상담 관리', NULL, '수주상담', '2022-02-14 07:26:15', '2022-02-14 07:26:51', 'Y'),
	(17, '협력회사', '고객상담 관리', NULL, '협력회사', '2022-02-14 07:27:15', '2022-02-14 07:27:15', 'Y'),
	(18, '일반문의', '고객상담 관리', NULL, '일반문의', '2022-02-14 07:27:41', '2022-02-14 07:27:41', 'Y'),
	(19, '메인 키비주얼/메세지 관리', '사이트 관리', NULL, '메인 키비주얼/메세지 관리', '2022-02-14 07:28:16', '2022-02-14 07:28:16', 'Y'),
	(20, '정보관리', '사이트 관리', NULL, '정보관리', '2022-02-14 07:28:45', '2022-02-14 07:28:45', 'Y'),
	(21, '메인 팝업 관리', '사이트 관리', NULL, '메인 팝업 관리', '2022-02-14 07:29:12', '2022-02-14 07:29:12', 'Y');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;

-- 테이블 ssgenc.messages 구조 내보내기
DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `msg_acc` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_msg_ko` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_msg_en` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_msg_desc_ko` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_msg_desc_en` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_text_ko` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_text_en` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_1_ko` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_1_en` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_1_ko` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_1_en` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_2_ko` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_2_en` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_2_ko` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_2_en` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expo_yn` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attach_id` int(11) NOT NULL,
  `created_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.messages:~3 rows (대략적) 내보내기
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `msg_acc`, `key_msg_ko`, `key_msg_en`, `key_msg_desc_ko`, `key_msg_desc_en`, `url`, `link_text_ko`, `link_text_en`, `data_1_ko`, `data_1_en`, `desc_1_ko`, `desc_1_en`, `data_2_ko`, `data_2_en`, `desc_2_ko`, `desc_2_en`, `expo_yn`, `attach_id`, `created_id`, `updated_id`, `created_at`, `updated_at`) VALUES
	(1, '01', '지극히<br>‘자연’스러운', 'Perfectly natural', '고객과  함께해온 30년 고객이  머무는  그곳에 마음을 담아 삶을 더 풍요롭게 만들어 드리고 있습니다.<br>\n주거, 쇼핑, 레저의 다양한 건축을 통하여 행복을 전해드리겠습니다.', '30 years of being next to our customers', 'vision', NULL, NULL, '565건', '565', '수행 프로젝트', 'Number of Projects completed', 'B+', 'B+', 'ESG 종합', 'ESG Overall Grading', 'Y', 3, NULL, NULL, '2022-01-31 17:39:52', '2022-02-10 05:36:15'),
	(2, '02', '항상<br>열린마음', 'Our heart<br>is always open', '신세계 건설의 인재는 눈에 보이지 않는 <br class="mobile-only">곳에서도 항상 열린 마음으로 자신의 사명을 <br class="mobile-only">다함은 물론 봉사하는 자세로<br class="pc-only">\n              이웃과 더불어 <br class="mobile-only">살아갈 줄 아는 사람이어야 합니다. <br class="mobile-only">다양한 변화를 수용하면서도 항상 바른 길을 <br class="mobile-only">지향하면서 타인의 입장에서<br class="pc-only">\n              생각하고 배려할 줄 <br class="mobile-only">아는 겸손한 사람이 신세계건설이 추구하는 <br class="mobile-only">참다운 인재입니다.', 'Shinsegae E&C talents need to fulfill their mission with open hearts even in places that are not noticeable and <br class="pc-only">', 'recruit-process', NULL, NULL, '1건', '1', '현재 진행중인 신입 채용공고', 'Job Opening for New Recruits', '3건', '3', '현재 진행중인 경력 채용공고', 'Job Opening for Experienced Employees', 'Y', 2, NULL, NULL, '2022-01-31 17:39:52', '2022-02-10 05:10:45'),
	(3, '03', '마음을<br>움직이는<br>건설기업', 'A construction company that moves the mind', '  사회적 책임과 사명을 다하여 고객의 마음을 움직이는, 그 마음을 지켜 나가는 기업이 되고자 합니다.          ', '  By fulling one’s social responsibility and mission to move the minds of our customers, we aim to become a company that protects such mind.     ', 'csr-overview', NULL, NULL, '318,000,000원', 'KRW 318,000,000', '2020년 사회공헌 실적', '2020 Social Contribution Outcome', '', '', '', '', 'Y', 4, NULL, NULL, '2022-01-31 17:39:52', '2022-02-23 15:34:25');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

-- 테이블 ssgenc.migrations 구조 내보내기
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.migrations:~37 rows (대략적) 내보내기
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(73, '2014_10_12_000000_create_users_table', 1),
	(74, '2014_10_12_100000_create_password_resets_table', 1),
	(75, '2019_05_11_000000_create_otps_table', 1),
	(76, '2019_08_19_000000_create_failed_jobs_table', 1),
	(77, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(78, '2021_12_04_102229_create_sessions_table', 1),
	(79, '2021_12_07_121031_create_menus_table', 1),
	(80, '2021_12_07_180805_create_tasks_table', 1),
	(81, '2021_12_15_012415_create_logins_table', 1),
	(82, '2021_12_22_073456_create_projects_table', 1),
	(83, '2021_12_24_054233_create_codes_table', 1),
	(84, '2021_12_24_054351_create_codegroups_table', 1),
	(85, '2022_01_03_153113_create_files_table', 1),
	(86, '2022_01_07_062412_create_accesses_table', 1),
	(87, '2022_01_07_065411_create_loginmenus_table', 1),
	(90, '2022_01_07_073555_create_customreplys_table', 1),
	(95, '2022_01_07_071020_create_notices_table', 2),
	(96, '2022_01_07_073531_create_customquestions_table', 3),
	(100, '2022_01_18_065201_create_customers_table', 4),
	(101, '2022_01_18_074335_create_employments_table', 5),
	(102, '2022_01_28_155951_create_accesshistories_table', 5),
	(103, '2022_01_28_160927_add_description_to_tasks', 5),
	(104, '2022_01_29_160758_create_messages_table', 6),
	(105, '2022_02_04_034347_create_parts_table', 7),
	(106, '2022_02_08_064110_create_mainnotices_table', 8),
	(107, '2022_02_08_124546_create_informations_table', 9),
	(108, '2022_02_10_073448_create_mainpopups_table', 10),
	(109, '2022_02_14_120755_create_contributions_table', 11),
	(110, '2022_02_17_013843_create_projectlist_table', 12),
	(111, '2022_02_27_092830_create_duties_table', 13),
	(112, '2022_02_27_093000_create_awards_table', 14),
	(113, '2022_03_01_151834_create_meetings_table', 15),
	(114, '2022_03_01_151957_create_committees_table', 16),
	(115, '2022_03_03_045732_create_settings_table', 17),
	(116, '2022_03_07_144843_create_reports_table', 18),
	(117, '2022_03_07_144916_create_postings_table', 19),
	(118, '2022_03_07_144929_create_esgpostings_table', 20);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- 테이블 ssgenc.notices 구조 내보내기
DROP TABLE IF EXISTS `notices`;
CREATE TABLE IF NOT EXISTS `notices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `news_gubun` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expo_yn` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` int(11) NOT NULL,
  `attach_id` int(11) NOT NULL,
  `created_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortcut_nm` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortcut_url` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortcut_expo_yn` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `useflag` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 ssgenc.otps 구조 내보내기
DROP TABLE IF EXISTS `otps`;
CREATE TABLE IF NOT EXISTS `otps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validity` int(11) NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `otps_id_index` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.otps:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `otps` DISABLE KEYS */;
/*!40000 ALTER TABLE `otps` ENABLE KEYS */;

-- 테이블 ssgenc.parts 구조 내보내기
DROP TABLE IF EXISTS `parts`;
CREATE TABLE IF NOT EXISTS `parts` (
  `part_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `part_nm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `useflag` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`part_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.parts:~10 rows (대략적) 내보내기
/*!40000 ALTER TABLE `parts` DISABLE KEYS */;
INSERT INTO `parts` (`part_id`, `part_nm`, `remark`, `useflag`, `created_at`, `updated_at`) VALUES
	(1, 'part_1', '', 'Y', '2022-02-04 04:45:34', '2022-02-04 04:45:34'),
	(2, 'part_2', '', 'Y', '2022-02-04 04:45:35', '2022-02-04 04:45:35'),
	(3, 'part_3', '', 'Y', '2022-02-04 04:45:35', '2022-02-04 04:45:35'),
	(4, 'part_4', '', 'Y', '2022-02-04 04:45:35', '2022-02-04 04:45:35'),
	(5, 'part_5', '', 'Y', '2022-02-04 04:45:35', '2022-02-04 04:45:35'),
	(6, 'part_6', '', 'Y', '2022-02-04 04:45:35', '2022-02-04 04:45:35'),
	(7, 'part_7', '', 'Y', '2022-02-04 04:45:35', '2022-02-04 04:45:35'),
	(8, 'part_8', '', 'Y', '2022-02-04 04:45:35', '2022-02-04 04:45:35'),
	(9, 'part_9', '', 'Y', '2022-02-04 04:45:35', '2022-02-04 04:45:35'),
	(10, 'part_10', '', 'Y', '2022-02-04 04:45:35', '2022-02-04 04:45:35');
/*!40000 ALTER TABLE `parts` ENABLE KEYS */;

-- 테이블 ssgenc.password_resets 구조 내보내기
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `user_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.password_resets:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- 테이블 ssgenc.personal_access_tokens 구조 내보내기
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.personal_access_tokens:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- 테이블 ssgenc.postings 구조 내보내기
DROP TABLE IF EXISTS `postings`;
CREATE TABLE IF NOT EXISTS `postings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gubun` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expo_yn` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attach_id` int(11) NOT NULL,
  `created_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.postings:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `postings` DISABLE KEYS */;
/*!40000 ALTER TABLE `postings` ENABLE KEYS */;

-- 테이블 ssgenc.projectlists 구조 내보내기
DROP TABLE IF EXISTS `projectlists`;
CREATE TABLE IF NOT EXISTS `projectlists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `area` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biz_area` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gubun` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ko` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_yn` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `project_yn` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_ko` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volumn_ko` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volumn_en` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 ssgenc.projects 구조 내보내기
DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `area` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biz_area` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gubun` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ko` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_yn` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_yn` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` date NOT NULL,
  `to` date DEFAULT NULL,
  `project_yn` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_ko` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_en` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_ko` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `volumn_ko` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `volumn_en` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `household_ko` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `attach_id` int(11) NOT NULL,
  `created_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `household_en` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 ssgenc.reports 구조 내보내기
DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expo_yn` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attach_id` int(11) NOT NULL,
  `created_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.reports:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;

-- 테이블 ssgenc.sessions 구조 내보내기
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 ssgenc.settings 구조 내보내기
DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `useflag` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.settings:~6 rows (대략적) 내보내기
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `key`, `value`, `remark`, `useflag`, `created_at`, `updated_at`) VALUES
	(1, 'committee', '윤명규', '사내이사', 'Y', '2022-03-03 13:34:20', '2022-03-03 13:34:20'),
	(2, 'committee', '정두영', '사내이사', 'Y', '2022-03-03 13:34:20', '2022-03-03 13:34:20'),
	(3, 'committee', '김정선', '사내이사', 'Y', '2022-03-03 13:34:20', '2022-03-03 13:34:20'),
	(4, 'committee', '최진구', '사외이사', 'Y', '2022-03-03 13:34:20', '2022-03-03 13:34:20'),
	(5, 'committee', '조주현', '사외이사', 'Y', '2022-03-03 13:34:20', '2022-03-03 13:34:20'),
	(6, 'committee', '정인창', '사외이사', 'Y', '2022-03-03 13:34:20', '2022-03-03 13:34:20');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- 테이블 ssgenc.tasks 구조 내보내기
DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.tasks:~0 rows (대략적) 내보내기
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;

-- 테이블 ssgenc.users 구조 내보내기
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_id` bigint(20) DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `useflag` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_reset_yn` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_fail_cnt` bigint(20) DEFAULT NULL,
  `password_next` date NOT NULL,
  `login_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `access_id` bigint(20) DEFAULT NULL,
  `email_yn` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `user_type` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_at` date DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 테이블 데이터 ssgenc.users:~11 rows (대략적) 내보내기
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `name`, `password`, `part_id`, `email`, `remark`, `useflag`, `password_reset_yn`, `login_fail_cnt`, `password_next`, `login_at`, `created_at`, `updated_at`, `access_id`, `email_yn`, `user_type`, `created_id`, `updated_id`, `expired_at`) VALUES
	('kdhong', '홍길동', '96962d1ac0e27e92cc1978554ccfcb2e38652d6308e4a5ed85a6d3b5d7f89115', 1, 'kdhong@gmail.com', NULL, 'Y', NULL, NULL, '2022-05-24', '2022-02-24 07:52:40', '2022-02-24 07:52:40', '2022-02-24 07:52:40', 2, 'Y', '01', NULL, NULL, '2022-05-24'),
	('test_1', 'name_1', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 2, 'name_1@gmail.com', NULL, 'Y', NULL, 0, '2022-01-12', '2022-03-10 12:54:40', '2022-01-12 15:57:07', '2022-03-10 12:54:40', 1, 'Y', '01', NULL, NULL, '2022-05-24'),
	('test_10', 'name_10', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 1, 'name_10@gmail.com', NULL, 'Y', NULL, 0, '2022-01-12', '2022-01-01 00:00:00', '2022-01-12 15:57:07', '2022-01-12 15:57:07', NULL, 'N', '02', NULL, NULL, NULL),
	('test_2', 'name_2', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 3, 'name_2@gmail.com', NULL, 'Y', NULL, 0, '2022-01-12', '2022-01-01 00:00:00', '2022-01-12 15:57:07', '2022-01-12 15:57:07', NULL, 'N', '02', NULL, NULL, NULL),
	('test_3', 'name_3', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 4, 'name_3@gmail.com', NULL, 'Y', NULL, 0, '2022-01-12', '2022-01-01 00:00:00', '2022-01-12 15:57:07', '2022-01-12 15:57:07', NULL, 'N', '02', NULL, NULL, NULL),
	('test_4', 'name_4', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 4, 'name_4@gmail.com', NULL, 'Y', NULL, 0, '2022-01-12', '2022-01-01 00:00:00', '2022-01-12 15:57:07', '2022-01-12 15:57:07', NULL, 'N', '02', NULL, NULL, NULL),
	('test_5', 'name_5', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 5, 'name_5@gmail.com', NULL, 'Y', NULL, 0, '2022-01-12', '2022-01-01 00:00:00', '2022-01-12 15:57:07', '2022-01-12 15:57:07', NULL, 'N', '02', NULL, NULL, NULL),
	('test_6', 'name_6', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 5, 'name_6@gmail.com', NULL, 'Y', NULL, 0, '2022-01-12', '2022-01-01 00:00:00', '2022-01-12 15:57:07', '2022-01-12 15:57:07', NULL, 'N', '02', NULL, NULL, NULL),
	('test_7', 'name_7', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 7, 'name_7@gmail.com', NULL, 'Y', NULL, 0, '2022-01-12', '2022-01-01 00:00:00', '2022-01-12 15:57:07', '2022-01-12 15:57:07', NULL, 'N', '02', NULL, NULL, NULL),
	('test_8', 'name_8', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 8, 'name_8@gmail.com', NULL, 'Y', NULL, 0, '2022-01-12', '2022-01-01 00:00:00', '2022-01-12 15:57:07', '2022-01-12 15:57:07', NULL, 'N', '02', NULL, NULL, NULL),
	('test_9', 'name_9', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 9, 'name_9@gmail.com', NULL, 'Y', NULL, 0, '2022-01-12', '2022-01-01 00:00:00', '2022-01-12 15:57:07', '2022-01-12 15:57:07', NULL, 'N', '02', NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
