-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2019 at 04:24 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.25

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

--
-- Dumping data for table `code_project`
--

INSERT INTO `code_project` (`id`, `created_by`, `client_id`, `document_name`, `start_date`, `created_date`) VALUES
(1, 1, 0, 'asdf', '1994-04-08', '2019-08-21'),
(2, 1, 0, 'asdf', '1994-04-08', '2019-08-21'),
(3, 1, 1, 'asdf', '1994-04-08', '2019-08-21'),
(4, 1, 1, 'asdf', '2019-09-25', '2019-09-25'),
(5, 1, 1, 'asdf', '2019-09-25', '2019-09-25'),
(6, 1, 1, 'qwertyui', '2019-09-24', '2019-09-25'),
(7, 1, 1, 'qwertyui', '2019-09-24', '2019-09-25'),
(8, 1, 1, 'qwertyui', '2019-09-24', '2019-09-25'),
(9, 1, 1, 'qwertyui', '2019-09-24', '2019-09-25'),
(10, 1, 1, 'qwertyui', '2019-09-24', '2019-09-25'),
(11, 1, 1, 'qwertyui', '2019-09-24', '2019-09-25'),
(12, 1, 1, 'qwertyui', '2019-09-24', '2019-09-25'),
(13, 1, 1, 'qwertyui', '2019-09-24', '2019-09-25'),
(14, 1, 1, 'qwertyui', '2019-09-24', '2019-09-25'),
(15, 1, 1, 'qwertyui', '2019-09-24', '2019-09-25'),
(16, 1, 1, 'qwertyui', '2019-09-24', '2019-09-25'),
(17, 1, 1, 'qwertyui', '2019-09-24', '2019-09-25'),
(18, 1, 1, 'qwertyui', '2019-09-24', '2019-09-25'),
(19, 1, 1, 'qwertyui', '2019-09-24', '2019-09-25'),
(20, 1, 1, 'qwertyui', '2019-09-24', '2019-09-25'),
(21, 1, 1, 'qwertyui', '2019-09-24', '2019-09-25'),
(22, 1, 1, 'qwertyui', '2019-09-24', '2019-09-25'),
(23, 1, 1, 'qwertyui', '2019-09-24', '2019-09-25');

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
-- Table structure for table `main_task`
--

CREATE TABLE `main_task` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `coordinate_x` int(11) NOT NULL,
  `coordinate_y` int(11) NOT NULL,
  `diameter` int(11) NOT NULL,
  `depth` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `other_task`
--

CREATE TABLE `other_task` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `preliminary_task`
--

CREATE TABLE `preliminary_task` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(5) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preliminary_task`
--

INSERT INTO `preliminary_task` (`id`, `name`, `quantity`, `unit`, `project_id`) VALUES
(1, 'aasdf', 2, 'Lot', 23);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `password`) VALUES
(1, 'Daniel', 'Tri', 'danieltri', 'daniel'),
(2, 'Vanji', 'Dwi', 'vanjidwi', '');

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
-- Indexes for table `preliminary_task`
--
ALTER TABLE `preliminary_task`
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- AUTO_INCREMENT for table `preliminary_task`
--
ALTER TABLE `preliminary_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
