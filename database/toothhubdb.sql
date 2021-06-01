-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2021 at 09:23 PM
-- Server version: 5.7.33-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toothhubdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `time_sent` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `time_sent`) VALUES
(3, 'John Rupert Sierra', 'lyvanjoe@gmail.com', 'Yow', '2021-05-31 15:48:03.000000'),
(4, 'Krizelle Mae Falcasantos', 'ejoib78@gmail.com', 'Thank you', '2021-05-31 18:26:13.000000'),
(5, 'Jude De Guzman', 'deguzmanjude03@gmail.com', 'Well recommended. ', '2021-05-31 22:48:35.000000');

-- --------------------------------------------------------

--
-- Table structure for table `med_stat`
--

CREATE TABLE `med_stat` (
  `med_id` int(100) NOT NULL,
  `weight` varchar(20) DEFAULT NULL,
  `temperature` varchar(20) DEFAULT NULL,
  `bp` varchar(20) DEFAULT NULL,
  `pr` varchar(20) DEFAULT NULL,
  `bleeding` varchar(20) DEFAULT NULL,
  `heart` varchar(20) DEFAULT NULL,
  `diabetes` varchar(20) DEFAULT NULL,
  `hypertension` varchar(20) DEFAULT NULL,
  `allergy` varchar(20) DEFAULT NULL,
  `other` varchar(50) DEFAULT NULL,
  `patient_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `sex` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `mobile_num` varchar(100) NOT NULL,
  `balance` double NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `linked` int(1) NOT NULL DEFAULT '0',
  `stat` varchar(50) NOT NULL DEFAULT 'Not linked',
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(25) NOT NULL,
  `amount` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `patient_id` int(23) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request_apnt`
--

CREATE TABLE `request_apnt` (
  `apnt_id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `num` varchar(30) NOT NULL,
  `service` varchar(30) NOT NULL,
  `app_date` date NOT NULL,
  `app_time` varchar(8) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `accepted` int(1) NOT NULL DEFAULT '0',
  `user_id` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_apnt`
--

INSERT INTO `request_apnt` (`apnt_id`, `name`, `email`, `num`, `service`, `app_date`, `app_time`, `status`, `accepted`, `user_id`) VALUES
(17, 'Jude  De Guzman', 'deguzmanjude03@gmail.com', '09672784862', 'Extraction', '2021-06-03', '10:00 AM', 'Pending', 0, 40);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(20) NOT NULL,
  `service_name` varchar(30) DEFAULT NULL,
  `description` varchar(30) DEFAULT NULL,
  `fee` varchar(100) DEFAULT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `description`, `fee`, `img`) VALUES
(1, 'Extraction', 'Price may vary', '600', 'services/49b8de990b83a525f1e3c45a4c979aa8extraction.png'),
(2, 'Braces', '10k monthly', '60000', 'services/3423cd535adc5a821bbab0aaba0916bdbraces.jpg'),
(3, 'Tooth Filling', 'Price may vary', '800', 'services/8d58871b71c672fa9ed409b6d5dfac53filling.jpg'),
(4, 'Dentures', 'Price may vary', '500', 'services/7604fcd4e22e58a45a2560f06dc5c9bfdentures1.jpg'),
(6, 'Tooth Cleaning', 'Price may vary', '500', 'services/14bb2d178364bc6fd9654063a1c58f25cleaning3.jpg'),
(7, 'Root Canal', 'Price may vary', '1000', 'services/d8eca2f6fcaa894d63b4cd9dea6f4ef7root-canal.jpg'),
(8, 'Retainer', 'Price may vary', '10000', 'services/a30084945c90e82745015e10746916fbretainer.png'),
(9, 'Fixed Bridge', 'Price may vary', '10000', 'services/76329b491ce445431bc8c38f3abfeaedbridge.jpg'),
(11, 'Veneers', 'Price may vary', '200', 'services/268f648a524321ab52c9a55609896216veneers.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tooth_num` varchar(150) NOT NULL,
  `treatment` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `fee` double NOT NULL,
  `treatment_id` int(10) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `access` varchar(15) NOT NULL DEFAULT '0',
  `v_code` int(20) NOT NULL,
  `status` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `patient_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `access`, `v_code`, `status`, `date_created`, `patient_id`) VALUES
(1, '', '', 'toothhubtetuan@gmail.com', 'admin010203', 'admin', 0, 1, '2021-05-24 20:04:09', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `med_stat`
--
ALTER TABLE `med_stat`
  ADD PRIMARY KEY (`med_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `request_apnt`
--
ALTER TABLE `request_apnt`
  ADD PRIMARY KEY (`apnt_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`treatment_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `med_stat`
--
ALTER TABLE `med_stat`
  MODIFY `med_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `request_apnt`
--
ALTER TABLE `request_apnt`
  MODIFY `apnt_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `treatment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `med_stat`
--
ALTER TABLE `med_stat`
  ADD CONSTRAINT `med_stat_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
