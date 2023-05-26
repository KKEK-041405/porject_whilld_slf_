-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 01:36 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbts`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Accession_no` varchar(10) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Branch` varchar(50) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `is_available` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Accession_no`, `Title`, `Branch`, `Author`, `is_available`) VALUES
('1010', 'Inventions', 'DCME', 'munna', 1),
('1011', 'alibaba', 'DCME', 'someone', 1),
('1012', 'dMART', 'DME', 'munna', 1),
('1013', 'HD', 'DME', 'someone', 1),
('1014', 'UHD', 'DEEE', 'munna', 1),
('1015', 'QHD', 'DEEE', 'someone', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `is_admin` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`Username`, `Password`, `is_admin`) VALUES
('admin', 'admin', '1'),
('20014-cm-033', 'kkek', '0'),
('20014-cm-063', 'chiru', '0'),
('20014-cm-064', 'sai', '0'),
('20014-cm-017', 'phani', '0');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `Transaction_id` varchar(50) NOT NULL,
  `Accession_no` varchar(10) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Reciver_pin-no` varchar(12) NOT NULL,
  `issuance_date` varchar(50) NOT NULL,
  `Reurn_date` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`Transaction_id`, `Accession_no`, `Title`, `Reciver_pin-no`, `issuance_date`, `Reurn_date`, `Status`) VALUES
('[555000', '1010', 'iventions', '20014-cm-033', 'none', 'none', 'ON_DUE');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
