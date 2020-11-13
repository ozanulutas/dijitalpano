-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Kas 2020, 20:18:24
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `dijitalpano`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `css`
--

CREATE TABLE `css` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` varchar(150) NOT NULL,
  `sube_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `css`
--

INSERT INTO `css` (`id`, `name`, `value`, `sube_id`) VALUES
(1, '--renk-1', '#ff5f01', 1),
(2, '--renk-2', '#feac00', 1),
(3, '--renk-3', '#ffb933', 1),
(4, '--renk-4', '#800000', 1),
(5, '--renk-5', '#ffc933', 1),
(6, '--renk-6', '#ff9100', 1),
(7, '--renk-1', '#ff5f01', 2),
(8, '--renk-2', '#feac00', 2),
(9, '--renk-3', '#ffb933', 2),
(10, '--renk-4', '#800000', 2),
(11, '--renk-5', '#ffc933', 2),
(12, '--renk-6', '#ff9100', 2),
(13, '--renk-1', '#ff5f01', 3),
(14, '--renk-2', '#feac00', 3),
(15, '--renk-3', '#ffb933', 3),
(16, '--renk-4', '#800000', 3),
(17, '--renk-5', '#ffc933', 3),
(18, '--renk-6', '#ff00c1', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyuru`
--

CREATE TABLE `duyuru` (
  `id` mediumint(9) NOT NULL,
  `metin` varchar(1000) NOT NULL,
  `yayin_tarih` date NOT NULL,
  `yayin_saat` time DEFAULT NULL,
  `bitis_tarih` date DEFAULT NULL,
  `bitis_saat` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `duyuru`
--

INSERT INTO `duyuru` (`id`, `metin`, `yayin_tarih`, `yayin_saat`, `bitis_tarih`, `bitis_saat`) VALUES
(1, '5 Aralık Tarihinde 11. sınıflara deneme sınavı yapılacaktır.', '2020-10-28', '11:11:00', '2020-11-28', '00:00:00'),
(2, '22 Ocak\'ta Abant gezisi yapılacaktır. Katılmak isteyenler sınıf öğretmenlerine başvuruda bulunabilir.', '2020-10-30', NULL, '2020-11-27', NULL),
(3, '8 Aralık tarihli deneme sınavının sonuçları katlardaki panolara asılmıştır.', '2020-10-28', NULL, '2020-11-13', NULL),
(4, '30 Ekim tarihinde yapılacak olan akşam etütü bir gün sonra (31 Ekim) yapılacaktır .', '2020-10-29', '00:00:00', '2020-11-30', '00:00:00'),
(16, 'Duyuru-5', '2020-10-14', '00:00:00', '2020-10-21', '00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` smallint(6) NOT NULL,
  `k_adi` varchar(25) NOT NULL,
  `sifre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `k_adi`, `sifre`) VALUES
(3, 'admin', '.'),
(4, 'admina', 'a'),
(5, 'adminaa', 'ü'),
(6, 'adminaz', 's'),
(7, 'adminella', '123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `gun` varchar(10) NOT NULL,
  `saat` time NOT NULL,
  `bitis_saat` time DEFAULT NULL,
  `etkinlik` varchar(100) NOT NULL,
  `sube_id` smallint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `program`
--

INSERT INTO `program` (`id`, `gun`, `saat`, `bitis_saat`, `etkinlik`, `sube_id`) VALUES
(1, '0', '05:07:00', '06:30:00', 'ist', 1),
(2, '0', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 1),
(3, '0', '06:45:00', '07:00:00', 'SABAH NAMAZI', 1),
(4, '0', '07:00:00', '07:30:00', 'YÜRÜÜYŞ', 1),
(5, '0', '07:30:00', '07:45:00', 'DUŞ', 1),
(6, '0', '07:45:00', '08:15:00', 'KAHVALTI', 1),
(7, '0', '08:15:00', '09:10:00', 'DERS 1', 1),
(8, '0', '09:10:00', '09:20:00', 'TENEFFÜS', 1),
(9, '0', '09:20:00', '10:10:00', 'DERS 2', 1),
(10, '0', '10:10:00', '10:30:00', 'TEMİZLİK', 1),
(11, '0', '10:30:00', '13:30:00', 'EBA CANLI DERS', 1),
(12, '0', '13:30:00', '13:50:00', 'ÖĞLE YEMEĞİ', 1),
(13, '0', '13:50:00', '14:10:00', 'EBA CANLI DERS', 1),
(14, '0', '14:10:00', '14:30:00', 'ÖĞLE NAMAZI', 1),
(15, '0', '14:30:00', '15:30:00', 'ETÜT 1', 1),
(16, '0', '15:30:00', '15:45:00', 'TENEFFÜS', 1),
(17, '0', '15:45:00', '16:45:00', 'ETÜT 2', 1),
(18, '0', '16:45:00', '17:10:00', 'İKİNDİ NAMAZI', 1),
(19, '0', '17:10:00', '17:50:00', 'ETÜT 4', 1),
(20, '0', '17:50:00', '18:00:00', 'TENEFFÜS', 1),
(21, '0', '18:00:00', '18:40:00', 'ETÜT 5', 1),
(22, '0', '18:40:00', '19:05:00', 'AKŞAM NAMAZI', 1),
(23, '0', '19:05:00', '19:45:00', 'ETÜT 6', 1),
(24, '0', '19:45:00', '21:00:00', 'KANTİN', 1),
(25, '0', '21:00:00', '21:30:00', 'YATSI NAMAZI', 1),
(26, '0', '21:30:00', '22:00:00', 'SERBEST', 1),
(27, '0', '22:00:00', '23:59:00', 'İSTİRAHAT', 1),
(28, '1', '00:00:00', '06:30:00', 'İSTİRAHAT', 1),
(29, '1', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 1),
(30, '1', '06:45:00', '07:00:00', 'SABAH NAMAZI', 1),
(31, '1', '07:00:00', '07:30:00', 'YÜRÜÜYŞ', 1),
(32, '1', '07:30:00', '07:45:00', 'DUŞ', 1),
(33, '1', '07:45:00', '08:15:00', 'KAHVALTI', 1),
(34, '1', '08:15:00', '09:10:00', 'DERS 1', 1),
(35, '1', '09:10:00', '09:20:00', 'TENEFFÜS', 1),
(36, '1', '09:20:00', '10:10:00', 'DERS 2', 1),
(37, '1', '10:10:00', '10:30:00', 'TEMİZLİK', 1),
(38, '1', '10:30:00', '13:30:00', 'EBA CANLI DERS', 1),
(39, '1', '13:30:00', '13:50:00', 'ÖĞLE YEMEĞİ', 1),
(40, '1', '13:50:00', '14:10:00', 'EBA CANLI DERS', 1),
(41, '1', '14:10:00', '14:30:00', 'ÖĞLE NAMAZI', 1),
(42, '1', '14:30:00', '15:30:00', 'ETÜT 1', 1),
(43, '1', '15:30:00', '15:45:00', 'TENEFFÜS', 1),
(44, '1', '15:45:00', '16:45:00', 'ETÜT 2', 1),
(45, '1', '16:45:00', '17:10:00', 'İKİNDİ NAMAZI', 1),
(46, '1', '17:10:00', '17:50:00', 'ETÜT 4', 1),
(47, '1', '17:50:00', '18:00:00', 'TENEFFÜS', 1),
(48, '1', '18:00:00', '18:40:00', 'ETÜT 5', 1),
(49, '1', '18:40:00', '19:05:00', 'AKŞAM NAMAZI', 1),
(50, '1', '19:05:00', '19:45:00', 'ETÜT 6', 1),
(51, '1', '19:45:00', '21:00:00', 'KANTİN', 1),
(52, '1', '21:00:00', '21:30:00', 'YATSI NAMAZI', 1),
(53, '1', '21:30:00', '22:00:00', 'SERBEST', 1),
(54, '1', '22:00:00', '23:59:00', 'İSTİRAHAT', 1),
(55, '2', '23:59:00', '06:30:00', 'İSTİRAHAT', 1),
(56, '2', '06:30:00', '08:45:00', 'NAMAZA HAZIRLIK', 1),
(57, '2', '06:45:00', '07:00:00', 'SABAH NAMAZI', 1),
(58, '2', '07:00:00', '07:30:00', 'YÜRÜÜYŞ', 1),
(59, '2', '07:30:00', '07:45:00', 'DUŞ', 1),
(60, '2', '07:45:00', '08:15:00', 'KAHVALTI', 1),
(61, '2', '08:15:00', '09:10:00', 'DERS 1', 1),
(62, '2', '09:10:00', '09:20:00', 'TENEFFÜS', 1),
(63, '2', '09:20:00', '10:10:00', 'DERS 2', 1),
(64, '2', '10:10:00', '10:30:00', 'TEMİZLİK', 1),
(65, '2', '10:30:00', '13:30:00', 'EBA CANLI DERS', 1),
(66, '2', '13:30:00', '13:50:00', 'ÖĞLE YEMEĞİ', 1),
(67, '2', '13:50:00', '14:10:00', 'EBA CANLI DERS', 1),
(68, '2', '14:10:00', '14:30:00', 'ÖĞLE NAMAZI', 1),
(69, '2', '14:30:00', '15:30:00', 'ETÜT 1', 1),
(70, '2', '15:30:00', '15:45:00', 'TENEFFÜS', 1),
(71, '2', '15:45:00', '16:45:00', 'ETÜT 2', 1),
(72, '2', '16:45:00', '17:10:00', 'İKİNDİ NAMAZI', 1),
(73, '2', '17:10:00', '17:50:00', 'ETÜT 4', 1),
(74, '2', '17:50:00', '18:00:00', 'TENEFFÜS', 1),
(75, '2', '18:00:00', '18:40:00', 'ETÜT 5', 1),
(76, '2', '18:40:00', '19:05:00', 'AKŞAM NAMAZI', 1),
(77, '2', '19:05:00', '19:45:00', 'ETÜT 6', 1),
(78, '2', '19:45:00', '21:00:00', 'KANTİN', 1),
(79, '2', '21:00:00', '21:30:00', 'YATSI NAMAZI', 1),
(80, '2', '21:30:00', '22:00:00', 'SERBEST', 1),
(81, '2', '22:00:00', '23:59:00', 'İSTİRAHAT', 1),
(82, '3', '00:00:00', '06:30:00', 'İSTİRAHAT', 1),
(83, '3', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 1),
(84, '3', '06:45:00', '08:00:00', 'SABAH NAMAZI', 1),
(85, '3', '07:00:00', '07:30:00', 'YÜRÜÜYŞ', 1),
(86, '3', '07:30:00', '07:45:00', 'DUŞ', 1),
(87, '3', '07:45:00', '08:15:00', 'KAHVALTI', 1),
(88, '3', '08:15:00', '09:10:00', 'DERS 1', 1),
(89, '3', '09:10:00', '09:20:00', 'TENEFFÜS', 1),
(90, '3', '09:20:00', '10:10:00', 'DERS 2', 1),
(91, '3', '10:10:00', '10:30:00', 'TEMİZLİK', 1),
(92, '3', '10:30:00', '13:30:00', 'EBA CANLI DERS', 1),
(93, '3', '13:30:00', '13:50:00', 'ÖĞLE YEMEĞİ', 1),
(94, '3', '13:50:00', '14:10:00', 'EBA CANLI DERS', 1),
(95, '3', '14:10:00', '14:30:00', 'ÖĞLE NAMAZI', 1),
(96, '3', '14:30:00', '15:30:00', 'ETÜT 1', 1),
(97, '3', '15:30:00', '15:45:00', 'TENEFFÜS', 1),
(98, '3', '15:45:00', '16:45:00', 'ETÜT 2', 1),
(99, '3', '16:45:00', '17:10:00', 'İKİNDİ NAMAZI', 1),
(100, '3', '17:10:00', '17:50:00', 'ETÜT 4', 1),
(101, '3', '17:50:00', '18:00:00', 'TENEFFÜS', 1),
(102, '3', '18:00:00', '18:40:00', 'ETÜT 5', 1),
(103, '3', '18:40:00', '19:05:00', 'AKŞAM NAMAZI', 1),
(104, '3', '19:05:00', '19:45:00', 'ETÜT 6', 1),
(105, '3', '19:45:00', '21:00:00', 'KANTİN', 1),
(106, '3', '21:00:00', '21:30:00', 'YATSI NAMAZI', 1),
(107, '3', '21:30:00', '22:00:00', 'SERBEST', 1),
(108, '3', '22:00:00', '23:59:00', 'İSTİRAHAT', 1),
(109, '4', '00:00:00', '06:30:00', 'İSTİRAHAT', 1),
(110, '4', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 1),
(111, '4', '06:45:00', '07:00:00', 'SABAH NAMAZI', 1),
(112, '4', '07:00:00', '07:30:00', 'YÜRÜÜYŞ', 1),
(113, '4', '07:30:00', '07:45:00', 'DUŞ', 1),
(114, '4', '07:45:00', '08:15:00', 'KAHVALTI', 1),
(115, '4', '08:15:00', '09:10:00', 'DERS 1', 1),
(116, '4', '09:10:00', '09:20:00', 'TENEFFÜS', 1),
(117, '4', '09:20:00', '10:10:00', 'DERS 2', 1),
(118, '4', '10:10:00', '10:30:00', 'TEMİZLİK', 1),
(119, '4', '10:30:00', '13:30:00', 'EBA CANLI DERS', 1),
(120, '4', '13:30:00', '13:50:00', 'ÖĞLE YEMEĞİ', 1),
(121, '4', '13:50:00', '14:10:00', 'EBA CANLI DERS', 1),
(122, '4', '14:10:00', '14:30:00', 'ÖĞLE NAMAZI', 1),
(123, '4', '14:30:00', '15:30:00', 'ETÜT 1', 1),
(124, '4', '15:30:00', '15:45:00', 'TENEFFÜS', 1),
(125, '4', '15:45:00', '16:45:00', 'ETÜT 2', 1),
(126, '4', '16:45:00', '17:10:00', 'İKİNDİ NAMAZI', 1),
(127, '4', '17:10:00', '17:50:00', 'ETÜT 4', 1),
(128, '4', '17:50:00', '18:00:00', 'TENEFFÜS', 1),
(129, '4', '18:00:00', '18:40:00', 'ETÜT 5', 1),
(130, '4', '18:40:00', '19:05:00', 'AKŞAM NAMAZI', 1),
(131, '4', '19:05:00', '19:45:00', 'ETÜT 6', 1),
(132, '4', '19:45:00', '21:00:00', 'KANTİN', 1),
(133, '4', '21:00:00', '21:30:00', 'YATSI NAMAZI', 1),
(134, '4', '21:30:00', '22:00:00', 'SERBEST', 1),
(135, '4', '22:00:00', '23:59:00', 'İSTİRAHAT', 1),
(136, '5', '00:00:00', '06:30:00', 'İSTİRAHAT', 1),
(137, '5', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 1),
(138, '5', '06:45:00', '07:00:00', 'SABAH NAMAZI', 1),
(139, '5', '07:00:00', '07:30:00', 'YÜRÜÜYŞ', 1),
(140, '5', '07:30:00', '07:45:00', 'DUŞ', 1),
(141, '5', '07:45:00', '08:15:00', 'KAHVALTI', 1),
(142, '5', '08:15:00', '09:10:00', 'DERS 1', 1),
(143, '5', '09:10:00', '09:20:00', 'TENEFFÜS', 1),
(144, '5', '09:20:00', '10:10:00', 'DERS 2', 1),
(145, '5', '10:10:00', '10:30:00', 'TEMİZLİK', 1),
(146, '5', '10:30:00', '13:30:00', 'EBA CANLI DERS', 1),
(147, '5', '13:30:00', '13:50:00', 'ÖĞLE YEMEĞİ', 1),
(148, '5', '13:50:00', '14:10:00', 'EBA CANLI DERS', 1),
(149, '5', '14:10:00', '14:30:00', 'ÖĞLE NAMAZI', 1),
(150, '5', '14:30:00', '15:30:00', 'ETÜT 1', 1),
(151, '5', '15:30:00', '15:45:00', 'TENEFFÜS', 1),
(152, '5', '15:45:00', '16:45:00', 'ETÜT 2', 1),
(153, '5', '16:45:00', '17:10:00', 'İKİNDİ NAMAZI', 1),
(154, '5', '17:10:00', '17:50:00', 'ETÜT 4', 1),
(155, '5', '17:50:00', '18:00:00', 'TENEFFÜS', 1),
(156, '5', '18:00:00', '18:40:00', 'ETÜT 5', 1),
(157, '5', '18:40:00', '19:05:00', 'AKŞAM NAMAZI', 1),
(158, '5', '19:05:00', '19:45:00', 'ETÜT 6', 1),
(159, '5', '19:45:00', '21:00:00', 'KANTİN', 1),
(160, '5', '21:00:00', '21:30:00', 'YATSI NAMAZI', 1),
(161, '5', '21:30:00', '22:00:00', 'SERBEST', 1),
(162, '5', '22:00:00', '23:59:00', 'İSTİRAHAT', 1),
(163, '6', '00:00:00', '06:30:00', 'İSTİRAHAT', 1),
(164, '6', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 1),
(165, '6', '06:45:00', '07:00:00', 'SABAH NAMAZI', 1),
(166, '6', '07:00:00', '07:30:00', 'YÜRÜÜYŞ', 1),
(167, '6', '07:30:00', '07:45:00', 'DUŞ', 1),
(168, '6', '07:45:00', '08:15:00', 'KAHVALTI', 1),
(169, '6', '08:15:00', '09:10:00', 'DERS 1', 1),
(170, '6', '09:10:00', '09:20:00', 'TENEFFÜS', 1),
(171, '6', '09:20:00', '10:10:00', 'DERS 2', 1),
(172, '6', '10:10:00', '10:30:00', 'TEMİZLİK', 1),
(173, '6', '10:30:00', '13:30:00', 'EBA CANLI DERS', 1),
(174, '6', '13:30:00', '13:50:00', 'ÖĞLE YEMEĞİ', 1),
(175, '6', '13:50:00', '14:10:00', 'EBA CANLI DERS', 1),
(176, '6', '14:10:00', '14:30:00', 'ÖĞLE NAMAZI', 1),
(177, '6', '14:30:00', '15:30:00', 'ETÜT 1', 1),
(178, '6', '15:30:00', '15:45:00', 'TENEFFÜS', 1),
(179, '6', '15:45:00', '16:45:00', 'ETÜT 2', 1),
(180, '6', '16:45:00', '17:10:00', 'İKİNDİ NAMAZI', 1),
(181, '6', '17:10:00', '17:50:00', 'ETÜT 4', 1),
(182, '6', '17:50:00', '18:00:00', 'TENEFFÜS', 1),
(183, '6', '18:00:00', '18:40:00', 'ETÜT 5', 1),
(184, '6', '18:40:00', '19:05:00', 'AKŞAM NAMAZI', 1),
(185, '6', '19:05:00', '19:45:00', 'ETÜT 6', 1),
(186, '6', '19:45:00', '21:00:00', 'KANTİN', 1),
(187, '6', '21:00:00', '21:30:00', 'YATSI NAMAZI', 1),
(188, '6', '21:30:00', '22:00:00', 'SERBEST', 1),
(189, '6', '22:00:00', '23:59:00', 'İSTİRAHAT son', 1),
(191, '0', '00:00:00', '06:30:00', 'İSTİRAHAT', 2),
(192, '0', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 2),
(193, '1', '00:00:00', '06:30:00', 'İSTİRAHAT', 2),
(194, '1', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 2),
(195, '2', '00:00:00', '06:30:00', 'İSTİRAHAT', 2),
(196, '2', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 2),
(197, '3', '00:00:00', '06:30:00', 'İSTİRAHAT', 2),
(198, '3', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 2),
(199, '4', '00:00:00', '06:30:00', 'İSTİRAHAT', 2),
(200, '4', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 2),
(201, '5', '00:00:00', '06:30:00', 'İSTİRAHAT', 2),
(202, '5', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 2),
(203, '6', '00:00:00', '06:30:00', 'İSTİRAHAT', 2),
(204, '6', '06:30:00', '06:45:00', 'NAMAZA HAZIRLIK', 2),
(206, '0', '00:01:00', NULL, 'asd', 1),
(207, '0', '00:00:00', NULL, 'fvgfd', 2),
(208, '1', '00:00:00', NULL, 'razaamaz', 1),
(209, '0', '03:04:00', NULL, 'qwe', 1),
(210, '1', '00:00:00', '11:11:00', 'aaa', 1),
(211, '0', '00:00:00', '12:03:00', 'asd', 1),
(212, '0', '03:01:00', '04:05:00', 'ssss', 1),
(213, '0', '00:01:00', '02:08:00', 'asdasdasd', 1),
(214, '6', '12:03:00', '12:03:00', '123', 30);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resim`
--

CREATE TABLE `resim` (
  `id` mediumint(9) NOT NULL,
  `yol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `resim`
--

INSERT INTO `resim` (`id`, `yol`) VALUES
(41, 'upload/img/slide/resim1.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slide`
--

CREATE TABLE `slide` (
  `id` mediumint(9) NOT NULL,
  `baslik` varchar(100) NOT NULL,
  `metin` varchar(1000) NOT NULL,
  `tarih` date DEFAULT NULL,
  `resim_id` mediumint(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `slide`
--

INSERT INTO `slide` (`id`, `baslik`, `metin`, `tarih`, `resim_id`) VALUES
(1, 'Sonuçlar', '1-Kaynarca 2-Ferhatlar 3-Süleymaniye 4-Dudullu 5-Atakent 6-Yamanevler', '2020-11-12', 41),
(2, 'What is Lorem Ipsum?', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-11-12', NULL),
(3, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2020-11-02', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sube`
--

CREATE TABLE `sube` (
  `id` smallint(6) NOT NULL,
  `isim` varchar(255) NOT NULL,
  `adres` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sube`
--

INSERT INTO `sube` (`id`, `isim`, `adres`) VALUES
(1, 'Şube-1', 'Seyhan'),
(2, 'Şube-2', 'Sarıyer'),
(3, 'Sube-3', 'Ankara'),
(30, 'Şube-4', 'Ardahan');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sube_duyuru`
--

CREATE TABLE `sube_duyuru` (
  `id` mediumint(9) NOT NULL,
  `sube_id` smallint(6) NOT NULL,
  `duyuru_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sube_duyuru`
--

INSERT INTO `sube_duyuru` (`id`, `sube_id`, `duyuru_id`) VALUES
(9, 3, 4),
(67, 1, 2),
(70, 1, 3),
(71, 3, 3),
(72, 1, 16),
(73, 3, 16),
(78, 1, 1),
(79, 2, 1),
(80, 3, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tercih`
--

CREATE TABLE `tercih` (
  `id` smallint(6) NOT NULL,
  `ozellik` varchar(100) NOT NULL,
  `deger` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tercih`
--

INSERT INTO `tercih` (`id`, `ozellik`, `deger`) VALUES
(1, 'marquee_hiz', 15),
(2, 'slide_hiz', 5000);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `thumbnail`
--

CREATE TABLE `thumbnail` (
  `id` mediumint(9) NOT NULL,
  `yol` varchar(255) NOT NULL,
  `video_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `video`
--

CREATE TABLE `video` (
  `id` mediumint(9) NOT NULL,
  `yol` varchar(255) NOT NULL,
  `goster` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `video_embed`
--

CREATE TABLE `video_embed` (
  `id` smallint(6) NOT NULL,
  `link` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `css`
--
ALTER TABLE `css`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sube_id` (`sube_id`);

--
-- Tablo için indeksler `duyuru`
--
ALTER TABLE `duyuru`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sube_id` (`sube_id`);

--
-- Tablo için indeksler `resim`
--
ALTER TABLE `resim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resim_id` (`resim_id`);

--
-- Tablo için indeksler `sube`
--
ALTER TABLE `sube`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sube_duyuru`
--
ALTER TABLE `sube_duyuru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sube_id` (`sube_id`),
  ADD KEY `duyuru_id` (`duyuru_id`);

--
-- Tablo için indeksler `tercih`
--
ALTER TABLE `tercih`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `thumbnail`
--
ALTER TABLE `thumbnail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_id` (`video_id`);

--
-- Tablo için indeksler `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `video_embed`
--
ALTER TABLE `video_embed`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `css`
--
ALTER TABLE `css`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `duyuru`
--
ALTER TABLE `duyuru`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- Tablo için AUTO_INCREMENT değeri `resim`
--
ALTER TABLE `resim`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Tablo için AUTO_INCREMENT değeri `slide`
--
ALTER TABLE `slide`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `sube`
--
ALTER TABLE `sube`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Tablo için AUTO_INCREMENT değeri `sube_duyuru`
--
ALTER TABLE `sube_duyuru`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Tablo için AUTO_INCREMENT değeri `tercih`
--
ALTER TABLE `tercih`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `thumbnail`
--
ALTER TABLE `thumbnail`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `video`
--
ALTER TABLE `video`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Tablo için AUTO_INCREMENT değeri `video_embed`
--
ALTER TABLE `video_embed`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `css`
--
ALTER TABLE `css`
  ADD CONSTRAINT `css_ibfk_1` FOREIGN KEY (`sube_id`) REFERENCES `sube` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`sube_id`) REFERENCES `sube` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `slide`
--
ALTER TABLE `slide`
  ADD CONSTRAINT `slide_ibfk_1` FOREIGN KEY (`resim_id`) REFERENCES `resim` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `sube_duyuru`
--
ALTER TABLE `sube_duyuru`
  ADD CONSTRAINT `sube_duyuru_ibfk_1` FOREIGN KEY (`duyuru_id`) REFERENCES `duyuru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sube_duyuru_ibfk_2` FOREIGN KEY (`sube_id`) REFERENCES `sube` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `thumbnail`
--
ALTER TABLE `thumbnail`
  ADD CONSTRAINT `thumbnail_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
