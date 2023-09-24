-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 03:24 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cdf_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` int(11) NOT NULL,
  `image_name` varchar(200) NOT NULL,
  `reach` varchar(200) NOT NULL,
  `goal` varchar(200) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `details_description` text NOT NULL,
  `cases_name` varchar(10) NOT NULL COMMENT '1-Emergency Csese\r\n2-successful Cases',
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `image_name`, `reach`, `goal`, `title`, `description`, `details_description`, `cases_name`, `status`, `created`) VALUES
(1, '5yearsold.png', '10000', '6000000', 'Help Shehzad for survival', 'Master Shehzad who is suffering from B CELL ALL ( acute lymphoblastic leukemia, (type of blood cancer)', '<div class=\"gmail_default\"><span style=\"font-family: georgia, serif;\">CDF is India&rsquo;s one of the leading independent NGOs, which works with various organizations in 8 states of the country.<br><br>Beginning its formal journey in 2017 in India, and registered in 2019, we have changed the lives of more than 1 Billion People through various Activities. We believe that Climate plays a very big role in universal Changes. Changes in climate conditions can affect the health and function of ecosystems and the survival of entire species. We are focused on the environment project which will help the cosmo.<br></span></div>\r\n<div class=\"gmail_default\"><span style=\"font-family: georgia, serif;\">&nbsp;</span></div>\r\n<div class=\"gmail_default\"><span style=\"font-family: georgia, serif;\">We humbly request you to help Master Shehzad who is suffering from&nbsp;<strong>B CELL ALL ( acute lymphoblastic leukemia, type of blood cancer)</strong>; it&rsquo;s rare cancer Certified by the Doctors and is being treated in&nbsp;HCG Manavata Cancer Centre at&nbsp; Nashik. Due to their financial condition, they could not treat&nbsp;&nbsp;Master Shehzad. Doctors informed them that they need to do treatment of&nbsp;B CELL ALL ( acute lymphoblastic leukemia, type of blood cancer).&nbsp; It is a long-duration treatment with approx. expenditure of Rs.3,00,000/-<br clear=\"all\"></span></div>', '1', '1', '2023-09-10 17:18:12'),
(2, '5yearsold_1.png', '534534', '534545345', 'test', 'test', '<p dir=\"ltr\">We hereby plead an urgent appeal with the hope that these entire efforts can give her the required treatment. To save five-year-old Sharnya, diagnosed with blood cancer (B cell ALL),Sharnya is diagnosed with a cancer called B-cell acute lymphoblastic leukemia. Sharnya belongs to Kolhapur; her mother is a homemaker, and her father is a construction worker. Barely, they earn around 3000 - 3500 monthly. They tried their level best to collect the money, but it&rsquo;s such a heap of money. They are feeling helpless for not having enough money for the treatment; they are dying every day by watching their daughter in pain.</p>\r\n<p dir=\"ltr\">The cost of treatment is approx. Rs. 6,00,000, and it is impossible for them to collect such a huge amount in such a short span of time. We know your prayers are always with us, but your support will add a meaning to save the child, Sharnya. Cancer is not the end of life; let&rsquo;s prove it.</p>\r\n<p><span id=\"docs-internal-guid-e8be0412-7fff-12fc-1bb9-3232e659ca33\"></span></p>\r\n<p dir=\"ltr\">We request that you come forward and extend your fullest contribution to our hardships and make it possible for Sharnya&rsquo;s survival.</p>\r\n<p dir=\"ltr\"><span style=\"color: #121212; font-family: Montserrat, sans-serif;\">The approximate cost for the procedure is Rs. 6,00,000/-(6 Lakhs Only). Send a contribution by cheque/DD/online in the name of Cosmological Development Foundation.</span></p>', '2', '1', '2023-09-10 17:34:15'),
(3, '5yearsold_2.png', '13213', '4343', 'gfdgfdascs', '5 Years old battling cancer let’s promise a healthier future', '<p dir=\"ltr\">We hereby plead an urgent appeal with the hope that these entire efforts can give her the required treatment. To save five-year-old Sharnya, diagnosed with blood cancer (B cell ALL),Sharnya is diagnosed with a cancer called B-cell acute lymphoblastic leukemia. Sharnya belongs to Kolhapur; her mother is a homemaker, and her father is a construction worker. Barely, they earn around 3000 - 3500 monthly. They tried their level best to collect the money, but it&rsquo;s such a heap of money. They are feeling helpless for not having enough money for the treatment; they are dying every day by watching their daughter in pain.</p>\r\n<p dir=\"ltr\">The cost of treatment is approx. Rs. 6,00,000, and it is impossible for them to collect such a huge amount in such a short span of time. We know your prayers are always with us, but your support will add a meaning to save the child, Sharnya. Cancer is not the end of life; let&rsquo;s prove it.</p>\r\n<p><span id=\"docs-internal-guid-e8be0412-7fff-12fc-1bb9-3232e659ca33\"></span></p>\r\n<p dir=\"ltr\">We request that you come forward and extend your fullest contribution to our hardships and make it possible for Sharnya&rsquo;s survival.</p>\r\n<p dir=\"ltr\"><span style=\"color: #121212; font-family: Montserrat, sans-serif;\">The approximate cost for the procedure is Rs. 6,00,000/-(6 Lakhs Only). Send a contribution by cheque/DD/online in the name of Cosmological Development Foundation.</span></p>', '2', '1', '2023-09-13 20:06:55'),
(4, '5yearsold_3.png', '42343', '324324', 'fdvfdv', 'We hereby plead an urgent appeal with the hope that these entire efforts can give her the required treatment.\r\nDONATE NOW', '<p dir=\"ltr\">We hereby plead an urgent appeal with the hope that these entire efforts can give her the required treatment. To save five-year-old Sharnya, diagnosed with blood cancer (B cell ALL),Sharnya is diagnosed with a cancer called B-cell acute lymphoblastic leukemia. Sharnya belongs to Kolhapur; her mother is a homemaker, and her father is a construction worker. Barely, they earn around 3000 - 3500 monthly. They tried their level best to collect the money, but it&rsquo;s such a heap of money. They are feeling helpless for not having enough money for the treatment; they are dying every day by watching their daughter in pain.</p>\r\n<p dir=\"ltr\">The cost of treatment is approx. Rs. 6,00,000, and it is impossible for them to collect such a huge amount in such a short span of time. We know your prayers are always with us, but your support will add a meaning to save the child, Sharnya. Cancer is not the end of life; let&rsquo;s prove it.</p>\r\n<p><span id=\"docs-internal-guid-e8be0412-7fff-12fc-1bb9-3232e659ca33\"></span></p>\r\n<p dir=\"ltr\">We request that you come forward and extend your fullest contribution to our hardships and make it possible for Sharnya&rsquo;s survival.</p>\r\n<p dir=\"ltr\"><span style=\"color: #121212; font-family: Montserrat, sans-serif;\">The approximate cost for the procedure is Rs. 6,00,000/-(6 Lakhs Only). Send a contribution by cheque/DD/online in the name of Cosmological Development Foundation.</span></p>', '1', '1', '2023-09-13 20:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `cases_docs`
--

CREATE TABLE `cases_docs` (
  `doc_id` int(11) NOT NULL,
  `doc_name` varchar(200) NOT NULL,
  `doc_image` text NOT NULL,
  `cases_id` int(11) NOT NULL,
  `create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cases_docs`
--

INSERT INTO `cases_docs` (`doc_id`, `doc_name`, `doc_image`, `cases_id`, `create`) VALUES
(1, 'test', '5yearsold.png', 1, '2023-09-10 17:24:18'),
(2, 'aadhar card', '0b6b2e22-77af-4bc5-8517-738c7b010f61_1.png', 4, '2023-09-13 21:03:25'),
(3, 'aadhar card', '0b6b2e22-77af-4bc5-8517-738c7b010f61_2.png', 4, '2023-09-13 21:04:45'),
(4, 'addhar card', '0b6b2e22-77af-4bc5-8517-738c7b010f61_3.png', 4, '2023-09-13 21:23:22'),
(5, 'aadhar card', '0b6b2e22-77af-4bc5-8517-738c7b010f61_4.png', 4, '2023-09-13 21:23:33'),
(6, 'ration card', 'download.jpeg', 4, '2023-09-13 21:53:16'),
(7, 'ration card', 'download_1.jpeg', 4, '2023-09-13 21:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `donation_details`
--

CREATE TABLE `donation_details` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `donation_id` text NOT NULL,
  `receipt_no` text NOT NULL,
  `cases_id` int(11) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `citizenship` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `pan_no` varchar(50) NOT NULL,
  `date_of_birth` varchar(50) NOT NULL,
  `donation_amount` varchar(100) NOT NULL,
  `payment_status` enum('Pending','Success','Failed') NOT NULL DEFAULT 'Pending',
  `txnid` text NOT NULL,
  `posted_hash` text NOT NULL,
  `unmappedstatus` varchar(200) NOT NULL,
  `error_Message` text NOT NULL,
  `payment_source` varchar(200) NOT NULL,
  `addedon` varchar(200) NOT NULL,
  `bank_ref_num` varchar(200) NOT NULL,
  `bankcode` varchar(200) NOT NULL,
  `PG_TYPE` varchar(200) NOT NULL,
  `field1` varchar(200) NOT NULL,
  `field2` varchar(200) NOT NULL,
  `field3` varchar(200) NOT NULL,
  `field4` varchar(200) NOT NULL,
  `field5` varchar(200) NOT NULL,
  `field6` varchar(200) NOT NULL,
  `field7` varchar(200) NOT NULL,
  `field8` varchar(200) NOT NULL,
  `field9` varchar(200) NOT NULL,
  `mode` varchar(200) NOT NULL,
  `payment_mode` varchar(200) NOT NULL,
  `recieptno_count` text NOT NULL,
  `receipt_type` enum('online','manual') NOT NULL DEFAULT 'online',
  `create_by` enum('manual','online') NOT NULL DEFAULT 'online',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation_details`
