-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2020 at 07:51 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sgcl`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debit` double(11,2) NOT NULL,
  `credit` double(11,2) NOT NULL,
  `balance` double(11,2) NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `created_at`, `updated_at`, `company_id`, `debit`, `credit`, `balance`, `note`) VALUES
(1, '2019-12-07 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 0.00, 1882396.00, 'Opening balance of Agata Feed'),
(2, '2019-12-07 18:00:00', '2020-04-22 18:00:00', '2', 533097.00, 0.00, 2415493.00, 'sold 12.5MT Ext. soybean to agata'),
(3, '2019-12-07 18:00:00', '2020-04-22 18:00:00', '2', 533097.00, 0.00, 2948590.00, 'sold 12.5MT Ext. soybean to agata'),
(4, '2019-12-10 18:00:00', '2020-04-22 18:00:00', '2', 533097.00, 0.00, 3481687.00, 'sold 12.5MT Ext. soybean to agata'),
(5, '2019-12-10 18:00:00', '2020-04-22 18:00:00', '2', 533097.00, 0.00, 4014784.00, 'sold 12.5MT Ext. soybean to agata'),
(6, '2019-12-19 18:00:00', '2020-04-22 18:00:00', '2', 533097.00, 0.00, 4547881.00, 'sold 12.5MT Ext. soybean to agata'),
(7, '2019-12-19 18:00:00', '2020-04-22 18:00:00', '2', 533097.00, 0.00, 5080978.00, 'sold 12.5MT Ext. soybean to agata'),
(8, '2019-12-29 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 382000.00, 4698978.00, 'received payment from agata'),
(9, '2020-01-01 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 300000.00, 4398978.00, 'received payment from agata'),
(10, '2020-01-04 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 300000.00, 4098978.00, 'received payment from agata'),
(11, '2020-01-06 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 300000.00, 3798978.00, 'received payment from agata'),
(12, '2020-01-08 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 300000.00, 3498978.00, 'received payment from agata'),
(13, '2020-01-11 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 300000.00, 3198978.00, 'received payment from agata'),
(14, '2020-01-18 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 300000.00, 2898978.00, 'received payment from agata'),
(15, '2020-01-20 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 300000.00, 2598978.00, 'received payment from agata'),
(16, '2020-01-23 18:00:00', '2020-04-22 18:00:00', '2', 533097.00, 0.00, 3132075.00, 'sold 12.5MT Ext. soybean to agata'),
(17, '2020-01-24 18:00:00', '2020-04-22 18:00:00', '2', 533097.00, 0.00, 3665172.00, 'sold 12.5MT Ext. soybean to agata'),
(18, '2020-01-26 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 300000.00, 3365172.00, 'received payment from agata'),
(19, '2020-01-27 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 300000.00, 3065172.00, 'received payment from agata'),
(20, '2020-01-29 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 300000.00, 2765172.00, 'received payment from agata'),
(21, '2020-02-05 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 300000.00, 2465172.00, 'received payment from agata'),
(22, '2020-02-08 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 300000.00, 2165172.00, 'received payment from agata'),
(23, '2020-02-22 18:00:00', '2020-04-22 18:00:00', '2', 566617.50, 0.00, 2731789.50, 'sold 12.5MT Ext. soybean to agata'),
(24, '2020-02-23 18:00:00', '2020-04-22 18:00:00', '2', 566617.50, 0.00, 3298407.00, 'sold 12.5MT Ext. soybean to agata'),
(25, '2020-02-24 18:00:00', '2020-04-22 18:00:00', '2', 566617.50, 0.00, 3865024.50, 'sold 12.5MT Ext. soybean to agata'),
(26, '2020-02-25 18:00:00', '2020-04-22 18:00:00', '2', 566617.50, 0.00, 4431642.00, 'sold 12.5MT Ext. soybean to agata'),
(27, '2020-02-26 18:00:00', '2020-04-22 18:00:00', '2', 566617.50, 0.00, 4998259.50, 'sold 12.5MT Ext. soybean to agata'),
(28, '2020-02-27 18:00:00', '2020-04-22 18:00:00', '2', 566617.50, 0.00, 5564877.00, 'sold 12.5MT Ext. soybean to agata'),
(29, '2020-02-28 18:00:00', '2020-04-22 18:00:00', '2', 566617.50, 0.00, 6131494.50, 'sold 12.5MT Ext. soybean to agata'),
(30, '2020-02-29 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 400000.00, 5731494.50, 'received payment from agata'),
(31, '2020-03-04 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 400000.00, 5331494.50, 'received payment from agata'),
(32, '2020-03-07 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 400000.00, 4931494.50, 'received payment from agata'),
(33, '2020-03-11 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 400000.00, 4531494.50, 'received payment from agata'),
(34, '2020-03-14 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 500000.00, 4031494.50, 'received payment from agata'),
(35, '2020-03-21 18:00:00', '2020-04-22 18:00:00', '2', 566617.50, 0.00, 4598112.00, 'sold 12.5MT Ext. soybean to agata'),
(36, '2020-03-31 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 500000.00, 4098112.00, 'received payment from agata'),
(37, '2020-04-04 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 500000.00, 3598112.00, 'received payment from agata'),
(38, '2020-04-04 18:00:00', '2020-04-22 18:00:00', '2', 557271.00, 0.00, 4155383.00, 'sold 12.5MT Ext. soybean to agata'),
(39, '2020-04-11 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 500000.00, 3655383.00, 'received payment from agata'),
(40, '2020-04-12 18:00:00', '2020-04-22 18:00:00', '2', 557271.00, 0.00, 4212654.00, 'sold 12.5MT Ext. soybean to agata'),
(41, '2020-04-14 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 500000.00, 3712654.00, 'received payment from agata'),
(42, '2020-04-14 18:00:00', '2020-04-22 18:00:00', '2', 557271.00, 0.00, 4269925.00, 'sold 12.5MT Ext. soybean to agata'),
(43, '2020-04-19 18:00:00', '2020-04-22 18:00:00', '2', 0.00, 500000.00, 3769925.00, 'received payment from agata'),
(44, '2020-04-19 18:00:00', '2020-04-22 18:00:00', '2', 557271.00, 0.00, 4327196.00, 'sold 12.5MT Ext. soybean to agata'),
(45, '2020-04-21 18:00:00', '2020-04-22 18:00:00', '2', 557271.00, 0.00, 4884467.00, 'sold 12.5MT Ext. soybean to agata'),
(46, '2019-12-06 18:00:00', '2020-04-22 18:00:00', '3', 0.00, 0.00, 0.00, 'Opening balance of Meghna Group'),
(47, '2019-12-07 18:00:00', '2020-04-22 18:00:00', '3', 0.00, 487500.00, -487500.00, 'Purchase from meghna'),
(48, '2019-12-07 18:00:00', '2020-04-22 18:00:00', '3', 487500.00, 0.00, 0.00, 'Cash by dbbhowmik'),
(49, '2019-12-08 18:00:00', '2020-04-22 18:00:00', '3', 0.00, 487500.00, -487500.00, 'Purchase from meghna'),
(50, '2019-12-08 18:00:00', '2020-04-22 18:00:00', '3', 487500.00, 0.00, 0.00, 'Chq#9804153'),
(51, '2019-12-09 18:00:00', '2020-04-22 18:00:00', '3', 0.00, 487500.00, -487500.00, 'Purchase from meghna'),
(52, '2019-12-09 18:00:00', '2020-04-22 18:00:00', '3', 487500.00, 0.00, 0.00, 'Chq#9804163'),
(53, '2019-12-18 18:00:00', '2020-04-22 18:00:00', '3', 0.00, 487500.00, -487500.00, 'Purchase from meghna'),
(54, '2019-12-18 18:00:00', '2020-04-22 18:00:00', '3', 487500.00, 0.00, 0.00, 'Chq#9804164'),
(55, '2019-12-25 18:00:00', '2020-04-22 18:00:00', '3', 0.00, 487500.00, -487500.00, 'Purchase from meghna'),
(56, '2019-12-25 18:00:00', '2020-04-22 18:00:00', '3', 487500.00, 0.00, 0.00, 'Chq#9804165'),
(57, '2019-12-24 18:00:00', '2020-04-22 18:00:00', '3', 0.00, 487500.00, -487500.00, 'Purchase from meghna'),
(58, '2019-12-24 18:00:00', '2020-04-22 18:00:00', '3', 487500.00, 0.00, 0.00, 'Chq#3504141'),
(59, '2019-12-29 18:00:00', '2020-04-22 18:00:00', '3', 0.00, 487500.00, -487500.00, 'Purchase from meghna'),
(60, '2019-12-29 18:00:00', '2020-04-22 18:00:00', '3', 487500.00, 0.00, 0.00, 'Chq#3504143'),
(61, '2020-01-21 18:00:00', '2020-04-22 18:00:00', '3', 0.00, 487500.00, -487500.00, 'Purchase from meghna'),
(62, '2020-01-21 18:00:00', '2020-04-22 18:00:00', '3', 487500.00, 0.00, 0.00, 'Chq#'),
(63, '2020-02-19 18:00:00', '2020-04-22 18:00:00', '3', 0.00, 512500.00, -512500.00, 'Purchase from meghna'),
(64, '2020-02-19 18:00:00', '2020-04-22 18:00:00', '3', 512500.00, 0.00, 0.00, 'transfer Chq# to fresh for extruded soybean'),
(65, '2020-02-22 18:00:00', '2020-04-22 18:00:00', '3', 0.00, 512500.00, -512500.00, 'Purchase from meghna'),
(66, '2020-02-22 18:00:00', '2020-04-22 18:00:00', '3', 512500.00, 0.00, 0.00, 'transfer Chq# to fresh for extruded soybean'),
(67, '2020-02-24 18:00:00', '2020-04-22 18:00:00', '3', 0.00, 512500.00, -512500.00, 'Purchase from meghna'),
(68, '2020-02-24 18:00:00', '2020-04-22 18:00:00', '3', 512500.00, 0.00, 0.00, 'transfer Chq# to fresh for extruded soybean'),
(69, '2020-02-29 18:00:00', '2020-04-22 18:00:00', '3', 0.00, 512500.00, -512500.00, 'Purchase from meghna'),
(70, '2020-02-29 18:00:00', '2020-04-22 18:00:00', '3', 512500.00, 0.00, 0.00, 'MTB transfer Chq#'),
(71, '2020-03-02 18:00:00', '2020-04-22 18:00:00', '3', 0.00, 512500.00, -512500.00, 'Purchase from meghna'),
(72, '2020-03-02 18:00:00', '2020-04-22 18:00:00', '3', 512500.00, 0.00, 0.00, 'transfer Chq# to fresh for extruded soybean'),
(73, '2020-03-09 18:00:00', '2020-04-22 18:00:00', '3', 0.00, 512500.00, -512500.00, 'Purchase from meghna'),
(74, '2020-03-09 18:00:00', '2020-04-22 18:00:00', '3', 512500.00, 0.00, 0.00, 'transfer Chq# to fresh for extruded soybean'),
(75, '2020-03-14 18:00:00', '2020-04-22 18:00:00', '3', 0.00, 512500.00, -512500.00, 'Purchase from meghna'),
(76, '2020-03-14 18:00:00', '2020-04-22 18:00:00', '3', 512500.00, 0.00, 0.00, 'transfer Chq# to fresh for extruded soybean'),
(77, '2020-03-17 18:00:00', '2020-04-22 18:00:00', '3', 0.00, 512500.00, -512500.00, 'Purchase from meghna'),
(78, '2020-03-17 18:00:00', '2020-04-22 18:00:00', '3', 512500.00, 0.00, 0.00, 'transfer Chq# to fresh for extruded soybean'),
(79, '2020-04-04 18:00:00', '2020-04-22 18:00:00', '3', 0.00, 493750.00, -493750.00, 'Purchase from meghna'),
(80, '2020-04-04 18:00:00', '2020-04-22 18:00:00', '3', 493750.00, 0.00, 0.00, 'transfer Chq# to fresh for extruded soybean'),
(81, '2020-04-11 18:00:00', '2020-04-22 18:00:00', '3', 0.00, 493750.00, -493750.00, 'Purchase from meghna'),
(82, '2020-04-11 18:00:00', '2020-04-22 18:00:00', '3', 493750.00, 0.00, 0.00, 'transfer Chq# to fresh for extruded soybean'),
(83, '2020-04-14 18:00:00', '2020-04-22 18:00:00', '3', 0.00, 493750.00, -493750.00, 'Purchase from meghna'),
(84, '2020-04-14 18:00:00', '2020-04-22 18:00:00', '3', 493750.00, 0.00, 0.00, 'transfer Chq# to fresh for extruded soybean'),
(85, '2020-04-18 18:00:00', '2020-04-22 18:00:00', '3', 0.00, 493750.00, -493750.00, 'Purchase from meghna'),
(86, '2020-04-18 18:00:00', '2020-04-22 18:00:00', '3', 493750.00, 0.00, 0.00, 'transfer Chq# to fresh for extruded soybean'),
(87, '2020-04-19 18:00:00', '2020-04-22 18:00:00', '3', 0.00, 493750.00, -493750.00, 'Purchase from meghna'),
(88, '2020-04-20 02:00:00', '2020-04-22 18:00:00', '3', 493750.00, 0.00, 0.00, 'transfer Chq# to fresh for extruded soybean'),
(89, '2019-12-06 18:00:00', '2020-04-22 18:00:00', '4', 0.00, 0.00, 207470.00, 'Opening balance of Alitto Food'),
(90, '2020-02-01 18:00:00', '2020-04-22 18:00:00', '4', 25000.00, 0.00, 232470.00, 'Alitto Shop expances'),
(91, '2020-02-04 18:00:00', '2020-04-22 18:00:00', '4', 35000.00, 0.00, 267470.00, 'Alitto marbles'),
(92, '2020-02-05 18:00:00', '2020-04-22 18:00:00', '4', 25000.00, 0.00, 292470.00, 'Alitto shop carpentar'),
(93, '2020-03-21 18:00:00', '2020-04-22 18:00:00', '4', 30000.00, 0.00, 322470.00, 'Alitto Shop celling advance'),
(94, '2020-03-22 01:00:00', '2020-04-23 02:00:00', '4', 10000.00, 0.00, 332470.00, 'Alitto Shop expances'),
(95, '2020-01-01 02:19:50', '2020-04-23 02:19:50', '1', 6190.00, 0.00, 6190.00, 'Opening balance- MTB - mohammadpur'),
(96, '2019-12-30 02:20:21', '2020-04-23 02:20:21', '1', 206542.00, 0.00, 212732.00, 'Opening balance- Bank Asia - Scotia'),
(97, '2019-12-31 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 0.00, 907456.00, 'Opening balance of Syngen Corp'),
(98, '2019-12-31 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 487500.00, 419956.00, 'Chq#'),
(100, '2020-01-01 18:00:00', '2020-04-22 18:00:00', '1', 300000.00, 0.00, 719956.00, 'received payment from agata'),
(101, '2020-01-01 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 230.00, 719726.00, 'bank_miscellaneous'),
(103, '2020-01-01 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 10.00, 719716.00, 'bank_miscellaneous'),
(104, '2020-01-04 18:00:00', '2020-04-22 18:00:00', '1', 300000.00, 0.00, 1019716.00, 'received payment from agata'),
(106, '2020-01-05 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 100000.00, 919716.00, 'Alitto SS material advance'),
(107, '2020-01-06 18:00:00', '2020-04-22 18:00:00', '1', 300000.00, 0.00, 1219716.00, 'received payment from agata'),
(109, '2020-01-07 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 30000.00, 1189716.00, 'january salary | maa+ didima intrest'),
(110, '2020-01-07 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 446182.00, 743534.00, '19-20 Tax return'),
(112, '2020-01-08 18:00:00', '2020-04-22 18:00:00', '1', 300000.00, 0.00, 1043534.00, 'received payment from agata'),
(113, '2020-01-11 18:00:00', '2020-04-22 18:00:00', '1', 300000.00, 0.00, 1343534.00, 'received payment from agata'),
(115, '2020-01-18 18:00:00', '2020-04-22 18:00:00', '1', 300000.00, 0.00, 1643534.00, 'received payment from agata'),
(116, '2020-01-20 18:00:00', '2020-04-22 18:00:00', '1', 300000.00, 0.00, 1943534.00, 'received payment from agata'),
(118, '2020-01-20 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 200000.00, 1743534.00, '50K to Arindam to show fund transfer || 1.5lac To Dbbhowmik Brac Bank'),
(119, '2020-01-21 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 487500.00, 1256034.00, 'Chq#'),
(121, '2020-01-22 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 10000.00, 1246034.00, 'IRC renewal + membership'),
(122, '2020-01-25 18:00:00', '2020-04-22 18:00:00', '1', 50000.00, 0.00, 1306034.00, 'Share capital transfer -Arindam'),
(124, '2020-01-25 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 297480.00, 948554.00, 'anupama salary [Aug-Jan]'),
(125, '2020-01-26 18:00:00', '2020-04-22 18:00:00', '1', 300000.00, 0.00, 1248554.00, 'received payment from agata'),
(127, '2020-01-27 18:00:00', '2020-04-22 18:00:00', '1', 300000.00, 0.00, 1548554.00, 'received payment from agata'),
(128, '2020-01-29 18:00:00', '2020-04-22 18:00:00', '1', 300000.00, 0.00, 1848554.00, 'received payment from agata'),
(130, '2020-02-01 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 25000.00, 1823554.00, 'Alitto Shop expances'),
(131, '2020-02-04 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 30000.00, 1793554.00, 'february salary | maa+ didima intrest'),
(133, '2020-02-04 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 35000.00, 1758554.00, 'Alitto marbles'),
(134, '2020-02-05 18:00:00', '2020-04-22 18:00:00', '1', 300000.00, 0.00, 2058554.00, 'received payment from agata'),
(136, '2020-02-05 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 25000.00, 2033554.00, 'Alitto shop carpentar'),
(137, '2020-02-08 18:00:00', '2020-04-22 18:00:00', '1', 300000.00, 0.00, 2333554.00, 'received payment from agata'),
(139, '2020-02-19 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 512500.00, 1821054.00, 'transfer Chq# to fresh for extruded soybean'),
(140, '2020-02-19 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 150000.00, 1671054.00, 'To Dbbhowmik Brac Bank'),
(142, '2020-02-22 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 512500.00, 1158554.00, 'transfer Chq# to fresh for extruded soybean'),
(143, '2020-02-24 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 512500.00, 646054.00, 'transfer Chq# to fresh for extruded soybean'),
(145, '2020-02-29 18:00:00', '2020-04-22 18:00:00', '1', 400000.00, 0.00, 1046054.00, 'received payment from agata'),
(146, '2020-02-29 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 512500.00, 533554.00, 'MTB transfer Chq#'),
(148, '2020-03-02 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 512500.00, 21054.00, 'transfer Chq# to fresh for extruded soybean'),
(149, '2020-03-04 18:00:00', '2020-04-22 18:00:00', '1', 400000.00, 0.00, 421054.00, 'received payment from agata'),
(151, '2020-03-04 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 30000.00, 391054.00, 'March salary | maa+ didima intrest'),
(152, '2020-03-07 18:00:00', '2020-04-22 18:00:00', '1', 400000.00, 0.00, 791054.00, 'received payment from agata'),
(154, '2020-03-07 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 70000.00, 721054.00, 'To Animesh- Adviced by Dbbhowmik'),
(155, '2020-03-09 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 512500.00, 208554.00, 'transfer Chq# to fresh for extruded soybean'),
(157, '2020-03-09 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 50000.00, 158554.00, 'Trade licanse renewal + RJSC return'),
(158, '2020-03-10 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 30000.00, 128554.00, 'To Dbbhowmik Brac Bank'),
(160, '2020-03-11 18:00:00', '2020-04-22 18:00:00', '1', 400000.00, 0.00, 528554.00, 'received payment from agata'),
(161, '2020-03-14 18:00:00', '2020-04-22 18:00:00', '1', 500000.00, 0.00, 1028554.00, 'received payment from agata'),
(163, '2020-03-14 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 512500.00, 516054.00, 'transfer Chq# to fresh for extruded soybean'),
(164, '2020-03-17 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 512500.00, 3554.00, 'transfer Chq# to fresh for extruded soybean'),
(166, '2020-03-21 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 30000.00, -26446.00, 'Alitto Shop celling advance'),
(167, '2020-03-21 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 10000.00, -36446.00, 'Alitto Shop expances'),
(169, '2020-03-21 18:00:00', '2020-04-22 18:00:00', '1', 200000.00, 0.00, 163554.00, 'Share capital transfer -anupama'),
(170, '2020-03-31 18:00:00', '2020-04-22 18:00:00', '1', 500000.00, 0.00, 663554.00, 'received payment from agata'),
(172, '2020-04-04 18:00:00', '2020-04-22 18:00:00', '1', 500000.00, 0.00, 1163554.00, 'received payment from agata'),
(173, '2020-04-04 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 493750.00, 669804.00, 'transfer Chq# to fresh for extruded soybean'),
(175, '2020-04-11 18:00:00', '2020-04-22 18:00:00', '1', 500000.00, 0.00, 1169804.00, 'received payment from agata'),
(176, '2020-04-11 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 493750.00, 676054.00, 'transfer Chq# to fresh for extruded soybean'),
(178, '2020-04-11 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 30000.00, 646054.00, 'April salary | maa+ didima intrest'),
(179, '2020-04-14 18:00:00', '2020-04-22 18:00:00', '1', 500000.00, 0.00, 1146054.00, 'received payment from agata'),
(181, '2020-04-14 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 493750.00, 652304.00, 'transfer Chq# to fresh for extruded soybean'),
(182, '2020-04-18 18:00:00', '2020-04-22 18:00:00', '1', 0.00, 493750.00, 158554.00, 'transfer Chq# to fresh for extruded soybean'),
(184, '2020-04-19 18:00:00', '2020-04-22 18:00:00', '1', 500000.00, 0.00, 658554.00, 'received payment from agata'),
(185, '2020-04-19 18:30:00', '2020-04-22 18:00:00', '1', 0.00, 493750.00, 212732.00, 'transfer Chq# [row data modified]'),
(186, '2020-04-23 03:18:51', '2020-04-23 03:18:51', '3', 0.00, 1481250.00, -1481250.00, 'Auto entry by Purchase'),
(187, '2020-04-23 03:26:06', '2020-04-23 03:26:06', '3', 0.00, 7900000.00, -9381250.00, 'Auto entry by Purchase'),
(188, '2020-04-23 03:48:16', '2020-04-23 03:48:16', '5', 0.00, 0.00, 13300000.00, 'Opening balance of Tarini Mohan Debnath'),
(189, '2020-05-18 05:55:43', '2020-05-18 05:55:43', '2', 43500.00, 0.00, 4927967.00, 'Auto entry by sales'),
(190, '2020-05-18 05:58:27', '2020-05-18 05:58:27', '2', 43500.00, 0.00, 4971467.00, 'Auto entry by sales'),
(191, '2020-05-18 05:59:14', '2020-05-18 05:59:14', '3', 0.00, 3650000.00, -13031250.00, 'Auto entry by Purchase');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `companies_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `created_at`, `updated_at`, `companies_id`, `name`, `ac_number`, `branch`, `balance`) VALUES
(1, '2020-04-23 02:19:50', '2020-04-23 02:19:50', '1', 'MTB', '0430210010566', 'mohammadpur', 6190.00),
(2, '2020-04-23 02:20:21', '2020-04-23 02:20:21', '1', 'Bank Asia', '00733004622', 'Scotia', 206542.00);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `created_at`, `updated_at`, `name`, `phone`, `address`) VALUES
(1, '2020-04-21 18:00:00', NULL, 'Syngen Corp Ltd.', '01935834011', 'Dhaka'),
(2, '2020-04-22 06:14:14', '2020-04-22 06:14:14', 'Agata Feed', '01777739640', 'Rupayan trade center'),
(3, '2020-04-22 06:15:17', '2020-04-22 06:15:17', 'Meghna Group', '01713048744', 'Banani Bridge'),
(4, '2020-04-22 10:07:16', '2020-04-22 10:07:16', 'Alitto Food', '01935834011', 'mirpur'),
(5, '2020-04-23 03:48:15', '2020-04-23 03:48:15', 'Tarini Mohan Debnath', '01818399692', 'gazipur');

-- --------------------------------------------------------

--
-- Table structure for table `expanses`
--

CREATE TABLE `expanses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(11,2) NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expanses`
--

INSERT INTO `expanses` (`id`, `created_at`, `updated_at`, `user_id`, `type`, `amount`, `note`) VALUES
(1, '2019-12-31 18:00:00', NULL, NULL, 'bank_miscellaneous', 2500.00, 'year ending charges'),
(2, '2020-01-01 18:00:00', NULL, NULL, 'bank_miscellaneous', 230.00, 'bank_miscellaneous'),
(3, '2020-01-01 18:00:00', NULL, NULL, 'bank_miscellaneous', 10.00, 'bank_miscellaneous'),
(4, '2020-01-07 18:00:00', NULL, '1', 'salary', 30000.00, 'january salary | maa+ didima intrest'),
(5, '2020-01-07 18:00:00', NULL, NULL, 'legal', 446182.00, '19-20 Tax return'),
(6, '2020-01-20 18:00:00', NULL, NULL, 'other', 150000.00, 'To Dbbhowmik Brac Bank'),
(7, '2020-01-22 18:00:00', NULL, NULL, 'legal', 10000.00, 'IRC renewal + membership'),
(8, '2020-01-25 18:00:00', NULL, '2', 'salary', 297480.00, 'anupama salary [Aug-Jan]'),
(9, '2020-02-04 18:00:00', NULL, '1', 'salary', 30000.00, 'february salary | maa+ didima intrest'),
(10, '2020-02-19 18:00:00', NULL, NULL, 'other', 150000.00, 'To Dbbhowmik Brac Bank'),
(11, '2020-03-04 18:00:00', NULL, '1', 'salary', 30000.00, 'March salary | maa+ didima intrest'),
(12, '2020-03-07 18:00:00', NULL, NULL, 'other', 70000.00, 'To Animesh- Adviced by Dbbhowmik'),
(13, '2020-03-09 18:00:00', NULL, NULL, 'legal', 50000.00, 'Trade licanse renewal + RJSC return'),
(14, '2020-03-10 18:00:00', NULL, NULL, 'other', 30000.00, 'To Dbbhowmik Brac Bank'),
(15, '2020-04-11 18:00:00', NULL, '1', 'salary', 30000.00, 'April salary | maa+ didima intrest');

-- --------------------------------------------------------

--
-- Table structure for table `funds`
--

CREATE TABLE `funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(11,2) NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `funds`
--

INSERT INTO `funds` (`id`, `created_at`, `updated_at`, `by`, `type`, `amount`, `note`) VALUES
(1, '2020-03-21 18:00:00', '2020-04-22 18:00:00', 'Anupama bhowmik', 'Fund transfer', 200000.00, 'share capital transfer'),
(2, '2020-01-25 18:00:00', '2020-04-22 18:00:00', 'Arindam', 'Fund transfer', 50000.00, 'share capital transfer');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantity` bigint(20) NOT NULL,
  `rate` double(8,2) NOT NULL,
  `items_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `created_at`, `updated_at`, `quantity`, `rate`, `items_id`) VALUES
(1, '2020-04-23 03:18:51', '2020-05-18 05:59:14', 335476, 38.61, 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` bigint(191) NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `created_at`, `updated_at`, `name`, `vendor_id`, `unit`) VALUES
(1, '2020-04-22 06:15:35', '2020-04-22 06:15:35', 'Extruded soybean', 3, 'kgs');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `companies_id` bigint(20) NOT NULL,
  `items_id` bigint(20) NOT NULL,
  `PO` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `rate` double(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `companies_id`, `items_id`, `PO`, `quantity`, `rate`, `status`) VALUES
(1, '2019-12-08 06:16:58', '2020-04-22 06:24:41', 2, 1, '7413', 100000, 43.50, 1),
(2, '2020-02-23 06:17:58', '2020-04-22 06:24:53', 2, 1, '7597', 100000, 46.25, 1),
(3, '2020-04-05 06:18:27', '2020-04-22 06:18:27', 2, 1, '7680', 100000, 45.50, 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantity` bigint(20) NOT NULL,
  `rate` double(8,2) NOT NULL,
  `items_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `created_at`, `updated_at`, `quantity`, `rate`, `items_id`) VALUES
(1, '2019-12-07 18:00:00', NULL, 12500, 39.00, 1),
(2, '2019-12-08 18:00:00', NULL, 12500, 39.00, 1),
(3, '2019-12-09 18:00:00', NULL, 12500, 39.00, 1),
(4, '2019-12-18 18:00:00', NULL, 12500, 39.00, 1),
(5, '2019-12-25 18:00:00', NULL, 12500, 39.00, 1),
(6, '2019-12-24 18:00:00', NULL, 12500, 39.00, 1),
(7, '2019-12-29 18:00:00', NULL, 12500, 39.00, 1),
(8, '2020-01-21 18:00:00', NULL, 12500, 39.00, 1),
(9, '2020-02-19 18:00:00', NULL, 12500, 41.00, 1),
(10, '2020-02-22 18:00:00', NULL, 12500, 41.00, 1),
(11, '2020-02-24 18:00:00', NULL, 12500, 41.00, 1),
(12, '2020-02-29 18:00:00', NULL, 12500, 41.00, 1),
(13, '2020-03-02 18:00:00', NULL, 12500, 41.00, 1),
(14, '2020-03-09 18:00:00', NULL, 12500, 41.00, 1),
(15, '2020-03-14 18:00:00', NULL, 12500, 41.00, 1),
(16, '2020-03-17 18:00:00', NULL, 12500, 41.00, 1),
(17, '2020-04-04 18:00:00', NULL, 12500, 39.50, 1),
(18, '2020-04-11 18:00:00', NULL, 12500, 39.50, 1),
(19, '2020-04-14 18:00:00', NULL, 12500, 39.50, 1),
(20, '2020-04-18 18:00:00', NULL, 12500, 39.50, 1),
(21, '2020-04-19 18:00:00', NULL, 12500, 39.50, 1),
(22, '2020-04-23 03:18:51', '2020-04-23 03:18:51', 37500, 39.50, 1),
(23, '2020-04-23 03:26:06', '2020-04-23 03:26:06', 200000, 39.50, 1),
(24, '2020-05-18 05:59:14', '2020-05-18 05:59:14', 100000, 36.50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `orders_id` bigint(20) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `expanse` bigint(20) NOT NULL,
  `loss` bigint(20) NOT NULL,
  `purchase_rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `created_at`, `updated_at`, `orders_id`, `quantity`, `expanse`, `loss`, `purchase_rate`) VALUES
(1, '2019-12-07 18:00:00', NULL, 1, 12462, 9000, 38, 39),
(2, '2019-12-07 18:00:00', NULL, 1, 12462, 9000, 38, 39),
(3, '2019-12-10 18:00:00', NULL, 1, 12462, 9000, 38, 39),
(4, '2019-12-10 18:00:00', NULL, 1, 12462, 9000, 38, 39),
(5, '2019-12-19 18:00:00', NULL, 1, 12462, 9000, 38, 39),
(6, '2019-12-19 18:00:00', NULL, 1, 12462, 9000, 38, 39),
(7, '2020-01-23 18:00:00', NULL, 1, 12462, 9000, 38, 39),
(8, '2020-01-24 18:00:00', NULL, 1, 12462, 9000, 38, 39),
(9, '2020-02-22 18:00:00', NULL, 2, 12462, 9750, 38, 41),
(10, '2020-02-23 18:00:00', NULL, 2, 12462, 9750, 38, 41),
(11, '2020-02-24 18:00:00', NULL, 2, 12462, 9750, 38, 41),
(12, '2020-02-25 18:00:00', NULL, 2, 12462, 9750, 38, 41),
(13, '2020-02-26 18:00:00', NULL, 2, 12462, 9750, 38, 41),
(14, '2020-02-27 18:00:00', NULL, 2, 12462, 9750, 38, 41),
(15, '2020-02-28 18:00:00', NULL, 2, 12462, 9750, 38, 41),
(16, '2020-03-21 18:00:00', NULL, 2, 12462, 9750, 38, 41),
(17, '2020-04-04 18:00:00', NULL, 3, 12462, 9750, 38, 39.5),
(18, '2020-04-12 18:00:00', NULL, 3, 12462, 9750, 38, 39.5),
(19, '2020-04-14 18:00:00', NULL, 3, 12462, 9750, 38, 39.5),
(20, '2020-04-19 18:00:00', NULL, 3, 12462, 9750, 38, 39.5),
(22, '2020-04-21 18:00:00', NULL, 3, 12462, 9750, 38, 39.5),
(23, '2020-05-18 05:55:43', '2020-05-18 05:55:43', 3, 1000, 2000, 12, 39.5),
(24, '2020-05-18 05:58:27', '2020-05-18 05:58:27', 3, 1000, 2000, 12, 39.5);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Model` varchar(200) NOT NULL,
  `Token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `created_at`, `updated_at`, `Model`, `Token`) VALUES
(4, '2020-05-18 05:34:56', '2020-05-18 05:34:56', 'WALTON Primo HMmini', 'fPhAzjjTSq-9ewgQyit8d9:APA91bGxEJgvNmd92BaKQuD5_8UaD8TFfxgu24idQcOIQpzTI6iYD_d6iZ0D5VCtOLoKtjq-Sq0AaRovP8jUK6Tim0rbhJl3fijt4McNdLtpITUaaZ9A0ob5JcjDDsEBpKuC-tFl2brE'),
(5, '2020-05-18 05:35:24', '2020-05-18 05:35:24', 'ONEPLUS A3010', 'd_KDeTNuQMuPRYqaWL20-H:APA91bEpKFpWCKym0VgTsZ6x_wV1QVXT53YCQkttqaY7VD9_6h-zrImv4AOS480M01CQEKTfSu7CU0sIZTb3XOGAguqyNtmv20B0086ie0K7gp40Wc_wix5BJ4UupZAM9CsNYbD0RY-8'),
(6, '2020-05-18 06:18:29', '2020-05-18 06:18:29', 'ONEPLUS A3010', 'fC-gLg1hTM-reT5qF5yrFP:APA91bGDHYE9y3zc6AosYqSlyXq8w_isX2IHQIBO2EvasZsUlu_I235ObAD2JapxlJkxvTNvC7QDSdvnHLH_G0ghkgTjBKhMH0thRZUUD6A0kDq-Kg0Zt2oKxydRUwdwrb-6zzY3e9wo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `company_id`) VALUES
(1, 'arindam', 'Arindam Debnath', 'hsdevnath@gmail.com', NULL, '$2y$10$hmm09E9r1QuR/h/9aFtVqeL5FysJ41ne0oprTKI7lLM5.JR3fqLxe', '1yKkgV8HCHxw7iYKBEQwYjS6IrVTtjKmm2nTn6tv1CQQdpKerI9tGEkgftLf', '2020-04-22 05:28:27', '2020-04-22 05:28:27', '01935834011', 1),
(2, 'anupama', 'Anupama Bhowmik', 'anupama@email.com', NULL, '$2y$10$hmm09E9r1QuR/h/9aFtVqeL5FysJ41ne0oprTKI7lLM5.JR3fqLxe', NULL, NULL, NULL, '01777739646', 1),
(3, 'dbbhowmik', 'Dr. Bhowmik', 'dbbhowmik2001@gmail.com', NULL, '$2y$10$hmm09E9r1QuR/h/9aFtVqeL5FysJ41ne0oprTKI7lLM5.JR3fqLxe', 'LIXy6mEuoyUwqisEnmWFGLij9ICAFiCpQlDPyWQD9QphvN1KK6qpBkTZDB4s', NULL, NULL, '01715776769', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expanses`
--
ALTER TABLE `expanses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funds`
--
ALTER TABLE `funds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expanses`
--
ALTER TABLE `expanses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `funds`
--
ALTER TABLE `funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
