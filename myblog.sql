-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 03:12 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`) VALUES
(1, 'Technology', '2020-12-11 11:25:45'),
(2, 'Gaming\r\n', '2020-12-11 11:25:45'),
(3, 'Auto', '2020-12-11 11:25:45'),
(4, 'Entertaiment', '2020-12-11 11:25:45'),
(5, 'Books', '2020-12-11 11:25:45'),
(7, 'Sport', '2020-12-13 16:37:39'),
(8, 'Life Style', '2020-12-13 17:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `body`, `author`, `created_at`) VALUES
(1, 1, 'Technolgy Post One', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi odio maxime provident, rerum est dolorum. Asperiores officia, accusantium minus dolorem, id, similique enim distinctio assumenda ratione nesciunt magni tempore obcaecati!\r\n', 'Ahmed ', '2020-12-11 11:31:40'),
(2, 2, 'Gaming Post One', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi odio maxime provident, rerum est dolorum. Asperiores officia, accusantium minus dolorem, id, similique enim distinctio assumenda ratione nesciunt magni tempore obcaecati!\r\n', 'Karwan', '2020-12-11 11:31:40'),
(3, 1, 'Technolgy Post Two', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi odio maxime provident, rerum est dolorum. Asperiores officia, accusantium minus dolorem, id, similique enim distinctio assumenda ratione nesciunt magni tempore obcaecati!\r\n', 'Dana', '2020-12-11 11:31:40'),
(4, 4, 'Entertaiment Post One ', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi odio maxime provident, rerum est dolorum. Asperiores officia, accusantium minus dolorem, id, similique enim distinctio assumenda ratione nesciunt magni tempore obcaecati!\r\n', 'Dana', '2020-12-11 11:31:40'),
(5, 4, 'Entertaiment Post Two', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi odio maxime provident, rerum est dolorum. Asperiores officia, accusantium minus dolorem, id, similique enim distinctio assumenda ratione nesciunt magni tempore obcaecati!\r\n', 'Zana', '2020-12-11 11:31:40'),
(6, 1, 'Technolgy Post Three', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi odio maxime provident, rerum est dolorum. Asperiores officia, accusantium minus dolorem, id, similique enim distinctio assumenda ratione nesciunt magni tempore obcaecati!\r\n', 'Karwan', '2020-12-11 11:31:40'),
(8, 2, 'cyberpunke', 'the new cyberpunk game is cracked in torentgamez ', 'abdulbasit', '2020-12-11 22:10:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
