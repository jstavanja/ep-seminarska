-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Gostitelj: localhost
-- Čas nastanka: 10. jan 2018 ob 23.13
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
(6, 'Ful lepa majca', 'Res lepa majca iz bombaza. Na njej piše Nike kar ji gre sam v plus.', 62, 'men'),
(8, 'Ful lepa torbica', 'Vse jo ženske hočejo, torbica je res dobra.', 13, 'women'),
(9, 'Majca Slazenger', 'Od rupnika favourite majca. Vsak jo zeli ... Ko recemo vsak, mislimo na Rupnika.', 18, 'tshirt'),
(10, 'Srajca Star Wars', 'Če veliko časa preživite za računalnikom in nimate radi sončne svetlobe, ker samo gledate filme, je to pravi artikel za vas.', 87, 'shirt'),
(11, 'Pulover Zara', 'Zara letos zopet udara. V uredništvu trgovine Kloutz jokamo. Majke nam.', 30, 'sweater'),
(12, 'Suknjič Succ Nitch', 'Hecno ime, hecna cena. Kar kliče po nakupu.', 420, 'eveningwear'),
(13, 'Jakna 4Chan', 'Forčen jakna za vse rahlo odštekane surferje medmrežja.', 50, 'outerwear'),
(14, 'Kratke hlače Udobn-OH', 'Če nimate radi dolgih hlač, oblečite kratke. Počutite se karseda Udobn-OH.', 20, 'shorts'),
(15, 'Hlače Modrost', 'Mladost je modrost. Najlepše modre hlače za najlepše ljudi.', 35, 'pants'),
(16, 'Jeans Đins', 'Kreatorji tehle kavbojk očitno niso bili kreativni pri poimenovanju le-teh. So pa skvačkali ene lepe hlače za it ven zvečer v Cirkusa recimo.', 40, 'jeans'),
(17, 'Kopalke LepeFul', 'LepeFul kopalke. Čeprav se kličejo kopalke, te ne kopljejo. So pa dobre za v vodo. Bolj kot kombinezon.', 14, 'swimwear'),
(18, 'Spodnjice StarGate', 'Niso stare. Piše &#34;star&#34;. Pazite pri branju prosim. &#34;Fajn&#34; objamejo, &#34;fajn&#34; prezračene.', 5, 'underwear'),
(19, 'Superge Adidas', 'Za vse ruse, nemce, pa tudi tiste, ki želite biti kul. Prava izbira. Res. Se nam zdi, no.', 70, 'shoes'),
(20, 'Zapestnica Rjava', 'Rjava zapestnica. Pozor: ni za pest ampak za zapestje.', 2, 'accessory'),
(21, 'Majca Puma', 'Puma-ga vsakemu, ki ga zebe, in nima majice na sebi.', 17, 'tshirt');

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
(29, 10, '1'),
(32, 5, '1'),
(33, 5, '0'),
(34, 5, '0'),
(35, 5, '2'),
(36, 5, '2'),
(37, 5, '1');

-- --------------------------------------------------------

--
-- Struktura tabele `ordered_items`
--

CREATE TABLE `ordered_items` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `ordered_items`
--

INSERT INTO `ordered_items` (`order_id`, `item_id`, `amount`) VALUES
(25, 6, 0),
(25, 8, 0),
(26, 6, 0),
(27, 6, 0),
(28, 8, 0),
(29, 6, 0),
(29, 8, 0),
(32, 6, 0),
(33, 6, 0),
(35, 8, 0),
(36, 8, 3),
(37, 6, 2),
(37, 8, 5);

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
(8, 1, 'NULL'),
(15, 1, '548');

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
  `surname` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `postcode` varchar(45) DEFAULT NULL,
  `phone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `email`, `password`, `role`, `status`, `username`, `address`, `postcode`, `phone`) VALUES
(5, 'a', 'beceda', 'a@a.com', '$2y$10$AY/6L/OhCAqZlJJH6MGJVeWjLDIQlksTRdx19dxj5HYn4YXzrX3uy', 'administrator', 1, 'sineBine', 'a 1', '1337', '0801234'),
(6, 'a', 'sf', 'kren@kr.en', '$2y$10$ZfgsARSfUJPHDQ7V7DFDF.W7hgXp.cLRgatlwTAeNTJ0/B1mzzA9S', 'user', 1, 'krentip', 'a', '1', '383838382'),
(8, 'asdasdasd', 'tezava', 'test@er.com', 'a', 'seller', 1, 'tezavica1', 'Ozka ulica 2', '123', '173482345'),
(9, 'Kret En', 'Cek', 'kr@et.en', '$2y$10$eVR0KqSWYvqWNvo.6tkP1.1AtLGfDB0ZH3nqtnhF7sYk4WcwBaqn.', 'user', 1, 'krentip', 'Nekje 51', '12345', '021345231'),
(10, 'a', 'f', 'test2@dummy.com', '$2y$10$0nh0t7xqpbyXprqG2AEgt.Y63SPa14t0Yiog8iCjRdgtyeOpHiRyK', 'user', 0, 'testerko', 'a', '1337', '034922922'),
(12, 'A', 'Bc', 'abc@123.com', 'abc', 'user', 1, 'abc123', 'Ne obstaja 1', '4567 Nevemse', '031111111'),
(15, 'asdasdasd', 'asd', 'asd@asdja.com', '$2y$10$vAPZNVJG8gwTTxzQJLUwDOa3ftS6ZybgoYzQTg3NOEtUYzsookqXO', 'seller', 1, 'stevc', 'asd 2', '1337', '123123123'),
(16, 'asmir', 'nepovem', 'as@asf.com', '$2y$10$DOwzKSbmbD5DPFsx0CvTe.TncsnWyMPWgllZv..PwQ/GxPzDiscea', 'user', 1, 'asmir', 'Ne obstaja 1', '8000', '584756691');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT tabele `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT tabele `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
