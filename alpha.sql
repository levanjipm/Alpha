-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2019 at 02:00 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alpha`
--

-- --------------------------------------------------------

--
-- Table structure for table `code_project`
--

CREATE TABLE `code_project` (
  `id` int(255) NOT NULL,
  `created_by` int(10) NOT NULL,
  `client_id` int(255) NOT NULL,
  `document_name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `event_date` date NOT NULL,
  `description` text NOT NULL,
  `created_by` int(255) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `event_date`, `description`, `created_by`, `created_date`) VALUES
(1, 'Daniel Tri', '2019-04-08', 'danielasldkfjas;dlkfja;sldh a;ldkfj a;slkdfj;a sldfa; sldkfja; ', 1, '2019-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `mst_client`
--

CREATE TABLE `mst_client` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `npwp` varchar(25) NOT NULL,
  `created_by` int(10) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_client`
--

INSERT INTO `mst_client` (`id`, `name`, `address`, `city`, `pic`, `phone`, `email`, `npwp`, `created_by`, `created_date`) VALUES
(1, 'CV Agung Elektrindo', 'Jalan jamuju no. 18', 'Bandung', 'Daniel Tri', '(022) 7202747', '', '', 1, '2019-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `mst_weather`
--

CREATE TABLE `mst_weather` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_by` int(10) NOT NULL,
  `created_date` date NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_weather`
--

INSERT INTO `mst_weather` (`id`, `name`, `created_by`, `created_date`, `is_deleted`) VALUES
(1, 'Daniel', 1, '2019-07-22', 0),
(2, 'Cerah banget', 1, '2019-07-22', 0),
(3, 'Berawan', 1, '2019-07-22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_bored_pile`
--

CREATE TABLE `project_bored_pile` (
  `id` int(255) NOT NULL,
  `bored_pile` varchar(50) NOT NULL,
  `main_diameter` decimal(20,2) NOT NULL,
  `main_coordinate_x` decimal(20,2) NOT NULL,
  `main_coordinate_y` decimal(20,2) NOT NULL,
  `main_depth` decimal(20,2) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_bored_pile`
--

INSERT INTO `project_bored_pile` (`id`, `bored_pile`, `main_diameter`, `main_coordinate_x`, `main_coordinate_y`, `main_depth`, `project_id`) VALUES
(1, '', '0.00', '0.00', '0.00', '0.00', 0),
(2, '', '0.00', '0.00', '0.00', '0.00', 0),
(3, '', '0.00', '0.00', '0.00', '0.00', 0),
(4, '', '0.00', '0.00', '0.00', '0.00', 0),
(5, '', '0.00', '0.00', '0.00', '0.00', 0),
(6, '', '0.00', '0.00', '0.00', '0.00', 0),
(7, '', '0.00', '0.00', '0.00', '0.00', 0),
(8, '', '0.00', '0.00', '0.00', '0.00', 0),
(9, '', '0.00', '0.00', '0.00', '0.00', 0),
(10, '', '0.00', '0.00', '0.00', '0.00', 0),
(11, '', '0.00', '0.00', '0.00', '0.00', 0),
(12, '', '0.00', '0.00', '0.00', '0.00', 0),
(13, '', '0.00', '0.00', '0.00', '0.00', 0),
(14, '', '0.00', '0.00', '0.00', '0.00', 0),
(15, '', '0.00', '0.00', '0.00', '0.00', 0),
(16, 'A1', '30.00', '0.00', '0.00', '50.00', 0),
(17, 'A2', '30.00', '20.00', '10.00', '50.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_picture_url` varchar(200) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `password`, `profile_picture_url`, `is_active`) VALUES
(1, 'Daniel', 'Tri', 'danieltri', 'jamuju18', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `code_project`
--
ALTER TABLE `code_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_client`
--
ALTER TABLE `mst_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_weather`
--
ALTER TABLE `mst_weather`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_bored_pile`
--
ALTER TABLE `project_bored_pile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `code_project`
--
ALTER TABLE `code_project`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mst_client`
--
ALTER TABLE `mst_client`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mst_weather`
--
ALTER TABLE `mst_weather`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_bored_pile`
--
ALTER TABLE `project_bored_pile`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
