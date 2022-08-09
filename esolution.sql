-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 04:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esolution`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_course`
--

CREATE TABLE `admin_course` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_course`
--

INSERT INTO `admin_course` (`id`, `name`, `code`, `faculty`, `status`) VALUES
(1, 'Mobile Application Development', '101', 'cs', 'Active'),
(2, 'web development', '102', 'cs', 'Active'),
(5, 'artificial ', '104', 'artifical neural network', 'Active'),
(6, 'cloud', '111', 'Cyber security ', 'Active'),
(7, 'ai', '122', 'cs', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `admin_fauclty`
--

CREATE TABLE `admin_fauclty` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_fauclty`
--

INSERT INTO `admin_fauclty` (`id`, `name`, `status`) VALUES
(1, 'cs', 'Active'),
(2, 'artifical neural network', 'Inactive'),
(8, 'Cyber security ', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `password`) VALUES
(4, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_student`
--

CREATE TABLE `admin_student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `session` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_student`
--

INSERT INTO `admin_student` (`id`, `name`, `cnic`, `faculty`, `mobile`, `email`, `password`, `cpassword`, `address`, `session`, `start_date`, `end_date`, `status`) VALUES
(130, 'abdullah', '', 'artifical neural network', '03006468405', 'abdullahmateen611@gmail.com', '1', '1', '', 'Select Your Session', '0000-00-00', '0000-00-00', 'approve');

-- --------------------------------------------------------

--
-- Table structure for table `admin_student_course`
--

CREATE TABLE `admin_student_course` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_student_course`
--

INSERT INTO `admin_student_course` (`id`, `student_id`, `course`) VALUES
(142, '130', '2'),
(143, '130', '6');

-- --------------------------------------------------------

--
-- Table structure for table `admin_student_teacher`
--

CREATE TABLE `admin_student_teacher` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_student_teacher`
--

INSERT INTO `admin_student_teacher` (`id`, `student_name`, `teacher`) VALUES
(30, 'Ali Shah', 15),
(31, 'kareem', 15),
(32, 'Omer', 15),
(33, 'ali', 15),
(34, 'aslam', 15),
(35, '', 15),
(36, 'ijaz saab', 15),
(37, 'saad', 15),
(38, 'noman', 15),
(39, 'no', 15),
(40, 'no', 15),
(41, 'no', 15),
(42, 'no', 15),
(43, 'on', 15),
(44, 'onn', 15),
(45, 'no', 15),
(46, 'momin', 15),
(47, 'hassan', 15),
(48, 'hassan', 15),
(49, 'ammad', 15),
(50, 'o', 15),
(51, 'mateen', 15),
(52, 'mateen', 15),
(53, 'ab', 15),
(54, 'hammad', 15),
(55, 'a', 15);

-- --------------------------------------------------------

--
-- Table structure for table `admin_teacher`
--

CREATE TABLE `admin_teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_teacher`
--

INSERT INTO `admin_teacher` (`id`, `name`, `cnic`, `faculty`, `mobile`, `email`, `password`, `cpassword`, `address`, `status`) VALUES
(15, 'hassan ali', '34101-57657', 'cs', '92235465', 'umer@gmail.com', '123', '123', '                        Lhr                                                                                                    ', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `admin_teacher_ass_request`
--

CREATE TABLE `admin_teacher_ass_request` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `ass_id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `description` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_teacher_course`
--

CREATE TABLE `admin_teacher_course` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_teacher_course`
--

INSERT INTO `admin_teacher_course` (`id`, `teacher_name`, `course`) VALUES
(17, 'hassan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `admin_teacher_final_request`
--

CREATE TABLE `admin_teacher_final_request` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `final_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_teacher_lab_request`
--

CREATE TABLE `admin_teacher_lab_request` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `lab_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_teacher_mid_request`
--

CREATE TABLE `admin_teacher_mid_request` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `mid_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL DEFAULT 'mids',
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_teacher_pro_request`
--

CREATE TABLE `admin_teacher_pro_request` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_teacher_request`
--

CREATE TABLE `admin_teacher_request` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company_about`
--

CREATE TABLE `company_about` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `fb` varchar(255) NOT NULL,
  `insta` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`id`, `name`, `logo`, `phone`, `email`, `address`, `fb`, `insta`, `whatsapp`, `linkedin`) VALUES
(1, 'Shah', 'company/Experts-Camp.png', '123', 'ejaz@gmail.com', 'asdfff', 'fb.com', 'insta.co', '2666', 'linkedin.com'),
(2, 'eSolution', 'company/esloution.png', '12333', 'esolution@gmail.com', 'gujranwala', 'fb.com', 'insta.co', '123456', 'linkedin.com');

-- --------------------------------------------------------

--
-- Table structure for table `our_team`
--

CREATE TABLE `our_team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `our_team`
--

INSERT INTO `our_team` (`id`, `name`, `image`, `designation`) VALUES
(1, 'Engr. Mirza Abdul Basit Baig', 'team/ceo.jpeg', 'CEO'),
(2, 'Engr. AbdulAziz Omar', 'team/md.jpeg', 'Managing Director'),
(3, 'Muhammad Saad', 'team/saad.jpg', 'Production Manager'),
(4, 'Muhammad Hassan', 'team/hassan.jpg', 'Project Manager'),
(5, 'Ali', 'team/dp.jfif', 'Director');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `stu_id` varchar(24) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `stu_id`, `image`) VALUES
(13, '130', 'challan.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `add_teacher` int(11) NOT NULL DEFAULT 0,
  `add_student` int(11) NOT NULL DEFAULT 0,
  `add_faculty` int(11) NOT NULL DEFAULT 0,
  `course` int(11) NOT NULL DEFAULT 0,
  `addmission_req` int(11) NOT NULL DEFAULT 0,
  `teacher_req` int(11) NOT NULL DEFAULT 0,
  `student_req` int(11) NOT NULL DEFAULT 0,
  `payment` int(11) NOT NULL DEFAULT 0,
  `setting` int(11) NOT NULL DEFAULT 0,
  `dashboard` int(11) NOT NULL DEFAULT 0,
  `inbox` int(11) NOT NULL DEFAULT 0,
  `user_management` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `add_teacher`, `add_student`, `add_faculty`, `course`, `addmission_req`, `teacher_req`, `student_req`, `payment`, `setting`, `dashboard`, `inbox`, `user_management`) VALUES
(9, 'admin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0),
(10, 'Super Admin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(11, 'cashier', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `image`, `description`) VALUES
(16, 'Web Development', 'servicess/web.png', 'Searching for an organization to get your site made to advance your item and administrations? We have proficient website specialists who will make a site for you, as indicated by your necessities.'),
(17, 'App Development', 'servicess/Android.png', 'We have a committed group of Mobile Application Developers who are had practical experience in the Android and IOS App Development.'),
(18, 'Graphic Designing', 'servicess/graphical designing.png', 'Graphic design is the profession and academic discipline whose activity consists in projecting visual communications intended to transmit specific messages to social groups, with specific objectives.'),
(19, 'MS Office Management', 'servicess/office.png', 'It’s a Complete job oriented professional training for all, Who wants to learn Computer in a super easy way. you will learn Computer Fundamentals, MS Word, MS Excel, MS Powerpoint, MS outlook, Fast typing skills and much more from top-notch Computer Professionals, the curriculum is very up to date'),
(20, 'Digital Marketing', 'servicess/digital marketing.png', 'Any marketing that uses electronic devices to convey promotional messaging and measure its impact. In practice, digital marketing typically refers to marketing campaigns that appear on a computer, phone, tablet, or other device'),
(21, 'ASP.net', 'servicess/asp.png', 'ASP.NET is an open-source, server-side web-application framework designed for web development to produce dynamic web pages. It was developed by Microsoft to allow programmers to build dynamic web sites, applications and services.'),
(22, 'PHP', 'servicess/php.png', 'PHP (recursive acronym for PHP: Hypertext Preprocessor) is a widely-used open source general-purpose scripting language that is especially suited for web development and can be embedded into HTML.'),
(23, 'Flutter', 'servicess/flutter.png', 'Flutter is an open-source UI software development kit created by Google. It is used to develop cross platform applications for Android, iOS, Linux, Mac, Windows, Google Fuchsia, and the web from a single codebase. The first version of Flutter was known as codename \"Sky\" and ran on the Android operating system.');

-- --------------------------------------------------------

--
-- Table structure for table `student_assignment`
--

CREATE TABLE `student_assignment` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `activity` varchar(255) NOT NULL DEFAULT 'assignment'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_assignment`
--

INSERT INTO `student_assignment` (`id`, `stu_id`, `name`, `description`, `activity`) VALUES
(21, 130, 'ai', 'intro ai\r\n', 'assignment');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `quiz` varchar(255) NOT NULL,
  `assignment` varchar(255) NOT NULL,
  `mid` varchar(255) NOT NULL,
  `final` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_finals`
--

CREATE TABLE `student_finals` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `activity` varchar(255) NOT NULL DEFAULT 'finals'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_finals`
--

INSERT INTO `student_finals` (`id`, `stu_id`, `name`, `description`, `activity`) VALUES
(7, 130, 'abdullah', 'lkhjk', 'finals');

-- --------------------------------------------------------

--
-- Table structure for table `student_lab`
--

CREATE TABLE `student_lab` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `activity` varchar(255) NOT NULL DEFAULT 'lab'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_lab`
--

INSERT INTO `student_lab` (`id`, `stu_id`, `name`, `description`, `activity`) VALUES
(8, 130, '', '', 'lab');

-- --------------------------------------------------------

--
-- Table structure for table `student_mids`
--

CREATE TABLE `student_mids` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `activity` varchar(255) NOT NULL DEFAULT 'mids'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_mids`
--

INSERT INTO `student_mids` (`id`, `stu_id`, `name`, `description`, `activity`) VALUES
(7, 130, 'abdullah', 'pakistan\r\n', 'mids');

-- --------------------------------------------------------

--
-- Table structure for table `student_payment`
--

CREATE TABLE `student_payment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `advance` varchar(255) NOT NULL,
  `remaining` varchar(255) NOT NULL,
  `current` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_project`
--

CREATE TABLE `student_project` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `activity` varchar(255) NOT NULL DEFAULT 'project',
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_project`
--

INSERT INTO `student_project` (`id`, `stu_id`, `name`, `description`, `activity`, `status`) VALUES
(10, 130, 'abdullah', 'lksdjfls', 'project', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `student_sign_up`
--

CREATE TABLE `student_sign_up` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `approval` varchar(255) NOT NULL,
  `otp_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_sign_up`
--

INSERT INTO `student_sign_up` (`id`, `name`, `email`, `password`, `cpassword`, `approval`, `otp_code`) VALUES
(251, 'abdullah', 'abdullahmateen611@gmail.com', '1', '1', 'YES', '172191'),
(256, 'abdullah', 'fix404error@gmail.com', '12', '12', 'pending', '196143');

-- --------------------------------------------------------

--
-- Table structure for table `student_sign_up_course`
--

CREATE TABLE `student_sign_up_course` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `cpassword` varchar(60) NOT NULL,
  `approval` text NOT NULL,
  `otp_code` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_xtra_assignment`
--

CREATE TABLE `student_xtra_assignment` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `ass_id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `activity` varchar(255) NOT NULL DEFAULT 'assignment',
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `date` date NOT NULL,
  `fee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_xtra_assignment`
--

INSERT INTO `student_xtra_assignment` (`id`, `stu_id`, `ass_id`, `course`, `name`, `description`, `stu_file`, `start_time`, `end_time`, `start_date`, `end_date`, `activity`, `status`, `date`, `fee`) VALUES
(34, 130, 130, 0, 'abdullah', 'nkljlk', 'FilesFile/bloggerpostsetting.png', '04:34:00', '04:40:00', '2022-07-05', '2022-07-30', 'assignment', 'pending', '2022-07-05', '65');

-- --------------------------------------------------------

--
-- Table structure for table `student_xtra_course`
--

CREATE TABLE `student_xtra_course` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_xtra_final`
--

CREATE TABLE `student_xtra_final` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `final_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `activity` varchar(255) NOT NULL DEFAULT 'finals',
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `date` date NOT NULL,
  `fee` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_xtra_lab`
--

CREATE TABLE `student_xtra_lab` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `lab_id` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `activity` varchar(255) NOT NULL DEFAULT 'lab',
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_xtra_mid`
--

CREATE TABLE `student_xtra_mid` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `mid_id` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `activity` varchar(255) NOT NULL DEFAULT 'mids',
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `date` date NOT NULL,
  `fee` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_xtra_mid`
--

INSERT INTO `student_xtra_mid` (`id`, `stu_id`, `mid_id`, `course`, `name`, `description`, `stu_file`, `start_time`, `end_time`, `start_date`, `end_date`, `activity`, `status`, `date`, `fee`) VALUES
(22, 130, 130, '', 'abdullah', 'jdf', 'MidsFile/bloggerpostarrow.png', '20:13:00', '08:13:00', '2022-07-04', '2022-07-30', 'mids', 'pending', '2022-07-04', '720');

-- --------------------------------------------------------

--
-- Table structure for table `student_xtra_project`
--

CREATE TABLE `student_xtra_project` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `activity` varchar(255) NOT NULL DEFAULT 'project',
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `date` date NOT NULL,
  `fee` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_xtra_project`
--

INSERT INTO `student_xtra_project` (`id`, `stu_id`, `project_id`, `course`, `name`, `description`, `stu_file`, `start_time`, `end_time`, `start_date`, `end_date`, `activity`, `status`, `date`, `fee`) VALUES
(18, 130, 130, '', 'abdullah', 'ai project', 'ProjectFile/user.jpg', '19:00:00', '07:06:00', '2022-07-04', '2022-07-30', 'project', 'pending', '2022-07-04', '945');

-- --------------------------------------------------------

--
-- Table structure for table `student_xtra_quiz`
--

CREATE TABLE `student_xtra_quiz` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `activity` varchar(255) NOT NULL DEFAULT 'quiz',
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `date` date NOT NULL,
  `fee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_xtra_quiz`
--

INSERT INTO `student_xtra_quiz` (`id`, `stu_id`, `quiz_id`, `course`, `name`, `description`, `stu_file`, `start_time`, `end_time`, `start_date`, `end_date`, `activity`, `status`, `date`, `fee`) VALUES
(28, 130, 130, '', 'abdullah', 'lkj', 'QuizFile/bloggerpostsetting.png', '15:07:00', '03:07:00', '2022-07-04', '2022-07-13', 'quiz', 'pending', '2022-07-04', '620');

-- --------------------------------------------------------

--
-- Table structure for table `studen_quiz`
--

CREATE TABLE `studen_quiz` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `activity` varchar(255) NOT NULL DEFAULT 'quiz'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studen_quiz`
--

INSERT INTO `studen_quiz` (`id`, `stu_id`, `name`, `description`, `activity`) VALUES
(17, 101, 'abdulalh', '12', 'quiz'),
(18, 111, 'hamza', 'asd', 'quiz'),
(20, 130, 'abdullah', 'a', 'quiz');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_assignment`
--

CREATE TABLE `teacher_assignment` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `ass_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_assignment_response`
--

CREATE TABLE `teacher_assignment_response` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `ass_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_finals`
--

CREATE TABLE `teacher_finals` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `final_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_final_response`
--

CREATE TABLE `teacher_final_response` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `final_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_lab`
--

CREATE TABLE `teacher_lab` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `lab_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_lab_response`
--

CREATE TABLE `teacher_lab_response` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `lab_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_mids`
--

CREATE TABLE `teacher_mids` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `mid_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_mid_response`
--

CREATE TABLE `teacher_mid_response` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `mid_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_payment`
--

CREATE TABLE `teacher_payment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `advance` varchar(255) NOT NULL,
  `remaining` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_project`
--

CREATE TABLE `teacher_project` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_project_response`
--

CREATE TABLE `teacher_project_response` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_quiz`
--

CREATE TABLE `teacher_quiz` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_quiz_response`
--

CREATE TABLE `teacher_quiz_response` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_xtra_assignment`
--

CREATE TABLE `teacher_xtra_assignment` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `ass_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_xtra_final`
--

CREATE TABLE `teacher_xtra_final` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `final_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_xtra_lab`
--

CREATE TABLE `teacher_xtra_lab` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `lab_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_xtra_mid`
--

CREATE TABLE `teacher_xtra_mid` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `mid_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_xtra_project`
--

CREATE TABLE `teacher_xtra_project` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_xtra_quiz`
--

CREATE TABLE `teacher_xtra_quiz` (
  `id` int(11) NOT NULL,
  `x_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stu_file` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `testimonial` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `testimonial`) VALUES
(7, 'Bader Alkandari', 'My Self is a student. I got solutions related to my project.  Highly Recommended website for students. Thanks Alot.');

-- --------------------------------------------------------

--
-- Table structure for table `todays_activity`
--

CREATE TABLE `todays_activity` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'Admin'),
(2, 'Super', 'super@test.com', 'super', 'Super Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_course`
--
ALTER TABLE `admin_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_fauclty`
--
ALTER TABLE `admin_fauclty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_student`
--
ALTER TABLE `admin_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_student_course`
--
ALTER TABLE `admin_student_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_student_teacher`
--
ALTER TABLE `admin_student_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_teacher`
--
ALTER TABLE `admin_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_teacher_ass_request`
--
ALTER TABLE `admin_teacher_ass_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_teacher_course`
--
ALTER TABLE `admin_teacher_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_teacher_final_request`
--
ALTER TABLE `admin_teacher_final_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_teacher_lab_request`
--
ALTER TABLE `admin_teacher_lab_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_teacher_mid_request`
--
ALTER TABLE `admin_teacher_mid_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_teacher_pro_request`
--
ALTER TABLE `admin_teacher_pro_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_teacher_request`
--
ALTER TABLE `admin_teacher_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_about`
--
ALTER TABLE `company_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_team`
--
ALTER TABLE `our_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_assignment`
--
ALTER TABLE `student_assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_finals`
--
ALTER TABLE `student_finals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_lab`
--
ALTER TABLE `student_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_mids`
--
ALTER TABLE `student_mids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_payment`
--
ALTER TABLE `student_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_project`
--
ALTER TABLE `student_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_sign_up`
--
ALTER TABLE `student_sign_up`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_sign_up_course`
--
ALTER TABLE `student_sign_up_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_xtra_assignment`
--
ALTER TABLE `student_xtra_assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_xtra_course`
--
ALTER TABLE `student_xtra_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_xtra_final`
--
ALTER TABLE `student_xtra_final`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_xtra_lab`
--
ALTER TABLE `student_xtra_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_xtra_mid`
--
ALTER TABLE `student_xtra_mid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_xtra_project`
--
ALTER TABLE `student_xtra_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_xtra_quiz`
--
ALTER TABLE `student_xtra_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studen_quiz`
--
ALTER TABLE `studen_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_assignment`
--
ALTER TABLE `teacher_assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_assignment_response`
--
ALTER TABLE `teacher_assignment_response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_finals`
--
ALTER TABLE `teacher_finals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_final_response`
--
ALTER TABLE `teacher_final_response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_lab`
--
ALTER TABLE `teacher_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_lab_response`
--
ALTER TABLE `teacher_lab_response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_mids`
--
ALTER TABLE `teacher_mids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_mid_response`
--
ALTER TABLE `teacher_mid_response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_payment`
--
ALTER TABLE `teacher_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_project`
--
ALTER TABLE `teacher_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_project_response`
--
ALTER TABLE `teacher_project_response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_quiz`
--
ALTER TABLE `teacher_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_quiz_response`
--
ALTER TABLE `teacher_quiz_response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_xtra_assignment`
--
ALTER TABLE `teacher_xtra_assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_xtra_final`
--
ALTER TABLE `teacher_xtra_final`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_xtra_lab`
--
ALTER TABLE `teacher_xtra_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_xtra_mid`
--
ALTER TABLE `teacher_xtra_mid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_xtra_project`
--
ALTER TABLE `teacher_xtra_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_xtra_quiz`
--
ALTER TABLE `teacher_xtra_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todays_activity`
--
ALTER TABLE `todays_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_course`
--
ALTER TABLE `admin_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin_fauclty`
--
ALTER TABLE `admin_fauclty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_student`
--
ALTER TABLE `admin_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `admin_student_course`
--
ALTER TABLE `admin_student_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `admin_student_teacher`
--
ALTER TABLE `admin_student_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `admin_teacher`
--
ALTER TABLE `admin_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `admin_teacher_ass_request`
--
ALTER TABLE `admin_teacher_ass_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_teacher_course`
--
ALTER TABLE `admin_teacher_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `admin_teacher_final_request`
--
ALTER TABLE `admin_teacher_final_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_teacher_lab_request`
--
ALTER TABLE `admin_teacher_lab_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_teacher_mid_request`
--
ALTER TABLE `admin_teacher_mid_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_teacher_pro_request`
--
ALTER TABLE `admin_teacher_pro_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_teacher_request`
--
ALTER TABLE `admin_teacher_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `company_about`
--
ALTER TABLE `company_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `our_team`
--
ALTER TABLE `our_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `student_assignment`
--
ALTER TABLE `student_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student_course`
--
ALTER TABLE `student_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student_finals`
--
ALTER TABLE `student_finals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_lab`
--
ALTER TABLE `student_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_mids`
--
ALTER TABLE `student_mids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_payment`
--
ALTER TABLE `student_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_project`
--
ALTER TABLE `student_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_sign_up`
--
ALTER TABLE `student_sign_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `student_sign_up_course`
--
ALTER TABLE `student_sign_up_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_xtra_assignment`
--
ALTER TABLE `student_xtra_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `student_xtra_course`
--
ALTER TABLE `student_xtra_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_xtra_final`
--
ALTER TABLE `student_xtra_final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_xtra_lab`
--
ALTER TABLE `student_xtra_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_xtra_mid`
--
ALTER TABLE `student_xtra_mid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `student_xtra_project`
--
ALTER TABLE `student_xtra_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student_xtra_quiz`
--
ALTER TABLE `student_xtra_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `studen_quiz`
--
ALTER TABLE `studen_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `teacher_assignment`
--
ALTER TABLE `teacher_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teacher_assignment_response`
--
ALTER TABLE `teacher_assignment_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher_finals`
--
ALTER TABLE `teacher_finals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher_final_response`
--
ALTER TABLE `teacher_final_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher_lab`
--
ALTER TABLE `teacher_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher_lab_response`
--
ALTER TABLE `teacher_lab_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher_payment`
--
ALTER TABLE `teacher_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
