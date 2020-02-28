-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 02, 2019 at 09:28 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `police`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id_no` int(8) NOT NULL,
  `case_no` varchar(100) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cells`
--

CREATE TABLE `cells` (
  `number` int(100) NOT NULL,
  `status` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cells`
--

INSERT INTO `cells` (`number`, `status`) VALUES
(1, 1),
(2, 1),
(3, 0),
(4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `center`
--

CREATE TABLE `center` (
  `code` varchar(100) NOT NULL,
  `name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`code`, `name`) VALUES
('831', 'Eldoret West');

-- --------------------------------------------------------

--
-- Table structure for table `cr`
--

CREATE TABLE `cr` (
  `id` int(10) NOT NULL,
  `cr_no` varchar(100) NOT NULL,
  `ob_no` varchar(100) NOT NULL,
  `c_date` varchar(10) NOT NULL,
  `c_time` varchar(10) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_address` varchar(50) NOT NULL,
  `Assulted_tel` int(10) NOT NULL,
  `a_name` varchar(50) NOT NULL,
  `a_id` int(8) NOT NULL,
  `a_address` varchar(50) NOT NULL,
  `a_occupation` varchar(50) NOT NULL,
  `a_nationality` varchar(50) NOT NULL DEFAULT 'Kenyan',
  `a_age` int(8) NOT NULL,
  `a_sex` varchar(6) NOT NULL,
  `a_method` varchar(500) NOT NULL,
  `a_cell` varchar(20) NOT NULL DEFAULT '0',
  `cell_transfer` varchar(5) NOT NULL,
  `a_date` varchar(10) NOT NULL,
  `a_time` varchar(10) NOT NULL,
  `a_phy` varchar(10000) NOT NULL,
  `a_officer` varchar(100) NOT NULL,
  `court_name` varchar(250) NOT NULL,
  `court_file_number` varchar(250) NOT NULL,
  `cdo` varchar(250) NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `Investigator` varchar(250) NOT NULL,
  `hcl` varchar(250) NOT NULL,
  `cout` varchar(100) NOT NULL,
  `outcome_date` varchar(15) NOT NULL,
  `r_date` varchar(10) NOT NULL,
  `r_time` varchar(10) NOT NULL,
  `r_phy` varchar(10000) NOT NULL,
  `r_iofficer` varchar(1000) NOT NULL,
  `status` int(2) NOT NULL,
  `disposed` int(11) NOT NULL DEFAULT '0',
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cr`
--

INSERT INTO `cr` (`id`, `cr_no`, `ob_no`, `c_date`, `c_time`, `c_name`, `c_address`, `Assulted_tel`, `a_name`, `a_id`, `a_address`, `a_occupation`, `a_nationality`, `a_age`, `a_sex`, `a_method`, `a_cell`, `cell_transfer`, `a_date`, `a_time`, `a_phy`, `a_officer`, `court_name`, `court_file_number`, `cdo`, `remarks`, `Investigator`, `hcl`, `cout`, `outcome_date`, `r_date`, `r_time`, `r_phy`, `r_iofficer`, `status`, `disposed`, `type`) VALUES
(1, '831/1/2019', '1/28/03/2019', '2019-03-28', '12:59', 'samuel mwangi', '100 eldoret', 0, 'safaricom', 88576645, '564 westLand', 'Security Consultant', 'kenyan', 67, 'Male', 'Summons', '1', '2', '2019-03-28', '01:00', 'better', 'corporal james class', 'Milimani Law Court', 'sel/17/56', 'sam34', '', 'Inspector paul kamau', '788', 'Fined', '2019-03-28', '2019-03-28', '01:00', 'good', 'corporal james class', 1, 1, ''),
(2, '831/2/2019', '2/28/03/2019', '', '', 'james kamau', '546 eistleigh', 704922042, 'Professor', 0, '', '', 'Kenyan', 0, '', 'Punches And Knives', '0', '', '2019-03-28', '12:59 AM', '', 'Chief Inspector Samuel Mwangi', '', '', '', '', '', '', 'Withdrawn', '2019-03-28', '', '', '', '', 0, 0, 'Assault');

-- --------------------------------------------------------

--
-- Table structure for table `offenses`
--

CREATE TABLE `offenses` (
  `id_no` int(8) NOT NULL,
  `section` varchar(1000) NOT NULL,
  `law` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `id` int(10) NOT NULL,
  `Rank` varchar(100) NOT NULL,
  `names` varchar(100) NOT NULL,
  `id_card` int(8) NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`id`, `Rank`, `names`, `id_card`, `phone`) VALUES
(3, 'corporal', 'james class', 321345, 70492202),
(1, 'Chief Inspector', 'Samuel Mwangi', 22321145, 798608703),
(2, 'Inspector', 'paul kamau', 77645532, 705877568);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(8) NOT NULL,
  `stolen` int(100) NOT NULL,
  `recovered` int(100) NOT NULL,
  `missing` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `Rank` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`Rank`) VALUES
('Chief Inspector'),
('Inspector'),
('corporal'),
('Senior Sergent'),
('Sergent'),
('Corporal');

-- --------------------------------------------------------

--
-- Table structure for table `statements`
--

CREATE TABLE `statements` (
  `id` varchar(8) NOT NULL,
  `sdt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(10000) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `Remarks` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `level` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`, `status`) VALUES
(5, 'james mwangi ', '7c222fb2927d828af22f592134e8932480637c0d', 'corporal', 0),
(6, 'pirate pirate ', '85a93d738ba2f41c28b00f240bb87287366abe8b', 'Sergent', 0),
(7, 'sam sam ', '85a93d738ba2f41c28b00f240bb87287366abe8b', 'Senior Sergent', 0),
(1, 'samuel mwangi', '85a93d738ba2f41c28b00f240bb87287366abe8b', 'Chief Inspector', 1),
(2, 'stephen shifoko', '2cac1b7c6544cc8cfde255dd817480a4fc94a6fb', 'Chief Inspector', 0),
(4, 'stephen sienko', 'a8826f1fe625bec7b3047ab4054fe2213f085897', 'Chief Inspector', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cells`
--
ALTER TABLE `cells`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `cr`
--
ALTER TABLE `cr`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cr_no` (`cr_no`),
  ADD KEY `ob_no` (`ob_no`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`id_card`,`phone`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cr`
--
ALTER TABLE `cr`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `officers`
--
ALTER TABLE `officers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
