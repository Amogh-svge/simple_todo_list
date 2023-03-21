-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 12:03 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proshore_todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_status` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_status`, `created_date`) VALUES
(1, 'Work', 'active', '2023-03-18 09:11:28'),
(2, 'Study', 'active', '2023-03-18 10:00:20'),
(3, 'Entertainment', 'active', '2023-03-18 09:16:30'),
(4, 'Exercise', 'active', '2023-03-18 09:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task_title` varchar(100) DEFAULT NULL,
  `task_description` text DEFAULT NULL,
  `due_date` datetime NOT NULL,
  `task_status` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_title`, `task_description`, `due_date`, `task_status`, `category_id`, `created_date`, `updated_date`) VALUES
(2, 'Pick up groceries', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos ea excepturi illo atque. Nesciunt dicta corrupti perferendis quis. Tempore aut beatae dolor ducimus eum velit harum asperiores laborum, sapiente quibusdam labore sint facere incidunt, fuga deserunt reiciendis quae sequi perspiciatis dolores doloribus consectetur, aliquam expedita! Harum accusantium ipsa ipsam consectetur?</p>', '2023-03-20 16:06:00', 'In_progress', 1, '2023-03-20 09:22:29', NULL),
(3, 'Complete Todo App By today', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos ea excepturi illo atque. Nesciunt dicta corrupti perferendis quis. Tempore aut beatae dolor ducimus eum velit harum asperiores laborum, sapiente quibusdam labore sint facere incidunt</p>', '2023-03-20 15:08:00', 'Complete', 1, '2023-03-20 09:23:26', '2023-03-20 16:14:30'),
(7, 'need to go to work', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. A eum doloremque dolor quae recusandae, obcaecati et totam at, eaque consectetur deleniti nemo fugit aliquam aspernatur cupiditate libero, porro laudantium. Ratione illum modi dolorem excepturi ad, rerum, architecto enim facere voluptates alias, ipsam illo libero eos error? Ipsam nam aliquam quo!</p>', '2023-03-22 15:10:00', 'Complete', 2, '2023-03-20 10:25:34', '2023-03-20 15:10:51'),
(11, 'need to go to work', '&amp;lt;script&amp;gt; alert(&#039;hello world&#039;); &amp;lt;/script&amp;gt;a', '2023-03-22 14:32:00', 'In_progress', 3, '2023-03-21 09:47:49', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
