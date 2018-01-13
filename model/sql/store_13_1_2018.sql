-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Gostitelj: localhost
-- Čas nastanka: 10. jan 2018 ob 19.55
-- Različica strežnika: 10.1.29-MariaDB
-- Različica PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `store`
--

-- --------------------------------------------------------

--
-- Struktura tabele `administrator`
--

CREATE TABLE `administrator` (
  `user_id` int(11) NOT NULL,
  `certifikat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `administrator`
--

INSERT INTO `administrator` (`user_id`, `certifikat`) VALUES
(5, 'nema');

-- --------------------------------------------------------

--
-- Struktura tabele `available_size`
--

CREATE TABLE `available_size` (
  `item_id` int(11) NOT NULL,
  `size_size` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabele `customer`
--

CREATE TABLE `customer` (
  `user_id` int(11) NOT NULL,
  `activated` tinyint(4) NOT NULL,
  `address` varchar(128) NOT NULL,
  `phone_number` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabele `image`
--

CREATE TABLE `image` (
  `location` varchar(128) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabele `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `price` int(11) NOT NULL,
  `tag` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `item`
--

INSERT INTO `item` (`id`, `name`, `description`, `price`, `tag`) VALUES
(6, 'le midget le gang le bang', '113 u tacen gremo mi', 69, 'men'),
(8, 'test', '123', 2, 'women');

-- --------------------------------------------------------

--
-- Struktura tabele `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `order`
--

INSERT INTO `order` (`id`, `user_id`, `status_id`) VALUES
(25, 5, '1'),
(26, 5, '0'),
(27, 10, '0'),
(28, 10, '0'),
(29, 10, '1');

-- --------------------------------------------------------

--
-- Struktura tabele `ordered_items`
--

CREATE TABLE `ordered_items` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `ordered_items`
--

INSERT INTO `ordered_items` (`order_id`, `item_id`) VALUES
(25, 6),
(25, 8),
(26, 6),
(27, 6),
(28, 8),
(29, 6),
(29, 8);

-- --------------------------------------------------------

--
-- Struktura tabele `rating`
--

CREATE TABLE `rating` (
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabele `seller`
--

CREATE TABLE `seller` (
  `user_id` int(11) NOT NULL,
  `activated` tinyint(4) NOT NULL,
  `certifikat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `seller`
--

INSERT INTO `seller` (`user_id`, `activated`, `certifikat`) VALUES
(5, 1, 'nema'),
(8, 1, 'NULL');

-- --------------------------------------------------------

--
-- Struktura tabele `size`
--

CREATE TABLE `size` (
  `size` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabele `status`
--

CREATE TABLE `status` (
  `id` varchar(128) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
('0', 'pending'),
('1', 'completed'),
('2', 'destroyed');

-- --------------------------------------------------------

--
-- Struktura tabele `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `postcode` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `status`, `username`, `address`, `postcode`) VALUES
(5, 'a', 'a@a.com', '$2y$10$R3gZ6mYzW8KUlvgjJTxezeG5KQ0Dz6cA8WH7t4cVXrzeDlSS934km', 'administrator', 1, 'sineP', 'a 1', '1337'),
(6, 'a', 'kren@kr.en', '$2y$10$ZfgsARSfUJPHDQ7V7DFDF.W7hgXp.cLRgatlwTAeNTJ0/B1mzzA9S', 'user', 1, 'krentip', 'a', '1'),
(8, 'asdasdasd', 'bos@a.nc', 'a', 'seller', 1, 'bosancek123', 'asmirova 2', '123'),
(9, 'Kret En', 'kr@et.en', '$2y$10$eVR0KqSWYvqWNvo.6tkP1.1AtLGfDB0ZH3nqtnhF7sYk4WcwBaqn.', 'user', 1, 'krentip', 'Bosna 51', '12345'),
(10, 'a', 'test2@dummy.com', '$2y$10$0nh0t7xqpbyXprqG2AEgt.Y63SPa14t0Yiog8iCjRdgtyeOpHiRyK', 'user', 1, 'testerko', 'a', '1337');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `certifikat_UNIQUE` (`certifikat`);

--
-- Indeksi tabele `available_size`
--
ALTER TABLE `available_size`
  ADD PRIMARY KEY (`item_id`,`size_size`),
  ADD KEY `fk_available_size_size1_idx` (`size_size`);

--
-- Indeksi tabele `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeksi tabele `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`location`),
  ADD UNIQUE KEY `location_UNIQUE` (`location`),
  ADD KEY `fk_image_item1_idx` (`item_id`);

--
-- Indeksi tabele `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nakup_stanje1_idx` (`status_id`),
  ADD KEY `fk_nakup_user1_idx` (`user_id`);

--
-- Indeksi tabele `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD PRIMARY KEY (`order_id`,`item_id`) USING BTREE,
  ADD KEY `fk_table1_artikel1_idx` (`item_id`);

--
-- Indeksi tabele `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`user_id`,`item_id`),
  ADD KEY `fk_ocena_user1_idx` (`user_id`),
  ADD KEY `fk_ocena_artikel1` (`item_id`);

--
-- Indeksi tabele `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `certifikat_UNIQUE` (`certifikat`),
  ADD KEY `fk_seller_user_idx` (`user_id`);

--
-- Indeksi tabele `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size`);

--
-- Indeksi tabele `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid_UNIQUE` (`id`),
  ADD UNIQUE KEY `email_address_UNIQUE` (`email`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT tabele `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT tabele `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `fk_administrator_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omejitve za tabelo `available_size`
--
ALTER TABLE `available_size`
  ADD CONSTRAINT `fk_available_size_size1` FOREIGN KEY (`size_size`) REFERENCES `size` (`size`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_size_item1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omejitve za tabelo `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omejitve za tabelo `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_image_item1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omejitve za tabelo `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_nakup_stanje1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nakup_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omejitve za tabelo `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD CONSTRAINT `fk_table1_artikel1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omejitve za tabelo `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `fk_ocena_artikel1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ocena_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omejitve za tabelo `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `fk_seller_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
