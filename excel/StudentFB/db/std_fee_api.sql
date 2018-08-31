-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2017 at 11:37 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `std_fee_api`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`%` PROCEDURE `sp_get_feebill_information`(
	IN `AcademicSessionFrom` INT,
	IN `AcademicSessionTo` INT,
	IN `InstallmentNo` INT
)
BEGIN
select
	cl.gs_id, cl.abridged_name, CONCAT(cl.grade_name, '-', cl.section_name) as class, 
	fb.gb_id, CONCAT(LEFT(fb.gb_id, 2) , '-', mid(fb.gb_id, 3, 1), '-', mid(fb.gb_id, 4, 5), '-', right(fb.gb_id, 1)) as bill_title, fb.total_payable,
	IF(CURDATE() <= fb.bill_due_date, fb.total_payable,
		IF(CURDATE() > fb.bill_due_date and CURDATE() <= fb.bill_bank_valid_date, (fb.total_payable + 600), -13)) as bill_payable
	

from atif_fee_student.fee_bill as fb
	left join atif.class_list as cl
		on cl.id = fb.student_id
	
where 
	fb.academic_session_id >= AcademicSessionFrom and fb.academic_session_id <= AcademicSessionTo
	and fb.is_void = 0 and fb.record_deleted = 0
	and fb.bill_cycle_no = InstallmentNo
	and fb.total_payable > 0

order by 
	cl.grade_id, cl.section_id, cl.call_name;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `fee_bill`
--

CREATE TABLE IF NOT EXISTS `fee_bill` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gs_id` varchar(6) NOT NULL,
  `bill_id` varchar(12) NOT NULL,
  `abridged_name` varchar(18) NOT NULL,
  `class` varchar(9) NOT NULL,
  `payable` int(11) NOT NULL,
  `received_date` date NOT NULL,
  `received_amount` int(11) NOT NULL,
  `received_mode` varchar(255) NOT NULL,
  `received_branch` varchar(255) NOT NULL,
  `ip4` varchar(255) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gs_id` (`gs_id`,`bill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `password`, `created`) VALUES
(1, 'fb2563148796', '541sdflcw7efr5', '2017-08-22 05:23:22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
