-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 11:12 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miamala_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `mode` varchar(20) NOT NULL,
  `context` varchar(30) NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `name`, `mode`, `context`, `amount`, `date`, `status`, `userid`) VALUES
(2, 'www', 'asa', 'malawi', 1200, '2021-06-18', 'wwwwww', 3),
(34, 'john kavishe', 'Creditors', 'masjid', 12000, '2021-06-18', 'Pending', 2),
(9, 'juma jabu', 'Creditors', 'ulugway', 120000, '2021-06-24', 'Pending', 2),
(25, 'malko manjella', 'Creditors', 'uwanjani, cive', 12000, '2021-06-02', 'Pending', 9),
(24, 'salim sheikh', 'Debtors', 'cive', 12000, '2021-06-16', 'Pending', 4),
(23, 'paul malgado', 'Debtors', 'cive', 3000, '2021-06-16', 'Pending', 4),
(32, 'majuto zubeda mkaksi', 'Creditors', 'weita', 12, '2021-06-05', 'Pending', 12),
(28, 'majuto zubeda', 'Debtors', 'LRB', 0, '2021-06-25', 'Paid', 1),
(33, 'john livaaa', 'Creditors', 'suleiman', 45, '2021-06-11', 'Pending', 12),
(31, 'majuto salima', 'Debtors', 'tuyuyu', 121212, '2021-06-09', 'Pending', 12);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `details` varchar(120) NOT NULL,
  `mode` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `context` varchar(70) NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL,
  `userid` int(110) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `details`, `mode`, `type`, `context`, `amount`, `date`, `userid`) VALUES
(41, 'Football sports shoes', 'Cash', 'expense', 'Sabasaba center Dodoma', 70000, '2021-06-19', 1),
(5, 'matunad', 'airteee', 'moddoodo', 'asas', 1212, '2021-06-11', 3),
(6, 'dddd', 'ssaaa', 'aaa', 'asasas', 1212000, '2021-06-09', 3),
(46, 'bamia sugu', 'Cash', 'expense', 'muamala', 12000, '2021-06-12', 2),
(45, 'asanali kaonga gari', 'Mpesa', 'receipt', 'ulaya', 10000, '2021-06-25', 2),
(43, 'asanali kaonga', 'Cash', 'expense', 'muamala', 1200, '2021-06-25', 2),
(44, 'asanali kaonga', 'Cash', 'expense', 'muamala', 1200, '2021-06-25', 2),
(33, 'asasa', 'Mpesa', 'expense', 'asanteh', 1200000, '2021-06-25', 3),
(36, 'salim', 'Cash', 'expense', 'ulyaaa', 10000, '2021-06-16', 4),
(37, 'withdrawal', 'Halopesa', 'receipt', 'cive', 60000, '2021-06-04', 4),
(40, 'matunda ya kula', 'Cash', 'expense', 'sabasaba, Dodoma', 2000, '2021-06-18', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `number` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `pic`, `number`, `date`) VALUES
(1, 'malgadopr8@gmail.com', 'malgado', 'malgado', 'fk.jpg', '0788788788', '2021-06-23 23:17:51'),
(2, 'miwahtwalib@gmail.com', '202cb962ac59075b964b07152d234b70', 'Miwahonlineboutique', 'twalibu.jpg', '07888788788', '2021-06-24 09:06:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
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
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
