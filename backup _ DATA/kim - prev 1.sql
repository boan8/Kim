-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2016 at 12:15 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kim`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `training_sched_id` int(11) NOT NULL,
  `training_id` int(11) NOT NULL,
  `person_involve_id` int(11) NOT NULL,
  `presence` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`training_sched_id`,`training_id`,`person_involve_id`),
  KEY `Training_Details_Attendance` (`training_id`,`person_involve_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `person_involve`
--

CREATE TABLE IF NOT EXISTS `person_involve` (
  `person_involve_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `college_center` varchar(40) DEFAULT NULL,
  `dept` varchar(40) DEFAULT NULL,
  `contact` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `pos` char(40) DEFAULT NULL,
  PRIMARY KEY (`person_involve_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` char(40) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `so`
--

CREATE TABLE IF NOT EXISTS `so` (
  `so_id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_no` varchar(40) DEFAULT NULL,
  `details` blob,
  `training_id` int(11) NOT NULL,
  PRIMARY KEY (`so_id`),
  KEY `Trainings_SO` (`training_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `so`
--

INSERT INTO `so` (`so_id`, `ref_no`, `details`, `training_id`) VALUES
(20, 'dsadas', NULL, 24),
(21, '1000', NULL, 25);

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE IF NOT EXISTS `trainings` (
  `training_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(40) DEFAULT NULL,
  `description` varchar(40) DEFAULT NULL,
  `venue` varchar(40) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`training_id`),
  KEY `Users_Trainings` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`training_id`, `user_id`, `title`, `description`, `venue`, `status`) VALUES
(24, 1, 'dsadas', 'dsadas', 'dsadas', 'Approved'),
(25, 1, 'dsadas', 'dsadas', 'dsadas', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `training_details`
--

CREATE TABLE IF NOT EXISTS `training_details` (
  `training_id` int(11) NOT NULL,
  `person_involve_id` int(11) NOT NULL,
  `status` char(40) DEFAULT NULL,
  PRIMARY KEY (`training_id`,`person_involve_id`),
  KEY `Person_Involve_Training_Details` (`person_involve_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `training_schedule`
--

CREATE TABLE IF NOT EXISTS `training_schedule` (
  `training_sched_id` int(11) NOT NULL AUTO_INCREMENT,
  `training_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`training_sched_id`),
  KEY `Trainings_Training_Schedule` (`training_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `training_schedule`
--

INSERT INTO `training_schedule` (`training_sched_id`, `training_id`, `date`) VALUES
(77, 24, '2016-03-29'),
(78, 25, '2016-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `training_team`
--

CREATE TABLE IF NOT EXISTS `training_team` (
  `training_id` int(11) NOT NULL,
  `person_involve_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`training_id`),
  KEY `Person_Involve_Training_Team` (`person_involve_id`),
  KEY `Role_Training_Team` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` char(40) DEFAULT NULL,
  `l_name` char(40) DEFAULT NULL,
  `m_name` char(40) DEFAULT NULL,
  `username` char(40) DEFAULT NULL,
  `password` char(40) DEFAULT NULL,
  `user_type_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `User_Type_Users` (`user_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `m_name`, `username`, `password`, `user_type_id`) VALUES
(1, 'kim', 'Pestanas', 'ambot', 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(40) DEFAULT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `name`) VALUES
(1, 'administrator');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `Training_Details_Attendance` FOREIGN KEY (`training_id`, `person_involve_id`) REFERENCES `training_details` (`training_id`, `person_involve_id`),
  ADD CONSTRAINT `Training_Schedule_Attendance` FOREIGN KEY (`training_sched_id`) REFERENCES `training_schedule` (`training_sched_id`);

--
-- Constraints for table `so`
--
ALTER TABLE `so`
  ADD CONSTRAINT `Trainings_SO` FOREIGN KEY (`training_id`) REFERENCES `trainings` (`training_id`);

--
-- Constraints for table `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `Users_Trainings` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `training_details`
--
ALTER TABLE `training_details`
  ADD CONSTRAINT `Person_Involve_Training_Details` FOREIGN KEY (`person_involve_id`) REFERENCES `person_involve` (`person_involve_id`),
  ADD CONSTRAINT `Trainings_Training_Details` FOREIGN KEY (`training_id`) REFERENCES `trainings` (`training_id`);

--
-- Constraints for table `training_schedule`
--
ALTER TABLE `training_schedule`
  ADD CONSTRAINT `Trainings_Training_Schedule` FOREIGN KEY (`training_id`) REFERENCES `trainings` (`training_id`);

--
-- Constraints for table `training_team`
--
ALTER TABLE `training_team`
  ADD CONSTRAINT `Person_Involve_Training_Team` FOREIGN KEY (`person_involve_id`) REFERENCES `person_involve` (`person_involve_id`),
  ADD CONSTRAINT `Role_Training_Team` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`),
  ADD CONSTRAINT `Trainings_Training_Team` FOREIGN KEY (`training_id`) REFERENCES `trainings` (`training_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `User_Type_Users` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`user_type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
