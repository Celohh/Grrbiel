-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Dez-2020 às 17:34
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbiel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `slogin`
--

CREATE TABLE `slogin` (
  `userID` int(11) NOT NULL,
  `userName` varchar(128) NOT NULL,
  `userEmail` varchar(256) NOT NULL,
  `userPwd` varchar(128) NOT NULL,
  `userGender` int(10) NOT NULL,
  `userLevel` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `slogin`
--

INSERT INTO `slogin` (`userID`, `userName`, `userEmail`, `userPwd`, `userGender`, `userLevel`) VALUES
(1, 'Grrbiel', 'gxbrvl@gmail.com', '$2y$10$pstBfAdkRDYz0cTU8z/wveKG6kFfOTbrCexmyp2Tap7KWr231VLCO', 0, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `stenis`
--

CREATE TABLE `stenis` (
  `tenisID` int(11) NOT NULL,
  `tenisName` varchar(128) NOT NULL,
  `tenisDesc` varchar(256) NOT NULL,
  `tenisImg` varchar(128) NOT NULL,
  `tenisPrice` float NOT NULL,
  `tenisSex` int(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `stenis`
--

INSERT INTO `stenis` (`tenisID`, `tenisName`, `tenisDesc`, `tenisImg`, `tenisPrice`, `tenisSex`) VALUES
(1, 'Air Jordan 1 Mid', 'A Full White Air Jordan', '5fce89598359d.jpg,5fce895983ae9.jpg,5fce8959840f7.jpg,5fce895984720.jpg', 115, 0),
(2, 'Nike Air Max 97', 'A Nike Air Max 97', '5fce95556883a.jpg,5fce955568da7.jpg,5fce9555693fb.jpg,5fce955569dac.jpg', 180, 0),
(3, 'Nike Air Max 90', '', '5fce98f84143a.jpg,5fce98f8418bf.jpg,5fce98f841d82.jpg,5fce98f842206.jpg', 120, 0),
(4, 'Nike Kyrie 6 \'Shutter Shades\'', '', '5fce9985ae259.jpg,5fce9985ae769.jpg,5fce9985aecee.jpg,5fce9985af267.jpg', 105, 2),
(5, 'Air Jordan 1 Mid SE', '', '5fce99ccd8b44.jpg,5fce99ccd90d9.jpg,5fce99ccd962a.jpg,5fce99ccd9ae7.jpg', 125, 0),
(6, 'Nike Air Max 2090', '', '5fce9e4d963b5.jpg,5fce9e4d96e99.jpg,5fce9e4d9742d.jpg,5fce9e4d9793c.jpg', 150, 0),
(7, 'Air Jordan 1 Hi FlyEase', '', '5fce9e74c7589.jpg,5fce9e74c7b0e.jpg,5fce9e74c8028.jpg,5fce9e74c850f.jpg', 105, 0),
(8, 'Nike Blazer Mid \'77 Infinite', '', '5fce9f6f8c6ad.jpg,5fce9f6f8cc20.jpg,5fce9f6f8cfe6.jpg,5fce9f6f8d344.jpg', 115, 0),
(9, 'Air Max 90 Premium', '', '5fcea58a51c4a.jpg,5fcea58a52158.jpg,5fcea58a525f2.jpg,5fcea58a529d9.jpg', 130, 1),
(10, 'Nike Free Metcon 3', '', '5fcea69add83b.jpg,5fcea69addbeb.jpg,5fcea69ade099.jpg,5fcea69ade473.jpg', 120, 1),
(11, 'Nike ZoomX SuperRep Surge', '', '5fcea70e3820f.jpg,5fcea70e3864a.jpg,5fcea70e38b1b.jpg,5fcea70e38f99.jpg', 140, 1),
(12, 'Nike Air Max Verona', '', '5fcea7753fb9b.jpg,5fcea7754000b.jpg,5fcea775404df.jpg,5fcea7754098f.jpg', 130, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `slogin`
--
ALTER TABLE `slogin`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `stenis`
--
ALTER TABLE `stenis`
  ADD PRIMARY KEY (`tenisID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `slogin`
--
ALTER TABLE `slogin`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stenis`
--
ALTER TABLE `stenis`
  MODIFY `tenisID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
