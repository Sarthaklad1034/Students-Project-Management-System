-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID` char(5) NOT NULL,
  `password` char(5) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `f_id` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(25) NOT NULL,
  `qualification` varchar(200) NOT NULL,
  `domain` varchar(200) NOT NULL,
  `research` varchar(200) NOT NULL,
  `others` varchar(500) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`f_id`, `name`, `email`, `phone`, `password`, `qualification`, `domain`, `research`, `others`) VALUES
('f101', 'Rajesh Kumar', 'rk1@gmail.com', '1234567890', '2023f101', 'M.Tech', 'Java', 'Advanced Java', 'asp'),
('f102', 'Maya Patil', 'mp2@gmail.com', '0987654321', '2023f102', 'B.Eng', 'Python', 'Turtle', 'NUL'),
('f103', 'Sanjay Pawar', 'sp3@gmail.com', '1234509876', '2023f103', 'Ph.D', 'Linux', 'HCI', 'NUL');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `mail_id` int(5) NOT NULL AUTO_INCREMENT,
  `s_id` varchar(10) NOT NULL,
  `f_id` varchar(10) NOT NULL,
  `msg` varchar(250) NOT NULL,
  PRIMARY KEY (`mail_id`),
  KEY `s_id` (`s_id`,`f_id`),
  KEY `f_id` (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`mail_id`, `s_id`, `f_id`, `msg`) VALUES
(123, '2021A101', 'f101', 'Submit Proposal'),
(456, '2022A101', 'f102', 'Contact with me'),
(789, '2023A101', 'f103', 'Check the report');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE IF NOT EXISTS `meeting` (
  `meeting_id` int(5) NOT NULL AUTO_INCREMENT,
  `f_id` varchar(10) NOT NULL,
  `s_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `desc` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  PRIMARY KEY (`meeting_id`),
  KEY `f_id` (`f_id`,`s_id`),
  KEY `s_id` (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`meeting_id`, `f_id`, `s_id`, `date`, `time`, `desc`, `link`) VALUES
(111, 'f101', '2021A101', '2015-03-30', '20:30:50', 'Topic Desc', 'abc'),
(222, 'f102', '2022A101', '2015-03-31', '20:30:00', 'Guidance', 'xyz'),
(333, 'f103', '2023A101', '1989-06-15', '08:57:00', 'General', 'lmn');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `p_id` varchar(10) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `domain` varchar(20) DEFAULT NULL,
  `s_name` varchar(30) DEFAULT NULL,
  `s_id` varchar(10) DEFAULT NULL,
  `f_id` varchar(10) DEFAULT NULL,
  `ppf` varchar(200) NOT NULL,
  `psf` varchar(200) NOT NULL,
  `remark` varchar(500) NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `f_id` (`f_id`),
  KEY `s_id` (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`p_id`, `name`, `domain`, `s_name`, `s_id`, `f_id`, `ppf`, `psf`, `remark`) VALUES
('P2021101', 'SPMS', 'Java', 'Sahil Kamble', '2021A101', 'f101', 'ppf1.pdf', 'psf1.pdf', '89'),
('P2021102', 'SPMS', 'Java', 'Atharv Patel', '2021A102', 'f101', NULL, NULL, NULL),
('P2021103', 'SPMS', 'Java', 'Parth Nakti', '2021A103', 'f101', NULL, NULL, NULL),
('P2022101', 'AJP', 'Python', 'Suyog Kadam', '2022A101', 'f102', 'ppf2.pdf', 'psf2.pdf', '75'),
('P2022102', 'AJP', 'Python', 'Nihar Mayekar', '2022A102', 'f102', NULL, NULL, NULL),
('P2022103', 'AJP', 'Python', 'Sakshi Patil', '2022A103', 'f102', NULL, NULL, NULL),
('P2023101', 'CR', 'PHP', 'Sarthak Lad', '2023A101', 'f103', 'ppf3.pdf', 'psf3.pdf', '95'),
('P2023102', 'CR', 'PHP', 'Soham Wani', '2023A102', 'f103', NULL, NULL, NULL),
('P2023103', 'CR', 'PHP', 'Nilesh Bari', '2023A103', 'f103', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `request_id` int(10) NOT NULL AUTO_INCREMENT,
  `s_id` varchar(10) NOT NULL,
  `f_id` varchar(10) NOT NULL,
  PRIMARY KEY (`request_id`),
  KEY `s_id` (`s_id`),
  KEY `f_id` (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=795 ;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `s_id`, `f_id`) VALUES
(444, '2021A101', 'f101'),
(555, '2022A101', 'f102');


-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `s_id` varchar(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(25) NOT NULL,
  `year` varchar(10) NOT NULL,
  `stream` varchar(15) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `name`, `email`, `phone`, `password`, `year`, `stream`) VALUES
('2021A101', 'Sahil Kamble', 'sk1@gmail.com', '1122334455', '21A101', '2021', 'CSE'),
('2021A102', 'Atharv Patel', 'ap2@yahoo.com', '2233445566', '21A102', '2021', 'CSE'),
('2021A103', 'Parth Nakti', 'pn3@gmail.com', '3344556677', '21A103', '2021', 'CSE'),
('2022A101', 'Suyog Kadam', 'sk4@gmail.com', '4455667788', '22A101', '2022', 'EE'),
('2022A102', 'Nihar Mayekar', 'nm5@gmail.com', '5566778899', '22A102', '2022', 'EE'),
('2022A103', 'Sakshi Patil', 'sp6@gmail.com', '6677889900', '22A103', '2022', 'EE'),
('2023A101', 'Sarthak Lad', 'sl7@gmail.com', '7788990011', '23A101', '2023', 'IT'),
('2023A102', 'Soham Wani', 'sw8@gmail.com', '8899001122', '23A102', '2023', 'IT'),
('2023A103', 'Nilesh Bari', 'nb9@yahoo.com', '9900112233', '23A103', '2023', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `st_mail`
--

CREATE TABLE IF NOT EXISTS `st_mail` (
  `s_mail_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` varchar(10) NOT NULL,
  `f_id` varchar(10) NOT NULL,
  `mag` varchar(250) NOT NULL,
  PRIMARY KEY (`s_mail_id`),
  KEY `s_id` (`s_id`,`f_id`),
  KEY `f_id` (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `st_mail`
--

INSERT INTO `st_mail` (`s_mail_id`, `s_id`, `f_id`, `mag`) VALUES
(777, '2021A101', 'f101', 'Yes sir'),
(888, '2022A101', 'f102', 'Sure sir'),
(999, '2023A101', 'f103', 'Ok sir');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `makey1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `makey2` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`);

--
-- Constraints for table `meeting`
--
ALTER TABLE `meeting`
  ADD CONSTRAINT `mkey1` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`),
  ADD CONSTRAINT `mkey2` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `fkey1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `fkey2` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`);

--
-- Constraints for table `st_mail`
--
ALTER TABLE `st_mail`
  ADD CONSTRAINT `m1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `m2` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
