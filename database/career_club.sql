-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 05:53 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `career_club`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
('6307c8c039ff1', 'admin', 'admin@gmail.com', 'ac9689e2272427085e35b9d3e3e8bed88cb3434828b43b86fc0596cad4c6e270');

-- --------------------------------------------------------

--
-- Table structure for table `buypackage`
--

CREATE TABLE `buypackage` (
  `id` int(11) NOT NULL,
  `numberofpost` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `employerid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buypackage`
--

INSERT INTO `buypackage` (`id`, `numberofpost`, `amount`, `employerid`) VALUES
(39, 9, '250.00', '632ccd2d496d0 ');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `adminid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `adminid`) VALUES
(1, 'Graphics Designer', '6307c8c039ff1'),
(2, 'Content Writer', '6307c8c039ff1'),
(3, 'Frontend Developer', '6307c8c039ff1'),
(4, 'Backend Developer', '6307c8c039ff1'),
(5, 'Bank/Non Bank', '6307c8c039ff1'),
(6, 'Garments/Textile', '6307c8c039ff1'),
(7, 'Marketing/Sales', '6307c8c039ff1');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` int(15) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `companyname` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `authentication` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `bantime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id`, `name`, `companyname`, `location`, `email`, `mobile`, `password`, `position`, `otp`, `authentication`, `status`, `bantime`) VALUES
('632ccd2d496d0', 'Siam khan', 'SwipeWire', 'Narayanganj', 'minhajulsiam786@gmail.com', '01900110022', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'employer', 487717, 'Verified', 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE `interview` (
  `id` varchar(255) NOT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `employerid` varchar(255) DEFAULT NULL,
  `jobpostid` varchar(255) DEFAULT NULL,
  `jobapplyid` varchar(255) DEFAULT NULL,
  `meetingid` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interview`
--

INSERT INTO `interview` (`id`, `userid`, `employerid`, `jobpostid`, `jobapplyid`, `meetingid`, `time`, `url`, `password`) VALUES
('632ccf125d781', '632cce75995be', '632ccd2d496d0', '632ccdaa36950', '632ccec009b8f', '87412824825', '2022-09-30 17:10:00', 'https://us05web.zoom.us/j/87412824825?pwd=ZERDYm5lRnlBUDFDdzR2R1g0NnZiUT09', '12345'),
('6363f785a8f86', '632cce75995be', '632ccd2d496d0', '632cce217ef58', '6363f742154fd', '88045541392', '2022-11-24 23:16:00', 'https://us05web.zoom.us/j/88045541392?pwd=R0dBM2MwSVJ5TkhUZlNaWU95R0psQT09', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `jobapply`
--

CREATE TABLE `jobapply` (
  `id` varchar(255) NOT NULL,
  `cv` varchar(300) DEFAULT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `jobid` varchar(255) DEFAULT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `applytime` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jobpost`
--

CREATE TABLE `jobpost` (
  `id` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `companyname` varchar(255) DEFAULT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `requirement` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `employerid` varchar(255) DEFAULT NULL,
  `editlimit` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `deadline` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobpost`
--

INSERT INTO `jobpost` (`id`, `title`, `companyname`, `categoryid`, `location`, `type`, `requirement`, `experience`, `salary`, `employerid`, `editlimit`, `status`, `education`, `deadline`) VALUES
('632ccdaa36950', 'Web Designer', 'SwipeWire', 3, 'Narayanganj ', 'Work From Home ', 'Html, Css, JS, React  ', '1-3 years  ', 50, '632ccd2d496d0', 0, 'approved', 'Bsc in cse  ', '2022-12-28 17:00:00'),
('632cce217ef58', 'Junior Executive', 'SwipeWire', 7, 'Dhaka', 'Part Time', 'communication and computer skill', '1 years', 25, '632ccd2d496d0', 1, 'approved', 'BBA ', '2022-12-26 03:05:00'),
('638b7b1c5e291', 'Manager', 'SwipeWire', 5, 'Dhaka', 'Part Time ', 'Computer skills, MS word, Excel, communication skill, Team manage', '3-5 years ', 70, '632ccd2d496d0', 0, 'approved', 'MBA from reputed university ', '2022-12-25 12:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `numberofpost` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `adminid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `numberofpost`, `price`, `adminid`) VALUES
(1, 'Basic', 2, 50, '6307c8c039ff1'),
(2, 'Advanced', 5, 100, '6307c8c039ff1'),
(3, 'premium', 10, 150, '6307c8c039ff1');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `transid` varchar(255) DEFAULT NULL,
  `cardtype` varchar(255) DEFAULT NULL,
  `employerid` varchar(255) DEFAULT NULL,
  `packageid` int(11) DEFAULT NULL,
  `transtime` datetime DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `status`, `transid`, `cardtype`, `employerid`, `packageid`, `transtime`, `amount`) VALUES
(190, 'VALID', 'SSLCZ_TEST_632ccd71d4a28', 'BKASH-BKash', '632ccd2d496d0 ', 2, '2022-09-23 03:05:01', '100.00'),
(191, 'VALID', 'SSLCZ_TEST_638b7aa7990f9', 'BKASH-BKash', '632ccd2d496d0 ', 1, '2022-12-03 22:34:47', '50.00'),
(192, 'VALID', 'SSLCZ_TEST_638b7aba5278b', 'ABBANKIB-AB Bank', '632ccd2d496d0 ', 2, '2022-12-03 22:35:06', '100.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `authentication` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `bantime` datetime DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `skill` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `additional` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buypackage`
--
ALTER TABLE `buypackage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buypackage_ibfk_1` (`employerid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminid` (`adminid`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `employerid` (`employerid`),
  ADD KEY `jobpostid` (`jobpostid`),
  ADD KEY `jobapplyid` (`jobapplyid`);

--
-- Indexes for table `jobapply`
--
ALTER TABLE `jobapply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobapply_ibfk_1` (`categoryid`),
  ADD KEY `jobapply_ibfk_2` (`userid`),
  ADD KEY `jobapply_ibfk_3` (`jobid`);

--
-- Indexes for table `jobpost`
--
ALTER TABLE `jobpost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employeeid` (`employerid`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminid` (`adminid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_ibfk_1` (`employerid`),
  ADD KEY `payment_ibfk_2` (`packageid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buypackage`
--
ALTER TABLE `buypackage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buypackage`
--
ALTER TABLE `buypackage`
  ADD CONSTRAINT `buypackage_ibfk_1` FOREIGN KEY (`employerid`) REFERENCES `employer` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`adminid`) REFERENCES `admin` (`id`);

--
-- Constraints for table `interview`
--
ALTER TABLE `interview`
  ADD CONSTRAINT `interview_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `interview_ibfk_2` FOREIGN KEY (`employerid`) REFERENCES `employer` (`id`),
  ADD CONSTRAINT `interview_ibfk_3` FOREIGN KEY (`jobpostid`) REFERENCES `jobpost` (`id`),
  ADD CONSTRAINT `interview_ibfk_4` FOREIGN KEY (`jobapplyid`) REFERENCES `jobapply` (`id`);

--
-- Constraints for table `jobapply`
--
ALTER TABLE `jobapply`
  ADD CONSTRAINT `jobapply_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobapply_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobapply_ibfk_3` FOREIGN KEY (`jobid`) REFERENCES `jobpost` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobpost`
--
ALTER TABLE `jobpost`
  ADD CONSTRAINT `jobpost_ibfk_1` FOREIGN KEY (`employerid`) REFERENCES `employer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobpost_ibfk_2` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `package_ibfk_1` FOREIGN KEY (`adminid`) REFERENCES `admin` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`employerid`) REFERENCES `employer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`packageid`) REFERENCES `package` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
