-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Oca 2024, 21:34:58
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bbdms`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblblooddonars`
--

CREATE TABLE `tblblooddonars` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `MobileNumber` char(25) DEFAULT NULL,
  `Email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `BloodGroup` varchar(20) DEFAULT NULL,
  `Address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Message` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Password` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `tblblooddonars`
--

INSERT INTO `tblblooddonars` (`id`, `FullName`, `MobileNumber`, `Email`, `Gender`, `Age`, `BloodGroup`, `Address`, `Message`, `PostingDate`, `Password`) VALUES
(13, 'Emre Kocaer', '0546 161 65 42', 'emre@gmail.com', 'Male', 30, 'A+', 'Kütahya', 'aaa', '2024-01-05 01:32:39', '123'),
(14, 'Nihat Çelikbaş', '0564 789 52 18', 'nihat@gmail.com', 'Male', 25, 'A-', 'Eskişehir', '...fdf', '2024-01-05 01:48:16', '123456'),
(15, 'Cihan Sert', '0287 498 25 11', 'cihan@gmail.com', 'Male', 28, 'O-', 'Bursa', 'dfsdfsdf', '2024-01-05 01:49:20', '123456a'),
(16, 'Burak Peksöz', '0289 654 78 28', 'burak@gmail.com', 'Male', 27, 'AB-', 'Samsun', 'asdaas', '2024-01-05 01:50:12', '123456789a'),
(17, 'Cansu Akdoğan', '0548 985 54 29', 'cansu@gmail.com', 'Famele', 23, 'AB+', 'Eskişehir', 'aa', '2024-01-05 01:51:06', '1234567a'),
(18, 'Buse Korkmaz', '0289 654 78 86', 'buse@gmail.com', 'Famele', 27, 'AB-', 'Niğde', 'asdaas', '2024-01-05 01:50:12', '123456789a'),
(32, 'Burak Nizamoğlu', '0541 573 97 13', 'burak@gmail.com', 'Male', 23, 'AB+', 'İstanbul', 'aa', '2024-01-06 01:51:06', '1234567a'),
(33, 'Ayşe Naz Akdoğan', '0546 285 45 63', 'aysenaz@gmail.com', 'Famele', 23, 'AB-', 'İstanbul', 'asdaas', '2024-01-06 01:50:12', '123456789a'),
(34, 'ahmet', '0546 151 52 47', 'ahmet@gmail.com', 'Male', 32, 'O-', 'Bursa', 'dfd', '2024-01-06 20:13:00', '123456aa');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblbloodgroup`
--

CREATE TABLE `tblbloodgroup` (
  `id` int(11) NOT NULL,
  `BloodGroup` varchar(20) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `tblbloodgroup`
--

INSERT INTO `tblbloodgroup` (`id`, `BloodGroup`, `PostingDate`) VALUES
(1, 'A-', '2024-01-03 20:33:50'),
(2, 'AB-', '2024-01-03 17:34:28'),
(3, 'O-', '2024-01-04 10:12:00'),
(4, 'A-', '2024-01-05 20:14:18'),
(5, 'A+', '2024-01-04 18:29:55'),
(6, 'AB+', '2024-01-05 20:34:14');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblbloodrequirer`
--

CREATE TABLE `tblbloodrequirer` (
  `ID` int(10) NOT NULL,
  `BloodDonarID` int(10) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `ContactNumber` varchar(25) DEFAULT NULL,
  `BloodRequirefor` varchar(250) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `ApplyDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `tblbloodrequirer`
--

INSERT INTO `tblbloodrequirer` (`ID`, `BloodDonarID`, `name`, `Email`, `ContactNumber`, `BloodRequirefor`, `Message`, `ApplyDate`) VALUES
(14, 13, 'Mehmet', 'mehmet@gmail.com', '0546 156 23 58', 'Mother', 'İhtiyacım var.', '2024-01-05 01:54:02');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblcontact`
--

CREATE TABLE `tblcontact` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `phone` varchar(120) NOT NULL,
  `email` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `tblcontact`
--

INSERT INTO `tblcontact` (`id`, `name`, `phone`, `email`, `message`, `date`) VALUES
(1, 'asd', '34324', 'test@gmail.com', 'afasf', '2024-01-05 01:47:14'),
(2, 'wefsdg', '5236514785', 'test@gmail.com', 'sgfdhsdfh', '2024-01-06 20:11:50');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `tblblooddonars`
--
ALTER TABLE `tblblooddonars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bgroup` (`BloodGroup`);

--
-- Tablo için indeksler `tblbloodgroup`
--
ALTER TABLE `tblbloodgroup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `BloodGroup` (`BloodGroup`),
  ADD KEY `BloodGroup_2` (`BloodGroup`);

--
-- Tablo için indeksler `tblbloodrequirer`
--
ALTER TABLE `tblbloodrequirer`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `donorid` (`BloodDonarID`);

--
-- Tablo için indeksler `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `tblblooddonars`
--
ALTER TABLE `tblblooddonars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Tablo için AUTO_INCREMENT değeri `tblbloodgroup`
--
ALTER TABLE `tblbloodgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `tblbloodrequirer`
--
ALTER TABLE `tblbloodrequirer`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
