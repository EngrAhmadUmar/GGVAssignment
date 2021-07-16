-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2021 at 07:00 AM
-- Server version: 8.0.18
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE `accountant` (
  `accountant_id` int(11) NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `sex` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `salary` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accountant`
--

INSERT INTO `accountant` (`accountant_id`, `name`, `birthday`, `sex`, `address`, `phone`, `email`, `password`, `salary`, `username`) VALUES
(4, 'Accountant', '01-06-2020', 'male', 'Huye', '250788604106', 'celosrenos@hotmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '125000', 'accountant');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `owner_status` int(11) NOT NULL DEFAULT '0' COMMENT '1 owner, 0 not owner',
  `username` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `birthday` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_id` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `phone`, `address`, `owner_status`, `username`, `status`, `birthday`, `author_id`) VALUES
(1, 'System Administrator', 'admin@eab.ac.rw', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '250788550436‬', 'Butare', 1, 'admin', 1, '29-12-2016', 'AUTH153835314632903'),
(45, 'Pierre Celestin NIYOMUGABO', 'celosrenos@hotmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '250788604106', 'Huye', 0, 'celestin', 1, '', ''),
(46, 'Barbrah Mutoni', 'celestin@universe.rw', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '250788604106', 'Huye, Rwanda', 0, 'barbrah', 1, NULL, ''),
(48, 'Benoît', 'benoithate@yahoo.fr', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '+250788550436', 'huye', 0, 'benoithate@yahoo.fr', 1, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_backup`
--

CREATE TABLE `attendance_backup` (
  `attendance_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 undefined , 1 present , 2  absent',
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `year` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `session` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('04fd76b85ba0e25790b41539309db1d7f999c293', '::1', 1619446923, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393434363632363b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('07c2fd3ef3f7c0d1fbe3f9e87df3f38d2984cff9', '::1', 1618782171, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738313838383b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('0a25ea45583023c2dbc92e5ccb74254c6913cfac', '::1', 1619106262, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393130353938353b746f7572706f7075707c693a313b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('124d8577ac2807d64771e9de343f3fa92f57919d', '::1', 1619435056, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393433353034363b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b746f7572706f7075707c693a313b),
('12ae566570a769587c2c5be702991aaf0286fec7', '::1', 1619442007, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393434313737333b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('12c18ce568a4455ae2f43dca4a008e12adfd9466', '::1', 1618785870, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738353837303b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('17f06490a7049ddfee4871acffbeec124bcae9b8', '::1', 1618784325, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738343136373b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('19a67b880377511425370bdc760062709d0e7577', '::1', 1619105386, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393130353139343b746f7572706f7075707c693a313b),
('1a63e67a204b2ade2c54bf53fd051f1e0cc79c13', '::1', 1619081507, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393038313530373b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('1bc9d7b4bc23653eb42ce605749289b0337fc952', '::1', 1619470609, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393437303630393b),
('1bdf8b7d8759c6bc9c5771b7231dc7b078928637', '::1', 1618781530, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738313533303b736974655f6c616e7c733a373a22656e676c697368223b),
('206936d91ea39bc4d6cb5d78e01becb0f5266938', '::1', 1618787143, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738373035393b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('20acc798d75c374cbda692b08be56cd64bde30b2', '::1', 1618828281, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383832383238313b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('251b9615853572a891159cac0c85f28725f38e80', '::1', 1618782882, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738323630363b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('294469b531bc926f368af699562c24432835cd85', '127.0.0.1', 1619102966, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393130323733303b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b746f7572706f7075707c693a313b),
('29d42c34dcb19f9204fdcc56dfefaf27a4628783', '::1', 1619443595, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393434333536343b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('2c8c87c6b1771a966367404cd8ec7b4acc481832', '::1', 1618784153, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738333835353b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('2f6ede3fe2fac706bdc87b37982923bdab839a00', '::1', 1619440936, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393434303739393b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('34736fe88e9c68b452e177e9339d08153454d7d0', '::1', 1618785871, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738353837313b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('361c432f6d93674b2a2941204554d35ea82bcbdc', '::1', 1619444814, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393434343831343b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('38d1c90b6765749194f89f97680321268a1ea68e', '::1', 1619082911, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393038323631383b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('3abb2c3bd27cb1f983a98c5284013a205a1c2bec', '::1', 1619085598, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393038353339343b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b746f7572706f7075707c693a313b),
('3f408b7f04ed140c4632a4df9df699531cb8e4c3', '::1', 1619082364, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393038323331333b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('42e6f53059931f50aa5962f36fb9c96538e3f917', '::1', 1619442429, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393434323135353b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('4aa640f075ae2438bdecadfb1cb01b7b0d91a747', '::1', 1619084563, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393038343536333b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('4d6d9db7070ec4d1f6a24d3ae20aa107abf61d79', '::1', 1619083039, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393038323938333b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('50baec9a6e5417fe3b166c7c68d7de269b31fac9', '::1', 1618784776, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738343534393b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('546b681df88ccd3f46a6702f11901f17e6d3d4e1', '::1', 1619467024, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393436373030333b),
('5671a087807cbaf8e89bddbdecbdaa758f56311e', '::1', 1619084004, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393038333733363b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('57598e2b0898778051d03ff30cffe0168b8e01b1', '::1', 1619082168, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393038313933343b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('58ab0a9b0587fac73e63df6f070006b737d3bcec', '::1', 1619104100, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393130343038303b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b746f7572706f7075707c693a313b),
('5b13fd0d81ca5b149d1ae4d9a27494ae524e544b', '::1', 1619443096, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393434323935353b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('5b8b44b8956c2c375ccff21d935d08a30fdf9166', '::1', 1618785860, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738353835333b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('6e80777c8d60b8bc8a7097cc12dc559f39aa4c8f', '::1', 1619104315, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393130343130373b746f7572706f7075707c693a313b),
('755aaf8d810814d6bb5229aacb182a4ad2bc22e3', '::1', 1619447095, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393434373039353b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('76bb9b607f4d6cdbac3c6113d1a9ea48318a4910', '::1', 1618786325, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738363033363b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('77b0b2617d90f6c9ac4a0a8aa112d0520351d440', '::1', 1619086773, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393038363730303b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b746f7572706f7075707c693a313b),
('7c01376d1c803c543ce9d0174791d4ae8a358b8e', '::1', 1618786929, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738363734333b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('7ce5b5e623de658ef8072e32f578d38cf4b0f63a', '::1', 1619086573, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393038363334313b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b746f7572706f7075707c693a313b),
('7ebd42e5d61617fc9bfba9c60e6c19f257799d22', '::1', 1619437132, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393433373131313b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('81061f779d5455f1e53422de161017ee16a13bec', '::1', 1619444583, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393434343337313b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('818cbc46e2cc0fac493520f4434853bacb5de4ba', '::1', 1619095017, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393039343733373b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b746f7572706f7075707c693a313b),
('862d576625f4828ed45e545a18b0fd18ec59b978', '::1', 1619104491, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393130343233303b746f7572706f7075707c693a313b),
('883590465ce81cf3f562fc799da783a6d37f6148', '::1', 1619103434, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393130333335343b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b746f7572706f7075707c693a313b),
('88e5d33920c478ebef143c128df5c73d22ca744d', '::1', 1619083696, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393038333430393b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('8e65e23f7a9f59ac91e77a402c144996625cd30a', '::1', 1618785529, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738353233323b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('a000469ae3e3b476b541b397f9809817fd78e316', '::1', 1618781100, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738313036303b736974655f6c616e7c733a373a22656e676c697368223b),
('a1c3ed541333806f0191d6bd1d5336e4abdd6a88', '::1', 1619084453, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393038343230313b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('a3f65ca4a5d8306337e7c652a44ea5c365ba8549', '::1', 1619438760, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393433383633373b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('a583062bad66702fd5ab756e9333a4c4c0797dd5', '::1', 1619434106, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393433343039363b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b746f7572706f7075707c693a313b),
('a673c85bec25f21564825832ca2c92e18b1fa923', '::1', 1619442831, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393434323632313b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('ac53edbf1b829c0948c751d04c4db007eb8ad011', '::1', 1619095105, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393039353130303b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b746f7572706f7075707c693a313b),
('b0c704e40da7b2490fe8a33c398822622beb8646', '::1', 1619104217, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393130343132343b746f7572706f7075707c693a313b),
('baf773a5729763b3bb2920cffa4666cdd32687b7', '::1', 1619106647, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393130363338323b746f7572706f7075707c693a313b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('bbb08bea2e86d3f561c456a39223a792207ef0df', '::1', 1618785957, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738353636383b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('c0142829e527dbd66ed9d91939f297e41d35ff7a', '::1', 1618782260, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738323230303b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('c0f33c8a8dd453a7d2d1e9502e91029c4e50e907', '::1', 1619106883, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393130363638363b746f7572706f7075707c693a313b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('ce186d80b0acecf017bd6845e13cb1e8caa96ca0', '::1', 1619009449, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393030393434333b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('cea3a0e4c843ffaf1f4f8366e7a13332a1f4b75b', '::1', 1618785218, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738343933313b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('cfae2d9ef2e04d4dd1ff25902f1072bf083124a9', '::1', 1618783179, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738323931383b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('d39abe2365797163c98517efd940dfc350ad05bd', '::1', 1619438522, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393433383234383b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('d800d434fdbeb8e5e5725361d71ed124c517b36f', '::1', 1618783295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738333233343b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('d93436b3097c3df0d2db09b9912297c3e317aa30', '::1', 1619104523, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393130343532333b746f7572706f7075707c693a313b),
('dcab78d886fe39d47db549f183d7fbb12726d29e', '::1', 1619440776, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393434303439383b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('dd7982822284f893e7691bf99e88b1ada6f40e98', '::1', 1618786647, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738363336383b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('e7f9f586c9928f85dbdcd9798781045c99b2e627', '::1', 1619466998, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393436363732303b),
('ea6af1a6d182ff1ffc01243362d0829c776db974', '::1', 1618786110, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738353837313b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('ec8ebf8574c7689d97cd39ccdbeca3794e71feff', '::1', 1619470617, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393437303631373b),
('ed5307d87fd05d838200be63c765b70a82b4cc32', '::1', 1618781847, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738313538353b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('f8f92e5f0eda723038fa2d6cbdf42ec20fb784e9', '::1', 1618780871, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631383738303837313b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('f95ec3a74ada33ac8032de5d976878c84aa305dd', '::1', 1619105709, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393130353533313b746f7572706f7075707c693a313b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b),
('fb8af6353f55fb83ea0d6897345a4b2c466add64', '::1', 1619103348, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631393130333333373b63757272656e745f6c616e67756167657c733a373a22656e676c697368223b746f7572706f7075707c693a313b);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL,
  `phrase` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `english` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kinyarwanda` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`phrase_id`, `phrase`, `english`, `kinyarwanda`) VALUES
(4226, 'Home', 'Home', 'Ahabanza'),
(4227, 'Admin-Dashboard', 'Admin Dashboard', 'Admin Dashboard'),
(4228, 'Close', 'Close', 'Funga'),
(4229, 'Are-you-sure', 'Are you sure?', 'Urabyizeye?'),
(4231, 'Cancel', 'Cancel', 'Bihagarike'),
(4232, 'Are you sure you want to send sms ', 'Are you sure you want to send an SMS?', 'Ese koko urashaka kohereza ubutumwa bugufi?'),
(4233, 'Send', 'Send', 'Ohereza'),
(4234, 'Welcome to WIHERANWA.COM', 'Welcome to WIHERANWA.COM', 'Murakaza neza kura WIHERANWA.COM'),
(4235, 'About-Us', 'About Us', 'Abo turibo'),
(4236, 'Vision', 'Vision', 'Intumbero'),
(4237, 'Mission', 'Mission', 'Intego'),
(4238, 'Our-Team', 'Our Team', 'Itsinda ryacu'),
(4239, 'Recent-Posts', 'Recent Posts', 'Amakuru aheruka'),
(4240, 'Posted', 'Posted', 'Yanditswe'),
(4241, 'Comments', 'Comments', 'Ibitekerezo'),
(4242, 'Read-More', 'Read more', 'Soma inkuru yose'),
(4243, 'Follow-Us', 'Follow Us', 'Dukurikire'),
(4244, 'Recent-Comments', 'Recent comments', 'Ibitekerezo biheruka'),
(4245, 'Name', 'Name', 'Izina'),
(4246, 'Email', 'Email', 'Imeyili'),
(4247, 'Submit', 'Submit', 'Ohereza'),
(4248, 'Contact-Us', 'Contact us', 'Twandikire'),
(4249, 'Your-short-message', 'Your short message', 'Ubutumwa bwawe mu ncamake'),
(4250, 'Author', 'Author', 'Umwanditsi'),
(4251, 'Your comment', 'Your comment', 'Igitekerezo cyawe'),
(4252, 'Be the first to comment', 'Be the first to comment', 'Ba uwa mbere mu gutanga igitekerezo'),
(4253, 'Login', 'Login', 'Injira'),
(4254, 'Remember me', 'Remember me', 'Unyibuke'),
(4255, 'Username', 'Username', 'Izina ukoresha'),
(4256, 'Password', 'Password', 'Ijambobanga'),
(4257, 'Previous Page', 'Previous page', 'Subira Inyuma'),
(4258, 'Enter Username', 'Enter Username', 'Shyiramo izina ukoresha'),
(4259, 'Enter Password', 'Enter Password', 'Shyiramo ijambobanga'),
(4260, 'Invalid login', 'Invalid login', 'Kwinjira ntibyakunze'),
(4261, 'We are unable to process your login', 'Dear user! We are unable to proceed you login attemp using the following credentials:', 'Muraho! Ubusabe bwanyu bwo kwinjira muri sisitemu hifashishijwe amakuru akurikira ntibwakunze '),
(4262, 'For inquiry', 'For any inquiry, do not hesitate to contact the system administrator at', 'Mugize ikibazo, mwatwandikira kuri'),
(4263, 'Admins', 'Admins', 'Admins'),
(4264, 'Dashboard', 'Dashboard', 'Dashboard'),
(4265, 'Phone', 'Phone', 'Telefoni'),
(4267, 'Account-Status', 'Account Status', 'Uko konti ihagaze'),
(4268, 'Edit', 'Edit', 'Hindura'),
(4269, 'Delete', 'Delete', 'Emeza Gusiba'),
(4270, 'Address', 'Address', 'Address'),
(4271, 'Active', 'Active', 'Active'),
(4272, 'Inactive', 'Inactive', 'Inactive'),
(4273, 'New', 'New', 'New'),
(4275, 'Type-Account', 'Account Type', 'Ubwoko bwa Konti'),
(4276, 'Photo', 'Photo', 'Ifoto'),
(4277, 'Select', 'Select', 'Hitamo'),
(4278, 'Change', 'Change', 'Hindura'),
(4279, 'Add', 'Add', 'Ongeraho'),
(4280, 'Manage-Accountants', 'Manage Accountants', 'Manage Accountants'),
(4281, 'Prev', 'Prev', 'Ahabanza'),
(4282, 'Next', 'Next', 'Ahakurikira'),
(4283, 'TitleTitle', 'Title', 'Title'),
(4284, 'From', 'From', 'Guhera'),
(4285, 'To', 'To', 'Kugeza'),
(4286, 'Accountant', 'Accountant', 'Accountant'),
(4287, 'Salary', 'Salary', 'Umushahara'),
(4288, 'Title', 'Title', 'Title'),
(4289, 'Profile', 'Profile', 'Profile'),
(4290, 'PERSONALINFO', 'Personal Information', 'Personal Information'),
(4291, 'PersonalInfo', 'Personal Information', 'Personal Information'),
(4292, 'UpdateProfile', 'Update Profile', 'Update Profile'),
(4293, 'Photo', 'Photo', 'Photo'),
(4294, 'Change', 'Change', 'Change'),
(4295, 'Upload', 'Upload', 'Zamura'),
(4296, 'Male', 'Male', 'Gabo'),
(4297, 'Female', 'Female', 'Gore'),
(4298, 'Sex', 'Sex', 'Igitsina'),
(4299, 'Birthday', 'Birthday', 'Italiki y\'amavuko'),
(4300, 'UpdateProfile', 'Update Profile', 'Update Profile'),
(4301, 'Salary', 'Salary', 'Salary'),
(4302, 'New-Password', 'New Password', 'Ijambobanga rishya'),
(4303, 'Update-Password', 'Update Password', 'Hindura ijambobanga'),
(4304, 'Confirm-Password', 'Confirm Password', 'Emeza ijambobanga'),
(4305, 'Update', 'Update', 'Hindura'),
(4306, 'Accountants', 'Accountants', 'Accountants'),
(4307, 'Manage-Therapist', 'Manage Therapist', 'Manage Therapist'),
(4308, 'Manage-Members', 'Manage Members', 'Manage Members'),
(4309, 'Details', 'Details', 'Details'),
(4310, 'Vision-Data', 'Our vision is Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mi felis, dignissim id pellentesque mollis, ultricies et ipsum. eng 1', 'Our Viziyo dolor sit amet, consectetur adipiscing elit. Sed mi felis, dignissim id pellentesque mollis, ultricies et ipsum. Proin fermentum lobortis ligula ac malesuada. kin 2'),
(4311, 'Mission-Data', 'Our mission is Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mi felis, dignissim id pellentesque mollis, ultricies et ipsum. en2', 'Our misiyo is Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mi felis, dignissim id pellentesque mollis, ultricies et ipsum. kin 1'),
(4312, 'Stat-Data', 'Our stat is Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mi felis, dignissim id pellentesque mollis, ultricies et ipsum. en 4', 'Our stat Kinyarwanda is Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mi felis, dignissim id pellentesque mollis, ultricies et ipsum. kin 4'),
(4313, 'About-Data', 'About Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mi felis, dignissim id pellentesque mollis, ultricies et ipsum. Proin  enfv4fermentum lobortis ligula ac malesuada.', 'Kuri twe ipsum dolor sit amet, consectetur adipiscing elit. Sed mi felis, dignissim id pellentesque mollis, ultricies et ipsum. Proin fermentum lobortis ligula ac malesuada. kin 1'),
(4314, 'Pending', 'Pending', 'Pending'),
(4315, 'Deleted', 'Deleted', 'Byasibwe'),
(4316, 'Approved', 'Approved', 'Byemejwe'),
(4317, 'Rejected', 'Rejected', 'Byanzwe'),
(4318, 'Services', 'Services', 'Serivisi'),
(4319, 'Change-Language', 'Change Language', 'Hindura Ururimi'),
(4320, 'Register', 'Register', 'Iyandikishe'),
(4321, 'Our-Stories', 'Our Stories', 'Inkuru Zacu'),
(4322, 'Donate-To-Support', 'Donate to support WIHERANWA', 'Tanga inkunga yo gushyigikira WIHERANWA'),
(4323, 'About-WIHERANWA', 'About WIHERANWA', 'Kuri WIHERANWA'),
(4324, 'Share-your-story', 'Share your story', 'Dusangize inkuru yawe'),
(4325, 'Welcome-Back', 'Welcome back', 'Murakaza neza'),
(4326, 'Logout', 'Logout', 'Sohoka'),
(4327, 'Find-Therapist', 'Find therapist', 'Shaka umujyanama'),
(4328, 'My-Account', 'My account', 'Konti yanjye'),
(4329, 'Category', 'Category', 'Icyiciro'),
(4330, 'English-Post', 'English Post', 'Inkuru mu cyongereza'),
(4331, 'Kinyarwanda-Post', 'Kinyarwanda Post', 'Inkuru mu Kinyarwanda'),
(4332, 'English-Title', 'English Title', 'Umutwe w\'inkuru mu cyongereza'),
(4333, 'Kinyarwanda-Title', 'Kinyarwanda Title', 'Umutwe w\'inkuru mu Kinyarwanda'),
(4334, 'Notice', 'Notice', 'Icyitonderwa'),
(4335, 'Post-Instruction', 'You may either post in both languages, or post in one language. When you post in one language, it will be translated by the admin to make in available for both English users and Kinyarwanda users.', 'Ushobora kohereza inkuru mu ndimi zombi, cyangwa ugakoresha ururimi rumwe. Iyo ukoresheje ururimi rumwe, bibanza guhindurwa mu rundi rurimi na admin kugirango biboneke kubakoresha icyongereza ndetse nabakoresha Kinyarwanda.'),
(4336, 'Add-Post', 'Add Post', 'Ohereza Inkuru'),
(4337, 'Your recent posts', 'Your recent posts', 'Inkuru zawe ziheruka'),
(4338, 'Edit post', 'Edit post', 'Hindura inkuru'),
(4339, 'Confirm-Password', 'Confirm Password', 'Subiramo ijambobanga rishya'),
(4340, 'Change-Password', 'Change Password', 'Hindura Ijambobanga '),
(4341, 'Update-Profile', 'Update Profile', 'Hindura Umwirondoro'),
(4342, 'Personal-Info', 'Personal-Information', 'Umwirondoro');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `invoice_class` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `debit` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `invoice_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `creation_timestamp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `credit` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `student_id`, `invoice_class`, `description`, `debit`, `invoice_name`, `creation_timestamp`, `credit`) VALUES
(14, 43, '2', 'restorant', '442000', 'EAB8797\r\nEAB733\r\nEAB4395\r\nEAB8243\r\nEAB5361\r\nEAB3550\r\nEAB5351\r\nEAB9654\r\nEAB6104\r\nEAB2860\r\nEAB1197\r\nEAB1483\r\nEAB3261\r\nEAB992\r\nEAB7476\r\nEAB4521\r\nEAB7262\r\nEAB5467\r\nEAB8363\r\nEAB4760\r\nEAB913', '1591833600', 442420),
(15, 44, '1', 'School Tuition', '240000', 'EAB6516\r\nEAB2128\r\nEAB3798\r\nEAB1032\r\nEAB8834\r\nEAB2589\r\nEAB4717\r\nEAB482\r\nEAB7122\r\nEAB587\r\nEAB7745\r\nEAB6842\r\nEAB9432', '1590364800', 240000),
(16, 45, NULL, 'School Tuition', '350000', 'EAB525\r\nEAB8346\r\nEAB9310\r\nEAB5813\r\nEAB3232\r\nEAB4603\r\nEAB4617\r\nEAB4361\r\nEAB8639\r\nEAB2772\r\nEAB5618\r\nEAB3282\r\nEAB4962\r\nEAB6404\r\nEAB1062\r\nEAB5272\r\nEAB6446\r\nEAB5680', '1590364800', 350000),
(17, 53, '1', 'School Tuition', '56000', 'EAB8726\r\nEAB5757\r\nEAB8605\r\nEAB764\r\nEAB6311\r\nEAB1071', '1595808000', 57000),
(18, 50, '1', 'School Tuition', '80000', 'EAB7196\r\nEAB3025', '1590364800', 80000),
(19, 54, '1', 'School Tuition for term 1, 2020', '40000', 'EAB2728\r\nEAB5443', '1590364800', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'system_name', 'Kimomo Safaris'),
(2, 'system_title', 'Kimomo Safaris'),
(3, 'address', 'Kigali, Rwanda'),
(4, 'phone', '250788269437'),
(5, 'paypal_email', ''),
(6, 'currency', 'Rwf'),
(7, 'system_email', 'info@kimomosafaris.com'),
(20, 'rtl', 'ltr'),
(11, 'language', 'english'),
(13, 'minimark', 'rtl'),
(15, 'ad', 'Welcome to Kimomo Safaris'),
(16, 'skin_colour', 'blue'),
(18, 'domain', 'rtl'),
(21, 'running_year', '2020'),
(22, 'facebook_url', 'https://facebook.com/'),
(23, 'twitter_url', 'https://twitter.com/'),
(24, 'google_url', 'https://google.com/'),
(25, 'instagram_url', 'https://instagram.com//'),
(26, 'linkedin_url', 'https://linkedin.com/'),
(27, 'pinterest_url', 'https://pinterest.com'),
(28, 'dribbble_url', 'https://dribbble.com'),
(29, 'youtube_url', 'https://youtube.com/'),
(30, 'default_comment_status', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `title` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `posted_by` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `title`, `description`, `date`, `timestamp`, `status`, `posted_by`) VALUES
(1, 'Gorilla Tracking', 'Day 1 - Kigali to Akagera National Park\r\nDay 2 - Akagera National Park\r\nDay 3 - Akagera National Park to Kigali\r\nDay 4 - Kigali to Volcanoes National Park\r\nDay 5 - Volcanoes National Park\r\nDay 6 - Flight departs from Kigali.', '25/04/2021', '2021-04-22 10:10:13', '1', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountant`
--
ALTER TABLE `accountant`
  ADD PRIMARY KEY (`accountant_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attendance_backup`
--
ALTER TABLE `attendance_backup`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`phrase_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountant`
--
ALTER TABLE `accountant`
  MODIFY `accountant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `attendance_backup`
--
ALTER TABLE `attendance_backup`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4343;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
