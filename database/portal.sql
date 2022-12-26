-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2022 at 08:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `username`, `password`, `created_datetime`, `status`) VALUES
(3, 'Poshan Sahu', 'poshansahu', 'admin', '2022-12-23 15:47:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `alloat`
--

CREATE TABLE `alloat` (
  `id` int(11) NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `disease_name` varchar(100) NOT NULL,
  `appointment_datetime` datetime NOT NULL,
  `last_appointment_datetime` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alloat`
--

INSERT INTO `alloat` (`id`, `doctor_id`, `patient_id`, `disease_name`, `appointment_datetime`, `last_appointment_datetime`, `status`) VALUES
(9, 8, 'Ajay', 'diabetes', '2022-12-25 13:41:00', '2022-12-16 13:41:00', 2),
(10, 9, 'Mukesh', 'cancer', '2022-12-27 18:08:00', '2022-12-16 18:08:00', 0),
(11, 9, 'Neela', 'stroke', '2022-12-30 18:08:00', '2022-12-06 18:09:00', 2),
(12, 9, 'Jitendra', 'cancer', '2022-12-31 18:09:00', '2022-11-25 18:09:00', 1),
(13, 9, 'Aniket', 'cancer', '2022-12-07 18:09:00', '2022-12-28 18:10:00', 0),
(14, 10, 'Ajay', 'tuberculosis', '2022-12-07 18:10:00', '2022-12-07 18:10:00', 2),
(15, 10, 'Deepak', 'covid-19', '2022-12-06 18:11:00', '2022-12-31 18:11:00', 3),
(16, 10, 'Jagriti', 'covid-19', '2023-01-07 18:11:00', '2022-12-01 18:12:00', 3),
(17, 11, 'Deepak', 'vector-borne', '2022-12-30 18:12:00', '2022-12-14 18:12:00', 3),
(18, 11, 'Kavita', 'covid-19', '2022-12-31 00:16:00', '2022-12-08 00:16:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `primary_contact_number` bigint(20) NOT NULL,
  `secondary_contact_number` bigint(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `adharcard_number` bigint(20) NOT NULL,
  `pancard_number` varchar(100) NOT NULL,
  `joining_date` date NOT NULL,
  `speciality_id` int(11) NOT NULL,
  `visit_time_from` time NOT NULL,
  `visit_time_to` time NOT NULL,
  `created_date` date NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `fullname`, `email_id`, `primary_contact_number`, `secondary_contact_number`, `address`, `adharcard_number`, `pancard_number`, `joining_date`, `speciality_id`, `visit_time_from`, `visit_time_to`, `created_date`, `username`, `password`, `status`) VALUES
(9, 'Dr. Jain', 'jain@gmail.com', 9678652907, 9691582907, 'Raipur Chhattisgarh', 123456542765, 'LXIPS3372M', '2022-12-25', 2, '10:00:00', '05:00:00', '0000-00-00', 'jain', 'jain', 1),
(10, 'Dr. Yash Sahu', 'yash@gmail.com', 8564534567, 8976543456, 'Bhilai, Chhattisgarh', 123456542776, 'LXIPS3372K', '2022-12-25', 4, '22:00:00', '03:00:00', '0000-00-00', 'yash', 'yash', 1),
(11, 'Dr. Neha ', 'neha@gmail.com', 8765678987, 4545678765, 'Raipur Chhattisgarh', 123456542776, 'LXIPS4382M', '2022-12-25', 3, '10:00:00', '12:00:00', '0000-00-00', 'neha', 'neha', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `primary_contact_number` bigint(20) NOT NULL,
  `secondary_contact_number` bigint(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `adharcard_number` bigint(20) NOT NULL,
  `pancard_number` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `fullname`, `primary_contact_number`, `secondary_contact_number`, `address`, `adharcard_number`, `pancard_number`, `username`, `password`, `status`) VALUES
(3, 'Ajay Das', 919691582907, 919691582907, 'Ward No. - 03, Village - Bhasera, Fingeshwar', 123456542134, 'LXIPS4382M', 'ajay', 'ajay', 1),
(4, 'Mukesh', 9845434567, 6567897654, 'Raipur Chhattisgarh', 187986542136, 'LXIPS4382O', 'mukesh', 'mukesh', 1),
(5, 'Aniket Jain', 9898786564, 8787876754, 'ankit@gmail.com', 123456892765, 'LXIPS3272N', 'ankit', 'ankit', 1),
(6, 'Deepak Tiwari', 8899877678, 7878656787, 'deepak@gmail.com', 187986542133, 'LXIPS3372H', 'deepak', 'deepak', 1),
(7, 'Veena Kosle', 9898987889, 6767789876, 'veena@gmail.com', 187986542133, 'LXIPS3272F', 'veena', 'veena', 1),
(8, 'Jagriti Sahu', 9898787878, 2233223234, 'jagriti@gmail.com', 123456542767, 'LXIPS3372D', 'jagriti', 'jagriti', 1),
(9, 'Jitendra Lal', 88786564, 6767656787, 'jitendra@gmail.com', 187986542135, 'LXIPS3272L', 'jitendra', 'jitendra', 1),
(10, 'Neela Sahu', 8989898989, 9856564576, 'neelam@gmail.com', 187986542138, 'LXIKS3372D', 'neelam', 'neelam', 1),
(11, 'Kavita Jain', 9878787878, 98765456876, 'Bhilai, Chhattisgarh', 123876542765, 'LXIPS3372I', 'kavita', 'kavita', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `alloat`
--
ALTER TABLE `alloat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `alloat`
--
ALTER TABLE `alloat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
