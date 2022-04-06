-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 06, 2022 at 08:53 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daftar_buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `penulis` varchar(128) NOT NULL,
  `penerbit` varchar(128) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `isbn_13` varchar(16) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `isbn_13`, `gambar`) VALUES
(1, 'Think and Grow Rich Deluxe Edition: The Complete Classic Text (Think and Grow Rich Series)', 'Napoleon Hill', 'Tarcher Perigee', '2008-10-16', '978-1585426591', 'thinkandgrowrich.jpg'),
(2, 'Strengths Based Leadership: Great Leaders, Teams, and Why People Follow', 'Tom Rath', 'Gallup Press', '2008-01-01', '978-1595620156', 'strengthsleadership.jpg'),
(3, '7 Lenses: Learning the Principles and Practices of Ethical Leadership', 'Linda Fisher Thornton', 'Leading in Context LLC', '2013-11-16', '978-1936662111', '7lenses.jpg'),
(4, 'Atomic Habits: An Easy &amp; Proven Way to Build Good Habits &amp; Break Bad Ones', 'James Clear', 'Avery', '2018-10-16', '978-0735211292', 'atomichabits.jpg'),
(5, 'How to Win Friends &amp; Influence People', 'Dale Carnegie', 'Pocket Books ', '1998-10-01', '978-0671027032', 'howtowinfriends.jpg'),
(6, 'Rich Dad Poor Dad: What the Rich Teach Their Kids About Money That the Poor and Middle Class Do Not!', 'Robert T. Kiyosaki', 'Plata Publishing', '2017-04-11', '978-1612680194', 'richdad.jpg'),
(7, 'The Psychology of Money: Timeless lessons on wealth, greed, and happiness', 'Morgan Housel', 'Harriman House', '2020-09-08', '978-0857197689', 'psycologyofmoney.jpg'),
(8, 'Recessional: The Death of Free Speech and the Cost of a Free Lunch', 'David Mamet', 'Broadside Books', '2022-04-05', '978-0063158993', '624c615ddb0cb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(6, 'admin@bukuku.com', '$2y$10$g9ZBijDKx1JBGOgomBenWe9dNiRwW9SVFbPYKdxHW/o.lxbsE2yGG'),
(7, 'admin@support.com', '$2y$10$Inrx4GFXCECeYB4Qbn367u89oOycJrujbf4O5lVQMgvNAAQNzLMl2'),
(8, 'staff@bukuku.com', '$2y$10$qVVjPWClLGlPPqRWRQ/0FuYnY2KR1O2ZGVUoOi1D6HnKHv.lWZWWq'),
(10, 'staff@support.com', '$2y$10$pXjYQFVVfL83SqqH6yXZFeSYbU.Q3RpPe.lfCh46u/LgrPJPlWWlK'),
(11, 'owner@bukuku.com', '$2y$10$.NbPnPImfpxo.xm2kBvoku7a8JkvgkMHp.rcLotWZkc3EnCs.MhZ.'),
(12, 'superadmin@bukuku.com', '$2y$10$4JmGsPsTh8bccWLSuiRyo.pCJRlvXsd4y1TFbXbbfO1RGWZ6QMSye');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
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
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
