-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 02:06 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shrimp`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Phone_cus` varchar(10) NOT NULL,
  `name_cus` varchar(20) NOT NULL,
  `sur_cus` varchar(20) NOT NULL,
  `PAID` tinyint(1) DEFAULT 0,
  `role` varchar(5) NOT NULL,
  `address` text NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `IMG` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Phone_cus`, `name_cus`, `sur_cus`, `PAID`, `role`, `address`, `Username`, `Password`, `IMG`) VALUES
('0973243245', 'lik', 'pounh', 1, 'user', 'จินดาดาง อำเภอ สำเพลิง', 'Pao', '2231', '8.png'),
('0976548634', 'un', 'errt', 0, 'user', 'killerpass dasxzxw', 'Pao13', '22312314', NULL),
('0987654321', 'llk', 'dwaas', 0, 'user', 'dwdffzx', 'pol', '8890', '9.2.png'),
('0988278600', 'ภูมิ', 'หมีพล', 1, 'user', 'dqwd', 'pok', '12313', '9.1.png'),
('0988278697', 'qaweq', '123', 0, 'admin', 'qweq', 'pea', '12312', NULL),
('8790342413', '1231e', 'aweqwdas', 0, 'user', 'dadaw', 'pol2', '123431312312e33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `farm`
--

CREATE TABLE `farm` (
  `Pond` char(2) NOT NULL,
  `Name_Comp` varchar(10) DEFAULT NULL,
  `DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farm`
--

INSERT INTO `farm` (`Pond`, `Name_Comp`, `DATE`) VALUES
('1', 'ขนส่ง1', '2022-11-03'),
('2', 'ขนส่ง2', '2022-11-09'),
('3', 'ขนส่ง1', '2022-11-29'),
('4', 'ขนส่ง1', '2022-10-05'),
('5', NULL, NULL),
('6', NULL, NULL),
('7', NULL, NULL),
('8', NULL, NULL),
('9', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pond`
--

CREATE TABLE `pond` (
  `Pond` char(2) NOT NULL COMMENT 'บ่อ',
  `Pond_size` int(9) DEFAULT NULL,
  `type_shrimp` varchar(20) DEFAULT NULL,
  `day_shrimp` int(3) DEFAULT NULL,
  `num_shrimp` int(8) DEFAULT NULL,
  `Pond_O2 %` int(3) DEFAULT NULL,
  `Pond_Mg %` int(3) DEFAULT NULL,
  `Pond_Ca %` int(3) DEFAULT NULL,
  `Pond_Na %` int(3) DEFAULT NULL,
  `COMPANY` varchar(20) DEFAULT NULL,
  `Phnumber` char(10) DEFAULT NULL,
  `cost` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pond`
--

INSERT INTO `pond` (`Pond`, `Pond_size`, `type_shrimp`, `day_shrimp`, `num_shrimp`, `Pond_O2 %`, `Pond_Mg %`, `Pond_Ca %`, `Pond_Na %`, `COMPANY`, `Phnumber`, `cost`) VALUES
('1', 2, 'ก้ามกาม', 80, 120000, 22, 12, 23, 8, 'CP', '0988278600', 800000),
('2', 3, 'ขาว', 83, 300000, 22, 14, 20, 12, 'ว.จ.', '0973243245', 20000000),
('3', 5, 'ก้ามกาม', 129, 300000, 21, 10, 21, 11, 'CP', '0973243245', 120000000),
('4', 5, 'ขาว', 97, 500000, 23, 12, 35, 17, 'CP', NULL, 30000000),
('5', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('6', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('7', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('8', 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('9', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `Num_re` int(11) NOT NULL,
  `Pond` char(2) NOT NULL,
  `Phone_cus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`Num_re`, `Pond`, `Phone_cus`) VALUES
(1238619, '1', '0988278600'),
(1238620, '2', '0988278600'),
(1238621, '3', '0988278600'),
(1238622, '3', '0973243245'),
(1238623, '2', '0973243245');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Sup_name` varchar(100) NOT NULL,
  `Sup_sur` varchar(100) NOT NULL,
  `COMPANY` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Sup_name`, `Sup_sur`, `COMPANY`) VALUES
('jaisu', 'toyak', 'CP'),
('jaika', 'tailawn', 'ว.จ.');

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `Name_Comp` char(20) NOT NULL,
  `name_Tr` varchar(100) NOT NULL,
  `surname_Tr` varchar(100) NOT NULL,
  `PHnum` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`Name_Comp`, `name_Tr`, `surname_Tr`, `PHnum`) VALUES
('ขนส่ง1', 'สมเกียร', 'พลพัก', '0986547241'),
('ขนส่ง2', 'ดลชัย', 'ยลใจ', '0872134463');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Phone_cus`);

--
-- Indexes for table `farm`
--
ALTER TABLE `farm`
  ADD PRIMARY KEY (`Pond`),
  ADD KEY `Name_Comp` (`Name_Comp`);

--
-- Indexes for table `pond`
--
ALTER TABLE `pond`
  ADD PRIMARY KEY (`Pond`),
  ADD KEY `Phnumber` (`Phnumber`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`Num_re`),
  ADD KEY `Pond` (`Pond`),
  ADD KEY `Phone_cus` (`Phone_cus`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`COMPANY`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`Name_Comp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `Num_re` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1238624;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