--

INSERT INTO `donation_details` (`id`, `admin_id`, `donation_id`, `receipt_no`, `cases_id`, `payment_type`, `name`, `email`, `phone`, `citizenship`, `address`, `pan_no`, `date_of_birth`, `donation_amount`, `payment_status`, `txnid`, `posted_hash`, `unmappedstatus`, `error_Message`, `payment_source`, `addedon`, `bank_ref_num`, `bankcode`, `PG_TYPE`, `field1`, `field2`, `field3`, `field4`, `field5`, `field6`, `field7`, `field8`, `field9`, `mode`, `payment_mode`, `recieptno_count`, `receipt_type`, `create_by`, `create_at`) VALUES
(1, 0, '2023091601', 'CDF-1', 0, '', 'ak', 'ak@gmail.com', '8975647356', 'Indian Citizen', 'mumbai', '', '', '500', 'Success', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'CASH', '1', 'online', 'online', '2023-09-15 18:30:00'),
(3, 0, '2023091602', '', 0, '', 'abdul khan', 'abdulkhanrab@gmail.com', '8976900627', '', 'mumbai', '42334534534', '', '1', 'Failed', '2023091602', 'dd15acf790fc0f41dac9cd42bd582b8b6db0a60a2fbd5f51d98e864eb7c65f2a80cd586270909081379694845c1049eeb0d39417ecae24dc5b0bf3a891f0d874', 'userCancelled', 'Transaction failed due to customer pressing cancel button.', 'payu', '2023-09-16 23:36:04', '', '', '', '', '', '', '', '', '', '', '', 'Cancelled by user', '', '', '', 'online', 'online', '2023-09-16 18:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `name`, `email`, `phone`, `description`, `created`) VALUES
(6, 'abdul khan', 'a@gmail.com', '54352345', 'gfgdf', '2023-09-10 20:03:09'),
(7, 'abdul khan', 'a@gmail.com', '54352345', 'gfgdf', '2023-09-10 20:03:31'),
(8, 'abdul khan', 'test@gmail.com', '65436565', 'dfvfdvb', '2023-09-10 20:03:58'),
(9, 'abdul khan', 'abdulkhanrab@gmail.com', '53452435', 'hi', '2023-09-10 20:04:26'),
(10, 'abdul khan', 'a@gmail.com', '654645654', 't4gfgvdf', '2023-09-10 20:06:21'),
(11, 'abdul khan', 'a@gmail.com', '654645654', 't4gfgvdf', '2023-09-10 20:06:40'),
(12, 'abdul khan', 'a@gmail.com', '35324654', 'fcsdvds', '2023-09-10 20:08:55'),
(13, 'dfcdsfc', 'a@gmail.com', '6456456', 'adasd', '2023-09-10 20:09:41'),
(14, 'ravi yadav', 'a@gmail.com', '8748759889', 'hi', '2023-09-10 20:12:39'),
(15, 'test', 'a@gmail.com', '5435454353', 'dsac', '2023-09-10 20:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `loginType` enum('admin','branch','editor','manager','moderator','HR') NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('1','0') NOT NULL,
  `uniqueKey` varchar(255) NOT NULL,
  `temp_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `phone`, `password`, `loginType`, `created`, `status`, `uniqueKey`, `temp_password`) VALUES
(1, 'admin', 'admin@gmail.com', '8976900627', '$2y$10$iuU7KCsgSODpmGlpKo.YjuUzJzHetRAQzUX2nrRizGGCFfRdfnkKq', 'admin', '2023-09-07 15:12:00', '1', 'cdf001', ''),
(3, 'abdul khan', 'branch@gmail.com', '5344545464', '$2y$10$AgZuCHR7V.izxbOgxLmEp.HJANntDT4FrU6DwVN7WIk7huOPzTBmq', 'branch', '2023-09-15 16:47:58', '1', 'SYOU3HKOB', ''),
(4, 'test', 'abdulkhanrab@gmail.com', '5346542645', '$2y$10$THc6QQO9CTf6tVdDSZTe8..nmbwc.KMBKwdQhHJLd3/HTZorzwz4a', 'editor', '2023-09-16 06:52:31', '1', 'SIW43ZFXH', '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `varvalue` varchar(255) NOT NULL,
  `st_type` enum('text','file') DEFAULT 'text'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `varvalue`, `st_type`) VALUES
(25, 'EmailMessage', 'Dear <b>##USER_NAME##</b><br>Thanks for Donating to <b>KOKAN KALA VA SHIKSHAN VIKAS SANSTHA</b>', 'text');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `volunteer_id` int(11) NOT NULL,
  `volunteer_name` varchar(155) NOT NULL,
  `volunteer_email` varchar(155) NOT NULL,
  `mob_number` varchar(50) NOT NULL,
  `volunteer_gender` varchar(155) NOT NULL,
  `volunteer_address` varchar(155) NOT NULL,
  `v_pincode` varchar(50) NOT NULL,
  `v_city` varchar(155) NOT NULL,
  `volunteer_message` varchar(155) NOT NULL,
  `doc_upload` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`volunteer_id`, `volunteer_name`, `volunteer_email`, `mob_number`, `volunteer_gender`, `volunteer_address`, `v_pincode`, `v_city`, `volunteer_message`, `doc_upload`) VALUES
(35, 'test', 'test@gmail.com', '8538758934', 'Male', 'test', 'r3545', 'test', 'test', ''),
(36, 'test', 'te@gmail.com', '', '', '', '', '', '', ''),
(42, 'abdul', 'ab@gmail.com', '3245342534', 'Male', 'mumbai', '5435', 'cksdc', 'csasc', ''),
(43, 'ab', 'ab@gmail.com', '8975647356', 'male', 'ab', '5345', 'vfv', 'hhy', 'test.pdf'),
(44, 'hh', 'hh@gmail.com', '5345345345', 'Male', 'sasc', 'hbjbh', 'hbhj', 'bhjjbhj', ''),
(45, 'test a', 'ab@gmail.com', '8847329547', 'Male', 'mumbai', '543534', 'jndasjc', 'cscx', ''),
(46, 'test b', 'ab@gmail.com', '8847329547', 'Male', 'mumbai', '543534', 'jndasjc', 'frewsf', 'test.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases_docs`
--
ALTER TABLE `cases_docs`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `donation_details`
--
ALTER TABLE `donation_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`volunteer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cases_docs`
--
ALTER TABLE `cases_docs`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `donation_details`
--
ALTER TABLE `donation_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `volunteer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
